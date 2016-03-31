<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblStatusmesyuarat */

$this->title = 'Update Tbl Statusmesyuarat: ' . ' ' . $model->statusMesyuarat_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Statusmesyuarats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->statusMesyuarat_id, 'url' => ['view', 'id' => $model->statusMesyuarat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-statusmesyuarat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
