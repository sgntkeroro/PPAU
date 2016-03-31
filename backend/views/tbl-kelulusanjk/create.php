<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblKelulusanjk */

$this->title = 'Create Tbl Kelulusanjk';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Kelulusanjks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kelulusanjk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
