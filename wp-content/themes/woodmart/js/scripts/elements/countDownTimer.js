/* global woodmart_settings */
(function($) {
	woodmartThemeModule.$document.on('wdProductsTabsLoaded wdSearchFullScreenContentLoaded wdUpdateWishlist wdShopPageInit wdArrowsLoadProducts wdLoadMoreLoadProducts wdRecentlyViewedProductLoaded', function () {
		woodmartThemeModule.countDownTimer();
	});

	$.each([
		'frontend/element_ready/wd_products.default',
		'frontend/element_ready/wd_products_tabs.default',
		'frontend/element_ready/wd_countdown_timer.default',
		'frontend/element_ready/wd_single_product_countdown.default',
		'frontend/element_ready/wd_banner.default',
		'frontend/element_ready/wd_banner_carousel.default',
	], function(index, value) {
		woodmartThemeModule.wdElementorAddAction(value, function() {
			woodmartThemeModule.countDownTimer();
		});
	});

	woodmartThemeModule.countDownTimer = function() {
		$('.wd-timer').each(function() {
			var $this = $(this);
			var timezone = $this.data('timezone') ? $this.data('timezone') : woodmart_settings.countdown_timezone;

			dayjs.extend(window.dayjs_plugin_utc);
			dayjs.extend(window.dayjs_plugin_timezone);
			var time = dayjs.tz($this.data('end-date'), timezone);
			$this.countdown(time.toDate(), function(event) {
				if ( 'yes' === $this.data('hide-on-finish') && 'finish' === event.type ) {
					$this.parent().addClass('wd-hide');
				}

				$this.html(event.strftime(''
					+ '<span class="wd-timer-days"><span class="wd-timer-value">%-D </span><span class="wd-timer-text">' + woodmart_settings.countdown_days + '</span></span> '
					+ '<span class="wd-timer-hours"><span class="wd-timer-value">%H </span><span class="wd-timer-text">' + woodmart_settings.countdown_hours + '</span></span> '
					+ '<span class="wd-timer-min"><span class="wd-timer-value">%M </span><span class="wd-timer-text">' + woodmart_settings.countdown_mins + '</span></span> '
					+ '<span class="wd-timer-sec"><span class="wd-timer-value">%S </span><span class="wd-timer-text">' + woodmart_settings.countdown_sec + '</span></span>'));
			});
		});
	};

	$(document).ready(function() {
		woodmartThemeModule.countDownTimer();
	});
})(jQuery);
