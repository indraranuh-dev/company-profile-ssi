@extends('errors::minimal')

@section('title', __('Not Found'))
@section('content')
<h2>419</h2>
<h3>Maaf, halaman kadaluarsa.</h3>

<a href="{{route('index')}}">Kembali</a>
@endsection
