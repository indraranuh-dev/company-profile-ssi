/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/admin/js/main/custom.js":
/*!**************************************************!*\
  !*** ./resources/assets/admin/js/main/custom.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  "use strict";

  $(".preloader").fadeOut(); // ==============================================================
  // Theme options
  // ==============================================================
  // ==============================================================
  // sidebar-hover
  // ==============================================================

  $(".left-sidebar").hover(function () {
    $(".navbar-header").addClass("expand-logo");
  }, function () {
    $(".navbar-header").removeClass("expand-logo");
  }); // this is for close icon when navigation open in mobile view

  $(".nav-toggler").on('click', function () {
    $("#main-wrapper").toggleClass("show-sidebar");
    $(".nav-toggler i").toggleClass("ti-menu");
  });
  $(".nav-lock").on('click', function () {
    $("body").toggleClass("lock-nav");
    $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
    $("body, .page-wrapper").trigger("resize");
  });
  $(".search-box a, .search-box .app-search .srh-btn").on('click', function () {
    $(".app-search").toggle(200);
    $(".app-search input").focus();
  }); // ==============================================================
  // Right sidebar options
  // ==============================================================

  $(function () {
    $(".service-panel-toggle").on('click', function () {
      $(".customizer").toggleClass('show-service-panel');
    });
    $('.page-wrapper').on('click', function () {
      $(".customizer").removeClass('show-service-panel');
    });
  }); // ==============================================================
  // This is for the floating labels
  // ==============================================================

  $('.floating-labels .form-control').on('focus blur', function (e) {
    $(this).parents('.form-group').toggleClass('focused', e.type === 'focus' || this.value.length > 0);
  }).trigger('blur'); // ==============================================================
  //tooltip
  // ==============================================================

  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  }); // ==============================================================
  //Popover
  // ==============================================================

  $(function () {
    $('[data-toggle="popover"]').popover();
  }); // ==============================================================
  // Perfact scrollbar
  // ==============================================================

  $('.message-center, .customizer-body, .scrollable').perfectScrollbar({
    wheelPropagation: !0
  });
  /*var ps = new PerfectScrollbar('.message-body');
  var ps = new PerfectScrollbar('.notifications');
  var ps = new PerfectScrollbar('.scroll-sidebar');
  var ps = new PerfectScrollbar('.customizer-body');*/
  // ==============================================================
  // Resize all elements
  // ==============================================================

  $("body, .page-wrapper").trigger("resize");
  $(".page-wrapper").delay(20).show(); // ==============================================================
  // To do list
  // ==============================================================

  $(".list-task li label").click(function () {
    $(this).toggleClass("task-done");
  }); //****************************

  /* This is for the mini-sidebar if width is less then 1170*/
  //****************************

  var setsidebartype = function setsidebartype() {
    var width = window.innerWidth > 0 ? window.innerWidth : this.screen.width;

    if (width < 1170) {
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  };

  $(window).ready(setsidebartype);
  $(window).on("resize", setsidebartype); //****************************

  /* This is for sidebartoggler*/
  //****************************

  $('.sidebartoggler').on("click", function () {
    $("#main-wrapper").toggleClass("mini-sidebar");

    if ($("#main-wrapper").hasClass("mini-sidebar")) {
      $(".sidebartoggler").prop("checked", !0);
      $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
    } else {
      $(".sidebartoggler").prop("checked", !1);
      $("#main-wrapper").attr("data-sidebartype", "full");
    }
  });
});

/***/ }),

