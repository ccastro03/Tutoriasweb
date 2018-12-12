<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar barrio">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
			<th scope="col">Codigo</th>
            <th scope="col">Nombre</th>  
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="barrio in barrios" :key="barrio.cod_barrio">
            <td v-for="ciudad in ciudades" v-if="ciudad.cod_ciudad === barrio.cod_ciudad">{{ ciudad.nombre }}</td>
            <td><a :href="'/barrios/' + barrio.cod_ciudad + '/' + barrio.cod_barrio + '/show'">{{ barrio.nombre }}</a></td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/barrios/' + barrio.cod_ciudad + '/' + barrio.cod_barrio + '/edit'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelBar" :attr-id="barrio.cod_ciudad" :attr-id2="barrio.cod_barrio" >Eliminar</a>
			</td>
          </tr>
        </tbody>
      </table> 
	  
      <nav class="pagination" role="navigation" aria-label="pagination">
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
      barrios: [],
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
    this.getBarrios();
  },
  watch: {
    name(after,before) {
      this.getBarrios();				
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
    getBarrios(page) {
      var url = 'barrios/obtenerlistadobarrios?page='+page;                
      axios.get(url, { params: { name: this.name }}).then(response => {
        var array = response.data;
		this.pagination = array['paginate'];
		this.barrios = array['barrios']['data'];
		this.ciudades = array['ciudades'];
      });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getBarrios(page);
    }
  }
}
</script>