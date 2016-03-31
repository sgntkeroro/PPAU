<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuarat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-mesyuarat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'perkara_id')->textInput() ?>

    <?= $form->field($model, 'mesyuarat_tarikh')->textInput() ?>

    <?= $form->field($model, 'mesyuarat_kuantiti')->textInput() ?>

    <?= $form->field($model, 'mesyuarat_jumlah')->textInput() ?>

    <?= $form->field($model, 'mesyuarat_catitan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'statusMesyuarat_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
