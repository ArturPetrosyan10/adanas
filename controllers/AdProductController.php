<?php

namespace app\controllers;

use app\models\AdProduct;
use app\models\AdProductImg;
use app\models\AdProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdProductController implements the CRUD actions for AdProduct model.
 */
class AdProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
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
     * Lists all AdProduct models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'store';

        $searchModel = new AdProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdProduct model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'store';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AdProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {

        $this->layout = 'store';

        $model = new AdProduct();
        $modelImg = new AdProductImg();
//        echo '<pre>';
//        var_dump($_FILES);
//        die;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $_FILES['AdProductImg']['name']['nameImg'] && $model->save()) {
                $last = AdProduct::find()->orderBy(['id' => SORT_DESC])->asArray()->one();

                $uploaddir = 'web/adImg/';
                $uploadfile = $uploaddir . time() . basename($_FILES['AdProductImg']['name']['nameImg']);
                move_uploaded_file($_FILES['AdProductImg']['tmp_name']['nameImg'], $uploadfile);
                $modelImg->nameImg = $uploadfile;

                $modelImg->productId = $last['id'];
                $modelImg->active = $modelImg->nameImg;
                $modelImg->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelImg' => $modelImg
        ]);
    }

    /**
     * Updates an existing AdProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'store';

        $model = $this->findModel($id);
        $modelImg=AdProductImg::find()
            ->where(['productId' => $id ])
            ->one();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [
            'model' => $model,
            'modelImg'=>$modelImg
        ]);
    }

    /**
     * Deletes an existing AdProduct model.
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

    /**
     * Finds the AdProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return AdProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = 'store';

        if (($model = AdProduct::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
