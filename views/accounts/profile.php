<?php
use yii\widgets\DetailView ;
use yii\helpers\url;
?>

<div class="row">

    <div class="col-sm-8">
        <div class="col-sm-6"><h3 class="text-center">Προφίλ Χρήστη</h3></div>
        <div class="col-sm-6">
        <?php if ($Role == 'professor'):?>
            <img src = "<?=Url::to('@web/images/professor/Professore-default-user-icon(Icon-Archive)')?>" alt = "Professor" style="height: 86px ;width: 90px">
            <?php elseif ($Role == 'student'):?>
            <img src = "<?=Url::to('@web/images/student/Students-default-user-icon(Icon-Archive)')?>" alt = "Student" style="height: 76px ;width: 90px">
            <?php endif ;?>
        </div>

        <?php
            echo DetailView::widget([
            'model' => $model,
            'attributes'=>[
                ['label'=>'Όνομα Χρήστη',
                 'value'=>$model->userUsername,
                ],
                'firstname',
                'lastname',
                'telephone1',
                'telephone2',
                'email:email',
                'skypeUsername',
                'url:url',
                'comments',
                'photo',
                ],

             'options'=>['class'=>'table table-striped text-left'],

            ]);

    ?>
    </div>

</div>


