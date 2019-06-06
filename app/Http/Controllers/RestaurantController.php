<?php

namespace App\Http\Controllers;

use App\RestaurantModel;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('pages.restaurant.index')->with([
            'folder'=>'restaurant',
            'content'=>'index',
            'rows'=>RestaurantModel::get_restaurant()
        ]);
    }

    public function add_restaurant()
    {
        return view('pages.restaurant.index')->with([
            'folder'=>'restaurant',
            'content'=>'add'
        ]);
    }

    public function insert_restaurant()
    {
        $query = RestaurantModel::insert_restaurant();
        if($query == true)
        {
            return view('modal.success')->with(['pages'=>'']);
        }else {
            return view('modal.error')->with(['pages'=>'restaurant/add']);
        }
    }

    public function edit_restaurant($id)
    {
        return view('pages.restaurant.index')->with([
            'folder'=>'restaurant',
            'content'=>'edit',
            'row'=>RestaurantModel::edit_restaurant($id),
            'gallery'=>RestaurantModel::gallery_res($id)
        ]);
    }

    public function update_restaurant()
    {
        $query = RestaurantModel::update_restaurant();
        if($query == true)
        {
            return view('modal.success')->with(['pages'=>'']);
        }else {
            return view('modal.error')->with(['pages'=>'']);
        }
    }

    public function delete_galls()
    {
        $query = RestaurantModel::delete_galls();
        echo json_encode($query);
    }

    public function status()
    {
        $query = RestaurantModel::status();
        echo json_encode($query);
    }

    public function delete_restaurant()
    {
        $query = RestaurantModel::delete_restaurant();
        echo json_encode($query);
    }

    public function deleteAll()
    {
        $query = RestaurantModel::deleteAll();
        echo json_encode($query);
    }

    public function restaurant()
    {
        return view('pages.restaurant.index')->with([
            'folder'=>'restaurant',
            'content'=>'restaurant',
            'rows'=>RestaurantModel::restaurant()
        ]);
    }

    public function restaurant_detail($id)
    {
        return view('pages.restaurant.index')->with([
            'folder'=>'restaurant',
            'content'=>'detail',
            'row'=>RestaurantModel::restaurant_detail($id),
            'gallery'=>RestaurantModel::gallery_res($id)
        ]);
    }
}
