@extends('errors::minimal')

@section('title', __('Not Found'))
@section('content')
<h2>429</h2>
<h3>Maaf, terlalu banyak permintaan.</h3>

<a href="{{route('index')}}">Kembali</a>
@endsection
