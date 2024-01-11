<style>
    .pagination{
        display:flex;
        flex-wrap:wrap;
        list-style:none;
        margin-top:20px;
        padding-left:0px;
        gap:8px;
    }
    .pagination a{
        font-size:18px;
        text-decoration:none;
        color:black;
    }
    .pagination li.active{
        background:#ffbd27;
    }
    .pagination li.active a{
        color:white;
    }
</style>
<ul class="pagination w-100">
    <?php $pages = ceil(intval($total)/20); ?>
    <?php if(isset($_GET['page']) && intval($_GET['page'] )>0){ ?>
        <li class="page-item">
            <a class="page-link" href="<?= Yii::$app->urlManager->createUrl(['/shop']) ?>?page=<?php echo intval($_GET['page'])-1;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
    <?php } ?>
    <?php
    if(!isset($_GET['page'])){
        $_GET['page'] = 0;
    }
    for ($i = 1; $i <= $pages; $i++){
        if( $i == (intval($_GET['page'])+2) || $i == (intval($_GET['page'])+3) || $i == (intval($_GET['page'])-1)  ||  $i == (intval($_GET['page'])) ||  $i == intval($_GET['page'])+1) {
            $class = '';
            if($i == intval($_GET['page'])+1 && $_GET['page'] !== 'all'){
                $class = 'active';
            }
            echo '<li class="page-item '.$class.'"><a class="page-link" href="'.Yii::$app->urlManager->createUrl(['/shop']).'?page=' . ($i-1).'">' . $i.'</a></li>';
        }
    } ?>
    <?php if(isset($_GET['page']) && (intval($_GET['page'] )+1) < $pages){ ?>
        <li class="page-item">
            <a class="page-link" href="<?= Yii::$app->urlManager->createUrl(['/shop']) ?>?page=<?php echo (intval($_GET['page'] )+1);?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    <?php } ?>

    <li class="page-item <?= $_GET['page'] === 'all' ? 'active' : ''?>"><a class="page-link" href="<?= Yii::$app->urlManager->createUrl(['/shop']) ?>?page=all">Տեսնել ամբողջը</a></li>

</ul>


