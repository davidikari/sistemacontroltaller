<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="img/Dalinda2.png" style="width: 250px; height: 70px; margin-left: -80px; margin-top: 10px;" >',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-white bg-transparent fixed-top edit',
        ],
    ]);

    $menuItems = [
        ['label' => '', 'url' => ['/site/index']],
        ['label' => 'Cliente', 'url' => ['/cliente/index']],
        ['label' => 'Caja', 'url' => ['/caja/index']],
    ];
   /* if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }*/

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    /*if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }*/
    NavBar::end();
    ?>
</header>
<br><br>

<main role="main" class="flex-shrink-0" style="margin-top: 80px;">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div> 
<div class="imagen-container">
<img class="imagen" src="img/Dalinda0001.png">
<style type="text/css">
    .imagen-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .imagen{
        position: fixed;
        top: 90px;
        left: 680px;
        z-index: -1;
        width: 50%;
        height: 100%;
        opacity: 0.7;
        transform: rotate(180deg);
    }
</style>
</div>
</main>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();

