import Vue from 'vue'
import VueRouter from 'vue-router'

import Tarefas from './components/tarefas/Tarefas.vue'
import FormTarefas from './components/tarefas/Formulario.vue'
import PaginaNaoEncontrada from './components/PaginaNaoEncontrada.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'tarefas',
            component: Tarefas,
        },
        {
            path: '/tarefas/formulario/:id?',
            name: 'form-tarefas',
            component: FormTarefas,
            props: true
        },
        {
            path: "*",
            component: PaginaNaoEncontrada
        }
    ]
})

export default router;
