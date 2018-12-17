<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar rol">
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
          <tr v-for="role in roles" :key="role.codigo">           
            <td><a :href="'/roles/' + role.codigo">{{ role.name }}</a></td>
            <td>{{ role.descripcion }}</td>
            <td style="text-align: right;">
				<a class="button is-link is-rounded is-outlined" :href="'/roles/' + role.codigo + '/editar'">Editar</a>
				<a class="button is-link is-rounded is-outlined" id="BtnDelRol" :attr-id="role.codigo" >Eliminar</a>
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
      roles: [],
      name: null,
    }
  },
  created() {
    this.getRoles();
  },
  watch: {
    name(after,before) {
      this.getRoles();				
    }
  },
  methods: {
    getRoles() {
      var url = 'roles/obtenerlistadoroles';                
      axios.get(url, { params: { name: this.name }}).then(response => {
        this.roles = response.data;
        var array = this.roles;
      });
    }
  }
}
</script>

