<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master".
 *
 * @property string $ID
 * @property string $title
 * @property string $departmentID
 *
 * @property Department $department
 * @property MasterHasModule[] $masterHasModules
 * @property ProfessorHasMasters[] $professorHasMasters
 */
class Master extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'title', 'departmentID'], 'required'],
            [['ID', 'departmentID'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 200],
            [['departmentID'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['departmentID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'Κωδικός',
            'title' => 'Μεταπτυχιακό',
            'departmentID' => 'Κωδικός Τμήματος',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['ID' => 'departmentID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMasterHasModules()
    {
        return $this->hasMany(MasterHasModule::className(), ['masterID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessorHasMasters()
    {
        return $this->hasMany(ProfessorHasMasters::className(), ['masterID' => 'ID']);
    }
}
