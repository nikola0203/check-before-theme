import { Tooltip } from 'bootstrap';

class BsTooltip {
  constructor() {
		this.init();
	}

  init() {
		this.initBsTooltip();
	}

  initBsTooltip() {
    let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  
    let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new Tooltip(tooltipTriggerEl);
    })
  }
}

export default BsTooltip;
