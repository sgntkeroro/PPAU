<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblCawangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-cawangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'negeri_id')->textInput() ?>

    <?= $form->field($model, 'cawangan_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cawangan_poskod')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
