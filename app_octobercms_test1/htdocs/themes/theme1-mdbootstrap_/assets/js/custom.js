$(document).ready(function () {
    console.log("ready!");

    $(function () {
        $('.popover').popover({
            container: 'body'
        });
    });


});
wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
})
wow.init();