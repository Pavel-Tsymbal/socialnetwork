<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 03.10.18
 * Time: 10:28
 */

namespace app\modules\admin\apiActions\newsActions;


use app\modules\admin\controllers\ApiNewsController;
use app\services\NewsService;
use yii\rest\CreateAction;

class NewsCreateAction extends CreateAction
{
    protected $newsService;

    public function __construct(
        $id,
        ApiNewsController $controller,
        NewsService $newsService,
        array $config = [])
    {
        parent::__construct($id, $controller, $config);

        $this->newsService = $newsService;
    }

    public function run()
    {
       return $this->newsService->create();
    }

}