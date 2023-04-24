$(function () {
    if ($(window).scrollTop() > 10) {
        $('#navbar-2').addClass('active');
    } else {
        $('#navbar-2').removeClass('active');
    }
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 10) {
            $('#navbar-2').addClass('active');
        } else {
            $('#navbar-2').removeClass('active');
        }
    });
});

$(function () {
    $('[data-bs-toggle="tooltip"]').tooltip()
});

$(function () {
    $('[data-bs-toggle="popover"]').popover({
        placement: 'right',
        trigger: 'hover'
    });
});

$(document).ready(function() {
     $('.popr').popr();
});

$(document).on('click', '#feugait', function () {                
     alert('Feugait');
});

function toggleMenuButton() {
    $('#menu-uppper-toggle-layer').toggleClass('show-menu-active');
}

function toggleMenuButtonMobile() {
    $('#mobile_full_screen_menu').toggleClass('show-menu-active');
}

$(document).ready(function () {
    var input = document.getElementById("searchtext");
    input.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            search();
        }
    });
    var input2 = document.getElementById("searchtext2");
    input2.addEventListener("keypress", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            search2();
        }
    });
});
function search() {
    var a = $('#searchtext').val();
    window.location.href = "search/" + a;
}
function search2() {
    var a = $('#searchtext2').val();
    window.location.href = "search/" + a;
}

$(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
        $('#back-to-top').fadeIn();
    } else {
        $('#back-to-top').fadeOut();
    }
});
// scroll body to 0px on click
$('#back-to-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 400);
    return false;
});

//
function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    //document.body.style.backgroundColor = "rgba(0,0,0,0.3)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    //document.body.style.backgroundColor = "white";

}

function openSearchNav() {
    document.getElementById("searchHeader").style.width = "100%";
}

function closeSearchNav() {
    document.getElementById("searchHeader").style.width = "0";
}

$(document).keyup(function (e) {
    if (e.keyCode == 27) { // escape key maps to keycode `27`
        document.getElementById("searchHeader").style.width = "0";
    }
});





const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    } else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }
}

// toggleSwitch.addEventListener('change', switchTheme, false);



$(".header-avatar-image").letterpic({
    colors: [
        "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
        "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
    ],
    font: 'Inter'
});


/*
 * LetterAvatar
 * 
 * Artur Heinze
 * Create Letter avatar based on Initials
 * based on https://gist.github.com/leecrossley/6027780
 */
/* (function(w, d){


  function LetterAvatar (name, size) {

      name  = name || '';
      size  = size || 60;

      var colours = [
              "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
              "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
          ],

          nameSplit = String(name).toUpperCase().split(' '),
          initials, charIndex, colourIndex, canvas, context, dataURI;


      if (nameSplit.length == 1) {
          initials = nameSplit[0] ? nameSplit[0].charAt(0):'?';
      } else {
          initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
      }

      if (w.devicePixelRatio) {
          size = (size * w.devicePixelRatio);
      }
          
      charIndex     = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
      colourIndex   = charIndex % 20;
      canvas        = d.createElement('canvas');
      canvas.width  = size;
      canvas.height = size;
      context       = canvas.getContext("2d");
       
      context.fillStyle = colours[colourIndex - 1];
      context.fillRect (0, 0, canvas.width, canvas.height);
      context.font = Math.round(canvas.width/2)+"px Arial";
      context.textAlign = "center";
      context.fillStyle = "#FFF";
      context.fillText(initials, size / 2, size / 1.5);

      dataURI = canvas.toDataURL();
      canvas  = null;

      return dataURI;
  }

  LetterAvatar.transform = function() {

      Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
          name = img.getAttribute('avatar');
          img.src = LetterAvatar(name, img.getAttribute('width'));
          img.removeAttribute('avatar');
          img.setAttribute('alt', name);
      });
  };


  // AMD support
  if (typeof define === 'function' && define.amd) {
      
      define(function () { return LetterAvatar; });
  
  // CommonJS and Node.js module support.
  } else if (typeof exports !== 'undefined') {
      
      // Support Node.js specific `module.exports` (which can be a function)
      if (typeof module != 'undefined' && module.exports) {
          exports = module.exports = LetterAvatar;
      }

      // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
      exports.LetterAvatar = LetterAvatar;

  } else {
      
      window.LetterAvatar = LetterAvatar;

      d.addEventListener('DOMContentLoaded', function(event) {
          LetterAvatar.transform();
      });
  }

})(window, document); */

$(document).ready(function () {
    var maxLength = 200;
    $(".show-read-more").each(function () {
        var myStr = $(this).text();
        if ($.trim(myStr).length > maxLength) {
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more">read more...</a>');
            $(this).append('<span class="more-text">' + removedStr + '</span>');
        }
    });
    $(".read-more").click(function () {
        $(this).siblings(".more-text").contents().unwrap();
        $(this).remove();
    });
});

$(document).ready(function () {
    var maxLength = 50;
    $(".show-read-more-2").each(function () {
        var myStr = $(this).text();
        if ($.trim(myStr).length > maxLength) {
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            $(this).empty().html(newStr);
            $(this).append(' <a href="javascript:void(0);" class="read-more-2">read more...</a>');
            $(this).append('<span class="more-text-2">' + removedStr + '</span>');
        }
    });
    $(".read-more-2").click(function () {
        $(this).siblings(".more-text-2").contents().unwrap();
        $(this).remove();
    });
});

//count
$('.count').each(function () {
    var $this = $(this);
    $({
        Counter: 0
    }).animate({
        Counter: $this.text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function () {
            $this.text(Math.ceil(this.Counter));
        }
    });
});

function login() {
    location.href = 'login-user-mm';
}

/* ------------------------ switch network code start ----------------------- */

// async function abcnew() {
//     const chainId = '4' // Ethereum Testnet

//     if (window.ethereum.networkVersion !== chainId) {
//         try {
//             await window.ethereum.request({
//                 method: 'wallet_switchEthereumChain',
//                 params: [{
//                     chainId: '0x4'
//                 }],
//             });
//         } catch (err) {
//             console.log(err);
//         }
//     }
// }
/* ------------------------ switch network code end ----------------------- */

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});