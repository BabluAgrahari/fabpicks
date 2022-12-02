$('.js-star-rating').on('change', 'input', function () {
    $('.js-current-rating')
        .removeClass()
        .addClass('current-rating js-current-rating current-rating--' + this.value);
});