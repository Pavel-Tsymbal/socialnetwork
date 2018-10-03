<?php

use app\assets\ArticleAsset;

ArticleAsset::register($this);

?>

<div class="container">
    <h1><?= $article->title ?></h1>
    <p><?= $article->text ?></p>
    <div class="text-right">
        <p><?= $article->created_at ?></p>
    </div>
    <div class="text-right">
        <a class="btn btn-success" onclick="like(<?= $article->id ?>, <?= Yii::$app->user->getId() ?>)">&#128077 <?= $likesCount ?></a>
    </div>
</div>


