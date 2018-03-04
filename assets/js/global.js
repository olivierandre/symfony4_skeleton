import Vue from 'vue';
import App from './vue/App';

var test = new Vue({
  el: '#app',
  template: '<App/>',
  components: { App }
})

$(function () {
  $('[data-toggle="popover"]').popover()
})
