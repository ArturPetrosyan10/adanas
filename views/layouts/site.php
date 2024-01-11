<?php

/** @var yii\web\View $this */
/** @var string $content */



use app\assets\NewAsset;
use app\models\FsTexts;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
//use yii\bootstrap5\NavBar;
use yii\helpers\ArrayHelper;


NewAsset::register($this);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'description', 'content' => 'E-Commerce Site']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
$action_id = Yii::$app->controller->action->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title>Adanas</title>
    <link rel="icon" type="image/png" href="/web/images/new-logo.png">
    <?php $this->head()  ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />
    <link rel="stylesheet" href="/web/css/plugins/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/web/css/new/site.css">
    <link rel="stylesheet" href="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<?php $this->beginBody();
?>


<div id="page">
    <?php if($action_id !== 'sign-in'){
            echo $this->render('header.php');

        $urls = [0=>['action'=>'index','url' => '/','name'=> $GLOBALS['text']['__home__page__'] ],
            1=>['action'=>'shop','url'=>'/shop','name'=>$GLOBALS['text']['__shop__']],
            2=>['action'=>'categories','url'=>'/categories','name'=>$GLOBALS['text']['__categories__']],
            3=>['action'=>'brands','url'=>'/brands','name'=>$GLOBALS['text']['__brands__']],
            4=>['action'=>'news','url'=>'/news','name'=>$GLOBALS['text']['__news__']],
            5=>['action'=>'contacts','url'=>'/contacts','name'=>$GLOBALS['text']['__contact__']]] ?>
        <div class="fs-container">
            <ul class="d-flex p-0" style="align-items:center;height:75px">
                <?php foreach ($urls as $index => $url) { ?>
                    <li class="item <?= $action_id === $url['action'] ? 'active-url' : ''; ?>">
                        <a class="navbar url-item" href="<?= $url['url'] ?>"><?= $url['name'] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <hr>
    <?php } ?>

    <div id="content">
        <main id="main"  role="main">
            <div class="fs-container">
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
                <?php endif ?>

                <?= $content ?>
            </div>
        </main>
    </div>
    <?php if($action_id !== 'sign-in'){
        include('footer.php');
    } ?>
    <!--<script src="/web/js/new-adanas/app.js"></script>-->
<?php $this->endBody() ?>

</div>
<!--<script>
    var idleTimer = null;
    var idleState = false; // состояние отсутствия
    var idleWait = 1000*60*10; // время ожидания в мс. (1/1000 секунды)
    $(document).ready( function(){
      $(document).bind('mousemove keydown scroll', function(){
        clearTimeout(idleTimer); // отменяем прежний временной отрезок
        idleState = false;
        idleTimer = setTimeout(function(){
          // Действия на отсутствие пользователя
          window.location.href = '/logout';
          idleState = true;
        }, idleWait);
      });

  $("body").trigger("mousemove"); // сгенерируем ложное событие, для запуска скрипта
});
</script>-->
<button class="fs-to-top-button fs-icon-chevron"></button>
</html>
<?php $this->endPage() ?>
