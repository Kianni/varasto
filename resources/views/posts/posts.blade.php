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
        <th>Määrä</th>
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
        <td>{{ $post->amount }}</td>
        <!--<td>{{ json_encode($post) }}</td>-->
        <td><a href="/posts/{{ $post->id }}/edit">Edit</a></td>
      </tr>
      <!-- <small>Lisätty  $post->created_at, $post->user->name</small> -->

    @endforeach
          
    </tbody>
  </table>
  <a href='/posts/create'><button type="button" class="btn btn-info">Lisää tavara</button></a>
  
</div>
@endsection