<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar ciudad">
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
          <tr v-for="ciudad in ciudades" :key="ciudad.cod_ciudad">           
            <td><a :href="'/ciudades/' + ciudad.cod_ciudad">{{ ciudad.cod_ciudad }}</a></td>
            <td>{{ ciudad.nombre }}</td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/ciudades/' + ciudad.cod_ciudad + '/editar'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelCiu" :attr-id="ciudad.cod_ciudad" >Eliminar</a>
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
      ciudades: [],
      name: null,
    }
  },
  created() {
    this.getCiudades();
  },
  watch: {
    name(after,before) {
      this.getCiudades();				
    }
  },
  methods: {
    getCiudades() {
      var url = 'ciudades/obtenerlistadociudades';                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.ciudades = response.data;
        var array = this.ciudades;
      });
    }
  }
}
</script>

