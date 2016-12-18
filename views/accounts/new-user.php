<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\Professor;
use app\models\DbUser;
?>
<?php?>

    <div class="row" >

     <h2 class="text-center">Επιλέξτε είδος χρήστη:</h2><br />


<!--New professor form-->
        <div class="col-sm-6" >

        <h3 class="text-center">Είστε καθηγητής;</h3>
            <a href = "<?= Url::to('new-user-professor')?>">
                <img class="center-block" src = "<?= Url::to('@web/images/newuser/professor(Pixabay).jpg')?>" alt = "Professor" style="height: 313px ;width: 420px">
            </a>



        </div>
<!--New student form-->
        <div class="col-sm-6" >
        <h3 class="text-center">Είστε φοιτητής;</h3>
         <a href = "<?= Url::to('new-user-student')?>">
            <img class="center-block" src = "<?= Url::to('@web/images/newuser/student(Pixabay).jpg')?>" alt = "Student" style="height: 313px ;width: 420px" >
        </a>


        </div>




    </div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />