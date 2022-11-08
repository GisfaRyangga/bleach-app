@extends('layout/main')

@section('container')

    <img src="img/ichigo.jpg" alt="ichigo" width="450" class="rounded">
    <br><br>
    <h2 class="display-8">Kurosaki Ichigo</h2>
    <p class="lead mx-5 mt-3">{{ $desc }}</p>

@endsection

@extends('partial/backhome')
