$.fn.simpleGallery = function() {
    this.each(function() {
        let $gallery = $(this);
        let $images = $gallery.find('img');
        let totalImages = $images.length;
        let currentIndex = 0;

        $images.not(':first').hide();

        function showImage(index) {
            $images.hide();
            $images.eq(index).show();
            currentIndex = index;
        }

        let $buttonDiv = $('<div class="gallery-buttons"></div>').appendTo($gallery);

        for (let i = 0; i < totalImages; i++) {
            let $button = $('<button>').appendTo($buttonDiv);
            $button.click((function(index) {
                return function() {
                    showImage(index);
                };
            })(i));
        }
    });
};