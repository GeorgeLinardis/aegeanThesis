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
            [['url'],'url'],
            [['userUsername', 'firstname', 'lastname'], 'string', 'max' => 50],
            ['email','unique','message'=>(Yii::$app->params['uniqueMsg'])],

            ['email','email'],
            [['telephone'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 200],
            [['userUsername'], 'exist', 'skipOnError' => true, 'targetClass' => DbUser::className(), 'targetAttribute' => ['userUsername' => 'Username']],
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
            'telephone' => 'Τηλέφωνο',
            'email' => 'Email',
            'url' => 'Διεύθυνση URL',
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
    public function getTheses()
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
}