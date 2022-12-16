<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;

class Product extends Base
{
    use HasFactory;
public $title="SẢN PHẨM ";
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
                'name'=>'Tên sản phẩm',
                'type'=>'text',
                'filter'=>'like',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'validate'=>'required|max:255'
            ),
            array(
                'field'=>'image',
                'name'=>'Ảnh sản phẩm',
                'type'=>'image',
                'listing'=>true,
                'editing'=>true,
                'validate'=>'required'
            ),
            array(
                'field'=>'price',
                'name'=>'Giá sản phẩm',
                'type'=>'number',
                'filter'=>'between',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'validate'=>'required|Numeric'
            ),
            array(
                'field'=>'content',
                'name'=>'Nội dung sản phẩm',
                'type'=>'ckeditor',
                'listing'=>false,
                'editing'=>true
            ),
            array(
                'field'=>'category_id',
                'name'=>'Danh mục của sản phẩm',
                'type'=>'select',
                'listing'=>false,
                'editing'=>true
            ),
            array(
                'field'=>'featured_product',
                'name'=>'Sản phẩm nổi bật',
                'type'=>'bit',
                'listing'=>true,
                'editing'=>true
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
                'editing'=>false
            ),
       
            array(
                'field'=>'name',
                'name'=>'Tên sản phẩm',
                'type'=>'text',
                'filter'=>'like',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true
            ),
            array(
                'field'=>'image',
                'name'=>'Ảnh sản phẩm',
                'type'=>'image',
                'listing'=>true,
                'editing'=>true
            ),
            array(
                'field'=>'price',
                'name'=>'Giá sản phẩm',
                'type'=>'number',
                'filter'=>'between',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true
            ),
            array(
                'field'=>'content',
                'name'=>'Nội dung sản phẩm',
                'type'=>'ckeditor',
                'listing'=>false,
                'editing'=>true
            ),
            array(
                'field'=>'category_id',
                'name'=>'Danh mục của sản phẩm',
                'type'=>'select',
                'listing'=>true,
                'editing'=>true
            ),
            array(
                'field'=>'featured_product',
                'name'=>'Sản phẩm nổi bật',
                'type'=>'bit',
                'listing'=>true,
                'editing'=>true
            )
            );
        return array_merge($listingConfigs, $defautlistingConfigs);
    }
    public function typeProduct(){

    }
}
