<?php
namespace app\models;

use Yii;
use yii\base\Model;

class FsLoginForm extends Model
{
    public $email;
    public $password;
    public $company_hvhh;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
//            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
//            ['company_hvhh', 'validateCompanyHvhh'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    public function validateCompanyHvhh($attribute, $params)
    {
//        if (!$this->hasErrors()) {
//            $user = $this->getUser();
//            if (!$user || !$user->validatePassword($this->password)) {
//                $this->addError($attribute, 'Incorrect email or password.');
//            }
//        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = FsUsers::findByUsername($this->email);
        }

        return $this->_user;
    }

    public function login()
    {

        if ($this->validate()) {
            return Yii::$app->fsUser->login($this->getUser(), 3600*24*30);
        } else {
            return false;
        }
    }
}
