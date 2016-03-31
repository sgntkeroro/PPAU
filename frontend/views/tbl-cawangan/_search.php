<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblCawanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-cawangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'cawangan_id') ?>

    <?= $form->field($model, 'negeri_id') ?>

    <?= $form->field($model, 'cawangan_nama') ?>

    <?= $form->field($model, 'cawangan_poskod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
