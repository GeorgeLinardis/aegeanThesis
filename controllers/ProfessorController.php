<?php

namespace app\controllers;


use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Thesis;
use app\models\Professor;
use app\models\ThesisSearch;
use yii;


class ProfessorController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionThesis()
    {
        return $this->render('thesis');
    }



    public function actionThesisActive()
        {   $searchModel = new ThesisSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere(['professorID'=>3]);



            return $this->render('thesis-active',
                ['dataProvider'=>$dataProvider,
                 'searchModel'=>$searchModel,
                ]);
        }


    public function actionThesisCommittee()
    {   $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID'=>3])->andFilterWhere(['status'=>'για Επιτροπή']);



        return $this->render('thesis-committee',
            ['dataProvider'=>$dataProvider,
                'searchModel'=>$searchModel,
            ]);
    }


    public function actionThesisPast()
    {   $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID'=>3])->andFilterWhere(['status'=>'ολοκληρώθηκε']);



        return $this->render('thesis-past',
            ['dataProvider'=>$dataProvider,
                'searchModel'=>$searchModel,
            ]);
    }

    public function actionThesisCreateNew()
    {   $model = new Thesis();


        return $this->render('thesis-create-new',
            ['model'=>$model,

            ]);
    }


    public function actionCommittee()
    {   $professorID = Professor::find()->where(['userUsername'=>(Yii::$app->user->identity->username)])->one();

        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where([
                                'or',
                                ['committee1'=>[$professorID->ID]],
                                ['committee2'=>[$professorID->ID]],
                                ['committee3'=>[$professorID->ID]]

            ])),
                'pagination'=>['pageSize'=>10]]
        );

        return $this->render('committee',
            ['dataProvider'=>$dataProvider,
             'professorID'=>$professorID ]);
    }

    public function actionStatistics()
    {
        return $this->render('statistics');
    }


}