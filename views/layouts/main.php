<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\CustomHelpers\UserHelpers;
use yii\helpers\Url;



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
<body id="main-body">

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
    if (!(Yii::$app->user->isGuest)) {
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                ['label' => 'Αρχική', 'url' => ['/site/index']],
                ['label' => 'Πηγές', 'url' => ['/references/index']],

                ['label' => 'Διπλωματικές', 'url' => ['/thesis/index']],



                (UserHelpers::UserRole() == 'professor') ?
                    ['label' => 'Καθηγητής','url'=>['professor/main'],
                        'items' => [
                            ['label' => 'Αρχική', 'url' => ['professor/main']],
                            ['label' => 'Οι διπλωματικές μου', 'url' => ['professor/thesis']],
                            ['label' => 'Επιτροπές τρίτων', 'url' => ['professor/committee']],
                            ['label' => 'Στατιστικά στοιχεία', 'url' => ['professor/statistics']],
                            ['label' => 'Πηγές φοιτητών μου', 'url' => ['professor/my-references']],
                            ['label' => 'Αιτήσεις για νέες διπλωματικές', 'url' => ['professor/thesis-application-approvals']],
                            ['label' => 'Επικοινωνία με φοιτητές', 'url' => ['professor/chat-main']],
                        ],

                    ]
                    : ((UserHelpers::UserRole() == 'student') ?
                    ['label' => 'Φοιτητής','url'=>['student/main'],
                        'items' => [
                            ['label' => 'Αρχική', 'url' => ['student/main']],
                            ['label' => 'Η διπλωματική μου', 'url' => ['student/my-thesis']],
                            ['label' => 'Οι πηγές μου', 'url' => ['student/my-references']],
                            ['label' => 'Λίστα διπλωματικών μου', 'url' => ['student/my-master-theses']],
                            ['label' => 'Αιτήσεις νέας διπλωματικής', 'url' => ['student/thesis-application-results']],

                        ],
                    ]
                    :
                    ['label' => 'Admin', 'url' => ['/admin/index']]),
            ],
        ]);

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>
        [
            Yii::$app->user->isGuest
                ? ['label' => 'Είσοδος', 'url' => ['/site/login']]


                : ['label' => Yii::$app->user->identity->username,
                    'items' => [
                        ['label' => 'Προφίλ', 'url' => ['site/profile']],
                        ['label' => 'Έξοδος Χρήστη','url'=>['/site/logout'],'linkOptions'=>['data-method'=>'post']],
                    ],
                ],

                ['label' => 'Χρήσιμα',
             'items'=>[
                 ['label'=>'Aegean','url'=>'https://www.aegean.gr/','linkOptions'=>['target'=>'_blank']],
                 ['label'=>'Eclass','url'=>'https://eclass.aegean.gr/','linkOptions'=>['target'=>'_blank']],
                 ['label'=>'Webmail','url'=>'http://webmail.aegean.gr/','linkOptions'=>['target'=>'_blank']],
                 ['label'=>'Icarus','url'=>'https://icarus-icsd.aegean.gr/','linkOptions'=>['target'=>'_blank']],
                 ['label'=>'Github','url'=>'https://github.com/Github','linkOptions'=>['target'=>'_blank']],
                      ],
            ],


        ],
    ]);
    NavBar::end();
    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink'=>['label'=>'Αρχική',
            'url' => Yii::$app->getHomeUrl()],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]); ?>
        <?= $content ?>
    </div>
</div>

<footer>

    <div class="list-group">
        <a href="/site/about" class="list-group-item">Σχετικά</a>
        <a href="/site/contact" class="list-group-item">Επικοινωνία</a>
    </div>
    <div class="container">
        <p class="pull-left">George Linardis - Aegean University <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
