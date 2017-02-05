<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>
<?php
$this->title = 'Καθηγητές';
$this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-all-professors">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'thesisID',
            'ID',
            //'userUsername',
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'skypeUsername',
            //'url:ntext',
            //'comments:ntext',
            //'photo',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'controller'=>'professor'],
        ],
    ]); ?>


</div>
