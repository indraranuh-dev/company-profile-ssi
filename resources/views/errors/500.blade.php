@extends('errors::illustrated-layout')

@section('title', __('Internal Server Error'))
@section('code')
<h2>500</h2>
@endsection

@section('message')
<h3 class="message">Upss, ada yang salah dengan server kami. &#x1F61E;</h3>
@endsection
