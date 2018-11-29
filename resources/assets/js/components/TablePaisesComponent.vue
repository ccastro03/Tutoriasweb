<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar pais">
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
          <tr v-for="pais in paises" :key="pais.codigo">           
            <td><a :href="'/paises/' + pais.codigo">{{ pais.codigo }}</a></td>
            <td>{{ pais.nombre }}</td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/paises/' + pais.codigo + '/editar'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelPais" :attr-id="pais.codigo" >Eliminar</a>
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
      paises: [],
      name: null,
    }
  },
  created() {
    this.getPaises();
  },
  watch: {
    name(after,before) {
      this.getPaises();				
    }
  },
  methods: {
    getPaises() {
      var url = 'paises/obtenerlistadopaises';                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.paises = response.data;
        var array = this.paises;
		console.log(array);
      });
    }
  }
}
</script>

