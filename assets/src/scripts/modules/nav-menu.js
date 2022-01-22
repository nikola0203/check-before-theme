class NavMenu {
	constructor() {
		this.init();
	}

	init() {
		this.primaryNavMenuMobile();
		this.primaryNavMenuDesktop();
	}

	primaryNavMenuMobile() {
    if ( $(window).width() < 992 ) {
      $(".navtoggle").on('click', function(e){
        e.preventDefault();
        $(this).toggleClass('navtoggle--active');
        $('#primary-menu-container').stop(true, true).slideToggle(300);
      });

      $(".menu-item-has-children > a i").each(function(index, element){
        $(this).on('click', function(e){
          e.preventDefault();
          $(this).parent().stop(true, true).toggleClass('active');
          $(this).parent().next('.sub-menu').stop(true, true).slideToggle(200);
        });
      });
    }
	}

	primaryNavMenuDesktop() {
    if ( $(window).width() > 992 ) {
      $(".menu-item-has-children").each(function(index, element){
        $(this).hover(function(){
          // console.log('entered');
          $(this).find('> a').stop(true, true).addClass('active');
          $(this).find('> .sub-menu').stop(true, true).slideDown(200);
        }, function(){
          // console.log('left');
          $(this).find('> a').stop(true, true).removeClass('active');
          $(this).find('> .sub-menu').stop(true, true).slideUp(200);
        });
      });
    }
  }
}

export default NavMenu;
