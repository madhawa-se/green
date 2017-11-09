$(document).ready(function () {
    $(document).on("scroll", function () {
        if ($(document).scrollTop() > 50) {
            $("body").addClass("shrink");
        } else {
            $("body").removeClass("shrink");
        }
    });
});