<template>
  <div id="formulario">
    <div class="card">
      <div class="card-header">
        <h2>Formulário</h2>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="titulo">Título: {{ titulo }}</label>
          <input type="text" class="form-control" placeholder="Digite o título" v-model="titulo">
        </div>
        <div class="form-group">
          <label for="titulo">Descrição: {{ descricao }}</label>
          <input
            type="text"
            class="form-control"
            placeholder="Digite a descrição"
            v-model="descricao"
          >
        </div>
        <div class="form-group">
          <label for="status">Status: {{ status }}</label>
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
  data() {
    return {
      titulo: "",
      descricao: "",
      status: 1
    };
  },
  methods: {
    voltarListagem() {
      this.$router.push("/");
    },
    salvar() {
      axios
        .post('/tarefas', {
            titulo: this.titulo,
            descricao: this.descricao,
            status: this.status
        })
        .then(res => {
          this.$router.push("/");
        })
        .catch(err => {
          console.error(err);
        });
    }
  }
};
</script>

<style>
</style>
