
const search_header = document.querySelector( '.search-menu' );
const search_form   = document.querySelector( '.form-search-page' );

search_header.addEventListener( 'click', function() {
    search_form.classList.toggle( 'active' );
});
document.addEventListener( 'click', function(event) {
    if (!search_header.contains(event.target) && !search_form.contains(event.target)) {
        search_form.classList.remove( 'active' );
    }
});

const item_mobile_menu = document.querySelectorAll( '.mobile-menu .main-mobile-header li' );
for (let i = 0; i < item_mobile_menu.length; i++) {
    const item_menu = item_mobile_menu[i];
    item_menu.addEventListener( 'click', function() {
        const sub_menu = this.querySelector( '.sub-menu' );
        sub_menu.classList.toggle( 'active' );
    });
}

const bar_menu     = document.querySelector( '.mobile-menu .icon_bar svg' );
const overlay_menu = document.querySelector( '.mobile-menu .overlay-menu' );
const close_menu   = document.querySelector( '.mobile-menu .close-menu svg' );

bar_menu.addEventListener( 'click', function() {
    const menu_mobile = this.closest( '.mobile-menu' );
    const setmenu     = menu_mobile.querySelector( '.setmenu' );
    setmenu.classList.add( 'active_menu' );
    overlay_menu.classList.add( 'active' );
});

close_menu.addEventListener( 'click', function() {
    const menu_mobile = this.closest( '.mobile-menu' );
    const setmenu     = menu_mobile.querySelector( '.setmenu' );
    setmenu.classList.remove( 'active_menu' );
    overlay_menu.classList.remove( 'active' );
});

var swiper = new Swiper( '.footer-post', {
    navigation: {
        nextEl: ".footer-next",
        prevEl: ".footer-prev",
    },
    breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
    },
});







function SwicthPostHero( inner ) {
    for ( let i = 0; i < inner.length; i++ ) {
        const inner1 = inner[0];
        const inner2 = inner[1];

        const smallimage1 = inner1.querySelector( '.small-post img' );
        const smalltitle1 = inner1.querySelector( '.small-post h3' );

        const smallimage2 = inner2.querySelector( '.small-post img' );
        const smalltitle2 = inner2.querySelector( '.small-post h3' );

        const bigimage1   = inner1.querySelector( '.big-image' ).src;
        const bigtitle1   = inner1.querySelector( 'h1' ).textContent;
        smalltitle2.textContent = bigtitle1;
        smallimage2.src = bigimage1;

        const bigimage2   = inner2.querySelector( '.big-image' ).src;
        const bigtitle2   = inner2.querySelector( 'h1' ).textContent;
        smalltitle1.textContent = bigtitle2;
        smallimage1.src = bigimage2;

        const smallpost1 = inner1.querySelector( '.small-post' );
        const smallpost2 = inner2.querySelector( '.small-post' );

        smallpost1.addEventListener( 'click', function() {
            const itemPost    = this.closest( '.item-hero-post' );
            const secondInner = itemPost.querySelector( '#inner1' );
            secondInner.classList.add( 'active' );
            inner1.classList.remove( 'active' );
        });

        smallpost2.addEventListener( 'click', function() {
            const itemPost    = this.closest( '.item-hero-post' );
            const firstInner  = itemPost.querySelector( '#inner0' );
            firstInner.classList.add( 'active' );
            inner2.classList.remove( 'active' );
        });
    }

    var currentIndex = 0;
    function toggleActive() {
        inner[currentIndex].classList.remove( 'active' );
        currentIndex = (currentIndex + 1) % inner.length;
        inner[currentIndex].classList.add( 'active' );
    }
    function startAnimation() {
        setInterval( toggleActive, 10000 ); 
    }
    startAnimation();
}

