class Faq {
	constructor() {
		this.init();
	}

	init() {
	  this.faq('.faq');
	}

  faq(faq_section_class) {
    if ($(faq_section_class).length > 0) {
      $(faq_section_class).each(function(index, faq){
        $(faq).find('.faq__wrapper-answer').hide();
        $(faq).find('.faq__wrapper-question').on('click', function() {
          $(this).next('div').siblings('div').slideUp(400);
          $(this).next('div').slideToggle(400);
          $(this).siblings('.faq__wrapper-question').find('i').addClass('fa-plus');
          if ( $(this).find('i').hasClass('fa-plus') ) {
            $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
          } else {
            $(this).find('i').removeClass('fa-minus').addClass('fa-plus');
          }
        });
      });
    }
  }
}

export default Faq;
