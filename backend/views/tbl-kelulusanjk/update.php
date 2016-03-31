<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKelulusanjk */

$this->title = 'Update Tbl Kelulusanjk: ' . ' ' . $model->JK_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Kelulusanjks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->JK_id, 'url' => ['view', 'id' => $model->JK_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-kelulusanjk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
