@extends('errors::minimal')

@section('title', __('Not Found'))
@section('content')
<h2>5<span class="emoji">&#x1F61E;</span>0</h2>
<h3>Upss, ada yang salah dengan server.</h3>

<a href="{{route('index')}}">Kembali</a>
@endsection
