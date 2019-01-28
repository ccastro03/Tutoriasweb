@extends('layouts.app')

@section('content')
  <section class="hero hero.is-success" >
    <div class="hero-body" style="margin-top: -50px;">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
            <h3 class="title has-text-grey">Login</h3>
            <p class="subtitle has-text-grey">Inicie sesión para empezar.</p>
            <!-- Login Box-->
            <div class="box">
              <figure class="avatar">
                <img src="https://placehold.it/128x128">
              </figure>
              <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="field">
                    <div class="control">
                      <input class="input {{ $errors->has('email') ? ' is-danger' : '' }}" type="text" name="email" placeholder="Usuario" autofocus="">
                      @if ($errors->has('email'))
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                      @endif
                    </div>
                  </div>
                  <div class="field">
                    <div class="control">
                      <input class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" name="password" placeholder="Contraseña">
                      @if ($errors->has('password'))
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                      @endif
                    </div>
                  </div>
                  <button class="button is-block is-info is-large is-fullwidth">Iniciar sesión</button>
              </form>
            </div>
        </div>
      </div>
    </div>
  </section>
@endsection
