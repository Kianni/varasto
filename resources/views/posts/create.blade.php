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
 
<form action="/posts" method="POST">
  {{ csrf_field() }}
  
  <!-- <div class="form-group">
    <label for="id">ID:</label>
    <input type="text" class="form-control" placeholder="anna tuotteen id" name="id" id="id">
  </div> -->
  <div class="form-group">
    <label for="title">Nimi:</label>
    <input type="text" class="form-control" placeholder="anna tuotteen nimi" name="name" id="title">
  </div>
  <div class="form-group">
    <label for="desc">Kuvaus:</label>
    <input type="text" class="form-control" placeholder="anna tuotteen kuvaus" name="content" id="desc">
  </div>
  
  <button type="submit" class="btn btn-primary">Lähetä</button>
</form>
@endsection