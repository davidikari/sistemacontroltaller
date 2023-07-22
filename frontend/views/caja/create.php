<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Caja $model */

$this->title = Yii::t('app', 'Create Caja');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cajas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<hr>
<br>
<div class="caja-create">

    <?= $this->render('_form', [
        'model' => $model,
        'catDesplegable' => $catDesplegable,
        'clientesDesplegable' => $clientesDesplegable,
    ]) ?>

</div>
