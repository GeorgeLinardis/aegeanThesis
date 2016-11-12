<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "master_has_module".
 *
 * @property integer $ID
 * @property string $masterID
 * @property string $moduleID
 *
 * @property Master $master
 * @property Module $module
 */
class MasterHasModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_has_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['masterID', 'moduleID'], 'required'],
            [['masterID', 'moduleID'], 'string', 'max' => 50],
            [['masterID'], 'exist', 'skipOnError' => true, 'targetClass' => Master::className(), 'targetAttribute' => ['masterID' => 'ID']],
            [['moduleID'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['moduleID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'masterID' => 'Master ID',
            'moduleID' => 'Module ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(Master::className(), ['ID' => 'masterID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['ID' => 'moduleID']);
    }
}
