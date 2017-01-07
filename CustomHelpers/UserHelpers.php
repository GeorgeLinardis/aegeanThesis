<?php

namespace app\CustomHelpers;

?>

<?php
use dektrium\user\models\User;
use app\models\Professor;
use app\models\Student;
use Yii;


class UserHelpers{

    public static function UserFullName()
    {
       return self::User()->firstname . ' ' . self::User()->lastname;

    }

    public static function UserRole(){
        $user = User::find()->where(['username'=>self::Username()])->one();
        return $user->role;
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
