import { createApp } from 'vue';
import './bootstrap';
import axios from 'axios';
import VueAxios from 'vue-axios';
import router from './router/index';
import App from './components/App.vue';

createApp(App)
    .use(router)
    .use(VueAxios, axios)
    .mount("#app");
