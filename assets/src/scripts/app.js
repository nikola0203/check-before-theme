/**
 * Manage global libraries from the package.json file
 */

/**
 * Import libraries
 */
// import 'bootstrap/js/dist/collapse';
// import 'bootstrap/js/dist/dropdown';
// import 'bootstrap';
// Font Awesome
// import '@fortawesome/fontawesome-free/js/all.min';
// Lazy load library
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import "lazysizes/plugins/bgset/ls.bgset";
import 'lazysizes/plugins/respimg/ls.respimg';
import 'lazysizes';

// Import custom modules
import NavMenu from './modules/nav-menu.js';
import Slider from './modules/slider.js';
import Faq from './modules/faq.js';

// const app = new App();
const nav_menu = new NavMenu();
const slider = new Slider();
const faq = new Faq();
