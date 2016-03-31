<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPerkara */

$this->title = 'Update Tbl Perkara: ' . ' ' . $model->perkara_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Perkaras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perkara_id, 'url' => ['view', 'id' => $model->perkara_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-perkara-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
