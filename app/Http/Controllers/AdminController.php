<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use session;

class AdminController extends Controller
{
    public function __construct()
    {

            $this->middleware('auth')->except(['sendMessage']);

    }

    public function admin(){
        return view('backend.index');
    }

    public function setups(){
        $data = DB::table('setups')->first();
        if(!empty($data)){
            $socials = explode(',',$data->social);
        }else{
            $socials = [];
        }

        return view('backend.insert.setup',['data' =>$data, 'socials' => $socials]);
    }

    public function categories(){
        $data = DB::table('categories')->where('status','on')->get();
        return view('backend.insert.category',['data'=>$data]);
    }

    public function editCategory($id){
        $data = DB::table('categories')->get();
        $maindata = DB::table('categories')->where('id',$id)->first();

        return view('backend.edit.category',['maindata'=>$maindata,'data' =>$data]);
    }

    public function deleteCategory($id){
        $data = DB::table('categories')->where('id',$id)->delete();

        return redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function newPost(){
        $cats = DB::table('categories')->where('status','on')->get();
        return view('backend.insert.newpost',['cats'=>$cats]);
    }

    public function allPosts(){
        $data = DB::table('contents')->get();
        return view('backend.display.posts',['data' =>$data]);
    }

    public function editPost($id){
        $cats = DB::table('categories')->where('status','on')->get();
        $data = DB::table('contents')->where('id',$id)->first();
        return view('backend.edit.editPost',['data' =>$data,'cats'=>$cats]);


    }

    public function deletePost($id){
        $data = DB::table('contents')->where('id',$id)->delete();

        return redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function newService(){
        $cats = DB::table('services')->where('status','on')->get();
        return view('backend.insert.newservice',['cats'=>$cats]);
    }

    public function allService(){
        $data = DB::table('services')->where('status','on')->get();
        return view('backend.display.allService',['data'=>$data]);
    }

    public function editService($id){
        $data = DB::table('services')->where('id',$id)->first();
        return view('backend.edit.editService',['data'=>$data]);
    }

    public function deleteService($id){
        $data = DB::table('services')->where('id',$id)->delete();
        return redirect()->back()->with('message','Data deleted successfully.');
    }

    public function portcats(){
        $data = DB::table('portcats')->get();
        return view('backend.insert.portifolio-category',['data'=>$data]);

    }

    public function editPortcat($id){
        $data = DB::table('portcats')->where('id',$id)->first();
        return view('backend.edit.editPortcat',['data' =>$data]);
    }

    public function deletePortcat($id){
        $data = DB::table('portcats')->where('id',$id)->delete();
        return redirect()->back()->with('message','Data deleted successfully.');
    }


    public function allPortifolio(){
        $data = DB::table('portifolios')->get();
        return view('backend.display.all-portifolio',['data'=>$data]);

    }

    public function newPortifolio(){
        $cats = DB::table('portcats')->where('status','on')->get();
        return view('backend.insert.portifolio',['cats'=>$cats]);
    }

    public function editPc($id){
        $portifolios = DB::table('portcats')->where('status','on')->get();
        $maindata = DB::table('portifolios')->where('id',$id)->first();

        return view('backend.edit.editPortifolio',['maindata'=>$maindata,'portifolios' =>$portifolios]);
    }

    public function deletePc($id){
        $data = DB::table('portifolios')->where('id',$id)->delete();

        return redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function clients(){
        $data = DB::table('clients')->where('status','on')->get();
        return view('backend.insert.client',['data'=>$data]);
    }

    public function editClient($id){
        $data = DB::table('clients')->where('id',$id)->first();
        return view('backend.edit.editClient',['data'=>$data]);
    }

    public function deleteClient($id){
        $data = DB::table('clients')->where('id',$id)->delete();

        return redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function newMember(){
        return view('backend.insert.team');
    }

    public function allMembers(){
        $data = DB::table('teams')->get();
        return view('backend.display.allmembers',['data'=>$data]);
    }

    public function editMember($id){
        $maindata = DB::table('teams')->where('id',$id)->first();
        return view('backend.edit.editTeam',['maindata' =>$maindata]);
    }

    public function deleteMember($id){
        $data = DB::table('teams')->where('id',$id)->delete();
        return redirect()->back()->with('message','Data deleted successfully');
    }
}



