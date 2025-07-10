@extends('layouts.app')

@section('title', 'Dian Gita Meilani - Fullstack Engineer Portfolio')

@section('content')
    @include('portfolio.home', ['data' => $data])
    @include('portfolio.about', ['data' => $data])
    @include('portfolio.education', ['data' => $data])
    @include('portfolio.project', ['data' => $data])
    @include('portfolio.skill', ['data' => $data])
    @include('portfolio.contact', ['data' => $data])
@endsection
