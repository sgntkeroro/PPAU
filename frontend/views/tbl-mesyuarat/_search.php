<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblMesyuaratSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-mesyuarat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mesyuarat_id') ?>

    <?= $form->field($model, 'perkara_id') ?>

    <?= $form->field($model, 'mesyuarat_tarikh') ?>

    <?= $form->field($model, 'mesyuarat_kuantiti') ?>

    <?= $form->field($model, 'mesyuarat_jumlah') ?>

    <?php // echo $form->field($model, 'mesyuarat_catitan') ?>

    <?php // echo $form->field($model, 'statusMesyuarat_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
