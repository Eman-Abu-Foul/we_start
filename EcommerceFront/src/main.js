import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import '@fortawesome/fontawesome-free/css/all.css'
import './assets/css/Style.css'
import axios from "axios";

window.axios = axios;

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1';

const pinia = createPinia()

pinia.use(context => {
    const storeId = context.store.$id

    const serializer = {
        serialize: JSON.stringify,
        deserialize: JSON.parse
    }

    const data = serializer.deserialize(window.localStorage.getItem(storeId))

    if(data) {
        context.store.$patch(data)
    }

    context.store.$subscribe((m, s) => {
        window.localStorage.setItem(storeId, serializer.serialize(s))
    })

})

const app = createApp(App)
app.use(pinia)
app.use(router)
app.mount('#app')

