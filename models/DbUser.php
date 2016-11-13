<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $ID
 * @property string $Username
 * @property string $Password
 * @property string $Role
 *
 * @property Professor[] $professors
 * @property Student[] $students
 */
class DbUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Username', 'Password'], 'required','message'=>(Yii::$app->params['requiredMsg'])],
            ['Username','unique','message'=>(Yii::$app->params['uniqueMsg'])],
            [['Role'], 'string'],
            [['Username'], 'string', 'max' => 50],
            [['Password'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Username' => 'Όνομα Χρήστη',
            'Password' => 'Κωδικός',
            'Role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessors()
    {
        return $this->hasMany(Professor::className(), ['userUsername' => 'Username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['userUsername' => 'Username']);
    }
}
