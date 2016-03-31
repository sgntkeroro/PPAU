<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblNegeri */

$this->title = 'Update Tbl Negeri: ' . ' ' . $model->negeri_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Negeris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->negeri_id, 'url' => ['view', 'id' => $model->negeri_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-negeri-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
