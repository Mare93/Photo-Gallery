<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    function index(){
        $albums= Album::with('Photos')->get();
        return view('albums.index')->with('albums',$albums);
    }

 
    public function show($id){
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album', $album);
      }

    function create(){
        return view('albums.create');
    }

    function store(Request $request){
        $this->validate($request, [
            'name'=>'required',
            'cover_image'=>'image|max:8000',
        ]);

         //apload fajla
            //uzmi ime i extenziju
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //uzmi ime
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //uzmi extenziju
            $extension= $request->file('cover_image')->getClientOriginalExtension();
            //puno ime fajla (timestamp se koristi radi jedinstvenosti)
            $fileNameToStore = $filename.'_'.time().'.'.$extension; 
            //skladistenje fajla
            $path= $request->file('cover_image')->storeAs('public/album_covers', $fileNameToStore);
            //pravljenje Albuma
            $album =new Album();
            $album->name = $request->input('name');
            $album->description = $request->input('description');
            $album->cover_image = $fileNameToStore;
            $album->save();

           return redirect('/albums')->with('success', 'Album created');
    }


}
