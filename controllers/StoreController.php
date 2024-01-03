<?php

namespace app\controllers;

use yii\db\Connection;
use app\models\AdConcCompanies;
use app\models\AdConcCompaniesSearch;
use app\models\AdDocuments;
use app\models\AdProduct;
use app\models\AdProductImg;
use app\models\AdCategories;
use app\models\AdProductStore;
use app\models\AdStoreCharacter;
use app\models\Store;
use app\models\StoreSearch;
use app\models\User;
use Yii;
use yii\bootstrap5\NavBar;
use yii\debug\models\search\Base;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StoreController implements the CRUD actions for Store model.
 */
class StoreController extends Controller
{


    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        return parent::beforeAction($action);
    }


    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        $this->layout = 'store';

        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Store models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StoreSearch();
//        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider = Store::find()->asArray()->all();
        if (Yii::$app->request->isAjax && Yii::$app->request->isGet) {
            return json_encode($dataProvider);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionConcurents(){
        $searchModel = new AdConcCompaniesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('concurent-index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Store model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Store model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreateConcurent()
    {
        $model = new AdConcCompanies();

        if ($this->request->isPost) {
            $post = $_POST;

            $model->name = $post['AdConcCompanies']['name'];
            if (isset($_FILES['AdConcCompanies'])) {
                $uploaddir = 'web/uploads/';
                $uploadfile = $uploaddir . time() . basename($_FILES['AdConcCompanies']['name']['img']);
                if (move_uploaded_file($_FILES['AdConcCompanies']['tmp_name']['img'], $uploadfile)) {
                    $model->img = $uploadfile;
                }
            }
            $model->save();
            return $this->redirect(['/', 'id' => $model->id]);
        }
        return $this->render('create-concurent', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Store model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Store model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionDeleteConcurent($id)
    {
        AdConcCompanies::findOne($id)->delete();
        return $this->redirect(['concurents']);
    }


    public function actionCreate()
    {
        $model = new Store();
        if ($this->request->isPost) {
            $post = $_POST;
            $model->load($post);
            $model->save();
        }

    }

        public function actionCreateStore()
    {
        $model = new Store();
        return $this->renderAjax('store-popup',
            ['model' => $model]
        );

    }
    public function actionCategories() {
        $post = Yii::$app->request->post();
        if (($post && $post['add']) || Yii::$app->request->isAjax) {
            $category = new AdCategories();
            $category->name = $post['name'];
            $category->atg = $post['atg'];
            $category->description = $post['description'];
            $category->meta_description = $post['meta_description'];
            $category->meta_title = $post['meta_title'];
            $category->meta_keywords = $post['meta_keywords'];
            $category->parent_id = $post['parent_id'];
            $category->url =  $this->transLateURRL($post['name']);
            if (isset($_FILES['img'])) {
                $uploaddir = 'web/uploads/categories/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                    $category->photo = $uploadfile;
                }
            }
            $category->save(false);
            $parent = $category->id;
            $this->redirect(array('categories', 'success' => 'true', 'id' => 'key' . $category->id));
        }
        if (!isset($_GET['search'])) {
            $categories = AdCategories::find()->select('id,name,parent_id,status,atg')->orderBy(['order_num' => SORT_ASC])->asArray()->all();

            $categories = $this->getresultTree($categories, 0);
            return $this->render('categories', ['categories' => $categories]);
        }
        else {
            switch (intval($_GET['type'])) {
                case 1:
                    $cond = ['like', 'name', $_GET['search'] . '%', false];
                    break;
                case 2:
                    $cond = ['like', 'name', '%' . $_GET['search'], false];
                    break;
                case 3:
                    $cond = ' name LIKE "%' . $_GET['search'] . '%" AND name NOT LIKE  "%' . $_GET['search'] . '" AND name NOT LIKE "' . $_GET['search'] . '%"';
                    break;
                default:
                    $cond = ['like', 'name', '%' . $_GET['search'] . '%', false];
                    break;
            }
            $categories = AdCategories::find()->select('id')->where($cond)->asArray()->all();
            $categoriesTotal = $categories + $categorieslangRu + $categorieslangEn;
            $categories = AdCategories::find()->select('id,name,parent_id,status,atg')->where(['id' => $categoriesTotal])->asArray()->all();

            return $this->render('categories-no-sort', ['categories' => $categories]);
        }
    }
    public function actionTest(){
        var_dump(unlink('href from db'));//remove img from folder
    }
    public function actionDocument($id) {
        $products = AdDocuments::find()
            ->where(['id' => $id])
            ->with('adProductsStore', 'adProductConcs')
            ->asArray()
            ->one();

        $store = Store::findOne($products['store_id']);
        $manager = User::findOne($products['user_id']);
        return $this->render('document-products', ['id' => $id, 'store' => $store,'manager' => $manager, 'products' => $products]);
    }
    public function actionStore($id) {
        $store = Store::findOne($id);
        $documents = AdDocuments::find()
            ->select('ad_documents.* , user.username')
            ->where(['ad_documents.store_id' => $id])
            ->leftJoin('user','user_id = user.id')
            ->orderBy(['ad_documents.id'=>SORT_DESC])
            ->asArray()
            ->all();
        $prod_list = AdProduct::find()->select('ad_product.id , ad_product.name')->asArray()->all();
        $prod_list = AdStoreCharacter::find()
            ->select('ad_product.id , ad_product.name')
                ->where(['store_id' => $_GET['id']])
                ->leftJoin('ad_product','ad_store_characters.product_id = ad_product.id')
                ->asArray()
                ->all();
        $concurents = AdConcCompanies::find()->asArray()->all();
        return $this->render('store', ['id' => $id,'store' => $store , 'documents' => $documents,'concurents' => $concurents, 'prod_list' => $prod_list]);
    }
    public function actionAddDocument(){
        $user_id = Yii::$app->user->identity->id;
        if(Yii::$app->request->isPost){
            $post = $_POST;
            $document = new AdDocuments();
            $document->user_id = $user_id;
            $document->store_id = $post['store_id'];
            $document->comment = $post['comment'];
            $document->save();
            $document->addManagerDocument($document,$post,$_FILES);
            return $this->redirect('index');
        }
    }

    public function actionTruncate(){
        $connection = Yii::$app->db;
        $connection->createCommand()->truncateTable('ad_documents')->execute();
        $connection->createCommand()->truncateTable('ad_products_store')->execute();
        $connection->createCommand()->truncateTable('ad_product_concs')->execute();
    }
    public function actionProductsStore(){
        $post = $_POST;
        if (!empty($post['product']) && isset($post['product'])){
            AdStoreCharacter::deleteAll(['store_id' => $post['store']]);
            foreach ($post['product'] as $index => $item) {
                $storeCharackter = new AdStoreCharacter();
                $storeCharackter->store_id = $post['store'];
                $storeCharackter->product_id = $item;
                $storeCharackter->save();
            }
            $this->redirect('store?id='.$post['store']);
        }else {
            $this->redirect('index');
        }

    }
    public function actionModalProdList(){
        if($_GET['store_id']){
            $products = AdProduct::find()->asArray()->all();
            $my_products = array_column(AdStoreCharacter::find()->select('product_id')->where(['store_id' => $_GET['store_id']])->asArray()->all(),'product_id');
            return $this->renderAjax('modal-prod-list', ['store_id' => $_GET['store_id'],'products' => $products,'my_products' => $my_products]);
        }
    }

    public function actionProducts() {
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $product = new AdProduct();
            $product->name = $post['name'];
            $product->code_ = $post['code_'];
            $product->vendor_code = $post['vendor_code'];
            $product->comment = $post['comment'];
            $product->category_id = $post['category_id'];
            $product->qty_type = $post['measuremnet_id'];
            $product->description = $post['description'];
            if (!empty($_FILES['video']) && $_FILES["video"]["name"]) {
                $tmp_name = $_FILES["video"]["tmp_name"];
                $name = time() . basename($_FILES["video"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/$name");
                $product->video = "web/uploads/$name";
            }
            else if ($post['old_video']) {
                $product->video = $post['old_video'];
            }
            $product->save(false);
            $img = '';
            if (!empty($_FILES['img']) && $_FILES["img"]["name"][0]) {
                for ($i = 0;$i < count($_FILES['img']['name']);$i++) {
                    $tmp_name = $_FILES["img"]["tmp_name"][$i];
                    $name = time() . basename($_FILES["img"]["name"][$i]);
                    move_uploaded_file($tmp_name, "web/uploads/$name");
                    $img = "web/uploads/$name";
                    $pr_new_img = new AdProductImg;
                    $pr_new_img->productId = $product->id;
                    $pr_new_img->name = $img;
                    $pr_new_img->active = 0;
                    $pr_new_img->save(false);
                }
            }
            if (isset($post['old_prod']) && !empty($post['old_prod'])) {
                $pr_new_img = new AdProductImg;
                $pr_new_img->productId = $product->id;
                $pr_new_img->name = $img;
                $pr_new_img->active = 0;
                $pr_new_img->save(false);
            }
            $this->redirect(['products', 'success' => 'true', 'id' => 'key' . $product->id]);
        }
        else if ($post && $post['edite']) {
            $product = AdProduct::findOne(['id' => intval($post['id']) ]);
            $product->name = $post['name'];
            $product->code_ = $post['code_'];
            $product->vendor_code = $post['vendor_code'];
            $product->category_id = $post['category_id'];
            $product->qty_type = $post['measuremnet_id'];
            $product->description = $post['description'];
            $product->save(false);
            if(!empty($_FILES['img']['name'])){
                for ($i = 0;$i < count($_FILES['img']['name']);$i++) {
                    $tmp_name = $_FILES["img"]["tmp_name"][$i];
                    $name = time() . basename($_FILES["img"]["name"][$i]);
                    move_uploaded_file($tmp_name, "web/uploads/$name");
                    $img = "web/uploads/$name";
                    $pr_new_img = new AdProductImg;
                    $pr_new_img->productId = $product->id;
                    $pr_new_img->name = $img;
                    $pr_new_img->active = 0;
                    $pr_new_img->save(false);
                }

            }
            $product->save(false);
            $this->redirect(['products', 'success' => 'true', 'id' => 'key' . $product->id]);
        }
        $page = $_GET['page'];
        $limit = 10;
        $offset = 0;
        if ($page) {
            $offset = $limit * $page;
        }
        if (!isset($_GET['search'])) {
            if(!isset($_GET['user_id'])){
                if ($page !== 'all') {
                    $products = AdProduct::find()->limit($limit)->offset($offset)->orderBy(['order_num' => SORT_ASC])->all();
                } else {
                    $products = AdProduct::find()->orderBy(['order_num' => SORT_ASC])->all();
                }
            } else {
                $products = AdProduct::find()->where(['provider_id'=>intval($_GET['user_id'])])->orderBy(['order_num' => SORT_ASC])->all();
            }
        }
        else {
            $cond = AdProduct::getCondition($_GET)['cond'];
            $condAnd = [];
            $condBrand = [];
            $condCategory = [];
            if(isset($_GET['user_id']) && intval($_GET['user_id'])){
                $condAnd = ['provider_id'=>intval($_GET['user_id'])];
            }
            if (!empty($_GET['category_id'])) {
                $condCategory = ['category_id' => $_GET['category_id']];
            }
            if (!empty($_GET['brand_id'])) {
                $condBrand = ['store_id' => $_GET['brand_id']];
            }

            $products = AdProduct::find()->where($cond)->andWhere($condAnd)->andWhere($condCategory)->andWhere($condBrand)->all();
        }

        $total = AdProduct::find()->count();
        $categories = AdCategories::find()->select('id,name,parent_id,status,atg')->where(['status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->render('product', ['categories' => $categories, 'measurement' => $measurement, 'products' => $products, 'total' => $total,'users'=>$users,]);
    }

    public function actionProductEdite() {
        $id = intval($_GET['id']);
        $product = AdProduct::findOne(['id' => $id]);
        $categories = AdCategories::find()->select('id,name,parent_id,status,atg')->where(['status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
//        $paramsOrigin = FsProductParams::find()->where(['product_id' => $id])->asArray()->all();
//        $params = ArrayHelper::map($paramsOrigin, 'param_id', 'value');
        $categories = $this->getresultTree($categories, 0);
        return $this->renderAjax('product-edite-popup', ['product' => $product, 'categories' => $categories, 'measurement' => $measurement, 'params' => $params, 'paramsOrigin' => $paramsOrigin]);
    }
    public function getresultTree(array $elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->getresultTree($elements, $element['id']);
                if ($children) {
                    $element['child'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }
    public function actionRemoveImg(){
        if(isset($_GET['id'])){
            AdProductImg::findOne($_GET['id'])->delete();
        }
    }

    /**
     * Finds the Store model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Store the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Store::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
