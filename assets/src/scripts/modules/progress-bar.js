class ProgressBar {
  constructor() {
    this.init()
  }

  init() {
    const thisClass = this

    window.addEventListener('load', function () {
      if ( window.innerWidth > 992 ) {
        thisClass.detect_manual_click()
        thisClass.activate_tabs( thisClass, 'v-pills-tab-review-desktop' )
        thisClass.activate_tabs( thisClass, 'v-pills-tab-monitor-desktop' )
        thisClass.activate_tabs( thisClass, 'v-pills-tab-report-desktop' )
      }
    })
  }

  activate_tabs( thisClass, tab_block_id ) {
    let event_triggered = false,
    detect_second_block = false

    window.addEventListener('scroll', function(){
      if ( thisClass.detect_element( document.getElementById(tab_block_id) ) ) {
        if ( event_triggered == false ) {
          event_triggered = true
          if ( detect_second_block == false ) {
            thisClass.trigger_tabs_activation_interval(thisClass, tab_block_id)
          }
        }
      }
    })

    if ( thisClass.detect_element( document.getElementById(tab_block_id) ) ) {
      detect_second_block = true
      thisClass.trigger_tabs_activation_interval(thisClass, tab_block_id)
    }
  }

  trigger_tabs_activation_interval(thisClass, tab_block_id) {
    let counter = 0, 
        tab_block    = document.getElementById(tab_block_id),
        progress_bar = tab_block.getElementsByClassName('progress-bar-' + counter)[0]

    $(progress_bar).animate({width: "100%"}, 5000)

    setInterval(function(){
      counter++
      if ( counter == 3 ) {
        counter = 0
      }
      thisClass.activate_tab(tab_block_id, counter)
    }, 5000)
  }

  activate_tab(tab_block_id, tab_id) {
    let tab_block    = document.getElementById(tab_block_id),
        tab          = tab_block.getElementsByClassName('nav-link-' + tab_id)[0],
        progress_bar = tab_block.getElementsByClassName('progress-bar-' + tab_id)[0]
      
    if ( !tab.parentElement.classList.contains('is-manual-clicked') ) {
      progress_bar.style.width = 0
      tab.click()
      $(progress_bar).animate({width: "100%"}, 5000)
    }
  }

  detect_manual_click() {
    let nav_links = document.querySelectorAll('.section-tab-content .nav-link')
    nav_links.forEach((nav_link) => {
      nav_link.addEventListener('mousedown', function (event) {
        nav_link.parentElement.classList.add('is-manual-clicked')
        $(nav_link).find('.progress-bar').stop().css('width', '100%')
      })
    })
  }

  detect_element(el) {
    var rect = el.getBoundingClientRect(), top = rect.top, height = rect.height, 
        el = el.parentNode
    do {
      rect = el.getBoundingClientRect()
      if (top <= rect.bottom === false) return false
      // Check if the element is out of view due to a container scrolling
      if ((top + height) <= rect.top) return false
      el = el.parentNode
    } while (el != document.body)
    // Check its within the document viewport
    return top <= document.documentElement.clientHeight
  }

  // activate_tab(tab_element, progress_bar_element) {
  //   let tab = document.querySelector(tab_element),
  //       progress_bar = document.querySelector(progress_bar_element)

  //   if ( !tab.parentElement.classList.contains('is-manual-clicked') ) {
  //     progress_bar.style.width = 0
  //     tab.click()
  //     $(progress_bar).animate({width: "100%"}, 3000)
  //   }
  // }

  // activate_visible_tabs(thisClass) {
  //   $('.progress-bar-review-0').animate({width: "100%"}, 5000)

  //   let counter = 0
  //   setInterval(function(){
  //     counter++
  //     if ( counter == 1 ) {
  //       thisClass.activate_tab('#v-pills-review-1-tab-desktop', '.progress-bar-review-1')
  //     }
  //     if ( counter == 2 ) {
  //       thisClass.activate_tab('#v-pills-review-2-tab-desktop', '.progress-bar-review-2')
  //     }
  //     if ( counter == 3 ) {
  //       thisClass.activate_tab('#v-pills-review-0-tab-desktop', '.progress-bar-review-0')
  //       counter = 0
  //     }
  //   }, 5000)
  // }

  // activate_observer_tab(tab_element, check_tab_class, progress_bar_element) {
  //   if ( tab_element.classList.contains(check_tab_class) ) {
  //     let progress_bar = document.querySelector(progress_bar_element)
  
  //     if ( !tab_element.parentElement.classList.contains('is-manual-clicked') ) {
  //       progress_bar.style.width = 0
  //       tab_element.click()
  //       $(progress_bar).animate({width: "100%"}, 3000)
  //     }
  //   }
  // }

  // observe_and_activate_tabs(thisClass) {
  //   let tabs = document.querySelectorAll('.section-tab-content .nav-link'),
  //       catch_second_blocks = false,
  //       catch_third_blocks = false

  //   let observer = new IntersectionObserver(
  //     (entries, observer) => {
  //       entries.forEach((entry) => {
  //         if (entry.isIntersecting) {
  //           catch_second_blocks = true
  //           console.log("SECOND BLOCK")

  //           let second_section_counter = 0

  //           if ( entry.target.classList.contains('nav-link-monitor-0') ) {
  //             $('.progress-bar-monitor-0').animate({width: "100%"}, 3000)
  //           }

  //           let second_section = setInterval(function(){
  //             second_section_counter++
  
  //             if ( second_section_counter == 1 ) {
  //               thisClass.activate_observer_tab(entry.target, 'nav-link-monitor-1', '.progress-bar-monitor-1')
  //             }
  //             if ( second_section_counter == 2 ) {
  //               thisClass.activate_observer_tab(entry.target, 'nav-link-monitor-2', '.progress-bar-monitor-2')
  //             }
  //             if ( second_section_counter == 3 ) {
  //               thisClass.activate_observer_tab(entry.target, 'nav-link-monitor-0', '.progress-bar-monitor-0')
  //               second_section_counter = 0
  //             }
  //           }, 3000)
  //         }
  //         if (entry.isIntersecting) {
  //           let third_section_counter = 0

  //           catch_third_blocks = true

  //           console.log("THIRD BLOCK")

  //           if ( entry.target.classList.contains('nav-link-report-0') ) {
  //             $('.progress-bar-report-0').animate({width: "100%"}, 3000)
  //           }

  //           let third_section = setInterval(function(){
  //             third_section_counter++

  //             if ( third_section_counter == 1 ) {
  //               thisClass.activate_observer_tab(entry.target, 'nav-link-report-1', '.progress-bar-report-1')
  //             }
  //             if ( third_section_counter == 2 ) {
  //               thisClass.activate_observer_tab(entry.target, 'nav-link-report-2', '.progress-bar-report-2')
  //             }
  //             if ( third_section_counter == 3 ) {
  //               thisClass.activate_observer_tab(entry.target, 'nav-link-report-0', '.progress-bar-report-0')
  //               third_section_counter = 0
  //             }
  //           }, 3000)
  //         }
  //       });
  //     },
  //     { threshold: 0.5 }
  //   );

  //   tabs.forEach((card) => {
  //     observer.observe(card)
  //   });
  // }

}

export default ProgressBar
