<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Store $model */
/** @var yii\widgets\ActiveForm $form */
?>


<div class="modal fade add-new" id="editStore" tabindex="1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addnew">Ստեղծել խանութ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => Yii::$app->urlManager->createUrl(['store/create'])]); ?>
                <!--                <form action="create" method="post" enctype="multipart/form-dat">-->

                <div class="store-form">


                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>


                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

                    <div class="form-group d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                        <?= Html::submitButton('Գրանցել', ['class' => 'btn btn-success']) ?>
                    </div>


                </div>
                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>


<script>
    jQuery('#editStore').modal('show');
</script>
