<?php

namespace app\controllers;

use app\CustomHelpers\CustomHelpers;
use app\models\ProfessorHasMasters;
use app\models\ReferencesSearch;
use app\models\References;
use app\models\Student;
use app\models\StudentAppliesForThesis;
use app\models\ThesisHasStudents;
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
use yii\helpers\ArrayHelper;
use app\models\Chat;



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
     * Displays a single professor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $Professor_Masters = ProfessorHasMasters::find()->where(['professorID'=>52])->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'Professor_Masters'=>$Professor_Masters
        ]);
    }

    /**
     * Displays the masters already assigned to a professor.
     */
    public function actionProfessorMasters()
    {
        $dataProvider = new ActiveDataProvider(['query' => ProfessorHasMasters::find()->where(['professorID'=>UserHelpers::User()->ID])]);
        $model = new ProfessorHasMasters;
        $message = "Έχετε ήδη εγγραφεί στο συγκεκριμένο πρόγραμμα";

        if ($model->load(Yii::$app->request->post())) {
            $isSigned = ProfessorHasMasters::find()->where(['professorID'=>(UserHelpers::User()->ID)])->andWhere(['masterID'=>$model->masterID])->all();
            if ($isSigned == null) {
                $model->save();
                \Yii::$app->getSession()->setFlash('success', 'Το πρόγραμμα που ζητήσατε προστέθηκε');
                return $this->render('professor-masters', [
                    'dataProvider' => $dataProvider,
                    'model' => $model,
                  ]);
            } else {

                return $this->render('professor-masters', [
                    'dataProvider' => $dataProvider,
                    'model' => $model,
                    'message'=>$message,

                ]);
            }
        }
        else {
            return $this->render('professor-masters', [
                'model' => $model,
                'dataProvider' => $dataProvider
            ]);
        }

    }

    /**
     * Creates new master entry for a professor.
     */

    public function actionProfessorMastersNew()
    {
        $model = new ProfessorHasMasters;
        $message="Έχετε ήδη εγγραφεί στο συγκεκριμένο πρόγραμμα";
        if ($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->render('professor-masters');
            } else {
            return $this->render('professor-masters-new', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes a master entry.
     */

    public function actionDeleteMaster($id)
    {
         $MasterToDelete=ProfessorHasMasters::find()->where(['ID'=>$id])->one();
         $MasterToDelete->delete();


         \Yii::$app->getSession()->setFlash('danger', 'Το πρόγραμμα που ζητήσατε αφαιρέθηκε');
               return $this->redirect('@web/professor/professor-masters');
    }
    /**
     * Updates an existing Professor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $currentPhoto = $model->photo;
        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            if (UploadedFile::getInstance($model,'photo') && UploadedFile::getInstance($model,'photo')!= null){
            $image = UploadedFile::getInstance($model,'photo');
            $imageName = 'User_'.$model->userUsername.".".$image->getExtension();
            $image->saveAs('images\userPhotos'."/".$imageName);
            $model->photo=$imageName;
            }
        else {
            $model->photo = $currentPhoto;
        }
            $model->save();
            return $this->redirect(['site/profile']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Professor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Professor the loaded model
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
     * Renders the professor main page
     */
    public function actionThesis()
    {
        return $this->render('thesis');
    }


    /**
     * Renders the professor thesis create page
     */
    public function actionThesisCreate()
    {
        $model = new Thesis() ;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $PostData = $_POST;
            $ThesisID = $model->ID;
            $ProfessorID=($_POST['Thesis']['professorID']);
            $Committee1ID=$_POST['Thesis']['committee1'];
            $Committee2ID=$_POST['Thesis']['committee2'];
            $Committee3ID=$_POST['Thesis']['committee3'];


            if (isset($Committee1ID)&&($Committee1ID!=NULL)){EmailController::CreateCommitteeEmail($ProfessorID,$Committee1ID,$PostData,$ThesisID);};
            if (isset($Committee2ID)&&($Committee2ID!=NULL)){EmailController::CreateCommitteeEmail($ProfessorID,$Committee2ID,$PostData,$ThesisID);};
            if (isset($Committee3ID)&&($Committee3ID!=NULL)){EmailController::CreateCommitteeEmail($ProfessorID,$Committee3ID,$PostData,$ThesisID);};
            //$committee2 = $_POST['Thesis']['committee2'];
            //$committee3 = $_POST['Thesis']['committee3'];
            $model->committee1=null;
            $model->committee2=null;
            $model->committee3=null;
            $model->save();
            return $this->redirect(['thesis-active']);
            } else {
                return $this->render('thesis-create', [
                    'model' => $model,

                ]);
            }

    }

    /**
     * Render the professor thesis-approval page based by professorID filtering
     */
    public function actionThesisApplicationApprovals()
    {   $dataProvider = new ActiveDataProvider(['query' => StudentAppliesForThesis::find()->where(['professorID'=>UserHelpers::User()->ID])]);

        return $this->render('thesis-application-approvals',[
            'dataProvider'=>$dataProvider
        ]);
    }

    /**
     * Render the professor thesis-approval page
     * $StudentID,$ThesisID are voth integers
     */
    public function actionThesisApplicationAnswer($StudentID,$ThesisID)
    {
        $Thesis = Thesis::find()->where(['ID'=>$ThesisID])->one();
        $Student = Student::find()->where(['ID'=>$StudentID])->one();
        $Professor = Professor::find()->where(['ID'=>$Thesis->professorID])->one();
        $Thesis_has_students = new ThesisHasStudents();


        if ($Thesis->load(Yii::$app->request->post()) && $Thesis->save()) {
            $Student->thesisID = $Thesis->ID;
            $Thesis_has_students->thesisID=$Thesis->ID;
            $Thesis_has_students->studentID=$Student->ID;
            $Thesis->status="έχει ανατεθεί";
            $Thesis->save();
            $Student->save();
            $Thesis_has_students->save();
            \Yii::$app->getSession()->setFlash('success', 'Η έγκριση της διπλωματικής πραγματοποιήθηκε');
            return $this->render('thesis');
        }
        return $this->render('thesis-application-answer',[
            'Thesis'=>$Thesis,
            'Student'=>$Student,
            'Professor'=>$Professor
            ]
        );
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

    /**
     * Renders the professors references created by his students - return message if no entry has been made
     */
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

        if ($TotalReferencesCount != 0 ) {

            $TotalThesesCount = Thesis::find()->where(['professorID' => ($user->ID)])->count();
            $TotalThesesPresentedThisMonth = count(Thesis::find()->where(['professorID' => ($user->ID),'status'=>['για Επιτροπή']])
                ->andWhere(['between', 'datePresented', (date('Y-m').'-01'),(date('Y-m').'-31')])->all());;
            $TotalThesesThisYear = count(Thesis::find()->where(['professorID' => ($user->ID),'status'=>['ολοκληρώθηκε','εχει ανατεθεί','για Επιτροπή']])
                ->andWhere(['between', 'datePresented', (date('Y').'-01-01'),(date('Y').'-12-31')])->all());
            $TotalReferencesThisMonth = count(References::find()->where(['>=', 'date_created_by_student', $today])->all());


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
            $NotAssignedThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => ['δεν έχει ανατεθεί','υπο έγκριση']])->all());
            $CommitteeThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => 'Για Επιτροπή'])->all());
            $CompletedThesesCount = count(Thesis::find()->where(['professorID' => ($user->ID), 'status' => 'Ολοκληρώθηκε'])->all());


            $UnassignedThesesAvg = round(($UnassignedThesesCount / $TotalThesesCount), 2);
            $ForApprovalThesesAvg = round(($ForApprovalThesesCount / $TotalThesesCount), 2);
            $AssignedThesesAvg = round(($AssignedThesesCount / $TotalThesesCount), 2);
            $CommitteeThesesAvg = round(($CommitteeThesesCount / $TotalThesesCount), 2);
            $CompletedThesesAvg = round(($CompletedThesesCount / $TotalThesesCount), 2);

            return $this->render('statistics', [
                //Synopsis
                'TotalReferencesCount' => $TotalReferencesCount,
                'TotalThesesCount' => $TotalThesesCount,
                'NotAssignedThesesCount'=> $NotAssignedThesesCount,
                'AssignedThesesCount' => $AssignedThesesCount,
                'CommitteeThesesCount' => $CommitteeThesesCount,
                'TotalReferencesThisMonth' => $TotalReferencesThisMonth,
                'TotalThesesPresentedThisMonth' => $TotalThesesPresentedThisMonth,
                'CompletedThesesCount'=>$CompletedThesesCount,
                'TotalThesesThisYear' =>$TotalThesesThisYear,


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

    /**
     * Renders the chat-main view where professor chooses in which thesis to enter for chatting with students
     */
    public function actionChatMain(){
        $professorID = UserHelpers::User()->ID;
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => $professorID]); //->andFilterWhere(['status' => 'για Επιτροπή']);


        return $this->render('chat-main',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);

    }






}