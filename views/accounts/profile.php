<?php use yii\widgets\DetailView ;
?>

<div class="row">

    <div class="col-sm-8">
        <h3 class="text-center">Προφίλ Χρήστη</h3><br />
        <?php
            echo DetailView::widget([
            'model' => $model,
            'attributes'=>[
                ['label'=>'Όνομα Χρήστη',
                 'value'=>$model->userUsername,
                ],
                'firstname',
                'lastname',
                'telephone',
                'email',
                'url'
                ],

             'options'=>['class'=>'table table-striped'],

            ]);

    ?>
    </div>
</div>
