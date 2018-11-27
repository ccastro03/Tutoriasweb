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
    <section class="info-tiles">
      <div class="tile is-ancestor has-text-centered">
      </div>
    </section>
  </div>
@endsection