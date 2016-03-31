<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPerkaraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-perkara-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perkara_id') ?>

    <?= $form->field($model, 'permohonan_id') ?>

    <?= $form->field($model, 'JK_id') ?>

    <?= $form->field($model, 'katPelanggan_id') ?>

    <?= $form->field($model, 'katPermohonan_id') ?>

    <?php // echo $form->field($model, 'tahunSedia_id') ?>

    <?php // echo $form->field($model, 'perkara_nama') ?>

    <?php // echo $form->field($model, 'perkara_fakJab') ?>

    <?php // echo $form->field($model, 'perkara_kodakaun') ?>

    <?php // echo $form->field($model, 'perkara_kuantiti') ?>

    <?php // echo $form->field($model, 'perkara_harga') ?>

    <?php // echo $form->field($model, 'perkara_jumlahHarga') ?>

    <?php // echo $form->field($model, 'perkara_tujuanPembelian') ?>

    <?php // echo $form->field($model, 'perkara_jenisPeruntukan') ?>

    <?php // echo $form->field($model, 'perkara_lokasiCadangan') ?>

    <?php // echo $form->field($model, 'perkara_bukuLog') ?>

    <?php // echo $form->field($model, 'perkara_programBaru') ?>

    <?php // echo $form->field($model, 'perkara_prgrmTahapPengajian') ?>

    <?php // echo $form->field($model, 'perkara_pegawai') ?>

    <?php // echo $form->field($model, 'perkara_pegawaiJawatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
