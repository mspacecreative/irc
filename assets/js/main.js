(function ($) {
  $(function () {
    var menuOverlay = $(".menuOverlay"),
      hamburgerIcon = $(".hamburger"),
      header = $("header"),
      menuItem = $(".menuInner li a"),
      closeButton = $(".closeModalButton"),
      closeSearchButton = $(".closeSearchButton"),
      searchBar = $(".search_container"),
      modalOverlayDiv = '<div class="modal_overlay"></div>',
      headerHeight = $("header").outerHeight(),
      heroSection = $(".hero");

    // CAROUSEL
    $(".carousel").slick({
      //autoplay: true,
      adaptiveHeight: true,
    });

    function addOverlay() {
      if ($(".show").length) {
        $(modalOverlayDiv).hide().prependTo("body").fadeIn();
      }
    }

    // FILTER FUNCTIONALITY
    function filterFunctions() {
      const businessCategory =
        document.getElementById("business-category").value;
      const community = document.getElementById("communities").value;
      const cards = document.querySelectorAll(".wp-block-post");
      for (i = 0; i > cards.length; i++) {
        if (
          businessCategory == cards[i].classList.contains(businessCategory) ||
          community == cards[i].classList.contains(community)
        ) {
          cards[i].style.display = "block";
        } else {
          cards[i].style.display = "none";
        }
      }
    }

    // document
    //   .getElementById("business-category")
    //   .addEventListener("change", showOnChange);

    // document
    //   .getElementById("communities")
    //   .addEventListener("change", showOnChange2);

    const noResults = document.querySelector(".no-results");

    // function showOnChange() {
    //   const cards = document.querySelectorAll(".wp-block-post");
    //   let filterSelect = document.querySelector("#business-category").value;
    //   for (var i = 0; i < cards.length; i++) {
    //     if (cards[i].classList.contains(filterSelect) || filterSelect === "") {
    //       cards[i].style.display = "block";
    //     } else {
    //       cards[i].style.display = "none";
    //     }
    //     if (!$(".wp-block-post").is(":visible")) {
    //       noResults.style.display = "block";
    //     } else {
    //       noResults.style.display = "none";
    //     }
    //   }
    // }

    // function showOnChange2() {
    //   const cards = document.querySelectorAll(".wp-block-post");
    //   let filterSelect = document.querySelector("#communities").value;
    //   for (var i = 0; i < cards.length; i++) {
    //     if (cards[i].classList.contains(filterSelect) || filterSelect === "") {
    //       cards[i].style.display = "block";
    //     } else {
    //       cards[i].style.display = "none";
    //     }
    //     if (!$(".wp-block-post").is(":visible")) {
    //       noResults.style.display = "block";
    //     } else {
    //       noResults.style.display = "none";
    //     }
    //   }
    // }

    $(".taxonomy-filter-container").on("change", "select", function () {
      var businessCategory = $("#business-category").val(),
        communities = $("#communities").val();

      var grid = $(".wp-block-cards");
      var cards = grid.find(".wp-block-post");
      cards.hide();

      var filtered = cards.filter(function () {
        var classes = cards.each(function () {
          $(this).classList;
        });
        console.log(classes);
        if (
          businessCategory !== "" &&
          classes.hasClass(businessCategory) !== businessCategory
        ) {
          return false;
        }
        if (
          communities !== "" &&
          classes.hasClass(communities) !== communities
        ) {
          return false;
        }
        return true;
      });

      filtered.show();

      if (filtered.length == 0) {
        noResults.style.display = "block";
      }
    });

    // BIO MODAL FUNCTIONALITY
    let bioButton = $(".bios li > a");
    const modal = $(".modal");
    const modalBackdrop = $(".modal-backdrop");
    $(bioButton).each(function () {
      $(this).click(function (e) {
        e.preventDefault();
        $(modal).toggleClass("show");
        $(modalBackdrop).toggleClass("show");
        const buttonId = $(this).data("id");
        $('.bio-container[id="' + buttonId + '"').addClass("show");
      });
    });

    modal.click(function () {
      $(this).removeClass("show");
      modalBackdrop.removeClass("show");
      $(".bio-container").removeClass("show");
    });

    $(".bio-container .closeModalButton").click(function () {
      $(modal).toggleClass("show");
      $(modalBackdrop).toggleClass("show");
      $(this).parent().removeClass("show");
    });

    function removeOverlayButtons() {
      $("html").removeClass("fixed");
      menuOverlay.removeClass("show");
      $(".modal_overlay").fadeOut("normal", function () {
        $(this).remove();
      });
    }

    function removeOverlay() {
      $("body").on("click", ".modal_overlay", function () {
        $("html").removeClass("fixed");
        $(this).siblings(searchBar, menuOverlay).removeClass("show");
        $(this).fadeOut("normal", function () {
          $(this).remove();
        });
      });
    }

    function toggleMenu() {
      header.toggleClass("is-active");
      //$('html').addClass('fixed');
      menuOverlay.toggleClass("show");
      addOverlay();
    }

    menuItem.click(function () {
      menuOverlay.removeClass("show");
      $(".modal_overlay").fadeOut("normal", function () {
        $(this).remove();
      });
      $("html").removeClass("fixed");
      header.removeClass("is-active");
    });

    var $document = $(document);
    //viewportHeight = $('.splash').height() / 2;
    $document.scroll(function () {
      if ($document.scrollTop() >= 50) {
        $("header").addClass("white-bg");
      } else {
        $("header").removeClass("white-bg");
      }
    });

    $(".modal-content, .bio-container").click(function (e) {
      e.stopPropagation();
    });

    // ACCORDION FUNCTIONALITY
    $(".tabRow > a").click(function (e) {
      e.preventDefault();
      $(this).next().slideToggle();
      $(this).toggleClass("rotate");
    });

    // SMOOTH SCROLL TO ANCHORS
    $('a[href*="#"]')
      .not('[href="#"]')
      .not('[href="#0"]')
      .click(function () {
        if (
          location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
          location.hostname == this.hostname
        ) {
          var target = $(this.hash);
          target = target.length
            ? target
            : $("[name=" + this.hash.slice(1) + "]");
          if (target.length) {
            //setTimeout(function(){
            $("html,body").animate(
              {
                scrollTop: target.offset().top,
              },
              500
            );
            return false;
          }
        }
      });

    // MOBILE MENU
    hamburgerIcon.click(function () {
      toggleMenu();
    });
    // CLOSE MENU BUTTON
    closeButton.click(function () {
      removeOverlayButtons();
    });

    removeOverlay();

    // ESCAPE KEY CLICK TO ESCAPE
    $(document).keyup(function (e) {
      if (e.key === "Escape") {
        // escape key maps to keycode `27`
        menuOverlay.removeClass("show");
        searchBar.removeClass("show");
        $("html").removeClass("fixed");
        $(".modal_overlay").fadeOut("normal", function () {
          $(this).remove();
        });
        // $(".modal").fadeOut("normal", function () {
        //   $(this).remove();
        // });
        $(".bio-container, .modal, .modal-backdrop").removeClass("show");
        $(".modal_container").fadeOut();
        $(".modal_inner").removeClass("visible");
      }
    });
  });
})(jQuery);

