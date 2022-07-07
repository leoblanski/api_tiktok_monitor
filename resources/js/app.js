
require('./bootstrap');

window.Vue = require('vue').default;

import PanelPicture from './components/ExampleComponent.vue';

const app = new Vue({
    el: '#app',
    components: {
        PanelPicture
    }
})

