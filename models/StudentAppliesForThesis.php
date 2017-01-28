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
 * @property integer $professorID
 *
 * @property Student $student
 * @property Thesis $thesis
 * @property Professor $professor
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
            [['thesisID', 'studentID', 'professorID'], 'integer'],
            [['dateCreated'], 'safe'],
            [['status'], 'string'],
            [['studentID'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['studentID' => 'ID']],
            [['thesisID'], 'exist', 'skipOnError' => true, 'targetClass' => Thesis::className(), 'targetAttribute' => ['thesisID' => 'ID']],
            [['professorID'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professorID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thesisID' => 'Κωδικός Διπλωματικής',
            'studentID' => 'Φοιτητής',
            'dateCreated' => 'Ημερομηνία Αίτησης',
            'status' => 'Κατάσταση διπλωματικής',
            'professorID' => 'Καθηγητής',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['ID' => 'professorID']);
    }
}
