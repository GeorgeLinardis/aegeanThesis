<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thesis_has_modules".
 *
 * @property integer $ID
 * @property integer $thesisID
 * @property string $moduleID
 *
 * @property Thesis $thesis
 * @property Module $module
 */
class ThesisHasModules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thesis_has_modules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thesisID', 'moduleID'], 'required'],
            [['thesisID'], 'integer'],
            [['moduleID'], 'string', 'max' => 50],
            [['thesisID'], 'exist', 'skipOnError' => true, 'targetClass' => Thesis::className(), 'targetAttribute' => ['thesisID' => 'ID']],
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
            'thesisID' => 'Thesis ID',
            'moduleID' => 'Module ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesis()
    {
        return $this->hasOne(Thesis::className(), ['ID' => 'thesisID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['ID' => 'moduleID']);
    }
}
