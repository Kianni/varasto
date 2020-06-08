@extends('layouts.app')
@section('content')
@if (count($errors->all())>0)
  <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif
 
<form action="/posts/edit" method="POST">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="id">ID:</label>
    <input type="text" class="form-control" placeholder="{{ $post['id'] }}" value="{{ $post['id'] }}" name="id" id="id">
    <input type="hidden" name="placeNumberInArray" value="{{ $postId }}">
  </div>
  <div class="form-group">
    <label for="title">Nimi:</label>
    <input type="text" class="form-control" placeholder="{{ $post['title'] }}" value="{{ $post['title'] }}" name="title" id="title">
  </div>
  <div class="form-group">
    <label for="desc">Kuvaus:</label>
    <input type="text" class="form-control" placeholder="{{$post['content']}}" value="{{$post['content']}}" name="content" id="desc">
  </div>
  
  <button type="submit" class="btn btn-primary">Lähetä</button>
</form>
@endsection