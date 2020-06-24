<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Image;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts=Post::with(['image'])->get();

        $posts=Post::with(['image'])->orderBy('created_at', 'desc')->get();

        return view('posts.index',[
            'posts'=>$posts
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        $data = $request->all();


        $image= new Image();

        
        $file= $request->file('imgName');
            
        $name ="image-".time().'.'.$file->getClientOriginalExtension();
        $file->move('posts-img', $name);
        $image->imgName=$name;
            
        $image->save();
            
        $data['image_id']=$image->id;

        Post::create($data);
        

        // return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('posts.show',[
            'post'=> Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);

        $image=Image::where('id',$post->image_id)->first();
        return view('posts.edit',[
            'post'=>$post,
            'image'=>$image,    
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        $post=Post::findOrFail ($id);

        $post->title=$request->input('title');
        $post->body=$request->input('body');

        if($request->hasFile('imgName')){
            
            $originalImage=Image::where('id',$post->image_id)->first();

            $image=new Image();
            $image_path = "posts-img/$originalImage->imgName"; 

            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $file= $request->file('imgName');
            
            $name ="image-".time().'.'.$file->getClientOriginalExtension();
            $file->move('posts-img', $name);
            $image->imgName=$name;
            $post->image_id=$image->id;
            Image::destroy($originalImage->id);

            
            $image->save();
            
        }
        else
        echo "no file";
        $post->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $image=Image::where('post_id',$id)->first();

        Image::destroy($image->id);
        Post::destroy($id);

        return redirect()->route('admin.posts.index');
    }
}
