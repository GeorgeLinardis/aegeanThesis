<?php

namespace app\controllers;


use app\CustomHelpers\UserHelpers;
use app\models\Professor;
use app\models\Student;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;


class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        return $this->render('login');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact(){
        $query = Professor::find();
        $dataProvider = new ActiveDataProvider(
            ['query'=>$query,
        ]);

        return $this->render('contact',
            ['dataProvider'=>$dataProvider]
        );
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionNewUser()
    {
        return $this->render('new-user');
    }

    public function actionProfile()
    {
        $role = UserHelpers::UserRole();
        if (UserHelpers::UserRole() == 'professor') {
            $model = Professor::findOne(['userUsername' => \Yii::$app->user->identity->username]);
        }
        elseif (UserHelpers::UserRole()== 'student') {
            $model = Student::findOne(['userUsername' => \Yii::$app->user->identity->username]);
        }
        return $this->render('profile', [
                'model' => $model,
                'role'=>$role,
            ]
        );



    }
}
