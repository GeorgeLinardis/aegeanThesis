<?php

namespace app\controllers;


use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Thesis;
use app\models\Professor;
use app\models\ThesisSearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


class ProfessorController extends Controller
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

        if ($model->load(Yii::$app->request->post()) ){//&& $model->save()) {
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
     * Updates an existing professor model.
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

    public function actionMain()
    {
        return $this->render('main');
    }


    public function actionThesis()
    {
        return $this->render('thesis');
    }


    public function actionThesisActive()
    {
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => 3]);


        return $this->render('thesis-active',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
    }


    public function actionThesisCommittee()
    {
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => 3])->andFilterWhere(['status' => 'για Επιτροπή']);


        return $this->render('thesis-committee',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
    }


    public function actionThesisPast()
    {
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['professorID' => 3])->andFilterWhere(['status' => 'ολοκληρώθηκε']);


        return $this->render('thesis-past',
            ['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
            ]);
    }

    public function actionThesisCreateNew()
    {
        $model = new Thesis();


        return $this->render('thesis-create-new',
            ['model' => $model,

            ]);
    }


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

    public function actionStatistics()
    {
        return $this->render('statistics');
    }
}