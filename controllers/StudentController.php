<?php

namespace app\controllers;

use app\CustomHelpers\UserHelpers;
use app\models\Master;
use app\models\StudentAppliesForThesis;
use app\models\ThesisHasReferences;
use app\models\ThesisSearch;
use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\Thesis;
use app\models\Student;
use app\models\References;
use app\models\ReferencesSearch;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;



class StudentController extends Controller
{

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

    public function actionIndex()
    {

    $dataProvider = new ActiveDataProvider([
    'query' => Student::find(),
    ]);
        return $this->render('index', [
        'dataProvider' => $dataProvider,
    ]);
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Student model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            if (UploadedFile::getInstance($model,'photo')){
            $image = UploadedFile::getInstance($model,'photo');
            $imageName = 'User_'.$model->userUsername.".".$image->getExtension();
            $image->saveAs('images\userPhotos'."/".$imageName);
            $model->photo=$imageName;}
            $model->save();
            return $this->redirect(['site/profile']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Student model.
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionMain()
    {
        $StudentThesis = Student::find()->where(['userUsername'=>UserHelpers::Username()])->one();
        if (isset($StudentThesis ) && $StudentThesis !=NULL){
            $StudentThesisID= $StudentThesis->thesisID;
        }
        else{
            $StudentThesisID= false;
        }
        return $this->render('main', [
            'StudentThesisID'=> $StudentThesisID,
        ]);
    }

    /**
     * Render the students application form for showing interest in a new thesis
     */
    public function actionThesisApplicationForm($id)
    {
        $Thesis = Thesis::find()->where(['ID' => $id])->one();
        $model = new StudentAppliesForThesis();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'Το αίτημα σας έχει αποσταλλεί');
            return $this->redirect('thesis-application-results');
        }
        else {
            return $this->render('thesis-application-form', [
                'Thesis' => $Thesis,
                'model' => $model
            ]);
        }
    }
    public function actionThesisApplicationResults()
    {

        $dataProvider = new ActiveDataProvider(['query' => StudentAppliesForThesis::find()->where(['studentID'=>UserHelpers::User()->ID])]);
        return $this->render('thesis-application-results',[
                        'dataProvider'=>$dataProvider]);
    }

    public function actionMyThesis()
    {
        $model=Thesis::find()->where(['ID'=>UserHelpers::User()->thesisID])->one();
        $message = "Δεν έχει αναλάβει διπλωματική ακόμα.";
        if (isset($model)&&$model!=null){
        return $this->render('my-thesis',[
                    'model'=>$model]);
        }
        else{
            return $this->render('my-thesis',[
                    'message'=>$message]);
        }
    }


    public function actionMyReferences()
    {
        $message = "Δεν έχει αναλάβει διπλωματική ακόμα οπότε δεν μπορείτε να δημιουργήσετε κάποια αναφορά.";
        $model = Thesis::find()->where(['ID' => UserHelpers::User()->thesisID])->one();
        $Student = UserHelpers::User();
        $searchModel = new ReferencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (isset($model)) {

            return $this->render('my-references', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'Student' => $Student,

            ]);
        } else {
            return $this->render('my-references', [
                'message' => $message,


            ]);
        }
    }
          /**
           * Lists all Thesis models.
           * @return mixed
           */
          public function actionMyMasterTheses()
      {
          $searchModel = new ThesisSearch();
          $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
          $dataProvider->query->andWhere(['masterID' => UserHelpers::User()->masterID]);

          return $this->render('my-master-theses', [
              'searchModel' => $searchModel,
              'dataProvider' => $dataProvider,
          ]);
      }




}