<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Image;
use App\Post;
use Illuminate\Http\Request;

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

        $images=Image::with(['post'])->get();

        return view('posts.index',[
            // 'posts'=> $posts,
            'images'=>$images
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
        $post= new Post();
        $data = $request->all();

        $post = Post::create($data);

        $image= new Image();

        if($request->hasFile('imgName')){
            $file= $request->file('imgName');
            
            $name ="image-".time().'.'.$file->getClientOriginalExtension();
            $file->move('posts-img', $name);
            $image->imgName=$name;
            $image->post_id=$post->id;
            
            $image->save();
            
        }
        else
        echo "no file found";

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
        return view('posts.edit',[
            'post'=>$post
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

        $fileName =  "image-".time().'.'.$request->image->getClientOriginalExtension();
        $request->image->storeAs('image', $fileName);
            
        $image = new Image();
        $image->name = $fileName;
        $image->save();

        $post->image_id=$image->id;

        $post->save();

        $request->session()->flash('status','Post was updated!');

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
        $imageId=Image::where('post_id','=',$id);
        Image::destroy($imageId);
        Post::destroy($id);

        return redirect()->route('admin.posts.index');
    }
}
