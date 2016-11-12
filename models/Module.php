<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property string $ID
 * @property string $title
 *
 * @property MasterHasModule[] $masterHasModules
 * @property ThesisHasModules[] $thesisHasModules
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'title'], 'required'],
            [['ID'], 'string', 'max' => 50],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterHasModules()
    {
        return $this->hasMany(MasterHasModule::className(), ['moduleID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesisHasModules()
    {
        return $this->hasMany(ThesisHasModules::className(), ['moduleID' => 'ID']);
    }
}
