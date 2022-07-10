require('./bootstrap');
window.Vue = require('vue').default;

Vue.component('home', require('./components/Home.vue').default);
Vue.component('panel-picture', require('./components/PanelPicture.vue').default);

const pluginGetImage = {
    install(Vue, options) {
      Vue.prototype.img = function (path) {
            let images = require.context('/images', false, /\.png$|\.jpg$/)
            return images("./"+path)
        }
    },
}

Vue.use(pluginGetImage)

const app = new Vue({
    el: '#app',
});
