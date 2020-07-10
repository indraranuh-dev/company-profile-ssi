window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.moment = require('moment');

    require('bootstrap');
} catch (e) {}
var sparkline = require('sparkline');
