<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;

class Category extends Base
{
    use HasFactory;
    public $title="DANH MỤC";

    public function configs(){
        $defautlistingConfigs = parent::defaultlistingConfigs();
        $listingConfigs= array(
            array(
                'field'=>'id',
                'name'=>'ID',
                'type'=>'text',
                'filter'=>'equal',
                'sort'=>true,
                'listing'=>true,
                'editing'=>false
            ),
       
            array(
                'field'=>'name',
                'name'=>'Tên danh mục',
                'type'=>'text',
                'filter'=>'like',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true
                
            ),array(
                'field'=>'image',
                'name'=>'Ảnh sản phẩm',
                'type'=>'image',
                'listing'=>true,
                'editing'=>true,
                'validate'=>'required'
                
            )
            
            

        );
        $editingConfigs= array(
            array(
                'field'=>'id',
                'name'=>'ID',
                'type'=>'text',
                'filter'=>'equal',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true
            ),
       
            array(
                'field'=>'name',
                'name'=>'Tên danh mục',
                'type'=>'text',
                'filter'=>'like',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'image',
                'name'=>'Ảnhdanh mục',
                'type'=>'image',
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true,
                'validate'=>'required'
                
            )
            );
        return array_merge($listingConfigs, $defautlistingConfigs);
    }
        
        
    
}
