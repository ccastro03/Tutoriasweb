<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar nombre jornada">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
			<th scope="col">Código</th>
            <th scope="col">Nombre</th>  
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="jornada in jornadas" :key="jornada.codigo">
            <td><a :href="'/tutoriaweb/public/jornadas/' + jornada.codigo">{{ jornada.codigo }}</a></td>
			<td>{{ jornada.nombre }}</td>
            <td style="text-align: right;">				
				<a :href="'/tutoriaweb/public/jornadas/' + jornada.codigo + '/editar'" style="color: #000;"><span class="oi oi-pencil" title="Editar" aria-hidden="true"></span></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a style="color: #000;"><span class="oi oi-trash" title="Eliminar" aria-hidden="true" id="BtnDelJor" :attr-id="jornada.codigo"></span></a>				
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
      jornadas: [],
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
    this.getJornadas();
  },
  watch: {
    name(after,before) {
      this.getJornadas();				
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
    getJornadas(page) {
      var url = 'jornadas/obtenerlistadojornadas?page='+page;                
      axios.get(url, { params: { name: this.name }}).then(response => {
        var array = response.data;
		this.pagination = array['paginate'];
		this.jornadas = array['jornadas']['data'];
      });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getJornadas(page);
    }
  }
}
</script>