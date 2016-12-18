<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "references".
 *
 * @property integer $ID
 * @property string $title
 * @property string $type
 * @property string $URL
 * @property string $date_created_by_author
 * @property string $date_created_by_student
 * @property string $date_updated_by_student
 * @property string $file
 *
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
            [['title'], 'required'],
            [['type', 'URL', 'file'], 'string'],
            [['date_created_by_author', 'date_created_by_student', 'date_updated_by_student'], 'safe'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'Κωδικός αναφοράς',
            'author'=>'Συγγραφέας',
            'title' => 'Τίτλος',
            'type' => 'Τύπος',
            'URL' => 'Url',
            'date_created_by_author' => 'Ημ/νια δημιουργίας απο τον συγγραφέα',
            'date_created_by_student' => 'Ημ/νια καταχώρησης',
            'date_updated_by_student' => 'Ημ/νια ανανέωσης',
            'file' => 'Αρχείο',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesisHasReferences()
    {
        return $this->hasMany(ThesisHasReferences::className(), ['referencesID' => 'ID']);
    }
}
