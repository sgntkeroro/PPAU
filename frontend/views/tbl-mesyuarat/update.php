<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblMesyuarat */

$this->title = 'Update Tbl Mesyuarat: ' . ' ' . $model->mesyuarat_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuarats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mesyuarat_id, 'url' => ['view', 'id' => $model->mesyuarat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-mesyuarat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
