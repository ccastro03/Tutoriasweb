<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar nombre sede">
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
          <tr v-for="sede in sedes" :key="sede.codigo">
            <td><a :href="'/tutoriaweb/public/sedes/' + sede.codigo">{{ sede.codigo }}</a></td>
			<td>{{ sede.nombre }}</td>
            <td style="text-align: right;">
				<a :href="'/tutoriaweb/public/sedes/' + sede.codigo + '/editar'" style="color: #000;"><span class="oi oi-pencil" title="Editar" aria-hidden="true"></span></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a style="color: #000;"><span class="oi oi-trash" title="Eliminar" aria-hidden="true" id="BtnDelSed" :attr-id="sede.codigo"></span></a>								
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
      sedes: [],
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
    this.getSedes();
  },
  watch: {
    name(after,before) {
      this.getSedes();				
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
    getSedes(page) {
      var url = 'sedes/obtenerlistadosedes?page='+page;                
      axios.get(url, { params: { name: this.name }}).then(response => {
        var array = response.data;
		this.pagination = array['paginate'];
		this.sedes = array['sedes']['data'];
      });
    },
    changePage(page) {
      this.pagination.current_page = page;
      this.getSedes(page);
    }
  }
}
</script>