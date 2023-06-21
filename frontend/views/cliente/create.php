<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Cliente $model */

$this->title = Yii::t('app', 'Create Cliente');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
