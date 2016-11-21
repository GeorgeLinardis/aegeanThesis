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

        <h3 class="text-center">Hello Professor </h3>
            <a href = "<?= Url::to('newuser')?>">
                <img class="center-block" src = "<?= Url::to('@web/images/newuser/professor.jpg')?>" alt = "Professor" style="height: 333px ;width: 400px">
            </a>



        </div>
<!--New student form-->
        <div class="col-sm-6" >
        <h3 class="text-center">Hello student</h3>
         <a href = "<?= Url::to('new-student')?>">
            <img class="center-block" src = "<?= Url::to('@web/images/newuser/student.jpg')?>" alt = "Student" style="height: 333px ;width: 400px" >
        </a>


        </div>




    </div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />