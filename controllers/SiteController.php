<?php

namespace app\controllers;

use app\models\FsBlogs;
use app\models\FsCategoriesLang;
use app\models\FsDiscounts;
use app\models\FsParamToCategory;
use app\models\FsSettings;
use app\models\FsStores;
use app\models\FsTexts;
use app\models\FsUserToBrand;
use app\models\FsViewHistory;
use app\models\FsProductParams;
use mysql_xdevapi\Exception;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\FsLoginForm;
use app\models\ContactForm;
use app\models\FsUsers;

use app\models\FsProducts;
use app\models\FsCategories;
use app\models\FsCart;
use app\models\FsOrders;
use app\models\FsWishlist;
use app\models\FsTemplates;
use app\models\FsPages;
use yii\helpers\Url;
use app\models\FsNotifications;
use app\models\FsBanners;

class SiteController extends Controller
{
    public $layout = '../lte/layouts/site';
    public function beforeAction($action)
    {
        if(Yii::$app->fsUser->identity->id || $action->id === 'sign-in') {
            if (!isset($_COOKIE['language'])) {
                setcookie('language', 'hy', time() + (365 * 24 * 60 * 60));
                $lng = 'am';
                $this->refresh();
            }
            if ($_COOKIE['language'] == 'hy') {
                $lng = 'am';
            } else if (isset($_COOKIE['language'])) {
                $lng = $_COOKIE['language'];
            } else {
                $_COOKIE['language'] = 'hy';
                $lng = 'am';
            }
            $GLOBALS['lang_'] = $lng;
            $txt = FsTexts::find()->all();
            $txt = ArrayHelper::map($txt, 'slug', 'text_' . $lng);
            $GLOBALS['text'] = $txt;
            $this->enableCsrfValidation = false;
            return parent::beforeAction($action);
        }else{
            return $this->redirect('sign-in');
        }
    }

