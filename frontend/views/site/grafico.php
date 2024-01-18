<?php 
use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $labels array */
/* @var $data array */

$this->title = 'Grafico';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-grafico">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= ChartJs::widget([
        'type' => 'bar',
        'options' => [
            'height' => 400,
            'width' => 600,
        ],
        'data' => [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Gastos de Taller',
                    'backgroundColor' => 'rgba(255,99,132,0.2)',
                    'borderColor' => 'rgba(255,99,132,1)',
                    'borderWidth' => 1,
                    'data' => $data['Gastos de Taller'],
                ],
                [
                    'label' => 'Gastos Habituales',
                    'backgroundColor' => 'rgba(54,162,235,0.2)',
                    'borderColor' => 'rgba(54,162,235,1)',
                    'borderWidth' => 1,
                    'data' => $data['Gastos Habituales'],
                ],
                [
                    'label' => 'Ingresos',
                    'backgroundColor' => 'rgba(255,206,86,0.2)',
                    'borderColor' => 'rgba(255,206,86,1)',
                    'borderWidth' => 1,
                    'data' => $data['Ingresos'],
                ],
            ],
        ],
    ]); ?>
</div>
