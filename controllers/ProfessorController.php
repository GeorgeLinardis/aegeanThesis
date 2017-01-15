<?php

namespace app\controllers;

use app\CustomHelpers\CustomHelpers;
use app\models\ProfessorHasMasters;
use app\models\ReferencesSearch;
use app\models\References;
use app\models\User;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Thesis;
use app\models\Professor;
use app\models\ThesisSearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\CustomHelpers\UserHelpers;


class ProfessorController extends Controller
{

    public function actionMain()
    {

        return $this->render('main');

    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all professor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Professor::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single professor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new professor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Professor();

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);

        }
    }
    /**
     * Updates an existing professor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Deletes an existing professor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the professor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return professor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Professor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Render the professor main page
     */
    public function actionThesis()
    {
        return $this->render('thesis');
    }


    /**
     * Renders the professors active thesis page by filtering status attribute from professor table
     * on ['δεν έχει ανατεθεί','έχει ανατεθεί','υπο έγκριση'] values
     */


    public function actionThesisActive()
    {   $professorID = UserHelpers::User()->ID;
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => $professorID])
            ->andFilterWhere(['status' => ['δεν έχει ανατεθεί','έχει ανατεθεί','υπο έγκριση']]);


        return $this->render('thesis-active',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
    }

    public function actionMyReferences()
    {   $message = "Δεν έχει πραγματοποιηθεί κάποια εγγραφή στην βάση δεδομένων των αναφορών ώστε να λειτουργήσει αποτελεσματικά η συγκεκριμένη σελίδα.";
        $professor = UserHelpers::User();
        $ReferencesCheck = References::find()->where(['professorID'=>$professor->ID])->one();
        $searchModel = new ReferencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => $professor->ID]);
        if(isset($ReferencesCheck)){
        return $this->render('my-references',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,

            ]);
        }
        else{
        return $this->render('my-references',
            ['message'=>$message
            ]);
    }
    }

    /**
     * Renders the professors committee thesis page by filtering status attribute from professor table
     * on ['για Επιτροπή'] values. Returns Theses where the professor has to sent to the committee
     * and he is the supervisot
     */

    public function actionThesisCommittee()
    {   $professorID = UserHelpers::User()->ID;
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => $professorID])->andFilterWhere(['status' => 'για Επιτροπή']);


        return $this->render('thesis-committee',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
    }

    /**
     * Professors thesis past page by filtering status attribute from professor table
     * on ['ολοκληρώθηκε'] values.Pages shows theses that have already been completed
     */

    public function actionThesisPast()
    {   $professorID = UserHelpers::User()->ID;
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => $professorID])->andFilterWhere(['status' => 'ολοκληρώθηκε']);


        return $this->render('thesis-past',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
    }


    /**
     * Professors Committee page .Pages shows theses where professor is part of the committee and maybe also the supervisor
     */
    public function actionCommittee()
    {
        $professorID = Professor::find()->where(['userUsername' => (Yii::$app->user->identity->username)])->one();

        $dataProvider = new ActiveDataProvider(
            ['query' => (Thesis::find()->where([
                'or',
                ['committee1' => [$professorID->ID]],
                ['committee2' => [$professorID->ID]],
                ['committee3' => [$professorID->ID]]

            ])),
                'pagination' => ['pageSize' => 10]]
        );

        return $this->render('committee',
            ['dataProvider' => $dataProvider,
                'professorID' => $professorID]);
    }

    /**
     * Professors Statistics .Page shows basic statistic graphs depending on professors courses,theses etc.
     * This action calculates needed data that will be passed to Highcharts widget
     */
    public function actionStatistics()
    {
        $user = UserHelpers::User();
        $today = date('Y-m');
        $TotalReferencesCount = References::find()->where(['professorID' => ($user->ID)])->count();
        if ($TotalReferencesCount != 0) {

            $TotalThesesCount = Thesis::find()->where(['professorID' => ($user->ID)])->count();
            $TotalThesesPresentedThisMonth = count(Thesis::find()->where(['professorID' => ($user->ID)])
                ->andWhere(['=', 'datePresented', $today])->all());;
            $TotalReferencesThisMonth = count(References::find()->where(['>=', 'date_created_by_author', $today])->all());


            //---------- 1st Pie chart ---------------------
            $ReferencesBefore90Count = count(References::find()->where(['professorID' => ($user->ID)])
                ->andwhere(['<=', 'date_created_by_author', '1990'])->all());
            $ReferencesBefore2000Count = count(References::find()->where(['professorID' => ($user->ID)])
                ->andwhere(['>', 'date_created_by_author', '1990'])
                ->andWhere(['<=', 'date_created_by_author', '2000'])->all());
            $ReferencesBefore2005Count = count(References::find()->where(['professorID' => ($user->ID)])
                ->where(['>', 'date_created_by_author', '2000'])
                ->andWhere(['<=', 'date_created_by_author', '2005'])->all());
            $ReferencesBefore2010Count = count(References::find()->where(['professorID' => ($user->ID)])
                ->where(['>', 'date_created_by_author', '2005'])
                ->andWhere(['<=', 'date_created_by_author', '2010'])->all());
            $ReferencesBefore2015Count = count(References::find()->where(['professorID' => ($user->ID)])
                ->where(['>', 'date_created_by_author', '2010'])
                ->andWhere(['<=', 'date_created_by_author', '2015'])->all());
            $ReferencesBefore2020Count = count(References::find()->where(['professorID' => ($user->ID)])
                ->where(['>', 'date_created_by_author', '2015'])
                ->andWhere(['<=', 'date_created_by_author', '2020'])->all());

            $ReferencesBefore90Avg = round(($ReferencesBefore90Count / $TotalReferencesCount), 2);
            $ReferencesBefore2000Avg = round(($ReferencesBefore2000Count / $TotalReferencesCount), 2);
            $ReferencesBefore2005Avg = round(($ReferencesBefore2005Count / $TotalReferencesCount), 2);
            $ReferencesBefore2010Avg = round(($ReferencesBefore2010Count / $TotalReferencesCount), 2);
            $ReferencesBefore2015Avg = round(($ReferencesBefore2015Count / $TotalReferencesCount), 2);
            $ReferencesBefore2020Avg = round(($ReferencesBefore2020Count / $TotalReferencesCount), 2);
            //---------- 2nd Pie chart ---------------------

            $PaperReferencesCount = count(References::find()->where(['professorID' => ($user->ID), 'type' => 'paper'])->all());
            $BookReferencesCount = count(References::find()->where(['professorID' => ($user->ID), 'type' => 'βιβλίο'])->all());
            $URLReferencesCount = count(References::find()->where(['professorID' => ($user->ID), 'type' => 'URL'])->all());
            $MagazineReferencesCount = count(References::find()->where(['professorID' => ($user->ID), 'type' => 'περιοδικό'])->all());
            $OtherReferencesCount = count(References::find()->where(['professorID' => ($user->ID), 'type' => 'άλλο'])->all());


            $PaperReferencesAvg = round(($PaperReferencesCount / $TotalReferencesCount), 2);
            $BookReferencesAvg = round(($BookReferencesCount / $TotalReferencesCount), 2);
            $URLReferencesAvg = round(($URLReferencesCount / $TotalReferencesCount), 2);
            $MagazineReferencesAvg = round(($MagazineReferencesCount / $TotalReferencesCount), 2);
            $OtherReferencesAvg = round(($OtherReferencesCount / $TotalReferencesCount), 2);

            //---------- 3rd Pie chart ---------------------

            $UnassignedThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => 'Δεν έχει ανατεθεί'])->all());
            $ForApprovalThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => 'Υπο έγκριση'])->all());
            $AssignedThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => 'Έχει ανατεθεί'])->all());
            $CommitteeThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => 'Για Επιτροπή'])->all());
            $CompletedThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => 'Ολοκληρωμένες'])->all());


            $UnassignedThesesAvg = round(($UnassignedThesesCount / $TotalThesesCount), 2);
            $ForApprovalThesesAvg = round(($ForApprovalThesesCount / $TotalThesesCount), 2);
            $AssignedThesesAvg = round(($AssignedThesesCount / $TotalThesesCount), 2);
            $CommitteeThesesAvg = round(($CommitteeThesesCount / $TotalThesesCount), 2);
            $CompletedThesesAvg = round(($CompletedThesesCount / $TotalThesesCount), 2);

            return $this->render('statistics', [
                //Synopsis
                'TotalReferencesCount' => $TotalReferencesCount,
                'TotalThesesCount' => $TotalThesesCount,
                'AssignedThesesCount' => $AssignedThesesCount,
                'CommitteeThesesCount' => $CommitteeThesesCount,
                'TotalReferencesThisMonth' => $TotalReferencesThisMonth,
                'TotalThesesPresentedThisMonth' => $TotalThesesPresentedThisMonth,


                // 1st Pie Chart
                'ReferencesBefore90Avg' => $ReferencesBefore90Avg,
                'ReferencesBefore2000Avg' => $ReferencesBefore2000Avg,
                'ReferencesBefore2005Avg' => $ReferencesBefore2005Avg,
                'ReferencesBefore2010Avg' => $ReferencesBefore2010Avg,
                'ReferencesBefore2015Avg' => $ReferencesBefore2015Avg,
                'ReferencesBefore2020Avg' => $ReferencesBefore2020Avg,
                // 2nd Pie Chart
                'PaperReferencesAvg' => $PaperReferencesAvg,
                'BookReferencesAvg' => $BookReferencesAvg,
                'URLReferencesAvg' => $URLReferencesAvg,
                'MagazineReferencesAvg' => $MagazineReferencesAvg,
                'OtherReferencesAvg' => $OtherReferencesAvg,
                // 3rd Pie Chart
                'UnassignedThesesAvg' => $UnassignedThesesAvg,
                'ForApprovalThesesAvg' => $ForApprovalThesesAvg,
                'CommitteeThesesAvg' => $CommitteeThesesAvg,
                'AssignedThesesAvg' => $AssignedThesesAvg,
                'CompletedThesesAvg' => $CompletedThesesAvg,
            ]);
        } else {
            $message = "Δεν έχει πραγματοποιηθεί κάποια εγγραφή στην βάση δεδομένων των αναφορών ώστε να λειτουργήσει αποτελεσματικά η συγκεκριμένη σελίδα.";
            return $this->render('statistics', [
                "message" => $message,
            ]);
        }
    }


}