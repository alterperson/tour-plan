$(document).ready(function () {
  // Code for slider
  const hotelSlider = new Swiper(".hotel-slider", {
    // Optional parameters
    loop: true,
    effect: "fade",
    keyboard: {
      enabled: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: ".hotel-slider__button--next",
      prevEl: ".hotel-slider__button--prev",
    },
  });

  const reviewsSlider = new Swiper(".reviews-slider", {
    // Optional parameters
    loop: true,
    keyboard: {
      enabled: true,
    },

    // Navigation arrows
    navigation: {
      nextEl: ".reviews-slider__button--next",
      prevEl: ".reviews-slider__button--prev",
    },
  });

  //Code for menu-mobile
  var menuButton = $(".menu-button");
  menuButton.on("click", () => {
    $(".navbar-menu").toggleClass("navbar-menu--active");
  });

  var modalButton = $("[data-toggle=modal]");
  var closeModalButton = $(".modal__close");
  modalButton.on("click", openModal);
  closeModalButton.on("click", closeModal);

  //Code for modal window
  function openModal() {
    var targetModal = $(this).attr("data-href");

    $(targetModal).find(".modal__overlay").addClass("modal__overlay--visible");
    $(targetModal).find(".modal__dialog").addClass("modal__dialog--visible");
  }

  function closeModal() {
    var modalOverlay = $(".modal__overlay");
    var modalDialog = $(".modal__dialog");

    modalOverlay.removeClass("modal__overlay--visible");
    modalDialog.removeClass("modal__dialog--visible");
  }

  $(document).on("keyup", function (e) {
    if (e.key == "Escape") closeModal();
  });

  //Code for form validation

  $(".form").each(function () {
    $(this).validate({
      errorClass: "invalid",
      messages: {
        name: {
          required: "Name is required",
          minlength: "At least 3 characters",
        },
        email: {
          required: "Email is required",
          email: "Email address format: name@domain.com",
        },
        phone: {
          required: "Phone number is required",
          phone: "Phone number format: +7(999)999-99-99",
          minlength: "At least 11 characters",
        },
      },
    });
  });
});

$(".phone").mask("+0 (000) 000-0000");
