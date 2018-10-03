<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 10:38
 */

namespace app\actions\rolesActions;


use app\controllers\RolesUserController;
use app\services\UserService;
use yii\rest\DeleteAction;

class RolesUserDeleteAction extends DeleteAction
{
    protected $userService;

    public function __construct(
        $id, RolesUserController $controller,
        UserService $userService,
        array $config = [])
    {
        parent::__construct($id, $controller, $config);

        $this->userService = $userService;
    }

    public function run($id)
    {
       return $this->userService->revokeRoles($id);
    }

}