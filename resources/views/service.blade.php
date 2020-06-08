@extends('layouts.app')
@section('content')
 <h1>We can do anything, dear Kirill!</h1>
 <h4>Choosed service: {{ $services[0]}}</h4>
 <h4>List of services:</h4> 
    <ul>
        @foreach($services as $service)
        <li>{{ $service }}</li>
        @endforeach
    </ul>
    
 
 <h4>Amount of services: {{ count($services) }}</h4>
@endsection