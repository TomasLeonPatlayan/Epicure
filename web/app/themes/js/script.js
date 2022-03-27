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
        $('.grid').isotope({ filter: filterValue });
        $('.filter-button-group li').removeClass('active');
        $(this).addClass('active');
    });
});




function sizetitle()
{
    const titlesMobile = document.querySelectorAll('.mobile-title');
    titlesMobile.forEach(el => {
        if (window.screen.width < 768) {
            el.classList.add('Text-Style-4');
            el.classList.remove('Text-Style-9');
        } else {
            el.classList.remove('Text-Style-4');
            el.classList.add('Text-Style-9');
        }
    })


}
sizetitle()
