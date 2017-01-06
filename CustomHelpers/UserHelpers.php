<?php

namespace app\CustomHelpers;

?>

<?php
use app\models\DbUser;
use app\models\Professor;
use app\models\Student;
use Yii;


class UserHelpers{

    public static function UserFullName()
    {
       return self::User()->firstname . ' ' . self::User()->lastname;

    }

    public static function UserRole(){
        $user = DbUser::find()->where(['username'=>self::Username()])->one();
        return $user->Role;
    }

    public static function Username(){
            $username = Yii::$app->user->identity->username;
        return $username;
        }

    public static function User(){
        if (Professor::find()->where(['userUsername' => (self::Username())])->exists()) {
            $User = Professor::find()->where(['userUsername' => self::Username()])->one();
            return $User;
        } else {
            $User = Student::find()->where(['userUsername' => self::Username()])->one();
            return $User;
        }
    }






}


?>
