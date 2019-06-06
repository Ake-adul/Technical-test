<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class RestaurantModel extends Model
{
    //----------------------------- Admin -----------------------------------------
    public static function get_restaurant()
    {
        if(Input::get('keyword') != '')
        {
            return DB::table('tb_restaurant')
            ->where('restaurant_name','like',Input::get('keyword').'%')
            ->orWhere('restaurant_address','like','%'.Input::get('keyword').'%')
            ->get();
        }
        return DB::table('tb_restaurant')->get();
    }

    public static function insert_restaurant()
    {
        $id = DB::table('tb_restaurant')->insertGetId([
            'restaurant_name'=>Input::get('restaurant_name'),
            'restaurant_star'=>Input::get('restaurant_star'),
            'restaurant_detail'=>Input::get('restaurant_detail'),
            'restaurant_open'=>Input::get('restaurant_open'),
            'restaurant_close'=>Input::get('restaurant_close'),
            'restaurant_tel'=>Input::get('restaurant_tel'),
            'restaurant_address'=>Input::get('restaurant_address'),
            'restaurant_map'=>Input::get('restaurant_map'),
            'restaurant_status'=>1,
            'restaurant_create'=>date('Y-m-d H:i:s')
        ]);

        $filename = 'res_'.date('dmY-His');
        $file = Input::file('restaurant_images');
        if($file)
        {
            $ext = $file->extension();
            $newfile = 'upload/restaurant/cover/'.$filename.'.'.$ext;
            $image = Image::make($file->getRealPath());
            $image->save(public_path($newfile));
            DB::table('tb_restaurant')->where('restaurant_id',$id)->update(['restaurant_images'=>$newfile]);
        }

        $gallname = 'gallery_'.date('dmY-His');
        $galls = Input::file('gallery_image');
        if(isset($galls)>0)
        {
            for($i=0; $i<count($galls); $i++)
            {
                $ext = $galls[$i]->extension();
                $newfile = 'upload/restaurant/gallery/'.$gallname.'_'.$i.'.'.$ext;
                $image = Image::make($galls[$i]->getRealPath());
                $image->save(public_path($newfile));
                DB::table('tb_gallery')->insert([
                    'gallery_image'=>$newfile,
                    'gallery_date'=>date('Y-m-d H:i:s'),
                    'restaurant_id'=>$id
                ]);
            }
        }

        if($id)
        {
            return true;
        }else {
            return false;
        }
    }

    public static function edit_restaurant($id)
    {
        return DB::table('tb_restaurant')->where('restaurant_id',$id)->first();
    }

    public static function gallery_res($id)
    {
        return DB::table('tb_gallery')->where('restaurant_id',$id)->get();
    }

    public static function update_restaurant()
    {
        $filename = 'res_'.date('dmY-His');
        $file = Input::file('restaurant_images');
        if($file)
        {
            $ext = $file->extension();
            $newfile = 'upload/restaurant/cover/'.$filename.'.'.$ext;
            $image = Image::make($file->getRealPath());
            $image->save(public_path($newfile));
            DB::table('tb_restaurant')->where('restaurant_id',Input::get('id'))->update(['restaurant_images'=>$newfile]);
        }

        $gallname = 'gallery_'.date('dmY-His');
        $galls = Input::file('gallery_image');
        if(isset($galls)>0)
        {
            for($i=0; $i<count($galls); $i++)
            {
                $ext = $galls[$i]->extension();
                $newfile = 'upload/restaurant/gallery/'.$gallname.'_'.$i.'.'.$ext;
                $image = Image::make($galls[$i]->getRealPath());
                $image->save(public_path($newfile));
                DB::table('tb_gallery')->insert([
                    'gallery_image'=>$newfile,
                    'gallery_date'=>date('Y-m-d H:i:s'),
                    'restaurant_id'=>Input::get('id')
                ]);
            }
        }

        return DB::table('tb_restaurant')->where('restaurant_id',Input::get('id'))->update([
            'restaurant_name'=>Input::get('restaurant_name'),
            'restaurant_star'=>Input::get('restaurant_star'),
            'restaurant_detail'=>Input::get('restaurant_detail'),
            'restaurant_open'=>Input::get('restaurant_open'),
            'restaurant_close'=>Input::get('restaurant_close'),
            'restaurant_tel'=>Input::get('restaurant_tel'),
            'restaurant_address'=>Input::get('restaurant_address'),
            'restaurant_map'=>Input::get('restaurant_map'),
            'restaurant_update'=>date('Y-m-d H:i:s')
        ]);
    }

    public static function delete_galls()
    {
        $gallery = DB::table('tb_gallery')->where('gallery_id',Input::get('id'))->first();
        @unlink(public_path($gallery->gallery_image));
        return DB::table('tb_gallery')->where('gallery_id',Input::get('id'))->delete();
    }

    public static function status()
    {
        $get = RestaurantModel::edit_restaurant(Input::get('id'));
        if($get->restaurant_status != 1)
        {
            return DB::table('tb_restaurant')->where('restaurant_id',Input::get('id'))->update(['restaurant_status'=>1]);
        }else {
            return DB::table('tb_restaurant')->where('restaurant_id',Input::get('id'))->update(['restaurant_status'=>null]);
        }
    }

    public static function delete_restaurant()
    {
        $get = RestaurantModel::edit_restaurant(Input::get('id'));
        if($get->restaurant_images)
        {
            @unlink(public_path($get->restaurant_images));
        }
        $galls = RestaurantModel::gallery_res(Input::get('id'));
        if(count($galls)>0)
        {
            foreach($galls as $gall)
            {
                @unlink(public_path($gall->gallery_image));
            }
        }
        DB::table('tb_gallery')->where('restaurant_id',Input::get('id'))->delete();
        return DB::table('tb_restaurant')->where('restaurant_id',Input::get('id'))->delete();
    }

    public static function deleteAll()
    {
        $id = Input::get('id');
        for($i=0; $i<count($id); $i++)
        {
            $get = RestaurantModel::edit_restaurant($id[$i]);
            if($get->restaurant_images)
            {
                @unlink(public_path($get->restaurant_images));
            }
            $galls = RestaurantModel::gallery_res($id[$i]);
            if(count($galls)>0)
            {
                foreach($galls as $gall)
                {
                    @unlink(public_path($gall->gallery_image));
                }
            }
            DB::table('tb_gallery')->where('restaurant_id',$id[$i])->delete();
            $query[$i] = DB::table('tb_restaurant')->where('restaurant_id',$id[$i])->delete();
        }
        return $query;
    }

    //-------------------------End Admin------------------------------------------------


    //-------------------------User-----------------------------------------------------
    public static function restaurant()
    {
        if(Input::get('keyword') != '')
        {
            return DB::table('tb_restaurant')
            ->where('restaurant_name','like',Input::get('keyword').'%')
            ->orWhere('restaurant_address','like','%'.Input::get('keyword').'%')
            ->where('restaurant_status',1)
            ->orderBy('restaurant_name')
            ->get();
        }else {
            return DB::table('tb_restaurant')
            ->where('restaurant_status',1)
            ->orderBy('restaurant_name')
            ->get();
        }
    }

    public static function restaurant_detail($id)
    {
        return RestaurantModel::edit_restaurant($id);
    }

    //------------------------End User---------------------------------------------------
}
