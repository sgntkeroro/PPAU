<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TblCawanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Cawangans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-cawangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Cawangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cawangan_id',
            'negeri_id',
            'cawangan_nama',
            'cawangan_poskod',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
