window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;
window.Q = require('qoob');

import __svg__ from './config/sprite';
import vanillaLoader from './vanilla/index';
import vueLoader from './vue/index';

vanillaLoader();
vueLoader();