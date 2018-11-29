<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar eps">
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
          <tr v-for="ep in eps" :key="ep.codigo">           
            <td><a :href="'/eps/' + ep.codigo">{{ ep.codigo }}</a></td>
            <td>{{ ep.nombre }}</td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/eps/' + ep.codigo + '/editar'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelEps" :attr-id="ep.codigo" >Eliminar</a>
			</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      eps: [],
      name: null,
    }
  },
  created() {
    this.getEps();
  },
  watch: {
    name(after,before) {
      this.getEps();				
    }
  },
  methods: {
    getEps() {
      var url = 'eps/obtenerlistadoeps';                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.eps = response.data;
        var array = this.eps;
		console.log(array);
      });
    }
  }
}
</script>

