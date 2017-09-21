// portfolio page//
$(function() {
    gallery();
});

function gallery(){
    function mixitup() {
        $("#gallery").mixItUp({
            animation: {
                duration: 300,
                effects: "fade translateZ(-360px) stagger(50ms)",
                easing: "ease"

            }
        });
    }

    mixitup();
}

$(document).on('click', '.scholarship_apply_button', function (e) {
    console.log($(this).data('scholarship-id'));
    window.location.replace(window.location.pathname + '/apply/' + $(this).data('scholarship-id'))
});
