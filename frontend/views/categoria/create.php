<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Categoria $model */

$this->title = Yii::t('app', 'Create Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
