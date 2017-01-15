<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_applies_for_thesis".
 *
 * @property integer $id
 * @property integer $thesisID
 * @property integer $studentID
 * @property string $dateCreated
 * @property string $status
 *
 * @property Student $student
 * @property Thesis $thesis
 */
class StudentAppliesForThesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_applies_for_thesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thesisID', 'studentID'], 'integer'],
            [['dateCreated'], 'safe'],
            [['status'], 'string'],
            [['studentID'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['studentID' => 'ID']],
            [['thesisID'], 'exist', 'skipOnError' => true, 'targetClass' => Thesis::className(), 'targetAttribute' => ['thesisID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thesisID' => 'Διπλωματική',
            'studentID' => 'Φοιτητής',
            'dateCreated' => 'Ημ/νια αίτησης',
            'status' => 'Κατάσταση',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['ID' => 'studentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesis()
    {
        return $this->hasOne(Thesis::className(), ['ID' => 'thesisID']);
    }
}
