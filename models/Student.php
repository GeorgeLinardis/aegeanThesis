<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;

/**
 * This is the model class for table "student".
 *
 * @property string $masterID
 * @property integer $thesisID
 * @property integer $ID
 * @property string $userUsername
 * @property string $firstname
 * @property string $lastname
 * @property string $telephone1
 * @property string $telephone2
 * @property string $email
 * @property string $skypeUsername
 * @property string $url
 * @property string $comments
 * @property string $photo
 *
 * @property References[] $references
 * @property Master $master
 * @property Thesis $thesis
 * @property User $userUsername0
  */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thesisID'], 'integer'],
            [['masterID','firstname','lastname'], 'required','message'=>(Yii::$app->params['requiredMsg'])],
            [['url', 'comments'], 'string'],
            [['masterID', 'firstname', 'lastname', 'skypeUsername'], 'string', 'max' => 50],
            [['userUsername'], 'string', 'max' => 255],
            [['telephone1', 'telephone2'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 200],
            //[['photo'], 'string', 'max' => 256],
            [['email'], 'unique'],
            [['masterID'], 'exist', 'skipOnError' => true, 'targetClass' => Master::className(), 'targetAttribute' => ['masterID' => 'ID']],
            [['thesisID'], 'exist', 'skipOnError' => true, 'targetClass' => Thesis::className(), 'targetAttribute' => ['thesisID' => 'ID']],
            //[['userUsername'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userUsername' => 'username']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'masterID' => 'Κωδικός Μεταπτυχιακού',
            'thesisID' => 'Κωδικός διπλωματικής',
            'ID' => 'ID',
            'userUsername' => 'Username',
            'firstname' => 'Όνομα',
            'lastname' => 'Επώνυμο',
            'telephone1' => 'Τηλέφωνο 1',
            'telephone2' => 'Τηλέφωνο 2',
            'email' => 'Email',
            'skypeUsername' => 'Skype Username',
            'url' => 'Url',
            'comments' => 'Σχόλια',
            //'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferences()
    {
        return $this->hasMany(References::className(), ['studentID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(Master::className(), ['ID' => 'masterID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesis()
    {
        return $this->hasOne(Thesis::className(), ['ID' => 'thesisID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserUsername0()
    {
        return $this->hasOne(User::className(), ['username' => 'userUsername']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentAppliesForTheses()
    {
        return $this->hasMany(StudentAppliesForThesis::className(), ['studentID' => 'ID']);
    }
}
