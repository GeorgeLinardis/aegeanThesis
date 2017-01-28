<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "references".
 *
 * @property integer $ID
 * @property integer $professorID
 * @property integer $studentID
 * @property string $title
 * @property string $author
 * @property string $type
 * @property string $URL
 * @property string $date_created_by_author
 * @property string $date_created_by_student
 * @property string $date_updated_by_student
 * @property string $file
 *
 * @property Student $student
 * @property Professor $professor
 * @property ThesisHasReferences[] $thesisHasReferences
 */
class References extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'references';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['professorID', 'studentID', 'title', 'author'], 'required'],
            [['professorID', 'studentID'], 'integer'],
            [['type', 'URL', 'file'], 'string'],
            [['title'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 256],
            [['studentID'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['studentID' => 'ID']],
            [['professorID'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professorID' => 'ID']],
            [['date_created_by_author', 'date_created_by_student', 'date_updated_by_student'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'professorID' => 'Κωδικός Καθηγητή',
            'studentID' => 'Κωδικός Φοιτητή',
            'title' => 'Τίτλος',
            'author' => 'Συγγραφέας',
            'type' => 'Τύπος',
            'URL' => 'Url',
            'date_created_by_author' => 'Ημ/νία δημιουργίας Συγγραφέα',
            'date_created_by_student' => 'Ημ/νία δημιουργίας Φοιτητή',
            'date_updated_by_student' => 'Ημ/νία ανανέωσης φοιτητή',
            'file' => 'Αρχείο',
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
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['ID' => 'professorID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesisHasReferences()
    {
        return $this->hasMany(ThesisHasReferences::className(), ['referencesID' => 'ID']);
    }
}
