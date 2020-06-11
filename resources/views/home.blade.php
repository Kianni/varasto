@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href='/posts/create'><button type="button" class="btn btn-info">Lisää tavara</button></a>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nimi</th>
                                <th>Kuvaus</th>
                                <th>Määrä</th>
                                <th>Muokkaa</th>
                                <th>Poista</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="/posts/{{ $post->id }}">{{ $post->name }}<a/></td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->amount }}</td>
                                <td><a href="/posts/{{ $post->id }}/edit">Edit</a></td>
                                <td><a href="/posts/{{ $post->id }}">Delete</td>
                            </tr>
                        @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
