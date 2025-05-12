<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Cliente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <div class="form-column">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-column">
            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-row">
         <div class="form-column">
            <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="form-column">
            <?= $form->field($model, 'telefono')->textInput() ?>
        </div>
    </div>
    <div class="form-row">
       
    </div>

<br><br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'custom-buttom']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style type="text/css">
    .cliente-form .field-cliente-nombre input {
    width: 150px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
    }
    .cliente-form .field-cliente-apellido input {
    width: 150px; 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
    }
    .cliente-form .field-cliente-telefono input {
    width: 150px; 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
    }
    .cliente-form .field-cliente-descripcion input {
    width: 150px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);  
    }
    .custom-buttom{
        display: inline-block;
        padding: 12px 20px;
        border-radius: 5px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); 
        transition: background-color 0.3s ease; 
        }
    .custom-button:hover {
    background-color: #45a049;
    }
    .form-row {
    width: 100%;
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
