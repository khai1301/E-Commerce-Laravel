<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;
use Illuminate\Auth\Authenticatable;

class User extends  Base implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;

    protected $fillable =['name', 'email', 'gender', 'password'];

    // protected $fillable = [
    //     'email',
    //     'name',
    //     'gender',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public $title="KHÁCH HÀNG";

    public function listingConfigs(){
        $defautlistingConfigs = parent::defaultlistingConfigs();
        $listingConfigs= array(
            array(
                'field'=>'id',
                'name'=>'ID',
                'type'=>'text',
                'filter'=>'equal'
            ),
            array(
                'field'=>'email',
                'name'=>'Email',
                'type'=>'text',
                'filter'=>'like'
            ),
            array(
                'field'=>'name',
                'name'=>'Tên khách hàng',
                'type'=>'text',
                'filter'=>'like'
            ),
            array(
                'field'=>'gender',
                'name'=>'Giới tính',
                'type'=>'text',
                'filter'=>'like'
            ),

            
        );
        return array_merge($listingConfigs, $defautlistingConfigs);
    }
}