    /**
     * {@inheritdoc}
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::class,
//                'except' => ['login'],
//                'rules' => [
//                    [
//                        'allow' => false,
////                        'actions' => ['index', 'create','ApiOrder'],
//                        'roles' => ['?'], // Запретить доступ для гостей (неавторизованных пользователей)
//                    ],
//                    [
//                        'allow' => true,
//                        'roles' => ['@'], // Разрешить доступ для авторизованных пользователей
//                    ],
//                ],
//                'denyCallback' => function ($rule, $action) {
//                    return $this->redirect(['site/login']);
//                },
//            ],
//            'verbs' => [
//                'class' => VerbFilter::class,
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionGetmessages(){
        $challenge = $_REQUEST['hub_challenge'];
$verify_token = $_REQUEST['hub_verify_token'];

// Set this Verify Token Value on your Facebook App 
if ($verify_token === 'testtoken') {
  echo $challenge;
}

$input = json_decode(file_get_contents('php://input'), true);

// Get the Senders Graph ID
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];

// Get the returned message
$message = $input['entry'][0]['messaging'][0]['message']['text'];

//API Url and Access Token, generate this token value on your Facebook App Page
$url = 'https://graph.facebook.com/v2.6/me/messages?access_token=<ACCESS-TOKEN-VALUE>';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"' . $sender . '"
    }, 
    "message":{
        "text":"The message you want to return"
    }
}';

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

//Execute the request but first check if the message is not empty.
if(!empty($input['entry'][0]['messaging'][0]['message'])){
  $result = curl_exec($ch);
}
    }
    public function actionSwitchLanguage($lang)
    {
        setcookie('language', $lang, time() + (365 * 24 * 60 * 60),"/");
        return $this->goBack(Yii::$app->request->referrer);
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'site';
        $cats = Yii::$app->fsUser->identity->categories;
        if($cats && false){
            $cats = explode(';',$cats);
            $categories = FsCategories::find()->where(['parent_id' => null])->andWhere(['id'=>$cats])->andWhere(['status' => 1])->all();
        }else{
            $categories = FsCategories::find()->where(['parent_id' => null])->andWhere(['status' => 1])->all();
        }
        $banners = FsBanners::find()->where(['status' => 1])->andWhere(['type_' => 0])->orderBy(['order_num' => SORT_ASC])->all();
        $offers = FsBanners::find()->where(['status' => 1])->andWhere(['type_' => 1])->orderBy(['order_num' => SORT_ASC])->all();
//        $partners = FsUsers::find()->where(['status' => 1])->andWhere(['is_seller'=>1])->orderBy(['order_num' => SORT_ASC])->limit(15)->all();
        $partners = FsStores::find()->where(['status' => 1])->orderBy(['order_num' => SORT_ASC])->limit(15)->all();
        $view_history  = FsProducts::find()->select('id')->where(['status'=>1,'send_notice'=>1])->orderBy(['id'=>SORT_DESC])->limit(10)->all();
        return $this->render('index', ['categories' => $categories, 'banners' => $banners, 'offers' => $offers,'view_history'=>$view_history,'partners'=>$partners]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $model = new FsLoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $this->redirect([(Yii::$app->fsUser->identity->is_buyer == 1 ? '/' : '/')]);
        } else {
            return $this->redirect('/sign-in?wrong_password');
        }
    }

    public function actionRegister()
    {
        $model = new FsUsers();
        $post = Yii::$app->request->post();
        if ($model->load($post, '') && $model->validate()) {
            $model->password = $model->setPassword($post['password']);
            $isset =  FsUsers::find()->where(['email'=>$post['email']])->one();
            if(!$isset){
               $model->save();
            }
            $model = new FsLoginForm();
            $model->load(Yii::$app->request->post(), '');
            if ($model->login()) {
                return $this->redirect(['personal']);
            } else {
                return $this->redirect(['sign-in']);
            }
        }
        return $this->redirect(['sign-up']);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {

        Yii::$app->fsUser->logout();
        $session = Yii::$app->session;
        $session->destroy();
        return $this->goHome();
    }

    public function actionPersonal()
    {
        $this->layout = 'site';
        $user = Yii::$app->fsUser->identity;
        $categories = FsCategories::find()->select('id, name')->where(['parent_id' => null])->andWhere(['status' => 1])->asArray()->all();
        return $this->render('personal', ['user' => $user, 'categories' => $categories]);
    }
   public function actionMobilePersonal()
    {

        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            return $this->render('personal_mobile', ['user' => $user, 'categories' => $categories]);
        }

        return $this->redirect(['sign-in']);
    }
    public function actionMobileSupplier()
    {
        $this->layout = 'site';
        $user = Yii::$app->fsUser->identity;
        return $this->render('personal_mobile', ['user' => $user, 'categories' => $categories]);
    }
    public function actionNews($url = null)
    {
        $this->layout = 'site';
        $user = Yii::$app->fsUser->identity;
        if($url){
            $news = FsBlogs::find()->where(['url'=>$url])->one();
            return $this->render('news-block', ['user' => $user, 'item' => $news]);
        }else{
            $news = FsBlogs::find()->all();
            return $this->render('news', ['user' => $user, 'news' => $news]);
        }
    }

    public function actionPersonalHistory($page = 1, $state = null, $fromdate = null, $todate = null)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $orders = FsOrders::find()->where(['buyer_id' => $user->id]);
            if ($state) {
                $orders = $orders->andWhere(['status' => $state]);
            }
            if ($fromdate) {
                $orders = $orders->andWhere(['>=', 'created_at', date('Y-m-d', strtotime(str_replace('/', '-', $fromdate)))]);
            }
            if ($todate) {
                $orders = $orders->andWhere(['<=', 'created_at', date('Y-m-d', strtotime(str_replace('/', '-', $todate)))]);
            }
            $orders = $orders->limit(10) ->offset(($page-1) * 10)->all();
            return $this->render('history', ['user' => $user, 'orders' => $orders]);
        }

        return $this->redirect(['sign-in']);
    }

    public function actionPersonalHistoryDetails($id)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $order = FsOrders::findOne($id);
            return $this->render('order-details', ['user' => $user, 'order' => $order]);
        }
        return $this->redirect(['sign-in']);
    }

    public function actionPersonalPartners($search = null)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;

            $categories = FsCategories::find()->where(['status'=>'1','parent_id'=>null])->all();
            return $this->render('partners', ['user' => $user, 'categories'=>$categories]);
        }

        return $this->redirect(['sign-in']);
    }

    public function actionPersonalContacting($page = 1)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $contacts = FsUsers::find()->where(['!=', 'id', $user->id])->andWhere(['status' => 1])->limit(10)->offset(($page-1) * 10)->all();
            return $this->render('contacting', ['user' => $user, 'contacts' => $contacts]);
        }

        return $this->redirect(['sign-in']);
    }
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
    public function actionPersonalSales()
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;

            $get = Yii::$app->request->get();
            $state = $get['state'];
            $fromdate = $get['state'];
            $todate = $get['todate'];
            $page = 1 ;
            $requests = FsDiscounts::find();
            if(isset($state)) {
                $requests = $requests->andWhere(['discount_status' => $state]);
            }
            if ($fromdate) {
                $requests = $requests->andWhere(['>=', 'start_date', date('Y-m-d', strtotime(str_replace('/', '-', $fromdate)))]);
            }
            if ($todate) {
                $requests = $requests->andWhere(['<=', 'start_date', date('Y-m-d', strtotime(str_replace('/', '-', $todate)))]);
            }
            $requests = $requests->limit(10)->offset(($page-1) * 10)->all();
            return $this->render('sales', ['user' => $user,'discounts'=>$requests]);
        }
        return $this->redirect(['sign-in']);
    }

    public function actionPersonalRequests($page = 1, $state = null, $fromdate = null, $todate = null)
    {
        $this->layout = 'site';
        $user = Yii::$app->fsUser->identity;
        return $this->render('requests', ['user' => $user, 'requests' => $requests]);
    }

    public function actionPersonalTemplates($page = 1)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $templates = FsTemplates::find()->where(['user_id' => $user->id])->limit(10)->offset(($page-1) * 10)->all();
            $total = FsTemplates::find()->where(['user_id' => $user->id])->count();
            return $this->render('templates', ['user' => $user, 'templates' => $templates,'total'=>$total]);
        }
        return $this->redirect(['sign-in']);
    }

    public function actionPersonalWishlist()
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $res = FsWishlist::find()->select('provider_id')->groupBy('provider_id')->where(['user_id'=>Yii::$app->fsUser->identity->id])->asArray()->all();
            return $this->render('wishlist',['providers'=>$res,'user' => $user]);
        }
        return $this->redirect(['sign-in']);
    }

    public function actionSupplier()
    {
        $this->layout = 'site';
        $user = Yii::$app->fsUser->identity;
        $categories = FsCategories::find()
            ->select('fs_categories.id, fs_categories.name, fs_categories_lang.*')
            ->leftJoin('fs_categories_lang', 'fs_categories_lang.category_id = fs_categories.id')
            ->where(['parent_id' => null])
            ->andWhere(['status' => 1])
            ->asArray()
            ->all();
        return $this->render('personal', ['user' => $user, 'categories' => $categories]);
    }

    public function actionSupplierProcessing($page = 1, $state = null, $fromdate = null, $todate = null)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $orders = FsOrders::find()->where(['seller_id' => $user->id]);
            if ($state) {
                $orders = $orders->andWhere(['status' => $state]);
            }
            if ($fromdate) {
                $orders = $orders->andWhere(['>=', 'created_at', date('Y-m-d', strtotime(str_replace('/', '-', $fromdate)))]);
            }
            if ($todate) {
                $orders = $orders->andWhere(['<=', 'created_at', date('Y-m-d', strtotime(str_replace('/', '-', $todate)))]);
            }

            $orders = $orders->limit(10) ->offset(($page-1) * 10)->all();
            return $this->render('processing', ['user' => $user, 'orders' => $orders]);
        }

        return $this->redirect(['sign-in']);
    }

    public function actionSupplierProcessingDetails($id)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $order = FsOrders::findOne($id);
            return $this->render('processing-details', ['user' => $user, 'order' => $order]);
        }
        return $this->redirect(['sign-in']);
    }

    public function actionSupplierDealers($search = null)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $categories = FsCategories::find()->where(['status'=>'1','parent_id'=>null])->all();
            return $this->render('dealers', ['user' => $user, 'categories'=>$categories]);
        }

        return $this->redirect(['sign-in']);
    }

    public function actionSupplierWorkbook($page = 1)
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            $contacts = FsUsers::find()->where(['!=', 'id', $user->id])->andWhere(['status' => 1])->limit(10)->offset(($page-1) * 10)->all();
            return $this->render('workbook', ['user' => $user, 'contacts' => $contacts]);
        }

        return $this->redirect(['sign-in']);
    }

    public function actionSupplierOffers()
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;

            $get = Yii::$app->request->get();
            $state = $get['state'];
            $fromdate = $get['fromdate'];
            $todate = $get['todate'];
            $page = 1 ;
            $requests = FsDiscounts::find()->where(['user_id' => $user->id]);
            if(isset($state)) {
                $requests = $requests->andWhere(['discount_status' => $state]);
            }
            if ($fromdate) {
                $requests = $requests->andWhere(['>=', 'start_date', date('Y-m-d', strtotime(str_replace('/', '-', $fromdate)))]);
            }
            if ($todate) {
                $requests = $requests->andWhere(['<=', 'start_date', date('Y-m-d', strtotime(str_replace('/', '-', $todate)))]);
            }
            $requests = $requests->limit(10)->offset(($page-1) * 10)->all();
            return $this->render('offers', ['user' => $user,'discounts'=>$requests]);
        }

        return $this->redirect(['sign-in']);
    }

    public function actionSupplierRequests($page = 1, $state = null, $fromdate = null, $todate = null)
    {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            return $this->render('suppliers_requests', ['user' => $user, 'requests' => $requests]);
    }

    public function actionSupplierWishlist()
    {
        if (!Yii::$app->fsUser->isGuest) {
            $this->layout = 'site';
            $user = Yii::$app->fsUser->identity;
            return $this->render('wishlist', ['user' => $user]);
        }
        return $this->redirect(['sign-in']);
    }


    public function actionUpdateUser()
    {
        $post = Yii::$app->request->post();
        $user = Yii::$app->fsUser->identity;
        $user = FsUsers::findIdentity($user->id);

        if (strlen($post['password']) > 0) {
            $user->password = $user->setPassword($post['password']);
            $user->save(false);
        }

        if (isset($post['notify']) && $user->notify == 0 && intval($user->is_seller)) {
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
        }

        unset($post['password']);
        if(isset($_FILES['image'])){
            $path = 'web/uploads/users/';
            $file = $path .time().basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                $user->image = $file;
                $user->save(false);
            }
        }

        if (strlen($post['categories']) > 0) {
            $user->categories = $post['categories'];
            $user->company_description = $post['company_description'];
            $user->phone = $post['PHONE'];
            $user->link = $post['link'];
            $user->save(false);
        }
        Yii::$app->session->setFlash('success', 'Հաջողությամբ թարմացվեց');

        return $this->redirect('/personal');
    }

    public function actionBrands($id = null){
        //companydetails
        $this->layout = 'site';
        if($id){
            $brand = FsStores::findOne($id);
            if(!$brand){
                $this->redirect('/404');
            }
            $products = FsProducts::find()->where(['store_id' => $id]);
            if(isset($_GET['price'])){
                $price_range = explode(';',$_GET['price']);
                $fromPrice = $price_range[0];
                $toPrice = $price_range[1];
                $cond_comp= ['BETWEEN','price',$fromPrice,$toPrice];
                $products->andWhere($cond_comp);
            }
            $products = $products->all();
            return $this->render('one-brand',['brand'=> $brand , 'products' => $products]);
        }else{
            $brands = FsStores::find()->where(['parent_id' => null])->all();
            return $this->render('brand',['brands'=> $brands]);
        }
    }
    public function actionCompanyDetails($id)
    {
        $this->layout = 'site';
        $company = FsUsers::findOne($id);
        if(!$company){
            $this->redirect('/404');
        }
        $ct = new FsCategories();
        $cats = FsCategories::find()->select('id,name,parent_id')->where(['status'=>1])->asArray()->all();

        $cond = [];

        $cond_comp = $cond_second = [];

        if(isset($_GET['price'])){
            $price_range = explode(';',$_GET['price']);
            $fromPrice = $price_range[0];
            $toPrice = $price_range[1];
            $cond_comp= ['BETWEEN','price',$fromPrice,$toPrice];
        }
        if(isset($_GET['param'])){
            $cond_params= $_GET['param'];
            $products = FsProductParams::find()->select('product_id as id')->where(['value'=>$cond_params])->asArray()->all();
            $new_arr = [];
            if(!empty($products)){
                foreach ($products as $product => $prod_val){
                    $new_arr[] = $prod_val['id'];
                }
            }
            $cond_second= ['id'=>$new_arr];
        }

        if(isset($_GET['category'])){
            $chailds = $ct->getchildrens($cats,intval($_GET['category']));
            $chailds[] = intval($_GET['category']);
            $cond = ['category_id' =>$chailds];
            $categories = $products = FsProducts::find()->where(['provider_id'=>$company->id])->andWhere(['status'=>1])->andWhere($cond)->andWhere($cond_comp)->andWhere($cond_second)->all();
        } else {
                $cats__ = Yii::$app->fsUser->identity->categories;
                if($cats__){
                    $cats__ = explode(';',$cats__);
                    array_pop($cats__);
                    $ids_all = [];
                    if(!empty($cats__)){
                        for ($i = 0; $i < count($cats__);$i++){
                            $ids_all = array_merge($ids_all,$ct->getchildrens($cats,intval($cats__[$i])));
                            $ids_all[] = intval($cats__[$i]);
                        }
                    }
                    $cond = ['category_id' =>$ids_all];

                    $products = FsProducts::find()->where(['provider_id'=>$company->id])->andWhere($cond)->andWhere($cond_comp)->andWhere($cond_second)->andWhere(['status'=>1])->all();
                }

            $paramsToCategory = FsParamToCategory::find()->where(['category_id' => $ids_all])->groupBy('param_id')->asArray()->all();

        }
        
        return $this->render('company', ['company' => $company,'products' => $products, 'paramsToCategory' => $paramsToCategory]);
    }


    public function actionChangeWishlist()
    {
        $post = Yii::$app->request->post();

        if ($post['action'] == 'add') {
            $prod = FsProducts::findOne($post['product_id']);
            $list = new FsWishlist();
            $list->user_id = Yii::$app->fsUser->identity->id;
            $list->product_id = $post['product_id'];
            $list->provider_id = $prod->provider_id;
            $list->save();
        } else {
            FsWishlist::deleteAll(['user_id' => Yii::$app->fsUser->identity->id, 'product_id' => $post['product_id']]);
        }

        return 200;
    }

    public function actionUnreadNots()
    {
        $res = FsNotifications::find()->select('*')->where(['recipient_id' => Yii::$app->fsUser->identity->id])->leftJoin('fs_users',"`fs_notifications`.`sender_id`=`fs_users`.`id`")
            ->andWhere(['fs_notifications.status'=>0])->asArray()->all();

        return json_encode($res );
    }
    public function actionCategories($url = null)
    {
        $this->layout = 'site';
        if (isset($url)) {
            $category = FsCategories::findOne(['url'=>$url]);
            $ids = $category->getAllParents();

            $ids_all = [];
            if(!empty($ids)){
                foreach($ids as $id_ => $id_val){
                    $ids_all[] = $id_val->id;
                }
            }
            $ids_all[] = $category->id;

            $paramsToCategory = FsParamToCategory::find()->where(['category_id' => $ids_all])->groupBy('param_id')->asArray()->all();

            if(isset($_GET['page'])){
                $page = intval($_GET['page']);
            } else {
                $page = 0;
            }

            $view_history  = FsViewHistory::find()->select('product_id')->where(['user_id'=>Yii::$app->fsUser->identity->id])->orderBy(['id'=>SORT_DESC])->limit(10)->all();
            $cats = Yii::$app->fsUser->identity->categories;
            $cats = explode(';', $cats);
            if (in_array($ids_all[0], $cats)) {
                $data = $category->products($category->id, $page, $_GET);
            }
            $products = @$data['data'];
            $maxPrice = @$data['maxprice'];
            $total = @$data['total'];
            return $this->render('list', ['view_history'=>$view_history,'category' => $category,'paramsToCategory'=> $paramsToCategory,'maxPrice'=>$maxPrice,'products'=>$products,'total'=>$total]);
        }

        $cats = Yii::$app->fsUser->identity->categories;
        if($cats){
            $cats = explode(';',$cats);
            array_pop($cats);
            $categories = FsCategories::find()->where(['parent_id' => null])->andWhere(['id'=>$cats])->andWhere(['status' => 1])->all();
        }
        $categories = FsCategories::find()->all();
        return $this->render('catlist', ['categories' => $categories]);
    }
    public function actionSearch()
    {
        $this->layout = 'site';
        $text = $_GET['q'];
        if (isset($text)) {
            if(isset($_GET['page'])){
                $page = intval($_GET['page']);
            } else {
                $page = 0;
            }
            $category = new FsCategories();
            $data =  $category->productSearch($page, $text,$_GET);
            $products = $data['data'];
            $maxPrice = $data['maxprice'];
            $total = $data['total'];
            if(Yii::$app->fsUser->identity) {
                $view_history  = FsViewHistory::find()->select('product_id')->where(['user_id'=>Yii::$app->fsUser->identity->id])->orderBy(['id'=>SORT_DESC])->limit(10)->all();
            } else{
                $view_history  = FsViewHistory::find()->select('product_id')->where(['ip'=>Yii::$app->getRequest()->getUserIP()])->orderBy(['id'=>SORT_DESC])->limit(10)->all();
            }
            return $this->render('list-search', ['category' => $category,'maxPrice'=>$maxPrice,'products'=>$products,'total'=>$total,'view_history'=>$view_history]);
        } else {
            $this->redirect('/404');
        }
    }
   public function  actionSearchShort(){
        $text = $_POST['searchData'];
        $cond = ' name LIKE "%' . $text. '%" OR name_ru  LIKE  "%' .$text . '%" OR name_en LIKE "%' . $text . '%"';
        $products = FsProducts::find()->where($cond)->andWhere(['status'=>1])->limit(10)->all();
        $products_html = '<div class="fs-search-result-column">
                            <h4 class="fs-search-result-column-title">Ապրանք / ծառայություն</h4>
                            <ul class="fs-search-result-column-list search-prod-list-custom">

                           ';
        $categories_html = '<div class="fs-search-result-column">
                            <h4 class="fs-search-result-column-title">Կատեգորիա</h4>
                            <ul class="fs-search-result-column-list search-prod-list-custom">

                           ';
        if(!empty($products)){
            foreach ($products as $product => $simple){
                $products_html .= '<li class="fs-search-result-column-list-el">
                          <a href="/product/'.$simple->url.'?q='.$text.'">'.$simple->name.'</a>
                      </li>';
            }
        }
        $products_html .=' </ul>
                        </div>';

        $cond = ['like', 'name', '%' . $text. '%', false];
        $cond_ru = ['like', 'name_ru', '%' .$text. '%', false];
        $cond_en = ['like', 'name_en', '%' . $text. '%', false];
        $categories = FsCategories::find()->select('id')->where($cond)->andWhere(['status' => 1])->asArray()->all();
        $categorieslangRu = FsCategoriesLang::find()->select('id')->where($cond_ru)->asArray()->all();
        $categorieslangEn = FsCategoriesLang::find()->select('id')->where($cond_en)->asArray()->all();
        $categoriesTotal = $categories + $categorieslangRu + $categorieslangEn;

        $categories = FsCategories::find()->select('id,name,parent_id,status,atg,url')->where(['id' => $categoriesTotal])->andWhere(['status' => 1])->limit(10)->asArray()->all();

       if(!empty($categories)){
           foreach ($categories as $category_ => $simple_cat){
               $categories_html .= '<li class="fs-search-result-column-list-el">
                          <a href="/categories/'.$simple_cat['url'].'?q='.$text.'">'.$simple_cat['name'].'</a>
                      </li>';
           }
       }
       $categories_html .=' </ul>
                        </div>';

       echo $products_html.$categories_html;

   }
   public function  actionSearchShortMobile(){

        $text = $_POST['searchData'];
        $cond = ' name LIKE "%' . $text. '%" OR name_ru  LIKE  "%' .$text . '%" OR name_en LIKE "%' . $text . '%"';
        $products = FsProducts::find()->where($cond)->andWhere(['status'=>1])->limit(10)->all();
         $products_html = '<div class="fs-mobil-search-result-column" style="flex-basis: 50%;padding-left:10px;">
                            <h4 class="fs-mobil-search-result-col-title">Ապրանք / ծառայություն</h4>
                            <ul class="fs-mobil-search-result-col-list search-prod-list-custom" style="list-style:none;padding-left:0px;">

                           ';
       $categories_html = '<div class="fs-mobil-search-result-column" style="flex-basis: 50%;padding-left:10px;">
                            <h4 class="fs-mobil-search-result-col-title">Կատեգորիա</h4>
                            <ul class="fs-mobil-search-result-col-list search-prod-list-custom" style="list-style:none;padding-left:0px;">

                           ';
        if(!empty($products)){
            foreach ($products as $product => $simple){
                $products_html .= '<li class="fs-mobil-search-result-col-list-el">
                          <a style="color:black;" href="/product/'.$simple->url.'?q='.$text.'">'.$simple->name.'</a>
                      </li>';
            }
        }
       $products_html .=' </ul>
                        </div>';

        $cond = ['like', 'name', '%' . $text. '%', false];
        $cond_ru = ['like', 'name_ru', '%' .$text. '%', false];
        $cond_en = ['like', 'name_en', '%' . $text. '%', false];
        $categories = FsCategories::find()->select('id')->where($cond)->andWhere(['status' => 1])->asArray()->all();
        $categorieslangRu = FsCategoriesLang::find()->select('id')->where($cond_ru)->asArray()->all();
        $categorieslangEn = FsCategoriesLang::find()->select('id')->where($cond_en)->asArray()->all();
        $categoriesTotal = $categories + $categorieslangRu + $categorieslangEn;

        $categories = FsCategories::find()->select('id,name,parent_id,status,atg,url')->where(['id' => $categoriesTotal])->andWhere(['status' => 1])->limit(10)->asArray()->all();

       if(!empty($categories)){
           foreach ($categories as $category_ => $simple_cat){
               $categories_html .= '<li class="fs-mobil-search-result-col-list-el">
                          <a style="color:black;" href="/categories/'.$simple_cat['url'].'?q='.$text.'">'.$simple_cat['name'].'</a>
                      </li>';
           }
       }
       $categories_html .=' </ul>
                        </div>';

       echo $products_html.$categories_html;

   }

    public function actionProducts($url)
    {
        $this->layout = 'site';
        $product = FsProducts::findOne(['url'=>$url]);
        if(!$product){
            $this->redirect('/404');
        }
        $view_history = FsViewHistory::find()->where(['ip'=>Yii::$app->getRequest()->getUserIP(),'product_id'=>$product->id])->one();
        if(!$view_history) {
                $view_ = new FsViewHistory();
                $view_->user_id = Yii::$app->fsUser->identity->id;
                $view_->product_id = $product->id;
                $view_->ip = Yii::$app->getRequest()->getUserIP();
                $r = $view_->save(false);
        }
        return $this->render('product', ['product' => $product]);
    }
    public function actionShop(){
        $this->layout = 'site';
        $products = FsProducts::find();
        if(isset($_GET['price'])){
            $price_range = explode(';',$_GET['price']);
            $fromPrice = $price_range[0];
            $toPrice = $price_range[1];
            $cond_comp= ['BETWEEN','price',$fromPrice,$toPrice];
            $products->andWhere($cond_comp);
        }

        $total_count = clone $products;
        $total_count = $total_count->select('count(id)');
        $total_count = $total_count->asArray();
        $total_count = $total_count->one();
        $total_count = $total_count['count(id)'];
        if(isset($_GET['page'])){
            $pageSize = 20;
            $products->limit(20);
            $offset = ($_GET['page']) * $pageSize;
            $products->offset($offset);
        }
        $products = $products->all();
        return $this->render('shop',['products'=>$products,'total_count' => $total_count]);
    }

    public function actionCart()
    {
        $this->layout = 'site';
        $cartProducts = FsCart::find()->where(['user_id' => Yii::$app->fsUser->identity->id])->andWhere(['status' => 0])->all();
        $suppliers = [];
        foreach ($cartProducts as $product) {
            $suppliers[] = $product->product->provider->id;
        }
        $suppliers = array_unique($suppliers);
        return $this->render('cart', ['products' => $cartProducts, 'suppliers' => $suppliers]);
    }

    public function actionAddToCart()
    {
        $post = Yii::$app->request->post();
        $post['user_id'] = Yii::$app->fsUser->identity->id;
        $product = FsCart::findOne(['status'=>0,'product_id'=>$post['product_id'],'user_id'=>$post['user_id']]);
      
        if($product){
          $product->quantity =  $product->quantity + intval($post['quantity']);
          $product->save(false);
          return 200;
        } else {
            $product = new FsCart();
            if ($product->load($post, '') && $product->save()) {
                return 200;
            }
        }


    }


    public function actionCreateOrder()
    {
        $post = Yii::$app->request->post();
        $store = 0;
       if($post['store']){
          $store = 1;
          $user_id =  intval($post['store']);
       } else {
          $user_id = Yii::$app->fsUser->identity->id;
       }
        foreach ($post['data'] as $key => $data) {

            $user_info = FsSettings::findOne(['user_id'=>$key]);

            if(intval($user_info->is_brand) && count($data)>1){
                $not_manager = [];
                $brand_to_product = [];
                $price = [];
                if(!empty($data)){
                    foreach ($data as $key_ => $value_){
                        $cart = FsCart::findOne(['id'=>$value_]);
                        $brand = FsProducts::findOne(['id'=>$cart->product_id]);
                        $manager =  FsUserToBrand::findOne(['brand_id'=>$brand->brand_id,'user_id'=>$user_id ]);

                        if($manager){
                            $brand_to_product[$manager->customer_id][] = $cart->id;
                            $price[$manager->customer_id] += $cart->price*$cart->quantity;
                        } else {
                            $not_manager[] = $value_;
                            $price['no_manager'] += $cart->price*$cart->quantity;
                        }
                    }

                     if(!empty($brand_to_product)){
                         foreach ($brand_to_product as $br_ => $br_vl){

                             $order = new FsOrders();
                             $order->buyer_id = $user_id;
                             $order->seller_id = $key;
                             $order->is_store = $store;
                             
                             $order->manager_id = $br_;
                             $order->shipping_date = date("Y-m-d", strtotime($post['delivery_date'][$key]));
                             $order->cart_id = implode(',',$br_vl);
                             $order->price =  $price[$br_];
                             $order->save(false);
                         }
                     }

                    if(!empty($not_manager)){
                        $order = new FsOrders();
                        $order->buyer_id = $user_id;
                        $order->is_store = $store;
                        $order->seller_id = $key;
                        $order->shipping_date = date("Y-m-d", strtotime($post['delivery_date'][$key]));
                        $order->cart_id = implode(',', $not_manager);
                        $order->price = $price['no_manager'];
                        $order->save();

                    }
                }
            } else {

                $order = new FsOrders();
                $order->buyer_id = $user_id;
                $order->seller_id = $key;
                $order->is_store = $store;
                $order->shipping_date = date("Y-m-d", strtotime($post['delivery_date'][$key]));
                $order->cart_id = implode(',', $data);
                $order->price = array_sum($post['price'][$key]);
                $order->save();
            }

            if(!$store){
                $note = new FsNotifications();
                $note->message = 'Դուք ունեք նոր պատվեր';
                $note->sender_id = $user_id;
                $note->url = '/supplier-processing';
                $note->recipient_id = $key;
                $note->type = 2;
                $note->save();
            }

            foreach ($data as $id) {
                FsCart::updateAll(
                    ['status' => 1],
                    ['id' => $id]
                );
            }
        }

        return 200;
    }

    public function actionAcceptOrder()
    {
        $post = Yii::$app->request->post();
        $order = FsOrders::findOne($post['order_id']);
        $changed = false;
        $sum = 0;

        foreach ($post['old_count'] as $ct => $ct_val){
            $sum +=$ct_val;
            if($post['count'][$ct] != $ct_val){
                $changed = true;
                $cart = FsCart::findOne($ct);
                $cart->quantity = $post['count'][$ct];
                $cart->save(false);
                $sum +=$post['count'][$ct];
            }
        }

        if (strlen($post['comment']) > 0 || $changed) {
            $order->status = 2;
            $order->seller_quantity = $sum;
            $order->comment = $post['comment'];
        } else {
            $order->status = 3;
            $order->seller_quantity = $sum;
        }

        if ($order->save()) {
            Yii::$app->session->setFlash('success', 'Հաջողությամբ ուղարկվեց');
        } else {
            Yii::$app->session->setFlash('error', 'Something went wrong.');
        }

        $note = new FsNotifications();
        $note->message = "Պատվերի կարգավիճակը փոխվել է";
        $note->sender_id = Yii::$app->fsUser->identity->id;
        $note->recipient_id =  Yii::$app->fsUser->identity->id == $order->buyer_id ? $order->seller_id : $order->buyer_id;
        $note->type = 2;
        $note->url = '/personal-history';
        $note->save();

        return $this->goBack(Yii::$app->request->referrer);
    }

    public function actionRejectOrder()
    {
        $post = Yii::$app->request->post();
        $order = FsOrders::findOne($post['order_id']);
        $order->status = 5;
        $order->comment = $post['comment'];

        if ($order->save()) {
            Yii::$app->session->setFlash('success', 'Հաջողությամբ ուղարկված է');
        } else {
            Yii::$app->session->setFlash('error', 'Something went wrong.');
        }

        $note = new FsNotifications();
        $note->message = "Պատվերը մերժվել է";
        $note->sender_id = Yii::$app->fsUser->identity->id;
        $note->recipient_id = Yii::$app->fsUser->identity->id == $order->buyer_id ? $order->seller_id : $order->buyer_id;
        $note->type = 2;
        $note->url = '/personal-history';
        $note->save();

        return $this->goBack(Yii::$app->request->referrer);
    }

    public function actionPersonalChangeOrder()
    {
        $post = Yii::$app->request->post();
        $order = FsOrders::findOne($post['order_id']);
        $order->status = $post['status'];
        $order->price = $post['price'];
        $order->save();
        return 200;
    }

    public function actionMarkAsRead()
    {
        $post = Yii::$app->request->post();
        if (count($post) > 0) {
            foreach ($post['notificationList'] as $notification) {
                $model = FsNotifications::findOne($notification);
                $model->status = 1;
                $model->save();
            }
        }
        return 200;
    }

    public function actionCloneOrder()
    {
        $post = Yii::$app->request->post();
        $order = FsOrders::findOne($post['order_id']);
        $ids = explode(',', $order->cart_id);
        foreach ($ids as $id) {
            $cart = FsCart::findOne($id);
            $cart->status = 0;
            $cart->save();
        }
        return 200;
    }

    public function actionSaveTemplate()
    {
        $post = Yii::$app->request->post();
        $template = new FsTemplates();
        $template->name = $post['name'];
        $template->user_id = Yii::$app->fsUser->identity->id;
        $template->seller_id = $post['seller'];
        $template->cart_id = implode(',', $post['ids']);
        $template->save();

        return 200;
    }
    public function actionUpdateOrder()
    {
        $post = Yii::$app->request->post();

        $post['user_id'] = Yii::$app->fsUser->identity->id;

        for ($i = 0; $i <count($post['ids']);$i++){
            $product = FsCart::findOne(['id'=>$post['ids'][$i],'user_id'=>$post['user_id']]);
            if($product){
                $product->quantity =  intval($post['qtys'][$i]);
                $product->save(false);
                return 200;
            }
        }
    }

    public function actionPersonalTemplatesDetails($id)
    {
        $template = FsTemplates::findOne($id);
        $cart = explode(',', $template->cart_id);
        $this->layout = 'site';

        return $this->render('template-details', [
            'template' => $template,
            'cart' => $cart
        ]);
    }

    public function actionUpdateWs()
    {
        $post = Yii::$app->request->post();

        $ids = $post['data'];
        for ($i = 0; $i< count($ids); $i++){
            $cart = FsCart::findOne($ids[$i]);
            $cart ->quantity = $post['count'][$i];
            $cart->save(false);
        }


        return 200;
    }
    public function actionPersonalPushTemplate()
    {
        $post = Yii::$app->request->post();
        $template = FsTemplates::findOne($post['template']);
        $ids = explode(',', $template->cart_id);

        foreach ($ids as $id) {
            $cart = FsCart::findOne($id);
            $model = new FsCart();
            $model->user_id = $cart->user_id;
            $model->product_id = $cart->product_id;
            $model->quantity = $cart->quantity;
            $model->status = 0;
            $model->save();
        }

        return 200;
    }


    public function actionPersonalDeleteTemplateItem()
    {
        $post = Yii::$app->request->post();
        $template = FsTemplates::findOne($post['template']);
        $template->cart_id = str_replace( $post['cart'].',', '', $template->cart_id);
        $template->save();
        return 200;
    }
    public function actionPersonalDeleteTemplate()
    {
        $post = Yii::$app->request->post();

        $template = FsTemplates::deleteAll(['id'=>$post['tid']]);
        return $this->redirect('/personal-templates');
    }
    public function actionDeleteFromCart()
    {
        $post = Yii::$app->request->post();
        if (count($post['id']) > 1) {
            FsCart::deleteAll(['id' => $post['id']]);
        } else {
            FsCart::findOne($post['id'])->delete();
        }
        return 200;
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
/*    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }*/

