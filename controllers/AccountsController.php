<?php

namespace app\controllers;

use Yii;
use app\models\DbUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccountsController implements the CRUD actions for DbUser model.
 */
class AccountsController extends Controller
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
     * Updates an existing DbUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DbUser model.
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
     * Finds the DbUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DbUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DbUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * User chooses his profile
     */
    public function actionNewUser()
    {
        return $this->render('new-user');
    }


    /**
     * Creates a new DbUser model based on the role chosen.
     * If creation is successful, the browser will be redirected to the 'profile' page with username already in place.
     * @return mixed
     */
    public function actionNewUserAccount($role){

            $model = new DbUser();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['//site/login']);
            } else {
                return $this->render('new-user-account', [
                    'model' => $model,
                    'role'=>$role
                ]);
            }

        }

    public function actionProfile()
    {   $Role = DbUser::find()->where(['username'=>(Yii::$app->user->identity->username)])->one();

        if ($Role->Role == 'professor') {
            $model = Professor::findOne(['userUsername' => Yii::$app->user->identity->username]);
        }
        elseif ($Role->Role == 'student') {
            $model = Student::findOne(['userUsername' => Yii::$app->user->identity->username]);
        }
        return $this->render('profile', [
                'model' => $model,
                'Role'=>$Role->Role,
            ]
        );



    }

}
