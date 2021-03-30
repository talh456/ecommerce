<?php

namespace App\Http\Controllers;

use Session;
use App\Image;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function addcategory()
    {
        return view('admin.add_categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(CategoryRequest $request)
    {
        //
        $validated = $request->validated();
        $category = new Category;
        $photo = new Image(); 

        $category->title = $request->input('title');
        $category->description = $request->input('description');
        $category->save();

        

        if($request->hasFile('category_image'))
        {
            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/category_image/',$filename);
            $photo->image = $filename;
            $photo->type = "master";
            $category->images()->save($photo);
        }

        Session::flash('status','Category added successfully');
        return redirect('categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
 
       $data = Category::all();
       //$images = Image::all();
       return view('admin.categories',["data"=>$data]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Category::find($id);
        return view('admin.category_edit',['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category = Category::find($request->input("id"));
        
        
        $photo = new Image;

       $imagename = Image::where('type', 'master')->where('imageable_id', $request->input("id"))->get();
       
        foreach($imagename as $data)
        {
         $path =  $data->image;
        }

         $image_path = "uploads/category_image/".$path;

        if(File::exists($image_path)) {

       $imagename = Image::where('type', 'master')->where('imageable_id', $request->input("id"))->delete();
       unlink($image_path);
           
        }
     
        
         if($request->hasFile('category_image'))
         {
             $file = $request->file('category_image');
             $extension = $file->getClientOriginalExtension();
             $filename = mt_rand(100000, 999999).'.'.$extension;
             $file->move('uploads/category_image/',$filename);
             $photo->image = $filename;
             $photo->type = "master";
             $category->images()->save($photo);
         }

         $category->title = $request->input('title');
         $category->description = $request->input('description');
         $category->save();


         
         Session::flash('status','Data updated successfully');
         return redirect('categories');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $photo = new Image;

        $imagename = Image::where('type', 'master')->where('imageable_type','App\Category')->where('imageable_id', $id)->get();
        foreach($imagename as $data)
        {
         $path =  $data->image;
        }
         $image_path = "uploads/category_image/".$path;

         if(File::exists($image_path)) {

            $imagename = Image::where('type', 'master')->where('imageable_type','App\Category')->where('imageable_id', $id)->delete();
            
            unlink($image_path);
                
             }


        Category::find($id)->delete();
        Session::flash('status','Data deleted successfully');
        return redirect('categories');
    }

    public function multipleImages($id)
    {
        $data = Category::find($id);
        return view('admin.categories_add_images',['data'=>$data]);
    }

    public function categoryMultipleImages(Request $request)
    {
       
        $cateogry = Category::find($request->id);

        
        foreach($request->file as $file)
        {
           // $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/category_images_multiple/'.$filename);
            $fileModel = new Image;
            $fileModel->image = $filename;
            $fileModel->type = "Child";
            $images[] = $fileModel;            
 
        }

        $cateogry->images()->saveMany($images);

        Session::flash('status','Image Added successfully');
        return redirect('categories');
    }
}
