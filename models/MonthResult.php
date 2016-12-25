<?php
/**
 * Created  Date: 17.12.2016  Time: 15:05
 */

namespace app\models;


use yii\base\Model;

class MonthResult extends Model
{

    public $days;
    public $sum_rate;
    public $sum_click;
    public $sum_order;
    public $sum_CPL;
    public $amount;

    public $sum_conversion;

    public $sum_adwords_rate;
    public $sum_direct_rate;

    public $average_rate;
    public $average_order;
    public $average_CPL;
    public $average_click;
    
    public $average_direct_CPL;
    public $average_adwords_CPL;



    
    


}