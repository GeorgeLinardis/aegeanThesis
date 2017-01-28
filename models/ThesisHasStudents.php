<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thesis_has_students".
 *
 * @property integer $ID
 * @property integer $thesisID
 * @property integer $studentID
 */
class ThesisHasStudents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thesis_has_students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thesisID', 'studentID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'thesisID' => 'Thesis ID',
            'studentID' => 'Student ID',
        ];
    }
}
