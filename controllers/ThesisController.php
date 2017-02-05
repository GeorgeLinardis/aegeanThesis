<?php

namespace app\controllers;

use mPDF;
use Yii;
use app\models\Thesis;
use app\models\ThesisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ThesisController implements the CRUD actions for Thesis model.
 */
class ThesisController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all Thesis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Thesis model.
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
     * Creates a new Thesis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Thesis();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
               return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Pdf for current thesis.
     * Pdf is created using mPDF extension implemented and found in vendors folder.
     * $id is integer
     */
    public function actionThesisPdf($id)
    {
        $model =Thesis::find()->where(['ID'=>$id])->one();
        $path = 'Thesis Application ID_'.$model->ID.'.pdf';
        $document = new mPDF();
        $document->WriteHTML($this->renderPartial('thesis-pdf',['model'=>$model]));
        $document->title = "Thesis Application";
        $document->Output(('documents/'.$path),'F');
        $document->Output();
        $model->RequestPDf = $path;
        $model->save();

        exit();
    }


    /**
     * Updates an existing Thesis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

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


            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Thesis model.
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
     * Finds the Thesis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Thesis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Thesis::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
