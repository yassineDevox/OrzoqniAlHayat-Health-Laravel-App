@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <a class="btn btn-success float-left" href="{{route('admin.posts.create')}}" >Add Post</a>

        <div class="col-lg-12">
            <ul class="list-group"> 
                @forelse ($posts as $post)
                <div class="gallery">
                    <div class="mb-3 pics animation all">
                    <h3>{{$post->title}}</h3>
                      <img usemap="{{route('admin.posts.index')}}" src="{{asset('posts-img/'.$post->image->imgName)}}" width="600" height="400"> 
                    <div class="desc">
                        <p class="ArticleBody">{{ substr(strip_tags($post->body), 0, 500) }}
                            {{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }} 
                        </p>
                        <a href="{{route('admin.posts.show',['post'=>$post->id])}}">Read More ...</a>
                    </div>
                    
                    {{-- <form style="display: inline" method="POST" action="{{route('admin.posts.destroy',['post'=>$post->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-success col-md-6" type="button">
                        <a style="color: white" href="{{route('admin.posts.edit',['post'=>$post->id])}}">Edit</a>
                        </button>
                        <button class="btn btn-danger float-right col-md-6" type="submit">Delete</button>
                    </form>    --}}
                  </div>
                </div>
                @empty
                <span class="badge badge-secondary"><h1>NO POSTS YET</h1></span>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection