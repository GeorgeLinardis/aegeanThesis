<?php
use yii\widgets\DetailView ;

?>
<?php
$this->title = 'Προφίλ Χρήστη';
?>

<div class="accounts-profile">
    <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
            <div class="col-sm-8">
                <h2 >Προφίλ Χρήστη</h2>
            </div>
            <div class="col-sm-4">
                <?php if(isset($model->photo)&& (!empty($model->photo))):?>
                <img class="img-responsive center-block img-rounded" src="<?= '/images/userPhotos/'.$model->photo ?>" alt="<?= '/images/userPhotos/'.$model->photo ?>">
                <?php else:?>
                <img class="img-responsive center-block img-rounded" src="<?= '/images/userPhotos/User_photo_default.png'?>" alt="User_photo">
                <?php endif;?>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-8 col-lg-offset-2">
            <?php if ($role == 'professor'):?>

                <?= $this->render('//professor/view', [
                    'model' => $model,
                ])
                ?>

            <?php elseif ($role == 'student'):?>

                <?= $this->render('//student/view', [
                    'model' => $model,

                ])
                ?>

            <?php endif;?>
        </div>
    </div>

</div>
