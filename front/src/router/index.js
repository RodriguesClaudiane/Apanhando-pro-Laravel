import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path:'/cadastrarLivroView',
      name: 'cadastrarLivro',
      component: () => import('@/views/CadastrarLivroView.vue')
    },
    {
      path: '/acervoView',
      name: 'acervo',
      component: () => import('@/views/AcervoView.vue')
    }
  ]
})

export default router
