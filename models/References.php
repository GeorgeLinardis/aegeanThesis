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
            [['date_created_by_author', 'date_created_by_student', 'date_updated_by_student'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 256],
            [['studentID'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['studentID' => 'ID']],
            [['professorID'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professorID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'professorID' => 'Professor ID',
            'studentID' => 'Student ID',
            'title' => 'Title',
            'author' => 'Author',
            'type' => 'Type',
            'URL' => 'Url',
            'date_created_by_author' => 'Date Created By Author',
            'date_created_by_student' => 'Date Created By Student',
            'date_updated_by_student' => 'Date Updated By Student',
            'file' => 'File',
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
