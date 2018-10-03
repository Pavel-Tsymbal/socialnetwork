<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create article';
?>

<?php $form = ActiveForm::begin() ?>


    <div>
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'text') ?>

        <div>
            <a class="btn btn-success" href="/admin/news">Back</a>
            <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?php ActiveForm::end() ?>