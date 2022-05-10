@extends('layouts.app')

@section('title-block')Все сообщения@endsection

@section('content')
  <h1>Главная страница</h1>
  @foreach($data as $el)
    <div class="alert alert-info">
      <h3>{{ $el->subject }}</h3>
      <p>{{ $el->email }} - {{ $el->name }}</p>
      <p><small> {{ $el->created_at }} </small></p>
      <a href="{{ route('contact-data-details', $el->id )}}"><button class="btn btn-warning">Детальнее</button></a>
    </div>
  @endforeach
@endsection
