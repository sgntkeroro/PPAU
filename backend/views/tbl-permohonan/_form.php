<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPermohonan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-permohonan-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
        'validateOnChange' => true,
        'validateOnBlur' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
            'id' => 'dynamic-form'
        ]
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'cawangan_id')->textInput() ?>

    <?= $form->field($model, 'statusPermohonan_id')->textInput() ?>

    <?= $form->field($model, 'permohonan_tarikh')->textInput() ?>

    <?= $form->field($model, 'permohonan_pusatkos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permohonan_fakjab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permohonan_catitan')->textarea(['rows' => 6]) ?>


    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>

    <?= $this->render('_form_perkara', [
        'form' => $form,
        'model' => $model,
        'modelsPerkara' => $modelsPerkara,
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
