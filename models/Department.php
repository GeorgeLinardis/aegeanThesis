<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property string $ID
 * @property string $title
 * @property string $base
 * @property string $island
 * @property string $schoolID
 *
 * @property School $school
 * @property Master[] $masters
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'title', 'base', 'island', 'schoolID'], 'required'],
            [['ID', 'base', 'island', 'schoolID'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 200],
            [['schoolID'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['schoolID' => 'ID']],
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
            'base' => 'Base',
            'island' => 'Island',
            'schoolID' => 'School ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['ID' => 'schoolID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasters()
    {
        return $this->hasMany(Master::className(), ['departmentID' => 'ID']);
    }
}
