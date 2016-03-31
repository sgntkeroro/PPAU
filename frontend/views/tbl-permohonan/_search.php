<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-permohonan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'permohonan_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'cawangan_id') ?>

    <?= $form->field($model, 'statusPermohonan_id') ?>

    <?= $form->field($model, 'permohonan_tarikh') ?>

    <?php // echo $form->field($model, 'permohonan_pusatkos') ?>

    <?php // echo $form->field($model, 'permohonan_fakjab') ?>

    <?php // echo $form->field($model, 'permohonan_catitan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
