<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body style="background-color: #f2f2f2">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Aegean Thesis',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => [
            ['label' => 'Αρχική', 'url' => ['/site/index']],
            ['label' => 'Λογαριασμοί', 'url' => ['/accounts/index']],
            ['label' => 'Καθηγητής',
                'items'=>[
                    ['label'=>'Αρχική','url'=>['professor/index']],
                    ['label'=>'Διπλωματικές','url'=>['professor/thesis']],
                    ['label'=>'Επιτροπές','url'=>['professor/committee']],
                    ['label'=>'Στατιστικά','url'=>['professor/statistics']],
                  ],
            ],
            ['label' => 'Φοιτητής',
                'items'=>[
                    ['label'=>'Αρχική','url'=>['student/index']],

                ],
            ],

        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ? (
            ['label' => 'Είσοδος', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Έξοδος (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
            ['label' => 'Χρήσιμα',
             'items'=>[
                 ['label'=>'Aegean','url'=>'https://www.aegean.gr/'],
                 ['label'=>'Eclass','url'=>'https://eclass.aegean.gr/'],
                 ['label'=>'Webmail','url'=>'http://webmail.aegean.gr/'],
                 ['label'=>'Icarus','url'=>'https://icarus-icsd.aegean.gr/'],
                 ['label'=>'Github','url'=>'https://github.com/">Github'],
                      ],
            ],
        ],
    ]);
    NavBar::end();
    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
