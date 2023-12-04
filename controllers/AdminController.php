<?php

namespace app\controllers;
use app\models\FsBanners;
use app\models\FsBrands;
use app\models\FsBrandToCategory;
use app\models\FsCart;
use app\models\FsOrders;
use app\models\FsPages;
use app\models\FsParamToCategory;
use app\models\FsProductParams;
use app\models\FsProducts;
use app\models\FsProductVariations;
use app\models\FsSettings;
use app\models\FsStores;
use app\models\FsDiscounts;
use app\models\FsTexts;
use app\models\FsUsers;
use app\models\User;
use app\models\FsNotifications;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\helpers\ArrayHelper;
use app\models\FsCategories;
use app\models\FsMeasurements;
use app\models\FsParams;
use app\models\FsCategoriesLang;
use DateInterval;
use DatePeriod;
use DateTime;
class AdminController extends Controller {
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function behaviors() {
        return ['access' => ['class' => AccessControl::className(), 'only' => ['index'], 'rules' => [['actions' => ['login'], 'allow' => true, 'roles' => ['@', ], ], ['actions' => ['index'], 'allow' => true, 'roles' => ['@', ], ], ], ], 'verbs' => ['class' => VerbFilter::className(), 'actions' => ['logout' => ['post', 'get'], 'dashboard-only' => ['post', 'get'], ], ], ];
    }
    public function actions() {
        return ['error' => ['class' => 'yii\web\ErrorAction', ], 'captcha' => ['class' => 'yii\captcha\CaptchaAction', 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null, ], ];
    }
    /* PAGES BLOCK */
    /*HOME ACTION*/
    public function actionIndex() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $this->redirect(array('orders'));
        //  return $this->render('index');
    }
    /*PRODUCTS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionProducts() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $product = new FsProducts();
            $product->name = $post['name'];
            $product->name_ru = $post['name_ru'];
            $product->name_en = $post['name_en'];
            if(!$post['atg']){
                $atg = FsCategories::findOne($post['category_id']);
                $product->atg = $atg->atg;
            } else {
                $product->atg = $post['atg'];
            }
            $product->code_ = $post['code_'];
            $product->vendor_code = $post['vendor_code'];
            $product->comment = $post['comment'];
            $product->category_id = $post['category_id'];
            $product->qty_type = $post['measuremnet_id'];
            $product->description = $post['description'];
            $product->description_ru = $post['description_ru'];
            $product->description_en = $post['description_en'];
            $product->send_notice = $post['is_new'];
            $product->provider_id = Yii::$app->user->id;
            $product->user_id = Yii::$app->user->id;
            $product->price = $post['price'];
            $product->brand_id = $post['brand_id'];
            $product->is_aah = $post['is_aah'];
            $product->is_tax = $post['is_tax'];
            $product->tax_procent = $post['tax_procent'];
            $product->is_env = $post['is_env'];
            $product->env_procent = $post['anim_procent'];
            $img = '';
            if (!empty($_FILES['img']) && $_FILES["img"]["name"][0]) {

                for ($i = 0;$i < count($_FILES['img']['name']);$i++) {
                    $tmp_name = $_FILES["img"]["tmp_name"][$i];
                    $name = time() . basename($_FILES["img"]["name"][$i]);
                    move_uploaded_file($tmp_name, "web/uploads/$name");
                    $img .= "web/uploads/$name,";
                }
                $img = substr($img, 0, -1);
                $product->image = $img;
            }

            if (isset($post['old_prod']) && !empty($post['old_prod'])) {
                for ($i = 0;$i < count($post['old_prod']);$i++) {
                    $img .= $post['old_prod'][$i].',';
                }
                $img = substr($img, 0, -1);
                if($product->image) {
                    $product->image = $product->image . ',' . $img;
                } else {
                    $product->image = $img;
                }
            }
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
            $product->url = $this->transLateURRL($product->name).'_'.$product->id;
            $product->save(false);
            if (!empty($post['property'])) {
                foreach ($post['property'] as $prop => $prop_val) {
                    if (!is_array($prop_val)) {
                        $prop_new = new FsProductParams();
                        $prop_new->param_id = $prop;
                        $prop_new->product_id = $product->id;
                        $prop_new->value = $prop_val;
                        $prop_new->save(false);
                    }
                    else {
                        foreach ($prop_val as $prop_val_simple => $prop_simple) {
                            $prop_new = new FsProductParams();
                            $prop_new->param_id = $prop;
                            $prop_new->product_id = $product->id;
                            $prop_new->value = $prop_simple;
                            $prop_new->save(false);
                        }
                    }
                }
            }
            if (!empty($post['vid_'])) {
                for ($i = 0; $i < count($post['vid_']); $i++) {
                    $variation_new = new FsProductVariations();
                    $variation_new->param_id = $post['vid_'][$i];
                    $variation_new->product_id = $product->id;
                    $variation_new->code = $post['code_'][$i];
                    $variation_new->price = $post['price_'][$i];
                    $variation_new->save(false);
                }
            }
            $this->redirect(['products', 'success' => 'true', 'id' => 'key' . $product->id]);
        } else if ($post && $post['edite']) {
            $product = FsProducts::findOne(['id' => intval($post['id']) ]);
            $product->name = $post['name'];
            $product->name_ru = $post['name_ru'];
            $product->name_en = $post['name_en'];
             if(!$post['atg']){
                $atg = FsCategories::findOne($post['category_id']);
                $product->atg = $atg->atg;
            } else {
                $product->atg = $post['atg'];
            }
            $product->code_ = $post['code_'];
            $product->vendor_code = $post['vendor_code'];
            $product->comment = $post['comment'];
            $product->category_id = $post['category_id'];
            $product->qty_type = $post['measuremnet_id'];
            $product->description = $post['description'];
            $product->description_ru = $post['description_ru'];
            $product->description_en = $post['description_en'];
            $product->send_notice = $post['is_new'];
            $product->is_aah = $post['is_aah'];
            $product->brand_id = $post['brand_id'];
            $product->is_tax = $post['is_tax'];
            $product->tax_procent = $post['tax_procent'];
            $product->is_env = $post['is_env'];
            $product->price = $post['price'];
            $product->env_procent = $post['anim_procent'];
            $product->url = $this->transLateURRL($product->name).'_'.$product->id;
            if (isset($post['old_prod']) && !empty($post['old_prod'])) {
                for ($i = 0;$i < count($post['old_prod']);$i++) {
                    $img .= $post['old_prod'][$i].',';
                }
                $img = substr($img, 0, -1);
                $product->image = $img;
            } else {
                $product->image = '';
            }

            if (!empty($_FILES['img']) && $_FILES["img"]["name"][0]) {
                $img = '';
                for ($i = 0;$i < count($_FILES['img']['name']);$i++) {
                    $tmp_name = $_FILES["img"]["tmp_name"][$i];
                    $name = time() . basename($_FILES["img"]["name"][$i]);
                    move_uploaded_file($tmp_name, "web/uploads/$name");
                    $img .= "web/uploads/$name,";
                }
                $img = substr($img, 0, -1);
                if($product->image) {
                    $product->image = $product->image . ',' . $img;
                } else {
                    $product->image = $img;
                }
            }
            if (!empty($_FILES['video']) && $_FILES["video"]["name"]) {
                $tmp_name = $_FILES["video"]["tmp_name"];
                $name = time() . basename($_FILES["video"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/$name");
                $product->video = "web/uploads/$name";
            }
            FsProductParams::deleteAll(['product_id' => $product->id]);
            FsProductVariations::deleteAll(['product_id' => $product->id]);
            $product->save(false);
            if (!empty($post['property'])) {
                foreach ($post['property'] as $prop => $prop_val) {
                    if (!is_array($prop_val)) {
                        $prop_new = new FsProductParams();
                        $prop_new->param_id = $prop;
                        $prop_new->product_id = $product->id;
                        $prop_new->value = $prop_val;
                        $prop_new->save(false);
                    }
                    else {
                        foreach ($prop_val as $prop_val_simple => $prop_simple) {
                            $prop_new = new FsProductParams();
                            $prop_new->param_id = $prop;
                            $prop_new->product_id = $product->id;
                            $prop_new->value = $prop_simple;
                            $prop_new->save(false);
                        }
                    }
                }
            }

            if (!empty($post['vid_'])) {
                for ($i = 0; $i < count($post['vid_']); $i++) {
                    $variation_new = new FsProductVariations();
                    $variation_new->param_id = $post['vid_'][$i];
                    $variation_new->product_id = $product->id;
                    $variation_new->code = $post['code__'][$i];
                    $variation_new->price = $post['price_'][$i];
                    $variation_new->save(false);
                }
            }
            $this->redirect(['products', 'success' => 'true', 'id' => 'key' . $product->id]);
        }
        $page = $_GET['page'];
        $limit = 10;
        $offset = 0;
        if ($page) {
            $offset = $limit * $page;
        }
        $measurement = FsMeasurements::find()->where(['status' => 1])->all();
        $brands = FsBrands::find()->where(['status' => 1])->all();
        $users = FsUsers::find()->select('id,name')->where(['status' => 1,'is_seller'=>1])->all();
  
        if (!isset($_GET['search'])) {
             if(!isset($_GET['user_id'])){
                if ($page !== 'all') {
                    $products = FsProducts::find()->limit($limit)->offset($offset)->orderBy(['order_num' => SORT_ASC])->all();
                } else {
                    $products = FsProducts::find()->orderBy(['order_num' => SORT_ASC])->all();
                }
             } else {
                  $products = FsProducts::find()->where(['provider_id'=>intval($_GET['user_id'])])->orderBy(['order_num' => SORT_ASC])->all();
             }
        } else {
            $cond = FsProducts::getCondition($_GET)['cond'];
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
                $condBrand = ['brand_id' => $_GET['brand_id']]; 
            }

            $products = FsProducts::find()->where($cond)->andWhere($condAnd)->andWhere($condCategory)->andWhere($condBrand)->all();
        }
        $total = FsProducts::find()->count();
        $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->render('products', ['categories' => $categories, 'measurement' => $measurement, 'products' => $products, 'total' => $total,'users'=>$users,'brands'=>$brands]);
    }
    /*PARTNERS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionPartners() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();

        if ($post && $post['add']) {
            $user = new FsUsers();
            $user->load($post);
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            if (!empty($_FILES['logo']) && $_FILES["logo"]["name"]) {
                $tmp_name = $_FILES["logo"]["tmp_name"];
                $name = time() . basename($_FILES["logo"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/users/$name");
                $user->image = "web/uploads/users/$name";
            } else if($post['old_img']){
                $user->image = $post['old_img'];
            }
            $user->save(false);
            $this->redirect(['partners', 'success' => 'true', 'id' => 'key' . $user->id]);
        }
        else if ($post && $post['edite']) {
            $user = FsUsers::findOne(['id' => intval($post['id']) ]);
            $pass = $user->password;
            $user->load($post);
            if(!$post['FsUsers']['verified']){
                $user->verified = 0;
            }
            if(!$post['FsUsers']['is_seller']){
                $user->is_seller = 0;
            }
            if(!$post['FsUsers']['is_buyer']){
                $user->is_buyer = 0;
            }
            if (!empty($_FILES['logo']) && $_FILES["logo"]["name"]) {
                $tmp_name = $_FILES["logo"]["tmp_name"];
                $name = time() . basename($_FILES["logo"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/users/$name");
                $user->image = "web/uploads/users/$name";
            }

            if($post['FsUsers']['password']) {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            } else {
                $user->password = $pass;
            }
            if( $user->verified == 1 && $user->is_seller == 1){
                $users = FsUsers::find()->select(['id'])->where(['not', ['id' => $user->id]])->andWhere(['is_buyer'=>1])->all();
                foreach ($users as $us) {
                    $note = new FsNotifications();
                    $note->message = 'Համակարգում գրանցվել է նոր մատակարար՝ <b>'.$user->legal_name.'</b>';
                    $note->sender_id = $user->id;
                    $note->recipient_id = $us->id;
                    $note->url = '/company-details/'.$user->id;
                    $note->type = 1;
                    $note->save();
                }
            } else if($user->verified == 1 && $user->is_buyer == 1){
                $users = FsUsers::find()->select(['id'])->where(['not', ['id' => $user->id]])->andWhere(['is_buyer'=>1])->all();
                foreach ($users as $us) {
                    $note = new FsNotifications();
                    $note->message = 'Համակարգում գրանցվել է նոր գնորդ՝ <b>'.$user->legal_name.'</b>';
                    $note->sender_id = $user->id;
                    $note->recipient_id = $us->id;
                    $note->url = '/company-details/'.$user->id;
                    $note->type = 1;
                    $note->save();
                }
            }
            $user->save(false);
            $this->redirect(['partners', 'success' => 'true', 'id' => 'key' . $user->id]);
        }
        $page = intval($_GET['page']);
        $limit = 10;
        $offset = 0;
            if ($page) {
                $offset = $limit * $page;
            }
            if (!isset($_GET['search'])) {
                if ($page != 'all') {
                    $users = FsUsers::find()->limit($limit)->offset($offset)->orderBy(['order_num' => SORT_ASC])->andWhere(['is_seller' => 1])->all();
                }
                else {
                    $users = FsUsers::find()->orderBy(['order_num' => SORT_ASC])->andWhere(['is_seller' => 1])->all();
                }
            }
            else {
                switch (intval($_GET['type'])) {
                    case 2:
                        $cond = ' legal_name LIKE "%' . $_GET['search'] . '"';
                        break;
                    case 1:
                        $cond = ' legal_name LIKE "' . $_GET['search'] . '%"';
                        break;
                    case 3:
                        $cond = ' legal_name LIKE "%' . $_GET['search'] . '%" AND legal_name NOT LIKE  "%' . $_GET['search'] . '" AND legal_name NOT LIKE "' . $_GET['search'] . '%"';
                        break;
                    default:
                        $cond = ' legal_name LIKE "%' . $_GET['search'] . '%"';
                        break;
                }
                $users = FsUsers::find()->where($cond)->andWhere(['is_seller' => 1])->all();
            }

        $total = FsUsers::find()->where(['is_seller' => 1])->count();
        return $this->render('partners', ['partners' => $users, 'total' => $total]);
    }
    /*CUSTOMERS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionCustomers() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $user = new FsUsers();
            $user->load($post);
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            if (!empty($_FILES['logo']) && $_FILES["logo"]["name"]) {
                $tmp_name = $_FILES["logo"]["tmp_name"];
                $name = time() . basename($_FILES["logo"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/users/$name");
                $user->image = "web/uploads/users/$name";
            }  else if($post['old_img']){
                $user->image = $post['old_img'];
            }
            $user->save(false);
            $this->redirect(['customers', 'success' => 'true', 'id' => 'key' . $user->id]);
        }
        else if ($post && $post['edite']) {
            $user = FsUsers::findOne(['id' => intval($post['id']) ]);
            $pass = $user->password;
            $user->load($post);
            if($post['FsUsers']['password']) {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            } else {
                $user->password = $pass;
            }
            if (!empty($_FILES['logo']) && $_FILES["logo"]["name"]) {
                $tmp_name = $_FILES["logo"]["tmp_name"];
                $name = time() . basename($_FILES["logo"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/users/$name");
                $user->image = "web/uploads/users/$name";
            }
            $user->save(false);
            $this->redirect(['customers', 'success' => 'true', 'id' => 'key' . $user->id]);
        }
        $page = intval($_GET['page']);
        $limit = 10;
        $offset = 0;
        if ($page) {
            $offset = $limit * $page;
        }
        if (!isset($_GET['search'])) {
            if ($page != 'all') {
                $users = FsUsers::find()->limit($limit)->offset($offset)->orderBy(['order_num' => SORT_ASC])->andWhere(['is_buyer' => 1])->all();
            }
            else {
                $users = FsUsers::find()->orderBy(['order_num' => SORT_ASC])->andWhere(['is_buyer' => 1])->all();
            }
        }
        else {
            switch (intval($_GET['type'])) {
                case 2:
                    $cond = ' legal_name LIKE "%' . $_GET['search'] . '"';
                    break;
                case 1:
                    $cond = ' legal_name LIKE "' . $_GET['search'] . '%"';
                    break;
                case 3:
                    $cond = ' legal_name LIKE "%' . $_GET['search'] . '%" AND legal_name NOT LIKE  "%' . $_GET['search'] . '" AND legal_name NOT LIKE "' . $_GET['search'] . '%"';
                    break;
                default:
                    $cond = ' legal_name LIKE "%' . $_GET['search'] . '%"';
                    break;
            }
            $users = FsUsers::find()->where($cond)->andWhere(['is_buyer' => 1])->all();
        }

        $total = FsUsers::find()->where(['is_buyer' => 1])->count();
        return $this->render('customers', ['partners' => $users, 'total' => $total]);
    }
    /*ORDERS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionOrders() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['edite']) {

            $order = FsOrders::findOne(['id' => intval($post['id']) ]);
            if($order->cart_id) {
                $products = explode(',', $order->cart_id);
                if(count($products)>0){
                    for ($i = 0; $i < count($products); $i++){
                        FsCart::deleteAll(['id'=>$products[$i]]);
                    }
                }
            }
            $total = 0;
            $cat_str = '';
            if(count($post['pid'])>0){
                for ($i = 0; $i < count($post['pid']); $i++){
                    $item = new FsCart();
                    $item->user_id = $order->buyer_id;
                    $item->product_id = $post['pid'][$i];
                    $item->quantity = $post['count'][$i];
                    $item->variation_id = $post['count'][$i];
                    $item->price = $post['price'][$i];
                    $item->status = 1;
                    $item->save(false);
                    $cat_str .= $item->id.',';
                    $total+= $item->quantity * $item->price;
                }
            }
            $cat_str = substr($cat_str,0,-1);
            $order->cart_id = $cat_str;
            $order->price = $total;
            $order->seller_quantity = count($post['pid']);
            $order->save(false);

            $this->redirect(['orders', 'success' => 'true', 'id' => 'key' . $order->id]);
        }
        $page = $_GET['page'];
        $limit = 10;
        $offset = 0;
        $cond = [];
        if ($page) {
            $offset = $limit * $page;
        }
        $sql = '';
        if(Yii::$app->user->identity->company_id){
            $_GET['seller_id'] = Yii::$app->user->identity->company_id;
        }

        if(!isset($_GET['user_id'])){
            if($_GET['status']){
                $cond = ['status'=>$_GET['status']];
                $page ='all';
            }
            if($_GET['date_start']  ){
                $sql .= ' `created_at`>"'.$_GET['date_start'].'" ';
            }
            if($_GET['date_end']  ){
                if(!$sql){
                    $sql .= ' `created_at`<"'.$_GET['date_end'].'"';
                } else {
                    $sql .= ' AND `created_at`<"'.$_GET['date_end'].'"';
                }

            }
            $cond_second = [];
            if(isset($_GET['seller_id'])){
                $cond_second = ['seller_id'=>intval($_GET['seller_id'])];
            }
            if ($page != 'all') {
                $orders = FsOrders::find()->limit($limit)->where($cond)->andWhere($sql)->andWhere($cond_second)->offset($offset)->orderBy(['id' => SORT_DESC])->all();
                $total = FsOrders::find()->limit($limit)->where($cond)->andWhere($sql)->andWhere($cond_second)->offset($offset)->count();
            } else {
                $orders = FsOrders::find()->where($cond)->andWhere($sql)->andWhere($cond_second)->orderBy(['id' => SORT_DESC])->all();
                $total = FsOrders::find()->where($cond)->andWhere($sql)->andWhere($cond_second)->count();
            }
        } else {
                if(!$_GET['status']){
                    $cond = ['buyer_id'=>$_GET['user_id']];
                } else {
                    $cond = ['buyer_id'=>$_GET['user_id'],'status'=>$_GET['status']];
                }
                if($_GET['date_start']  ){
                    $sql .= ' AND `created_at`>"'.$_GET['date_start'].'" ';
                }
                if($_GET['date_end']  ){
                   $sql .= ' AND `created_at`<"'.$_GET['date_end'].'"';
                }

            $orders = FsOrders::find()->where($cond)->andWhere($sql)->orderBy(['id' => SORT_DESC])->all();
            $total = FsOrders::find()->where($cond)->andWhere($sql)->count();
        }

        return $this->render('orders', ['orders' => $orders, 'total' => $total]);
    }
    /*SITE PAGES PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionPages() {

        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $page = new FsPages();
            $page->load($post);
            $page->save(false);
            $this->redirect(['pages', 'success' => 'true', 'id' => 'key' . $page->id]);
        }
        else if ($post && $post['edite']) {
            $page = FsPages::findOne(['id' => intval($post['id']) ]);
            $page->load($post);
            $page->save(false);
            $this->redirect(['pages', 'success' => 'true', 'id' => 'key' . $page->id]);
        }
        $pages = FsPages::find()->orderBy(['order_num' => SORT_ASC])->all();
        return $this->render('pages', ['pages' => $pages]);
    }
    /*STORES PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionStores() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $stores = new FsStores();
            $stores->load($post);
            if (!empty($_FILES['img']) && $_FILES['img']['tmp_name']) {
                $tmp_name = $_FILES["img"]["tmp_name"];
                $name = time() . basename($_FILES["img"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/$name");
                $stores->logo = "web/uploads/$name";
            }
            else if ($post['old_img']) {
                $stores->logo = $post['old_img'];
            }
            $stores->save(false);
            $this->redirect(['stores', 'success' => 'true', 'id' => 'key' . $stores->id]);
        }
        else if ($post && $post['edite']) {
            $stores = FsStores::findOne(['id' => intval($post['id']) ]);
            $stores->load($post);
            if (!empty($_FILES['img']) && $_FILES['img']['tmp_name']) {
                $tmp_name = $_FILES["img"]["tmp_name"];
                $name = time() . basename($_FILES["img"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/$name");
                $stores->logo = "web/uploads/$name";
            }
            $stores->save(false);
            $this->redirect(['stores', 'success' => 'true', 'id' => 'key' . $stores->id]);
        }
        if(!isset($_GET['parent_id'])){
            $stores = FsStores::find()->orderBy(['order_num' => SORT_ASC])->where('parent_id  IS NULL')->all();
        } else {
             $stores = FsStores::find()->orderBy(['order_num' => SORT_ASC])->where(['parent_id'=> intval($_GET['parent_id'])])->all();
        }
        return $this->render('stores', ['stores' => $stores]);
    }
    /*Brands PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionBrands() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $brands = new FsBrands();
            $brands->load($post);
            $brands->save(false);
            if(!empty($post['category_id'])){
                foreach ($post['category_id'] as $cat => $cat_val){
                    $brandToCat = new FsBrandToCategory();
                    $brandToCat->brand_id = $brands->id;
                    $brandToCat->category_id = $cat_val;
                    $brandToCat->save(false);
                }
            }
            $this->redirect(['brands', 'success' => 'true', 'id' => 'key' . $brands->id]);
        }
        else if ($post && $post['edite']) {
            $brands = FsBrands::findOne(['id' => intval($post['id']) ]);
            $brands->load($post);
            $brands->save(false);
            FsBrandToCategory::deleteAll(['brand_id'=>$brands->id]);
            if(!empty($post['category_id'])){
                foreach ($post['category_id'] as $cat => $cat_val){
                    $brandToCat = new FsBrandToCategory();
                    $brandToCat->brand_id = $brands->id;
                    $brandToCat->category_id = $cat_val;
                    $brandToCat->save(false);
                }
            }
            $this->redirect(['brands', 'success' => 'true', 'id' => 'key' . $brands->id]);
        }
        $brands = FsBrands::find()->orderBy(['order_num' => SORT_ASC])->all();
        $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['parent_id'=>null,'status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->render('brands', ['brands' => $brands,'categories'=>$categories]);
    }
    public function actionBrandEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $brand = FsBrands::findOne(['id' => $id]);
        $brandCats = FsBrandToCategory::find()->where(['brand_id'=>$id])->asArray()->all();
        $brandCats = ArrayHelper::map($brandCats, 'category_id', 'brand_id');
        $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['parent_id'=>null,'status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);

        return $this->renderAjax('brand-edite-popup', ['brand' => $brand, 'categories' => $categories,'brandCats'=>$brandCats]);
    }
    /*Texts PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionTexts() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['edite']) {
            $text = FsTexts::findOne(['id' => intval($post['id']) ]);
            $text->load($post);
            $text->save(false);
            $this->redirect(['texts', 'success' => 'true','page'=>$_GET['page'], 'id' => 'key' . $text->id]);
        }
        $page = $_GET['page'];
        $limit = 10;
        $offset = 0;
        $cond = [];
        if ($page) {
            $offset = $limit * $page;
        }
        $sql = '';
        $cond = '';
        if(isset($_GET['search'])){
            switch (intval($_GET['type'])) {
                case 2:
                    $cond = ' text_am LIKE "%' . $_GET['search'] . '"';
                    break;
                case 1:
                    $cond = ' text_am LIKE "' . $_GET['search'] . '%"';
                    break;
                case 3:
                    $cond = ' text_am LIKE "%' . $_GET['search'] . '%" AND text_am NOT LIKE  "%' . $_GET['search'] . '" AND text_am NOT LIKE "' . $_GET['search'] . '%"';
                    break;
                default:
                    $cond = ' text_am LIKE "%' . $_GET['search'] . '%"';
                    break;
            }
        }
        if( $page != 'all') {
            $texts = FsTexts::find()->andWhere($cond)->limit($limit)->offset($offset)->orderBy(['id' => SORT_DESC])->all();
            $total = FsTexts::find()->andWhere($cond)->count();
        } else {
            $texts = FsTexts::find()->andWhere($cond)->orderBy(['id' => SORT_DESC])->all();
            $total = FsTexts::find()->andWhere($cond)->count();
        }
        return $this->render('texts', ['texts' => $texts, 'total' => $total]);
    }
    /*Banners PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionBanners() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $banner = new FsBanners();
            $banner->load($post);
            if (isset($_FILES['img'])) {
                $uploaddir = 'web/uploads/banners/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                    $banner->image = $uploadfile;
                }
            }
            if (isset($_FILES['img_small'])) {
                $uploaddir = 'web/uploads/banners/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img_small']['name']);
                if (move_uploaded_file($_FILES['img_small']['tmp_name'], $uploadfile)) {
                    $banner->image_mobile = $uploadfile;
                }
            }
            $banner->save(false);
            $this->redirect(['banners', 'success' => 'true', 'id' => 'key' . $banner->id]);
        }
        else if ($post && $post['edite']) {
            $banner = FsBanners::findOne(['id' => intval($post['id']) ]);
            $banner->load($post);
            if (isset($_FILES['img'])) {
                $uploaddir = 'web/uploads/banners/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                    $banner->image = $uploadfile;
                }
            }
            if (isset($_FILES['img_small'])) {
                $uploaddir = 'web/uploads/banners/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img_small']['name']);
                if (move_uploaded_file($_FILES['img_small']['tmp_name'], $uploadfile)) {
                    $banner->image_mobile = $uploadfile;
                }
            }
            $banner->save(false);
            $this->redirect(['banners', 'success' => 'true', 'id' => 'key' . $banner->id]);
        }
        $banners = FsBanners::find()->orderBy(['order_num' => SORT_ASC])->all();
        return $this->render('banners', ['banners' => $banners]);
    }
    /*MEASURMENTS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionMeasurement() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $measurements = FsMeasurements::findOne(['code_'=>$post['code_']]);
            if(!$measurements) {
                $measurements = new FsMeasurements();
            }
            $measurements->code_ = $post['code_'];
            $measurements->name = $post['name'];
            $measurements->name_ru = $post['name_ru'];
            $measurements->name_en = $post['name_en'];
            $measurements->save(false);
            $this->redirect(['measurement', 'success' => 'true', 'id' => 'key' . $measurements->id]);
        }
        else if ($post && $post['edite']) {
            $measurements = FsMeasurements::findOne(['id' => intval($post['id']) ]);
            $measurements->code_ = $post['code_'];
            $measurements->name = $post['name'];
            $measurements->name_ru = $post['name_ru'];
            $measurements->name_en = $post['name_en'];
            $measurements->save(false);
            $this->redirect(['measurement', 'success' => 'true', 'id' => 'key' . $measurements->id]);
        }
        if (!isset($_GET['search'])) {
            $measurement = FsMeasurements::find()->all();
        }
        else {
            switch (intval($_GET['type'])) {
                case 2:
                    $cond = ' name LIKE "%' . $_GET['search'] . '" OR name_ru LIKE  "%' . $_GET['search'] . '" OR name_en LIKE "%' . $_GET['search'] . '"';
                    break;
                case 1:
                    $cond = ' name LIKE "' . $_GET['search'] . '%" OR name_ru LIKE  "' . $_GET['search'] . '%" OR name_en LIKE "' . $_GET['search'] . '%"';
                    break;
                case 3:
                    $cond_ru = ' name LIKE "%' . $_GET['search'] . '%" AND name NOT LIKE  "%' . $_GET['search'] . '" AND name NOT LIKE "' . $_GET['search'] . '%"';
                    break;
                default:
                    $cond = ' name LIKE "%' . $_GET['search'] . '%" OR name_ru LIKE  "%' . $_GET['search'] . '%" OR name_en LIKE "%' . $_GET['search'] . '%"';
                    break;
            }
            $measurement = FsMeasurements::find()->where($cond)->all();
        }
        return $this->render('measurement', ['measurement' => $measurement]);
    }
    /*PROPERTIES PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionProperties() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $param_new = new FsParams();
            $param_new->name = $post['name'];
            $param_new->name_ru = $post['name_ru'];
            $param_new->name_en = $post['name_en'];
            $param_new->type_ = $post['type_'];
            $param_new->save(false);
            $id_new = $param_new->id;
            if (!empty($post['property_am'])) {
                for ($i = 0;$i < count($post['property_am']);$i++) {
                    if (!empty($post['property_am'][$i])) {
                        $param_new = new FsParams();
                        $param_new->name = $post['property_am'][$i];
                        $param_new->name_ru = $post['property_ru'][$i];
                        $param_new->name_en = $post['property_en'][$i];
                        $param_new->parent_id = $id_new;
                        $param_new->save(false);
                    }
                }
            }
            if (!empty($post['category_id'])) {
                for ($i = 0;$i < count($post['category_id']);$i++) {
                    if (!empty($post['category_id'][$i])) {
                        $param_to_category = new FsParamToCategory();
                        $param_to_category->param_id = $id_new;
                        $param_to_category->category_id = $post['category_id'][$i];
                        $param_to_category->save(false);
                    }
                }
            }
            $this->redirect(['properties', 'success' => 'true', 'id' => 'key' . $param_new->id]);
        }
        else if ($post && $post['edite']) {
            $param_new = FsParams::findOne(['id' => intval($post['id']) ]);
            $param_new->type_ = $post['type_'];
            $param_new->name = $post['name'];
            $param_new->name_ru = $post['name_ru'];
            $param_new->name_en = $post['name_en'];
            $param_new->save(false);
            FsParams::deleteAll(['parent_id' => intval($post['id']) ]);
            FsParamToCategory::deleteAll(['param_id' => intval($post['id']) ]);
            if (!empty($post['property_am'])) {
                for ($i = 0;$i < count($post['property_am']);$i++) {
                    if (!empty($post['property_am'][$i])) {
                        $param_new = new FsParams();
                        $param_new->name = $post['property_am'][$i];
                        $param_new->name_ru = $post['property_ru'][$i];
                        $param_new->name_en = $post['property_en'][$i];
                        $param_new->parent_id = intval($post['id']);
                        $param_new->save(false);
                    }
                }
            }
            if (!empty($post['category_id'])) {
                for ($i = 0;$i < count($post['category_id']);$i++) {
                    if (!empty($post['category_id'][$i])) {
                        $param_to_category = new FsParamToCategory();
                        $param_to_category->param_id = intval($post['id']);
                        $param_to_category->category_id = $post['category_id'][$i];
                        $param_to_category->save(false);
                    }
                }
            }
            $this->redirect(['properties', 'success' => 'true', 'id' => 'key' . $param_new->id]);
        }
        if (!isset($_GET['search'])) {
            $params = FsParams::find()->where(['parent_id' => null])->all();
        }
        else {
            switch (intval($_GET['type'])) {
                case 2:
                    $cond = ' name LIKE "%' . $_GET['search'] . '" OR name_ru LIKE  "%' . $_GET['search'] . '" OR name_en LIKE "%' . $_GET['search'] . '"';
                    break;
                case 1:
                    $cond = ' name LIKE "' . $_GET['search'] . '%" OR name_ru LIKE  "' . $_GET['search'] . '%" OR name_en LIKE "' . $_GET['search'] . '%"';
                    break;
                case 3:
                    $cond_ru = ' name LIKE "%' . $_GET['search'] . '%" AND name NOT LIKE  "%' . $_GET['search'] . '" AND name NOT LIKE "' . $_GET['search'] . '%"';
                    break;
                default:
                    $cond = ' name LIKE "%' . $_GET['search'] . '%" OR name_ru LIKE  "%' . $_GET['search'] . '%" OR name_en LIKE "%' . $_GET['search'] . '%"';
                    break;
            }
            $params = FsParams::find()->where($cond)->all();
        }
        $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->render('params', ['params' => $params, 'categories' => $categories]);
    }
    /*SETTINGS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionSettings() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && $post['edite']) {
            $settings = FsSettings::findOne(['id' => 1]);
            $settings->load($post);
            if (isset($_FILES['img'])) {
                $uploaddir = 'web/uploads/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                    $settings->site_logo = $uploadfile;
                }
            }
            if (isset($_FILES['sitemap'])) {
                $uploaddir = 'web/uploads/';
                $uploadfile = $uploaddir . time() . basename($_FILES['sitemap']['name']);
                if (move_uploaded_file($_FILES['sitemap']['tmp_name'], $uploadfile)) {
                    $settings->sitemap = $uploadfile;
                }
            }
            $settings->save(false);
            $this->redirect(['settings', 'success' => 'true', 'id' => 'key1']);
        }
        else if ($post && $post['add']) {
            $user = new Users();
            $user->load($post);
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            $user->auth_key = substr($user->password, 0, 30);
            $user->save(false);
            $this->redirect(['settings', 'success' => 'true', 'id' => 'key1']);
        }  else if ($post && $post['edite_sec']) {
            $user = Users::findOne(['id'=>intval($post['id'])]);
            $user->load($post);
            if($post['Users']['password']) {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            }
            $user->save(false);
            $this->redirect(['settings', 'success' => 'true', 'id' => 'key1']);
        } else if ($post && $post['add_sec']) {
            $user = new Users();
            $user->load($post);
            if($post['Users']['password']) {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);
            } else {
                $user->password = $post['old_password'];
            }
            $user->auth_key = substr($user->password, 0, 30);
            $user->save(false);
            $this->redirect(['settings', 'success' => 'true', 'id' => 'key1']);
        }
        $id = intval(1);
        $settings = FsSettings::findOne(['id' => $id]);
        $users = Users::find()->all();
        return $this->render('settings', ['settings' => $settings, 'users' => $users]);
    }
    /*CATEGORIES PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionCategories() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if (($post && $post['add']) || Yii::$app->request->isAjax) {
            $category = new FsCategories();
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
            $categoryLangs = new FsCategoriesLang();
            $categoryLangs->category_id = $parent;
            $categoryLangs->name_ru = $post['name_ru'];
            $categoryLangs->description_ru = $post['description_ru'];
            $categoryLangs->meta_description_ru = $post['meta_description_ru'];
            $categoryLangs->meta_title_ru = $post['meta_title_ru'];
            $categoryLangs->meta_keywords_ru = $post['meta_keywords_ru'];
            $categoryLangs->name_en = $post['name_en'];
            $categoryLangs->description_en = $post['description_en'];
            $categoryLangs->meta_description_en = $post['meta_description_en'];
            $categoryLangs->meta_title_en = $post['meta_title_en'];
            $categoryLangs->meta_keywords_en = $post['meta_keywords_en'];
            $categoryLangs->save(false);
            $this->redirect(array('categories', 'success' => 'true', 'id' => 'key' . $category->id));
        }
        if (!isset($_GET['search'])) {
            $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->orderBy(['order_num' => SORT_ASC])->asArray()->all();

            $categories = $this->getresultTree($categories, 0);
            return $this->render('categories', ['categories' => $categories]);
        }
        else {
            switch (intval($_GET['type'])) {
                case 2:
                    $cond = ['like', 'name', '%' . $_GET['search'], false];
                    $cond_ru = ['like', 'name_ru', '%' . $_GET['search'], false];
                    $cond_en = ['like', 'name_en', '%' . $_GET['search'], false];
                    break;
                case 1:
                    $cond = ['like', 'name', $_GET['search'] . '%', false];
                    $cond_ru = ['like', 'name_ru', $_GET['search'] . '%', false];
                    $cond_en = ['like', 'name_en', $_GET['search'] . '%', false];
                    break;
                case 3:
                    $cond = ' name LIKE "%' . $_GET['search'] . '%" AND name NOT LIKE  "%' . $_GET['search'] . '" AND name NOT LIKE "' . $_GET['search'] . '%"';
                    $cond_ru = ' name_ru LIKE "%' . $_GET['search'] . '%" AND name_ru NOT LIKE  "%' . $_GET['search'] . '" AND name_ru NOT LIKE "' . $_GET['search'] . '%"';
                    $cond_en = ' name_en LIKE "%' . $_GET['search'] . '%" AND name_en NOT LIKE  "%' . $_GET['search'] . '" AND name_en NOT LIKE "' . $_GET['search'] . '%"';
                    break;
                default:
                    $cond = ['like', 'name', '%' . $_GET['search'] . '%', false];
                    $cond_ru = ['like', 'name_ru', '%' . $_GET['search'] . '%', false];
                    $cond_en = ['like', 'name_en', '%' . $_GET['search'] . '%', false];
                    break;
            }
            $categories = FsCategories::find()->select('id')->where($cond)->asArray()->all();
            $categorieslangRu = FsCategoriesLang::find()->select('id')->where($cond_ru)->asArray()->all();
            $categorieslangEn = FsCategoriesLang::find()->select('id')->where($cond_en)->asArray()->all();
            $categoriesTotal = $categories + $categorieslangRu + $categorieslangEn;
            // var_dump( $categories->createCommand()->sql);
            // exit;
            $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['id' => $categoriesTotal])->asArray()->all();

            return $this->render('categories-no-sort', ['categories' => $categories]);
        }
    }
    /*UPDATE ORDER PAGE ACTION UPDATE &&&*/
    public function actionUpdateOrder() {
        Yii::$app->response->format = Response::FORMAT_JSON;
        if (!empty($_POST['orders'])) {
            $page = $_POST['page'];
            for ($i = 0;$i < count($_POST['orders']);$i++) {
                switch ($page) {
                    case 'Categories':
                        $item = FsCategories::findOne(['id' => intval($_POST['orders'][$i]['id']) ]);
                        break;
                    case 'Measurement':
                        $item = FsMeasurements::findOne(['id' => intval($_POST['orders'][$i]['id']) ]);
                        break;
                    case 'Products':
                        $item = FsProducts::findOne(['id' => intval($_POST['orders'][$i]['id']) ]);
                        break;
                    case 'Pages':
                        $item = FsPages::findOne(['id' => intval($_POST['orders'][$i]['id']) ]);
                        break;
                    case 'Partners':
                        $item = FsUsers::findOne(['id' => intval($_POST['orders'][$i]['id']) ]);
                            break;
                    case 'Banners':
                        $item = FsBanners::findOne(['id' => intval($_POST['orders'][$i]['id']) ]);
                        break;
                }
                $item->order_num = intval($_POST['orders'][$i]['order']);
                var_dump($item->save(false));
            }
        }
        return true;
    }
    public function actionCategoryUpdate() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $post = Yii::$app->request->post();
        if ($post && !$post['id']) {
            $category = new FsCategories();
            $category->name = $post['name'];
            $category->atg = $post['atg'];
            $category->url =  $this->transLateURRL($post['name']);
            $category->description = $post['description'];
            $category->meta_description = $post['meta_description'];
            $category->meta_title = $post['meta_title'];
            $category->meta_keywords = $post['meta_keywords'];
            $category->parent_id = $post['parent_id'];
            if ($post['photo']) {
                $category->photo = $post['photo'];
            }
            if (isset($_FILES['img'])) {
                $uploaddir = 'web/uploads/categories/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                    $category->photo = $uploadfile;
                }
            }
            $category->save(false);
            $parent = $category->id;
            $categoryLangs = new FsCategoriesLang();
            $categoryLangs->category_id = $parent;
            $categoryLangs->name_ru = $post['name_ru'];
            $categoryLangs->description_ru = $post['description_ru'];
            $categoryLangs->meta_description_ru = $post['meta_description_ru'];
            $categoryLangs->meta_title_ru = $post['meta_title_ru'];
            $categoryLangs->meta_keywords_ru = $post['meta_keywords_ru'];
            $categoryLangs->name_en = $post['name_en'];
            $categoryLangs->description_en = $post['description_en'];
            $categoryLangs->meta_description_en = $post['meta_description_en'];
            $categoryLangs->meta_title_en = $post['meta_title_en'];
            $categoryLangs->meta_keywords_en = $post['meta_keywords_en'];
            $categoryLangs->save(false);
            $this->redirect(array('categories', 'success' => 'true', 'id' => 'key' . $category->id));
        }
        else if ($post && $post['id']) {
            $category = FsCategories::findOne(['id' => $post['id']]);
            $category->name = $post['name'];
            $category->atg = $post['atg'];
            $category->description = $post['description'];
            $category->meta_description = $post['meta_description'];
            $category->meta_title = $post['meta_title'];
            $category->meta_keywords = $post['meta_keywords'];
            $category->parent_id = $post['parent_id'];
            if (isset($_FILES['img'])) {
                $uploaddir = 'web/uploads/categories/';
                $uploadfile = $uploaddir . time() . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
                    $category->photo = $uploadfile;
                }
            }
            $category->save(false);
            $parent = $category->id;
            $categoryLangs = FsCategoriesLang::findOne(['category_id' => $post['id']]);
            $categoryLangs->category_id = $parent;
            $categoryLangs->name_ru = $post['name_ru'];
            $categoryLangs->description_ru = $post['description_ru'];
            $categoryLangs->meta_description_ru = $post['meta_description_ru'];
            $categoryLangs->meta_title_ru = $post['meta_title_ru'];
            $categoryLangs->meta_keywords_ru = $post['meta_keywords_ru'];
            $categoryLangs->name_en = $post['name_en'];
            $categoryLangs->description_en = $post['description_en'];
            $categoryLangs->meta_description_en = $post['meta_description_en'];
            $categoryLangs->meta_title_en = $post['meta_title_en'];
            $categoryLangs->meta_keywords_en = $post['meta_keywords_en'];
            $categoryLangs->save(false);
            $this->redirect(array('categories', 'success' => 'true', 'id' => 'key' . $category->id));
        }
    }
    /* GETTERS BLOCK */
    public function actionGetProps() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
      
        $ids = FsCategories::findOne($id);
        $ids = $ids->getAllParents();
        $ids_all = [];
        if(!empty($ids)){
            foreach($ids as $id_ => $id_val){
                $ids_all[] = $id_val->id;
            }
        }
        $ids_all[] = $id;
        $paramsToCategory = FsParamToCategory::find()->where(['category_id' =>$ids_all])->groupBy('param_id')->asArray()->all();
        return $this->renderAjax('get-param', ['paramsToCategory' => $paramsToCategory,'category_id' => $id]);
    }
    public function actionGetItems() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $products = FsProducts::find()->where(['provider_id' => intval($_GET['seller_id'])])->all();
        return $this->renderAjax('get-items', ['products' => $products]);
    }
    /* COPY BLOCK */
    public function actionCategoryCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $category = FsCategories::findOne(['id' => $id]);
        $categoryLangs = FsCategoriesLang::findOne(['category_id' => $id]);
        $categories = FsCategories::find()->select('id,name,parent_id')->where(['status'=>1])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->renderAjax('category-copy-popup', ['category' => $category, 'categoryLangs' => $categoryLangs, 'categories' => $categories, 'type' => 'copy']);
    }
    public function actionParamsCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $param = FsParams::findOne(['id' => $id]);
        $paramsToCategory = FsParamToCategory::find()->where(['param_id' => $id])->asArray()->all();
        $paramsToCategory = ArrayHelper::map($paramsToCategory, 'category_id', 'param_id');
        $paramChailds = FsParams::find()->where(['parent_id' => $id])->asArray()->all();
        $categories = FsCategories::find()->select('id,name,parent_id,atg')->where(['status'=>1])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->renderAjax('param-copy-popup', ['param' => $param, 'paramChailds' => $paramChailds, 'paramsToCategory' => $paramsToCategory, 'categories' => $categories, 'type' => 'copy']);
    }
    public function actionMeasurementCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $measurement = FsMeasurements::findOne(['id' => $id]);
        return $this->renderAjax('measurement-copy-popup', ['measurement' => $measurement]);
    }
    public function actionStoreCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $stores = FsStores::findOne(['id' => $id]);
        return $this->renderAjax('store-copy-popup', ['store' => $stores]);
    }
    public function actionPartnerCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $partner = FsUsers::findOne(['id' => $id]);
        return $this->renderAjax('partner-copy-popup', ['partner' => $partner]);
    }
    public function actionUserCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $user = Users::findOne(['id' => $id]);
        return $this->renderAjax('user-copy-popup', ['user' => $user]);
    }
    public function actionPageCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $page = FsPages::findOne(['id' => $id]);
        return $this->renderAjax('page-copy-popup', ['page' => $page]);
    }
    public function actionBannerCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $banner = FsBanners::findOne(['id' => $id]);
        return $this->renderAjax('banner-copy-popup', ['banner' => $banner]);
    }
    public function actionProductCopy() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $product = FsProducts::findOne(['id' => $id]);
        $measurement = FsMeasurements::find()->where(['status' => 1])->all();
        $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        $paramsOrigin = FsProductParams::find()->where(['product_id' => $id])->asArray()->all();
        $params = ArrayHelper::map($paramsOrigin, 'param_id', 'value');
        return $this->renderAjax('product-copy-popup', ['product' => $product, 'categories' => $categories, 'measurement' => $measurement, 'params' => $params,'paramsOrigin'=>$paramsOrigin]);
    }
    /* EDITE BLOCK */
    public function actionProductEdite() {
//        if (Yii::$app->user->isGuest) {
//            $this->redirect(['admin/login']);
//        }
        $id = intval($_GET['id']);
        $product = FsProducts::findOne(['id' => $id]);
        $measurement = FsMeasurements::find()->where(['status' => 1])->all();
        $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $paramsOrigin = FsProductParams::find()->where(['product_id' => $id])->asArray()->all();
        $params = ArrayHelper::map($paramsOrigin, 'param_id', 'value');
        $categories = $this->getresultTree($categories, 0);
        return $this->renderAjax('product-edite-popup', ['product' => $product, 'categories' => $categories, 'measurement' => $measurement, 'params' => $params, 'paramsOrigin' => $paramsOrigin]);
    }
    public function actionParamsEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $param = FsParams::findOne(['id' => $id]);
        $paramsToCategory = FsParamToCategory::find()->where(['param_id' => $id])->asArray()->all();
        $paramsToCategory = ArrayHelper::map($paramsToCategory, 'category_id', 'param_id');
        $paramChailds = FsParams::find()->where(['parent_id' => $id])->asArray()->all();
        $categories = FsCategories::find()->select('id,name,parent_id,atg')->where(['status'=>1])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->renderAjax('param-edite-popup', ['param' => $param, 'paramChailds' => $paramChailds, 'paramsToCategory' => $paramsToCategory, 'categories' => $categories, 'type' => 'copy']);
    }
    public function actionCategoryEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $category = FsCategories::findOne(['id' => $id]);
        $categoryLangs = FsCategoriesLang::findOne(['category_id' => $id]);
        $categories = FsCategories::find()->select('id,name,parent_id')->where(['status'=>1])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->renderAjax('category-edite-popup', ['category' => $category, 'categoryLangs' => $categoryLangs, 'categories' => $categories]);
    }
    public function actionMeasurementEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $measurement = FsMeasurements::findOne(['id' => $id]);
        return $this->renderAjax('measurement-edite-popup', ['measurement' => $measurement]);
    }
    public function actionBannerEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $banner = FsBanners::findOne(['id' => $id]);
        return $this->renderAjax('banner-edite-popup', ['banner' => $banner]);
    }
    public function actionTextEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $text = FsTexts::findOne(['id' => $id]);
        return $this->renderAjax('text-edite-popup', ['text' => $text]);
    }
    public function actionOrderEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $order = FsOrders::findOne(['id' => $id]);
        return $this->renderAjax('order-edite-popup', ['order' => $order]);
    }
    public function actionPageEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $page = FsPages::findOne(['id' => $id]);
        return $this->renderAjax('page-edite-popup', ['page' => $page]);
    }
    public function actionStoreEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $stores = FsStores::findOne(['id' => $id]);
        return $this->renderAjax('store-edite-popup', ['store' => $stores]);
    }
    public function actionPartnerEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $partner = FsUsers::findOne(['id' => $id]);
        return $this->renderAjax('partner-edite-popup', ['partner' => $partner]);
    }
    public function actionUserEdite() {
        if (Yii::$app->user->isGuest) {
            $this->redirect(['admin/login']);
        }
        $id = intval($_GET['id']);
        $user = Users::findOne(['id' => $id]);
        return $this->renderAjax('user-edite-popup', ['user' => $user]);
    }
      /* DISABLE BLOCK */
    public function actionMeasurementDisable() {
        $id = intval($_GET['id']);
        $item = FsMeasurements::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
    }
    public function actionPartnerDisable() {
        $id = intval($_GET['id']);
        $item = FsUsers::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $prods = FsProducts::find()->where(['user_id'=>$id])->all();
        if(!empty($prods)){
            foreach ($prods as $prod => $prod_val){
                $prod_val->status = $item->status;
                $prod_val->save(false);
            }
        }
        $item->save(false);
        return true;
    }
    public function actionBrandDisable() {
        $id = intval($_GET['id']);
        $item = FsBrands::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
    }
    public function actionOrderChange() {
        $id = intval($_GET['id']);
        $state = intval($_GET['state']);
        $item = FsOrders::findOne(['id' => $id]);
        if ($state) {
            $item->status = $state;
        }
        $item->save(false);
        return true;
    }
    public function actionStoreDisable() {
        $id = intval($_GET['id']);
        $item = FsStores::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
    }
    public function actionPageDisable() {
        $id = intval($_GET['id']);
        $item = FsPages::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
    }
    public function actionUserDisable() {
        $id = intval($_GET['id']);
        $item = Users::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
    }
    public function actionBannerDisable() {
        $id = intval($_GET['id']);
        $item = FsBanners::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
    }
    public function actionProductDisable() {
        $id = intval($_GET['id']);
        $item = FsProducts::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
    }
    public function actionCategoryDisable() {
        $id = intval($_GET['id']);
        $category = FsCategories::findOne(['id' => $id]);
        if ($category->status) {
            $category->status = 0;
        }
        else {
            $category->status = 1;
        }
        $category->save();
        return true;
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(array('orders'));
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(array('orders'));
        }
        $model->password = '';
        return $this->render('login', ['model' => $model, ]);
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public  function  transLateURRL($rdata){

        $rdata = str_replace(' ', '-', $rdata);
        $rdata = str_replace('×', '_', $rdata);
        $rdata = str_replace('^', '_', $rdata);
        $rdata = str_replace('%', '_', $rdata);
        $rdata = str_replace('(', '_', $rdata);
        $rdata = str_replace(')', '_', $rdata);
        $rdata = str_replace('/', '_', $rdata);
        $rdata = str_replace('\\', '_', $rdata);
        $rdata = str_replace('#', '_', $rdata);
        $rdata = str_replace('՝', '', $rdata);
        $rdata = str_replace('։', '_', $rdata);
        $rdata = str_replace(',', '_', $rdata);
        $rdata = str_replace('-', '_', $rdata);
        $rdata = str_replace('$', '_', $rdata);
        $rdata = str_replace('@', '_', $rdata);
        $rdata = str_replace('&', '_', $rdata);
        $rdata = str_replace('=', '_', $rdata);
        $rdata = str_replace(',', '_', $rdata);
        $rdata = str_replace('«', '', $rdata);
        $rdata = str_replace('»', '', $rdata);
        $rdata = str_replace('֊', '_', $rdata);
        $rdata = str_replace('__', '_', $rdata);
        $rdata = str_replace('+', '_', $rdata);
        $rdata = str_replace('"', '_', $rdata);
        $rdata = str_replace("'", '_', $rdata);
        $cyr = [
            'ա','բ','վ','գ','դ','ե','ժ','զ','ի','յ','կ','լ','մ','ն','օ','պ',
            'ռ','ս','տ','ու','փ','խ','ց','չ','շ','է','ը','ո','ր','և','ք','ջ','ծ','ղ','հ','ճ','թ','ֆ','ձ','ւ',
            'Ա','Բ','Վ','Գ','Դ','Ե','Ժ','Զ','Ի','Յ','Կ','Լ','Մ','Ն','Օ','Պ',
            'Ռ','Ս','Տ','ՈՒ','Փ','Խ','Ց','Չ','Շ','Է','Ը','Ո','Ր','և','Ք','Ջ','Ծ','Ղ','Հ','Ճ','Թ','Ֆ','Ձ'
        ];

        $lat = [
            'a','b','v','g','d','e','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','ph','x','ts','ch','sh','e','y','o','r','ev','q','j','ts','x','h','j','t','f','zh','v',
            'A','B','V','G','D','E','ZH','Z','I','Y','K','L','M','N','O','P',
            'R','S','T','U','PH','X','TS','CH','SH','E','Y','VO','R','EV','Q','J','TS','X','H','J','T','F','ZH'
        ];

        $rdata = str_replace($cyr, $lat, $rdata);
        return strtolower($rdata);
    }
    public function actionDiscounts(){
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $saleGroup = new FsDiscountGroups();
                $saleGroup->load($post);
                $saleGroup->user_id = Yii::$app->fsUser->id;
                $saleGroup->status = 1; 
                $saleGroup->save(false);
                $this->redirect(['discounts', 'success' => 'true', 'id' => 'key1']);
            
        } else if ($post && $post['add-discount']) {
            $discount = new FsDiscounts();
            $discount->load($post);
            $discount->user_id = Yii::$app->fsUser->id;
            $discount->save(false);

            $users = FsUsers::find()->select(['id'])->where(['is_buyer'=>1,'status'=>1])->all();
            foreach ($users as $us) {
                $note = new FsNotifications();
                $note->message = 'Համակարգում ավելացել է նոր զեղչ ՝ <b>'.$discount->name.'</b>';
                $note->sender_id = Yii::$app->fsUser->id;
                $note->recipient_id = $us->id;
                $note->url = '';
                $note->type = 1;
                $note->save();
            }
            $this->redirect(['discounts', 'success' => 'true', 'id' => 'key1']);
        }
         $categories = FsCategories::find()->select('id,name,parent_id,atg')->where(['status'=>1])->asArray()->all();
         $categories = $this->getresultTree($categories, 0);
        $discounts = FsDiscounts::find()->all();
        return $this->render('discounts', [ 'discounts' => $discounts,'categories'=>$categories]);
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
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect(array('login'));
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
}
