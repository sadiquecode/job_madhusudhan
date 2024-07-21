import "./dist/flickity.pkgd.min.js";

(() => {
  "use strict";

  // enable carousel
  var flkty = new Flickity("#testimonials-carousel", {
    // options
    contain: true,
    initialIndex: 1
  });
})();
