<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create article';
?>

<?php $form = ActiveForm::begin([
    'method' => 'PUT'
]) ?>

    <div>
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $form->field($model, 'title')->textInput(['value' => $article->title]) ?>
        <?= $form->field($model, 'description')->textInput(['value' => $article->description]) ?>
        <?= $form->field($model, 'text')->textInput(['value' => $article->text]) ?>

        <div>
            <a class="btn btn-success" href="/admin/news">Back</a>
            <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?php ActiveForm::end() ?>