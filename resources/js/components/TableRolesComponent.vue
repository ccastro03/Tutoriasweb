<template>
  <div id="crud" class="row">
    <input type="text" name="name" class="input" v-model="name" placeholder="Buscar rol">
    <br>
    <div class="col-md-12">
      <table class="table table-hover table-striped table is-fullwidth">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>  
            <th colspan="2"> &nbsp; </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="role in roles" :key="role.id">
            <td>{{ role.id }}</td>            
            <td><a :href="'/role/' + role.id">{{ role.name }}</a></td>
            <td>{{ role.descripcion }}</td>
            <td><a class="button is-link is-rounded is-outlined" :href="'/role/' + role.id + '/editar'">Editar</a></td>
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

