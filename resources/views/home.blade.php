@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <h1>Dashboard</h1>
            <div class="card">
                <div class="card-header">Météo</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="meteo">
                        <div class="city">
                            ,  <span class="temp"> °C</span>
                        </div>
                        
                        <div>
                            Humidité <span class="humidity"> </span> %
                        </div>
                        <div>
                            Pression <span class="pressure"></span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">Liste des photos</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    
                    <div class="posts">
                        @foreach ($posts as $post)
                        <li>
                            <a href="{{ url('/view_post/' . $post->id) }}">{{ $post->title }}</a>
                        </li>
                        @endforeach
                    </div>
                    <a href="{{ url('/new_post') }}">Nouvelle photo</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script
src="https://code.jquery.com/jquery-3.4.0.js"
integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
crossorigin="anonymous">
</script>
<script src="{{ URL::to('js/open_weather_map.js') }}"></script>
