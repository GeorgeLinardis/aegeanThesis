<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor_has_masters".
 *
 * @property integer $ID
 * @property integer $professorID
 * @property string $masterID
 *
 * @property Professor $professor
 * @property Master $master
 */
class ProfessorHasMasters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professor_has_masters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['professorID', 'masterID'], 'required'],
            [['professorID'], 'integer'],
            [['masterID'], 'string', 'max' => 10],
            [['professorID'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['professorID' => 'ID']],
            [['masterID'], 'exist', 'skipOnError' => true, 'targetClass' => Master::className(), 'targetAttribute' => ['masterID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'professorID' => 'Κωδ.Καθηγητή',
            'masterID' => 'Μεταπτυχιακό',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessor()
    {
        return $this->hasOne(Professor::className(), ['ID' => 'professorID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(Master::className(), ['ID' => 'masterID']);
    }
}
