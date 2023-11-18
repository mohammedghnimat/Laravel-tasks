<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Faker\Core\File as FakerFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        return view('movies.index',['movies'=>$movies]);
    }
    public function create(){
        return view('movies.create');
    }
    public function store(Request $request){
          $data = $request->validate([
               'name'=>'required',
               'Description'=>'required',
               'gener'=>'required',
               'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
          ]);
          if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->storeAs('public/images',$imagename);
            $data['image']=$imagename;
          }
          $newmovie = Movie::create($data);
          return redirect(route('movie.index'));
    }
    public function edit(Movie $movie){
        return view('movies.edit',['movie'=>$movie]);
    }
    public function update(Movie $movie,Request $request){
        $data = $request->validate([
               'name'=>'required',
               'Description'=>'required',
               'gener'=>'required',
               'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
          ]);
           if($request->hasFile('image')){
            $destination_path ='public/images/'.$movie->image;
            if(File::exists($destination_path)){
                File::delete($destination_path);
            }
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imagename = time().'.'.$extension;
            $image->storeAs('public/images/',$imagename);
            $data['image'] = $imagename;
          }
        //  $movie = Movie::update($data);
        $movie->update($data);
         return redirect(route('movie.index'))->with('success','movie updated successfully');
    }
    public function delete(Movie $movie){
       $imagePath ='public/images/'.$movie->image;
                  if (Storage::disk('local')->exists($imagePath)) {
            // Delete the image from storage
            Storage::disk('local')->delete($imagePath);
        }
        $movie->delete();
       return redirect(route('movie.index'))->with('success','movie deleted successfully');
    }
}
