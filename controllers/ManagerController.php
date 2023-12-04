<?php

namespace app\controllers;
use app\models\FsBanners;
use app\models\FsBrands;
use app\models\FsBrandToCategory;
use app\models\FsCart;
use app\models\FsDiscountConditions;
use app\models\FsDiscounts;
use app\models\FsNotifications;
use app\models\FsOrders;
use app\models\FsPages;
use app\models\FsParamToCategory;
use app\models\FsProductParams;
use app\models\FsProducts;
use app\models\FsProductVariations;
use app\models\FsSettings;
use app\models\FsDiscountGroups;
use app\models\FsStores;
use app\models\FsUsers;
use app\models\FsUserToBrand;
use app\models\User;
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
class ManagerController extends Controller {
    public function beforeAction($action) {
        $this->layout = 'manager';
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    /* PAGES BLOCK */
    /*HOME ACTION*/
    public function actionIndex() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $this->redirect(array('orders'));
        //  return $this->render('index');
    }
    /*PRODUCTS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionProducts() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
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

            $product->provider_id = Yii::$app->fsUser->id;
            $product->user_id = Yii::$app->fsUser->id;
            $product->price = $post['price'];
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
            } else if ($post['old_video']) {
                $product->video = $post['old_video'];
            }
            $product->save(false);
            $product->url = $this->transLateURRL($product->name).'_'.$product->id;
            $product->save(false);
            if($post['is_new']) {
                $users = FsUsers::find()->select(['id'])->where(['is_buyer'=>1,'status'=>1])->all();
                foreach ($users as $us) {
                    $note = new FsNotifications();
                    $note->message = 'Համակարգում գրանցվել է նոր ապրանք՝ <b>'.$product->name.'</b>';
                    $note->sender_id = Yii::$app->fsUser->id;
                    $note->recipient_id = $us->id;
                    $note->url = '/product/'.$product->url;
                    $note->type = 1;
                    $note->save();
                }
            }
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
        }
        else if ($post && $post['edite']) {
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
            $product->is_tax = $post['is_tax'];
            $product->tax_procent = $post['tax_procent'];
            $product->is_env = $post['is_env'];
            $product->price = $post['price'];
            $product->env_procent = $post['anim_procent'];

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
            $product->url = $this->transLateURRL($product->name).'_'.$product->id;
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
        }   else if ($post && isset($post['uploads'])) {
            if (!empty($_FILES['products']) && $_FILES["products"]["name"]) {
                $tmp_name = $_FILES["products"]["tmp_name"];
                $name = time() . basename($_FILES["products"]["name"]);
                move_uploaded_file($tmp_name, "web/uploads/$name");
            }
            
            $path = "web/uploads/$name";
            require_once 'PHPExcel/Classes/PHPExcel.php';

            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($path);
            $objWorksheet = $objPHPExcel->getActiveSheet();

            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
            $rows = array();

            for ($row = 1; $row <= $highestRow; ++$row) {
                for ($col = 0; $col <= $highestColumnIndex; ++$col) {
                    $rows[intval($col)] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                }
                if($row != 1) {
                    $product = new FsProducts();
                    $product->atg = $rows[0];
                    $product->name = $rows[1];
                    $brand = FsBrands::find()->where(['name' => $rows[5]])->one();
                    if ($brand) {
                        $product->brand_id = $brand->id;
                    }
                    $product->category_id = $post['category_id'];
                    $product->user_id = Yii::$app->fsUser->id;
                    $product->provider_id = Yii::$app->fsUser->id;
                    $product->save(false);
                }

            }
        }
        
        $page = $_GET['page'];
        $limit = 10;
        $offset = 0;
        if ($page) {
            $offset = $limit * $page;
        }
        $measurement = FsMeasurements::find()->where(['status' => 1])->all();
        $_GET['user_id']= Yii::$app->fsUser->id;

        if (!isset($_GET['search'])) {
             $products = FsProducts::find()->where(['provider_id'=>intval($_GET['user_id'])])->orderBy(['order_num' => SORT_ASC])->all();
        }  else {
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
            if (!empty($_GET['category_id'])) {
                $products = FsProducts::find()->where($cond)->andWhere(['category_id' => $_GET['category_id']])->andWhere(['provider_id'=>intval($_GET['user_id'])])->all();
            }
            else {
                $products = FsProducts::find()->where($cond)->andWhere(['provider_id'=>intval($_GET['user_id'])])->all();
            }
        }
        $total = FsProducts::find()->where($cond)->andWhere(['provider_id'=>intval($_GET['user_id'])])->count();
        $categories = FsCategories::find()->select('id,name,parent_id,status,atg')->where(['status'=>1])->orderBy(['order_num' => SORT_ASC])->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->render('products', ['categories' => $categories, 'measurement' => $measurement, 'products' => $products, 'total' => $total]);
    }
    /*PARTNERS PAGE ACTION EDITE|DELETE|CREATE|COPY*/
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
    public function actionOrders() {


        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
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
        $_GET['user_id'] = Yii::$app->fsUser->id;

        if(!$_GET['status']){
            $cond = ['seller_id'=>$_GET['user_id']];
        } else {
            $cond = ['seller_id'=>$_GET['user_id'],'status'=>$_GET['status']];
        }
        if($_GET['date_start']  ){
            $sql .= ' AND `created_at`>"'.$_GET['date_start'].'" ';
        }
        if($_GET['date_end']  ){
            $sql .= ' AND `created_at`<"'.$_GET['date_end'].'"';
        }

        $orders = FsOrders::find()->where($cond)->andWhere($sql)->orderBy(['id' => SORT_DESC])->all();
        $total = FsOrders::find()->where($cond)->andWhere($sql)->count();
        return $this->render('orders', ['orders' => $orders, 'total' => $total]);
    }
    public function actionStores() {
        if (Yii::$app->fsUser->isGuest){
            return $this->redirect('/sign-in');
        }
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $stores = new FsStores();
            $stores->load($post);
                $stores->user_id = Yii::$app->fsUser->identity->id;
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
            return $this->redirect(['stores', 'success' => 'true', 'id' => 'key' . $stores->id]);
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
            return $this->redirect(['stores', 'success' => 'true', 'id' => 'key' . $stores->id]);
        }
        $stores = FsStores::find()->orderBy(['order_num' => SORT_ASC])->where(['user_id'=>Yii::$app->fsUser->identity->id])->all();
        return $this->render('stores', ['stores' => $stores]);
    }
    /*Brands PAGE ACTION EDITE|DELETE|CREATE|COPY*/
    public function actionManagment() {


        if (Yii::$app->fsUser->isGuest) {
             return $this->redirect('/sign-in');
        }
        $post = Yii::$app->request->post();
        if ($post && $post['addposition']) {
            $FsUserToBrand = new FsUserToBrand();
            $FsUserToBrand->load($post);
            $FsUserToBrand->company_id = Yii::$app->fsUser->id;
            $FsUserToBrand->save(false);
            $this->redirect(['managment', 'success' => 'true', 'id' => 'key1']);
        } else if ($post && $post['edite']) {
            $post['items'] = substr($post['items'],0,-1);
            $items = explode(',',$post['items']);

            if(!empty($items)){
                foreach ($items as $item => $item_val){
                    $FsUserToBrand = FsUserToBrand::findOne(['id'=>$item_val]);
                    $FsUserToBrand->customer_id = $post['customer_id'];
                    $FsUserToBrand->save(false);
                }
            }
            $this->redirect(['managment', 'success' => 'true', 'id' => 'key1']);
        }

        $page = $_GET['page'];
        $limit = 10;
        $offset = 0;
        $cond = [];
        if ($page) {
            $offset = $limit * $page;
        }
        $sql = '';
        $_GET['user_id'] = Yii::$app->fsUser->id;
        $partners = FsUsers::findOne(Yii::$app->fsUser->id)->buyerPartners;
        $manag = FsUserToBrand::find()->where(['company_id'=>Yii::$app->fsUser->id])->orderBy(['id' => SORT_DESC])->all();
        $cats = Yii::$app->fsUser->identity->categories;
        if($cats){
            $cats = explode(';',$cats);
        }

        $brands = FsBrandToCategory::find()->where(['category_id'=>$cats])->orderBy(['id' => SORT_DESC])->groupBy('brand_id')->all();
        $total = FsUserToBrand::find()->where(['company_id'=>Yii::$app->fsUser->id])->count();
        $workers = Users::find()->where(['company_id'=>Yii::$app->fsUser->id])->asArray()->all();

        return $this->render('managment', ['manag' => $manag, 'total' => $total,'partners'=>$partners,'workers'=>$workers,'brands'=>$brands]);
    }
    public function actionPartners() {
        if (Yii::$app->fsUser->isGuest){
           return $this->redirect('/sign-in');
        }
        $user = Yii::$app->fsUser->identity;

        $partners = $user->getSellerPartners(null)->all();
        $partners2 = $user->getBuyerPartners(null)->all();
        $partners = (object) array_merge(
            (array) $partners, (array) $partners2);
        return $this->render('partners', ['partners' => $partners]);
    }
    public function actionManagerEdite() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $id = intval($_GET['id']);
        $partners = FsUsers::findOne(Yii::$app->fsUser->id)->buyerPartners;
        $cats = Yii::$app->fsUser->identity->categories;
        if($cats){
            $cats = explode(';',$cats);
        }
        $manager = FsUserToBrand::findOne(['id'=>$id]);
        $brands = FsBrandToCategory::find()->where(['category_id'=>$cats])->orderBy(['id' => SORT_DESC])->groupBy('brand_id')->all();
        $workers = Users::find()->where(['company_id'=>Yii::$app->fsUser->id])->asArray()->all();
        return $this->renderAjax('manager-edite-popup', ['manager' => $manager,'partners'=>$partners,'workers'=>$workers,'brands'=>$brands]);
    }
    /*SITE PAGES PAGE ACTION EDITE|DELETE|CREATE|COPY*/

    public function actionSettings() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $post = Yii::$app->request->post();
        if ($post && $post['edite']) {
            $settings = FsSettings::findOne(['user_id' => Yii::$app->fsUser->id]);
            if(!$settings){
                $settings = new FsSettings();
            }
            $settings->load($post);
            if(!isset($post['FsSettings']['is_brand'])){
                $settings->is_brand = 0;
            }
            if(!isset($post['FsSettings']['is_free_delivery'])){
                $settings->is_free_delivery = 0;
            }
            $settings->user_id = Yii::$app->fsUser->id;
            $settings->save(false);
            $this->redirect(['settings', 'success' => 'true', 'id' => 'key1']);
        }
        $settings = FsSettings::findOne(['user_id' => Yii::$app->fsUser->id]);
        $users = Users::find()->where(['company_id'=>Yii::$app->fsUser->id])->all();
        return $this->render('settings', ['settings' => $settings, 'users' => $users]);
    }
    public function actionWorkers(){
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $user = new Users();
            $ck = Users::find()->where(['username'=>$post['Users']['username']])->orWhere(['email'=>$post['Users']['email']])->one();
            if(!$ck){
                $user->load($post);
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($post['Users']['password']);
                $user->auth_key = substr($user->password, 0, 30);
                $user->company_id = Yii::$app->fsUser->id;
                $user->role = intval($post['Users']['role']);
                $user->save(false);
               return $this->redirect(['workers', 'success' => 'true', 'id' => 'key1']);
            } else {

               return $this->redirect(['workers', 'success' => 'false','error'=>'true', 'id' => 'key1']);
            }

        }  else if ($post && $post['edite_sec']) {
            $user = Users::findOne(['id'=>intval($post['id'])]);
            $user->load($post);
            if($post['Users']['password']) {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($post['Users']['password']);
            }
            $user->role = intval($post['Users']['role']);
            $user->company_id = Yii::$app->fsUser->id;
            $user->save(false);
            return $this->redirect(['settings', 'success' => 'true', 'id' => 'key1']);
        } else if ($post && $post['add_sec']) {
            $user = new Users();
            $user->load($post);
            if($post['Users']['password']) {
                $user->password = Yii::$app->getSecurity()->generatePasswordHash($post['Users']['password']);
            } else {
                $user->password = $post['old_password'];
            }
            $user->role = intval($post['Users']['role']);
            $user->auth_key = substr($user->password, 0, 30);
            $user->company_id = Yii::$app->fsUser->id;
            $user->save(false);
            return $this->redirect(['settings', 'success' => 'true', 'id' => 'key1']);
        }
        $users = Users::find()->where(['company_id'=>Yii::$app->fsUser->id])->all();
        return $this->render('workers', [ 'users' => $users]);
    }
    
     public function actionDiscounts(){
        $post = Yii::$app->request->post();
        if ($post && $post['add']) {
            $saleGroup = new FsDiscountGroups();
                $saleGroup->load($post);
                $saleGroup->user_id = Yii::$app->fsUser->id;
                $saleGroup->status = 1; 
                $saleGroup->save(false);
               return $this->redirect(['discounts', 'success' => 'true', 'id' => 'key1']);
            
        } else if ($post && $post['add-discount']) {
            echo '<pre>';
            var_dump($post);
            exit;
            $discount = new FsDiscounts();
            $discount->load($post);
            $discount->user_id = Yii::$app->fsUser->id;
            $discount->save(false);

            $discountCondition = new FsDiscountConditions();
            $discountCondition->load($post);
            $discountCondition->discount_id = $discount->id;
            $discountCondition->save(false);
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
            return $this->redirect(['discounts', 'success' => 'true', 'id' => 'key1']);
        }
         $categories = FsCategories::find()->select('id,name,parent_id,atg')->asArray()->all();
         $categories = $this->getresultTree($categories, 0);
        $saleGroups = FsDiscountGroups::find()->where(['user_id'=>Yii::$app->fsUser->id])->all();
        return $this->render('discounts', [ 'saleGroups' => $saleGroups,'categories'=>$categories]);
    }
    public function actionDiscountChange() {
        if (!empty($_GET['id'])) {
            $discount  = FsDiscounts::findOne(['id'=>$_GET['id']]);
            $discount->discount_status =intval($_GET['state']);
            $discount->save();
        }
        return true;
    }
    /*CATEGORIES PAGE ACTION EDITE|DELETE|CREATE|COPY*/
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
                    case 'Banners':
                        $item = FsBanners::findOne(['id' => intval($_POST['orders'][$i]['id']) ]);
                        break;
                }
                $item->order_num = intval($_POST['orders'][$i]['order']);
                $item->save();
            }
        }
        return true;
    }
    public function actionGetProps() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
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
        $paramsToCategory = FsParamToCategory::find()->where(['category_id' => $ids_all])->asArray()->all();
        return $this->renderAjax('get-param', ['paramsToCategory' => $paramsToCategory]);
    }
    public function actionGetItems() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $type__ = $_GET['tp'];
        $mode = 'product_single';
        switch ($type__){
            case '=':
                $mode = 'product_single';
                break;
                case '!=':
                $mode = 'product_single';
                break;
            case 'IN':
                $mode = 'products_all';
                break;
            case 'NOT IN':
                $mode = 'products_all';
                break;
            case 'IN GROUP':
                $mode = 'category_single';
                break;
            case 'NOT IN GROUP':
                $mode = 'category_single';
                break;
            case 'IN GROUP LIST':
                $mode = 'categoryes_all';
                break;
            case 'NOT IN GROUP LIST':
                $mode = 'categoryes_all';
                break;
        }
        if($mode == 'product_single' || $mode == 'products_all' ) {
            if (!isset($_GET['text'])) {
                $products = FsProducts::find()->where(['provider_id' => intval($_GET['seller_id'])])->all();
                return $this->renderAjax('get-items', ['products' => $products]);
            } else {
                if ($_GET['category']) {
                    $products = FsProducts::find()->where(['provider_id' => Yii::$app->fsUser->id])->andWhere(['category_id' => $_GET['category']])->andWhere(['like', 'name', $_GET['text']])->all();
                } else {
                    $products = FsProducts::find()->where(['provider_id' => Yii::$app->fsUser->id])->andWhere(['like', 'name', $_GET['text']])->all();
                }
                return $this->renderAjax('get-items-check', ['products' => $products]);
            }
        } else {

            if ($_GET['category']) {
                $categories = FsCategories::find()->where(['parent_id' => $_GET['category']])->andWhere(['like', 'name', $_GET['text']])->all();
            } else {
                $categories = FsCategories::find()->where(['like', 'name', $_GET['text']])->all();
            }
            return $this->renderAjax('get-cats-check', ['categories' => $categories]);
        }
    }
    public function actionGetPartners() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $user = Yii::$app->fsUser->identity;
        $partners = $user->getBuyerPartners($_GET['text'])->all();
        return $this->renderAjax('get-partners', ['partners' => $partners]);
    }
    /* COPY BLOCK */
    public function actionParamsCopy() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $id = intval($_GET['id']);
        $param = FsParams::findOne(['id' => $id]);
        $paramsToCategory = FsParamToCategory::find()->where(['param_id' => $id])->asArray()->all();
        $paramsToCategory = ArrayHelper::map($paramsToCategory, 'category_id', 'param_id');
        $paramChailds = FsParams::find()->where(['parent_id' => $id])->asArray()->all();
        $categories = FsCategories::find()->select('id,name,parent_id,atg')->asArray()->all();
        $categories = $this->getresultTree($categories, 0);
        return $this->renderAjax('param-copy-popup', ['param' => $param, 'paramChailds' => $paramChailds, 'paramsToCategory' => $paramsToCategory, 'categories' => $categories, 'type' => 'copy']);
    }

    public function actionUserCopy() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $id = intval($_GET['id']);
        $user = Users::findOne(['id' => $id]);
        return $this->renderAjax('user-copy-popup', ['user' => $user]);
    }

    public function actionProductCopy() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
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
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
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
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
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


    public function actionOrderEdite() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $id = intval($_GET['id']);
        $order = FsOrders::findOne(['id' => $id]);
        return $this->renderAjax('order-edite-popup', ['order' => $order]);
    }

    public function actionUserEdite() {
        if (Yii::$app->fsUser->isGuest) {
            return $this->redirect('/sign-in');
        }
        $id = intval($_GET['id']);
        $user = Users::findOne(['id' => $id]);
        return $this->renderAjax('user-edite-popup', ['user' => $user]);
    }

    /* DISABLE BLOCK */
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
    public function actionManagerDisable() {
        $id = intval($_GET['id']);
        $item = FsUserToBrand::findOne(['id' => $id]);
        if ($item->status) {
            $item->status = 0;
        }
        else {
            $item->status = 1;
        }
        $item->save(false);
        return true;
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
        Yii::$app->fsUser->logout();
        return $this->redirect('/sign-in');
    }
      public function actionSignIn() {
        Yii::$app->fsUser->logout();
          return $this->redirect('/sign-in');
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
}
