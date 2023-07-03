<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Caja $model */

$this->title = Yii::t('app', 'Create Caja');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cajas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'descripcion' => $descripcion,
        'clientesDesplegable' => $clientesDesplegable,
    ]) ?>

</div>