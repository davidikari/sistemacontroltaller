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

<div class="caja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'tipo')->hiddenInput()->label(false) ?>


    <?= $form->field($model, 'id_categoria')->dropDownList($catDesplegable, ['prompt' => 'Seleccione una categoria']); ?>

    <?= $form->field($model, 'id_cliente')->dropDownList($clientesDesplegable, ['prompt' => 'Seleccione un cliente']); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
