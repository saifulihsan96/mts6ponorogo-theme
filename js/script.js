
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