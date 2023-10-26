<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'method' => 'post', // Puedes usar 'get' o 'post' según tus necesidades.
]);

echo Html::textInput('campo1', null, ['placeholder' => 'Campo 1']);
echo Html::textInput('campo2', null, ['placeholder' => 'Campo 2']);
// Agrega más campos según sea necesario.

echo Html::submitButton('Enviar', ['class' => 'btn btn-primary']);

ActiveForm::end();


/*$form = ActiveForm::begin([
    'method' => 'get', // Puedes usar 'post' si prefieres.
]);

echo $form->field('selectedMonth')->dropDownList([
    '1' => 'Enero',
    '2' => 'Febrero',
    // ... otros meses ...
], ['prompt' => 'Selecciona un mes']);

echo $form->field('selectedYear')->dropDownList([
    '2023' => '2023',
    '2022' => '2022',
    // ... otros años ...
], ['prompt' => 'Selecciona un año']);

echo Html::submitButton('Buscar', ['class' => 'btn btn-primary']);

ActiveForm::end();*/
?>
