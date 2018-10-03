<?php

namespace app\modules\news\controllers;

use app\modules\news\models\News;
use yii\web\Controller;

/**
 * Default controller for the `news` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $news = News::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index',['news' => $news]);
    }
}
