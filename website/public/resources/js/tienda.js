"use strict";

$(document).ready(function () {
	/*NAVBAR*/
    var burger = document.querySelector(".burger-container"),
    nav = document.querySelector(".navbar--main");

    burger.onclick = function() {
        nav.classList.toggle("menu-opened");
        document.body.classList.toggle("no-scroll");
    };

    document.addEventListener("click", function(event) {
    var isClickInside = nav.contains(event.target);

    if (!isClickInside && nav.classList.contains("menu-opened")) {
      nav.classList.remove("menu-opened");
      document.body.classList.toggle("no-scroll");
    }
  });

  	/*PRODUCT CATEGORY RADIO BUTTON*/
  if($('input[name="categoryRadio"]').length){
    var hash = document.location.hash;
    if (hash) {
      var i = $(`input[data-target="${hash.replace('t-',"")}"]`);
      i.prop('checked',true);
      i.tab('show');
      i.removeClass('active');
    }
    $(window).on('hashchange', function() {
      var hash = document.location.hash;
      var i = $(`input[data-target="${hash.replace('t-',"")}"]`);
      i.prop('checked',true);
      i.tab('show');
      i.removeClass('active');
    });
    
    $('input[name="categoryRadio"]').click(function () {
      $(this).tab('show');
      $(this).removeClass('active');
    });
  }

  /*PRODUCT PRICE RANGE*/
  if($('.price-range').length){
  $('.upper').on('input', setFill);
	$('.lower').on('input', setFill);

	var max = $('.upper').attr('max');
	var min = $('.lower').attr('min');

	function setFill(evt) {
		var valUpper = $('.upper').val();
		var valLower = $('.lower').val();
		if (parseFloat(valLower) > parseFloat(valUpper)) {
			var trade = valLower;
			valLower = valUpper;
			valUpper = trade;
		}
		
		var width = valUpper * 100 / max;
		var left = valLower * 100 / max;
		$('.fill').css('left', 'calc(' + left + '%)');
		$('.fill').css('width', width - left + '%');
		
		// Update info
		if (parseInt(valLower) == min) {
			$('.easy-basket-lower').val('0');
		} else {
			$('.easy-basket-lower').val(parseInt(valLower));
		}
		if (parseInt(valUpper) == max) {
			$('.easy-basket-upper').val('5000');
		} else {
			$('.easy-basket-upper').val(parseInt(valUpper));
		}
	}
	
	// cambiar manualmente el rango de precios
	$('.easy-basket-filter-info p input').keyup(function() {
		var valUpper = $('.easy-basket-upper').val();
		var valLower = $('.easy-basket-lower').val();
		var width = valUpper * 100 / max;
		var left = valLower * 100 / max;
		if ( valUpper > 5000 ) {
			var left = max;
		}
		if ( valLower < 0 ) {
			var left = min;
		} else if ( valLower > max ) {
			var left = min;
		}
		$('.fill').css('left', 'calc(' + left + '%)');
		$('.fill').css('width', width - left + '%');
		// cambiar la posición de los controles deslizantes
		$('.lower').val(valLower);
		$('.upper').val(valUpper);
	});
	$('.easy-basket-filter-info p input').focus(function() {
		$(this).val('');
	});
	$('.easy-basket-filter-info .iLower input').blur(function() {
		var valLower = $('.lower').val();
		$(this).val(Math.floor(valLower));
	});
	$('.easy-basket-filter-info .iUpper input').blur(function() {
		var valUpper = $('.upper').val();
		$(this).val(Math.floor(valUpper));
	});
	
  }
});
/*Quantity Product Page*/
if($('.ctrl').length){
  function ctrls(element, min, max) {
      var _this = this;

    this.counter = 1;
    this.els = {
      decrement: element.querySelector('.ctrl__button--decrement'),
      counter: {
        container: element.querySelector('.ctrl__counter'),
        num: element.querySelector('.ctrl__counter-num'),
        input: element.querySelector('.ctrl__counter-input')
      },
      increment: element.querySelector('.ctrl__button--increment')
    };

    this.decrement = function() {
      var counter = _this.getCounter();
      var nextCounter = (_this.counter > min) ? --counter : counter;
      _this.setCounter(nextCounter);
    };

    this.increment = function() {
      var counter = _this.getCounter();
      var nextCounter = (counter < max) ? ++counter : counter;
      _this.setCounter(nextCounter);
    };

    this.getCounter = function() {
      return _this.counter;
    };

    this.setCounter = function(nextCounter) {
      _this.counter = nextCounter;
    };

    this.debounce = function(callback) {
      setTimeout(callback, 100);
    };

    this.render = function(hideClassName, visibleClassName) {
      _this.els.counter.num.classList.add(hideClassName);

      setTimeout(function() {
        _this.els.counter.num.innerText = _this.getCounter();
        _this.els.counter.input.value = _this.getCounter();
        _this.els.counter.num.classList.add(visibleClassName);
      }, 100);

      setTimeout(function() {
        _this.els.counter.num.classList.remove(hideClassName);
        _this.els.counter.num.classList.remove(visibleClassName);
      }, 200);
    };

    this.ready = function() {
      _this.els.decrement.addEventListener('click', function() {
        _this.debounce(function() {
          _this.decrement();
          _this.render('is-decrement-hide', 'is-decrement-visible');
        });
      });

      _this.els.increment.addEventListener('click', function() {
        _this.debounce(function() {
          _this.increment();
          _this.render('is-increment-hide', 'is-increment-visible');
        });
      });

      _this.els.counter.input.addEventListener('input', function(e) {
        var parseValue = parseInt(e.target.value);
        if (!isNaN(parseValue) && parseValue >= min && parseValue <= max) {
          _this.setCounter(parseValue);
          _this.render();
        }
      });

      _this.els.counter.input.addEventListener('focus', function(e) {
        _this.els.counter.container.classList.add('is-input');
      });

      _this.els.counter.input.addEventListener('blur', function(e) {
        _this.els.counter.container.classList.remove('is-input');
        _this.render();
      });
    };
  };

  // init
  document.querySelectorAll('.ctrl').forEach(ctrl => {
    var controls = new ctrls(ctrl, ctrl.getAttribute('min'), ctrl.getAttribute('max'));
    document.addEventListener('DOMContentLoaded', controls.ready);
  });
  
}