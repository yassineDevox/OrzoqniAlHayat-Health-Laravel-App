@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <a class="btn btn-success float-right" href="{{route('admin.posts.create')}}" >+ Add Post</a>

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
                        <a style="color: rgb(187, 22, 22);font-family: fantasy; font-size: medium" href="{{route('admin.posts.show',['post'=>$post->id])}}">Read More ...</a>
                    </div>
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