    /**
     * Displays about page.
     *
     * @return string
     */
   
    public function actionContacts()
    {
        $this->layout = 'site';
        $user = Yii::$app->fsUser->identity;
        $info = FsSettings::findOne(1);
        return $this->render('contacts', ['user' => $user,'info' => $info]);
    }



     public function actionOffers()
    {
        $this->layout = 'site';        
        return $this->render('offers');
    }

    public function actionPage($view)
    {
        $this->layout = 'site';
        $page = FsPages::findOne(['url' => $view]);

        return $this->render('view', ['page' => $page]);
    }

    public function actionCatlist()
    {
        $this->layout = 'site';        
        return $this->render('catlist');
    }


    public function actionAbout()
    {
        $this->layout = 'site';
        return $this->render('about');
    }


    public function actionSignUp()
    {
        $this->layout = 'site';
        $categories = FsCategories::find()->where(['status'=>'1','parent_id'=>null])->all();
        return $this->render('sign-up',['categories'=>$categories]);
    }
    public function actionCheckhvhh()
    {
        $hvhh = $_GET['hvhh'];
        $ct = FsUsers::find()->where(['company_hvhh'=>$hvhh])->orWhere(['holding_hvhh'=>$hvhh])->count();
        return $ct;
    }
    
    public function actionCheckmail()
    {
        $mail = $_GET['mail'];
        $ct = FsUsers::find()->where(['email'=>strtolower($mail)])->count();
        return $ct;
    }
     public function actionHistory()
    {
        $this->layout = 'site';        
        return $this->render('history');
    }


