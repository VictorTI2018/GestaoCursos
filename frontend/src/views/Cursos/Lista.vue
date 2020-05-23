<template>
  <div>
    <span>
      <div class="row">
        <div class="col-md-2 mb-2">
          <button class="btn btn-success btn-block">Novo Curso</button>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-8">
          <input type="search" placeholder="Buscar..." class="form-control" />
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary btn-block">Buscar</button>
        </div>
      </div>
    </span>
    <br />
    <div class="cursos">
      <div class="curso card mb-3 shadow-lg" v-for="(curso, index) in cursos" :key="index">
        <img
          class="card-img-top"
          src="https://arquivo.devmedia.com.br/cursos/imagem/curso_preparando-o-ambiente-para-programar-em-php_2057.png"
          alt="Imagem do Curso"
        />

        <div class="card-body">
          <p>
            <strong>{{ curso.nome }}</strong>
          </p>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col-md-6">
              <button title="Editar Curso" class="btn btn-warning btn-block text-white">Editar</button>
            </div>
            <div class="col-md-6">
              <button title="Excluir Curso" class="btn btn-danger btn-block">Excluir</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "lista",
  data() {
    return {
      cursos: []
    };
  },
  methods: {
    lista() {
      let user_id = 1;
      this.$http
        .get(`/api/curso/${user_id}`)
        .then(res => {
          this.cursos = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  mounted() {
    this.lista();
  }
};
</script>

<style>
.cursos {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 10px;
}
.curso {
  flex-basis: 32%;
}

.curso_img {
  height: 60px;
  width: 100%;
}
</style>