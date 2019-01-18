<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar funcion">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>  
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="funcion in funciones" :key="funcion.id">           
            <td><a :href="'/tutoriaweb/public/funciones/' + funcion.id">{{ funcion.nombre }}</a></td>
            <td>{{ funcion.descripcion }}</td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/funciones/' + funcion.id + '/editar'" hidden>Editar</a>
				
				<a :href="'/tutoriaweb/public/funciones/' + funcion.id + '/editar'" style="color: #000;">
				<span class="oi oi-pencil" title="Editar" aria-hidden="true"></span>
				</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a style="color: #000;"><span class="oi oi-trash" title="Eliminar" aria-hidden="true" id="BtnDelFunc" :attr-id="funcion.id"></span></a>				
			</td>
          </tr>
        </tbody>
      </table>
	  
      <nav class="pagination" role="navigation" aria-label="pagination" v-if="pagination.last_page > 1">
        <a class="pagination-previous" v-if="pagination.current_page > 1" @click.prevent="changePage(pagination.current_page - 1)" >Anterior</a>
        <a class="pagination-next" v-if="pagination.current_page < pagination.last_page" @click.prevent="changePage(pagination.current_page + 1)">Siguiente</a>
        <ul class="pagination-list">
          <li v-for="page in pagesNumber" :key="page">
            <a class="pagination-link" @click.prevent="changePage(page)" aria-label="Goto page 1" v-bind:class="[ page == isActived ? 'is-current' : '']">
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
      funciones: [],
	  pagination: {
        'current_page' : 0,
        'per_page' : 0,
        'first_item':  0,
        'last_item': 0,
        'last_page': 0,                    
        'total': 0,
      },	  
      name: null,
	  offset: 3,
    }
  },
  created() {
    this.getFunciones();
  },
  watch: {
    name(after,before) {
      this.getFunciones();				
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
    getFunciones(page) {
      var url = 'funciones/obtenerlistadofunciones?page='+page;                
      axios.get(url, { params: { name: this.name }}).then(response => {	  
		var array = response.data;
		this.pagination = array['paginate'];
		this.funciones = array['funciones']['data'];
      });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getFunciones(page);
    }
  }
}
</script>

