<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 10:58
 */

namespace app\actions;


use app\controllers\RolesUserController;
use app\services\UserService;
use yii\rest\UpdateAction;

class RolesUserUpdateAction extends UpdateAction
{
    protected $userService;

    public function __construct(
        $id,
        RolesUserController $controller,
        UserService $userService,
        array $config = [])
    {
        parent::__construct($id, $controller, $config);

        $this->userService = $userService;
    }

    public function run($id)
    {
        $role = \Yii::$app->getRequest()->getBodyParam('role');

        if (!empty($role)){
            $this->userService->revokeRoles($id);
            return $this->userService->setRole($role,$id);
        }

        return false;
    }

}