<?php
use yii\widgets\DetailView ;
use yii\helpers\url;
?>
<?php
$this->title = 'Προφίλ Χρήστη';
?>

<div class="accounts-profile">
<div class="row">

    <div class="col-sm-8">
        <h3 class="text-center">Προφίλ Χρήστη</h3>
            <?php if ($Role == 'professor'):?>

                    <?= $this->render('//professor/view', [
                        'model' => $model,
                            ])
                    ?>

        <?php elseif ($Role == 'student'):?>

                <?= $this->render('//student/view', [
                'model' => $model,

                ])
                ?>

            <?php endif;?>
    </div>
    <div class="col-sm-4 ">
        <?php if ($Role == 'professor'):{?>
            <?php if ($model->photo):?>
                <img src = "<?=Url::to('@web/images/UserPhotos/'.$model->photo)?>" alt = "User photo" style="height: 106px ;width: 110px">
            <?php else:?>
                <img src = "<?=Url::to('@web/images/professor/Professors-default-user-icon(Icon-Archive)')?>" alt = "Professor" style="height: 86px ;width: 90px">

            <?php endif;?>

        <?php } elseif ($Role == 'student'):{?>
            <?php if ($model->photo):?>
                <img src = "<?=Url::to('@web/images/UserPhotos/'.$model->photo)?>" alt = "User photo" style="height: 86px ;width: 90px">
            <?php else:?>
                <img src = "<?=Url::to('@web/images/student/Students-default-user-icon(Icon-Archive)')?>" alt = "Student" style="height: 76px ;width: 90px">
            <?php endif ;?>


        <?php }endif;?></div>



</div>
</div>