// FIXED HEADER TOGGLE
var lastScrollTop = 0;
const header = document.querySelector("header");

window.addEventListener(
  "scroll",
  function () {
    var st = window.pageYOffset || document.documentElement.scrollTop;
    if (st > lastScrollTop) {
      header.classList.add("scroll-down");
      header.classList.remove("fixed", "scroll-up", "reset");
    } else if (st < lastScrollTop) {
      header.classList.add("fixed", "scroll-up");
      header.classList.remove("scroll-down");
      if (window.pageYOffset == 20) {
        header.classList.add("reset");
      }
    } // else was horizontal scroll
    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  },
  false
);

window.onscroll = function () {
  if (window.pageYOffset <= 150) {
    header.classList.add("reset");
  }
};

let parentItem = document.querySelectorAll(
  ".menuOverlay .menu-item-has-children"
);
for (i = 0; i < parentItem.length; i++) {
  let childToggle = document.createElement("span");
  childToggle.classList.add("sub-toggle");
  childToggle.innerHTML = "<i class='fa fa-angle-down'></i>";
  parentItem[i].prepend(childToggle);
}

let subToggle = document.querySelectorAll(".sub-toggle");
for (i = 0; i < subToggle.length; i++) {
  subToggle[i].addEventListener("click", function () {
    slideToggle(this.parentNode.children[2], 200);
    this.children[0].classList.toggle("is-active");
  });
}

let slideUp = (target, duration = 500) => {
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.boxSizing = "border-box";
  target.style.height = target.offsetHeight + "px";
  target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  window.setTimeout(() => {
    target.style.display = "none";
    target.style.removeProperty("height");
    target.style.removeProperty("padding-top");
    target.style.removeProperty("padding-bottom");
    target.style.removeProperty("margin-top");
    target.style.removeProperty("margin-bottom");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
    //alert("!");
  }, duration);
};

let slideDown = (target, duration = 500) => {
  target.style.removeProperty("display");
  let display = window.getComputedStyle(target).display;

  if (display === "none") display = "block";

  target.style.display = display;
  let height = target.offsetHeight;
  target.style.overflow = "hidden";
  target.style.height = 0;
  target.style.paddingTop = 0;
  target.style.paddingBottom = 0;
  target.style.marginTop = 0;
  target.style.marginBottom = 0;
  target.offsetHeight;
  target.style.boxSizing = "border-box";
  target.style.transitionProperty = "height, margin, padding";
  target.style.transitionDuration = duration + "ms";
  target.style.height = height + "px";
  target.style.removeProperty("padding-top");
  target.style.removeProperty("padding-bottom");
  target.style.removeProperty("margin-top");
  target.style.removeProperty("margin-bottom");
  window.setTimeout(() => {
    target.style.removeProperty("height");
    target.style.removeProperty("overflow");
    target.style.removeProperty("transition-duration");
    target.style.removeProperty("transition-property");
  }, duration);
};
var slideToggle = (target, duration = 500) => {
  if (window.getComputedStyle(target).display === "none") {
    return slideDown(target, duration);
  } else {
    return slideUp(target, duration);
  }
};
