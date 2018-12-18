@extends('layouts.main')

@section('content')
<!-- <div class="column is-12">
	<div class="columns">
		<div class="column is-12">
			<section class="hero is-info is-small">
				<div class="hero-body">
					<div class="container">
						<h1 class="title">
							Bienvenido, {{ Auth::user()->name }}.
						</h1>
					</div>
				</div>
			</section>
		</div>
	</div>
</div> 


-->
<div class="tile is-ancestor">
	<div class="tile is-vertical is-7">
		<div class="tile is-parent">
			<div class="tile is-child notification is-info">
				<label class="title">Bienvenido, {{ Auth::user()->name }}</label>
			</div>
		</div>
		
		<div class="tile is-parent">
			<div class="tile is-parent is-vertical">
				<article class="tile is-child notification is-primary">
					<p class="title">Vertical...</p>
					<p class="subtitle">Top tile</p>
				</article>
				<article class="tile is-child notification is-primary">
					<p class="title">...tiles</p>
					<p class="subtitle">Bottom tile</p>
				</article>
			</div>
			<div class="tile is-parent">
				<article class="tile is-child notification is-primary">
					<p class="title">Middle tile</p>
					<p class="subtitle">With an image</p>
					<figure class="image is-4by3">
						
					</figure>
				</article>
			</div>
		</div>
	</div>
	
	<div class="tile is-vertical is-5">
		<div class="tile is-parent">
			<div class="tile is-child notification">
				<p class="title">Información Inscripciones</p>
				<!-- <p class="subtitle">With even more content</p> -->
				<div class="content" id="appPrueba">
					<tabla-inscripciones></tabla-inscripciones>
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection