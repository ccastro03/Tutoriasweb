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
            <td><a :href="'/funciones/' + funcion.id">{{ funcion.nombre }}</a></td>
            <td>{{ funcion.descripcion }}</td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/funciones/' + funcion.id + '/editar'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelFunc" :attr-id="funcion.id" >Eliminar</a>
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
      funciones: [],
      name: null,
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
  methods: {
    getFunciones() {
      var url = 'funciones/obtenerlistadofunciones';                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.funciones = response.data;
        var array = this.funciones;
      });
    }
  }
}
</script>

