<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property integer $ID
 * @property string $userUsername
 * @property string $firstname
 * @property string $lastname
 * @property string $telephone
 * @property string $email
 * @property string $url
 *
 * @property User $userUsername0
 * @property ProfessorHasMasters[] $professorHasMasters
 * @property Thesis[] $theses
 * @property Thesis[] $theses0
 * @property Thesis[] $theses1
 * @property Thesis[] $theses2
 */
class Professor extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */


    public static function tableName()
    {
        return 'professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname','lastname','email'],'required','message'=>(Yii::$app->params['requiredMsg'])],
            [['userUsername', 'firstname', 'lastname'], 'string', 'max' => 50],
            [['email','skypeUsername'],'unique','message'=>(Yii::$app->params['uniqueMsg'])],
            ['email','email'],
            [['email'], 'string', 'max' => 200],
            [['telephone1','telephone2'], 'string', 'max' => 30],
            [['url'],'url'],
            [['url','comments','skypeUsername'],'string','max'=>500],
            [['userUsername'], 'exist', 'skipOnError' => true, 'targetClass' => DbUser::className(), 'targetAttribute' => ['userUsername' => 'Username']],
            [['photo'],'file','extensions'=>'png,jpg,gif','message'=>'Αποδεκτές μορφές φωτογραφίας: .png .jpg .gif']

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'userUsername' => 'User Username',
            'firstname' => 'Όνομα',
            'lastname' => 'Επώνυμο',
            'telephone1' => 'Τηλέφωνο 1',
            'email' => 'Email',
            'url' => 'Διεύθυνση URL',
            'telephone2'=>'Τηλέφωνο 2',
            'skypeUsername'=>'Skype',
            'comments'=>'Σχόλια',
            'photo'=>'Φωτογραφία',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserUsername0()
    {
        return $this->hasOne(User::className(), ['Username' => 'userUsername']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessorHasMasters()
    {
        return $this->hasMany(ProfessorHasMasters::className(), ['professorID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheses()// this is a conjunction table
    {
        return $this->hasMany(Thesis::className(), ['professorID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheses0()
    {
        return $this->hasMany(Thesis::className(), ['committee1' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheses1()
    {
        return $this->hasMany(Thesis::className(), ['committee2' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheses2()
    {
        return $this->hasMany(Thesis::className(), ['committee3' => 'ID']);
    }

    public static function UserFullName(){
        $username = Yii::$app->user->identity->username;
        $User = self::find()->where('UserUsername'==$username)->one();
        return $User->firstname.' '.$User->lastname;

    }

}
