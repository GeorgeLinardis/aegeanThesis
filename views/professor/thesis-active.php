<?php
use yii\grid\GridView;
use yii\helpers\Html;
use app\CustomHelpers\UserHelpers;
use dektrium\user\models\User;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Τρέχουσες διπλωματικές';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="thesis-active">
    <h1> <?= Html::encode($this->title) ?></h1><br>
    <h1> </h1><br>

    <?php
    echo $this->render('//thesis/index', [

        'dataProvider'=>$dataProvider,
        'searchModel' => $searchModel
    ])
    ?>

<?php $name = User::find()->where(['username'=>'maragkoudakis'])->one();

?>

</div>