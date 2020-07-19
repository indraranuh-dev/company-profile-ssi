@extends('errors::minimal')

@section('title', __('Not Found'))
@section('content')
<h2>4<span class="emoji">&#x1F61E;</span>3</h2>
<h3>Maaf, kmau tidak memiliki akses ke halaman ini.</h3>

<a href="{{route('index')}}">Kembali</a>
@endsection
