/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

// require('./bootstrap');
__webpack_require__(/*! ./squad */ "./resources/js/squad.js");

__webpack_require__(/*! ./jquery.roundabout-1.0.min */ "./resources/js/jquery.roundabout-1.0.min.js");

__webpack_require__(/*! ./jquery.roundabout-shapes-1.1 */ "./resources/js/jquery.roundabout-shapes-1.1.js");

__webpack_require__(/*! ./jquery.easing.1.3 */ "./resources/js/jquery.easing.1.3.js"); // require('alpinejs');
// require('aos');
// require('glightbox');


$(document).ready(function () {
  //Start up our Featured Project Carosuel
  $('#featured ul').roundabout({
    easing: 'easeOutInCirc',
    autoplay: true,
    autoplayDuration: 5000,
    autoplayPauseOnHover: true,
    duration: 700
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#searchForm').keydown(function (event) {
    if (event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  }); // Ajax Search

  $('#search').keyup(function () {
    var search = $('#search').val();

    if (search == "") {
      $("#searchList").html("");
      $('#searchResult').hide();
    } else {
      $.get("/user/search", {
        search: search
      }, function (data) {
        $('#searchList').empty().html(data);
        $('#searchResult').show();
      });
    }
  }); // Ajax Like

  $('#toLike').click(function (e) {
    e.preventDefault();
    var itemId = $('#toLike').attr('data-id');
    $.get("/user/like", {
      id: itemId
    }, function (data) {
      $('#likeSvg').css('fill', 'red');
    });
  }); // Ajax Favorites

  $('#toFavorites').click(function (e) {
    e.preventDefault();
    var itemId = $('#toFavorites').attr('data-id');
    $.get("/user/favorites", {
      id: itemId
    }, function (data) {
      $('#favoriteSvg').css('fill', 'red');
      $('#navFavorites').css('color', '#faa3a3');
    });
  }); // Ajax Comment

  $('#toCommentLink').click(function () {
    $('#commentForm').trigger("reset");
  });
  $("#toCommentBtn").click(function (e) {
    e.preventDefault();
    var formData = {
      good_id: $('#goodId').val(),
      user_id: $('#userId').val(),
      comment: $('#comment').val(),
      _token: $('meta[name="csrf-token"]').attr('content')
    };
    $.ajax({
      type: 'POST',
      url: '/user/comment',
      data: formData,
      // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      dataType: 'json',
      success: function success(data) {
        console.log(data);
        $('#toCommentSvg').css('fill', 'red');
        $('.toast-body').html('Спасибо за комментарий.');
        $(".toast-message").show('slow');
        setTimeout(function () {
          $(".toast-message").hide('slow');
        }, 8000);
      },
      error: function error(e) {
        console.log(e);
        $('#toCommentSvg').css('fill', 'blue');
        $('.toast-body').html('Что-то пошло не так! Скорее всего, введено менее 5 символов...');
        $(".toast-message").show('slow');
        setTimeout(function () {
          $(".toast-message").hide('slow');
        }, 8000);
      }
    });
  }); // Ajax GoodShareToEmail

  $('#toShare').click(function () {
    $('#shareMailForm').trigger("reset");
  });
  $("#toShareBtn").click(function (e) {
    e.preventDefault();
    var formData = {
      good_id: $('#goodId').val(),
      email: $('#email').val(),
      _token: $('meta[name="csrf-token"]').attr('content')
    };
    $.ajax({
      type: 'POST',
      url: '/user/sharegood',
      data: formData,
      dataType: 'json',
      success: function success(data) {
        $('#toShareSvg').css('fill', 'red');
        $("#shareMailModal .btn-close").click();
        $('.toast-body').html('Сообщение успешно отправлено');
        $(".toast-message").show('slow');
        setTimeout(function () {
          $(".toast-message").hide('slow');
        }, 8000);
      },
      error: function error(e) {
        $('#toShareSvg').css('fill', 'blue');
        $("#shareMailModal .btn-close").click();
        $('.toast-body').html('Ошибка! Введите корректный Email адрес.');
        $(".toast-message").show('slow');
        setTimeout(function () {
          $(".toast-message").hide('slow');
        }, 8000);
      }
    });
  }); // show alert Auth toast on goodItem page

  $('#toastLike').click(function () {
    $(".toast-message").show('slow');
    setTimeout(function () {
      $(".toast-message").hide('slow');
    }, 8000);
  });
  $('#toastFavorites').click(function () {
    $(".toast-message").show('slow');
    setTimeout(function () {
      $(".toast-message").hide('slow');
    }, 8000);
  });
  $('#toastComment').click(function () {
    $(".toast-message").show('slow');
    setTimeout(function () {
      $(".toast-message").hide('slow');
    }, 8000);
  });
  $('#toastShare').click(function () {
    $(".toast-message").show('slow');
    setTimeout(function () {
      $(".toast-message").hide('slow');
    }, 8000);
  });
  $('.btn-close').click(function () {
    $('.toast-message').hide('slow');
  });
});

/***/ }),

/***/ "./resources/js/jquery.easing.1.3.js":
/*!*******************************************!*\
  !*** ./resources/js/jquery.easing.1.3.js ***!
  \*******************************************/
