
<?php
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
   
    <div class="body-content">
        <div>
            <?= Html::a(Yii::t('app', 'ingreso'), ['caja/create', 'dato' => 0], ['class' => 'btn btn-success']) ?>

           <?= Html::a(Yii::t('app', 'egreso'), ['caja/create', 'dato' => 1], ['class' => 'btn btn-success']) ?>

        </div>
        <hr>
        

        <div>
            <?php 

            $dataProvider = new \yii\data\ArrayDataProvider([
    'allModels' => $totales,
    'pagination' => false,
]);

echo \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'showFooter' => true,
    'rowOptions' => function ($model, $key, $index, $grid) {
        return $index % 2 == 0 ? ['class' => 'even-row'] : ['class' => 'odd-row'];
    },
    'columns' => [

        // Agrega aquí las columnas para las demás categorías
          [
            'attribute' => 'categoria',
            'label' => 'Categoria:',
            'footer' => 'Total',
        ],
          [
            'attribute' => 'Ingreso',
            'footer' => array_sum(array_column($totales, 'Ingreso')),
        ],
        [
            'attribute' => 'Egreso',
            'footer' => array_sum(array_column($totales, 'Egreso')),
        ],
        [
            'attribute' => 'Saldo',
            'footer' => array_sum(array_column($totales, 'Saldo')),
        ],
    ],
]);

             ?>

        </div>
    </div>
</div>
