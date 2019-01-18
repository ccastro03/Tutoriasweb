@extends('layouts.main')

@section('content')
<div class="tile is-ancestor">
	<div class="tile is-vertical is-6">
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
	
	<div class="tile is-vertical is-6">
		<div class="tile is-parent">
			<div class="tile is-child notification">
				<p class="title">Información Inscripciones</p>
				<div class="content" id="appPrueba">
					<tabla-inscripindex></tabla-inscripindex>
				</div>
			</div>
		</div>
	</div>	
</div>
<script>
	// $(document).ready(function(){
		// setInterval(loadInscripciones,5000);
	// });

	// function loadInscripciones(){
		// $("#appPrueba").load("/incripciones/obtenerlistadoinscripciones");
	// }
</script>
@endsection