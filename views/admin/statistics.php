<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
?>
<?php
$this->title = 'Στατιστικά';
$this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-statistics">
    <div class="text-center"><h1><?= Html::encode($this->title) ?> </h1></div><br>

        <div class="row">
            <div class="col-sm-6">
                <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'Sample title - pie chart'],
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
                                    ['Firefox', 45.0],
                                    ['IE', 26.8],
                                    ['Safari', 8.5],
                                    ['Opera', 6.2],
                                    ['Others', 0.7]
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
                        'title' => ['text' => 'Sample title - pie chart'],
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
                                    ['Firefox', 45.0],
                                    ['IE', 26.8],
                                    ['Safari', 8.5],
                                    ['Opera', 6.2],
                                    ['Others', 0.7]
                                ],
                            ] // new closing bracket
                        ],
                    ],
                ]);
                ?>

            </div>

        </div>
        <div class="row">
            <div class="col-sm-6">
                <?php
                echo Highcharts::widget([
                    'options' => [
                        'title' => ['text' => 'Sample title - pie chart'],
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
                                    ['Firefox', 45.0],
                                    ['IE', 26.8],
                                    ['Safari', 8.5],
                                    ['Opera', 6.2],
                                    ['Others', 0.7]
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
                        'title' => ['text' => 'Sample title - pie chart'],
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
                                    ['Firefox', 45.0],
                                    ['IE', 26.8],
                                    ['Safari', 8.5],
                                    ['Opera', 6.2],
                                    ['Others', 0.7]
                                ],
                            ] // new closing bracket
                        ],
                    ],
                ]);
                ?>

            </div>

        </div>



    </div>




