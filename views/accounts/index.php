<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<?php?>

    <div class="row" >

     <h2 class="text-center">Επιλέξτε είδος χρήστη:</h2><br />

        <?php $name=\app\models\Professor::findOne(['userUsername'=>'maragkoudakis'])  ;
        echo $name->userUsername; var_dump($name);?>

<!--New professor form-->
        <div class="col-sm-6" >

        <h3 class="text-center">Hello Professor </h3>
            <a href = "<?= Url::to('new-professor')?>">
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