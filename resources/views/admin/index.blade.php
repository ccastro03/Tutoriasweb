@extends('layouts.main')

@section('content')
  <div class="column is-12">
    <section class="hero is-info welcome is-small">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            Bienvenido, {{ Auth::user()->name }}.
          </h1>
        </div>
      </div>
    </section>
  </div>
@endsection