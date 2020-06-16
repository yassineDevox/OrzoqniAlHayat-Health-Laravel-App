<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">Your title</label>

    <div class="col-md-6">
        <input class="form-control" name="title" id="title" type="text" value="{{old('title',$post->title ?? null)}}">
    </div>
</div>

<div class="form-group row">
    <label for="content" class="col-md-4 col-form-label text-md-right">Your content</label>
    <div class="col-md-6">
    <input class="form-control" name="content" id="content" type="text" value="{{old('content',$post->content ?? null)}}">
    </div>

</div>

<div class="form-group row">
    <label for="content" class="col-md-4 col-form-label text-md-right">Your Image</label>
    <div class="col-md-12 mb-2">
        <img id="image_preview_container" src="{{ asset('storage/image/image-preview.png') }}"
            alt="preview image" style="max-height: 150px;">
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <input type="file" name="image" placeholder="Choose image" id="image">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>

</div>

@if ($errors->any())


<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>    
    @endforeach
    
</ul>

@endif