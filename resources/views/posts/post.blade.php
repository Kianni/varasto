@extends('layouts.app')
@section('content')
 <div class="container">

  <h2>Valittu tuote:</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nimi</th>
        <th>Kuvaus</th>
        <th>Muokkaa</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $post['id'] }}</td>
        <td>{{ $post['title'] }}</td>
        <td>{{ $post['content'] }}</td>
        <td><a href="/posts/edit/{{array_search($post,$posts)}}">Edit</a></td>
      </tr>
          
    </tbody>
  </table>
</div>
@endsection