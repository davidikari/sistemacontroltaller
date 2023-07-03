
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
        <div>
            <h1>saldo: <?php echo ($saldo); ?></h1>
            <h1>ingreso: <?php echo ($ingreso); ?></h1>
            <h1>egreso: <?php echo ($egreso); ?></h1>
            <h1>gasto fijo: <?php echo ($gastoFijo); ?></h1>
            <h1>gasto habitual: <?php echo ($gastoHabitual); ?></h1>
            <h1>gasto taller: <?php echo ($gastoTaller); ?></h1>
            <h1>alquiler saldo: <?php echo ($alquiler); ?></h1>
            <h1>alquiler ingreso: <?php echo ($alquilerIngreso); ?></h1>
            <h1>alquiler egreso: <?php echo ($alquilerEgreso); ?></h1>
            <h1>saldo taller: <?php echo ($saldoTaller); ?></h1>
            <h1>Ingreso total taller: <?php echo ($ingresoTotalTaller); ?></h1>

        </div>
        
    </div>
</div>
