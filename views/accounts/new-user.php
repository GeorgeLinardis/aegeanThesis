<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Professor;
use app\models\DbUser;
?>
<?php
$this->title = 'Νέος Χρήστης';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="accounts-new-user">
<div class="row" >
     <h1><?= Html::encode($this->title) ?></h1><br />


<!--New professor form-->
        <div class="col-sm-6" >

        <h3 >Είστε καθηγητής;</h3>
            <a href = "<?= Url::to(['new-user-account','role'=>'professor'])?>">
                <img class="center-block" src = "<?= Url::to('@web/images/newuser/professor(Pixabay).jpg')?>" alt = "Professor">
            </a>



        </div>
<!--New student form-->
        <div class="col-sm-6" >
        <h3>Είστε φοιτητής;</h3>
         <a href = "<?= Url::to(['new-user-account','role'=>'student'])?>">
            <img class="center-block" src = "<?= Url::to('@web/images/newuser/student(Pixabay).jpg')?>" alt = "Student">
        </a>


        </div>




</div>

</div>

