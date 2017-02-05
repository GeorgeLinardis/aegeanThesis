<?php

namespace app\controllers;


use yii\web\Controller;
use yii;
use app\models\ThesisSearch;
use app\models\Thesis;
use app\models\References;
use app\models\Student;
use app\models\Professor;
use app\CustomHelpers\UserHelpers;
use yii\data\ActiveDataProvider;


class AdminController extends Controller
{

    /* This function renders the index view for the administrator
    */

    public function actionIndex()
    {
        return $this->render('index');
    }


    /* This function renders the view which shows all the University theses.
    */

    public function actionThesesMain()
    {
        return $this->render('theses-main');
    }

    /* This function renders all the University active theses based by the dataProvider filtering
   */

    public function actionAllThesesActive()
    {
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['status' => ['δεν έχει ανατεθεί','έχει ανατεθεί','υπο έγκριση']]);


        return $this->render('all-theses-active',
            ['dataProvider'=>$dataProvider,
                'searchModel'=>$searchModel,
            ]);
    }

    /* This function renders all the University theses that are ready to be presented to a committee.
    */

    public function actionAllThesesCommittee()
    {
    $searchModel = new ThesisSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->query->andFilterWhere(['status' => ['για Επιτροπή']]);


    return $this->render('all-theses-committee',
        ['dataProvider'=>$dataProvider,
            'searchModel'=>$searchModel,
        ]);
    }

    /* This function renders all the University theses that belong to the past because they have already been presented
    * to a committee.
    */

    public function actionAllThesesPast()
    {
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andFilterWhere(['status' => ['ολοκληρώθηκε']]);


        return $this->render('all-theses-past',
            ['dataProvider'=>$dataProvider,
                'searchModel'=>$searchModel,
            ]);
    }

    /* This function renders all the University students.
    */

    public function actionAllStudents()
    {       $dataProvider = new ActiveDataProvider([
            'query' => Student::find(),
        ]);
        return $this->render('all-students',
            ['dataProvider' => $dataProvider]);
    }

    /* This function renders all the University professors.
   */

    public function actionAllProfessors()
    {
        $query = Professor::find();
        $dataProvider = new ActiveDataProvider(
            ['query'=>$query,
            ]);

        return $this->render('all-professors',
            ['dataProvider'=>$dataProvider]
        );
    }

    /* This function use database data to create basic statistics for the administrator.
   */
    public function actionStatistics()
    {
        
         $user = UserHelpers::User();
         $today = date('Y-m');
         $TotalReferencesCount = References::find()->count() ;
         $TotalThesesCount = Thesis::find()->count() ;
         $TotalThesesPresentedThisMonth = count(Thesis::find()->where(['=','datePresented',$today])->all()); ;
         $TotalReferencesThisMonth = count(References::find()->where(['>=','date_created_by_author',$today])->all() ) ;

        
         //---------- 1st Pie chart ---------------------
         $ReferencesBefore90Count = count(References::find()->where(['<=','date_created_by_author','1990'])->all() ) ;
         $ReferencesBefore2000Count = count(References::find()->where(['>','date_created_by_author','1990'])
                                                              ->andWhere(['<=','date_created_by_author','2000'])->all() ) ;
         $ReferencesBefore2005Count = count(References::find()->where(['>','date_created_by_author','2000'])
                                                              ->andWhere(['<=','date_created_by_author','2005'])->all() ) ;
         $ReferencesBefore2010Count = count(References::find()->where(['>','date_created_by_author','2005'])
                                                            ->andWhere(['<=','date_created_by_author','2010'])->all() ) ;
         $ReferencesBefore2015Count = count(References::find()->where(['>','date_created_by_author','2010'])
                                                             ->andWhere(['<=','date_created_by_author','2015'])->all() ) ;
         $ReferencesBefore2020Count = count(References::find()->where(['>','date_created_by_author','2015'])
                                                              ->andWhere(['<=','date_created_by_author','2020'])->all() ) ;

        $ReferencesBefore90Avg = round(($ReferencesBefore90Count/ $TotalReferencesCount),2);
        $ReferencesBefore2000Avg = round(( $ReferencesBefore2000Count/ $TotalReferencesCount),2);
        $ReferencesBefore2005Avg = round(( $ReferencesBefore2005Count/ $TotalReferencesCount),2);
        $ReferencesBefore2010Avg = round(( $ReferencesBefore2010Count/ $TotalReferencesCount),2);
        $ReferencesBefore2015Avg = round(( $ReferencesBefore2015Count/ $TotalReferencesCount),2);
        $ReferencesBefore2020Avg = round(( $ReferencesBefore2020Count/ $TotalReferencesCount),2);
        //---------- 2nd Pie chart ---------------------

        $PaperReferencesCount = count(References::find()->where(['type'=>'paper'])->all() ) ;
        $BookReferencesCount = count(References::find()->where(['type'=>'βιβλίο'])->all() ) ;
        $URLReferencesCount = count(References::find()->where(['type'=>'URL'])->all() ) ;
        $MagazineReferencesCount = count(References::find()->where(['type'=>'περιοδικό'])->all() ) ;
        $OtherReferencesCount = count(References::find()->where(['type'=>'άλλο'])->all() ) ;


        $PaperReferencesAvg = round(($PaperReferencesCount/ $TotalReferencesCount),2);
        $BookReferencesAvg = round(($BookReferencesCount/ $TotalReferencesCount),2);
        $URLReferencesAvg = round(($URLReferencesCount/ $TotalReferencesCount),2);
        $MagazineReferencesAvg = round(($MagazineReferencesCount/ $TotalReferencesCount),2);
        $OtherReferencesAvg = round(($OtherReferencesCount/ $TotalReferencesCount),2);

         //---------- 3rd Pie chart ---------------------

         $UnassignedThesesCount = count(Thesis::find()->where(['status'=>'Δεν έχει ανατεθεί'])->all() ) ;
         $ForApprovalThesesCount = count(Thesis::find()->where(['status'=>'Υπο έγκριση'])->all() ) ;
         $AssignedThesesCount = count(Thesis::find()->where(['status'=>'Έχει ανατεθεί'])->all() ) ;
         $CommitteeThesesCount = count(Thesis::find()->where(['status'=>'Για Επιτροπή'])->all() ) ;
         $CompletedThesesCount = count(Thesis::find()->where(['status'=>'Ολοκληρωμένες'])->all() ) ;


        $UnassignedThesesAvg = round(($UnassignedThesesCount/$TotalThesesCount),2);
        $ForApprovalThesesAvg = round(($ForApprovalThesesCount/$TotalThesesCount),2);
        $AssignedThesesAvg = round(($AssignedThesesCount/$TotalThesesCount),2);
        $CommitteeThesesAvg = round(($CommitteeThesesCount/$TotalThesesCount),2);
        $CompletedThesesAvg = round(($CompletedThesesCount/$TotalThesesCount),2);

        $NotAssignedThesesCount = count(Thesis::find()->where(['status' => ['δεν έχει ανατεθεί','υπο έγκριση']])->all());
        return $this->render('statistics',[
            //Synopsis
            'TotalReferencesCount'=>$TotalReferencesCount,
            'TotalThesesCount'=>$TotalThesesCount,
            'AssignedThesesCount'=>$AssignedThesesCount,
            'CommitteeThesesCount'=>$CommitteeThesesCount,
            'TotalReferencesThisMonth'=>$TotalReferencesThisMonth,
            'TotalThesesPresentedThisMonth'=>$TotalThesesPresentedThisMonth,
            'NotAssignedThesesCount'=>$NotAssignedThesesCount,


          //----------- 1st Pie Chart
        'ReferencesBefore90Avg'=>$ReferencesBefore90Avg,
        'ReferencesBefore2000Avg'=> $ReferencesBefore2000Avg,
        'ReferencesBefore2005Avg'=> $ReferencesBefore2005Avg,
        'ReferencesBefore2010Avg'=> $ReferencesBefore2010Avg,
        'ReferencesBefore2015Avg'=> $ReferencesBefore2015Avg,
        'ReferencesBefore2020Avg'=> $ReferencesBefore2020Avg,
        //     // 2nd Pie Chart
        'PaperReferencesAvg'=>$PaperReferencesAvg,
        'BookReferencesAvg'=>$BookReferencesAvg,
        'URLReferencesAvg'=>$URLReferencesAvg,
        'MagazineReferencesAvg'=>$MagazineReferencesAvg,
        'OtherReferencesAvg'=>$OtherReferencesAvg,
        //          // 3rd Pie Chart
        'UnassignedThesesAvg'=>$UnassignedThesesAvg,
        'ForApprovalThesesAvg'=>$ForApprovalThesesAvg,
        'CommitteeThesesAvg'=>$CommitteeThesesAvg,
        'AssignedThesesAvg'=>$AssignedThesesAvg,
        'CompletedThesesAvg'=>$CompletedThesesAvg,
        ]);
    
    }
}