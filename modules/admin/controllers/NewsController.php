<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 18:30
 */

namespace app\modules\admin\controllers;


use app\modules\admin\models\newsForms\CreateForm;
use app\modules\admin\Module;
use app\modules\news\models\News;
use app\services\NewsService;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(
        $id,
        Module $module,
        NewsService $newsService,
        array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->newsService = $newsService;
    }


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'update', 'delete', 'create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => News::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new CreateForm();

        if ($this->newsService->create()) {
            \Yii::$app->session->setFlash('success', 'The article was created');
            return $this->redirect('/admin/news');
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        if ($this->newsService->delete($id)) {
            \Yii::$app->session->setFlash('success', 'The article was deleted');
            return $this->redirect('/admin/news');
        }

        return false;
    }

    public function actionUpdate($id)
    {
        $model = new CreateForm();
        $article = News::findOne($id);

        if ($this->newsService->update($id)){
            \Yii::$app->session->setFlash('success', 'The article was updated');
            return $this->redirect('/admin/news');
        }

        return $this->render('update',['model' => $model,'article' => $article]);
    }

}