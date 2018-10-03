<?php

use yii\grid\GridView;

?>
<div class="col-lg-offset-1 col-lg-11 text-right ">
    <a class="btn btn-success" href="/admin/news/create">Create</a>
</div> <br>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => [
        'class' => 'table table-striped table-bordered'
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'title',
        'description',
        'text',
        [
            'attribute' => 'created_at',
            'format' => ['date', 'dd.MM.yyyy']
        ],
        ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
    ]
]); ?>

<div class="col-lg-offset-1 col-lg-11 text-left">
    <a class="btn btn-warning" href="/admin">back</a>
</div>