     public function actionPerPartners()
    {
        $this->layout = 'site';        
        return $this->render('per-partners');
    }



     public function actionRequests()
    {
        $this->layout = 'site';
        return $this->render('requests');
    }


     public function actionWishlist()
    {
        $this->layout = 'site';
        $res = FsWishlist::find()->select('provider_id')->groupBy('provider_id')->where(['user_id'=>Yii::$app->fsUser->identity->id])->all();
        return $this->render('wishlist',['providers'=>$res]);
    }


     public function actionReportlist()
    {
        $this->layout = 'site';        
        return $this->render('reportlist');
    }


      public function actionContacting()
    {
        $this->layout = 'site';        
        return $this->render('contacting');
    }


       public function actionWorkbook()
    {
        $this->layout = 'site';        
        return $this->render('workbook');
    }

       public function actionSignIn()
    {
        $this->layout = 'site';
        return $this->render('sign-in');
    }

       public function actionPartners()
    {
        $this->layout = 'site';        
        return $this->render('partners');
    }

       public function actionCompany()
    {
        $this->layout = 'site';        
        return $this->render('company');
    }


       public function actionOrder()
    {
        $this->layout = 'site';        
        return $this->render('order');
    }


       public function actionDealers()
    {
        $this->layout = 'site';        
        return $this->render('dealers');
    }


