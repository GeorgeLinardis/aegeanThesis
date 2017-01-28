<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use app\models\References;
use app\models\Thesis;
?>

<?php
$today = date('Y-m-d');
$Total= (Thesis::find()->where(['professorID' => (\app\CustomHelpers\UserHelpers::User()->ID)])->all());
//    ->andWhere(['=', 'datePresented', $today])->all());;
$this->title = 'Στατιστικά στοιχεία';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-statistics">
    <?php if(!isset($message)):?>
    <h1><?= Html::encode($this->title)?></h1><br>



    <div class="row">
        <div class="col-sm-6" style="align-items: center">
            <h4><b>Συνοπτική παρουσίαση <?= date('Y')?></b></h4>
        <ul class="list-group">
            <li class="list-group-item">Διπλωματικές έτοιμες προς Επιτροπή εκ των οποίων για αυτόν τον μήνα<span class="badge"> <?=$TotalThesesPresentedThisMonth?></span></li>
            <li class="list-group-item">Διπλωματικές έτοιμες προς Επιτροπή<span class="badge"> <?=$CommitteeThesesCount?></span></li>
            <li class="list-group-item">Διπλωματικές που έχουν ανατεθεί σε φοιτητή και είναι υπο εξέλιξη<span class="badge"> <?=$AssignedThesesCount?></span></li>
            <li class="list-group-item"><b>Σύνολο διπλωματικών τρέχοντος έτους</b><span class="badge"> <?= $TotalThesesThisYear?></span></li>
            <li class="list-group-item"><b>Σύνολο θεμάτων που έχετε δημιουργήσει σε όλα τα έτη</b><span class="badge"><?=$TotalThesesCount?></span></li>
            <br>
            <li class="list-group-item">Ελεύθερα θέματα διπλωματικών<span class="badge"> <?=$NotAssignedThesesCount?></span></li>
            <br>
            <li class="list-group-item">Σύνολο πηγών αυτόν τον μήνα<span class="badge"><?=$TotalReferencesThisMonth?></span></li>
            <li class="list-group-item">Σύνολο πηγών μέχρι σήμερα<span class="badge"><?=$TotalReferencesCount?></span></li>
        </ul>
        </div>

        <div class="col-sm-6">
            <?php
            echo Highcharts::widget([
                'options' => [
                    'title' => ['text' => 'Πηγές αν περίοδο'],
                    'plotOptions' => [
                        'pie' => [
                            'cursor' => 'pointer',
                        ],
                    ],
                    'series' => [
                        [ // new opening bracket
                            'type' => 'pie',
                            'name' => 'Περίοδος %',
                            'data' => [
                                ['<=1990', $ReferencesBefore90Avg*100],
                                ['(1990-2000]', $ReferencesBefore2000Avg*100],
                                ['(2000-2005]', $ReferencesBefore2005Avg*100],
                                ['(2005-2010]', $ReferencesBefore2010Avg*100],
                                ['(2010-2015]', $ReferencesBefore2015Avg*100],
                                ['(2015-2020]', $ReferencesBefore2020Avg*100],
                            ],
                        ] // new closing bracket
                    ],
                ],
            ]);
            ?>


        </div>

    </div>

        <br>
        <div class="row">
            <div class="col-sm-6">
                <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => ' Πηγές ανα είδος'],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                            ],
                        ],
                        'series' => [
                            [ // new opening bracket
                                'type' => 'pie',
                                'name' => 'Πηγές %',
                                'data' => [
                                    ['Βιβλίο', $BookReferencesAvg*100],
                                    ['Δημοσίευση', $PaperReferencesAvg*100],
                                    ['URL', $URLReferencesAvg*100],
                                    ['Περιοδικό', $MagazineReferencesAvg*100],
                                    ['Άλλο', $OtherReferencesAvg*100],

                                ],
                            ] // new closing bracket
                        ],
                    ],
                ]);
                ?>

            </div>
            <div class="col-sm-6">
                <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'Διπλωματικές ανα κατάσταση'],
                        'plotOptions' => [
                            'pie' => [
                                'cursor' => 'pointer',
                                     ],
                        ],
                        'series' => [
                            [ // new opening bracket
                                'type' => 'pie',
                                'name' => 'Διπλωματικές %',
                                'data' => [
                                    ['Έχει ανατεθεί', $AssignedThesesAvg*100],
                                    ['Δεν έχει ανατεθεί', $UnassignedThesesAvg*100],
                                    ['Υπο έγκριση', $ForApprovalThesesAvg*100],
                                    ['Για Επιτροπή', $CommitteeThesesAvg*100],
                                    ['Ολοκληρωμένες', $CompletedThesesAvg*100]
                                        ],

                                ],
                            ] // new closing bracket
                        ],

                ]);
                ?>

            </div>

        </div>
<?php else: ?>
        <div class="row">
            <div class="col-sm-12">
               <img src="/images/broken-link.png" class="thumbnail" alt="broken link"  style="display: block; margin: 0 auto" id="broken-link-image-statistics-professor">
                <?= "<h2>".$message."</h2>"?>
            </div>

        </div>
<?php endif;?>


</div>
<br><br>


