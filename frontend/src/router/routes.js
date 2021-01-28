const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      {
        path: '',
        component: () => import('pages/Index.vue')
      },
      {
        path: '/profile/:id',
        name: 'profile',
        component: () => import('pages/Profile'),
        props: true
      },
      {
        path: '/albums',
        component: () => import('pages/Album/Albums'),
        props: true
      },
      {
        path: 'user/:id/album/new',
        name: 'new_album',
        component: () => import('pages/Album/AlbumNew'),
        props: true
      },
      {
        path: 'user/:id/album/edit',
        name: 'edit_album',
        component: () => import('pages/Album/AlbumEdit'),
        props: true
      },
      {
        path: '/photos/:id',
        name: 'photos',
        component: () => import('pages/Photo/Photos'),
        props: true
      },
      {
        path: 'album/:id/photo/new',
        name: 'new_photo',
        component: () => import('pages/Photo/PhotoCreate'),
        props: true
      },
      {
        path: 'album/:id/photo/:pid/edit',
        name: 'edit_photo',
        component: () => import('pages/Photo/PhotoEdit'),
        props: true
      }
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
