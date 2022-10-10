<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input as InputInput;

class CrudController extends Controller
{
    public function insertData(){
        $data = Input::except('_token','submit');
    	$tbl = decrypt($data['tbl']);
        unset ($data['tbl']);

        if(Input::has('social')){
            $data['social'] = implode('',$data['social']);
        }

        if (!empty($data['image'])){
            if(Input::hasFile('image')){
                $data['image'] = $this->upload($data['image'], $tbl);
            }
        }

        if(Input::has('title')){
            $data['slug'] =$this->slug($data['title']);
        }


    	$data['created_at'] = date('Y-m-d H:i:s');
    	DB::table($tbl)->insert($data);
        
    	Session::flash('message','Data inserted successfully!!!');
        return redirect()->back();
    }

    public function updateData(){
        $data = Input::except('_token','submit');
    	$tbl = decrypt($data['tbl']);
        unset ($data['tbl']);

        if(Input::has('social')){
            $data['social'] = implode('',$data['social']);
        } 

        if (!empty($data['image'])){
            if(Input::hasFile('image')){
                $data['image'] = $this->upload($data['image'], $tbl);
            }
        }

        if(Input::has('title')){
            $data['slug'] =$this->slug($data['title']);
        }


    	$data['updated_at'] = date('Y-m-d H:i:s');
    	DB::table($tbl)->where(key($data),reset($data))->update($data);
    	session::flash('message','Data updated successfully!!!');
        return redirect()->back();
    }

    private function slug($string){
        $string = strtolower(trim($string));
        $string = preg_replace('/\s+/','-',$string);
        $string = preg_replace('/[^a-z0-9]/','-',$string);
        $string = preg_replace('/-+/','-',$string);
        return rtrim($string,'-');

    }

    private function upload($image,$tbl){
        /*  $name = $image->getClientOriginalName();
         $file= $image->getRealPath();
         $original_file = $file;
        $newName = date('ymdigs').$name;
        $destinationPath = storage_path('/thumbnail'.$tbl,$newName.'/');
        if (!Storage::exists($destinationPath)) {
            Storage::makeDirectory($destinationPath, 0775, true, true);
            $location =storage_path('/thumbnail'.$tbl,$newName.'/');
            $resize_image = Image::make($original_file);

            $resize_image->fit(350, 260, function($constraint){
             $constraint->aspectRatio();
            })->resizeCanvas(350, 260)->save($location);
        }


        $image->move($destinationPath.$tbl,$newName);
        return $newName; */
        $name = $image->getClientOriginalName();
        $newName = date('ymdgis').$name;
        $image->move(public_path().'/'.$tbl,$newName);
        return $newName;

/*
           $image = $request->file('image');

           $image_name = time() . '.' . $image->getClientOriginalExtension();

           $destinationPath = public_path('/thumbnail');

           $resize_image = Image::make($image->getRealPath());

           $resize_image->resize(150, 150, function($constraint){
            $constraint->aspectRatio();
           })->save($destinationPath . '/' . $image_name);

           $destinationPath = public_path('/images');

           $image->move($destinationPath, $image_name);
 */
    }
}
