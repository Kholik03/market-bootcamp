<?php
namespace App\Repositories;

use App\Models\ProductsModel;

class Products extends ProductsModel
{
    public static function getAll()
    {
        if(array_key_exists('search',$_GET))
        {
            $search = $_GET['search'];
        }

        $data = Products::table();

        if(isset($search))
        {
            $data = $data
                ->where('product_name','like','%'.$search.'%')
                ->orWhere('product_price', 'like','%'.$search.'%');
        }

        $data = $data->get();

        return $data;
    }
}