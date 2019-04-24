<template>
  <div id="formulario">
    <div class="card">
      <div class="card-header">
        <h2>Formulário</h2>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="titulo">Título:</label>
          <input type="text" class="form-control" placeholder="Digite o título" v-model="titulo">
        </div>
        <div class="form-group">
          <label for="titulo">Descrição:</label>
          <input
            type="text"
            class="form-control"
            placeholder="Digite a descrição"
            v-model="descricao"
          >
        </div>
        <div class="form-group">
          <label for="status">Status:</label>
          <select class="form-control" v-model="status">
            <option :value="1">Aberto</option>
            <option :value="2">Em Andamento</option>
            <option :value="3">Concluído</option>
            <option :value="4">Cancelado</option>
          </select>
        </div>
      </div>
      <div class="card-footer text-muted">
        <button class="btn btn-primary" @click="salvar">Salvar</button>
        <button class="btn btn-danger" @click="voltarListagem">Cancelar</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["id"],
  mounted() {
    if (this.id != undefined) {
      axios
        .get("/tarefas/" + this.id)
        .then(res => {
          const dados = res.data;
          this.titulo = dados.titulo;
          this.descricao = dados.descricao;
          this.status = dados.status;
          this.metodo = "put";
          this.complementoUrl = "/" + this.id;
        })
        .catch(err => {
          console.error(err);
        });
    }
  },
  data() {
    return {
      titulo: "",
      descricao: "",
      status: 1,
      metodo: "post",
      complementoUrl: ""
    };
  },
  methods: {
    voltarListagem() {
      this.$router.push("/");
    },
    salvar() {
        console.log(this.metodo)
      axios({
        method: this.metodo,
        url: "/tarefas" + this.complementoUrl,
        data: {
          titulo: this.titulo,
          descricao: this.descricao,
          status: this.status
        }
      })
        .then(res => {
          this.$router.push("/");
        })
        .catch(err => {
          console.error(err.response);
        });
    }
  }
};
</script>

<style>
</style>
