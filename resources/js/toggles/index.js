import marquee from "./marquee";
import accordion from "./accordion";
import swiper from "./swiper";
import imageGallery from "./lightgallery";
import menuScripts from "./menu";
import animations from "./animations";
import tabbedContent from "./tabbed-content";
import drawers from "./drawers";
import verticalTabs from "./tabs";
import video from "./video";

const toggles = () => {
  marquee();
  accordion();
  tabbedContent();
  imageGallery();
  swiper();
  menuScripts();
  animations();
  drawers();
  video();
  verticalTabs();
};

export default toggles;
