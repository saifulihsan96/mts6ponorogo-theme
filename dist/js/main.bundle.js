(()=>{const e=document.querySelector(".search-menu"),t=document.querySelector(".form-search-page");e.addEventListener("click",(function(){t.classList.toggle("active")})),document.addEventListener("click",(function(l){e.contains(l.target)||t.contains(l.target)||t.classList.remove("active")}));const l=document.querySelectorAll(".mobile-menu .main-mobile-header li");for(let e=0;e<l.length;e++)l[e].addEventListener("click",(function(){this.querySelector(".sub-menu").classList.toggle("active")}));const o=document.querySelector(".mobile-menu .icon_bar svg"),s=document.querySelector(".mobile-menu .overlay-menu"),c=document.querySelector(".mobile-menu .close-menu svg");function n(e){for(let t=0;t<e.length;t++){const t=e[0],l=e[1],o=t.querySelector(".small-post img"),s=t.querySelector(".small-post h3"),c=l.querySelector(".small-post img"),n=l.querySelector(".small-post h3"),r=t.querySelector(".big-image").src,i=t.querySelector("h1").textContent;n.textContent=i,c.src=r;const a=l.querySelector(".big-image").src,u=l.querySelector("h1").textContent;s.textContent=u,o.src=a;const m=t.querySelector(".small-post"),d=l.querySelector(".small-post");m.addEventListener("click",(function(){this.closest(".item-hero-post").querySelector("#inner1").classList.add("active"),t.classList.remove("active")})),d.addEventListener("click",(function(){this.closest(".item-hero-post").querySelector("#inner0").classList.add("active"),l.classList.remove("active")}))}var t=0;setInterval((function(){e[t].classList.remove("active"),t=(t+1)%e.length,e[t].classList.add("active")}),1e4)}o.addEventListener("click",(function(){this.closest(".mobile-menu").querySelector(".setmenu").classList.add("active_menu"),s.classList.add("active")})),c.addEventListener("click",(function(){this.closest(".mobile-menu").querySelector(".setmenu").classList.remove("active_menu"),s.classList.remove("active")})),new Swiper(".footer-post",{navigation:{nextEl:".footer-next",prevEl:".footer-prev"},breakpoints:{640:{slidesPerView:1,spaceBetween:20},768:{slidesPerView:2,spaceBetween:30},1024:{slidesPerView:3,spaceBetween:30}}});const r=document.querySelector(".block-hero");if(r){n(r.querySelector("#news").querySelectorAll(".inner-post")),n(r.querySelector("#highlight").querySelectorAll(".inner-post")),n(r.querySelector("#popular").querySelectorAll(".inner-post"));const e=r.querySelectorAll(".item-hero-post"),t=r.querySelector(".plagination-hero"),l=t.querySelectorAll(".item-plagination"),o=t.querySelector(".plagination-line span");for(let t=0;t<l.length;t++){const s=l[t];if(window.innerWidth<768){const e=s.textContent.replace("Artikel","");s.textContent=e}s.addEventListener("click",(function(){const t=this.dataset.post,l=r.querySelector("#"+t);for(let t=0;t<e.length;t++)e[t].classList.remove("active_post");l.classList.add("active_post"),"news"==t&&(o.style.left="0"),"highlight"==t&&(o.style.left="33.3%"),"popular"==t&&(o.style.left="66.6%")}))}}const i=document.querySelectorAll(".block-slider-post");for(let e=0;e<i.length;e++){const t=i[e],l=t.querySelector(".slide-post"),o=t.getAttribute("id"),s="#"+o+" .slider-next",c="#"+o+" .slider-prev",n="#"+o+" .swiper-scrollbar";console.log(s),new Swiper(l,{navigation:{nextEl:s,prevEl:c},scrollbar:{el:n,hide:!0},breakpoints:{640:{slidesPerView:1,spaceBetween:20},768:{slidesPerView:2,spaceBetween:30},1024:{slidesPerView:3,spaceBetween:30}}})}const a=document.querySelector(".block-two-column .image-thumbnail"),u=document.querySelector(".block-two-column iframe");a.addEventListener("click",(function(){this.style.display="none",u.style.display="block"}))})();