
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Echo from 'laravel-echo'
import post from './components/posts.vue'
import store from './store/store'

new Vue({
    el:'#app',
    store,
    components: {post}
});

let e = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});

e.channel('channel-demo')
  .listen('PostCreatedEvent', function(e) {
      console.log(e)
});
