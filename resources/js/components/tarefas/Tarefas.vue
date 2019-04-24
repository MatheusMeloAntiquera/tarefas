<template>
  <div class="card">
    <div class="card-header">
      <h2>
        Latest Posts
        <span class="buttons-right-top">
          <router-link tag="a" class="btn btn-success" :to="{ name: 'form-tarefas' }">
            <i class="fa fa-plus-circle fa-lg"></i> Nova Tarefa
          </router-link>
        </span>
      </h2>
    </div>
    <div class="card-body">
      <b-table striped hover :items="tarefas" :fields="campos">
        <template slot="status" slot-scope="data">{{ data.item.status | statusTexto }}</template>
      </b-table>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    axios
      .get("/tarefas")
      .then(res => {
        this.tarefas = res.data;
      })
      .catch(err => {
        console.error(err);
      });
  },
  data() {
    return {
      campos: {
        titulo: { label: "Título", sortable: true },
        descricao: { label: "Descrição", sortable: true },
        status: { label: "Status", sortable: true }
      },
      tarefas: []
    };
  },
  filters: {
    statusTexto: function(codigo) {
      switch (codigo) {
        case 1:
          return "Aberto";
        case 2:
          return "Em andamento";
        case 3:
          return "Concluído";
        case 4:
          return "Cancelado";
        default:
          return "teste";
      }
    }
  },
};
</script>

<style>
</style>
