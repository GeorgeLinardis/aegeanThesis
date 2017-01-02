<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chat".
 *
 * @property integer $id
 * @property string $Sender
 * @property string $message
 * @property string $reg_date
 * @property string $date_time
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
            [['message'], 'string'],
            [['reg_date', 'date_time'], 'safe'],
            [['Sender'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Sender' => 'Sender',
            'message' => 'Message',
            'reg_date' => 'Reg Date',
            'date_time' => 'Date Time',
        ];
    }
}
