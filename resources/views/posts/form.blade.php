<div class="form-group row">
    <label for="title" class="col-md-4 col-form-label text-md-right">Your title</label>
    <div class="col-md-6">
        <input class="form-control" name="title" id="title" type="text" value="{{old('title',$post->title ?? null)}}">
    </div>
</div>

<div class="form-group row">
    <label for="body" class="col-md-4 col-form-label text-md-right">Your content</label>
    <div class="col-md-6">
    <textarea class="form-control" name="body" id="body" type="text" value="{{old('body',$post->body ?? null)}}"></textarea>
    </div>

</div>
<div class="form-group row">
    <label for="imgName" class="col-md-4 col-form-label text-md-right">Your Image</label>
    <div class="col-md-6">
        <input class="form-control" type="file" name="imgName" id="imgName">
    </div>
</div>

@if ($errors->any())


<ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>    
    @endforeach
    
</ul>

@endif