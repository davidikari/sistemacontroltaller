<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;
use Yii;


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
    
<div class="form-column">
    <div class="form-column">
    <?= $form->field($model, 'monto')->textInput() ?>
    </div>
    <?= $form->field($model, 'tipo')->hiddenInput()->label(false) ?>
    <div class="form-column">
    <?= $form->field($model, 'id_categoria')->dropDownList(
    $catDesplegable,
        [
            'prompt' => [
                'text' => 'Seleccione una categoría', // Texto que se mostrará en el prompt
                'options' => ['value' => ''] // Valor del prompt (generalmente se deja como cadena vacía)
            ]
        ]
    ); ?>
    </div>
</div>

<div class="form-column">

    <div class="form-column">
        <?= $form->field($model, 'fecha')->textInput() ?>
    </div>
    <br>
    <div class="form-column">
    <?php if ($model->tipo == 0) { ?>
    <!--<?//= $form->field($model, 'id_cliente')->dropDownList($clientesDesplegable, ['prompt' => 'Seleccione un cliente']); ?>-->
    <?= $form->field($model, 'id_cliente')->widget(Select2::classname(), [
        'options' => [
            'placeholder' => 'Buscar cliente...',
            'style' => 'width: 300px;', 
            'id' => 'busca-cliente',
        ],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'ajax' => [
                'url' => \yii\helpers\Url::to(['cliente/buscar']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {q:params.term}; }'),
                'processResults' => new JsExpression('function(data) {
                    return { results: data };
                }'),
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(cliente) { return cliente.text; }'),
            'templateSelection' => new JsExpression('function (cliente) { return cliente.text; }'),
        ],
    ]); ?>


 <?php } ?>
    </div>

</div>

        <?= $form->field($model, 'detalle')->textarea(['rows' => 4]) ?>

<br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'custom-btn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style type="text/css">
    #busca-cliente {
        max-width: 100%;
        width: 300px; /* o el valor que desees */
    }

    .selection {
        max-width: 50px;
    }
    .select2-container .select2-selection--single {
        display: inline-block !important;
        width: 300px; /* o auto si querés que se ajuste dinámicamente */
    }
    .select2-results {
        display: inline-block !important;
        width: 300px;
    }
    .select2-container--krajee-bs5{
        display: inline-block !important;
        width: 300px;
    }
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
    .form-column {
    display: inline-block;
    width: 15%; /* Ajusta el ancho según tus necesidades */
    margin-right: 5%; /* Espacio entre las columnas */
    vertical-align: top; /* Alinear la parte superior de los campos */
    }

    .form-column:last-child {
        margin-right: 0; /* Eliminar el margen derecho para la última columna */
    }


</style>
