<?php

use frontend\models\Caja;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CajaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Cajas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'fecha',
            //'id',
            'monto',
            [
                'attribute' => 'tipo',
                'value' => function ($model) {
                    return $model->tipo === 0 ? 'Ingreso' : 'Egreso';
                },
            ],
            [
                'attribute' => 'id_categoria',
                'value' => 'categoria.descripcion',
            ],
            [
                'attribute' => 'id_cliente',
                'value' => 'cliente.nombre'
            ],
            'detalle',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Caja $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
