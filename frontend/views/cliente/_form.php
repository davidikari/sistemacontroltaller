<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Cliente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
<br><br>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'custom-buttom']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style type="text/css">
    .cliente-form .field-cliente-nombre input {
    width: 150px; 
    }
    .cliente-form .field-cliente-apellido input {
    width: 150px; 
    }
    .cliente-form .field-cliente-telefono input {
    width: 150px; 
    }
    .cliente-form .field-cliente-descripcion input {
    width: 150px; 
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
</style>
