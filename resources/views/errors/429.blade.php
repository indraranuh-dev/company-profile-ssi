@extends('errors::illustrated-layout')

@section('title', __('Too Many Requests'))
@section('code')
<h2>429</h2>
@endsection

@section('message')
<h3 class="message">Maaf, terlalu banyak permintan. &#x1F61E;</h3>
@endsection