/***/ (() => {

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/
// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing'];
jQuery.extend(jQuery.easing, {
  def: 'easeOutQuad',
  swing: function swing(x, t, b, c, d) {
    //alert(jQuery.easing.default);
    return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
  },
  easeInQuad: function easeInQuad(x, t, b, c, d) {
    return c * (t /= d) * t + b;
  },
  easeOutQuad: function easeOutQuad(x, t, b, c, d) {
    return -c * (t /= d) * (t - 2) + b;
  },
  easeInOutQuad: function easeInOutQuad(x, t, b, c, d) {
    if ((t /= d / 2) < 1) return c / 2 * t * t + b;
    return -c / 2 * (--t * (t - 2) - 1) + b;
  },
  easeInCubic: function easeInCubic(x, t, b, c, d) {
    return c * (t /= d) * t * t + b;
  },
  easeOutCubic: function easeOutCubic(x, t, b, c, d) {
    return c * ((t = t / d - 1) * t * t + 1) + b;
  },
  easeInOutCubic: function easeInOutCubic(x, t, b, c, d) {
    if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
    return c / 2 * ((t -= 2) * t * t + 2) + b;
  },
  easeInQuart: function easeInQuart(x, t, b, c, d) {
    return c * (t /= d) * t * t * t + b;
  },
  easeOutQuart: function easeOutQuart(x, t, b, c, d) {
    return -c * ((t = t / d - 1) * t * t * t - 1) + b;
  },
  easeInOutQuart: function easeInOutQuart(x, t, b, c, d) {
    if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
    return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
  },
  easeInQuint: function easeInQuint(x, t, b, c, d) {
    return c * (t /= d) * t * t * t * t + b;
  },
  easeOutQuint: function easeOutQuint(x, t, b, c, d) {
    return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
  },
  easeInOutQuint: function easeInOutQuint(x, t, b, c, d) {
    if ((t /= d / 2) < 1) return c / 2 * t * t * t * t * t + b;
    return c / 2 * ((t -= 2) * t * t * t * t + 2) + b;
  },
  easeInSine: function easeInSine(x, t, b, c, d) {
    return -c * Math.cos(t / d * (Math.PI / 2)) + c + b;
  },
  easeOutSine: function easeOutSine(x, t, b, c, d) {
    return c * Math.sin(t / d * (Math.PI / 2)) + b;
  },
  easeInOutSine: function easeInOutSine(x, t, b, c, d) {
    return -c / 2 * (Math.cos(Math.PI * t / d) - 1) + b;
  },
  easeInExpo: function easeInExpo(x, t, b, c, d) {
    return t == 0 ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
  },
  easeOutExpo: function easeOutExpo(x, t, b, c, d) {
    return t == d ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
  },
  easeInOutExpo: function easeInOutExpo(x, t, b, c, d) {
    if (t == 0) return b;
    if (t == d) return b + c;
    if ((t /= d / 2) < 1) return c / 2 * Math.pow(2, 10 * (t - 1)) + b;
    return c / 2 * (-Math.pow(2, -10 * --t) + 2) + b;
  },
  easeInCirc: function easeInCirc(x, t, b, c, d) {
    return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
  },
  easeOutCirc: function easeOutCirc(x, t, b, c, d) {
    return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
  },
  easeInOutCirc: function easeInOutCirc(x, t, b, c, d) {
    if ((t /= d / 2) < 1) return -c / 2 * (Math.sqrt(1 - t * t) - 1) + b;
    return c / 2 * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
  },
  easeInElastic: function easeInElastic(x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0) return b;
    if ((t /= d) == 1) return b + c;
    if (!p) p = d * .3;

    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else var s = p / (2 * Math.PI) * Math.asin(c / a);

    return -(a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
  },
  easeOutElastic: function easeOutElastic(x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0) return b;
    if ((t /= d) == 1) return b + c;
    if (!p) p = d * .3;

    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else var s = p / (2 * Math.PI) * Math.asin(c / a);

    return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
  },
  easeInOutElastic: function easeInOutElastic(x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0) return b;
    if ((t /= d / 2) == 2) return b + c;
    if (!p) p = d * (.3 * 1.5);

    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else var s = p / (2 * Math.PI) * Math.asin(c / a);

    if (t < 1) return -.5 * (a * Math.pow(2, 10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p)) + b;
    return a * Math.pow(2, -10 * (t -= 1)) * Math.sin((t * d - s) * (2 * Math.PI) / p) * .5 + c + b;
  },
  easeInBack: function easeInBack(x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    return c * (t /= d) * t * ((s + 1) * t - s) + b;
  },
  easeOutBack: function easeOutBack(x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
  },
  easeInOutBack: function easeInOutBack(x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    if ((t /= d / 2) < 1) return c / 2 * (t * t * (((s *= 1.525) + 1) * t - s)) + b;
    return c / 2 * ((t -= 2) * t * (((s *= 1.525) + 1) * t + s) + 2) + b;
  },
  easeInBounce: function easeInBounce(x, t, b, c, d) {
    return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b;
  },
  easeOutBounce: function easeOutBounce(x, t, b, c, d) {
    if ((t /= d) < 1 / 2.75) {
      return c * (7.5625 * t * t) + b;
    } else if (t < 2 / 2.75) {
      return c * (7.5625 * (t -= 1.5 / 2.75) * t + .75) + b;
    } else if (t < 2.5 / 2.75) {
      return c * (7.5625 * (t -= 2.25 / 2.75) * t + .9375) + b;
    } else {
      return c * (7.5625 * (t -= 2.625 / 2.75) * t + .984375) + b;
    }
  },
  easeInOutBounce: function easeInOutBounce(x, t, b, c, d) {
    if (t < d / 2) return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * .5 + b;
    return jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * .5 + c * .5 + b;
  }
});
/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright © 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */

/***/ }),

/***/ "./resources/js/jquery.roundabout-1.0.min.js":
/*!***************************************************!*\
  !*** ./resources/js/jquery.roundabout-1.0.min.js ***!
  \***************************************************/
