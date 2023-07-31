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
    echo('<h1 class="ingreso">·Ingreso</h1>');
}
if ($model->tipo == 1) {
    echo('<h1 class="egreso">·Egreso</h1>');
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


<br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'custom-btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style type="text/css">
    .ingreso{
        margin-top: -14px; 
        font-family: "helvetica", arial, sens-serif;
        text-decoration: underline;
        text-decoration-color: #d7bde2;
    }
    .egreso{
        margin-top: -14px; 
        font-family: "helvetica", arial, sens-serif;
        text-decoration: underline;
        text-decoration-color: #d7bde2;
    }
    .custom-btn{
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
    .caja-form .field-caja-monto input {
    width: 150px; 
    }
    .caja-form .field-caja-fecha input {
    width: 200px; 
    }
    .caja-form .field-caja-detalle textarea {
    width: 300px; 
    }
    .caja-form .field-caja-id_categoria select {
    width: 200px; 
    }
    .caja-form .field-caja-id_cliente select {
    width: 200px; 
    }


</style>
