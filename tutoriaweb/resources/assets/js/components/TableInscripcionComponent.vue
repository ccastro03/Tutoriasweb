<template>
  <div id="crud" class="row">
	<div class="col-md-6">
		<input type="text" name="codest" class="input" v-model="codest" placeholder="Buscar estudiante">
	</div>
	<div class="col-md-6">
		<input type="text" name="sede" class="input" v-model="sede" placeholder="Buscar sede">
	</div>

    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
			<th scope="col">Estudiante</th>
            <th scope="col">Fecha&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th scope="col">Sede</th>
			<th scope="col">Verificada</th>
			<th scope="col">Citación</th>
			<th scope="col">Aprobada</th>
            <th colspan="3"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="inscripcion in inscripciones" :key="inscripcion.codigo">
            <td>{{ inscripcion.numdocest }}</td>
			<td>{{ inscripcion.fechainscrip }}</td>
			<td>{{ inscripcion.sede }}</td>
			<td style="text-align: center;">{{ inscripcion.verificada }}</td>
			<td style="text-align: center;">{{ inscripcion.citacion }}</td>
			<td style="text-align: center;">{{ inscripcion.aprobada }}</td>

            <td style="text-align: right;">
				<a :href="'/tutoriaweb/public/incripciones/'+ inscripcion.codigo" style="color: #000;"><span class="oi oi-eye" title="Ver" aria-hidden="true"></span></a>
				&nbsp;&nbsp;
				<a :href="'/tutoriaweb/public/incripciones/'+ inscripcion.codigo+'/editar'" style="color: #000;"><span class="oi oi-spreadsheet" title="Estado" aria-hidden="true"></span></a>
				&nbsp;&nbsp;
				<a target="_blank" :href="'/tutoriaweb/public/incripciones/pdfinscripcion/'+ inscripcion.numdocest" style="color: #000;"><span class="oi oi-document" title="PDF" aria-hidden="true"></span></a>
				
				&nbsp;&nbsp;
				<a target="_blank" :href="'/tutoriaweb/public/incripciones/generarPago/'+ inscripcion.numdocest" style="color: #000;"><span class="oi oi-document" title="PAGO" aria-hidden="true"></span></a>				
				&nbsp;
			</td>
          </tr>
        </tbody>
      </table>
	  
      <nav class="pagination" role="navigation" aria-label="pagination" v-if="pagination.total != 0">
        <a class="pagination-previous" v-if="pagination.current_page > 1" @click.prevent="changePage(pagination.current_page - 1)" >Anterior</a>
        <a class="pagination-next" v-if="pagination.current_page < pagination.last_page" @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
        <ul class="pagination-list" style="list-style: none; margin: 0; color: #fff;">
          <li v-for="page in pagesNumber" :key="page">
            <a class="pagination-link" style="text-decoration: none;" @click.prevent="changePage(page)" aria-label="Goto page 1" v-bind:class="[ page == isActived ? 'is-current' : '']">
              {{ page }}
            </a>
          </li>          
        </ul>
      </nav>
	  
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      inscripciones: [],
	  pagination: {
        'current_page' : 0,
        'per_page' : 0,
        'first_item':  0,
        'last_item': 0,
        'last_page': 0,                    
        'total': 0,
      },	  
      codest: null,
	  sede: null,
	  offset: 3,
    }
  },
  created() {
    setInterval(() => { this.getInscripciones() }, 1000);
  },
  watch: {
    codest(after,before) {
      this.getInscripciones();				
    },
    sede(after,before) {
      this.getInscripciones();				
    }	
  },
	computed:  {
    isActived: function() {
      return this.pagination.current_page;
    },
    pagesNumber: function() {
      if(!this.pagination.to){
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if( from < 1){
        from = 1;
      }
      var to = from + (this.offset * 2);
      if(to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while( from <= to ){
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    },
  },  
  methods: {
    getInscripciones(page) {
      var url = 'incripciones/obtenerlistadoinscripciones?page='+page;                
      axios.get(url, { params: { codigo: this.codest, sede: this.sede }}).then(response => {
        var array = response.data;
		this.pagination = array['paginate'];
		this.inscripciones = array['inscripcion']['data'];
      });
    },
	beforeDestroy () {
		clearInterval(this.getInscripciones)
	},
    changePage(page) {
      this.pagination.current_page = page;
      this.getInscripciones(page);
    }
  }
}
</script>