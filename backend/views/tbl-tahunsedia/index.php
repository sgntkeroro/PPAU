<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblTahunsediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Tahunsedias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-tahunsedia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Tahunsedia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tahunSedia_id',
            'tahunSedia_tahun',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