const heroblock = document.querySelector( '.block-hero' );
if ( heroblock ) {
    const news  = heroblock.querySelector( '#news' );
    var inner1  = news.querySelectorAll( '.inner-post' );
    SwicthPostHero( inner1 );

    const highlight = heroblock.querySelector( '#highlight' );
    var inner2      = highlight.querySelectorAll( '.inner-post' );
    SwicthPostHero( inner2 );

    const popular = heroblock.querySelector( '#popular' );
    var inner3    = popular.querySelectorAll( '.inner-post' );
    SwicthPostHero( inner3 );

    const allitempost     = heroblock.querySelectorAll( '.item-hero-post' );
    const plagination     = heroblock.querySelector( '.plagination-hero' );
    const itemplagination = plagination.querySelectorAll( '.item-plagination' );
    const lineplagination = plagination.querySelector( '.plagination-line span' );

    for (let i = 0; i < itemplagination.length; i++) {
        const item = itemplagination[i];
    
        if ( window.innerWidth < 768 ) {
            const newContent = item.textContent.replace( 'Artikel', '' );
            item.textContent = newContent;
        }

        item.addEventListener( 'click', function() {
            const datapost  = this.dataset.post;
            const itempost  = heroblock.querySelector( '#' + datapost );

            for (let i = 0; i < allitempost.length; i++) {
                const elementPost = allitempost[i];
                elementPost.classList.remove( 'active_post' );
            }

            itempost.classList.add( 'active_post' ); 

            if ( datapost == 'news' ) {
                lineplagination.style.left = '0';
            }
            if ( datapost == 'highlight' ) {
                lineplagination.style.left = '33.3%';
            }
            if ( datapost == 'popular' ) {
                lineplagination.style.left = '66.6%';
            }
        });
    }
}






const blockslider = document.querySelectorAll( '.block-slider-post' );
if ( blockslider ) {
    for (let i = 0; i < blockslider.length; i++) {
        const sliders = blockslider[i];
        const postslider = sliders.querySelector( '.slide-post' );

        const id = sliders.getAttribute( 'id' );
        const next   = '#' + id + ' .slider-next';
        const prev   = '#' + id + ' .slider-prev';
        const scroll = '#' + id + ' .swiper-scrollbar';

        var swiperslider = new Swiper( postslider, {
            navigation: {
                nextEl: next,
                prevEl: prev,
            },
            scrollbar: {
                el: scroll,
                hide: true,
            },
            breakpoints: {
                640: {
                slidesPerView: 1,
                spaceBetween: 20,
                },
                768: {
                slidesPerView: 2,
                spaceBetween: 30,
                },
                1024: {
                slidesPerView: 3,
                spaceBetween: 30,
                },
            },
        });
    }
}





const block_two = document.querySelector( '.block-two-column' );
if ( block_two ) {
    const videothumbnail = block_two.querySelector( '.image-thumbnail' );
    const videoIframe    = block_two.querySelector( 'iframe' );

    videothumbnail.addEventListener( 'click', function() {
        this.style.display = 'none';
        videoIframe.style.display = 'block';
    });
}




const block_video = document.querySelector( '.block-video' );
if ( block_video ) {
    const video = block_video.querySelector( 'iframe' );
    const image = block_video.querySelector( '.image-video' );

    image.addEventListener( 'click', function() {
        this.classList.add( 'hide_active' );
        video.classList.add( 'show_active' );
    });
}



const block_accordion = document.querySelector( '.block-accordion' );
if ( block_accordion ) {
    const item = block_accordion.querySelectorAll( '.item-accordion' );
    for (let i = 0; i < item.length; i++) {
        const itemaccordion = item[i];
        const head = itemaccordion.querySelector( '.head' );

        head.addEventListener( 'click', function() {
            const parent = this.closest( '.item-accordion' );
            parent.classList.toggle( 'active' );
        });
    };
}




const blog_slider = document.querySelector( '.slider-blog' );
if ( blog_slider ) {

    var swiperslider = new Swiper( blog_slider, {
        navigation: {
            nextEl: ".blog-next",
            prevEl: ".blog-prev",
        },
        scrollbar: {
            el: ".swiper-scrollbar",
            hide: true,
        },
        breakpoints: {
            640: {
            slidesPerView: 1,
            spaceBetween: 20,
            },
            768: {
            slidesPerView: 2,
            spaceBetween: 20,
            },
            1024: {
            slidesPerView: 3,
            spaceBetween: 20,
            },
        },
    });

}