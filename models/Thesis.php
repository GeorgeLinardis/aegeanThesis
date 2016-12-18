<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thesis".
 *
 * @property integer $ID
 * @property integer $professorID
 * @property string $title
 * @property string $description
 * @property string $goal
 * @property string $prerequisite_knowledge
 * @property integer $max_students
 * @property string $comments
 * @property string $status
 * @property string $dateCreated
 * @property string $datePresented
 * @property integer $committee1
 * @property integer $committee2
 * @property integer $committee3
 * @property string $RequestPDf
 *
 * @property Student[] $students
 * @property Professor $professor
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
            [['professorID', 'max_students', 'committee1', 'committee2', 'committee3'], 'integer'],
            [['title','masterID', 'description', 'dateCreated', 'datePresented', 'RequestPDf'], 'required'],
            [['description', 'goal', 'prerequisite_knowledge', 'comments', 'status'], 'string'],
            [['dateCreated', 'datePresented'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['RequestPDf'], 'string', 'max' => 256],
            [['professorID'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professorID' => 'ID']],
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
            'professorID' => 'Κωδικός Καθηγητή',
            'masterID'=>'Μεταπτυχιακό',
            'title' => 'Τιτλος διπλωματικής',
            'description' => 'Περιγραφή',
            'goal' => 'Επιθυμητός στόχος',
            'prerequisite_knowledge' => 'Προαπαιτούμενη γννώση',
            'max_students' => 'Μέγιστος Αριθμός Φοιτητών',
            'comments' => 'Σχόλια',
            'status' => 'Κατάσταση',
            'dateCreated' => 'Ημ/νια δημιουργίας',
            'datePresented' => 'Ημ/νια παρουσίασης',
            'committee1' => '1ο Μέλος Επιτροπής',
            'committee2' => '2ο Μέλος Επιτροπής',
            'committee3' => '3ο Μέλος Επιτροπής',
            'RequestPDf' => 'Αίτηση (pdf)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['thesisID' => 'ID']);
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
