<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;

class FrontendController extends Controller
{
    public function __construct()
    {
        
    }

    public function index(){
        $setups = DB::table('setups')->first();
        $cats = DB::table('categories')->where('status','on')->get();
        $home = DB::table('contents')->where('category','home')->first();
        $about = DB::table('contents')->where('category','about us')->first();
        $about->slug = DB::table('categories')->where('title','about us')->value('slug');
        $services = DB::table('services')->where('status','on')->get();
        $services->slug = DB::table('categories')->where('title','services')->value('slug');
        $portifolio =DB::table('portifolios')->where('status','on')->get();
          foreach($portifolio as $port){
              $port->class = DB::table('portcats')->where('title',$port->category)->value('slug');
          }
        $portifolio->slug = DB::table('categories')->where('title','portifolio')->value('slug');
        $portcats = DB::table('portcats')->where('status','on')->get();
        $clients = DB::table('clients')->where('status','on')->get();
        $clients->slug = DB::table('categories')->where('title','client')->value('slug');
        $teams = DB::table('teams')->where('status','on')->get();
        $teams->slug = DB::table('categories')->where('title','team')->value('slug');
        return view ('frontend.index',[
            'setups' => $setups,
            'cats'   =>$cats,
            'home' =>$home,
            'about' =>$about,
            'services' =>$services,
            'portifolio' =>$portifolio,
            'portcats' =>$portcats,
            'clients' =>$clients,
            'teams' =>$teams,


            ]);
    }

    public function sendMessage(){
        /* sleep(2); */
        $data = $_GET;
        $data['created_at'] = date('Y-m-d H:i:s');
        DB::table('contacts')->insert($data);
        
        $output = 'Thank you for your message. We will contact you shortly. ';

        return response($output);
    }
}
