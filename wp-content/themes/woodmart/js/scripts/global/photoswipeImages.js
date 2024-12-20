/* global woodmart_settings */
(function($) {
	woodmartThemeModule.photoswipeImages = function() {
		$('.photoswipe-images, .wp-block-wd-gallery:has(.photoswipe-images)').each(function() {
			var $this = $(this);

			$this.on('click', 'a', function(e) {
				e.preventDefault();
				var index = $(e.currentTarget).parents('.wd-gallery-item, .wp-block-wd-gallery-item').index();
				var items = getGalleryItems($this, []);

				woodmartThemeModule.callPhotoSwipe(index, items);
			});
		});

		var getGalleryItems = function($gallery, items) {
			var src, width, height, title;

			$gallery.find('a').each(function() {
				var $this = $(this);

				src = $this.attr('href');
				width = $this.data('width');
				height = $this.data('height');
				title = $this.attr('title');

				if (!isItemInArray(items, src)) {
					items.push({
						src  : src,
						w    : width,
						h    : height,
						title: title
					});
				}
			});

			return items;
		};

		var isItemInArray = function(items, src) {
			var i;
			for (i = 0; i < items.length; i++) {
				if (items[i].src === src) {
					return true;
				}
			}

			return false;
		};
	};

	$(document).ready(function() {
		woodmartThemeModule.photoswipeImages();
	});
})(jQuery);
