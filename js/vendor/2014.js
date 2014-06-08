basket.require({ url: 'http://localhost/gitxamp/js/vendor/jquery.sequence-min.js' }).then(function () {

        basket.require({ url: 'http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.js' },
          {url: 'http://localhost/gitxamp/js/vendor/jquery.sequence-min.js'},
{ url: 'http://localhost/gitxamp/js/vendor/jquery.smooth-scroll.min.js'},
{ url: 'http://localhost/gitxamp/js/vendor/jquery.navobile.min.js'},
//{ url: 'http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js'},
{ url: 'http://localhost/gitxamp/js/vendor/waypoints.min.js'},
{ url: 'http://localhost/gitxamp/js/vendor/jquery.parallax-1.1.3.js'},
{ url: 'http://localhost/gitxamp/js/vendor/tiny.js'}

          )


           

          
    .then(function () {
 basket.require({ url: 'http://localhost/gitxamp/js/vendor/corebask.js'});


});





});
