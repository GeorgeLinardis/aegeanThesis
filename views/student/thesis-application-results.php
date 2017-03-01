<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<?php
$this->title = 'Αιτήσεις νέας διπλωματικής';
$this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="message">
    <?php if (isset($message) && $message!=null): ?>
        <div class="alert alert-success alert-dismissable">
            <?= $message?>
        </div>
    <?php endif; ?>
</div>
<div class="student-thesis-application-results">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'professorID',
                'value'=>function ($model) {
                    return $model->professor->lastname.' '. $model->professor->firstname;
                },
            ],
            [
                'attribute'=>'thesisID',
                'value'=>('thesis.title')
            ],
            [
                'attribute'=>'studentID',
                'value'=>function ($model) {
                    if ($model->student->lastname ==null || $model->student->firstname ==null){
                        return $model->student->ID;
                    }
                    return $model->student->lastname.' '. $model->student->firstname;
                },

            ],
            'dateCreated:datetime',
            [
                'attribute'=>'thesisID',
                'value'=>('thesis.status')
            ],



        ],
    ]); ?>
</div>
