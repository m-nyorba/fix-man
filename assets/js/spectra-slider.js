document.addEventListener("DOMContentLoaded", function () {
  // Wait for Spectra to initialize its slider.
  setTimeout(function () {
    const sliderElements = document.querySelectorAll(
      ".wp-block-spectra-slider",
    );

    sliderElements.forEach(function (container) {
      // Check whether Swiper is attached to the element.
      const swiperInstance =
        container.querySelector(".swiper")?.swiper || container.swiper;

      if (swiperInstance) {
        // Override the slider configuration.
        swiperInstance.params.slidesPerView = 3;
        swiperInstance.params.spaceBetween = 20;

        // Configure responsive breakpoints.
        swiperInstance.params.breakpoints = {
          320: { slidesPerView: 1, spaceBetween: 10 },
          768: { slidesPerView: 2, spaceBetween: 15 },
          1024: { slidesPerView: 3, spaceBetween: 20 },
        };

        // Recalculate the slider dimensions.
        swiperInstance.update();
      }
    });
  }, 1200);
});
