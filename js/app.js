$(document).ready(function () {
    $(".search-trigger").on('click', function () {
        $("body").addClass("search-anim-on");
        $(".search-box").css("display", "block");
        $("#navigation").animate({
            padding: "80px 0 0 0",
        }, 200);

        $("#navigation").animate({
            opacity: 0,
        }, 200);

        $('#navigation').animate({
            opacity: 0}, {
            duration: 200,
            complete: function () {
                $("#navigation").css("display", "none");
            }
        });
    });
    $(".search-close").on('click', function () {
        $("body").addClass("search-anim-off");
        $(".search-box").css("display", "none");
        $("#navigation").css("display", "block");
        if (!$('body').hasClass('shrink')) {
            if ($(window).width() < 991) {
                $("#navigation").animate({
                    padding: "24px auto auto",
                }, 200);
            } else {
                $("#navigation").animate({
                    padding: "46px auto auto",
                }, 200);
            }

        } else {
            $("#navigation").animate({
                padding: "12px 0 0 0",
            }, 200);
        }
        $("#navigation").animate({
            opacity: 1
        }, 200);
    });

    $(document).on("scroll", function () {
        if ($(document).scrollTop() > 50) {
            $("body").addClass("shrink");
        } else {
            $("body").removeClass("shrink");
        }
    });
});

(function ($) {
    $.fn.visible = function (partial) {

        var $t = $(this),
                $w = $(window),
                viewTop = $w.scrollTop(),
                viewBottom = viewTop + $w.height(),
                _top = $t.offset().top,
                _bottom = _top + $t.height(),
                compareTop = partial === true ? _bottom : _top,
                compareBottom = partial === true ? _top : _bottom;

        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

    };

})(jQuery);

$(document).ready(function () {
    var win = $(window);

    var allMods = $(".acc-logos,.mobile-apps");

    allMods.each(function (i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("already-visible");
        }
    });

    win.scroll(function (event) {

        allMods.each(function (i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("slide-in");
            }
        });

    });
});