<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPerkara */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-perkara-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' =>   'multipart/form-data']]); ?>

    <?= $form->field($model, 'permohonan_id')->textInput() ?>

    <?= $form->field($model, 'JK_id')->textInput() ?>

    <?= $form->field($model, 'katPelanggan_id')->textInput() ?>

    <?= $form->field($model, 'katPermohonan_id')->textInput() ?>

    <?= $form->field($model, 'tahunSedia_id')->textInput() ?>

    <?= $form->field($model, 'perkara_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_fakJab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_kodakaun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_kuantiti')->textInput() ?>

    <?= $form->field($model, 'perkara_harga')->textInput() ?>

    <?= $form->field($model, 'perkara_jumlahHarga')->textInput() ?>

    <?= $form->field($model, 'perkara_tujuanPembelian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_jenisPeruntukan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_lokasiCadangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_bukuLog')->fileInput() ?>

    <?= $form->field($model, 'perkara_programBaru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_prgrmTahapPengajian')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_pegawai')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perkara_pegawaiJawatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
