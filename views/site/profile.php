<?php
use yii\widgets\DetailView ;

?>
<?php
$this->title = 'Προφίλ Χρήστη';
?>

<div class="accounts-profile">
    <div class="row">

        <div class="col-sm-8">
            <h3 class="text-center">Προφίλ Χρήστη</h3>
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
        <div class="col-sm-4 ">

        </div>



    </div>
</div>