/***/ (() => {

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * jQuery Roundabout - v2.4.2
 * http://fredhq.com/projects/roundabout
 *
 * Moves list-items of enabled ordered and unordered lists long
 * a chosen path. Includes the default "lazySusan" path, that
 * moves items long a spinning turntable.
 *
 * Terms of Use // jQuery Roundabout
 *
 * Open source under the BSD license
 *
 * Copyright (c) 2011-2012, Fred LeBlanc
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *   - Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *   - Redistributions in binary form must reproduce the above
 *     copyright notice, this list of conditions and the following
 *     disclaimer in the documentation and/or other materials provided
 *     with the distribution.
 *   - Neither the name of the author nor the names of its contributors
 *     may be used to endorse or promote products derived from this
 *     software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */
(function (a) {
  "use strict";

  var b, c, d;
  a.extend({
    roundaboutShapes: {
      def: "lazySusan",
      lazySusan: function lazySusan(a, b, c) {
        return {
          x: Math.sin(a + b),
          y: Math.sin(a + 3 * Math.PI / 2 + b) / 8 * c,
          z: (Math.cos(a + b) + 1) / 2,
          scale: Math.sin(a + Math.PI / 2 + b) / 2 + .5
        };
      }
    }
  });
  b = {
    bearing: 0,
    tilt: 0,
    minZ: 100,
    maxZ: 280,
    minOpacity: .4,
    maxOpacity: 1,
    minScale: .4,
    maxScale: 1,
    duration: 600,
    btnNext: null,
    btnNextCallback: function btnNextCallback() {},
    btnPrev: null,
    btnPrevCallback: function btnPrevCallback() {},
    btnToggleAutoplay: null,
    btnStartAutoplay: null,
    btnStopAutoplay: null,
    easing: "swing",
    clickToFocus: true,
    clickToFocusCallback: function clickToFocusCallback() {},
    focusBearing: 0,
    shape: "lazySusan",
    debug: false,
    childSelector: "li",
    startingChild: null,
    reflect: false,
    floatComparisonThreshold: .001,
    autoplay: false,
    autoplayDuration: 1e3,
    autoplayPauseOnHover: false,
    autoplayCallback: function autoplayCallback() {},
    autoplayInitialDelay: 0,
    enableDrag: false,
    dropDuration: 600,
    dropEasing: "swing",
    dropAnimateTo: "nearest",
    dropCallback: function dropCallback() {},
    dragAxis: "x",
    dragFactor: 4,
    triggerFocusEvents: true,
    triggerBlurEvents: true,
    responsive: false
  };
  c = {
    autoplayInterval: null,
    autoplayIsRunning: false,
    autoplayStartTimeout: null,
    animating: false,
    childInFocus: -1,
    touchMoveStartPosition: null,
    stopAnimation: false,
    lastAnimationStep: false
  };
  d = {
    init: function init(e, f, g) {
      var h,
          i = new Date().getTime();
      e = _typeof(e) === "object" ? e : {};
      f = a.isFunction(f) ? f : function () {};
      f = a.isFunction(e) ? e : f;
      h = a.extend({}, b, e, c);
      return this.each(function () {
        var b = a(this),
            c = b.children(h.childSelector).length,
            e = 360 / c,
            i = h.startingChild && h.startingChild > c - 1 ? c - 1 : h.startingChild,
            j = h.startingChild === null ? h.bearing : 360 - i * e,
            k = b.css("position") !== "static" ? b.css("position") : "relative";
        b.css({
          padding: 0,
          position: k
        }).addClass("roundabout-holder").data("roundabout", a.extend({}, h, {
          startingChild: i,
          bearing: j,
          oppositeOfFocusBearing: d.normalize.apply(null, [h.focusBearing - 180]),
          dragBearing: j,
          period: e
        }));

        if (g) {
          b.unbind(".roundabout").children(h.childSelector).unbind(".roundabout");
        } else {
          if (h.responsive) {
            a(window).bind("resize", function () {
              d.stopAutoplay.apply(b);
              d.relayoutChildren.apply(b);
            });
          }
        }

        if (h.clickToFocus) {
          b.children(h.childSelector).each(function (c) {
            a(this).bind("click.roundabout", function () {
              var e = d.getPlacement.apply(b, [c]);

              if (!d.isInFocus.apply(b, [e])) {
                d.stopAnimation.apply(a(this));

                if (!b.data("roundabout").animating) {
                  d.animateBearingToFocus.apply(b, [e, b.data("roundabout").clickToFocusCallback]);
                }

                return false;
              }
            });
          });
        }

        if (h.btnNext) {
          a(h.btnNext).bind("click.roundabout", function () {
            if (!b.data("roundabout").animating) {
              d.animateToNextChild.apply(b, [b.data("roundabout").btnNextCallback]);
            }

            return false;
          });
        }

        if (h.btnPrev) {
          a(h.btnPrev).bind("click.roundabout", function () {
            d.animateToPreviousChild.apply(b, [b.data("roundabout").btnPrevCallback]);
            return false;
          });
        }

        if (h.btnToggleAutoplay) {
          a(h.btnToggleAutoplay).bind("click.roundabout", function () {
            d.toggleAutoplay.apply(b);
            return false;
          });
        }

        if (h.btnStartAutoplay) {
          a(h.btnStartAutoplay).bind("click.roundabout", function () {
            d.startAutoplay.apply(b);
            return false;
          });
        }

        if (h.btnStopAutoplay) {
          a(h.btnStopAutoplay).bind("click.roundabout", function () {
            d.stopAutoplay.apply(b);
            return false;
          });
        }

        if (h.autoplayPauseOnHover) {
          b.bind("mouseenter.roundabout.autoplay", function () {
            d.stopAutoplay.apply(b, [true]);
          }).bind("mouseleave.roundabout.autoplay", function () {
            d.startAutoplay.apply(b);
          });
        }

        if (h.enableDrag) {
          if (!a.isFunction(b.drag)) {
            if (h.debug) {
              alert("You do not have the drag plugin loaded.");
            }
          } else if (!a.isFunction(b.drop)) {
            if (h.debug) {
              alert("You do not have the drop plugin loaded.");
            }
          } else {
            b.drag(function (a, c) {
              var e = b.data("roundabout"),
                  f = e.dragAxis.toLowerCase() === "x" ? "deltaX" : "deltaY";
              d.stopAnimation.apply(b);
              d.setBearing.apply(b, [e.dragBearing + c[f] / e.dragFactor]);
            }).drop(function (a) {
              var c = b.data("roundabout"),
                  e = d.getAnimateToMethod(c.dropAnimateTo);
              d.allowAnimation.apply(b);
              d[e].apply(b, [c.dropDuration, c.dropEasing, c.dropCallback]);
              c.dragBearing = c.period * d.getNearestChild.apply(b);
            });
          }

          b.each(function () {
            var b = a(this).get(0),
                c = a(this).data("roundabout"),
                e = c.dragAxis.toLowerCase() === "x" ? "pageX" : "pageY",
                f = d.getAnimateToMethod(c.dropAnimateTo);

            if (b.addEventListener) {
              b.addEventListener("touchstart", function (a) {
                c.touchMoveStartPosition = a.touches[0][e];
              }, false);
              b.addEventListener("touchmove", function (b) {
                var f = (b.touches[0][e] - c.touchMoveStartPosition) / c.dragFactor;
                b.preventDefault();
                d.stopAnimation.apply(a(this));
                d.setBearing.apply(a(this), [c.dragBearing + f]);
              }, false);
              b.addEventListener("touchend", function (b) {
                b.preventDefault();
                d.allowAnimation.apply(a(this));
                f = d.getAnimateToMethod(c.dropAnimateTo);
                d[f].apply(a(this), [c.dropDuration, c.dropEasing, c.dropCallback]);
                c.dragBearing = c.period * d.getNearestChild.apply(a(this));
              }, false);
            }
          });
        }

        d.initChildren.apply(b, [f, g]);
      });
    },
    initChildren: function initChildren(b, c) {
      var e = a(this),
          f = e.data("roundabout");

      b = b || function () {};

      e.children(f.childSelector).each(function (b) {
        var f,
            g,
            h,
            i = d.getPlacement.apply(e, [b]);

        if (c && a(this).data("roundabout")) {
          f = a(this).data("roundabout").startWidth;
          g = a(this).data("roundabout").startHeight;
          h = a(this).data("roundabout").startFontSize;
        }

        a(this).addClass("roundabout-moveable-item").css("position", "absolute");
        a(this).data("roundabout", {
          startWidth: f || a(this).width(),
          startHeight: g || a(this).height(),
          startFontSize: h || parseInt(a(this).css("font-size"), 10),
          degrees: i,
          backDegrees: d.normalize.apply(null, [i - 180]),
          childNumber: b,
          currentScale: 1,
          parent: e
        });
      });
      d.updateChildren.apply(e);

      if (f.autoplay) {
        f.autoplayStartTimeout = setTimeout(function () {
          d.startAutoplay.apply(e);
        }, f.autoplayInitialDelay);
      }

      e.trigger("ready");
      b.apply(e);
      return e;
    },
    updateChildren: function updateChildren() {
      return this.each(function () {
        var b = a(this),
            c = b.data("roundabout"),
            e = -1,
            f = {
          bearing: c.bearing,
          tilt: c.tilt,
          stage: {
            width: Math.floor(a(this).width() * .9),
            height: Math.floor(a(this).height() * .9)
          },
          animating: c.animating,
          inFocus: c.childInFocus,
          focusBearingRadian: d.degToRad.apply(null, [c.focusBearing]),
          shape: a.roundaboutShapes[c.shape] || a.roundaboutShapes[a.roundaboutShapes.def]
        };
        f.midStage = {
          width: f.stage.width / 2,
          height: f.stage.height / 2
        };
        f.nudge = {
          width: f.midStage.width + f.stage.width * .05,
          height: f.midStage.height + f.stage.height * .05
        };
        f.zValues = {
          min: c.minZ,
          max: c.maxZ,
          diff: c.maxZ - c.minZ
        };
        f.opacity = {
          min: c.minOpacity,
          max: c.maxOpacity,
          diff: c.maxOpacity - c.minOpacity
        };
        f.scale = {
          min: c.minScale,
          max: c.maxScale,
          diff: c.maxScale - c.minScale
        };
        b.children(c.childSelector).each(function (g) {
          if (d.updateChild.apply(b, [a(this), f, g, function () {
            a(this).trigger("ready");
          }]) && (!f.animating || c.lastAnimationStep)) {
            e = g;
            a(this).addClass("roundabout-in-focus");
          } else {
            a(this).removeClass("roundabout-in-focus");
          }
        });

        if (e !== f.inFocus) {
          if (c.triggerBlurEvents) {
            b.children(c.childSelector).eq(f.inFocus).trigger("blur");
          }

          c.childInFocus = e;

          if (c.triggerFocusEvents && e !== -1) {
            b.children(c.childSelector).eq(e).trigger("focus");
          }
        }

        b.trigger("childrenUpdated");
      });
    },
    updateChild: function updateChild(b, c, e, f) {
      var g,
          h = this,
          i = a(b),
          j = i.data("roundabout"),
          k = [],
          l = d.degToRad.apply(null, [360 - j.degrees + c.bearing]);

      f = f || function () {};

      l = d.normalizeRad.apply(null, [l]);
      g = c.shape(l, c.focusBearingRadian, c.tilt);
      g.scale = g.scale > 1 ? 1 : g.scale;
      g.adjustedScale = (c.scale.min + c.scale.diff * g.scale).toFixed(4);
      g.width = (g.adjustedScale * j.startWidth).toFixed(4);
      g.height = (g.adjustedScale * j.startHeight).toFixed(4);
      i.css({
        left: (g.x * c.midStage.width + c.nudge.width - g.width / 2).toFixed(0) + "px",
        top: (g.y * c.midStage.height + c.nudge.height - g.height / 2).toFixed(0) + "px",
        width: g.width + "px",
        height: g.height + "px",
        opacity: (c.opacity.min + c.opacity.diff * g.scale).toFixed(2),
        zIndex: Math.round(c.zValues.min + c.zValues.diff * g.z),
        fontSize: (g.adjustedScale * j.startFontSize).toFixed(1) + "px"
      });
      j.currentScale = g.adjustedScale;

      if (h.data("roundabout").debug) {
        k.push('<div style="font-weight: normal; font-size: 10px; padding: 2px; width: ' + i.css("width") + '; background-color: #ffc;">');
        k.push('<strong style="font-size: 12px; white-space: nowrap;">Child ' + e + "</strong><br />");
        k.push("<strong>left:</strong> " + i.css("left") + "<br />");
        k.push("<strong>top:</strong> " + i.css("top") + "<br />");
        k.push("<strong>width:</strong> " + i.css("width") + "<br />");
        k.push("<strong>opacity:</strong> " + i.css("opacity") + "<br />");
        k.push("<strong>height:</strong> " + i.css("height") + "<br />");
        k.push("<strong>z-index:</strong> " + i.css("z-index") + "<br />");
        k.push("<strong>font-size:</strong> " + i.css("font-size") + "<br />");
        k.push("<strong>scale:</strong> " + i.data("roundabout").currentScale);
        k.push("</div>");
        i.html(k.join(""));
      }

      i.trigger("reposition");
      f.apply(h);
      return d.isInFocus.apply(h, [j.degrees]);
    },
    setBearing: function setBearing(b, c) {
      c = c || function () {};

      b = d.normalize.apply(null, [b]);
      this.each(function () {
        var c,
            e,
            f,
            g = a(this),
            h = g.data("roundabout"),
            i = h.bearing;
        h.bearing = b;
        g.trigger("bearingSet");
        d.updateChildren.apply(g);
        c = Math.abs(i - b);

        if (!h.animating || c > 180) {
          return;
        }

        c = Math.abs(i - b);
        g.children(h.childSelector).each(function (c) {
          var e;

          if (d.isChildBackDegreesBetween.apply(a(this), [b, i])) {
            e = i > b ? "Clockwise" : "Counterclockwise";
            a(this).trigger("move" + e + "ThroughBack");
          }
        });
      });
      c.apply(this);
      return this;
    },
    adjustBearing: function adjustBearing(b, c) {
      c = c || function () {};

      if (b === 0) {
        return this;
      }

      this.each(function () {
        d.setBearing.apply(a(this), [a(this).data("roundabout").bearing + b]);
      });
      c.apply(this);
      return this;
    },
    setTilt: function setTilt(b, c) {
      c = c || function () {};

      this.each(function () {
        a(this).data("roundabout").tilt = b;
        d.updateChildren.apply(a(this));
      });
      c.apply(this);
      return this;
    },
    adjustTilt: function adjustTilt(b, c) {
      c = c || function () {};

      this.each(function () {
        d.setTilt.apply(a(this), [a(this).data("roundabout").tilt + b]);
      });
      c.apply(this);
      return this;
    },
    animateToBearing: function animateToBearing(b, c, e, f, g) {
      var h = new Date().getTime();

      g = g || function () {};

      if (a.isFunction(f)) {
        g = f;
        f = null;
      } else if (a.isFunction(e)) {
        g = e;
        e = null;
      } else if (a.isFunction(c)) {
        g = c;
        c = null;
      }

      this.each(function () {
        var i,
            j,
            k,
            l = a(this),
            m = l.data("roundabout"),
            n = !c ? m.duration : c,
            o = e ? e : m.easing || "swing";

        if (!f) {
          f = {
            timerStart: h,
            start: m.bearing,
            totalTime: n
          };
        }

        i = h - f.timerStart;

        if (m.stopAnimation) {
          d.allowAnimation.apply(l);
          m.animating = false;
          return;
        }

        if (i < n) {
          if (!m.animating) {
            l.trigger("animationStart");
          }

          m.animating = true;

          if (typeof a.easing.def === "string") {
            j = a.easing[o] || a.easing[a.easing.def];
            k = j(null, i, f.start, b - f.start, f.totalTime);
          } else {
            k = a.easing[o](i / f.totalTime, i, f.start, b - f.start, f.totalTime);
          }

          if (d.compareVersions.apply(null, [a().jquery, "1.7.2"]) >= 0 && !a.easing["easeOutBack"]) {
            k = f.start + (b - f.start) * k;
          }

          k = d.normalize.apply(null, [k]);
          m.dragBearing = k;
          d.setBearing.apply(l, [k, function () {
            setTimeout(function () {
              d.animateToBearing.apply(l, [b, n, o, f, g]);
            }, 0);
          }]);
        } else {
          m.lastAnimationStep = true;
          b = d.normalize.apply(null, [b]);
          d.setBearing.apply(l, [b, function () {
            l.trigger("animationEnd");
          }]);
          m.animating = false;
          m.lastAnimationStep = false;
          m.dragBearing = b;
          g.apply(l);
        }
      });
      return this;
    },
    animateToNearbyChild: function animateToNearbyChild(b, c) {
      var e = b[0],
          f = b[1],
          g = b[2] || function () {};

      if (a.isFunction(f)) {
        g = f;
        f = null;
      } else if (a.isFunction(e)) {
        g = e;
        e = null;
      }

      return this.each(function () {
        var b,
            h,
            i = a(this),
            j = i.data("roundabout"),
            k = !j.reflect ? j.bearing % 360 : j.bearing,
            l = i.children(j.childSelector).length;

        if (!j.animating) {
          if (j.reflect && c === "previous" || !j.reflect && c === "next") {
            k = Math.abs(k) < j.floatComparisonThreshold ? 360 : k;

            for (b = 0; b < l; b += 1) {
              h = {
                lower: j.period * b,
                upper: j.period * (b + 1)
              };
              h.upper = b === l - 1 ? 360 : h.upper;

              if (k <= Math.ceil(h.upper) && k >= Math.floor(h.lower)) {
                if (l === 2 && k === 360) {
                  d.animateToDelta.apply(i, [-180, e, f, g]);
                } else {
                  d.animateBearingToFocus.apply(i, [h.lower, e, f, g]);
                }

                break;
              }
            }
          } else {
            k = Math.abs(k) < j.floatComparisonThreshold || 360 - Math.abs(k) < j.floatComparisonThreshold ? 0 : k;

            for (b = l - 1; b >= 0; b -= 1) {
              h = {
                lower: j.period * b,
                upper: j.period * (b + 1)
              };
              h.upper = b === l - 1 ? 360 : h.upper;

              if (k >= Math.floor(h.lower) && k < Math.ceil(h.upper)) {
                if (l === 2 && k === 360) {
                  d.animateToDelta.apply(i, [180, e, f, g]);
                } else {
                  d.animateBearingToFocus.apply(i, [h.upper, e, f, g]);
                }

                break;
              }
            }
          }
        }
      });
    },
    animateToNearestChild: function animateToNearestChild(b, c, e) {
      e = e || function () {};

      if (a.isFunction(c)) {
        e = c;
        c = null;
      } else if (a.isFunction(b)) {
        e = b;
        b = null;
      }

      return this.each(function () {
        var f = d.getNearestChild.apply(a(this));
        d.animateToChild.apply(a(this), [f, b, c, e]);
      });
    },
    animateToChild: function animateToChild(b, c, e, f) {
      f = f || function () {};

      if (a.isFunction(e)) {
        f = e;
        e = null;
      } else if (a.isFunction(c)) {
        f = c;
        c = null;
      }

      return this.each(function () {
        var g,
            h = a(this),
            i = h.data("roundabout");

        if (i.childInFocus !== b && !i.animating) {
          g = h.children(i.childSelector).eq(b);
          d.animateBearingToFocus.apply(h, [g.data("roundabout").degrees, c, e, f]);
        }
      });
    },
    animateToNextChild: function animateToNextChild(a, b, c) {
      return d.animateToNearbyChild.apply(this, [arguments, "next"]);
    },
    animateToPreviousChild: function animateToPreviousChild(a, b, c) {
      return d.animateToNearbyChild.apply(this, [arguments, "previous"]);
    },
    animateToDelta: function animateToDelta(b, c, e, f) {
      f = f || function () {};

      if (a.isFunction(e)) {
        f = e;
        e = null;
      } else if (a.isFunction(c)) {
        f = c;
        c = null;
      }

      return this.each(function () {
        var g = a(this).data("roundabout").bearing + b;
        d.animateToBearing.apply(a(this), [g, c, e, f]);
      });
    },
    animateBearingToFocus: function animateBearingToFocus(b, c, e, f) {
      f = f || function () {};

      if (a.isFunction(e)) {
        f = e;
        e = null;
      } else if (a.isFunction(c)) {
        f = c;
        c = null;
      }

      return this.each(function () {
        var g = a(this).data("roundabout").bearing - b;
        g = Math.abs(360 - g) < Math.abs(g) ? 360 - g : -g;
        g = g > 180 ? -(360 - g) : g;

        if (g !== 0) {
          d.animateToDelta.apply(a(this), [g, c, e, f]);
        }
      });
    },
    stopAnimation: function stopAnimation() {
      return this.each(function () {
        a(this).data("roundabout").stopAnimation = true;
      });
    },
    allowAnimation: function allowAnimation() {
      return this.each(function () {
        a(this).data("roundabout").stopAnimation = false;
      });
    },
    startAutoplay: function startAutoplay(b) {
      return this.each(function () {
        var c = a(this),
            e = c.data("roundabout");

        b = b || e.autoplayCallback || function () {};

        clearInterval(e.autoplayInterval);
        e.autoplayInterval = setInterval(function () {
          d.animateToNextChild.apply(c, [b]);
        }, e.autoplayDuration);
        e.autoplayIsRunning = true;
        c.trigger("autoplayStart");
      });
    },
    stopAutoplay: function stopAutoplay(b) {
      return this.each(function () {
        clearInterval(a(this).data("roundabout").autoplayInterval);
        a(this).data("roundabout").autoplayInterval = null;
        a(this).data("roundabout").autoplayIsRunning = false;

        if (!b) {
          a(this).unbind(".autoplay");
        }

        a(this).trigger("autoplayStop");
      });
    },
    toggleAutoplay: function toggleAutoplay(b) {
      return this.each(function () {
        var c = a(this),
            e = c.data("roundabout");

        b = b || e.autoplayCallback || function () {};

        if (!d.isAutoplaying.apply(a(this))) {
          d.startAutoplay.apply(a(this), [b]);
        } else {
          d.stopAutoplay.apply(a(this), [b]);
        }
      });
    },
    isAutoplaying: function isAutoplaying() {
      return this.data("roundabout").autoplayIsRunning;
    },
    changeAutoplayDuration: function changeAutoplayDuration(b) {
      return this.each(function () {
        var c = a(this),
            e = c.data("roundabout");
        e.autoplayDuration = b;

        if (d.isAutoplaying.apply(c)) {
          d.stopAutoplay.apply(c);
          setTimeout(function () {
            d.startAutoplay.apply(c);
          }, 10);
        }
      });
    },
    normalize: function normalize(a) {
      var b = a % 360;
      return b < 0 ? 360 + b : b;
    },
    normalizeRad: function normalizeRad(a) {
      while (a < 0) {
        a += Math.PI * 2;
      }

      while (a > Math.PI * 2) {
        a -= Math.PI * 2;
      }

      return a;
    },
    isChildBackDegreesBetween: function isChildBackDegreesBetween(b, c) {
      var d = a(this).data("roundabout").backDegrees;

      if (b > c) {
        return d >= c && d < b;
      } else {
        return d < c && d >= b;
      }
    },
    getAnimateToMethod: function getAnimateToMethod(a) {
      a = a.toLowerCase();

      if (a === "next") {
        return "animateToNextChild";
      } else if (a === "previous") {
        return "animateToPreviousChild";
      }

      return "animateToNearestChild";
    },
    relayoutChildren: function relayoutChildren() {
      return this.each(function () {
        var b = a(this),
            c = a.extend({}, b.data("roundabout"));
        c.startingChild = b.data("roundabout").childInFocus;
        d.init.apply(b, [c, null, true]);
      });
    },
    getNearestChild: function getNearestChild() {
      var b = a(this),
          c = b.data("roundabout"),
          d = b.children(c.childSelector).length;

      if (!c.reflect) {
        return (d - Math.round(c.bearing / c.period) % d) % d;
      } else {
        return Math.round(c.bearing / c.period) % d;
      }
    },
    degToRad: function degToRad(a) {
      return d.normalize.apply(null, [a]) * Math.PI / 180;
    },
    getPlacement: function getPlacement(a) {
      var b = this.data("roundabout");
      return !b.reflect ? 360 - b.period * a : b.period * a;
    },
    isInFocus: function isInFocus(a) {
      var b,
          c = this,
          e = c.data("roundabout"),
          f = d.normalize.apply(null, [e.bearing]);
      a = d.normalize.apply(null, [a]);
      b = Math.abs(f - a);
      return b <= e.floatComparisonThreshold || b >= 360 - e.floatComparisonThreshold;
    },
    getChildInFocus: function getChildInFocus() {
      var b = a(this).data("roundabout");
      return b.childInFocus > -1 ? b.childInFocus : false;
    },
    compareVersions: function compareVersions(a, b) {
      var c,
          d = a.split(/\./i),
          e = b.split(/\./i),
          f = d.length > e.length ? d.length : e.length;

      for (c = 0; c <= f; c++) {
        if (d[c] && !e[c] && parseInt(d[c], 10) !== 0) {
          return 1;
        } else if (e[c] && !d[c] && parseInt(e[c], 10) !== 0) {
          return -1;
        } else if (d[c] === e[c]) {
          continue;
        }

        if (d[c] && e[c]) {
          if (parseInt(d[c], 10) > parseInt(e[c], 10)) {
            return 1;
          } else {
            return -1;
          }
        }
      }

      return 0;
    }
  };

  a.fn.roundabout = function (b) {
    if (d[b]) {
      return d[b].apply(this, Array.prototype.slice.call(arguments, 1));
    } else if (_typeof(b) === "object" || a.isFunction(b) || !b) {
      return d.init.apply(this, arguments);
    } else {
      a.error("Method " + b + " does not exist for jQuery.roundabout.");
    }
  };
})(jQuery);

/***/ }),

