export default function carouselControl() {
  if (  $.contains(document, $(".preview-gallery").get(0)) ) {
    let selectedIndex = 0;
    let atLastItem = false;
    let atFirstItem = true;
    const previewLength = document.querySelector(".preview-gallery").scrollWidth;
    const previewWidth = $(".preview-gallery").width();
    const scrollInterval = Math.round(previewWidth / 3);
    const marginInterval = Math.round(scrollInterval / 3);
    const previewLengthMargin = previewLength - 2 * scrollInterval;
    const scrollWidthAbs = previewLength - previewWidth;
    const scrollWidthAdj = previewLength - previewWidth - scrollInterval; // add some margin
    let scrollPosition = 0;
    let selectedPosition;
    let absOffset;
    let zoomOn = false; let srcAttr;

    const $thumbnails = $(".thumbnail");
    if ( $(".preview-gallery").children().length <= 5 ) {
      $(".slide-right").hide();  // with the preview sizes as they are overflow starts at 5+ items
    }

    $thumbnails.click(function() {
      let $this = $(this);
      selectedIndex = $thumbnails.index($this);
      srcAttr = (zoomOn && window.innerWidth > 768) ? 'data-src_lg' : 'data-src';
      setFeatured( $this.attr(srcAttr) );
      directionLock();
      setPreview();
    });
    $(".slide-next").click(function() {
      if (selectedIndex < $thumbnails.length - 1) {
        let srcData = $thumbnails[++selectedIndex].dataset;
        srcAttr = (zoomOn && window.innerWidth > 768)
          ? srcData.src_lg
          : srcData.src;
        setFeatured( srcAttr );
        directionLock();
        setPreview();
      }
    });
    $(".slide-prev").click(function() {
      if (selectedIndex > 0) {
        let srcData = $thumbnails[--selectedIndex].dataset;
        srcAttr = (zoomOn && window.innerWidth > 768)
          ? srcData.src_lg
          : srcData.src;
        setFeatured( srcAttr );
        directionLock();
        setPreview();
      }
    });
    // Preview scroll
    $(".slide-right").click(function() {
      $(".slide-left").show();
      if ( scrollPosition < scrollWidthAdj ) {
        scrollPosition += scrollInterval;
        $(".preview-gallery").scrollLeft(scrollPosition);
      } else {
        $(".preview-gallery").scrollLeft(scrollWidthAbs);
        scrollPosition = scrollWidthAbs;
        $(this).hide();
      }
    });
    $(".slide-left").click(function() {
      $(".slide-right").show();
      if ( scrollPosition > scrollInterval ) {
        scrollPosition -= scrollInterval;
        $(".preview-gallery").scrollLeft(scrollPosition);
      } else {
        $(".preview-gallery").scrollLeft(0);
        scrollPosition = 0;
        $(this).hide();
      }
    });

    $(".zoom-glass").click(function() {
      zoomOn = true;
      setFeatured( $thumbnails[selectedIndex].dataset.src_lg )
      $(".site-overlay").show();
      $(".book-preview").addClass("overlay-open");
      $(".site-main").after($(".spotlight-sliders-js"), $(".book-preview").addClass("abs-center fixed")); // move out of container to span whole site
      $(".slide-prev, .slide-next").addClass("fixed-over"); // fix sliders in place
    });
    $(".zoom-close").click(function() {
      zoomOn = false;
      $(".site-overlay").hide();
      $(".book-preview").removeClass("overlay-open");
      $(".book-container-js").prepend($(".book-preview").removeClass("abs-center fixed")); // move back in place
      $(".spotlight-container-js").after($(".spotlight-sliders-js"));
      $(".slide-prev, .slide-next").removeClass("fixed-over"); // unfix sliders
    });

    function setFeatured(source) {
      $(".spotlight").attr('src', source); // set spotlight image to selection
      $thumbnails.removeClass("active"); // remove active tag from any previous selection
      $thumbnails[selectedIndex].classList.add("active"); // add active to current
      return null;
    }
    function setPreview() {
      absOffset = $thumbnails[selectedIndex].offsetLeft;
      selectedPosition = absOffset - scrollInterval; // slice some off to not force selection on the edge
      $(".preview-gallery").scrollLeft(selectedPosition);
      scrollPosition = selectedPosition; // set new value for controls
      if (absOffset - scrollInterval <= 0) {
        $(".slide-left").hide();
      } else if (absOffset >= previewLengthMargin ) {
        $(".slide-right").hide();
      } else { // show both
        $(".slide-left").show();
        $(".slide-right").show();
      }
    }
    function directionLock() {
      if (atFirstItem) {
        $(".slide-prev").find("use").attr("href", "#slide-arrow"); // unlock backward direction
        $(".slide-prev").removeClass("no-select-js");
        atFirstItem = false;
      } else if (atLastItem) {
        $(".slide-next").find("use").attr("href", "#slide-arrow"); // unlock forward direction
        $(".slide-next").removeClass("no-select-js");
        atLastItem = false;
      }
      if (selectedIndex == $thumbnails.length - 1) { // if at end after the step
        atLastItem = true;
        $(".slide-next").find("use").attr("href", "#slide-arrow-opaque"); // lock forward direction
        $(".slide-next").addClass("no-select-js");
      } else if (selectedIndex == 0) { // if at the beginning after the step
        atFirstItem = true;
        $(".slide-prev").find("use").attr("href", "#slide-arrow-opaque"); // lock forward direction
        $(".slide-prev").addClass("no-select-js");
      }
      return null;
    }
  }
}
