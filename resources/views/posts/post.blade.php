@extends('layouts.app')
@section('content')
 <div class="container">

  <h2>Valittu tuote:</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <!--<th>ID</th>-->
        <th>Nimi</th>
        <th>Kuvaus</th>
        <th>Määrä</th>
        <th>Kuka ja milloin lisäsi</th>
        @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <th>Muokkaa</th>
        @endif
        @endif
        

      </tr>
    </thead>
    <tbody>
      <tr>
        <!--<td> $post['id'] </td>-->
        <td>{{ $post->name }}</td>
        <td>{{ $post->content }}</td>
        <td>{{ $post->amount }}</td>
        <!--array_search($post,$posts)-->
        <th><small>{{ $post->user->name }} | {{ $post->created_at}}</small></th>
        @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
        <td><a href="/posts/{{ $post->id }}/edit">Edit</a></td>
        @endif
        @endif

      </tr>
          
    </tbody>
  </table>
<!-- <p>  $sess_key   </p> -->

@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)
<form action="/posts/{{ $post->id }}" method="POST">
<input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
  <input type="submit" value="DELETE">
</form>
@endif
@endif

  
</div>
@endsection