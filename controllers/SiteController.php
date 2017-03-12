<?php

namespace app\controllers;


use app\CustomHelpers\UserHelpers;
use app\models\DatabaseUsers;
use app\models\Ldap;
use app\models\Professor;
use app\models\Student;
use app\models\User;
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

    public function actionOpen(){

        return $this->render('open')  ;
    }

    /**
     * Creates Ldap Connection and gets user data.
     * @return string
     */
    public function Ldap($username,$password)
    {
    $ldapServer = "ldap.aegean.gr";
    $ldapDn = "dc=aegean,dc=gr"; // dn for your organization
    $ldap_domain = "aegean";
    $ldapUsername = $username;
    $ldapPassword = $password;
    $user_to_get = $username;
    $dn="uid=".$ldapUsername.",ou=people,".$ldapDn;

    $ldapConn = ldap_connect($ldapServer) or die("Could not connect to LDAP server.");
    ldap_set_option($ldapConn, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldapConn, LDAP_OPT_REFERRALS, 0);
    if ($ldapConn) {
        @ldap_bind($ldapConn) ;
    }

    // binding to ldap server using user's given credentials
    $ldapBind = @ldap_bind($ldapConn, $dn, $ldapPassword);
        if ($ldapBind) {
            $filter = "(uid=$user_to_get)"; // this command requires some filter
            $sr = ldap_search($ldapConn, $ldapDn, $filter); // for all attributes
            $entry = ldap_get_entries($ldapConn, $sr);
    }
        else {
            $entry = false;
        }
        return $entry;
    }


    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {   if (!Yii::$app->user->isGuest) {
                    return $this->goHome();
         }
       $model = new LoginForm();
       $model_Professor = new Professor();
       $model_Student = new Student();
        if ($model->load(Yii::$app->request->post()) ) {
        $entry = $this->Ldap($model->username,$model->password);
        $FindUsername = DatabaseUsers::find()->where(['username'=>$model->username])->one();
            if ($FindUsername == null ) {
                    if($entry){
                    $User = new DatabaseUsers();
                    $User->username = $model->username;
                    $User->password_hash = password_hash($model->password,PASSWORD_DEFAULT);
                    $User->email = $entry['mail'][0];
                    $User->created_at = strtotime('now');
                    $User->updated_at = strtotime('now');
                    $User->confirmed_at = strtotime('now');
                    $User->auth_key = Yii::$app->security->generateRandomString();
                    $User->flags = 0;
                        if (isset($entry[0]["description"][0])) {
                            switch ($entry[0]["description"][0]) {
                                case "Student":
                                    $User->role = "student";
                                    break;
                                case "undergraduate":
                                    $User->role = "student";
                                    break;
                                case "doctoral":
                                    $User->role = "student";
                                    break;
                                case "postgraduate":
                                    $User->role = "student";
                                    break;
                                case preg_match('/ICSD.*/', $entry[0]["description"][0]) ? true : false:
                                    $User->role = "professor";
                                    break;
                                default :
                                    $User->role = "other";
                            }
                        }
                    if($User->role == "other"){
                        $message = "Στο σύστημα δεν έχει δηλωθεί η ιδιότητα σας ως φοιτητή/καθηγητή.Παρακαλώ επικοινωνήστε με τον διαχειριστή";
                        return $this->render('login', [
                            'model' => $model,
                            'message'=>$message,
                        ]);
                    }
                        $User->save();
                   if ($User->role == 'professor') {
                        $model_Professor->userUsername = $model->username;
                        $model_Professor->firstname    = (isset($entry[0]["aegeangivenname-el"][0]) && $entry != null) ? ($entry[0]["aegeangivenname-el"][0]):"Δεν έχει τεθεί όνομα";
                        $model_Professor->lastname     =  (isset($entry[0]["aegeansn-el"][0]) && $entry != null) ? ($entry[0]["aegeansn-el"][0]):"Δεν έχει τεθεί όνομα";
                        $model_Professor->email        = (isset($entry[0]["mail"][0]) && $entry != null) ? ($entry[0]["mail"][0]): "Δεν έχει τεθεί email";
                        $model_Professor->save();

                    } elseif ($User->role == 'student') {
                        $model_Student->userUsername = $model->username;
                        $model_Student->firstname    = (isset($entry[0]["aegeangivenname-el"][0]) && $entry != null) ? ($entry[0]["aegeangivenname-el"][0]):"Δεν έχει τεθεί όνομα";
                        $model_Student->masterID     = "ΠΜΣ4";
                        $model_Student->lastname     =  (isset($entry[0]["aegeansn-el"][0]) && $entry != null) ? ($entry[0]["aegeansn-el"][0]):"Δεν έχει τεθεί όνομα";
                        $model_Student->email        = (isset($entry[0]["mail"][0]) && $entry != null) ? ($entry[0]["mail"][0]): "Δεν έχει τεθεί email";
                        $model_Student->save();

                    }
                    return $this->actionLogin();
                    }
                    else{
                        $message = "Τα στοιχεία που εισάγετε δεν είναι σωστά";
                        return $this->render('login', [
                            'model' => $model,
                            'message'=>$message,
                        ]);
                    }
                  }

             elseif($model->login()){

                 return $this->goBack();
             }
        }

         return $this->render('login', [
                   'model' => $model,
                ]);

    }


    /**
     * Displays tutorials page.
     *
     * @return string
     */
    public function actionTutorials()
    {
        return $this->render('tutorials');
    }






    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('questionnaire');
        //return $this->goHome();
    }

    public function actionQuestionnaire()
    {

        return $this->render('questionnaire');

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
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionNewUser()
    {
        return $this->render('new-user');
    }

    /**
     * Displays profile page which shows current users analytical data (doesn't work for administrator).
     */
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
