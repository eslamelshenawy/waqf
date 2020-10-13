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

/***/ "./Resources/assets/js/frameworks/rating.js":
/*!**************************************************!*\
  !*** ./Resources/assets/js/frameworks/rating.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $.fn.mdbRate = function () {
    var $stars; // Custom whitelist to allow for using HTML tags in popover content

    var myDefaultWhiteList = $.fn.tooltip.Constructor.Default.whiteList;
    myDefaultWhiteList.textarea = [];
    myDefaultWhiteList.button = [];
    var $container = $(this);
    var titles = ['Very bad', 'Poor', 'OK', 'Good', 'Excellent'];

    for (var i = 0; i < 5; i++) {
      $container.append("<i class=\"py-2 px-1 rate-popover\" data-index=\"".concat(i, "\" data-html=\"true\" data-toggle=\"popover\"\n      data-placement=\"top\" title=\"").concat(titles[i], "\"></i>"));
    }

    $stars = $container.children();

    if ($container.hasClass('rating-faces')) {
      $stars.addClass('far fa-meh-blank');
    } else if ($container.hasClass('empty-stars')) {
      $stars.addClass('far fa-star');
    } else {
      $stars.addClass('fas fa-star');
    }

    $stars.on('mouseover', function () {
      var index = $(this).attr('data-index');
      markStarsAsActive(index);
    });

    function markStarsAsActive(index) {
      unmarkActive();

      for (var i = 0; i <= index; i++) {
        if ($container.hasClass('rating-faces')) {
          $($stars.get(i)).removeClass('fa-meh-blank');
          $($stars.get(i)).addClass('live');

          switch (index) {
            case '0':
              $($stars.get(i)).addClass('fa-angry');
              break;

            case '1':
              $($stars.get(i)).addClass('fa-frown');
              break;

            case '2':
              $($stars.get(i)).addClass('fa-meh');
              break;

            case '3':
              $($stars.get(i)).addClass('fa-smile');
              break;

            case '4':
              $($stars.get(i)).addClass('fa-laugh');
              break;
          }
        } else if ($container.hasClass('empty-stars')) {
          $($stars.get(i)).addClass('fas');

          switch (index) {
            case '0':
              $($stars.get(i)).addClass('oneStar');
              break;

            case '1':
              $($stars.get(i)).addClass('twoStars');
              break;

            case '2':
              $($stars.get(i)).addClass('threeStars');
              break;

            case '3':
              $($stars.get(i)).addClass('fourStars');
              break;

            case '4':
              $($stars.get(i)).addClass('fiveStars');
              break;
          }
        } else {
          $($stars.get(i)).addClass('amber-text');
        }
      }
    }

    function unmarkActive() {
      $stars.parent().hasClass('rating-faces') ? $stars.addClass('fa-meh-blank') : $stars;
      $container.hasClass('empty-stars') ? $stars.removeClass('fas') : $container;
      $stars.removeClass('fa-angry fa-frown fa-meh fa-smile fa-laugh live oneStar twoStars threeStars fourStars fiveStars amber-text');
    }

    $stars.on('click', function () {
      $stars.popover('hide');
    }); // Submit, you can add some extra custom code here
    // ex. to send the information to the server

    $container.on('click', '#voteSubmitButton', function () {
      $stars.popover('hide');
    }); // Cancel, just close the popover

    $container.on('click', '#closePopoverButton', function () {
      $stars.popover('hide');
    });

    if ($container.hasClass('feedback')) {
      $(function () {
        $stars.popover({
          // Append popover to #rateMe to allow handling form inside the popover
          container: $container,
          // Custom content for popover
          content: "<div class=\"my-0 py-0\"> <textarea type=\"text\" style=\"font-size: 0.78rem\" class=\"md-textarea form-control py-0\" placeholder=\"Write us what can we improve\" rows=\"3\"></textarea> <button id=\"voteSubmitButton\" type=\"submit\" class=\"btn btn-sm btn-primary\">Submit!</button> <button id=\"closePopoverButton\" class=\"btn btn-flat btn-sm\">Close</button>  </div>"
        });
      });
    }

    $stars.tooltip();
  };
})(jQuery);

/***/ }),

/***/ 2:
/*!********************************************************!*\
  !*** multi ./Resources/assets/js/frameworks/rating.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/magdy/Documents/Code/waqf/Modules/Client/Resources/assets/js/frameworks/rating.js */"./Resources/assets/js/frameworks/rating.js");


/***/ })

/******/ });