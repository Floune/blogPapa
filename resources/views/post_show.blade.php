@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		@if (Auth::check())
		<a href="{{ url('/home') }}">Retour</a>
		@else
		<a href="{{ url('/posts') }}">Retour</a>
		@endif
	</div>
	<div class="row justify-content-center">

		<div class="card">

			<div class="card-header"><h1>{{ $post->title }}</h1></div>
			@if (Auth::check())
			<form action="{{ route('edit_post', $post->id)}}" method="get">
				@csrf
				<button class="btn btn-success" type="submit">Editer</button>
			</form>
			<form action="{{ route('delete_post', $post->id)}}" method="post">
				@csrf
				@method('DELETE')
				<button class="btn btn-danger" type="submit">Supprimer</button>
			</form>
			@endif
			<div class="card-body">
				<img class="card-img-top" src="{{url('images/'.$post->filename)}}" alt="{{$post->filename}}">
				<div>
					<p>{{ $post->description }}</p>
				</div>
			</div>
		</div>
	</div>
	
	<h3>Commentaires</h3>
	@foreach ($comments as $comment)
	<div>
		posté par
		<h4>{{$comment->pseudo}}</h4>
		<p>{{$comment->body}}</p>
	</div>
	@endforeach

	<div class="row justify-content-center">

		<div class="comment card">
			<form method="POST" action="{{url('/save_comment/' . $post->id)}}">
				{{csrf_field()}}
				@method('POST')
				<h3>Commentaire</h3>
				<label for="pseudo">Nom</label>
				<input type="text" name="pseudo">
				<br>
				<label for="body">commentaire</label>
				<textarea name="body">

				</textarea>
				<input type="hidden" name="id" value="{{ $post->id }}">
				<input type="submit" value="envoyer">
			</form>
		</div>
	</div>
</div>
@endsection