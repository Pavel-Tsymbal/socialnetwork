<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 10:47
 */

namespace app\actions;


use app\controllers\RolesUserController;
use app\services\RequestService;
use app\services\UserService;
use yii\rest\CreateAction;

class RolesUserCreateAction extends CreateAction
{
    protected $userService;
    protected $requestService;

    public function __construct(
        $id,
        RolesUserController $controller,
        UserService $userService,
        RequestService $requestService,
        array $config = [])
    {
        parent::__construct($id, $controller, $config);

        $this->userService = $userService;
        $this->requestService = $requestService;
    }

    public function run()
    {
       $params = \Yii::$app->getRequest()->getBodyParams();
       return $this->userService->setRole($params['role'],$params['id']);
    }

}