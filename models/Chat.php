<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property integer $thesisID
 * @property string $username
 * @property string $message
 * @property string $file
 * @property string $date_time
 *
 * @property User $username0
 * @property Thesis $thesis
 */
class Chat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thesisID'], 'required'],
            [['thesisID'], 'integer'],
            [['message'], 'string'],
            [['date_time'], 'safe'],
            [['username', 'file'], 'string', 'max' => 255],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => DatabaseUsers::className(), 'targetAttribute' => ['username' => 'username']],
            [['thesisID'], 'exist', 'skipOnError' => true, 'targetClass' => Thesis::className(), 'targetAttribute' => ['thesisID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thesisID' => 'Thesis ID',
            'username' => 'Username',
            'message' => 'Message',
            'file' => 'File',
            'date_time' => 'Date Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(User::className(), ['username' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThesis()
    {
        return $this->hasOne(Thesis::className(), ['ID' => 'thesisID']);
    }
}
