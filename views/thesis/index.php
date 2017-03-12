<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\CustomHelpers\UserHelpers;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ThesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (Yii::$app->controller->id=="thesis") {
    $this->title = 'Διπλωματικές Πανεπιστημίου';
    $this->params['breadcrumbs'][] = $this->title;
}
elseif (Yii::$app->controller->id=="student"){

    $this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'main'];
    $this->params['breadcrumbs'][] = $this->title;
} ?>
<div class="row">
    <div class="row thesis-index">


        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?php if (Yii::$app->controller->id=="thesis"):?>
        <h1><?= Html::encode($this->title) ?></h1><br>
            <p>Παρακάτω μπορείτε να δείτε όλες τις διπλωματικές του Πανεπιστημίου.Οι διπλωματικές με ένδειξη κατάστασης <i>"δεν έχει ανατεθεί"</i> δεν έχουν ανατεθεί σε κάποιο φοιτητή ενώ
            όσες έχουν την ένδειξη <i>"υπο έγκριση"</i> έχουν δεχθεί τουλάχιστον ένα αίτημα ανάθεσης.<br><br>Σε αυτές που η κατάσταση είναι <i>"έχει ανατεθεί"</i> έχουν ανατεθεί σε φοιτητή/φοιτητές
            και όσες έχουν ένδειξη <i>"προς Επιτροπή"</i> ή <i>"ολοκληρώθηκε"</i> βρίσκονται στο στάδιο
            της παρουσίσης ή έχουν ήδη ολοκληρώσει την παρουσίαση τους.</p>
        <?php endif;?>

        <p>Επιλέξτε το σύμβολο <span class="glyphicon glyphicon-eye-open" style="color:#0080ff"></span> στην δεξιά στήλη για να δείτε τα στοιχεία της διπλωματικής αναλυτικότερα.</p><br>
    </div>
    <div class="row">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                'ID',

                //'masterID',
                [
                    'attribute' => 'masterID',
                    'value' => ('master.title')
                ],

                //'professorID',
                [
                    'attribute' => 'professorID',
                    'value'=>function ($model) {
                        return $model->professor->lastname.' '. $model->professor->firstname;
                    },
                ],
                [
                    'attribute' => 'description',
                    'label'=>'Φοιτητές',
                    'value'=>function ($model) {
                        $Students = \app\models\Student::find()->where(['ThesisID'=>$model->ID])->all();
                        $results = "";
                        foreach ($Students as $student){
                            $results .= ($student->lastname)." ".$student->firstname.",\n";
                        };
                        return $results;
                    },
                ],

                'title',
                //'description:ntext',
                //'goal:ntext',
                // 'prerequisite_knowledge:ntext',
                // 'max_students',
                // 'comments:ntext',
                 'status',
                 'dateCreated:date',
                 //'datePresented:date',
                // 'committee1',
                // 'committee2',
                // 'committee3',
                // 'RequestPDf',



                ['class' => 'yii\grid\ActionColumn',
                    'template'=> '{view}',
                    'controller'=>'thesis'


                ],
            ],
        ]); ?>
    </div>
</div>