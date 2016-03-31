<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblStatuspermohonan */

$this->title = 'Update Tbl Statuspermohonan: ' . ' ' . $model->statusPermohonan_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Statuspermohonans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->statusPermohonan_id, 'url' => ['view', 'id' => $model->statusPermohonan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-statuspermohonan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
