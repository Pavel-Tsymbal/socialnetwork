<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 15:20
 */

namespace app\modules\news\services;


use app\modules\news\models\Likes_for_articles;
use app\services\RequestService;

class ArticleService
{
    protected $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function isAlreadyLiked($articleId,$userId)
    {
       return ($like = Likes_for_articles::find()->where(['and',['article_id' => $articleId, 'user_id' => $userId]])->one()) ? true : false;
    }

    public function dislike($articleId,$userId)
    {
        $like = Likes_for_articles::find()->where(['and',['article_id' => $articleId, 'user_id' => $userId]])->one();

        return $like->delete();
    }

    public function like($articleId,$userId)
    {
        $like = new Likes_for_articles();
        $like->article_id = $articleId;
        $like->user_id = $userId;

        return $like->save();
    }


}