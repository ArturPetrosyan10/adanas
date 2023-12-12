<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adanas Admin</title>
    <meta name="description" content="Adanas Admin Panel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="/web/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/web/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/web/css/lib/chosen/chosen.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <style>
        .page-item.active .page-link{
            background:#008A4E !important;
        }
        .btn-succ{
            background:#008A4E;
        }
        .left , .right{
            background:#008A4E;
        }
        aside.left-panel,.navbar{
            background:#008A4E !important;
        }
        .navbar .navbar-nav li > a{
        /*color: #4A4640;*/
            color: #FFF;
            font-size: 17px;
        }
        .navbar .navbar-nav li > a .menu-icon{
            margin-top: 4px;
            font-weight: bold;
            color:white;
            width: 30px;
        }
        .navbar .navbar-nav li > a:hover, .navbar .navbar-nav li > a:hover .menu-icon{
            color: white;
        }
        .modal-body .form-control{
            margin-bottom: 5px;
        }
        .frmfirst{
            margin-left:20px;
        }
        .sortable div.active{
            background: #FAF9F9 !important;
        }
        .sortable .fa-close{
            position: absolute;
            left: 30px;
            top: 9px;
        }
        .buttons{
            position: relative;
        }
        .buttons .show_{
            display: inline-block;
            position: absolute;
            background: #cfcfcf;
            opacity: 0.6;
            width: 132px;
            left: 32px;
            top: -3px;
            height: 31px;
        }
        .active > a   {
            color:#008A4E !important;
        }
        .navbar .navbar-nav li.active .menu-icon, .navbar .navbar-nav li:hover .toggle_nav_button:before, .navbar .navbar-nav li .toggle_nav_button.nav-open:before   {
            color:#008A4E !important;
        }
     </style>
</head>

<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>


 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">

               <ul class="nav navbar-nav">
<!--                     <li >-->
<!--                         <a href="/admin/dashboard"><i class="menu-icon fa fa-dashboard"></i>Վահանակ </a>-->
<!--                     </li>-->
                   <?php if( Yii::$app->user->identity->role == 10 || Yii::$app->user->identity->role == 20){ ?>
                     <li>
                         <a href="/admin/orders"><i class="menu-icon fa fa-shopping-cart"></i>Պատվերներ</a>
                     </li>
                   <?php } ?>
                   <?php if( Yii::$app->user->identity->role == 10){ ?>
                      <li>
                         <a href="/admin/stores"><i class="menu-icon fa fa-archive"></i>Խանութներ</a>
                     </li>
                       <li>
                         <a href="/admin/brands"><i class="menu-icon fa fa-cubes"></i>Ապրանքանիշներ</a>
                     </li>
<!--                     <li>-->
<!--                         <a href="/admin/partners"><i class="menu-icon fa fa-user"></i>Գործընկերներ</a>-->
<!--                     </li>-->
                     <li>
                         <a href="/admin/customers"><i class="menu-icon fa fa-sitemap"></i>Հաճախորդներ</a>
                     </li>
                     <li>
                        <a href="/admin/discounts"><i class="menu-icon fa fa-percent"></i>Զեղչեր</a>
                    </li>
                   <?php } ?>
                    <?php if( Yii::$app->user->identity->role == 10 || Yii::$app->user->identity->role == 30){ ?>
                     <li>
                         <a href="/admin/pages"><i class="menu-icon fa fa-file"></i>Էջեր</a>
                     </li>
                    <li>
                        <a href="/admin/blogs"><i class="menu-icon fa fa-rss"></i>Նորություններ</a>
                    </li>
                    <li>
                        <a href="/admin/texts"><i class="menu-icon fa fa-font"></i>Տեքստեր</a>
                    </li>
                     <li>
                         <a href="/admin/banners"><i class="menu-icon fa fa-picture-o"></i>Պաստառներ</a>
                     </li>
                    
                     <li>
                         <a href="/admin/products"><i class="menu-icon fa fa-cube"></i>Ապրանքներ</a>
                     </li>
                     <li>
                         <a href="/admin/categories"><i class="menu-icon fa fa-bars"></i>Կատեգորիաներ </a>
                     </li>
                     <li>
                         <a href="/admin/properties"><i class="menu-icon fa fa-gg"></i>Պարամետրեր</a>
                     </li>
<!--                      <li>-->
<!--                         <a href="/admin/subscriptions"><i class="menu-icon fa fa-group"></i>Բաժանորդներ</a>-->
<!--                     </li>-->
                    
                      <li>
                         <a href="/admin/measurement"><i class="menu-icon fa fa-eraser"></i>Չափման միավորներ</a>
                     </li>
                     <?php } ?>
                   <?php if( Yii::$app->user->identity->role == 10){ ?>
                     <li>
                         <a href="/admin/settings"><i class="menu-icon fa fa-cogs"></i>Կարգավորումներ</a>
                     </li>
                   <?php } ?>
                 </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
