var blockShow = false;
function scrollMore() {
    var $targetScroll = $('.targetScroll');
    if ($targetScroll == undefined) {
        blockShow = true;
    }
    if (blockShow) {
        return false;
    }
    var wt = $(window).scrollTop() + 150;
    var wh = $(window).height();
    var et = $targetScroll.offset().top;
    var eh = $targetScroll.outerHeight();
    var dh = $(document).height();

    if (wt + wh >= et || wh + wt == dh || eh + et < wh) {
        var page = $targetScroll.attr('data-page');
        page++;
        blockShow = true;

        $.ajax({
            url: 'assets/php/loadtest.php?page=' + page,
            dataType: 'html',
            success: function (data) {
                $('.list-cart').append(data);
                blockShow = false;
            }
        });
        $targetScroll.attr('data-page', page);
    }
}

window.addEventListener('scroll', function () {
    if ($('.targetScroll').attr('data-page') !== $('.targetScroll').attr('data-max')) {
        scrollMore();
    } else {
        $('.targetScroll').remove();
    }
}

)


$(document).ready(function () {

    scrollMore();

});