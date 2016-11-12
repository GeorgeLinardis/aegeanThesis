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
            'ID' => 'ID',
            'title' => 'Title',
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
    public function getThesisHasReferences()
    {
        return $this->hasMany(ThesisHasReferences::className(), ['referencesID' => 'ID']);
    }
}
