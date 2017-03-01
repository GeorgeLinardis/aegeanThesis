<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Επιτροπές';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="professor-committee">
    <h1> <?= Html::encode($this->title) ?></h1><br>
    <p>Οι Επιτροπές στις οποίες λαμβάνετε μέρος ως επιβλέπων ή μέλος Επιτροπής την τρέχουσα περίοδο είναι οι εξής:</p>
    <p>Επιλέξτε το σύμβολο <span class="glyphicon glyphicon-eye-open" style="color:#0080ff"></span> στην δεξιά στήλη για να δείτε τα στοιχεία της διπλωματικής αναλυτικότερα.</p><br><br>


    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'ID',
            'masterID',
            'title',
            'status',
            'datePresented',
            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view}',
                'controller'=>'thesis'], //{delete} {update}

        ],
    ]); ?>

    </div>
</div>