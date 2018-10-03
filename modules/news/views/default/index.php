<div>
    <?php foreach ($news as $article): ?>
    <div>
        <a href="/news/article?id=<?= $article->id ?>"><h3><?= $article->title ?></h3></a>
        <p><?= $article->description ?></p>
    </div>

    <?php endforeach; ?>
</div>