<?php

namespace app\actions;

use app\controllers\TestUserController;
use app\models\RegisterForm;
use app\models\User;
use app\services\RequestService;
use app\services\UserService;
use Yii;
use yii\rest\CreateAction;

class TestUserCreateAction extends CreateAction
{
    protected $userService;
    protected $requestService;

    public function __construct(
        $id,
        TestUserController $controller,
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
        $params = Yii::$app->getRequest()->getBodyParams();
        $model = new RegisterForm();
        $user = new User();

        if ($this->userService->saveNewFromApi($model,$user,$params)){
           return  $this->userService->setRole('user',$user->getId());
        }

        return false;
    }


}
