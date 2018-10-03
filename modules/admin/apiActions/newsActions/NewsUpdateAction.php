<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 03.10.18
 * Time: 12:38
 */

namespace app\modules\admin\apiActions\newsActions;


use app\modules\admin\controllers\ApiNewsController;
use app\services\NewsService;
use yii\rest\UpdateAction;

class NewsUpdateAction extends UpdateAction
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

    public function run($id)
    {
        return $this->newsService->update($id);
    }

}