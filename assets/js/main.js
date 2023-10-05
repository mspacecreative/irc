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

    // POST FILTERS
    // ============
    // These are for URL filtering (for the menus)
    // Location URL Filter

    if (get_url_params("location", window.location.search)) {
      var location_params = decodeURI(
        get_url_params("location", window.location.search)
      );
      var location_filter =
        '#filter_location option[value="' + location_params + '"]';
      $(location_filter).prop("selected", true);
      filter_posts();
    } // Year URL Filter

    if (get_url_params("year", window.location.search)) {
      var year_params = decodeURI(
        get_url_params("year", window.location.search)
      );
      var year_filter = '#filter_year option[value="' + year_params + '"]';
      $(year_filter).prop("selected", true);
      filter_posts();
    } // Project URL Filter

    if (get_url_params("project", window.location.search)) {
      var project_params = decodeURI(
        get_url_params("project", window.location.search)
      );
      var project_filter =
        '#filter_project option[value="' + project_params + '"]';
      $(project_filter).prop("selected", true);
      filter_posts();
    } // Category URL Filter

    if (get_url_params("category", window.location.search)) {
      var category_params = decodeURI(
        get_url_params("category", window.location.search)
      );
      var category_filter =
        '#filter_category option[value="' + category_params + '"]';
      $(category_filter).prop("selected", true);
      filter_posts();
    } // Project Type URL Filter

    if (get_url_params("projecttype", window.location.search)) {
      var projecttype_params = decodeURI(
        get_url_params("projecttype", window.location.search)
      );
      var projecttype_filter =
        '#filter_projecttype option[value="' + projecttype_params + '"]';
      $(projecttype_filter).prop("selected", true);
      filter_posts();
    } // Open Type URL Filter

    if (get_url_params("open", window.location.search)) {
      var open_params = decodeURI(
        get_url_params("open", window.location.search)
      );
      var open_filter = '#filter_open option[value="' + open_params + '"]';
      $(open_filter).prop("selected", true);
      filter_posts();
    } // ===============================================*
    // When a post select filter changes, filter posts
    // This should be triggered after page load

    $("select.filter").on("change", function () {
      filter_posts();
    }); // The main function for the post filtering
    // Filters products based on data attribute

    function filter_posts() {
      // $selections is the filter options, the select boxes
      // $post are the posts (each single post)
      var $selections = $(".taxonomy-filter-container select"),
        $post = $(".wp-block-post");

      var filters = $selections
        .filter(function () {
          // returns whether a value matches the filter
          return !!this.value;
        })
        .map(function () {
          // maps the filter data to see if the post has the value at the filter
          return {
            filter: $(this).data("filter").toString(),
            value: this.value,
          };
        })
        .get(); // hide all things then filter the ones to show

      var $filteredProducts = $post
        .hide()
        .filter(function () {
          var data = $(this).data(); // console.log(data);

          return filters.every(function (obj) {
            if (data[obj.filter]) {
              return data[obj.filter].includes(obj.value);
            }
          });
        })
        .show("fast");
    } // gets the parameters of a specific parameter in the url

    function get_url_params(name, url) {
      if (!url) url = location.href;
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regexS = "[\\?&]" + name + "=([^&#]*)";
      var regex = new RegExp(regexS);
      var results = regex.exec(url);
      return results == null ? null : results[1];
    }

    function isSelectEmpty() {
      var emptyvalues = $(".filter").filter(function () {
        console.log($(this).val() == 0);
        return $(this).val() === "";
      }).length;

      if (emptyvalues == $(".filter").length) {
        return true;
      }

      return false;
    }

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
