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
?>
<div class="caja-index">

    <h1 class="title2"><?= Html::encode($this->title) ?></h1>
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'my-gridview'],
        'columns' => [
            [
                'attribute' => 'fecha',
                'label' => 'Fecha',
                'format' => ['date', 'php:d/m/Y'],
            ],
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
        'options' => [
            'class' => 'table-responsive', // Ajusta según tus necesidades
        ],
        'pager' => [
            'class' => yii\widgets\LinkPager::class,
            'options' => ['class' => 'pagination justify-content-end'],
            'prevPageLabel' => 'Anterior', // Etiqueta para la página anterior
            'nextPageLabel' => 'Siguiente', // Etiqueta para la página siguiente
            'firstPageLabel' => 'Primera', // Etiqueta para la primera página
            'lastPageLabel' => 'Última', // Etiqueta para la última página
        ],
        'summary' => "Mostrando {begin} - {end} de {totalCount} elementos",
    
        
    ]); ?>


</div>
<style type="text/css">
    .title2{
        font-family: "helvetica", arial, sens-serif;
        text-decoration: underline;
        text-decoration-color: #d7bde2;
    }
    .my-gridview {
        width: 100%; /* Ajustar el ancho según sea necesario */
        border-collapse: collapse; /* Fusionar los bordes de las celdas */
        border: 1px solid #ccc; /* Establecer un borde alrededor de la tabla */
        border-spacing: 0; /* Espaciado entre celdas */
        background-color:  #f3e5f5 ;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);


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

/* Estilos generales para la paginación */
.pagination {
    display: flex;
    justify-content: flex-end;
}

/* Estilos para los botones de paginación */
.pagination a,
.pagination span {
    color: #007bff;
    border: 1px solid #007bff;
    padding: 6px 12px;
    margin: 0 2px;
    text-decoration: none;
    background-color: #fff;
    border-radius: 10px;
}

/* Estilos para el botón "Anterior" */
.pagination .prev:not(.disabled):hover a {
    background-color: #007bff;
    color: #fff;
}

/* Estilos para el botón "Siguiente" */
.pagination .next:not(.disabled):hover a {
    background-color: #007bff;
    color: #fff;
}

/* Estilos para el botón "Primera" */
.pagination .first:not(.disabled):hover a {
    background-color: #007bff;
    color: #fff;
}

/* Estilos para el botón "Última" */
.pagination .last:not(.disabled):hover a {
    background-color: #007bff;
    color: #fff;
}
.pagination .justify-content-end {
    padding-top: 20px;
}

</style>
