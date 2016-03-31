<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPerkara */

$this->title = $model->perkara_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Perkaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-perkara-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->perkara_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->perkara_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'perkara_id',
            'permohonan_id',
            'JK_id',
            'katPelanggan_id',
            'katPermohonan_id',
            'tahunSedia_id',
            'perkara_nama',
            'perkara_fakJab',
            'perkara_kodakaun',
            'perkara_kuantiti',
            'perkara_harga',
            'perkara_jumlahHarga',
            'perkara_tujuanPembelian',
            'perkara_jenisPeruntukan',
            'perkara_lokasiCadangan',
            'perkara_bukuLog',
            'perkara_programBaru',
            'perkara_prgrmTahapPengajian',
            'perkara_pegawai',
            'perkara_pegawaiJawatan',
        ],
    ]) ?>

</div>
