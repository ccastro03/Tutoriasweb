<template>
  <div v-bind:class="this.class_id">            
    <select v-model="selected" v-bind:name="this.propname" v-bind:id="this.value_id">          
      <option selected disabled>Seleccione una opción</option>
      <option v-for="option in options" v-bind:value="option.value" :key="option.value">
        {{ option.text }}
      </option>
    </select> 
  </div>  
</template>

<script>
  export default
  {
   data() {
     return {
       selected: 'Seleccione un parroco',
       options: [         
       ]
     }
   },
   props: ['old', 'url', 'propname', 'value_id', 'class_id'],
   created() {
     //console.log(this.propname)
     this.getUser();
     if(this.old.length === 0) {
       this.selected = 'Seleccione una opción'
     } else {
       this.selected = this.old
     }
   },
   methods: {
     getUser() {
        axios.get(this.url).then(response => {
          switch (this.url) {
            case '/beneficiarios/obtenerlistadobeneficiarios':
              response.data.forEach(obj => {
                this.options.push({ text: obj.nombre, value: obj.id_beneficiario })            
              });
              break;
            case '/usuarios/obtenerlistadousuarios' :
              response.data.forEach(obj => {
                this.options.push({ text: obj.name, value: obj.id })            
              });
              break;
            case '/usuarios/obtenerlistadoparrocos' :
              response.data.forEach(obj => {
                this.options.push({ text: obj.name, value: obj.id })            
              });
              break;
            case '/usuarios/obtenerlistadoroles':
              response.data.forEach(obj => {
                this.options.push({ text: obj.description, value: obj.id })            
              });
              break;
            case '/iglesias/obtenerlistadodiocesis' :
              response.data.forEach(obj => {
                this.options.push({ text: obj.nombre, value: obj.id })            
              });
              break;
            case '/iglesias/obtenerlistadoiglesias' :
              response.data.forEach(obj => {
                this.options.push({ text: obj.nombre, value: obj.id })            
              });
              break;
            case '/beneficiarios/obtenerlistadotiposdoc' :
              response.data.forEach(obj => {
                this.options.push({ text: obj.descripcion, value: obj.id })         
              });
              break;
            case '/ayudas/obtenertiposayudas' :
              response.data.forEach(obj => {
                this.options.push({ text: obj.descripcion, value: obj.id })            
              });
              break;
          }          
        });
     }
   }
  }
</script>