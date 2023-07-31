
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;



/** @var yii\web\View $this */

$this->title = 'Dalinda Confecciones';
?>
<div class="site-index">

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
    'tableOptions' => ['class' => 'my-gridview'],
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

        <br><br>
        <div class="body-content">
        <div>
            <?= Html::a(Yii::t('app', 'ingreso'), ['caja/create', 'dato' => 0], ['class' => 'custom-button']) ?>

           <?= Html::a(Yii::t('app', 'egreso'), ['caja/create', 'dato' => 1], ['class' => 'custom-button']) ?>

        </div>
        <hr>
        

        <div>



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
<style type="text/css">
    /* Estilos para la tabla del GridView con la clase my-gridview */
    .my-gridview {
        width: 100%; /* Ajustar el ancho según sea necesario */
        border-collapse: collapse; /* Fusionar los bordes de las celdas */
        border: 1px solid #ccc; /* Establecer un borde alrededor de la tabla */
        border-spacing: 0; /* Espaciado entre celdas */
        background-color: #d7bde2;
    }

    .my-gridview th,
    .my-gridview td {
        padding: 8px; /* Espaciado interno para las celdas de encabezado y datos */
        text-align: left; /* Alinear el contenido del texto a la izquierda */
        /*background-color: #ebdef0;*/
        border: 1px solid #f5eef8; /* Agregar borde a las celdas */
    }

    /* Estilo para filas pares */
    .my-gridview tr.even-row {
        background-color: #ebdef0; /* Color de fondo para filas pares */
    }

    /* Estilo para filas impares */
    .my-gridview tr.odd-row {
        background-color:  #f4ecf7 ; /* Color de fondo para filas impares */
    }

    /* Estilos para el pie de la tabla (footer) */
    .my-gridview tfoot {
        font-weight: bold; /* Texto en negrita en el pie de la tabla */
        background-color: #d7bde2; /* Color de fondo para el pie de la tabla */
    }
    .custom-button {
    display: inline-block;
    padding: 12px 20px;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra del botón */
    transition: background-color 0.3s ease; /* Transición para el cambio de color al pasar el cursor */
    }
    .custom-button:hover {
    background-color: #45a049;
    }
</style>

