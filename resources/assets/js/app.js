import Vue from 'Vue';
 
import VueRouter from 'vue-router';
Vue.use(VueRouter);
 
import VueAxios from 'vue-axios';//gọi thư viện axios
import axios from 'axios';
Vue.use(VueAxios,axios);
 
 
import App from './App.vue';
//incldue listsp
import ListUser from './components/register/ListUser.vue'; //import template danh sách hiển thị listuser
import CreateRegister from './components/register/CreateRegister.vue';
import LoginUser from './components/register/LoginUser.vue';
 
//thiết lặp routes
const routes = [
  {
      name: 'ListUser',
      path: '/',
      component: ListUser
  },
  {
    name:'CreateRegister',
    path:'/dangky/create',
    component:CreateRegister
  },
  {
    name:'LoginUser',
    path:'/dangky/login',
    component:LoginUser
  }
];
 
const router = new VueRouter({mode:'history', routes: routes});
new Vue(Vue.util.extend({router},App)).$mount('#app');