<!--                    <a class="navbar-brand" href="./"><img src="/web/images/fos-logo.svg" alt="Logo"></a>-->
<!--                    <a class="navbar-brand hidden" href="./"><img src="/web/images/fos-logo.svg" alt="Logo"></a>-->
<!--                    logo color #008A4E-->
                    <a class="navbar-brand" href="./"><img width="42px" src="/web/images/new-logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="/web/images/new-logo.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger showSearch" ><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b class="user-avatar rounded-circle"><?php echo  Yii::$app->user->identity->username; ?></b>
                        </a>
                      <div class="user-menu dropdown-menu">
                             <a class="nav-link" href="#"><i class="fa fa- user"></i>Իմ պրոֆիլը</a>
                             <a class="nav-link" href="#"><i class="fa fa- user"></i>Ծանուցումներ <span class="count">13</span></a>
                             <a class="nav-link" href="#"><i class="fa fa -cog"></i>Կարգավորումներ</a>
                             <a class="nav-link" href="/admin/logout"><i class="fa fa-power -off"></i>Դուրս գալ</a>
                         </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
           <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <?= $content ?>
            </div>
        </div>
  </div>
                            </div> <!-- /.card -->
                        
      
    </div>
    <!-- /#right-panel -->
    <!-- Scripts -->
   <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="/web/js/lib/chosen/chosen.jquery.min.js"></script>
    <script src="https://rawgit.com/RobinHerbots/Inputmask/5.x/dist/inputmask.js"></script>
    <script>
  window.onload = function(){
     var current = location.pathname;
    jQuery('#main-menu li a').each(function(){
        var $this = jQuery(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.parent().addClass('active');
        }
    })
    var page = jQuery('#page').attr('data-page');
   jQuery('.sortable').sortable({
    cursor:         'move',
    placeholder:    'sortable-placeholder',
    handle:         '.move',
    scroll:         false,
    distance:           25,
    delay:                  100,
    forceHelperSize: true,
     update: function (event, ui) {
        var l = 1;
        var indexes = [];
          jQuery( event.target).children('li').each(function(){
            var id = jQuery(this).attr('data-id');
            indexes.push({'id':id,'order':l});
            l++;

        });
        jQuery.ajax('/admin/update-order', {
            type: 'POST',  // http method
            dataType:'json',
            data: { orders: indexes,page:page },  // data to submit
            success: function (data) {
                console.log(data);
            }
        });

    }
});
   jQuery('.sortable').disableSelection();
   jQuery('.sortableTable').sortable({
          cursor:         'move',
          placeholder:    'sortable-placeholder',
          handle:         '.move',
          scroll:         false,
          distance:           25,
          delay:                  100,
          forceHelperSize: true,
          update: function (event, ui) {
              var l = 1;
              var indexes = [];
              jQuery( event.target).children('tr').each(function(){
                  var id = jQuery(this).attr('data-id');
                  indexes.push({'id':id,'order':l});
                  l++;

              });
              jQuery.ajax('/admin/update-order', {
                  type: 'POST',  // http method
                  dataType:'json',
                  data: { orders: indexes,page:page },  // data to submit
                  success: function (data) {
                      console.log(data);
                  }
              });

          }
      });
   jQuery('.sortableTable').disableSelection();
   jQuery('.showChailds').click(function(){
        jQuery(this).closest('.block').next().toggleClass('show');
        jQuery(this).find('i').toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        if(jQuery(this).find('i').hasClass('fa-chevron-up')){
            var id = jQuery(this).closest('li').attr('data-id');
            localStorage.setItem("key"+id, "active");
        } else {
            var id = jQuery(this).closest('li').attr('data-id');
              localStorage.removeItem("key"+id);
        }
   });
   jQuery('.sortable .block').click(function(){
    jQuery('.sortable .block').removeClass('active');
    jQuery('.sortable li').removeClass('active');
        jQuery(this).toggleClass('active');
        jQuery('.buttons .overlay').removeClass('show_');
        jQuery(this).parent().toggleClass('active');
   });
   jQuery('.sortableTable tr').click(function(){
          jQuery('.sortableTable tr').removeClass('active');
          jQuery('.buttons .overlay').removeClass('show_');
          jQuery(this).toggleClass('active');
      });
   jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
             placeholder_text_single: "Ընտրել",
             no_results_text: "Ոչինչ չի գտնվել",
             width: "100%",
             search_contains: true 
        });
   jQuery(".multySelect").chosen({
          disable_search_threshold: 10,
          placeholder_text_multiple: "Ընտրել",
          no_results_text: "Ոչինչ չի գտնվել",
          width: "100%",
          search_contains: true 
      });
  }
  </script>
    <script src="/web/js/main.js"></script>

<?php $this->endBody() ?>
<style>
    .card {
    overflow: auto !important;
    max-width: 100% !important;
    }
    ::-webkit-scrollbar {
        width: 20px;
    }

::-webkit-scrollbar-track {
  background-color: transparent;
}

::-webkit-scrollbar-thumb {
  background-color: #d6dee1;
  border-radius: 20px;
  border: 6px solid transparent;
  background-clip: content-box;
}

::-webkit-scrollbar-thumb:hover {
  background-color: #a8bbbf;
}
input[type='file']::-webkit-file-upload-button {
    background-color: #008A4E !important;
}


table {
  text-align: left;
  position: relative;
  border-collapse: collapse; 
}
th, td {
  padding: 0.25rem;
}

th {
  background: white;
  position: sticky;
  top: 0; /* Don't forget this, required for the stickiness */
  box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
}
.tbl{
    max-height:80vh;
    overflow:auto;
}
</style>

</body>
</html>
<?php $this->endPage() ?>
