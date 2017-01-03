<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
?>

<?php
$this->title = 'Στατιστικά στοιχεία';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-statistics">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="row">
    <div class="col-sm-6">
        <?php
        echo Highcharts::widget([
            'options' => [
                'title' => ['text' => 'Πηγές αν έτος'],
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
                            ['2016', 45.0],
                            ['2015', 26.8],
                            ['2014', 8.5],
                            ['2013', 6.2],
                            ['2012', 0.7]
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
                'title' => ['text' => 'Πηγές ανα είδος'],
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
                            ['Βιβλία', 50.0],
                            ['Δημοσιεύσεις', 25],
                            ['Url', 11],
                            ['Περιοδικά', 7],
                            ['Άλλο', 7]
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
                    'title' => ['text' => 'Διπλωματικές ανα Μεταπτυχιακό'],
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
                                ['ΠΜΣ1', 25.0],
                                ['ΠΜΣ2', 25],
                                ['ΠΜΣ3', 25],
                                ['ΠΜΣ4', 25],

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
                            'name' => 'Elements',
                            'data' => [
                                ['Έχει ανατεθεί', 45],
                                ['Δεν έχει ανατεθεί', 10],
                                ['Υπο έγκριση', 20],
                                ['Για Επιτροπή', 23],
                                ['Ολοκληρωμένες', 12]
                            ],
                        ] // new closing bracket
                    ],
                ],
            ]);
            ?>

        </div>

    </div>



</div>



