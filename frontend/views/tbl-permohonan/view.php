<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPermohonan */

$this->title = $model->permohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Permohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-permohonan-view">
    <div class="row" align="center">
        <br><h4>JADUAL PERALATAN</h4><br>
        <div class="table-responsive">
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->permohonan_id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->permohonan_id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>

    <p align="left"><br>
        <b>Permohonan ID : </b><?= $model->permohonan_id ?><br>
        <b>ID Pemohon : </b><?= $model->user_id ?><br>
        <b>Tarikh Permohonan : </b><?= $model->permohonan_tarikh ?><br>
        <b>Pusat Kos : </b><?= $model->permohonan_pusatkos ?><br>
        <b>Fakulti / Jabatan : </b><?= $model->permohonan_fakjab ?><br>
        <b>Cawangan : </b><?= $model->cawangan_id ?><br>
        <b>Status Permohonan : </b><?= $model->statusPermohonan_id ?><br>
        <b>Catitan : </b><?= $model->permohonan_catitan ?><br>
    </p>
    
    <div class="row" align="center">
    <div class="col-lg-15" align="center">
        <br><h4>JADUAL PERALATAN</h4><br>
            <div class="table-responsive" align="center">
                <table class="table table-bordered table-hover table-striped" align="center">
                    <thead>
                        <tr class="warning" align="center">
                            <th>Peralatan Yang Diperlukan</th>
                            <th>Kod Akaun</th>
                            <th>Kuantiti</th>
                            <th>Harga Seunit</th>
                            <th>Jumlah Harga</th>
                            <th>Kelulusan Jawatankuasa Teknikal Berkaitan</th>
                            <th>Kategori Pelanggan</th>
                            <th>Tujuan Pembelian</th>
                            <th>Kategori Permohonan</th>
                            <th>Jenis Peruntukan</th>
                            <th>Tahun Sedia</th>
                            <th>Lokasi Cadangan</th>
                            <th>Buku Log</th>
                            <th>Program Baru</th>
                            <th>Tahap Pengajian</th>
                            <th>Pegawai</th>
                            <th>Jawatan</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        <?php 
                            foreach ($view as $row){
                                echo "<tr>";
                                echo "<td>".$row['perkaraNama']."</td>";
                                echo "<td>".$row['kodAkaun']."</td>";                                    
                                echo "<td>".$row['kuantiti']."</td>";
                                echo "<td>".$row['harga']."</td>";
                                echo "<td>".$row['jumlahHarga']."</td>";
                                echo "<td>".$row['kelulusanJK']."</td>";
                                echo "<td>".$row['katPelanggan']."</td>";
                                echo "<td>".$row['tujuanBeli']."</td>";
                                echo "<td>".$row['katPermohonan']."</td>";
                                echo "<td>".$row['jenisPeruntukan']."</td>";
                                echo "<td>".$row['tahunSedia']."</td>";
                                echo "<td>".$row['lokasiCadangan']."</td>";
                                echo "<td>".$row['bukuLog']."</td>";
                                echo "<td>".$row['programBaru']."</td>";
                                echo "<td>".$row['tahapPengajian']."</td>";
                                echo "<td>".$row['pegawai']."</td>";
                                echo "<td>".$row['jawatan']."</td>";
                                echo "</tr>";
                            }
                        ?>                        
                    </tbody>
                </table>
            </div>
    </div>
    </div>

</div>
