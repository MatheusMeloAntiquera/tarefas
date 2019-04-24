<template>
  <div class="card">
    <div class="card-header">
      <h2>
        Tarefas
        <span class="buttons-right-top">
          <router-link tag="a" class="btn btn-success" :to="{ name: 'form-tarefas' }">
            <i class="fa fa-plus-circle fa-lg"></i> Nova Tarefa
          </router-link>
        </span>
      </h2>
    </div>
    <div class="card-body">
      <b-table striped hover :items="tarefas" :fields="campos">
        <template slot="status" slot-scope="data">
          <h4>
            <span
              class="badge badge-pill"
              :class="badgeCor(data.item.status)"
            >{{ data.item.status | statusTexto }}</span>
          </h4>
        </template>
        <template slot="botoes" slot-scope="data">
          <button type="button" class="btn btn-danger" @click="excluir( data.item )">
            <i class="fa fa-trash-o" aria-hidden="true"></i>
          </button>
          <router-link
            tag="button"
            class="btn btn-warning"
            :to="'/tarefas/formulario/' + data.item.id"
          >
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </router-link>
        </template>
      </b-table>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    this.carregaTarefas();
  },
  methods: {
    badgeCor(status) {
      switch (status) {
        case 1:
          return "badge-success";
        case 2:
          return "badge-warning";
        case 3:
          return "badge-primary";
        case 4:
          return "badge-danger";
      }
    },
    carregaTarefas() {
      axios
        .get("/tarefas")
        .then(res => {
          this.tarefas = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    excluir(tarefa) {
      axios
        .delete("/tarefas/" + tarefa.id)
        .then(res => {
          console.log(res);
          this.carregaTarefas();
        })
        .catch(err => {
          console.error(err);
        });
    }
  },
  data() {
    return {
      campos: {
        titulo: { label: "Título", sortable: true },
        descricao: { label: "Descrição", sortable: true },
        status: { label: "Status", sortable: true },
        botoes: { label: "Ações", sortable: false }
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
      }
    }
  }
};
</script>

<style>
#botoes {
  position: absolute;
  float: right;
  right: 16px;
}
.buttons-right-top {
  position: absolute;
  top: 8px;
  right: 16px;
}
</style>
