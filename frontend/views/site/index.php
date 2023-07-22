
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;



/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
   
    <div class="body-content">
        <div>
            <?= Html::a(Yii::t('app', 'Ingreso'), ['caja/create', 'dato' => 0], ['class' => 'btn btn-success']) ?>

           <?= Html::a(Yii::t('app', 'Egreso'), ['caja/create', 'dato' => 1], ['class' => 'btn btn-success']) ?>

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


        <div>
          <?php



// Configuración de la GridView
/*echo GridView::widget([
    'dataProvider' => $dataProvider,
    'layout' => "{items}\n{pager}", // Opcional: ajusta el diseño según tus necesidades
    'columns' => [
        'cetegoria',
        'Ingreso',
        'Saldo',
        // ... Agrega aquí más columnas según tus datos

        // Columna de acciones con estilo responsivo
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'contentOptions' => ['class' => 'actions-column'],
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                        'title' => 'Ver',
                    ]);
                },
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                        'title' => 'Editar',
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                        'title' => 'Eliminar',
                        'data-confirm' => '¿Estás seguro de eliminar este elemento?',
                        'data-method' => 'post',
                    ]);
                },
            ],
        ],
    ],
]);*/
?>

        </div>
    </div>
</div>
