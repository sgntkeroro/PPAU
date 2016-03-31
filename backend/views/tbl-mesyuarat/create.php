<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblMesyuarat */

$this->title = 'Create Tbl Mesyuarat';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Mesyuarats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuarat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
