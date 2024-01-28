
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