@extends('errors::illustrated-layout')

@section('title', __('Service Unavailable'))
@section('code')
<h2>503</h2>
@endsection

@section('message')
<h3 class="message">Upss, server saat ini tidak tersedia. </h3>
@endsection
