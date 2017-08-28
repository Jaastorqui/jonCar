

function changeDashboard (option) {

    document.querySelector('.dashboard').style.display = "none";
    document.querySelector('.account').style.display = "none";
    document.querySelector('.travels').style.display = "none";
    document.querySelector('.cars').style.display = "none";
    



    switch(option) {
        case 1: 
            document.querySelector('.dashboard').style.display = "block";
            
            break;
        case 2: 
            document.querySelector('.account').style.display = "block"
            break;
        case 3:
            document.querySelector('.travels').style.display = "block"
            break;
        case 4:
            document.querySelector('.cars').style.display = "block"
            break;
    }

}



$(window).on('scroll', function () {

    var sections = $('section')
    , nav = $('#main-nav')
    , nav_height = 100;

    var cur_pos = $(this).scrollTop();

    sections.each(function () {
        var top = $(this).offset().top - nav_height,
            bottom = top + $(this).outerHeight();

        if (cur_pos >= top && cur_pos <= bottom) {

            nav.find('a').removeClass('active');
            sections.removeClass('active');

            $(this).addClass('active');
            nav.find('a[href="#' + $(this).attr('id') + '"]').addClass('active');

            if ($(this).attr("id") === "skills") {
                move();
            }
        }
    });
});