<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
    <div class="row" >

<!--New professor form-->
        <div class="col-sm-6" >

        <h3 class="text-center">Hello Professor </h3>
            <a href = "<?= Url::to('new-professor')?>">
                <img class="center-block" src = "<?= Url::to('@web/images/professor.jpg')?>" alt = "Professor" style="height: 333px ;width: 400px">
            </a>



        </div>
<!--New student form-->
        <div class="col-sm-6" >
        <h3 class="text-center">Hello student</h3>
         <a href = "<?= Url::to('new-student')?>">
            <img class="center-block" src = "<?= Url::to('@web/images/student.jpg')?>" alt = "Student" style="height: 333px ;width: 400px" >
        </a>


        </div>




    </div>


<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />