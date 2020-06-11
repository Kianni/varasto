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
        <th>Muokkaa</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <!--<td> $post['id'] </td>-->
        <td>{{ $post->name }}</td>
        <td>{{ $post->content }}</td>
        <!--array_search($post,$posts)-->
        <td><a href="/posts/{{ $post->id }}/edit">Edit</a></td>
      </tr>
          
    </tbody>
  </table>

<form action="/posts/{{ $post->id }}" method="POST">
<input name="_method" type="hidden" value="DELETE">
    {{ csrf_field() }}
  <input type="submit" value="DELETE">
</form>

  
</div>
@endsection