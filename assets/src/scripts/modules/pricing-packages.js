class PricingPackages {
  constructor() {
    this.init();
	}

  init() {
		this.changePackagePrice();
		this.syncColumnHeight();
		this.pricingPlansToggle();
		this.updateWooCheckoutField();
	}

  changePackagePrice() {
    const thisClass = this;

    let num_of_users = sessionStorage.getItem('num_of_users')

    if ( !num_of_users ) {
      sessionStorage.setItem('num_of_users', 1)
    }

    this.loopTroughPriceInputAndUpdate(".pricing-package-price input", num_of_users)

    $("#number-of-users").on("input", function() {
      let num_of_users = parseInt($(this).val())

      sessionStorage.setItem('num_of_users', num_of_users)

      thisClass.loopTroughPriceInputAndUpdate(".pricing-package-price input", num_of_users)
    })
  }

  loopTroughPriceInputAndUpdate( package_price_input, num_of_users ) {
    const thisClass = this;

    $(package_price_input).each(function(index, element) {
      let variation_price   = $(this).val(),
          data_num_of_users = $(this).data('num_of_users'),
          data_payment_type = $(this).data('payment_type'),
          variation_id      = $(this).data('variation_id'),
          el_month_price    = $(this).parent().find('span.span-price-month span.price'),
          el_annual_price   = $(this).parent().find('span.span-price-annual span.price'),
          btn_get_started   = $(this).parents('.pricing-package-price').nextAll('.pricing-package-btn').find('a.btn-get-started')

      if ( num_of_users <= 15 && data_num_of_users == 'up-to-15-users' ) {
        thisClass.updatePackagePriceElement( data_payment_type, el_month_price, el_annual_price, variation_price )
        thisClass.updatePackageVariationIdElement( data_payment_type, el_month_price, el_annual_price, variation_id )
        thisClass.updatePackageButtonLink( data_payment_type, btn_get_started, variation_id )
      } else if ( num_of_users > 15 && num_of_users <= 50 && data_num_of_users == '16-to-50-users' ) {
        thisClass.updatePackagePriceElement( data_payment_type, el_month_price, el_annual_price, variation_price )
        thisClass.updatePackageVariationIdElement( data_payment_type, el_month_price, el_annual_price, variation_id )
        thisClass.updatePackageButtonLink( data_payment_type, btn_get_started, variation_id )
      } else if ( num_of_users > 50 && num_of_users <= 99 && data_num_of_users == '51-99-users' ) {
        thisClass.updatePackagePriceElement( data_payment_type, el_month_price, el_annual_price, variation_price )
        thisClass.updatePackageVariationIdElement( data_payment_type, el_month_price, el_annual_price, variation_id )
        thisClass.updatePackageButtonLink( data_payment_type, btn_get_started, variation_id )
      } else if ( num_of_users > 99 ) {
        $('.section-pricing-packages, .pricing-plans-wrapper').hide();
        $('.section-contact-us-form').fadeIn();
      }
    })
  }

  updatePackagePriceElement( data_payment_type, el_month_price, el_annual_price, variation_price ) {
    if ( variation_price == el_month_price.html() || variation_price == el_annual_price.html() ) {
      $('.section-contact-us-form').hide();
      $('.section-pricing-packages, .pricing-plans-wrapper').fadeIn();
      return false;
    }
    if ( data_payment_type == 'month' ) {
      $(el_month_price).hide().html(variation_price).fadeIn();
    } else if ( data_payment_type == 'annual' ) {
      $(el_annual_price).hide().html(variation_price).fadeIn();
    }
  }

  updatePackageVariationIdElement( data_payment_type, el_month_price, el_annual_price, variation_id ) {
    if ( data_payment_type == 'month' ) {
      el_month_price.attr('data-variation_id', variation_id)
    } else if ( data_payment_type == 'annual' ) {
      el_annual_price.attr('data-variation_id', variation_id)
    }
  }

  updatePackageButtonLink( data_payment_type, btn_get_started, variation_id ) {
    let site_url = main_object.site_url

    if ( data_payment_type == 'month' ) {
      if ( $('.btn-group-pricing-plans button.btn-pricing-plan-monthly').hasClass('active') ) {
        btn_get_started.attr('href', site_url + '/checkout/?add-to-cart=' + variation_id + '&quantity=1')
      }
    } else if ( data_payment_type == 'annual' ) {
      if ( $('.btn-group-pricing-plans button.btn-pricing-plan-annual').hasClass('active') ) {
        btn_get_started.attr('href', site_url + '/checkout/?add-to-cart=' + variation_id + '&quantity=1')
      }
    }
  }

  pricingPlansToggle() {
    $('.btn-group-pricing-plans button').on('click', function(e) {
      if ( $(this).hasClass('active') ) {
        return false;
      }

      let site_url = main_object.site_url

      $(this).addClass('active').siblings().removeClass('active')
      $('.pricing-package-price .span-price').toggleClass('active')
      
      if ( $(this).data('pricing_monthly') ) {
        $("span.span-price-month span.price").each(function( index, element ) {
          let variation_id    = $(this).data('variation_id')
          let btn_get_started = $(this).parents('.pricing-package-price').nextAll('.pricing-package-btn').find('a.btn-get-started')

          btn_get_started.attr('href', site_url + '/checkout/?add-to-cart=' + variation_id + '&quantity=1')
        })
      } else if ( $(this).data('pricing_annual') ) {
        $("span.span-price-annual span.price").each(function( index, element ) {
          let variation_id    = $(this).data('variation_id')
          let btn_get_started = $(this).parents('.pricing-package-price').nextAll('.pricing-package-btn').find('a.btn-get-started')

          btn_get_started.attr('href', site_url + '/checkout/?add-to-cart=' + variation_id + '&quantity=1')
        })
      }
    })
  }

  syncColumnHeight() {
    if ( $(window).width() > 991) {
      let package_name_height  = $(".pricing-package-name").innerHeight() + 2;
      let package_price_height = $(".pricing-package-price-block").innerHeight() + 1;
      
      $( "#pricing-package-name-height" ).css({ 'height': ( package_name_height + 'px' ) });
      $( "#pricing-package-price-block-height" ).css({ 'height': ( package_price_height + 'px' ) });
      
      $( ".pricing-list-desc" ).each(function( index, element ) {
        let package_price_desc = $(element).innerHeight() + 1;

        $( '.pricing-package-checkmark-' + index ).css({ 'height': ( package_price_desc + 'px' ) });
      });
      
      $(window).on('resize', function() {
        let package_name_height  = $(".pricing-package-name").innerHeight() + 2;
        let package_price_height = $(".pricing-package-price-block").innerHeight() + 1;
        
        $( "#pricing-package-name-height" ).css({ 'height': ( package_name_height + 'px' ) });
        $( "#pricing-package-price-block-height" ).css({ 'height': ( package_price_height + 'px' ) });
        $( "#pricing-package-price-block-height" ).css({ 'height': ( package_price_height + 'px' ) });
      
        $( ".pricing-list-desc" ).each(function( index, element ) {
          let package_price_desc = $(element).innerHeight() + 1;
          $( '.pricing-package-checkmark-' + index ).css({ 'height': ( package_price_desc + 'px' ) });
        })
      })
    }
  }

  updateWooCheckoutField() {
    let num_of_users = parseInt(sessionStorage.getItem('num_of_users'))

    if ( num_of_users > 99 ) {
      $('table.woocommerce-checkout-review-order-table, h4.woocommerce-order-details__title, th.woocommerce-table__product-name, th.woocommerce-table__product-table, li.woocommerce-order-overview__total.total').hide()
    }

    if ( $('body.woocommerce-order-received').length ) {
      sessionStorage.removeItem('num_of_users')
    }

    // Pricing page field
    if ( num_of_users ) {
      $('#number-of-users').val(num_of_users)
    }

    // Checkout field
    if ( num_of_users ) {
      $('#number_of_users').val(num_of_users)
    }
  }
}

export default PricingPackages;
