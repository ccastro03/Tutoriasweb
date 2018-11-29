<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar prepagada">
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
          <tr v-for="prepa in prepagada" :key="prepa.codigo">           
            <td><a :href="'/prepagada/' + prepa.codigo">{{ prepa.codigo }}</a></td>
            <td>{{ prepa.nombre }}</td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/prepagada/' + prepa.codigo + '/editar'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelPrepa" :attr-id="prepa.codigo" >Eliminar</a>
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
      prepagada: [],
      name: null,
    }
  },
  created() {
    this.getPrepagada();
  },
  watch: {
    name(after,before) {
      this.getPrepagada();				
    }
  },
  methods: {
    getPrepagada() {
      var url = 'prepagada/obtenerlistadoprepagada';                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.prepagada = response.data;
        var array = this.prepagada;
      });
    }
  }
}
</script>

