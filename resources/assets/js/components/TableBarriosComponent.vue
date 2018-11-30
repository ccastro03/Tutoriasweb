<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar barrio">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
			<th scope="col">Ciudad</th>
            <th scope="col">Nombre</th>  
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="barrio in barrios" :key="barrio.cod_barrio">           
            <td>{{ barrio.cod_ciudad }}</td>
            <td><a :href="'/barrios/' + barrio.cod_ciudad + '/' + barrio.cod_barrio + '/show'">{{ barrio.nombre }}</a></td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/barrios/' + barrio.cod_ciudad + barrio.cod_barrio + '/editar'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelBar" :attr-id="barrio.cod_ciudad + '*' + barrio.cod_barrio" >Eliminar</a>
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
      barrios: [],
      name: null,
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
  methods: {
    getBarrios() {
      var url = 'barrios/obtenerlistadobarrios';                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.barrios = response.data;
        var array = this.barrios;
      });
    }
  }
}
</script>

