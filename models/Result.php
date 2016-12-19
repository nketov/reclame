<?php
/**
 * Created  Date: 17.12.2016  Time: 15:05
 */

namespace app\models;


use yii\base\Model;

class Result extends Model
{


    public $id;
    public $date;
    public $direct_rate;
    public $direct_click;
    public $direct_order;
    public $adwords_rate;
    public $adwords_click;
    public $adwords_order;


    public $direct_click_price;
    public $direct_CPL;


    public $adwords_click_price;
    public $adwords_CPL;

    public $total_rate;
    public $total_click;
    public $conversion;
    public $total_order;
    public $total_CPL;



    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Дата',
            'direct_rate' => 'Расход  (руб.)',
            'direct_click' => 'Клики',
            'direct_click_price' => 'Цена клика',
            'direct_order' => 'Заявки',
            'direct_CPL' => 'CPL',
            'adwords_rate' => 'Расход  (руб.)',
            'adwords_click' => 'Клики',
            'adwords_click_price' => 'Цена клика',
            'adwords_order' => 'Заявки',
            'adwords_CPL' => 'CPL',
            'total_rate' => 'Общий расход',
            'total_click' => 'Итого кликов',
            'conversion' => 'Конверсия',
            'total_order' => 'Итого заявок',
            'total_CPL' => 'CPL',
        ];
    }

    public function resolveDate( $dateModel)
    {

        $this->id=$dateModel->id;
        $this->date=$dateModel->date;

        $this->direct_rate=$dateModel->direct_rate;
        $this->direct_click=$dateModel->direct_click;
        $this->direct_order=$dateModel->direct_order;

        $this->adwords_rate=$dateModel->adwords_rate;
        $this->adwords_click=$dateModel->adwords_click;
        $this->adwords_order=$dateModel->adwords_order;

        $this->direct_click_price=($this->direct_click==0) ? 0: round($this->direct_rate/$this->direct_click,2);
        $this->adwords_click_price=($this->adwords_click==0) ? 0: round($this->adwords_rate/$this->adwords_click, 2);

        $this->direct_CPL=($this->direct_order==0) ? 0: round($this->direct_rate/$this->direct_order,2);
        $this->adwords_CPL=($this->adwords_order==0) ? 0: round($this->adwords_rate/$this->adwords_order, 2);

        $this->total_rate = $this->direct_rate+$this->adwords_rate;
        $this->total_click = $this->direct_click+$this->adwords_click;
        $this->total_order = $this->direct_order+$this->adwords_order;
        $this->conversion = ($this->total_click==0) ? 0: round($this->total_order/$this->total_click, 4);
        
        $this->total_CPL=($this->total_order==0) ? 0: round($this->total_rate/$this->total_order, 2);






    }



















}