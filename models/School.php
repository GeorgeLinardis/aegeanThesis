<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property string $ID
 * @property string $title
 *
 * @property Department[] $departments
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
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
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['schoolID' => 'ID']);
    }
}
