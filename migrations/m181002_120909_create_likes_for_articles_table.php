<?php

use yii\db\Migration;

/**
 * Handles the creation of table `likes_for_articles`.
 */
class m181002_120909_create_likes_for_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('likes_for_articles', [
            'id' => $this->primaryKey(),
            'article_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'created_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('likes_for_articles');
    }
}
