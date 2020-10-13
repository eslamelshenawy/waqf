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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./Resources/assets/js/frameworks/bootstrap.min.js":
/*!*********************************************************!*\
  !*** ./Resources/assets/js/frameworks/bootstrap.min.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (t, e) {
  "object" == ( false ? undefined : _typeof(exports)) && "undefined" != typeof module ? e(exports, __webpack_require__(!(function webpackMissingModule() { var e = new Error("Cannot find module 'jquery'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())), __webpack_require__(!(function webpackMissingModule() { var e = new Error("Cannot find module 'popper.js'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()))) :  true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [exports, !(function webpackMissingModule() { var e = new Error("Cannot find module 'jquery'"); e.code = 'MODULE_NOT_FOUND'; throw e; }()), !(function webpackMissingModule() { var e = new Error("Cannot find module 'popper.js'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())], __WEBPACK_AMD_DEFINE_FACTORY__ = (e),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function (t, e, c) {
  "use strict";

  function i(t, e) {
    for (var n = 0; n < e.length; n++) {
      var i = e[n];
      i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i);
    }
  }

  function o(t, e, n) {
    return e && i(t.prototype, e), n && i(t, n), t;
  }

  function u() {
    return (u = Object.assign || function (t) {
      for (var e = 1; e < arguments.length; e++) {
        var n = arguments[e];

        for (var i in n) {
          Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
        }
      }

      return t;
    }).apply(this, arguments);
  }

  e = e && e.hasOwnProperty("default") ? e["default"] : e, c = c && c.hasOwnProperty("default") ? c["default"] : c;

  var s,
      n,
      r,
      a,
      l,
      h,
      d,
      f,
      g,
      _,
      m,
      p,
      v,
      E,
      y,
      C,
      T,
      b,
      I,
      w,
      A,
      D,
      S,
      N,
      O,
      k,
      P,
      j,
      H,
      L,
      R,
      x,
      U,
      W,
      K,
      M,
      Q,
      B,
      F,
      V,
      Y,
      q,
      z,
      Z,
      J,
      $,
      G,
      X,
      tt,
      et,
      nt,
      it,
      st,
      rt,
      ot,
      at,
      lt,
      ht,
      ct,
      ut,
      dt,
      ft,
      gt,
      _t,
      mt,
      pt,
      vt,
      Et,
      yt,
      Ct,
      Tt,
      bt,
      It,
      wt,
      At,
      Dt,
      St,
      Nt,
      Ot,
      kt,
      Pt,
      jt,
      Ht,
      Lt,
      Rt,
      xt,
      Ut,
      Wt,
      Kt,
      Mt,
      Qt,
      Bt,
      Ft,
      Vt,
      Yt,
      qt,
      zt,
      Zt,
      Jt,
      $t,
      Gt,
      Xt,
      te,
      ee,
      ne,
      ie,
      se,
      re,
      oe,
      ae,
      le,
      he,
      ce,
      ue,
      de,
      fe,
      ge,
      _e,
      me,
      pe,
      ve,
      Ee,
      ye,
      Ce,
      Te,
      be,
      Ie,
      we,
      Ae,
      De,
      Se,
      Ne,
      Oe,
      ke,
      Pe,
      je,
      He,
      Le,
      Re,
      xe,
      Ue,
      We,
      Ke,
      Me = (Ue = e, We = !1, Ke = {
    TRANSITION_END: "bsTransitionEnd",
    getUID: function getUID(t) {
      for (; t += ~~(1e6 * Math.random()), document.getElementById(t);) {
        ;
      }

      return t;
    },
    getSelectorFromElement: function getSelectorFromElement(t) {
      var e,
          n = t.getAttribute("data-target");
      n && "#" !== n || (n = t.getAttribute("href") || ""), "#" === n.charAt(0) && (e = n, n = e = "function" == typeof Ue.escapeSelector ? Ue.escapeSelector(e).substr(1) : e.replace(/(:|\.|\[|\]|,|=|@)/g, "\\$1"));

      try {
        return 0 < Ue(document).find(n).length ? n : null;
      } catch (t) {
        return null;
      }
    },
    reflow: function reflow(t) {
      return t.offsetHeight;
    },
    triggerTransitionEnd: function triggerTransitionEnd(t) {
      Ue(t).trigger(We.end);
    },
    supportsTransitionEnd: function supportsTransitionEnd() {
      return Boolean(We);
    },
    isElement: function isElement(t) {
      return (t[0] || t).nodeType;
    },
    typeCheckConfig: function typeCheckConfig(t, e, n) {
      for (var i in n) {
        if (Object.prototype.hasOwnProperty.call(n, i)) {
          var s = n[i],
              r = e[i],
              o = r && Ke.isElement(r) ? "element" : (a = r, {}.toString.call(a).match(/\s([a-zA-Z]+)/)[1].toLowerCase());
          if (!new RegExp(s).test(o)) throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + o + '" but expected type "' + s + '".');
        }
      }

      var a;
    }
  }, We = ("undefined" == typeof window || !window.QUnit) && {
    end: "transitionend"
  }, Ue.fn.emulateTransitionEnd = function (t) {
    var e = this,
        n = !1;
    return Ue(this).one(Ke.TRANSITION_END, function () {
      n = !0;
    }), setTimeout(function () {
      n || Ke.triggerTransitionEnd(e);
    }, t), this;
  }, Ke.supportsTransitionEnd() && (Ue.event.special[Ke.TRANSITION_END] = {
    bindType: We.end,
    delegateType: We.end,
    handle: function handle(t) {
      if (Ue(t.target).is(this)) return t.handleObj.handler.apply(this, arguments);
    }
  }), Ke),
      Qe = (n = "alert", a = "." + (r = "bs.alert"), l = (s = e).fn[n], h = {
    CLOSE: "close" + a,
    CLOSED: "closed" + a,
    CLICK_DATA_API: "click" + a + ".data-api"
  }, "alert", "fade", "show", d = function () {
    function i(t) {
      this._element = t;
    }

    var t = i.prototype;
    return t.close = function (t) {
      t = t || this._element;

      var e = this._getRootElement(t);

      this._triggerCloseEvent(e).isDefaultPrevented() || this._removeElement(e);
    }, t.dispose = function () {
      s.removeData(this._element, r), this._element = null;
    }, t._getRootElement = function (t) {
      var e = Me.getSelectorFromElement(t),
          n = !1;
      return e && (n = s(e)[0]), n || (n = s(t).closest(".alert")[0]), n;
    }, t._triggerCloseEvent = function (t) {
      var e = s.Event(h.CLOSE);
      return s(t).trigger(e), e;
    }, t._removeElement = function (e) {
      var n = this;
      s(e).removeClass("show"), Me.supportsTransitionEnd() && s(e).hasClass("fade") ? s(e).one(Me.TRANSITION_END, function (t) {
        return n._destroyElement(e, t);
      }).emulateTransitionEnd(150) : this._destroyElement(e);
    }, t._destroyElement = function (t) {
      s(t).detach().trigger(h.CLOSED).remove();
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = s(this),
            e = t.data(r);
        e || (e = new i(this), t.data(r, e)), "close" === n && e[n](this);
      });
    }, i._handleDismiss = function (e) {
      return function (t) {
        t && t.preventDefault(), e.close(this);
      };
    }, o(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }]), i;
  }(), s(document).on(h.CLICK_DATA_API, '[data-dismiss="alert"]', d._handleDismiss(new d())), s.fn[n] = d._jQueryInterface, s.fn[n].Constructor = d, s.fn[n].noConflict = function () {
    return s.fn[n] = l, d._jQueryInterface;
  }, d),
      Be = (g = "button", m = "." + (_ = "bs.button"), p = ".data-api", v = (f = e).fn[g], E = "active", "btn", y = '[data-toggle^="button"]', '[data-toggle="buttons"]', "input", ".active", C = ".btn", T = {
    CLICK_DATA_API: "click" + m + p,
    FOCUS_BLUR_DATA_API: "focus" + m + p + " blur" + m + p
  }, b = function () {
    function n(t) {
      this._element = t;
    }

    var t = n.prototype;
    return t.toggle = function () {
      var t = !0,
          e = !0,
          n = f(this._element).closest('[data-toggle="buttons"]')[0];

      if (n) {
        var i = f(this._element).find("input")[0];

        if (i) {
          if ("radio" === i.type) if (i.checked && f(this._element).hasClass(E)) t = !1;else {
            var s = f(n).find(".active")[0];
            s && f(s).removeClass(E);
          }

          if (t) {
            if (i.hasAttribute("disabled") || n.hasAttribute("disabled") || i.classList.contains("disabled") || n.classList.contains("disabled")) return;
            i.checked = !f(this._element).hasClass(E), f(i).trigger("change");
          }

          i.focus(), e = !1;
        }
      }

      e && this._element.setAttribute("aria-pressed", !f(this._element).hasClass(E)), t && f(this._element).toggleClass(E);
    }, t.dispose = function () {
      f.removeData(this._element, _), this._element = null;
    }, n._jQueryInterface = function (e) {
      return this.each(function () {
        var t = f(this).data(_);
        t || (t = new n(this), f(this).data(_, t)), "toggle" === e && t[e]();
      });
    }, o(n, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }]), n;
  }(), f(document).on(T.CLICK_DATA_API, y, function (t) {
    t.preventDefault();
    var e = t.target;
    f(e).hasClass("btn") || (e = f(e).closest(C)), b._jQueryInterface.call(f(e), "toggle");
  }).on(T.FOCUS_BLUR_DATA_API, y, function (t) {
    var e = f(t.target).closest(C)[0];
    f(e).toggleClass("focus", /^focus(in)?$/.test(t.type));
  }), f.fn[g] = b._jQueryInterface, f.fn[g].Constructor = b, f.fn[g].noConflict = function () {
    return f.fn[g] = v, b._jQueryInterface;
  }, b),
      Fe = (ye = "carousel", Te = "." + (Ce = "bs.carousel"), be = (Ee = e).fn[ye], Ie = {
    interval: 5e3,
    keyboard: !0,
    slide: !1,
    pause: "hover",
    wrap: !0
  }, we = {
    interval: "(number|boolean)",
    keyboard: "boolean",
    slide: "(boolean|string)",
    pause: "(string|boolean)",
    wrap: "boolean"
  }, Ae = "next", De = "prev", Se = {
    SLIDE: "slide" + Te,
    SLID: "slid" + Te,
    KEYDOWN: "keydown" + Te,
    MOUSEENTER: "mouseenter" + Te,
    MOUSELEAVE: "mouseleave" + Te,
    TOUCHEND: "touchend" + Te,
    LOAD_DATA_API: "load" + Te + ".data-api",
    CLICK_DATA_API: "click" + Te + ".data-api"
  }, Ne = "active", Oe = ".active", ke = ".active.carousel-item", Pe = ".carousel-item", je = ".carousel-item-next, .carousel-item-prev", He = ".carousel-indicators", Le = "[data-slide], [data-slide-to]", Re = '[data-ride="carousel"]', xe = function () {
    function r(t, e) {
      this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this._config = this._getConfig(e), this._element = Ee(t)[0], this._indicatorsElement = Ee(this._element).find(He)[0], this._addEventListeners();
    }

    var t = r.prototype;
    return t.next = function () {
      this._isSliding || this._slide(Ae);
    }, t.nextWhenVisible = function () {
      !document.hidden && Ee(this._element).is(":visible") && "hidden" !== Ee(this._element).css("visibility") && this.next();
    }, t.prev = function () {
      this._isSliding || this._slide(De);
    }, t.pause = function (t) {
      t || (this._isPaused = !0), Ee(this._element).find(je)[0] && Me.supportsTransitionEnd() && (Me.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null;
    }, t.cycle = function (t) {
      t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval));
    }, t.to = function (t) {
      var e = this;
      this._activeElement = Ee(this._element).find(ke)[0];

      var n = this._getItemIndex(this._activeElement);

      if (!(t > this._items.length - 1 || t < 0)) if (this._isSliding) Ee(this._element).one(Se.SLID, function () {
        return e.to(t);
      });else {
        if (n === t) return this.pause(), void this.cycle();
        var i = n < t ? Ae : De;

        this._slide(i, this._items[t]);
      }
    }, t.dispose = function () {
      Ee(this._element).off(Te), Ee.removeData(this._element, Ce), this._items = null, this._config = null, this._element = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null;
    }, t._getConfig = function (t) {
      return t = u({}, Ie, t), Me.typeCheckConfig(ye, t, we), t;
    }, t._addEventListeners = function () {
      var e = this;
      this._config.keyboard && Ee(this._element).on(Se.KEYDOWN, function (t) {
        return e._keydown(t);
      }), "hover" === this._config.pause && (Ee(this._element).on(Se.MOUSEENTER, function (t) {
        return e.pause(t);
      }).on(Se.MOUSELEAVE, function (t) {
        return e.cycle(t);
      }), "ontouchstart" in document.documentElement && Ee(this._element).on(Se.TOUCHEND, function () {
        e.pause(), e.touchTimeout && clearTimeout(e.touchTimeout), e.touchTimeout = setTimeout(function (t) {
          return e.cycle(t);
        }, 500 + e._config.interval);
      }));
    }, t._keydown = function (t) {
      if (!/input|textarea/i.test(t.target.tagName)) switch (t.which) {
        case 37:
          t.preventDefault(), this.prev();
          break;

        case 39:
          t.preventDefault(), this.next();
      }
    }, t._getItemIndex = function (t) {
      return this._items = Ee.makeArray(Ee(t).parent().find(Pe)), this._items.indexOf(t);
    }, t._getItemByDirection = function (t, e) {
      var n = t === Ae,
          i = t === De,
          s = this._getItemIndex(e),
          r = this._items.length - 1;

      if ((i && 0 === s || n && s === r) && !this._config.wrap) return e;
      var o = (s + (t === De ? -1 : 1)) % this._items.length;
      return -1 === o ? this._items[this._items.length - 1] : this._items[o];
    }, t._triggerSlideEvent = function (t, e) {
      var n = this._getItemIndex(t),
          i = this._getItemIndex(Ee(this._element).find(ke)[0]),
          s = Ee.Event(Se.SLIDE, {
        relatedTarget: t,
        direction: e,
        from: i,
        to: n
      });

      return Ee(this._element).trigger(s), s;
    }, t._setActiveIndicatorElement = function (t) {
      if (this._indicatorsElement) {
        Ee(this._indicatorsElement).find(Oe).removeClass(Ne);

        var e = this._indicatorsElement.children[this._getItemIndex(t)];

        e && Ee(e).addClass(Ne);
      }
    }, t._slide = function (t, e) {
      var n,
          i,
          s,
          r = this,
          o = Ee(this._element).find(ke)[0],
          a = this._getItemIndex(o),
          l = e || o && this._getItemByDirection(t, o),
          h = this._getItemIndex(l),
          c = Boolean(this._interval);

      if (t === Ae ? (n = "carousel-item-left", i = "carousel-item-next", s = "left") : (n = "carousel-item-right", i = "carousel-item-prev", s = "right"), l && Ee(l).hasClass(Ne)) this._isSliding = !1;else if (!this._triggerSlideEvent(l, s).isDefaultPrevented() && o && l) {
        this._isSliding = !0, c && this.pause(), this._setActiveIndicatorElement(l);
        var u = Ee.Event(Se.SLID, {
          relatedTarget: l,
          direction: s,
          from: a,
          to: h
        });
        Me.supportsTransitionEnd() && Ee(this._element).hasClass("slide") ? (Ee(l).addClass(i), Me.reflow(l), Ee(o).addClass(n), Ee(l).addClass(n), Ee(o).one(Me.TRANSITION_END, function () {
          Ee(l).removeClass(n + " " + i).addClass(Ne), Ee(o).removeClass(Ne + " " + i + " " + n), r._isSliding = !1, setTimeout(function () {
            return Ee(r._element).trigger(u);
          }, 0);
        }).emulateTransitionEnd(600)) : (Ee(o).removeClass(Ne), Ee(l).addClass(Ne), this._isSliding = !1, Ee(this._element).trigger(u)), c && this.cycle();
      }
    }, r._jQueryInterface = function (i) {
      return this.each(function () {
        var t = Ee(this).data(Ce),
            e = u({}, Ie, Ee(this).data());
        "object" == _typeof(i) && (e = u({}, e, i));
        var n = "string" == typeof i ? i : e.slide;
        if (t || (t = new r(this, e), Ee(this).data(Ce, t)), "number" == typeof i) t.to(i);else if ("string" == typeof n) {
          if (void 0 === t[n]) throw new TypeError('No method named "' + n + '"');
          t[n]();
        } else e.interval && (t.pause(), t.cycle());
      });
    }, r._dataApiClickHandler = function (t) {
      var e = Me.getSelectorFromElement(this);

      if (e) {
        var n = Ee(e)[0];

        if (n && Ee(n).hasClass("carousel")) {
          var i = u({}, Ee(n).data(), Ee(this).data()),
              s = this.getAttribute("data-slide-to");
          s && (i.interval = !1), r._jQueryInterface.call(Ee(n), i), s && Ee(n).data(Ce).to(s), t.preventDefault();
        }
      }
    }, o(r, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }, {
      key: "Default",
      get: function get() {
        return Ie;
      }
    }]), r;
  }(), Ee(document).on(Se.CLICK_DATA_API, Le, xe._dataApiClickHandler), Ee(window).on(Se.LOAD_DATA_API, function () {
    Ee(Re).each(function () {
      var t = Ee(this);

      xe._jQueryInterface.call(t, t.data());
    });
  }), Ee.fn[ye] = xe._jQueryInterface, Ee.fn[ye].Constructor = xe, Ee.fn[ye].noConflict = function () {
    return Ee.fn[ye] = be, xe._jQueryInterface;
  }, xe),
      Ve = (re = "collapse", ae = "." + (oe = "bs.collapse"), le = (se = e).fn[re], he = {
    toggle: !0,
    parent: ""
  }, ce = {
    toggle: "boolean",
    parent: "(string|element)"
  }, ue = {
    SHOW: "show" + ae,
    SHOWN: "shown" + ae,
    HIDE: "hide" + ae,
    HIDDEN: "hidden" + ae,
    CLICK_DATA_API: "click" + ae + ".data-api"
  }, de = "show", fe = "collapse", ge = "collapsing", _e = "collapsed", me = ".show, .collapsing", pe = '[data-toggle="collapse"]', ve = function () {
    function a(t, e) {
      this._isTransitioning = !1, this._element = t, this._config = this._getConfig(e), this._triggerArray = se.makeArray(se('[data-toggle="collapse"][href="#' + t.id + '"],[data-toggle="collapse"][data-target="#' + t.id + '"]'));

      for (var n = se(pe), i = 0; i < n.length; i++) {
        var s = n[i],
            r = Me.getSelectorFromElement(s);
        null !== r && 0 < se(r).filter(t).length && (this._selector = r, this._triggerArray.push(s));
      }

      this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle();
    }

    var t = a.prototype;
    return t.toggle = function () {
      se(this._element).hasClass(de) ? this.hide() : this.show();
    }, t.show = function () {
      var t,
          e,
          n = this;

      if (!(this._isTransitioning || se(this._element).hasClass(de) || (this._parent && 0 === (t = se.makeArray(se(this._parent).find(me).filter('[data-parent="' + this._config.parent + '"]'))).length && (t = null), t && (e = se(t).not(this._selector).data(oe)) && e._isTransitioning))) {
        var i = se.Event(ue.SHOW);

        if (se(this._element).trigger(i), !i.isDefaultPrevented()) {
          t && (a._jQueryInterface.call(se(t).not(this._selector), "hide"), e || se(t).data(oe, null));

          var s = this._getDimension();

          se(this._element).removeClass(fe).addClass(ge), (this._element.style[s] = 0) < this._triggerArray.length && se(this._triggerArray).removeClass(_e).attr("aria-expanded", !0), this.setTransitioning(!0);

          var r = function r() {
            se(n._element).removeClass(ge).addClass(fe).addClass(de), n._element.style[s] = "", n.setTransitioning(!1), se(n._element).trigger(ue.SHOWN);
          };

          if (Me.supportsTransitionEnd()) {
            var o = "scroll" + (s[0].toUpperCase() + s.slice(1));
            se(this._element).one(Me.TRANSITION_END, r).emulateTransitionEnd(600), this._element.style[s] = this._element[o] + "px";
          } else r();
        }
      }
    }, t.hide = function () {
      var t = this;

      if (!this._isTransitioning && se(this._element).hasClass(de)) {
        var e = se.Event(ue.HIDE);

        if (se(this._element).trigger(e), !e.isDefaultPrevented()) {
          var n = this._getDimension();

          if (this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", Me.reflow(this._element), se(this._element).addClass(ge).removeClass(fe).removeClass(de), 0 < this._triggerArray.length) for (var i = 0; i < this._triggerArray.length; i++) {
            var s = this._triggerArray[i],
                r = Me.getSelectorFromElement(s);
            null !== r && (se(r).hasClass(de) || se(s).addClass(_e).attr("aria-expanded", !1));
          }
          this.setTransitioning(!0);

          var o = function o() {
            t.setTransitioning(!1), se(t._element).removeClass(ge).addClass(fe).trigger(ue.HIDDEN);
          };

          this._element.style[n] = "", Me.supportsTransitionEnd() ? se(this._element).one(Me.TRANSITION_END, o).emulateTransitionEnd(600) : o();
        }
      }
    }, t.setTransitioning = function (t) {
      this._isTransitioning = t;
    }, t.dispose = function () {
      se.removeData(this._element, oe), this._config = null, this._parent = null, this._element = null, this._triggerArray = null, this._isTransitioning = null;
    }, t._getConfig = function (t) {
      return (t = u({}, he, t)).toggle = Boolean(t.toggle), Me.typeCheckConfig(re, t, ce), t;
    }, t._getDimension = function () {
      return se(this._element).hasClass("width") ? "width" : "height";
    }, t._getParent = function () {
      var n = this,
          t = null;
      Me.isElement(this._config.parent) ? (t = this._config.parent, void 0 !== this._config.parent.jquery && (t = this._config.parent[0])) : t = se(this._config.parent)[0];
      var e = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]';
      return se(t).find(e).each(function (t, e) {
        n._addAriaAndCollapsedClass(a._getTargetFromElement(e), [e]);
      }), t;
    }, t._addAriaAndCollapsedClass = function (t, e) {
      if (t) {
        var n = se(t).hasClass(de);
        0 < e.length && se(e).toggleClass(_e, !n).attr("aria-expanded", n);
      }
    }, a._getTargetFromElement = function (t) {
      var e = Me.getSelectorFromElement(t);
      return e ? se(e)[0] : null;
    }, a._jQueryInterface = function (i) {
      return this.each(function () {
        var t = se(this),
            e = t.data(oe),
            n = u({}, he, t.data(), "object" == _typeof(i) && i);

        if (!e && n.toggle && /show|hide/.test(i) && (n.toggle = !1), e || (e = new a(this, n), t.data(oe, e)), "string" == typeof i) {
          if (void 0 === e[i]) throw new TypeError('No method named "' + i + '"');
          e[i]();
        }
      });
    }, o(a, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }, {
      key: "Default",
      get: function get() {
        return he;
      }
    }]), a;
  }(), se(document).on(ue.CLICK_DATA_API, pe, function (t) {
    "A" === t.currentTarget.tagName && t.preventDefault();
    var n = se(this),
        e = Me.getSelectorFromElement(this);
    se(e).each(function () {
      var t = se(this),
          e = t.data(oe) ? "toggle" : n.data();

      ve._jQueryInterface.call(t, e);
    });
  }), se.fn[re] = ve._jQueryInterface, se.fn[re].Constructor = ve, se.fn[re].noConflict = function () {
    return se.fn[re] = le, ve._jQueryInterface;
  }, ve),
      Ye = (Bt = "dropdown", Vt = "." + (Ft = "bs.dropdown"), Yt = ".data-api", qt = (Qt = e).fn[Bt], zt = new RegExp("38|40|27"), Zt = {
    HIDE: "hide" + Vt,
    HIDDEN: "hidden" + Vt,
    SHOW: "show" + Vt,
    SHOWN: "shown" + Vt,
    CLICK: "click" + Vt,
    CLICK_DATA_API: "click" + Vt + Yt,
    KEYDOWN_DATA_API: "keydown" + Vt + Yt,
    KEYUP_DATA_API: "keyup" + Vt + Yt
  }, Jt = "disabled", $t = "show", Gt = "dropdown-menu-right", Xt = '[data-toggle="dropdown"]', te = ".dropdown-menu", ee = {
    offset: 0,
    flip: !0,
    boundary: "scrollParent"
  }, ne = {
    offset: "(number|string|function)",
    flip: "boolean",
    boundary: "(string|element)"
  }, ie = function () {
    function l(t, e) {
      this._element = t, this._popper = null, this._config = this._getConfig(e), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners();
    }

    var t = l.prototype;
    return t.toggle = function () {
      if (!this._element.disabled && !Qt(this._element).hasClass(Jt)) {
        var t = l._getParentFromElement(this._element),
            e = Qt(this._menu).hasClass($t);

        if (l._clearMenus(), !e) {
          var n = {
            relatedTarget: this._element
          },
              i = Qt.Event(Zt.SHOW, n);

          if (Qt(t).trigger(i), !i.isDefaultPrevented()) {
            if (!this._inNavbar) {
              if (void 0 === c) throw new TypeError("Bootstrap dropdown require Popper.js (https://popper.js.org)");
              var s = this._element;
              Qt(t).hasClass("dropup") && (Qt(this._menu).hasClass("dropdown-menu-left") || Qt(this._menu).hasClass(Gt)) && (s = t), "scrollParent" !== this._config.boundary && Qt(t).addClass("position-static"), this._popper = new c(s, this._menu, this._getPopperConfig());
            }

            "ontouchstart" in document.documentElement && 0 === Qt(t).closest(".navbar-nav").length && Qt("body").children().on("mouseover", null, Qt.noop), this._element.focus(), this._element.setAttribute("aria-expanded", !0), Qt(this._menu).toggleClass($t), Qt(t).toggleClass($t).trigger(Qt.Event(Zt.SHOWN, n));
          }
        }
      }
    }, t.dispose = function () {
      Qt.removeData(this._element, Ft), Qt(this._element).off(Vt), this._element = null, (this._menu = null) !== this._popper && (this._popper.destroy(), this._popper = null);
    }, t.update = function () {
      this._inNavbar = this._detectNavbar(), null !== this._popper && this._popper.scheduleUpdate();
    }, t._addEventListeners = function () {
      var e = this;
      Qt(this._element).on(Zt.CLICK, function (t) {
        t.preventDefault(), t.stopPropagation(), e.toggle();
      });
    }, t._getConfig = function (t) {
      return t = u({}, this.constructor.Default, Qt(this._element).data(), t), Me.typeCheckConfig(Bt, t, this.constructor.DefaultType), t;
    }, t._getMenuElement = function () {
      if (!this._menu) {
        var t = l._getParentFromElement(this._element);

        this._menu = Qt(t).find(te)[0];
      }

      return this._menu;
    }, t._getPlacement = function () {
      var t = Qt(this._element).parent(),
          e = "bottom-start";
      return t.hasClass("dropup") ? (e = "top-start", Qt(this._menu).hasClass(Gt) && (e = "top-end")) : t.hasClass("dropright") ? e = "right-start" : t.hasClass("dropleft") ? e = "left-start" : Qt(this._menu).hasClass(Gt) && (e = "bottom-end"), e;
    }, t._detectNavbar = function () {
      return 0 < Qt(this._element).closest(".navbar").length;
    }, t._getPopperConfig = function () {
      var e = this,
          t = {};
      return "function" == typeof this._config.offset ? t.fn = function (t) {
        return t.offsets = u({}, t.offsets, e._config.offset(t.offsets) || {}), t;
      } : t.offset = this._config.offset, {
        placement: this._getPlacement(),
        modifiers: {
          offset: t,
          flip: {
            enabled: this._config.flip
          },
          preventOverflow: {
            boundariesElement: this._config.boundary
          }
        }
      };
    }, l._jQueryInterface = function (e) {
      return this.each(function () {
        var t = Qt(this).data(Ft);

        if (t || (t = new l(this, "object" == _typeof(e) ? e : null), Qt(this).data(Ft, t)), "string" == typeof e) {
          if (void 0 === t[e]) throw new TypeError('No method named "' + e + '"');
          t[e]();
        }
      });
    }, l._clearMenus = function (t) {
      if (!t || 3 !== t.which && ("keyup" !== t.type || 9 === t.which)) for (var e = Qt.makeArray(Qt(Xt)), n = 0; n < e.length; n++) {
        var i = l._getParentFromElement(e[n]),
            s = Qt(e[n]).data(Ft),
            r = {
          relatedTarget: e[n]
        };

        if (s) {
          var o = s._menu;

          if (Qt(i).hasClass($t) && !(t && ("click" === t.type && /input|textarea/i.test(t.target.tagName) || "keyup" === t.type && 9 === t.which) && Qt.contains(i, t.target))) {
            var a = Qt.Event(Zt.HIDE, r);
            Qt(i).trigger(a), a.isDefaultPrevented() || ("ontouchstart" in document.documentElement && Qt("body").children().off("mouseover", null, Qt.noop), e[n].setAttribute("aria-expanded", "false"), Qt(o).removeClass($t), Qt(i).removeClass($t).trigger(Qt.Event(Zt.HIDDEN, r)));
          }
        }
      }
    }, l._getParentFromElement = function (t) {
      var e,
          n = Me.getSelectorFromElement(t);
      return n && (e = Qt(n)[0]), e || t.parentNode;
    }, l._dataApiKeydownHandler = function (t) {
      if ((/input|textarea/i.test(t.target.tagName) ? !(32 === t.which || 27 !== t.which && (40 !== t.which && 38 !== t.which || Qt(t.target).closest(te).length)) : zt.test(t.which)) && (t.preventDefault(), t.stopPropagation(), !this.disabled && !Qt(this).hasClass(Jt))) {
        var e = l._getParentFromElement(this),
            n = Qt(e).hasClass($t);

        if ((n || 27 === t.which && 32 === t.which) && (!n || 27 !== t.which && 32 !== t.which)) {
          var i = Qt(e).find(".dropdown-menu .dropdown-item:not(.disabled)").get();

          if (0 !== i.length) {
            var s = i.indexOf(t.target);
            38 === t.which && 0 < s && s--, 40 === t.which && s < i.length - 1 && s++, s < 0 && (s = 0), i[s].focus();
          }
        } else {
          if (27 === t.which) {
            var r = Qt(e).find(Xt)[0];
            Qt(r).trigger("focus");
          }

          Qt(this).trigger("click");
        }
      }
    }, o(l, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }, {
      key: "Default",
      get: function get() {
        return ee;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return ne;
      }
    }]), l;
  }(), Qt(document).on(Zt.KEYDOWN_DATA_API, Xt, ie._dataApiKeydownHandler).on(Zt.KEYDOWN_DATA_API, te, ie._dataApiKeydownHandler).on(Zt.CLICK_DATA_API + " " + Zt.KEYUP_DATA_API, ie._clearMenus).on(Zt.CLICK_DATA_API, Xt, function (t) {
    t.preventDefault(), t.stopPropagation(), ie._jQueryInterface.call(Qt(this), "toggle");
  }).on(Zt.CLICK_DATA_API, ".dropdown form", function (t) {
    t.stopPropagation();
  }), Qt.fn[Bt] = ie._jQueryInterface, Qt.fn[Bt].Constructor = ie, Qt.fn[Bt].noConflict = function () {
    return Qt.fn[Bt] = qt, ie._jQueryInterface;
  }, ie),
      qe = (Dt = "." + (At = "bs.modal"), St = (wt = e).fn.modal, Nt = {
    backdrop: !0,
    keyboard: !0,
    focus: !0,
    show: !0
  }, Ot = {
    backdrop: "(boolean|string)",
    keyboard: "boolean",
    focus: "boolean",
    show: "boolean"
  }, kt = {
    HIDE: "hide" + Dt,
    HIDDEN: "hidden" + Dt,
    SHOW: "show" + Dt,
    SHOWN: "shown" + Dt,
    FOCUSIN: "focusin" + Dt,
    RESIZE: "resize" + Dt,
    CLICK_DISMISS: "click.dismiss" + Dt,
    KEYDOWN_DISMISS: "keydown.dismiss" + Dt,
    MOUSEUP_DISMISS: "mouseup.dismiss" + Dt,
    MOUSEDOWN_DISMISS: "mousedown.dismiss" + Dt,
    CLICK_DATA_API: "click" + Dt + ".data-api"
  }, Pt = "modal-open", jt = "fade", Ht = "show", Lt = ".modal-dialog", Rt = '[data-toggle="modal"]', xt = '[data-dismiss="modal"]', Ut = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", Wt = ".sticky-top", Kt = ".navbar-toggler", Mt = function () {
    function s(t, e) {
      this._config = this._getConfig(e), this._element = t, this._dialog = wt(t).find(Lt)[0], this._backdrop = null, this._isShown = !1, this._isBodyOverflowing = !1, this._ignoreBackdropClick = !1, this._originalBodyPadding = 0, this._scrollbarWidth = 0;
    }

    var t = s.prototype;
    return t.toggle = function (t) {
      return this._isShown ? this.hide() : this.show(t);
    }, t.show = function (t) {
      var e = this;

      if (!this._isTransitioning && !this._isShown) {
        Me.supportsTransitionEnd() && wt(this._element).hasClass(jt) && (this._isTransitioning = !0);
        var n = wt.Event(kt.SHOW, {
          relatedTarget: t
        });
        wt(this._element).trigger(n), this._isShown || n.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), wt(document.body).addClass(Pt), this._setEscapeEvent(), this._setResizeEvent(), wt(this._element).on(kt.CLICK_DISMISS, xt, function (t) {
          return e.hide(t);
        }), wt(this._dialog).on(kt.MOUSEDOWN_DISMISS, function () {
          wt(e._element).one(kt.MOUSEUP_DISMISS, function (t) {
            wt(t.target).is(e._element) && (e._ignoreBackdropClick = !0);
          });
        }), this._showBackdrop(function () {
          return e._showElement(t);
        }));
      }
    }, t.hide = function (t) {
      var e = this;

      if (t && t.preventDefault(), !this._isTransitioning && this._isShown) {
        var n = wt.Event(kt.HIDE);

        if (wt(this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
          this._isShown = !1;
          var i = Me.supportsTransitionEnd() && wt(this._element).hasClass(jt);
          i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), wt(document).off(kt.FOCUSIN), wt(this._element).removeClass(Ht), wt(this._element).off(kt.CLICK_DISMISS), wt(this._dialog).off(kt.MOUSEDOWN_DISMISS), i ? wt(this._element).one(Me.TRANSITION_END, function (t) {
            return e._hideModal(t);
          }).emulateTransitionEnd(300) : this._hideModal();
        }
      }
    }, t.dispose = function () {
      wt.removeData(this._element, At), wt(window, document, this._element, this._backdrop).off(Dt), this._config = null, this._element = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._scrollbarWidth = null;
    }, t.handleUpdate = function () {
      this._adjustDialog();
    }, t._getConfig = function (t) {
      return t = u({}, Nt, t), Me.typeCheckConfig("modal", t, Ot), t;
    }, t._showElement = function (t) {
      var e = this,
          n = Me.supportsTransitionEnd() && wt(this._element).hasClass(jt);
      this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.scrollTop = 0, n && Me.reflow(this._element), wt(this._element).addClass(Ht), this._config.focus && this._enforceFocus();

      var i = wt.Event(kt.SHOWN, {
        relatedTarget: t
      }),
          s = function s() {
        e._config.focus && e._element.focus(), e._isTransitioning = !1, wt(e._element).trigger(i);
      };

      n ? wt(this._dialog).one(Me.TRANSITION_END, s).emulateTransitionEnd(300) : s();
    }, t._enforceFocus = function () {
      var e = this;
      wt(document).off(kt.FOCUSIN).on(kt.FOCUSIN, function (t) {
        document !== t.target && e._element !== t.target && 0 === wt(e._element).has(t.target).length && e._element.focus();
      });
    }, t._setEscapeEvent = function () {
      var e = this;
      this._isShown && this._config.keyboard ? wt(this._element).on(kt.KEYDOWN_DISMISS, function (t) {
        27 === t.which && (t.preventDefault(), e.hide());
      }) : this._isShown || wt(this._element).off(kt.KEYDOWN_DISMISS);
    }, t._setResizeEvent = function () {
      var e = this;
      this._isShown ? wt(window).on(kt.RESIZE, function (t) {
        return e.handleUpdate(t);
      }) : wt(window).off(kt.RESIZE);
    }, t._hideModal = function () {
      var t = this;
      this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._isTransitioning = !1, this._showBackdrop(function () {
        wt(document.body).removeClass(Pt), t._resetAdjustments(), t._resetScrollbar(), wt(t._element).trigger(kt.HIDDEN);
      });
    }, t._removeBackdrop = function () {
      this._backdrop && (wt(this._backdrop).remove(), this._backdrop = null);
    }, t._showBackdrop = function (t) {
      var e = this,
          n = wt(this._element).hasClass(jt) ? jt : "";

      if (this._isShown && this._config.backdrop) {
        var i = Me.supportsTransitionEnd() && n;
        if (this._backdrop = document.createElement("div"), this._backdrop.className = "modal-backdrop", n && wt(this._backdrop).addClass(n), wt(this._backdrop).appendTo(document.body), wt(this._element).on(kt.CLICK_DISMISS, function (t) {
          e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" === e._config.backdrop ? e._element.focus() : e.hide());
        }), i && Me.reflow(this._backdrop), wt(this._backdrop).addClass(Ht), !t) return;
        if (!i) return void t();
        wt(this._backdrop).one(Me.TRANSITION_END, t).emulateTransitionEnd(150);
      } else if (!this._isShown && this._backdrop) {
        wt(this._backdrop).removeClass(Ht);

        var s = function s() {
          e._removeBackdrop(), t && t();
        };

        Me.supportsTransitionEnd() && wt(this._element).hasClass(jt) ? wt(this._backdrop).one(Me.TRANSITION_END, s).emulateTransitionEnd(150) : s();
      } else t && t();
    }, t._adjustDialog = function () {
      var t = this._element.scrollHeight > document.documentElement.clientHeight;
      !this._isBodyOverflowing && t && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !t && (this._element.style.paddingRight = this._scrollbarWidth + "px");
    }, t._resetAdjustments = function () {
      this._element.style.paddingLeft = "", this._element.style.paddingRight = "";
    }, t._checkScrollbar = function () {
      var t = document.body.getBoundingClientRect();
      this._isBodyOverflowing = t.left + t.right < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth();
    }, t._setScrollbar = function () {
      var s = this;

      if (this._isBodyOverflowing) {
        wt(Ut).each(function (t, e) {
          var n = wt(e)[0].style.paddingRight,
              i = wt(e).css("padding-right");
          wt(e).data("padding-right", n).css("padding-right", parseFloat(i) + s._scrollbarWidth + "px");
        }), wt(Wt).each(function (t, e) {
          var n = wt(e)[0].style.marginRight,
              i = wt(e).css("margin-right");
          wt(e).data("margin-right", n).css("margin-right", parseFloat(i) - s._scrollbarWidth + "px");
        }), wt(Kt).each(function (t, e) {
          var n = wt(e)[0].style.marginRight,
              i = wt(e).css("margin-right");
          wt(e).data("margin-right", n).css("margin-right", parseFloat(i) + s._scrollbarWidth + "px");
        });
        var t = document.body.style.paddingRight,
            e = wt("body").css("padding-right");
        wt("body").data("padding-right", t).css("padding-right", parseFloat(e) + this._scrollbarWidth + "px");
      }
    }, t._resetScrollbar = function () {
      wt(Ut).each(function (t, e) {
        var n = wt(e).data("padding-right");
        void 0 !== n && wt(e).css("padding-right", n).removeData("padding-right");
      }), wt(Wt + ", " + Kt).each(function (t, e) {
        var n = wt(e).data("margin-right");
        void 0 !== n && wt(e).css("margin-right", n).removeData("margin-right");
      });
      var t = wt("body").data("padding-right");
      void 0 !== t && wt("body").css("padding-right", t).removeData("padding-right");
    }, t._getScrollbarWidth = function () {
      var t = document.createElement("div");
      t.className = "modal-scrollbar-measure", document.body.appendChild(t);
      var e = t.getBoundingClientRect().width - t.clientWidth;
      return document.body.removeChild(t), e;
    }, s._jQueryInterface = function (n, i) {
      return this.each(function () {
        var t = wt(this).data(At),
            e = u({}, s.Default, wt(this).data(), "object" == _typeof(n) && n);

        if (t || (t = new s(this, e), wt(this).data(At, t)), "string" == typeof n) {
          if (void 0 === t[n]) throw new TypeError('No method named "' + n + '"');
          t[n](i);
        } else e.show && t.show(i);
      });
    }, o(s, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }, {
      key: "Default",
      get: function get() {
        return Nt;
      }
    }]), s;
  }(), wt(document).on(kt.CLICK_DATA_API, Rt, function (t) {
    var e,
        n = this,
        i = Me.getSelectorFromElement(this);
    i && (e = wt(i)[0]);
    var s = wt(e).data(At) ? "toggle" : u({}, wt(e).data(), wt(this).data());
    "A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault();
    var r = wt(e).one(kt.SHOW, function (t) {
      t.isDefaultPrevented() || r.one(kt.HIDDEN, function () {
        wt(n).is(":visible") && n.focus();
      });
    });

    Mt._jQueryInterface.call(wt(e), s, this);
  }), wt.fn.modal = Mt._jQueryInterface, wt.fn.modal.Constructor = Mt, wt.fn.modal.noConflict = function () {
    return wt.fn.modal = St, Mt._jQueryInterface;
  }, Mt),
      ze = (ct = "tooltip", dt = "." + (ut = "bs.tooltip"), ft = (ht = e).fn[ct], gt = new RegExp("(^|\\s)bs-tooltip\\S+", "g"), pt = {
    animation: !0,
    template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
    trigger: "hover focus",
    title: "",
    delay: 0,
    html: !(mt = {
      AUTO: "auto",
      TOP: "top",
      RIGHT: "right",
      BOTTOM: "bottom",
      LEFT: "left"
    }),
    selector: !(_t = {
      animation: "boolean",
      template: "string",
      title: "(string|element|function)",
      trigger: "string",
      delay: "(number|object)",
      html: "boolean",
      selector: "(string|boolean)",
      placement: "(string|function)",
      offset: "(number|string)",
      container: "(string|element|boolean)",
      fallbackPlacement: "(string|array)",
      boundary: "(string|element)"
    }),
    placement: "top",
    offset: 0,
    container: !1,
    fallbackPlacement: "flip",
    boundary: "scrollParent"
  }, Et = {
    HIDE: "hide" + dt,
    HIDDEN: "hidden" + dt,
    SHOW: (vt = "show") + dt,
    SHOWN: "shown" + dt,
    INSERTED: "inserted" + dt,
    CLICK: "click" + dt,
    FOCUSIN: "focusin" + dt,
    FOCUSOUT: "focusout" + dt,
    MOUSEENTER: "mouseenter" + dt,
    MOUSELEAVE: "mouseleave" + dt
  }, yt = "fade", Ct = "show", Tt = "hover", bt = "focus", It = function () {
    function h(t, e) {
      if (void 0 === c) throw new TypeError("Bootstrap tooltips require Popper.js (https://popper.js.org)");
      this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this.element = t, this.config = this._getConfig(e), this.tip = null, this._setListeners();
    }

    var t = h.prototype;
    return t.enable = function () {
      this._isEnabled = !0;
    }, t.disable = function () {
      this._isEnabled = !1;
    }, t.toggleEnabled = function () {
      this._isEnabled = !this._isEnabled;
    }, t.toggle = function (t) {
      if (this._isEnabled) if (t) {
        var e = this.constructor.DATA_KEY,
            n = ht(t.currentTarget).data(e);
        n || (n = new this.constructor(t.currentTarget, this._getDelegateConfig()), ht(t.currentTarget).data(e, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n);
      } else {
        if (ht(this.getTipElement()).hasClass(Ct)) return void this._leave(null, this);

        this._enter(null, this);
      }
    }, t.dispose = function () {
      clearTimeout(this._timeout), ht.removeData(this.element, this.constructor.DATA_KEY), ht(this.element).off(this.constructor.EVENT_KEY), ht(this.element).closest(".modal").off("hide.bs.modal"), this.tip && ht(this.tip).remove(), this._isEnabled = null, this._timeout = null, this._hoverState = null, (this._activeTrigger = null) !== this._popper && this._popper.destroy(), this._popper = null, this.element = null, this.config = null, this.tip = null;
    }, t.show = function () {
      var e = this;
      if ("none" === ht(this.element).css("display")) throw new Error("Please use show on visible elements");
      var t = ht.Event(this.constructor.Event.SHOW);

      if (this.isWithContent() && this._isEnabled) {
        ht(this.element).trigger(t);
        var n = ht.contains(this.element.ownerDocument.documentElement, this.element);
        if (t.isDefaultPrevented() || !n) return;
        var i = this.getTipElement(),
            s = Me.getUID(this.constructor.NAME);
        i.setAttribute("id", s), this.element.setAttribute("aria-describedby", s), this.setContent(), this.config.animation && ht(i).addClass(yt);

        var r = "function" == typeof this.config.placement ? this.config.placement.call(this, i, this.element) : this.config.placement,
            o = this._getAttachment(r);

        this.addAttachmentClass(o);
        var a = !1 === this.config.container ? document.body : ht(this.config.container);
        ht(i).data(this.constructor.DATA_KEY, this), ht.contains(this.element.ownerDocument.documentElement, this.tip) || ht(i).appendTo(a), ht(this.element).trigger(this.constructor.Event.INSERTED), this._popper = new c(this.element, i, {
          placement: o,
          modifiers: {
            offset: {
              offset: this.config.offset
            },
            flip: {
              behavior: this.config.fallbackPlacement
            },
            arrow: {
              element: ".arrow"
            },
            preventOverflow: {
              boundariesElement: this.config.boundary
            }
          },
          onCreate: function onCreate(t) {
            t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t);
          },
          onUpdate: function onUpdate(t) {
            e._handlePopperPlacementChange(t);
          }
        }), ht(i).addClass(Ct), "ontouchstart" in document.documentElement && ht("body").children().on("mouseover", null, ht.noop);

        var l = function l() {
          e.config.animation && e._fixTransition();
          var t = e._hoverState;
          e._hoverState = null, ht(e.element).trigger(e.constructor.Event.SHOWN), "out" === t && e._leave(null, e);
        };

        Me.supportsTransitionEnd() && ht(this.tip).hasClass(yt) ? ht(this.tip).one(Me.TRANSITION_END, l).emulateTransitionEnd(h._TRANSITION_DURATION) : l();
      }
    }, t.hide = function (t) {
      var e = this,
          n = this.getTipElement(),
          i = ht.Event(this.constructor.Event.HIDE),
          s = function s() {
        e._hoverState !== vt && n.parentNode && n.parentNode.removeChild(n), e._cleanTipClass(), e.element.removeAttribute("aria-describedby"), ht(e.element).trigger(e.constructor.Event.HIDDEN), null !== e._popper && e._popper.destroy(), t && t();
      };

      ht(this.element).trigger(i), i.isDefaultPrevented() || (ht(n).removeClass(Ct), "ontouchstart" in document.documentElement && ht("body").children().off("mouseover", null, ht.noop), this._activeTrigger.click = !1, this._activeTrigger[bt] = !1, this._activeTrigger[Tt] = !1, Me.supportsTransitionEnd() && ht(this.tip).hasClass(yt) ? ht(n).one(Me.TRANSITION_END, s).emulateTransitionEnd(150) : s(), this._hoverState = "");
    }, t.update = function () {
      null !== this._popper && this._popper.scheduleUpdate();
    }, t.isWithContent = function () {
      return Boolean(this.getTitle());
    }, t.addAttachmentClass = function (t) {
      ht(this.getTipElement()).addClass("bs-tooltip-" + t);
    }, t.getTipElement = function () {
      return this.tip = this.tip || ht(this.config.template)[0], this.tip;
    }, t.setContent = function () {
      var t = ht(this.getTipElement());
      this.setElementContent(t.find(".tooltip-inner"), this.getTitle()), t.removeClass(yt + " " + Ct);
    }, t.setElementContent = function (t, e) {
      var n = this.config.html;
      "object" == _typeof(e) && (e.nodeType || e.jquery) ? n ? ht(e).parent().is(t) || t.empty().append(e) : t.text(ht(e).text()) : t[n ? "html" : "text"](e);
    }, t.getTitle = function () {
      var t = this.element.getAttribute("data-original-title");
      return t || (t = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), t;
    }, t._getAttachment = function (t) {
      return mt[t.toUpperCase()];
    }, t._setListeners = function () {
      var i = this;
      this.config.trigger.split(" ").forEach(function (t) {
        if ("click" === t) ht(i.element).on(i.constructor.Event.CLICK, i.config.selector, function (t) {
          return i.toggle(t);
        });else if ("manual" !== t) {
          var e = t === Tt ? i.constructor.Event.MOUSEENTER : i.constructor.Event.FOCUSIN,
              n = t === Tt ? i.constructor.Event.MOUSELEAVE : i.constructor.Event.FOCUSOUT;
          ht(i.element).on(e, i.config.selector, function (t) {
            return i._enter(t);
          }).on(n, i.config.selector, function (t) {
            return i._leave(t);
          });
        }
        ht(i.element).closest(".modal").on("hide.bs.modal", function () {
          return i.hide();
        });
      }), this.config.selector ? this.config = u({}, this.config, {
        trigger: "manual",
        selector: ""
      }) : this._fixTitle();
    }, t._fixTitle = function () {
      var t = _typeof(this.element.getAttribute("data-original-title"));

      (this.element.getAttribute("title") || "string" !== t) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""));
    }, t._enter = function (t, e) {
      var n = this.constructor.DATA_KEY;
      (e = e || ht(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), ht(t.currentTarget).data(n, e)), t && (e._activeTrigger["focusin" === t.type ? bt : Tt] = !0), ht(e.getTipElement()).hasClass(Ct) || e._hoverState === vt ? e._hoverState = vt : (clearTimeout(e._timeout), e._hoverState = vt, e.config.delay && e.config.delay.show ? e._timeout = setTimeout(function () {
        e._hoverState === vt && e.show();
      }, e.config.delay.show) : e.show());
    }, t._leave = function (t, e) {
      var n = this.constructor.DATA_KEY;
      (e = e || ht(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), ht(t.currentTarget).data(n, e)), t && (e._activeTrigger["focusout" === t.type ? bt : Tt] = !1), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = "out", e.config.delay && e.config.delay.hide ? e._timeout = setTimeout(function () {
        "out" === e._hoverState && e.hide();
      }, e.config.delay.hide) : e.hide());
    }, t._isWithActiveTrigger = function () {
      for (var t in this._activeTrigger) {
        if (this._activeTrigger[t]) return !0;
      }

      return !1;
    }, t._getConfig = function (t) {
      return "number" == typeof (t = u({}, this.constructor.Default, ht(this.element).data(), t)).delay && (t.delay = {
        show: t.delay,
        hide: t.delay
      }), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), Me.typeCheckConfig(ct, t, this.constructor.DefaultType), t;
    }, t._getDelegateConfig = function () {
      var t = {};
      if (this.config) for (var e in this.config) {
        this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
      }
      return t;
    }, t._cleanTipClass = function () {
      var t = ht(this.getTipElement()),
          e = t.attr("class").match(gt);
      null !== e && 0 < e.length && t.removeClass(e.join(""));
    }, t._handlePopperPlacementChange = function (t) {
      this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(t.placement));
    }, t._fixTransition = function () {
      var t = this.getTipElement(),
          e = this.config.animation;
      null === t.getAttribute("x-placement") && (ht(t).removeClass(yt), this.config.animation = !1, this.hide(), this.show(), this.config.animation = e);
    }, h._jQueryInterface = function (n) {
      return this.each(function () {
        var t = ht(this).data(ut),
            e = "object" == _typeof(n) && n;

        if ((t || !/dispose|hide/.test(n)) && (t || (t = new h(this, e), ht(this).data(ut, t)), "string" == typeof n)) {
          if (void 0 === t[n]) throw new TypeError('No method named "' + n + '"');
          t[n]();
        }
      });
    }, o(h, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }, {
      key: "Default",
      get: function get() {
        return pt;
      }
    }, {
      key: "NAME",
      get: function get() {
        return ct;
      }
    }, {
      key: "DATA_KEY",
      get: function get() {
        return ut;
      }
    }, {
      key: "Event",
      get: function get() {
        return Et;
      }
    }, {
      key: "EVENT_KEY",
      get: function get() {
        return dt;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return _t;
      }
    }]), h;
  }(), ht.fn[ct] = It._jQueryInterface, ht.fn[ct].Constructor = It, ht.fn[ct].noConflict = function () {
    return ht.fn[ct] = ft, It._jQueryInterface;
  }, It),
      Ze = (tt = "popover", nt = "." + (et = "bs.popover"), it = (X = e).fn[tt], st = new RegExp("(^|\\s)bs-popover\\S+", "g"), rt = u({}, ze.Default, {
    placement: "right",
    trigger: "click",
    content: "",
    template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
  }), ot = u({}, ze.DefaultType, {
    content: "(string|element|function)"
  }), at = {
    HIDE: "hide" + nt,
    HIDDEN: "hidden" + nt,
    SHOW: "show" + nt,
    SHOWN: "shown" + nt,
    INSERTED: "inserted" + nt,
    CLICK: "click" + nt,
    FOCUSIN: "focusin" + nt,
    FOCUSOUT: "focusout" + nt,
    MOUSEENTER: "mouseenter" + nt,
    MOUSELEAVE: "mouseleave" + nt
  }, lt = function (t) {
    var e, n;

    function i() {
      return t.apply(this, arguments) || this;
    }

    n = t, (e = i).prototype = Object.create(n.prototype), (e.prototype.constructor = e).__proto__ = n;
    var s = i.prototype;
    return s.isWithContent = function () {
      return this.getTitle() || this._getContent();
    }, s.addAttachmentClass = function (t) {
      X(this.getTipElement()).addClass("bs-popover-" + t);
    }, s.getTipElement = function () {
      return this.tip = this.tip || X(this.config.template)[0], this.tip;
    }, s.setContent = function () {
      var t = X(this.getTipElement());
      this.setElementContent(t.find(".popover-header"), this.getTitle());

      var e = this._getContent();

      "function" == typeof e && (e = e.call(this.element)), this.setElementContent(t.find(".popover-body"), e), t.removeClass("fade show");
    }, s._getContent = function () {
      return this.element.getAttribute("data-content") || this.config.content;
    }, s._cleanTipClass = function () {
      var t = X(this.getTipElement()),
          e = t.attr("class").match(st);
      null !== e && 0 < e.length && t.removeClass(e.join(""));
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = X(this).data(et),
            e = "object" == _typeof(n) ? n : null;

        if ((t || !/destroy|hide/.test(n)) && (t || (t = new i(this, e), X(this).data(et, t)), "string" == typeof n)) {
          if (void 0 === t[n]) throw new TypeError('No method named "' + n + '"');
          t[n]();
        }
      });
    }, o(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }, {
      key: "Default",
      get: function get() {
        return rt;
      }
    }, {
      key: "NAME",
      get: function get() {
        return tt;
      }
    }, {
      key: "DATA_KEY",
      get: function get() {
        return et;
      }
    }, {
      key: "Event",
      get: function get() {
        return at;
      }
    }, {
      key: "EVENT_KEY",
      get: function get() {
        return nt;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return ot;
      }
    }]), i;
  }(ze), X.fn[tt] = lt._jQueryInterface, X.fn[tt].Constructor = lt, X.fn[tt].noConflict = function () {
    return X.fn[tt] = it, lt._jQueryInterface;
  }, lt),
      Je = (H = "scrollspy", R = "." + (L = "bs.scrollspy"), x = (j = e).fn[H], U = {
    offset: 10,
    method: "auto",
    target: ""
  }, W = {
    offset: "number",
    method: "string",
    target: "(string|element)"
  }, K = {
    ACTIVATE: "activate" + R,
    SCROLL: "scroll" + R,
    LOAD_DATA_API: "load" + R + ".data-api"
  }, M = "active", Q = '[data-spy="scroll"]', B = ".active", F = ".nav, .list-group", V = ".nav-link", Y = ".nav-item", q = ".list-group-item", z = ".dropdown", Z = ".dropdown-item", J = ".dropdown-toggle", $ = "position", G = function () {
    function n(t, e) {
      var n = this;
      this._element = t, this._scrollElement = "BODY" === t.tagName ? window : t, this._config = this._getConfig(e), this._selector = this._config.target + " " + V + "," + this._config.target + " " + q + "," + this._config.target + " " + Z, this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, j(this._scrollElement).on(K.SCROLL, function (t) {
        return n._process(t);
      }), this.refresh(), this._process();
    }

    var t = n.prototype;
    return t.refresh = function () {
      var e = this,
          t = this._scrollElement === this._scrollElement.window ? "offset" : $,
          s = "auto" === this._config.method ? t : this._config.method,
          r = s === $ ? this._getScrollTop() : 0;
      this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), j.makeArray(j(this._selector)).map(function (t) {
        var e,
            n = Me.getSelectorFromElement(t);

        if (n && (e = j(n)[0]), e) {
          var i = e.getBoundingClientRect();
          if (i.width || i.height) return [j(e)[s]().top + r, n];
        }

        return null;
      }).filter(function (t) {
        return t;
      }).sort(function (t, e) {
        return t[0] - e[0];
      }).forEach(function (t) {
        e._offsets.push(t[0]), e._targets.push(t[1]);
      });
    }, t.dispose = function () {
      j.removeData(this._element, L), j(this._scrollElement).off(R), this._element = null, this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null;
    }, t._getConfig = function (t) {
      if ("string" != typeof (t = u({}, U, t)).target) {
        var e = j(t.target).attr("id");
        e || (e = Me.getUID(H), j(t.target).attr("id", e)), t.target = "#" + e;
      }

      return Me.typeCheckConfig(H, t, W), t;
    }, t._getScrollTop = function () {
      return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
    }, t._getScrollHeight = function () {
      return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    }, t._getOffsetHeight = function () {
      return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
    }, t._process = function () {
      var t = this._getScrollTop() + this._config.offset,
          e = this._getScrollHeight(),
          n = this._config.offset + e - this._getOffsetHeight();

      if (this._scrollHeight !== e && this.refresh(), n <= t) {
        var i = this._targets[this._targets.length - 1];
        this._activeTarget !== i && this._activate(i);
      } else {
        if (this._activeTarget && t < this._offsets[0] && 0 < this._offsets[0]) return this._activeTarget = null, void this._clear();

        for (var s = this._offsets.length; s--;) {
          this._activeTarget !== this._targets[s] && t >= this._offsets[s] && (void 0 === this._offsets[s + 1] || t < this._offsets[s + 1]) && this._activate(this._targets[s]);
        }
      }
    }, t._activate = function (e) {
      this._activeTarget = e, this._clear();

      var t = this._selector.split(",");

      t = t.map(function (t) {
        return t + '[data-target="' + e + '"],' + t + '[href="' + e + '"]';
      });
      var n = j(t.join(","));
      n.hasClass("dropdown-item") ? (n.closest(z).find(J).addClass(M), n.addClass(M)) : (n.addClass(M), n.parents(F).prev(V + ", " + q).addClass(M), n.parents(F).prev(Y).children(V).addClass(M)), j(this._scrollElement).trigger(K.ACTIVATE, {
        relatedTarget: e
      });
    }, t._clear = function () {
      j(this._selector).filter(B).removeClass(M);
    }, n._jQueryInterface = function (e) {
      return this.each(function () {
        var t = j(this).data(L);

        if (t || (t = new n(this, "object" == _typeof(e) && e), j(this).data(L, t)), "string" == typeof e) {
          if (void 0 === t[e]) throw new TypeError('No method named "' + e + '"');
          t[e]();
        }
      });
    }, o(n, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }, {
      key: "Default",
      get: function get() {
        return U;
      }
    }]), n;
  }(), j(window).on(K.LOAD_DATA_API, function () {
    for (var t = j.makeArray(j(Q)), e = t.length; e--;) {
      var n = j(t[e]);

      G._jQueryInterface.call(n, n.data());
    }
  }), j.fn[H] = G._jQueryInterface, j.fn[H].Constructor = G, j.fn[H].noConflict = function () {
    return j.fn[H] = x, G._jQueryInterface;
  }, G),
      $e = (A = "." + (w = "bs.tab"), D = (I = e).fn.tab, S = {
    HIDE: "hide" + A,
    HIDDEN: "hidden" + A,
    SHOW: "show" + A,
    SHOWN: "shown" + A,
    CLICK_DATA_API: "click.bs.tab.data-api"
  }, N = "active", O = ".active", k = "> li > .active", P = function () {
    function i(t) {
      this._element = t;
    }

    var t = i.prototype;
    return t.show = function () {
      var n = this;

      if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && I(this._element).hasClass(N) || I(this._element).hasClass("disabled"))) {
        var t,
            i,
            e = I(this._element).closest(".nav, .list-group")[0],
            s = Me.getSelectorFromElement(this._element);

        if (e) {
          var r = "UL" === e.nodeName ? k : O;
          i = (i = I.makeArray(I(e).find(r)))[i.length - 1];
        }

        var o = I.Event(S.HIDE, {
          relatedTarget: this._element
        }),
            a = I.Event(S.SHOW, {
          relatedTarget: i
        });

        if (i && I(i).trigger(o), I(this._element).trigger(a), !a.isDefaultPrevented() && !o.isDefaultPrevented()) {
          s && (t = I(s)[0]), this._activate(this._element, e);

          var l = function l() {
            var t = I.Event(S.HIDDEN, {
              relatedTarget: n._element
            }),
                e = I.Event(S.SHOWN, {
              relatedTarget: i
            });
            I(i).trigger(t), I(n._element).trigger(e);
          };

          t ? this._activate(t, t.parentNode, l) : l();
        }
      }
    }, t.dispose = function () {
      I.removeData(this._element, w), this._element = null;
    }, t._activate = function (t, e, n) {
      var i = this,
          s = ("UL" === e.nodeName ? I(e).find(k) : I(e).children(O))[0],
          r = n && Me.supportsTransitionEnd() && s && I(s).hasClass("fade"),
          o = function o() {
        return i._transitionComplete(t, s, n);
      };

      s && r ? I(s).one(Me.TRANSITION_END, o).emulateTransitionEnd(150) : o();
    }, t._transitionComplete = function (t, e, n) {
      if (e) {
        I(e).removeClass("show " + N);
        var i = I(e.parentNode).find("> .dropdown-menu .active")[0];
        i && I(i).removeClass(N), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1);
      }

      if (I(t).addClass(N), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0), Me.reflow(t), I(t).addClass("show"), t.parentNode && I(t.parentNode).hasClass("dropdown-menu")) {
        var s = I(t).closest(".dropdown")[0];
        s && I(s).find(".dropdown-toggle").addClass(N), t.setAttribute("aria-expanded", !0);
      }

      n && n();
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = I(this),
            e = t.data(w);

        if (e || (e = new i(this), t.data(w, e)), "string" == typeof n) {
          if (void 0 === e[n]) throw new TypeError('No method named "' + n + '"');
          e[n]();
        }
      });
    }, o(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.0.0";
      }
    }]), i;
  }(), I(document).on(S.CLICK_DATA_API, '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', function (t) {
    t.preventDefault(), P._jQueryInterface.call(I(this), "show");
  }), I.fn.tab = P._jQueryInterface, I.fn.tab.Constructor = P, I.fn.tab.noConflict = function () {
    return I.fn.tab = D, P._jQueryInterface;
  }, P);

  !function (t) {
    if (void 0 === t) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
    var e = t.fn.jquery.split(" ")[0].split(".");
    if (e[0] < 2 && e[1] < 9 || 1 === e[0] && 9 === e[1] && e[2] < 1 || 4 <= e[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0");
  }(e), t.Util = Me, t.Alert = Qe, t.Button = Be, t.Carousel = Fe, t.Collapse = Ve, t.Dropdown = Ye, t.Modal = qe, t.Popover = Ze, t.Scrollspy = Je, t.Tab = $e, t.Tooltip = ze, Object.defineProperty(t, "__esModule", {
    value: !0
  });
});

/***/ }),

/***/ 2:
/*!***************************************************************!*\
  !*** multi ./Resources/assets/js/frameworks/bootstrap.min.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/magdy/Documents/Code/waqf/Modules/Client/Resources/assets/js/frameworks/bootstrap.min.js */"./Resources/assets/js/frameworks/bootstrap.min.js");


/***/ })

/******/ });