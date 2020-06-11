@extends('layouts.app')
@section('content')
 <div class="container">

  <h4>Lista varaston tavaroista:</h4>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nimi</th>
        <th>Kuvaus</th>
        <!--<th>JSON</th>-->
        <th>Muokkaa</th>

      </tr>
    </thead>
    <tbody>
     @foreach($posts as $post)

      <tr>
        <!--до изменений из-за ДБ было так-->
        <td>{{ $post->id }}</td>
        
        <!--array_search($post,$posts)-->
        <td><a href="/posts/{{ $post->id }}">{{ $post->name }}<a/></td>
        
        <td>{{ $post->content }}</td>
        <!--<td>{{ json_encode($post) }}</td>-->
        <td><a href="/posts/{{ $post->id }}/edit">Edit</a></td>
      </tr>
    @endforeach
          
    </tbody>
  </table>
  <a href='/posts/create'><button type="button" class="btn btn-secondary">Lisää tavara</button></a>
  
</div>
@endsection