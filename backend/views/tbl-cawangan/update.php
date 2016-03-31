<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblCawangan */

$this->title = 'Update Tbl Cawangan: ' . ' ' . $model->cawangan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Cawangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cawangan_id, 'url' => ['view', 'id' => $model->cawangan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-cawangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
