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

const slider = document.querySelector('.restaurant-front'),
        slides = Array.from(document.querySelectorAll('.restaurant-front_content'));

let isDragging= false,
    startPos = 0,
    currentTranslate=0,
    prevTranslate = 0,
    animationID = 0,
    currentIndex =0

slides.forEach((slide,index)=> {
    const slideImage = slide.querySelector('img');
    slideImage.addEventListener('dragstart',(e)=> e.preventDefault())

    slide.addEventListener('touchstart', touchStart(index))
    slide.addEventListener('touchend', touchEnd)
    slide.addEventListener('touchmove', touchMove)

})


function touchStart(index)
{
    return function (event) {
        isDragging= true
    }
}
function touchMove(event)
{
    isDragging= false
}

function touchEnd()
{
    if (isDragging) {
        console.log('pep')
    }
}




    // titleDishes = document.querySelector('.title-dishes');



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
