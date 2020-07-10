window._ = require("lodash");

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
    window.moment = require("moment");
    window.AOS = require("aos");
    window.isotope = require('../vendor/isotope-layout/isotope.pkgd');
    window.easing = require('../vendor/jquery.easing/jquery.easing');
    window.counterUp = require('../vendor/counterup/counterup');
    window.waypoint = require('../vendor/waypoints/jquery.waypoints');
    window.owlCarousel = require('../vendor/owl.carousel/owl.carousel');
} catch (e) {}
