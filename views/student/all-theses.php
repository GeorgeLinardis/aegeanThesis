<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\StudentController*/

?>
<?php
$this->title = 'Διπλωματικές Μεταπτυχιακού';
$this->params['breadcrumbs'][] = ['label' => 'Φοιτητής', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-all-theses">
<h1> Διπλωματικές Μεταπτυχιακού Προγράμματος Σπουδών </h1>
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

</div>