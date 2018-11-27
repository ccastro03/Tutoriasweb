<template>
  <div class="tile is-parent">
    <article class="tile is-child box">
      <p class="title">{{ info.length }}</p>
      <p class="subtitle">{{ this.datainfo }}</p>
    </article>
  </div>
</template>

<script>
export default {
  name: 'tiles-generico',
  data (){
    return {
      info: ''
    }
  },
  props: ['url', 'datainfo'],
  created() {
    this.getInfo()
  },
  methods:  {
    getInfo() {
      axios.get(this.url).then(response => {
        this.info = response.data;    
        switch (this.url) {
            case '/usuarios/obtenerlistadoparrocos':
              this.info = response.data;
              break;
            case '/iglesias/obtenerlistadoiglesias':
              this.info = response.data;
              break;
            case '/beneficiarios/obtenerlistadobeneficiarios':
              this.info = response.data;
              break;
            case '/ayudas/obtenerlistadoayudas': 
              this.info = response.data;              
              break;
        }
      });
    }
  }
}
</script>