/***/ "./resources/js/jquery.roundabout-shapes-1.1.js":
/*!******************************************************!*\
  !*** ./resources/js/jquery.roundabout-shapes-1.1.js ***!
  \******************************************************/
/***/ (() => {

/**
 * jQuery Roundabout Shapes v1.1
 * http://fredhq.com/projects/roundabout-shapes/
 * 
 * Provides additional paths along which items can move for the
 * jQuery Roundabout plugin (v1.0+).
 *
 * Terms of Use // jQuery Roundabout Shapes
 *
 * Open source under the BSD license
 *
 * Copyright (c) 2009, Fred LeBlanc
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without 
 * modification, are permitted provided that the following conditions are met:
 * 
 *   - Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *   - Redistributions in binary form must reproduce the above 
 *     copyright notice, this list of conditions and the following 
 *     disclaimer in the documentation and/or other materials provided 
 *     with the distribution.
 *   - Neither the name of the author nor the names of its contributors 
 *     may be used to endorse or promote products derived from this 
 *     software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" 
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE 
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE 
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE 
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR 
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF 
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS 
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN 
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) 
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE 
 * POSSIBILITY OF SUCH DAMAGE.
 */
jQuery.extend(jQuery.roundabout_shape, {
  theJuggler: function theJuggler(r, a, t) {
    return {
      x: Math.sin(r + a),
      y: Math.tan(Math.exp(Math.log(r)) + a) / (t - 1),
      z: (Math.cos(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  figure8: function figure8(r, a, t) {
    return {
      x: Math.sin(r * 2 + a),
      y: Math.sin(r + Math.PI / 2 + a) / 8 * t,
      z: (Math.cos(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  waterWheel: function waterWheel(r, a, t) {
    return {
      x: Math.sin(r + Math.PI / 2 + a) / 8 * t,
      y: Math.sin(r + a) / (Math.PI / 2),
      z: (Math.cos(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  square: function square(r, a, t) {
    var sq_x, sq_y, sq_z;

    if (r <= Math.PI / 2) {
      sq_x = 2 / Math.PI * r;
      sq_y = -(2 / Math.PI) * r + 1;
      sq_z = -(1 / Math.PI) * r + 1;
    } else if (r > Math.PI / 2 && r <= Math.PI) {
      sq_x = -(2 / Math.PI) * r + 2;
      sq_y = -(2 / Math.PI) * r + 1;
      sq_z = -(1 / Math.PI) * r + 1;
    } else if (r > Math.PI && r <= 3 * Math.PI / 2) {
      sq_x = -(2 / Math.PI) * r + 2;
      sq_y = 2 / Math.PI * r - 3;
      sq_z = 1 / Math.PI * r - 1;
    } else {
      sq_x = 2 / Math.PI * r - 4;
      sq_y = 2 / Math.PI * r - 3;
      sq_z = 1 / Math.PI * r - 1;
    }

    return {
      x: sq_x,
      y: sq_y * t,
      z: sq_z,
      scale: sq_z
    };
  },
  conveyorBeltLeft: function conveyorBeltLeft(r, a, t) {
    return {
      x: -Math.cos(r + a),
      y: Math.cos(r + 3 * Math.PI / 2 + a) / 8 * t,
      z: (Math.sin(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  conveyorBeltRight: function conveyorBeltRight(r, a, t) {
    return {
      x: Math.cos(r + a),
      y: Math.cos(r + 3 * Math.PI / 2 + a) / 8 * t,
      z: (Math.sin(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  goodbyeCruelWorld: function goodbyeCruelWorld(r, a, t) {
    return {
      x: Math.sin(r + a),
      y: Math.tan(r + 3 * Math.PI / 2 + a) / 8 * (t + 0.5),
      z: (Math.sin(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  diagonalRingLeft: function diagonalRingLeft(r, a, t) {
    return {
      x: Math.sin(r + a),
      y: -Math.cos(r + Math.tan(Math.cos(a))) / (t + 1.5),
      z: (Math.cos(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  diagonalRingRight: function diagonalRingRight(r, a, t) {
    return {
      x: Math.sin(r + a),
      y: Math.cos(r + Math.tan(Math.cos(a))) / (t + 1.5),
      z: (Math.cos(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  rollerCoaster: function rollerCoaster(r, a, t) {
    return {
      x: Math.sin(r + a),
      y: Math.sin((2 + t) * r),
      z: (Math.cos(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  },
  tearDrop: function tearDrop(r, a, t) {
    return {
      x: Math.sin(r + a),
      y: -Math.sin(r / 2 + t) + 0.35,
      z: (Math.cos(r + a) + 1) / 2,
      scale: Math.sin(r + Math.PI / 2 + a) / 2 + 0.5
    };
  }
});

/***/ }),

/***/ "./resources/js/squad.js":
/*!*******************************!*\
  !*** ./resources/js/squad.js ***!
  \*******************************/
/***/ (() => {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

(function () {
  "use strict";
  /**
   * Easy selector helper function
   */

  var select = function select(el) {
    var all = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
    el = el.trim();

    if (all) {
      return _toConsumableArray(document.querySelectorAll(el));
    } else {
      return document.querySelector(el);
    }
  };
  /**
   * Easy event listener function
   */


  var on = function on(type, el, listener) {
    var all = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : false;
    var selectEl = select(el, all);

    if (selectEl) {
      if (all) {
        selectEl.forEach(function (e) {
          return e.addEventListener(type, listener);
        });
      } else {
        selectEl.addEventListener(type, listener);
      }
    }
  };
  /**
   * Easy on scroll event listener
   */


  var onscroll = function onscroll(el, listener) {
    el.addEventListener('scroll', listener);
  };
  /**
   * Navbar links active state on scroll
   */


  var navbarlinks = select('#navbar .scrollto', true);

  var navbarlinksActive = function navbarlinksActive() {
    var position = window.scrollY + 200;
    navbarlinks.forEach(function (navbarlink) {
      if (!navbarlink.hash) return;
      var section = select(navbarlink.hash);
      if (!section) return;

      if (position >= section.offsetTop && position <= section.offsetTop + section.offsetHeight) {
        navbarlink.classList.add('active');
      } else {
        navbarlink.classList.remove('active');
      }
    });
  };

  window.addEventListener('load', navbarlinksActive);
  onscroll(document, navbarlinksActive);
  /**
   * Scrolls to an element with header offset
   */

  var scrollto = function scrollto(el) {
    var header = select('#header');
    var offset = header.offsetHeight;

    if (!header.classList.contains('header-scrolled')) {
      offset -= 24;
    }

    var elementPos = select(el).offsetTop;
    window.scrollTo({
      top: elementPos - offset,
      behavior: 'smooth'
    });
  };
  /**
   * Toggle .header-scrolled class to #header when page is scrolled
   */


  var selectHeader = select('#header');

  if (selectHeader) {
    var headerScrolled = function headerScrolled() {
      if (window.scrollY > 100) {
        selectHeader.classList.add('header-scrolled');
      } else {
        selectHeader.classList.remove('header-scrolled');
      }
    };

    window.addEventListener('load', headerScrolled);
    onscroll(document, headerScrolled);
  }
  /**
   * Back to top button
   */
  // let backtotop = select('.back-to-top')
  // if (backtotop) {
  //   const toggleBacktotop = () => {
  //     if (window.scrollY > 100) {
  //       backtotop.classList.add('active')
  //     } else {
  //       backtotop.classList.remove('active')
  //     }
  //   }
  //   window.addEventListener('load', toggleBacktotop)
  //   onscroll(document, toggleBacktotop)
  // }

  /**
   * Mobile nav toggle
   */


  on('click', '.mobile-nav-toggle', function (e) {
    select('#navbar').classList.toggle('navbar-mobile');
    this.classList.toggle('bi-list');
    this.classList.toggle('bi-x');
  });
  /**
   * Mobile nav dropdowns activate
   */

  on('click', '.navbar .dropdown > a', function (e) {
    if (select('#navbar').classList.contains('navbar-mobile')) {
      e.preventDefault();
      this.nextElementSibling.classList.toggle('dropdown-active');
    }
  }, true);
  /**
   * Scrool with ofset on links with a class name .scrollto
   */

  on('click', '.scrollto', function (e) {
    if (select(this.hash)) {
      e.preventDefault();
      var navbar = select('#navbar');

      if (navbar.classList.contains('navbar-mobile')) {
        navbar.classList.remove('navbar-mobile');
        var navbarToggle = select('.mobile-nav-toggle');
        navbarToggle.classList.toggle('bi-list');
        navbarToggle.classList.toggle('bi-x');
      }

      scrollto(this.hash);
    }
  }, true);
  /**
   * Scroll with ofset on page load with hash links in the url
   */

  window.addEventListener('load', function () {
    if (window.location.hash) {
      if (select(window.location.hash)) {
        scrollto(window.location.hash);
      }
    }
  });
  /**
   * Porfolio isotope and filter
   */

  window.addEventListener('load', function () {
    var portfolioContainer = select('.portfolio-container');

    if (portfolioContainer) {
      var portfolioIsotope = new Isotope(portfolioContainer, {
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
      });
      var portfolioFilters = select('#portfolio-flters li', true);
      on('click', '#portfolio-flters li', function (e) {
        e.preventDefault();
        portfolioFilters.forEach(function (el) {
          el.classList.remove('filter-active');
        });
        this.classList.add('filter-active');
        portfolioIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        portfolioIsotope.on('arrangeComplete', function () {
          AOS.refresh();
        });
      }, true);
    }
  });
  /**
   * Initiate portfolio lightbox
   */
  // const portfolioLightbox = GLightbox({
  //   selector: '.portfolio-lightbox'
  // });

  /**
   * collection slider
   */

  new Swiper('.collections-slider', {
    speed: 800,
    loop: true,
    autoplay: {
      delay: 6000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      320: {
        slidesPerView: 1
      },
      1540: {
        slidesPerView: 1
      }
    }
  });
  /**
   * goodsByLikes slider
   */

  new Swiper('.goodsByLikes-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },
      640: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      1025: {
        slidesPerView: 3,
        spaceBetween: 40
      },
      1200: {
        slidesPerView: 4
      },
      1540: {
        slidesPerView: 5
      }
    }
  });
  /**
   * Brands slider
   */

  new Swiper('.brands-slider', {
    speed: 800,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },
      640: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      900: {
        slidesPerView: 3,
        spaceBetween: 40
      },
      1200: {
        slidesPerView: 4
      },
      1400: {
        slidesPerView: 5
      }
    }
  });
  /**
   * Testimonials slider
   */

  new Swiper('.testimonials-slider', {
    speed: 600,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },
      640: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      1025: {
        slidesPerView: 3,
        spaceBetween: 40
      }
    }
  });
  /**
   * Portfolio details slider
   */

  new Swiper('.portfolio-details-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    scrollbar: {
      el: '.swiper-scrollbar'
    }
  });
  /**
   * Animation on scroll
   */

  window.addEventListener('load', function () {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false
    });
  });
})();

/***/ }),

/***/ "./resources/css/app.css":
/*!*******************************!*\
  !*** ./resources/css/app.css ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					result = fn();
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/app": 0,
/******/ 			"css/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) var result = runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkIds[i]] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/js/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app"], () => (__webpack_require__("./resources/css/app.css")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;