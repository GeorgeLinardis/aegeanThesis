<?php

namespace app\models;

use Yii;
use dektrium\user\models\User;

/**
 * This is the model class for table "professor".
 *
 * @property integer $ID
 * @property string $userUsername
 * @property string $firstname
 * @property string $lastname
 * @property string $telephone1
 * @property string $telephone2
 * @property string $email
 * @property string $skypeUsername
 * @property string $comments
 * @property string $url
 * @property string $photo
 *
 * @property ProfessorHasMasters[] $professorHasMasters
 * @property References[] $references
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
            [['comments', 'url'], 'string'],
            [['userUsername'], 'string', 'max' => 255],
            [['firstname', 'lastname', 'skypeUsername'], 'string', 'max' => 50],
            [['telephone1', 'telephone2'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 200],
            [['photo'], 'string', 'max' => 256],
            [['email'], 'unique'],
            [['userUsername'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userUsername' => 'username']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'userUsername' => 'Username',
            'firstname' => 'Όνομα',
            'lastname' => 'Επώνυμο',
            'telephone1' => 'Τηλέφωνο 1',
            'telephone2' => 'Τηλέφωνο 2',
            'email' => 'Email',
            'skypeUsername' => 'Skype Username',
            'comments' => 'Σχόλια',
            'url' => 'Url',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserUsername()
    {
        return $this->hasOne(User::className(), ['username' => 'userUsername']);
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
    public function getReferences()
    {
        return $this->hasMany(References::className(), ['professorID' => 'ID']);
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
