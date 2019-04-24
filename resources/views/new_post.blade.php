@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<a href=" {{ url('/home') }} ">Retour</a>
			<form method="POST" action="/save_post" enctype="multipart/form-data">
				{{csrf_field()}}
				@method('POST')
				<label for="title">Titre</label>
				<input type="text" name="title">
				<br>
				<label for="description">Texte</label>
				<textarea name="description">
				</textarea>
				<br>
				<label for="image">Phoo</label>
				<input type="file" id="image" name="image">
				
				<br>
				<input type="submit" value="envoyer">
			</form>
		</div>
	</div>
</div>
@endsection

