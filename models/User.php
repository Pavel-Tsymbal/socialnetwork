<?php

namespace app\models;

use app\modules\user\models\Chat;
use app\modules\user\models\UserSettings;
use phpDocumentor\Reflection\Types\Boolean;
use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    public function getSettings() //получаю массив настроек
    {
        return $this->hasMany(UserSettings::className(), ['user_id' => 'id']);
    }

    public function getOption($optionName) // получаю определенную настройку по имени
    {
        $options = $this->settings;

        $opt = 0;
        foreach ($options as $option) {
            if ($option->name == $optionName) {
                $opt = $option;
                break;
            }

        }

        if ($opt) {
            return $opt;
        }

        return false;
    }

    public function isOption($optionName) // проверяю true или false настройка
    {
        $option = $this->getOption($optionName);
        return $option->value ? true : false;
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function isAdmin()
    {
        $roles = \Yii::$app->authManager->getRolesByUser($this->getId());
        return array_key_exists('admin', $roles);
    }

    /**
     * @return bool
     */
    public function getIsGuest()
    {
        return !!Yii::$app->user->identity;
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['login' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}