       public function actionForgot()
    {
        $this->layout = 'site';        
        return $this->render('forgot');
    }

       public function actionProd()
    {
        $this->layout = 'site';        
        return $this->render('prod');
    }
       public function actionMaxList()
    {
        $this->layout = 'site';        
        return $this->render('max-list');
    }

       public function actionCorporate()
    {
        $this->layout = 'site';
        $cond = [];
        $str = '';
        if(!empty($_GET['category_id'])){
            foreach ($_GET['category_id'] as $cat => $cat_val){
                $str .= ' categories LIKE "%'.$cat_val.';%" OR';
            }
            $str = substr($str,0,-2);
            $cond =$str;
        }
        $user = Yii::$app->fsUser->identity;
  
        if(Yii::$app->fsUser->identity) {
            $cats = Yii::$app->fsUser->identity->categories;
            if ($cats) {
                $cats = explode(';', $cats);
            }
            $companies = FsUsers::find()->where($cond)->andWhere(['status' => 1])->all();
            $categories = FsCategories::find()->where(['parent_id' => null])->andWhere(['id'=>$cats])->andWhere(['status' => 1])->all();
        } else {
            $companies = FsUsers::find()->andWhere(['status' => 1])->all();
            $categories = FsCategories::find()->where(['parent_id' => null])->andWhere(['status' => 1])->all();
        }

        return $this->render('corporate', ['companies' => $companies, 'categories' => $categories]);
    }
       public function actionAfterOrder()
    {
        $this->layout = 'site';        
        return $this->render('after-order');
    }

       public function actionOrderDetails()
    {
        $this->layout = 'site';        
        return $this->render('order-details');
    }

       public function actionTemplateDetails()
    {
        $this->layout = 'site';        
        return $this->render('template-details');
    }

        public function actionTemplates()
    {
        $this->layout = 'site';        
        return $this->render('templates');
    }
        public function actionSuppliersRequests()
    {
        $this->layout = 'site';        
        return $this->render('suppliers_requests');
    }
        public function actionSales()
    {
        $this->layout = 'site';        
        return $this->render('sales');
    } 
       public function actionProcessing()
    {
        $this->layout = 'site';        
        return $this->render('processing');
    }
    public function actionError_()
    {

        return $this->redirect('/404');
        $this->layout = 'site';
        return $this->render('error');
    }
    public function action404()
    {
        $this->layout = 'site';
        return $this->render('error');
    }
       public function actionProcessingDetails()
    {
        $this->layout = 'site';        
        return $this->render('processing-details');
    }
    public function actionGoogleform(){
      $req_dump = $_REQUEST;
      $fp = fopen('request.log', 'a');
      fwrite($fp, $req_dump);
      fclose($fp);
      return true;
    }
}