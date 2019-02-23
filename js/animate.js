var isScrolling = false;

window.addEventListener("scroll", throttleScroll, false);

function throttleScroll(e) {
  if (isScrolling == false) {
    window.requestAnimationFrame(function() {
      scrolling(e);
      isScrolling = false;
    });
  }
  isScrolling = true;
}

document.addEventListener("DOMContentLoaded", scrolling, false);

//var listItems = document.querySelectorAll("#mainContent ol li");
//var firstBox = document.querySelector("#firstBox");
//var elems = document.querySelectorAll(".job__link").length;
var elem = document.querySelectorAll(".anim");

function scrolling(e) {

//  if (isPartiallyVisible(firstBox)) {
//    firstBox.classList.add("active");
//  }

  for (var i = 0; i < elem.length; i++) {
  var elems = elem[i];

    if (isPartiallyVisible(elems)) {
      elems.classList.add("active");
    }
    else {
      elems.classList.remove("active");
    }
  }

//  if (isFullyVisible(firstBox)) {
//    firstBox.classList.add("active");
//  }
}

function isPartiallyVisible(el) {
  var elementBoundary = el.getBoundingClientRect();

  var top = elementBoundary.top;
  var bottom = elementBoundary.bottom;
  var height = elementBoundary.height;

  return ((top + height >= 0) && (height + window.innerHeight >= bottom));
}

function isFullyVisible(el) {
  var elementBoundary = el.getBoundingClientRect();

  var top = elementBoundary.top;
  var bottom = elementBoundary.bottom;

  return ((top >= 0) && (bottom <= window.innerHeight));
}
