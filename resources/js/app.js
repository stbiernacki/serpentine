require('./bootstrap');

require('alpinejs');

import Vue from 'vue';
import App from "./App.vue";
import router from "./router";
import store from "./store";

import VueDataTables from 'vue-data-tables'
import Element from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css';
import enLang from 'element-ui/lib/locale/lang/en'
Vue.use(VueDataTables)
Vue.use(Element, {
    locale: enLang
})

//__ https://vuejs.org/v2/guide/components-registration.html
// require("./components/bootstrap.js");
//__ https://vuejs.org/v2/guide/deployment.html
Vue.config.productionTip = false;

store.dispatch('settings/getAppSettings').then(() => {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount('#app')
});
