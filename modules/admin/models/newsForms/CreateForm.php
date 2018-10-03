<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 02.10.18
 * Time: 18:44
 */

namespace app\modules\admin\models\newsForms;


use yii\base\Model;

class CreateForm extends Model
{
    public $title;
    public $description;
    public $text;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title', 'description', 'text'], 'required', 'message' => 'fill in the fields!'],
            ['title','string'],
            ['description','string'],
            ['text','string']
        ];
    }

    /**
     * @return array labels for attributes
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'description' => 'Description',
            'text' => 'Text'
        ];
    }
}