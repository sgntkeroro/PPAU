<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPerkaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Perkaras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-perkara-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Perkara', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'perkara_id',
            'permohonan_id',
            'JK_id',
            'katPelanggan_id',
            'katPermohonan_id',
            // 'tahunSedia_id',
            // 'perkara_nama',
            // 'perkara_fakJab',
            // 'perkara_kodakaun',
            // 'perkara_kuantiti',
            // 'perkara_harga',
            // 'perkara_jumlahHarga',
            // 'perkara_tujuanPembelian',
            // 'perkara_jenisPeruntukan',
            // 'perkara_lokasiCadangan',
            // 'perkara_bukuLog',
            // 'perkara_programBaru',
            // 'perkara_prgrmTahapPengajian',
            // 'perkara_pegawai',
            // 'perkara_pegawaiJawatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
