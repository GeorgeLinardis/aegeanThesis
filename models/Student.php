<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $ID
 * @property string $userUsername
 * @property string $firstname
 * @property string $lastname
 * @property string $telephone1
 * @property string $telephone2
 * @property string $email
 *
 * @property User $userUsername0
 * @property Thesis[] $theses
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
            [['email'], 'required'],
            [['userUsername', 'firstname', 'lastname'], 'string', 'max' => 50],
            [['telephone1', 'telephone2'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 200],
            [['email'], 'unique'],
            [['userUsername'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userUsername' => 'Username']],
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
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'telephone1' => 'Telephone1',
            'telephone2' => 'Telephone2',
            'email' => 'Email',
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
    public function getTheses()
    {
        return $this->hasMany(Thesis::className(), ['studentID' => 'ID']);
    }
}
