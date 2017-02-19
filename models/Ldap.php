<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Ldap extends Model
{
    public $email;
    public $password;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email is required
            [['email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],

        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Κωδικός',
        ];
    }


}
