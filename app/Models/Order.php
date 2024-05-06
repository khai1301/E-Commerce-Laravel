<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;


class Order extends Base
{
    use HasFactory;
    // public $title="ĐƠN HÀNG";
    // public function listingConfigs(){
    //     $listingConfigs= array(
    //         array(
    //             'field'=>'order_id',
    //             'name'=>'Mã đơn hàng',
    //             'type'=>'idd',
    //             'filter'=>'equal'
    //         ),
       
    //         array(
    //             'field'=>'customer_id',
    //             'name'=>'Mã khách hàng',
    //             'type'=>'idd',
    //             'filter'=>'like'
    //         ),
    //         array(
    //             'field'=>'payment_id',
    //             'name'=>'Mã thanh toán',
    //             'type'=>'idd',
    //             'filter'=>'like'
    //         ),
    //         array(
    //             'field'=>'order_total',
    //             'name'=>'Tổng đơn hàng',
    //             'type'=>'idd',
    //             'filter'=>'like'
    //         ),
    //         array(
    //             'field'=>'order_status',
    //             'name'=>'Trạng thái',
    //             'type'=>'text'
    //         ),
            
            
            
    //     );
    //     return array_merge($listingConfigs);
    // }
}
