@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<a href=" {{ url('/home') }} ">Retour</a>

			@empty($post)
			<h1>Nouvelle photo</h1>
			<form method="POST" action="/save_post" enctype="multipart/form-data">
				{{csrf_field()}}
				@method('POST')
				<label for="title">Titre</label>
				<input type="text" name="title">
				<br>
				<label for="description">Description</label>
				<textarea name="description"></textarea>
				<br>
				<label for="image">Photo</label>
				<input type="file" id="image" name="image">
				<br>
				<input type="submit" value="envoyer">
			</form>
			@endempty
			@isset($post)
			<h1>Editer photo</h1>
			<form method="POST" action="/save_post" enctype="multipart/form-data">
				{{csrf_field()}}
				@method('POST')
				<input type="hidden" name="id" value="{{ $post->id }}">
				<label>Titre
					<input type="text" name="title" value="{{ $post->title }}">
				</label> <br>
				<label>Texte
					<textarea name="description">
						{{ $post->description }}
					</textarea>
				</label> <br>
				<label>Photo
					<input type="file" id="image" name="image">
				</label>
				<br>
				<input type="submit" value="envoyer">
			</form>
			@endisset
		</div>
	</div>
</div>
@endsection