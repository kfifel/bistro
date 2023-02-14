@extends('layout')

@section('title', 'home page')

@section('content')
    <div class="container text-lg">
        <h1>Welcome to our website!</h1>
        <p>Here you can find all the information you need about our products and services. Browse our catalog and place your order today!</p>
        <a href="/catalog" class="btn btn-primary">View Catalog</a>
    </div>
@endsection
