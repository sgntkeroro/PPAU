<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblStatusmesyuarat */

$this->title = 'Create Tbl Statusmesyuarat';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Statusmesyuarats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-statusmesyuarat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
