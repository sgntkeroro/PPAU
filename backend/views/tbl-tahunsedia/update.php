<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblTahunsedia */

$this->title = 'Update Tbl Tahunsedia: ' . ' ' . $model->tahunSedia_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Tahunsedias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tahunSedia_id, 'url' => ['view', 'id' => $model->tahunSedia_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-tahunsedia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
