
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $dataProvider app\models\Professor */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;

$this->title = 'Στοιχεία επικοινωνίας καθηγητών';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'photo',
                'format' => 'html',
                'label' => '',
                'value' => function ($data) {
                    if (isset($data['photo']) && $data['photo']!= null){
                    return Html::img('/images/userPhotos/' . $data['photo'],
                        ['width' => '60px']);
                    }
                    else{
                        return Html::img('/images/userPhotos/User_unknown_profile.png',
                            ['width' => '60px']);

                    }
    },
            ],
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'url:url',

        ],
    ]) ?>
</div>

