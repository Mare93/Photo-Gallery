<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
 public function create($album_id){
   return view('photos.create')->with('album_id', $album_id);
 }
 
  public function store(Request $request){
    $this->validate($request, [
        'title'=>'required',
        'photo'=>'image|max:8000',
    ]);

     //apload fajla
        //uzmi ime i extenziju
        $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        //uzmi ime
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //uzmi extenziju
        $extension= $request->file('photo')->getClientOriginalExtension();
        //puno ime fajla (timestamp se koristi radi jedinstvenosti)
        $fileNameToStore = $filename.'_'.time().'.'.$extension; 
        //skladistenje fajla
        $path= $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $fileNameToStore);

      // apload slike u bazu
      $photo = new Photo;
      $photo->album_id = $request->input('album_id');
      $photo->title = $request->input('title');
      $photo->description = $request->input('description');
      $photo->size = $request->file('photo')->getClientSize();
      $photo->filename = $fileNameToStore;

      $photo->save();



      return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }

  public function show($id){
    $photo=Photo::find($id);
    return view('photos.show')->with('photo',$photo);

  }

  public function destroy($id){
    $photo = Photo::find($id);

    Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo);
    $photo->delete();

    return redirect('/')->with('success', 'Photo Deleted');
  }
}