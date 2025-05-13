<?php 
use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $labels array */
/* @var $data array */

$this->title = 'Grafico';
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="background: white;">
    <div>
      <?php



$this->title = 'Seleccionar período';
?>

<?php $form = ActiveForm::begin(); ?>

<div class="form-group">
    <?= Html::label('Periodo/Año', 'anio') ?>
    <?= Html::dropDownList('anio', $anioSeleccionado, $anios, [
        'class' => 'form-control',
        'onchange' => 'this.form.submit();'
    ]) ?>
</div>

<?php ActiveForm::end(); ?>

<p>Año seleccionado: <strong><?= Html::encode($anioSeleccionado) ?></strong></p>

    </div>
<div class="site-grafico">
    <h1><?= Html::encode($this->title) ?></h1>

   <?= 
   ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 250,
        'width' => 600,
    ],
    'clientOptions' => [
        'scales' => [
            'yAxes' => [
                [
                    'ticks' => [
                        'beginAtZero' => true,
                    ],
                ],
            ],
        ],
    ],
    'data' => $data,
]);


   /*ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 250,
        'width' => 600,
    ],
    'clientOptions' => [
        'scales' => [
            'yAxes' => [
                [
                    'ticks' => [
                        'beginAtZero' => true,
                    ],
                ],
            ],
        ],
    ],
    'data' => [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Gastos de Taller',
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'borderWidth' => 2,
                'data' => $data['Gastos de Taller'],
                'fill' => false,
                'tension' => 0
            ],
            [
                'label' => 'Gastos Habituales',
                'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                'borderColor' => 'rgba(54, 162, 235, 1)',
                'borderWidth' => 2,
                'data' => $data['Gastos Habituales'],
                'fill' => false,
                'tension' => 0
            ],
            [
                'label' => 'Ingresos',
                'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                'borderColor' => 'rgba(255, 206, 86, 1)',
                'borderWidth' => 2,
                'data' => $data['Ingresos'],
                'fill' => false,
                'tension' => 0
            ],
        ],
    ],
]); */?>

</div>
</div>