<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Caja $model */
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