/***/ "./resources/assets/admin/js/main/sidebarmenu.js":
/*!*******************************************************!*\
  !*** ./resources/assets/admin/js/main/sidebarmenu.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Template Name: Admin Template
Author: Wrappixel

File: js
*/
// ============================================================== 
// Auto select left navbar
// ============================================================== 
$(function () {
  "use strict";

  var url = window.location + "";
  var path = url.replace(window.location.protocol + "//" + window.location.host + "/", "");
  var element = $('ul#sidebarnav a').filter(function () {
    return this.href === url || this.href === path; // || url.href.indexOf(this.href) === 0;
  });
  element.parentsUntil(".sidebar-nav").each(function (index) {
    if ($(this).is("li") && $(this).children("a").length !== 0) {
      $(this).children("a").addClass("active");
      $(this).parent("ul#sidebarnav").length === 0 ? $(this).addClass("active") : $(this).addClass("selected");
    } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
      $(this).addClass("selected");
    } else if ($(this).is("ul")) {
      $(this).addClass('in');
    }
  });
  element.addClass("active");
  $('#sidebarnav a').on('click', function (e) {
    if (!$(this).hasClass("active")) {
      // hide any open menus and remove all other classes
      $("ul", $(this).parents("ul:first")).removeClass("in");
      $("a", $(this).parents("ul:first")).removeClass("active"); // open our new menu and add the open class

      $(this).next("ul").addClass("in");
      $(this).addClass("active");
    } else if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this).parents("ul:first").removeClass("active");
      $(this).next("ul").removeClass("in");
    }
  });
  $('#sidebarnav >li >a.has-arrow').on('click', function (e) {
    e.preventDefault();
  });
});

/***/ }),

