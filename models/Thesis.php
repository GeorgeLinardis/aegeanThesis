<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thesis".
 *
 * @property integer $ID
 * @property integer $professorID
 * @property integer $studentID
 * @property string $title
 * @property string $description
 * @property string $goal
 * @property string $prerequisite_knowledge
 * @property integer $max_students
 * @property string $comments
 * @property string $status
 * @property integer $committee1
 * @property integer $committee2
 * @property integer $committee3
 *
 * @property Professor $professor
 * @property Student $student
 * @property Professor $committee10
 * @property Professor $committee20
 * @property Professor $committee30
 * @property ThesisHasModules[] $thesisHasModules
 * @property ThesisHasReferences[] $thesisHasReferences
 */
class Thesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['professorID', 'studentID', 'max_students', 'committee1', 'committee2', 'committee3'], 'integer'],
            [['title', 'description', 'status'], 'required'],
            [['description', 'goal', 'prerequisite_knowledge', 'comments', 'status'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['professorID'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professorID' => 'ID']],
            [['studentID'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['studentID' => 'ID']],
            [['committee1'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['committee1' => 'ID']],
            [['committee2'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['committee2' => 'ID']],
            [['committee3'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['committee3' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'Κωδικός διπλωματικής',
            'professorID' => 'Κωδικός καθηγητή',
            'studentID' => 'Κωδικός Φοιτητή',
            'title' => 'Τίτλος',
            'description' => 'Περιγραφή',
            'goal' => 'Στόχος',
            'prerequisite_knowledge' => 'Προαπαιτούμενη γνώση',
            'max_students' => 'Μέγιστος Αριθμός Φοιτητών',
            'comments' => 'Σχόλια',
            'status' => 'Κατάσταση',
            'committee1' => '1ο Μέλος Επιτροπής',
            'committee2' => '2ο Μέλος Επιτροπής',
            'committee3' => '3ο Μέλος Επιτροπής',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['ID' => 'professorID']);
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
    public function getCommittee10()
    {
        return $this->hasOne(Professor::className(), ['ID' => 'committee1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommittee20()
    {
        return $this->hasOne(Professor::className(), ['ID' => 'committee2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommittee30()
    {
        return $this->hasOne(Professor::className(), ['ID' => 'committee3']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesisHasModules()
    {
        return $this->hasMany(ThesisHasModules::className(), ['thesisID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesisHasReferences()
    {
        return $this->hasMany(ThesisHasReferences::className(), ['thesisID' => 'ID']);
    }
}
