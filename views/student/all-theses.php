<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\StudentController*/

?>

<h2> Διπλωματικές Μεταπτυχιακού Προγράμματος Σπουδών </h2>
<h2> "<?php echo $Master->title?> " </h2><br />
<?=



GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'ID',
        'professorID',
        'title',
        'status',
        'dateCreated',
        ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}'], //{delete} {update}
    ],
]); ?>

