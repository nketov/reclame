<?php

namespace app\models;

use Yii;
use yii\jui\Dialog;

/**
 * This is the model class for table "{{%date}}".
 *
 * @property integer $id
 * @property string $date
 * @property string $direct_rate
 * @property integer $direct_click
 * @property integer $direct_order
 * @property string $adwords_rate
 * @property integer $adwords_click
 * @property integer $adwords_order
 */
class Date extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%date}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'direct_rate', 'direct_click', 'direct_order', 'adwords_rate', 'adwords_click', 'adwords_order'], 'required', 'message' =>''],
            [['date'], 'safe'],
            [['direct_rate', 'adwords_rate'], 'number'],
            [['direct_click', 'direct_order', 'adwords_click', 'adwords_order'], 'integer'],
            [['date'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => '',
            'direct_rate' => 'Расход  (руб.)',
            'direct_click' => 'Клики',
            'direct_order' => 'Заявки',
            'adwords_rate' => 'Расход  (руб.)',
            'adwords_click' => 'Клики',
            'adwords_order' => 'Заявки'
        ];
    }

    public function beforeSave($options=array())
    {

        $this->date = date('Y-m-d', strtotime($this->date));

        $model=Date::find() ->where(["date" => $this->date])->one();

        if($model){
            $this->id =$model->id;
            $model->delete();
        }

             
        
        return true;
    }


}
