<?php

namespace app\controllers;

use app\models\Master;
use app\models\ThesisHasReferences;
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
        if ($model->load(Yii::$app->request->post()) ){ //&& $model->save()) {
            $photo = UploadedFile::getInstance($model,'photo');
            $model->photo = Yii::$app->user->identity->username.'.'.$photo->extension;
            if ($model->save()) {
                $photo->saveAs('images/userPhotos/' . $model->photo);
                return $this->redirect(['view', 'id' => $model->ID]);
            }
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
        $currentImage = $model->photo;

        if ($model->load(Yii::$app->request->post()) ){//&& $model->save()) {
            if (UploadedFile::getInstance($model,'photo'))
            {
                $photo = UploadedFile::getInstance($model,'photo');
                $model->photo = Yii::$app->user->identity->username.'.'.$photo->extension;
            }

            if ($model->save()) {
                if (!isset($photo)){
                    $model->photo = $currentImage;
                }else {
                    $photo->saveAs('images/userPhotos/' . $model->photo);
                }
                return $this->redirect('/accounts/profile'/*['view', 'id' => $model->ID]*/);
            }
        } {
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

        return $this->render('main');
    }

    public function actionAllTheses()
    {
        $Student = Student::find()->where(['userUsername'=>(Yii::$app->user->identity->username)])->one();
        $Master = Master::find()->where(['ID'=>($Student->masterID)])->one();
        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where(['masterID'=>($Student->masterID) ])),
                'pagination'=>['pageSize'=>10]]
        );

        return $this->render('all-theses',
            ['dataProvider'=>$dataProvider,
            'Student'=>$Student,
            'Master'=>$Master]
        );

    }

    public function actionMyThesis()
    {
        return $this->render('my-thesis');
    }


    public function actionMyReferences()
    {   $searchModel = new ReferencesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('my-references',[
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,

        ]);
    }


}