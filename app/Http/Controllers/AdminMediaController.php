<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    //

    public function index(){

        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }
    public function create(){
        return view('admin.media.create');
    }
    public function store(Request $request){

        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images',$name);
        Photo::create(['file'=>$name]); 
        Session::flash('media_alert','The photos are added!!');


    }
    public function show(){

    }



    public function destroy($id){

        $photo = Photo::findOrFail($id);
        unlink(public_path() . $photo->file);
        $photo->delete();
        Session::flash('media_alert','The photo was deleted!!');
        return redirect('admin/media');
     


    }
}
