$ =jQuery.noConflict();


$(document).ready(function () {

    //Fluid BOx Plugin
    jQuery('.hero img').each(function () {
        jQuery(this).attr({'data-fluidbox':''});
    });
    if (jQuery('[data-fluidbox]').length > 0) {
        jQuery('[data-fluidox]').fluidbox();
    }
    Isotope.Item.prototype._create = function () {
        // assign id, used for original-order sorting
        this.id = this.layout.itemGUID++;
        // transition objects
        this._transn = {
            ingProperties: {},
            clean: {},
            onEnd: {}
        };
        this.sortData = {};
    };
    $('.grid').isotope({
        itemSelector: '.grid-item',
    });
    $('.filter-button-group').on('click', 'li', function () {
        const filterValue = $(this).attr('data-filter');
        console.log(filterValue)
        $('.grid').isotope({ filter: filterValue });
        $('.filter-button-group li').removeClass('active');
        $(this).addClass('active');
    });

        $(".nav_container_hamburguer-logo img").on('click',function () {
            $(".nav_container_menus").show('slow')
            $(".nav_container_hamburguer-logo-close").show('slow')
        })
    $(".nav_container_hamburguer-logo-close img").on('click', function () {
        $(".nav_container_menus").hide('slow')
        $(".nav_container_hamburguer-logo-close").hide('slow')

    })
    let breackpoint = 768;
    $(window).resize(function () {
        if ($(document).width() <= breackpoint) {
            $('.mobile-title').addClass('Text-Style-4');
            $('.mobile-title').removeClass('Text-Style-9');
            $('.chef_profile_content_chef-restaurants_title').addClass('Text-Style-10')
            $('.chef_profile_content_chef-restaurants_title').removeClass('Text-Style-22')

        } else {
            $('.mobile-title').addClass('Text-Style-9');
            $('.mobile-title').removeClass('Text-Style-4');
            $('.chef_profile_content_chef-restaurants_title').removeClass('Text-Style-10')
            $('.chef_profile_content_chef-restaurants_title').addClass('Text-Style-22')

        }
    })
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,

        nav:false,
        responsive:{
            0:{
                items:1
            },
            768:{
                items:3
            },

        }
    })



});



//
// function sizetitle()
// {
//     const titlesMobile = document.querySelectorAll('.mobile-title');
//     titlesMobile.forEach(el => {
//         if (window.screen.width < 768) {
//             el.classList.add('Text-Style-4');
//             el.classList.remove('Text-Style-9');
//         } else {
//             el.classList.remove('Text-Style-4');
//             el.classList.add('Text-Style-9');
//         }
//     })
//
//
// }
// sizetitle()
