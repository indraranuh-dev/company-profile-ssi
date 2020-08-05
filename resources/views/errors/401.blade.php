@extends('errors::illustrated-layout')

@section('title', __('Unauthorized'))
@section('code')
<h2>401</h2>
@endsection

@section('message')
<h3 class="message">Maaf, kamu tidak memiliki akses. &#x1F61E;</h3>
@endsection
