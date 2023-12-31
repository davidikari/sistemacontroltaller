<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Caja $model */
/** @var yii\widgets\ActiveForm $form */
?>
<?php
if ($model->tipo == 0) {
    echo('<h1>Ingreso</h1>');
}
if ($model->tipo == 1) {
    echo('<h1>Egreso</h1>');
}

?>
<hr>
<br>
<div class="caja-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'tipo')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'id_categoria')->dropDownList(
    $catDesplegable,
        [
            'prompt' => [
                'text' => 'Seleccione una categoría', // Texto que se mostrará en el prompt
                'options' => ['value' => ''] // Valor del prompt (generalmente se deja como cadena vacía)
            ]
        ]
    ); ?>

    <?php if ($model->tipo == 0) { ?>

    <?= $form->field($model, 'id_cliente')->dropDownList($clientesDesplegable, ['prompt' => 'Seleccione un cliente']); ?>

    <?php } ?>
    
    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'detalle')->textarea(['rows' => 4]) ?>



    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
