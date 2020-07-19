@extends('errors::minimal')

@section('title', __('Not Found'))
@section('content')
<h2>5<span class="emoji">&#x1F61E;</span>3</h2>
<h3>{{__($exception->getMessage() ?: 'Servis tidak tersedia')}}</h3>

<a href="{{route('index')}}">Kembali</a>
@endsection
