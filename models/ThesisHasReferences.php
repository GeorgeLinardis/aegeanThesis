<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thesis_has_references".
 *
 * @property integer $ID
 * @property integer $thesisID
 * @property integer $referencesID
 *
 * @property Thesis $thesis
 * @property References $references
 */
class ThesisHasReferences extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thesis_has_references';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thesisID', 'referencesID'], 'required'],
            [['thesisID', 'referencesID'], 'integer'],
            [['thesisID'], 'exist', 'skipOnError' => true, 'targetClass' => Thesis::className(), 'targetAttribute' => ['thesisID' => 'ID']],
            [['referencesID'], 'exist', 'skipOnError' => true, 'targetClass' => References::className(), 'targetAttribute' => ['referencesID' => 'ID']],
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
            'referencesID' => 'References ID',
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
    public function getReferences()
    {
        return $this->hasOne(References::className(), ['ID' => 'referencesID']);
    }
}
