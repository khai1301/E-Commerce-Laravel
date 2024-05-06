<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
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
                'editing'=>false,
                'editListing'=>true
            ),
       
            array(
                'field'=>'name',
                'name'=>'Tên sản phẩm',
                'type'=>'text',
                'filter'=>'like',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'validate'=>'required|max:255',
                'editListing'=>true
            ),
            array(
                'field'=>'image',
                'name'=>'Ảnh sản phẩm',
                'type'=>'image',
                'listing'=>true,
                'editing'=>true,
                'validate'=>'required',
                'editListing'=>true
            ),
            array(
                'field'=>'price',
                'name'=>'Giá sản phẩm',
                'type'=>'number',
                'filter'=>'between',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'validate'=>'required|Numeric',
                'editListing'=>true
            ),array(
                'field'=>'amount',
                'name'=>'Số lượng sản phẩm',
                'type'=>'sl',
                'listing'=>true,
                'editing'=>true,
            ),
            array(
                'field'=>'content',
                'name'=>'Nội dung sản phẩm',
                'type'=>'ckeditor',
                'listing'=>false,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'category_id',
                'name'=>'Danh mục của sản phẩm',
                'type'=>'select',
                'listing'=>false,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'featured_product',
                'name'=>'Sản phẩm nổi bật',
                'type'=>'bit',
                'listing'=>true,
                'editing'=>true,
            )

        );
        $editingConfigs= array(
            array(
                'field'=>'id',
                'name'=>'ID',
                'type'=>'text',
                'filter'=>'equal',
                'sort'=>true,
                'listing'=>false,
                'editing'=>true,
                
            ),
       
            array(
                'field'=>'name',
                'name'=>'Tên sản phẩm',
                'type'=>'text',
                'filter'=>'like',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'image',
                'name'=>'Ảnh sản phẩm',
                'type'=>'image',
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'price',
                'name'=>'Giá sản phẩm',
                'type'=>'number',
                'filter'=>'between',
                'sort'=>true,
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'content',
                'name'=>'Nội dung sản phẩm',
                'type'=>'ckeditor',
                'listing'=>false,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'category_id',
                'name'=>'Danh mục của sản phẩm',
                'type'=>'select',
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true
            ),
            array(
                'field'=>'amount',
                'name'=>'Số lượng sản phẩm',
                'type'=>'sl',
                'listing'=>true,
                'editing'=>true,
            ),
            array(
                'field'=>'featured_product',
                'name'=>'Sản phẩm nổi bật',
                'type'=>'bit',
                'listing'=>true,
                'editing'=>true,
                'editListing'=>true
            )
            );
        return array_merge($listingConfigs, $defautlistingConfigs);
    }
    public function typeProduct(){

    }
}
