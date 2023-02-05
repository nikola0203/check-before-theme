/**
 * Manage global libraries from the package.json file
 */

/**
 * Import libraries
 */
// import { Tooltip } from 'bootstrap';
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
import PricingPackages from './modules/pricing-packages.js';
import BsTooltip from './modules/bs-tooltip.js';
import ProgressBar from './modules/progress-bar.js';

// const app = new App();
const nav_menu = new NavMenu();
const slider = new Slider();
const faq = new Faq();
const pricing_packages = new PricingPackages();
const bs_tooltip = new BsTooltip();
const progress_bar = new ProgressBar()
