@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@if (Auth::check())
			<a href="{{ url('/home') }}">Retour</a>
			@else
			<a href="{{ url('/') }}">Retour</a>
			@endif
			@foreach ($posts as $post)
			<a href="{{ url('/view_post/' . $post->id) }}"><h2>{{ $post->title }}</h2></a>
			<img src="{{url('images/'.$post->filename)}}">
			<p>{{ $post->description }}</p>
			@endforeach
		</div>
	</div>
</div>
@endsection

