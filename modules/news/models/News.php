<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 12:32
 */

namespace app\modules\news\models;

use yii\db\ActiveRecord;

class News extends ActiveRecord
{

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function getLikes()
    {
        return $this->hasMany(Likes_for_articles::className(), ['article_id' => 'id']);
    }
}