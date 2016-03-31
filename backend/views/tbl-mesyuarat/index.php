<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblMesyuaratSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Mesyuarats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-mesyuarat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbl Mesyuarat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mesyuarat_id',
            'perkara_id',
            'mesyuarat_tarikh',
            'mesyuarat_kuantiti',
            'mesyuarat_jumlah',
            // 'mesyuarat_catitan:ntext',
            // 'statusMesyuarat_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
