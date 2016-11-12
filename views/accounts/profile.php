<div class="container">
    <div class="row" >

        <div class="col-sm-offset-4 col-sm-6">
            <div class="text-center"><h3>Προφίλ Χρήστη</h3></div><br />
            <?php $this->widget('zii.widgets.CDetailView',array(
                'data'=>$model,
                'htmlOptions'=>array('class'=>'table table-striped'),
                'attributes'=>array(
                    "userUsername",
                    'firstname',
                    "lastname",
                    array('label'=>"Email",
                          'value'=>CHtml::encode($model->email),
                          'type'=>'email'),
                    "telephone",
                    array('label'=>'URL',
                          'value'=> CHtml::encode($model->url),
                          'type'=> "url",
                         ),

            )));?>
        </div>
    </div>





    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

</div>
