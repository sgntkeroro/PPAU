<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblKatpelanggan */

$this->title = 'Update Tbl Katpelanggan: ' . ' ' . $model->katPelanggan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Katpelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->katPelanggan_id, 'url' => ['view', 'id' => $model->katPelanggan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-katpelanggan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
