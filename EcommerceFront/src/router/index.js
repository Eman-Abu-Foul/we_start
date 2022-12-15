import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue'),
      meta: {
        title: 'Home - Ecommerce Project'
      }
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue'),
      meta: {
        title: 'About - Ecommerce Project'
      }
    },
    {
      path: '/shop',
      name: 'shop',
      component: () => import('../views/ShopView.vue'),
      meta: {
        title: 'Shop - Ecommerce Project'
      }
    },
    {
      path: '/category/:id',
      name: 'category',
      component: () => import('../views/CategoryView.vue'),
      meta: {
        title: 'Category - Ecommerce Project'
      }
    },
    {
      path: '/product/:slug',
      name: 'product',
      component: () => import('../views/ProductView.vue'),
      meta: {
        title: 'Product - Ecommerce Project'
      }
    },
    {
      path: '/contact-us',
      name: 'contact',
      component: () => import('../views/ContactView.vue'),
      meta: {
        title: 'Contact Us - Ecommerce Project'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue'),
      meta: {
        title: 'Login - Ecommerce Project'
      }
    },
    {
      path: '/otp',
      name: 'otp',
      component: () => import('../views/OTP.vue'),
      meta: {
        title: 'OTP - Ecommerce Project'
      }
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegisterView.vue'),
      meta: {
        title: 'Register - Ecommerce Project'
      }
    },
    {
      path: '/cart',
      name: 'cart',
      component: () => import('../views/CartView.vue'),
      meta: {
        title: 'Cart - Ecommerce Project'
      }
    },
    {
      path: '/wishlist',
      name: 'wishlist',
      component: () => import('../views/WishlistView.vue'),
      meta: {
        title: 'Wishlist - Ecommerce Project'
      }
    },
    {
      path: '/account',
      name: 'account',
      component: () => import('../views/AccountView.vue'),
      meta: {
        title: 'Account - Ecommerce Project'
      }
    },
    ,
    {
      path: '/checkout',
      name: 'checkout',
      component: () => import('../views/CheckoutView.vue'),
      meta: {
        title: 'Checkout - Ecommerce Project',
        Auth: true
      }
    },
    {
      path: '/:path(.*)*',
      name: 'notFound',
      component: () => import('../views/NotFoundView.vue'),
      meta: {
        title: '404 - Final Project'
      }
    },
  ]
})

export default router
