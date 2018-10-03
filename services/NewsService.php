<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 18:56
 */

namespace app\services;


use app\modules\admin\models\newsForms\CreateForm;
use app\modules\news\models\News;

class NewsService
{
    protected $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function create()
    {
        $model = new CreateForm();

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->validate()) {

            $article = new News();
            $article->title = $model->title;
            $article->description = $model->description;
            $article->text = $model->text;

            return $article->save();
        } else {

            $model->setAttributes(\Yii::$app->getRequest()->post());
            if ($model->validate()){
                $article = new News();
                $article->title = $model->title;
                $article->description = $model->description;
                $article->text = $model->text;

                return $article->save();
            }

            return false;
        }
    }

    public function update($id)
    {
        $model = new CreateForm();
        $article = News::findOne($id);

        if ($model->load($this->requestService->getRequest()->getBodyParams()) && $model->validate()) {
            $article->title = $model->title;
            $article->description = $model->description;
            $article->text = $model->text;

            return $article->save();
        } else {

            $model->setAttributes(\Yii::$app->getRequest()->getBodyParams());
            if ($model->validate()){
                $article->title = $model->title;
                $article->description = $model->description;
                $article->text = $model->text;

                return $article->save();
            }

            return false;
        }
    }

    public function delete($id)
    {
        $article = News::findOne($id);

        return $article->delete();
    }
}