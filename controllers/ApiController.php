<?php
namespace app\controllers;

use yii\rest\ActiveController;

class ApiController extends ActiveController
{
    public $modelClass = 'app\models\FsNotifications';

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'searchModel' => $this->modelClass,
        ];

        return $actions;
    }
    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        $recip = intval($_GET['filter']['recipient_id']);
        \app\models\FsNotifications::updateAll(['status_mobile'=>1],['recipient_id'=>$recip]);
        return $result;
    }

}