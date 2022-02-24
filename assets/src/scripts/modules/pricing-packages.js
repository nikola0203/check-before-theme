class PricingPackages {
  constructor() {
    this.init();
	}

  init() {
		this.changePackagePrice();
		this.syncColumnHeight();
		this.pricingPlansToggle();
	}

  changePackagePrice() {
    const thisClass = this;

    $("#number-of-users").on("input", function() {
      let num_of_users = parseInt($(this).val());
      
      $(".pricing-package-price input").each(function( index, element ) {
        let variation_price   = $(this).val()
        let data_num_of_users = $(this).data('num_of_users')
        let data_payment_type = $(this).data('payment_type')
        let variation_id      = $(this).data('variation_id')
        let el_month_price    = $(this).parent().find('span.span-price-month span.price')
        let el_annual_price   = $(this).parent().find('span.span-price-annual span.price')
        let btn_get_started   = $(this).parents('.pricing-package-price').nextAll('.pricing-package-btn').find('a.btn-get-started')

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
          return false;
          // thisClass.updatePackagePriceElement( data_payment_type, el_month_price, el_annual_price, variation_price )
          // thisClass.updatePackageVariationIdElement( data_payment_type, el_month_price, el_annual_price, variation_id )
        }
      })
    });
  }

  updatePackagePriceElement( data_payment_type, el_month_price, el_annual_price, variation_price ) {
    if ( data_payment_type == 'month' ) {
      el_month_price.html(variation_price)
    } else if ( data_payment_type == 'annual' ) {
      el_annual_price.html(variation_price)
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
        });
      });
    }
  }
}

export default PricingPackages;
