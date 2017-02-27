<?php
use yii\helpers\url;
use yii\helpers\Html;

?>
<?php
$this->title = 'Φοιτητής';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="student-main">
    <div class="row">
    <h1> Αρχική σελίδα <?= rtrim(Html::encode($this->title),"ς") ?></h1><br>
    </div>
    <div class="row">
        <div class="col-sm-2 col-sm-offset-1">
            <a href= "<?= Url::to('@web/student/my-thesis')?>" class="thumbnail">
                <?=Html::img("@web/images/student/student-mythesis(pexels).jpg",['alt'=>"My Thesis","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Η διπλωματική μου</h4>
        </div>

        <div class="col-sm-2">
            <a href="<?= Url::to('@web/student/my-references')?>" class="thumbnail">
                <?=Html::img("@web/images/student/student-myreferences(pexels).jpg",['alt'=>"My References","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Οι πηγές μου</h4>
        </div>
        <div class="col-sm-2">
            <a href= "<?= Url::to('@web/student/my-master-theses')?>" class="thumbnail" >
                <?=Html::img("@web/images/student/student-alltheses(pexels).jpg",['alt'=>"All theses","class"=>"img-responsive center-block"  ])?>

            </a>
            <h4> Λίστα διπλωματικών μου</h4>
        </div>
        <div class="col-sm-2" id="Communication">
                <a href="<?=Url::to(['/chat/chat-room','ThesisID'=>$StudentThesisID])?>" style="<?= ($StudentThesisID==null)? "pointer-events:none":""?>"
                   class="thumbnail">
                    <?=Html::img("@web/images/student/student-chat(pixabay).jpg",['alt'=>"Professor-chat","class"=>"img-responsive center-block"])?>
                </a>
            <h4> Επικοινωνία με επιβλέποντα</h4>
            <?php if ($StudentThesisID==null):?>
            <span id="chatInfo" ><br>Η επιλογή θα ενεργοποιηθεί όταν αναλάβετε διπλωματική</span>
            <?php endif;?>


        </div>
        <div class="col-sm-2">
            <a href="<?= Url::to('@web/student/thesis-application-results')?>" class="thumbnail">
                <?=Html::img("@web/images/student/student-thesis-form(pixabay).jpg",['alt'=>"Thesis-Application-Results","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Αιτήσεις νέας διπλωματικής</h4>
        </div>

    </div>

</div>