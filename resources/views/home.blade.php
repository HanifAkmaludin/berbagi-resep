@extends('templates.template')

@section('title', "Home")
@section('content')
    @include('components.navbar')
    @include('components.hero')
    @include('components.resep')
    @include('components.comment')
    @include('components.footer')
@endsection