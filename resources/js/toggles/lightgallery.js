import lightGallery from "lightgallery";

// // Plugins
import lgThumbnail from "lightgallery/plugins/thumbnail";
import lgZoom from "lightgallery/plugins/zoom";

const imageGallery = () => {
  lightGallery(document.getElementById("lightgallery"), {
    plugins: [lgZoom, lgThumbnail],
    speed: 500,
    licenseKey: "`0000-0000-000-0000",
    //selector: '.item'
  });

  lightGallery(document.getElementById("openGallery"), {
    selector: "this",
  });

  var animatedGallery = document.getElementById("animated-thumbnail");

  if (animatedGallery) {
    lightGallery(document.getElementById("animated-thumbnail"), {
      thumbnail: true,
      getCaptionFromTitleOrAlt: true,
      selector: "a[style]",
    });
  }
};

export default imageGallery;
