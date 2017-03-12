<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\CustomHelpers\UserHelpers;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\professor */
?>


<?php if (UserHelpers::UserRole()=='administrator'){
    $this->title = 'Επισκόπηση στοιχείων καθηγητή';
    $this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'/admin/index'];
    $this->params['breadcrumbs'][] = ['label'=>'Καθηγητές','url'=>'/admin/all-professors'];
    $this->params['breadcrumbs'][] = $this->title;
    echo '<h1>'.Html::encode($this->title).'</h1>';
}
else {
    $this->title = 'Προφίλ ';
    $this->params['breadcrumbs'][] = $this->title;
}
?>

<div class="professor-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'userUsername',
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'skypeUsername',
            'comments:ntext',
            'url:url',
            'signature',
            //'photo',
        ],
    ]) ?>

<?php if (UserHelpers::UserRole()!='administrator'):?>
    <p>Για να οδηγηθείτε στην λίστα με τα μεταπτυχιακά στα οποία είστε μέλος επιλέξτε  <a href= "<?= Url::to('@web/professor/professor-masters')?>" >εδώ</a></p>

    <?= Html::a('Τροποποίηση', ['//professor/update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
<?php endif;?>
</div>
