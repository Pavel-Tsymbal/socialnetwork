<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 10:28
 */

namespace app\controllers;


use app\actions\RolesUserCreateAction;
use app\actions\RolesUserDeleteAction;
use app\actions\RolesUserUpdateAction;
use app\models\User;
use yii\rest\ActiveController;

class RolesUserController extends ActiveController
{
    public $modelClass = User::class;

    public function actions()
    {
        $actions = parent::actions();

        $actions['delete'] = [
            'class' => RolesUserDeleteAction::class,
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];

        $actions['create'] = [
            'class' => RolesUserCreateAction::class,
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];

        $actions['update'] = [
            'class' => RolesUserUpdateAction::class,
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];

        return $actions;
    }

}