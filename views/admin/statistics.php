<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use app\models\References;
?>
<?php
$this->title = 'Στατιστικά';
$this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-statistics">
    <div class="text-center"><h1><?= Html::encode($this->title) ?> </h1></div><br>

    <div class="row">
        <div class="col-sm-6" style="align-items: center">
            <h3>Συνοπτική παρουσίαση</h3><br>

        <ul class="list-group">
            <li class="list-group-item">Διπλωματικές έτοιμες προς Επιτροπή εκ των οποίων για αυτόν τον μήνα<span class="badge"> <?=$TotalThesesPresentedThisMonth?></span></li>
            <li class="list-group-item">Διπλωματικές έτοιμες προς Επιτροπή<span class="badge"> <?=$CommitteeThesesCount?></span></li>
            <li class="list-group-item">Διπλωματικές που έχουν ανατεθεί σε φοιτητές και είναι υπο εξέλιξη<span class="badge"> <?=$AssignedThesesCount?></span></li>
            <li class="list-group-item"><b>Σύνολο θεμάτων που έχουν δημιουργηθεί σε όλα τα έτη</b><span class="badge"><?=$TotalThesesCount?></span></li>
            <li class="list-group-item">Ελεύθερα θέματα διπλωματικών<span class="badge"> <?=$NotAssignedThesesCount?></span></li>
            <li class="list-group-item">Σύνολο πηγών αυτον τον μήνα<span class="badge"><?=$TotalReferencesThisMonth?></span></li>
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
                    'title' => ['text' => 'Διπλωματικές ανα Έτος'],
                    'plotOptions' => [
                        'pie' => [
                            'cursor' => 'pointer',
                        ],
                    ],
                    'series' => [
                        [ // new opening bracket
                            'type' => 'pie',
                            'name' => 'Elements',
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




</div>