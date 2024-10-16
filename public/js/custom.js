// hover-dropdown

$(".dropdown").hover(function () {
    var isHovered = $(this).is(":hover");
    if (isHovered) {
        $(this).children(".dropdown-menu").stop().slideDown(300);
    } else {
        $(this).children(".dropdown-menu").stop().slideUp(300);
    }
});

// hover-dropdown


// increment coutner start

$(document).ready(function () {
    // Increment quantity
    $('.increment').click(function () {
        var counter = $(this).parent().find('input');
        var count = parseInt(counter.val()) || 0;
        count++;
        counter.val(count);

    });

    // Decrement quantity
    $('.decrement').click(function () {
        var counter = $(this).parent().find('input');
        var count = parseInt(counter.val()) || 0;

        // Ensure count doesn't go below 1
        if (count > 1) {
            count--;
        }
        counter.val(count);
    });
});

// increment coutner  end

