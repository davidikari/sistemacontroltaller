
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use yii\bootstrap5\ActiveForm;


/** @var yii\web\View $this */

$this->title = 'Dalinda Confecciones';
?>
<div class="site-index">
    <div>
      
<?php 
    $form = ActiveForm::begin(['method' => 'post']);
    
    // Supongamos que $periodos contiene las fechas en un formato simple 'YYYY-MM'
    //$periodos = ['2024-01', '2023-12', '2023-11', '2023-10', '2023-09', '2023-08', '2023-07'];

    // Construir un array asociativo sin ceros a la izquierda
    $options = array_combine($periodos, $periodos);
?>

<?= Html::dropDownList('periodo', null, $options, ['prompt' => 'Selecciona un periodo']) ?>

<?= Html::submitButton('Mostrar', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>




    </div>

<br>
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

        

        <br>
         <?php 

            $dataProvider2 = new \yii\data\ArrayDataProvider([
                'allModels' => $totalGen,
                'pagination' => false,
            ]);

            echo \yii\grid\GridView::widget([
                'dataProvider' => $dataProvider2,
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
                        'footer' => array_sum(array_column($totalGen, 'Ingreso')),
                    ],
                    [
                        'attribute' => 'Egreso',
                        'footer' => array_sum(array_column($totalGen, 'Egreso')),
                    ],
                    [
                        'attribute' => 'Saldo',
                        'footer' => array_sum(array_column($totalGen, 'Saldo')),
                    ],
                ],
            ]);

             ?>
    </div>

<?php use yii\web\YiiAsset;

YiiAsset::register($this); // Esto carga jQuery y Bootstrap (si los usas)

$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js'); // Incluye Chart.js desde un CDN

 ?>
<canvas id="graficoIngresosEgresos" width="400" height="200"></canvas>

<script>
var ctx = document.getElementById("graficoIngresosEgresos").getContext('2d');

var ingresos = <?= json_encode($ingresos) ?>;
var egresos = <?= json_encode($egresos) ?>;

var meses = ingresos.map(item => item.mes); // Asumiendo que los meses están numerados del 1 al 12

var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: meses,
        datasets: [
            {
                label: 'Ingresos',
                data: ingresos.map(item => item.total),
                backgroundColor: 'green'
            },
            {
                label: 'Egresos',
                data: egresos.map(item => item.total),
                backgroundColor: 'red'
            }
        ]
    },
});
</script>




<style type="text/css">
    /* Estilos para la tabla del GridView con la clase my-gridview */
    .my-gridview {
        width: 100%; /* Ajustar el ancho según sea necesario */
        border-collapse: collapse; /* Fusionar los bordes de las celdas */
        border: 1px solid #ccc; /* Establecer un borde alrededor de la tabla */
        border-spacing: 0; /* Espaciado entre celdas */
        background-color: #d7bde2;
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
    
</style>

