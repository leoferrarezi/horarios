(function($) {
    'use strict';
    if ($.cookie('corona-pro-banner')!="true") {
        document.querySelector('#proBanner').classList.add('d-flex');
      }
      else {
        document.querySelector('#proBanner').classList.add('d-none');
      }
      document.querySelector('#bannerClose').addEventListener('click',function() {
        document.querySelector('#proBanner').classList.add('d-none');
        document.querySelector('#proBanner').classList.remove('d-flex');
        var date = new Date();
        date.setTime(date.getTime() + 24 * 60 * 60 * 1000); 
        $.cookie('corona-pro-banner', "true", { expires: date });
      });
})(jQuery)