/***/ "./resources/assets/admin/js/main/waves.js":
/*!*************************************************!*\
  !*** ./resources/assets/admin/js/main/waves.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

!function (t) {
  "use strict";

  function e(t) {
    return null !== t && t === t.window;
  }

  function n(t) {
    return e(t) ? t : 9 === t.nodeType && t.defaultView;
  }

  function a(t) {
    var e,
        a,
        i = {
      top: 0,
      left: 0
    },
        o = t && t.ownerDocument;
    return e = o.documentElement, "undefined" != typeof t.getBoundingClientRect && (i = t.getBoundingClientRect()), a = n(o), {
      top: i.top + a.pageYOffset - e.clientTop,
      left: i.left + a.pageXOffset - e.clientLeft
    };
  }

  function i(t) {
    var e = "";

    for (var n in t) {
      t.hasOwnProperty(n) && (e += n + ":" + t[n] + ";");
    }

    return e;
  }

  function o(t) {
    if (d.allowEvent(t) === !1) return null;

    for (var e = null, n = t.target || t.srcElement; null !== n.parentElement;) {
      if (!(n instanceof SVGElement || -1 === n.className.indexOf("waves-effect"))) {
        e = n;
        break;
      }

      if (n.classList.contains("waves-effect")) {
        e = n;
        break;
      }

      n = n.parentElement;
    }

    return e;
  }

  function r(e) {
    var n = o(e);
    null !== n && (c.show(e, n), "ontouchstart" in t && (n.addEventListener("touchend", c.hide, !1), n.addEventListener("touchcancel", c.hide, !1)), n.addEventListener("mouseup", c.hide, !1), n.addEventListener("mouseleave", c.hide, !1));
  }

  var s = s || {},
      u = document.querySelectorAll.bind(document),
      c = {
    duration: 750,
    show: function show(t, e) {
      if (2 === t.button) return !1;
      var n = e || this,
          o = document.createElement("div");
      o.className = "waves-ripple", n.appendChild(o);
      var r = a(n),
          s = t.pageY - r.top,
          u = t.pageX - r.left,
          d = "scale(" + n.clientWidth / 100 * 10 + ")";
      "touches" in t && (s = t.touches[0].pageY - r.top, u = t.touches[0].pageX - r.left), o.setAttribute("data-hold", Date.now()), o.setAttribute("data-scale", d), o.setAttribute("data-x", u), o.setAttribute("data-y", s);
      var l = {
        top: s + "px",
        left: u + "px"
      };
      o.className = o.className + " waves-notransition", o.setAttribute("style", i(l)), o.className = o.className.replace("waves-notransition", ""), l["-webkit-transform"] = d, l["-moz-transform"] = d, l["-ms-transform"] = d, l["-o-transform"] = d, l.transform = d, l.opacity = "1", l["-webkit-transition-duration"] = c.duration + "ms", l["-moz-transition-duration"] = c.duration + "ms", l["-o-transition-duration"] = c.duration + "ms", l["transition-duration"] = c.duration + "ms", l["-webkit-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", l["-moz-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", l["-o-transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", l["transition-timing-function"] = "cubic-bezier(0.250, 0.460, 0.450, 0.940)", o.setAttribute("style", i(l));
    },
    hide: function hide(t) {
      d.touchup(t);
      var e = this,
          n = (1.4 * e.clientWidth, null),
          a = e.getElementsByClassName("waves-ripple");
      if (!(a.length > 0)) return !1;
      n = a[a.length - 1];
      var o = n.getAttribute("data-x"),
          r = n.getAttribute("data-y"),
          s = n.getAttribute("data-scale"),
          u = Date.now() - Number(n.getAttribute("data-hold")),
          l = 350 - u;
      0 > l && (l = 0), setTimeout(function () {
        var t = {
          top: r + "px",
          left: o + "px",
          opacity: "0",
          "-webkit-transition-duration": c.duration + "ms",
          "-moz-transition-duration": c.duration + "ms",
          "-o-transition-duration": c.duration + "ms",
          "transition-duration": c.duration + "ms",
          "-webkit-transform": s,
          "-moz-transform": s,
          "-ms-transform": s,
          "-o-transform": s,
          transform: s
        };
        n.setAttribute("style", i(t)), setTimeout(function () {
          try {
            e.removeChild(n);
          } catch (t) {
            return !1;
          }
        }, c.duration);
      }, l);
    },
    wrapInput: function wrapInput(t) {
      for (var e = 0; e < t.length; e++) {
        var n = t[e];

        if ("input" === n.tagName.toLowerCase()) {
          var a = n.parentNode;
          if ("i" === a.tagName.toLowerCase() && -1 !== a.className.indexOf("waves-effect")) continue;
          var i = document.createElement("i");
          i.className = n.className + " waves-input-wrapper";
          var o = n.getAttribute("style");
          o || (o = ""), i.setAttribute("style", o), n.className = "waves-button-input", n.removeAttribute("style"), a.replaceChild(i, n), i.appendChild(n);
        }
      }
    }
  },
      d = {
    touches: 0,
    allowEvent: function allowEvent(t) {
      var e = !0;
      return "touchstart" === t.type ? d.touches += 1 : "touchend" === t.type || "touchcancel" === t.type ? setTimeout(function () {
        d.touches > 0 && (d.touches -= 1);
      }, 500) : "mousedown" === t.type && d.touches > 0 && (e = !1), e;
    },
    touchup: function touchup(t) {
      d.allowEvent(t);
    }
  };
  s.displayEffect = function (e) {
    e = e || {}, "duration" in e && (c.duration = e.duration), c.wrapInput(u(".waves-effect")), "ontouchstart" in t && document.body.addEventListener("touchstart", r, !1), document.body.addEventListener("mousedown", r, !1);
  }, s.attach = function (e) {
    "input" === e.tagName.toLowerCase() && (c.wrapInput([e]), e = e.parentElement), "ontouchstart" in t && e.addEventListener("touchstart", r, !1), e.addEventListener("mousedown", r, !1);
  }, t.Waves = s, document.addEventListener("DOMContentLoaded", function () {
    s.displayEffect();
  }, !1);
}(window);

/***/ }),

/***/ 4:
/*!**************************************************************************************************************************************************!*\
  !*** multi ./resources/assets/admin/js/main/waves.js ./resources/assets/admin/js/main/sidebarmenu.js ./resources/assets/admin/js/main/custom.js ***!
  \**************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! E:\Laravel\cv-ssi\resources\assets\admin\js\main\waves.js */"./resources/assets/admin/js/main/waves.js");
__webpack_require__(/*! E:\Laravel\cv-ssi\resources\assets\admin\js\main\sidebarmenu.js */"./resources/assets/admin/js/main/sidebarmenu.js");
module.exports = __webpack_require__(/*! E:\Laravel\cv-ssi\resources\assets\admin\js\main\custom.js */"./resources/assets/admin/js/main/custom.js");


/***/ })

/******/ });