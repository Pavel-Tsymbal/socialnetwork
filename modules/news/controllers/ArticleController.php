<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 13:54
 */

namespace app\modules\news\controllers;


use app\modules\news\models\Likes_for_articles;
use app\modules\news\models\News;
use app\modules\news\Module;
use app\modules\news\services\ArticleService;
use yii\web\Controller;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(
        $id,
        Module $module,
        ArticleService $articleService,
        array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->articleService = $articleService;
    }

    public function actionIndex($id)
    {
        $article = News::findOne($id);
        $likes = $article->likes;
        $likesCount = count($likes);

        return $this->render('index', ['article' => $article,'likesCount' => $likesCount]);
    }

    public function actionLike($articleId, $userId)
    {
        if ($this->articleService->isAlreadyLiked($articleId, $userId)) {
            return $this->articleService->dislike($articleId, $userId);
        } else {
            return $this->articleService->like($articleId, $userId);
        }
    }

}