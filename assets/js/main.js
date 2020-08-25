/*-------
SCRIPTS

- ANIMATIONS GSAP/MAGICSCROLL
- INFINITE
- SCROLL TO
- COOKIES
- SET HEIGHT IFRAME YOUTUBE
- NAVIGATION
- ONLOAD FUNCTIONS
    - SMOOTH SCROLL
- RESIZE FUNCTIONS
- POLYFILLS
- ANALYTICS
- SWUP

--------*/


/* ---------
   ANIMATIONS GSAP/MAGICSCROLL
---------------*/
// Animation adding a class with MagicScroll
function elementAnimation() {
    var controller = new ScrollMagic.Controller();
    var elementWillAnimate = document.querySelectorAll('.element-animation');
 
    elementWillAnimate.forEach(function(element) {
       var ourScene = new ScrollMagic.Scene({
          triggerElement: element,
          triggerHook: 0.9,
          reverse: false
       })
       .setClassToggle(element, 'move-in')
       // .addIndicators({
       //    name: 'fade scene',
       //    colorTrigger: 'black',
       //    colorStart: '#75c695',
       //    colorEnd: 'pink'
       // })
       .addTo(controller);
    });
}

// Animation with GSAP in timeline
function marqueeAnimation() {
    var containerRoles = document.querySelectorAll('.b-rolesContainer');
    if (containerRoles.length > 0) {
        var timelinesRoles = gsap.timeline({defaults: {repeat: -1, ease: "none"}});
        timelinesRoles.fromTo(containerRoles, {xPercent: 0}, {xPercent: -100, duration: 25});
    }
    
    var containerProjectTitle = document.querySelectorAll('.b-titleMarqueeContainer');
    if (containerProjectTitle.length > 0) {
        var timelinesProjectTitle = gsap.timeline({defaults: {repeat: -1, ease: "none"}});
        timelinesProjectTitle.fromTo(containerProjectTitle, {xPercent: 0}, {xPercent: -100, duration: 10});
    }
    
}

// Animation with GSAP and MagicScroll with several and different conditions
function linesGridAnimationHomepage() {
    var lineV = document.querySelectorAll('.s-about .line-v');
    if (lineV.length > 0) {
        var lineV_1_Animation = gsap.fromTo(lineV[0], {height: "0%"}, {height: "100%", ease: "none"});
        var lineV_2_Animation = gsap.fromTo(lineV[1], {height: "0%"}, {height: "100%", ease: "none"});
        var lineV_3_Animation = gsap.fromTo(lineV[2], {height: "0%"}, {height: "100%", ease: "none"});
    }
    
    var lineH = document.querySelectorAll('.s-about .line-h');
    if (lineH.length > 0) {
        var lineH_1_Animation = gsap.fromTo(lineH[0], {width: "0%"}, {width: "100%", ease: "none"});
        var lineH_2_Animation = gsap.fromTo(lineH[1], {width: "0%"}, {width: "100%", ease: "none"});
    }
    
    if (lineV.length > 0) {
        var controller = new ScrollMagic.Controller();

        var scene = new ScrollMagic.Scene({
            triggerElement: lineV[0], 
            triggerHook: 0.2,
            duration: "150%", 
            reverse: true
        }).setTween(lineV_1_Animation).addTo(controller);
        var scene = new ScrollMagic.Scene({
            triggerElement: lineV[1],
            triggerHook: 0.3,
            duration: "120%",
            reverse: true
        }).setTween(lineV_2_Animation).addTo(controller);
        var scene = new ScrollMagic.Scene({
            triggerElement: lineV[2],
            triggerHook: 0.4,
            duration: "90%",
            reverse: true
        }).setTween(lineV_3_Animation).addTo(controller);

        var scene = new ScrollMagic.Scene({
            triggerElement: lineH[0],
            triggerHook: 1,
            duration: "90%",
            reverse: true
        }).setTween(lineH_1_Animation).addTo(controller);
        var scene = new ScrollMagic.Scene({
            triggerElement: lineH[1],
            triggerHook: 1,
            duration: "90%",
            reverse: true
        }).setTween(lineH_2_Animation).addTo(controller);
    }
}

// Animation appear elements with GSAP and MagicScroll
function elementsAppearAnimation() {
    // BOTTOM TO TOP
    var appearBottomToTop = document.querySelectorAll('.appearBottomToTop');
    if (appearBottomToTop.length > 0) {
        var controller = new ScrollMagic.Controller();
 
        appearBottomToTop.forEach(function(element) {
            var appearBottomToTopAnimation = gsap.fromTo(element, {yPercent: 50, opacity: 0}, {yPercent: 0, opacity: 1, ease: "expo.out", duration: 1.5});
            var scene = new ScrollMagic.Scene({
                triggerElement: element,
                triggerHook: 0.8,
                reverse: false
            }).setTween(appearBottomToTopAnimation).addTo(controller);
        });
    }
    

    // LEFT TO RIGHT
    var appearLeftToRight = document.querySelectorAll('.appearLeftToRight');
    if (appearLeftToRight.length > 0) {
        var controller = new ScrollMagic.Controller();
 
        appearLeftToRight.forEach(function(element) {
            var appearLeftToRightAnimation = gsap.fromTo(element, {xPercent: -50, opacity: 0}, {xPercent: 0, opacity: 1, ease: "expo.out", duration: 1.5});
            var scene = new ScrollMagic.Scene({
                triggerElement: element,
                triggerHook: 0.8,
                reverse: false
            }).setTween(appearLeftToRightAnimation).addTo(controller);
        });
    }

    var sectionIntro = document.querySelector('.s-intro');
    if (sectionIntro) {
        var introHello = sectionIntro.querySelector('.b-hello h1');
        var introBased = sectionIntro.querySelector('.b-based');
        var introHelloAnimation_1 = gsap.fromTo(introHello.children[0], {yPercent: -100}, {yPercent: 0, ease: "expo.out", duration: 1});
        var introHelloAnimation_2 = gsap.fromTo(introHello.children[1], {yPercent: 100}, {yPercent: 0, ease: "expo.out", duration: 1, delay: 0.5});
        var introBasedAnimation = gsap.fromTo(introBased.children[0], {yPercent: 100}, {yPercent: 0, ease: "expo.out", duration: 1, delay: 1});
    }


    var sectionIntroProject = document.querySelector('.s-projectInfo');
    if (sectionIntroProject) {
        var leftToRight = sectionIntroProject.querySelectorAll('.leftToRight');
        var leftToRightAnimation = gsap.fromTo(leftToRight, {xPercent: -100, opacity: 0}, {xPercent: 0, opacity: 1, ease: "expo.out", duration: 1});
        
        var rightToLeft = sectionIntroProject.querySelectorAll('.rightToLeft');
        var rightToLeftAnimation = gsap.fromTo(rightToLeft, {xPercent: 100, opacity: 0}, {xPercent: 0, opacity: 1, ease: "expo.out", duration: 1});

        var projectLineV = sectionIntroProject.querySelectorAll('.line-v');
        var lineVAnimation = gsap.fromTo(projectLineV, {height: "0%"}, {height: "100%", ease: "expo.out", duration: 1, delay: 1});
        
        var projectLineH = sectionIntroProject.querySelectorAll('.line-h');
        var lineHAnimation_1 = gsap.fromTo(projectLineH[0], {width: "0%"}, {width: "100%", ease: "expo.out", duration: 1.5, delay: 0.2});
        var lineHAnimation_2 = gsap.fromTo(projectLineH[1], {width: "0%", xPercent: 100}, {width: "100%", xPercent: 0, ease: "expo.out", duration: 1.5, delay: 0.2});
        var lineHAnimation_3 = gsap.fromTo(projectLineH[2], {width: "0%"}, {width: "100%", ease: "expo.out", duration: 1.5, delay: 0.2});
    }

    var sectionProjects = document.querySelector('.s-projects');
    if (sectionProjects) {        
        var controller = new ScrollMagic.Controller();
        var separatorLineH = sectionProjects.querySelector('.line-h');
        var separatorAnimation = gsap.fromTo(separatorLineH, {width: "0%"}, {width: "100%", ease: "expo.out", duration: 1.5});
        var scene = new ScrollMagic.Scene({
            triggerElement: separatorLineH,
            triggerHook: 0.7,
            reverse: false
        }).setTween(separatorAnimation).addTo(controller);
    }
}

/* ---------
   INFINITE SCROLL
---------------*/
function infiniteScroll() {
    var blogPages = document.querySelector('#container-blog');
    if (blogPages) {

        var containerBlog = document.querySelector('#container-blog');
        var paginationBlog = document.querySelector('.pagination');
        var infScroll = new InfiniteScroll(containerBlog, {
            // options
            path: '.pagination .next',
            append: '.blog-item',
            history: 'replace',
            hideNav: '.pagination',
            button: '#view-more-blog',
            scrollThreshold: false,
        });
        if (paginationBlog.children.length === 0) {
            paginationBlog.parentElement.remove();
        }
        var buttonViewMore = document.querySelector('#view-more-blog');
        infScroll.on('request', function () {
            buttonViewMore.textContent = "Cargando...";
        });
        infScroll.on('append', function () {
            buttonViewMore.textContent = "Ver más";
            elementAnimation();
        });
    }
}


/* -------------
    SCROLL TO
----------------*/
function scrollTo() {

    function scrollBehavior(offsetTop) {
        const supportsNativeSmoothScroll = 'scrollBehavior' in document.documentElement.style; // Polyfill Window Scroll with options
        if (supportsNativeSmoothScroll) {
            window.scroll({
                top: offsetTop,
                left: 0,
                behavior: 'smooth'
            });
        } else {
            window.scroll(0, offsetTop);
        }
    }

    let buttonID = document.querySelectorAll('.animateID');
    buttonID.forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            let hrefID = this.hash;
            let offsetTopID = document.querySelector(hrefID).offsetTop;
            scrollBehavior(offsetTopID);

            // Hide the nav when the link is clicked
            var mobileNav = document.querySelector('#nav-mobile-menu');
            if (mobileNav.classList.contains('menuFadeIn')) {
                mobileNav.classList.remove("menuFadeIn");
                mobileNav.classList.add("menuFadeOut");
                setTimeout(function () {
                    mobileNav.style.display = "none";
                }, 500)
            }
        });
    });
}

function backToTop() {
    const supportsNativeSmoothScroll = 'scrollBehavior' in document.documentElement.style; // Polyfill Window Scroll with options
    var buttonBackToTop = document.querySelector('#backToTop');
    if (buttonBackToTop) {
        if (supportsNativeSmoothScroll) {
            buttonBackToTop.addEventListener('click', function(){
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            });
        } else {
            buttonBackToTop.addEventListener('click', function(){
                window.scroll(0, 0);
            });
        }
    }
}

/*-------------------------
COOKIES
----------------------------------*/
function cookiesSetUp() {
    var cookie = Cookies.get('cookie');
    if(cookie != 'namecookie'){
        setTimeout(function(){
            // Do something

            // Set cookie and its expiration
            Cookies.set('cookie', 'namecookie', {expires: 2});
        }, 10000);
    }
}

/*-------------------------
SET HEIGHT IFRAME YOUTUBE
----------------------------------*/
function heightIframeYouTube(){
    var containerObjectiveIframe = document.getElementsByClassName('iframe-objective');

    for(i = 0; i < containerObjectiveIframe.length; i++){
        var containerThis = containerObjectiveIframe[i];
        var refHeightIframe = containerThis.getElementsByClassName('iframe-height-ref');
        var targetHeightIframe = containerThis.getElementsByClassName('iframe-height-target');

        targetHeightIframe[0].style.minHeight = "initial";
        var refHeight = refHeightIframe[0].offsetHeight - 30;
        var minHeight = refHeight + 'px';
        targetHeightIframe[0].style.minHeight = minHeight;
    }
}

/*-------------------------
NAVIGATION
----------------------------------*/
function navigationHeader() {
    var mainNav = document.querySelector('#nav-main');
    var searchNav = document.querySelector('#nav-search');
    var triggerMenu = document.querySelector('#button-menu');
    var closeMenu = document.querySelector('#close-menu');
    var triggerSearch = document.querySelector('#search-menu');
    var closeSearch = document.querySelector('#close-search');

    //Trigger menu open
    if (triggerMenu) {
        triggerMenu.addEventListener("click", event => {
            mainNav.style.display = "block";
            mainNav.classList.remove("menuFadeOut");
            mainNav.classList.add("menuFadeIn");

            // Close with Escape button
            document.addEventListener("keydown", event => {
                if (event.keyCode === 27) {
                    mainNav.classList.remove("menuFadeIn");
                    mainNav.classList.add("menuFadeOut");
                    setTimeout(function () {
                        mainNav.style.display = "none";
                    }, 500)
                }
            });
        });
        // Trigger close menu
        closeMenu.addEventListener("click", event => {
            mainNav.classList.remove("menuFadeIn");
            mainNav.classList.add("menuFadeOut");
            setTimeout(function () {
                mainNav.style.display = "none";
            }, 500)
        });

        // Menu Submenu Interactions
        var hasSubmenu = document.querySelectorAll('.menu-item-has-children');
        for (var i = 0; i < hasSubmenu.length; i++) {
            hasSubmenu[i].addEventListener("click", function () {
                var subMenu = this.querySelector(".sub-menu");
                if (!this.classList.contains("menu-active")) {
                    this.classList.add("menu-active");
                    subMenu.classList.add("sub-menu-active");
                    subMenu.style.height = "auto";
                    var heightSubMenu = subMenu.clientHeight + "px";
                    subMenu.style.height = "0px";
                    setTimeout(function () {
                        subMenu.style.height = heightSubMenu;
                    }, 0);
                } else {
                    this.classList.remove("menu-active");
                    subMenu.style.height = "0px";
                    subMenu.addEventListener("transitionend", function () {
                        this.classList.remove("sub-menu-active");
                    }, {
                        once: true
                    });
                }
            });
        }
    }

    //Trigger search open
    if (triggerSearch) {
        triggerSearch.addEventListener("click", event => {
            searchNav.style.display = "block";
            searchNav.classList.remove("menuFadeOut");
            searchNav.classList.add("menuFadeIn");

            // Close with Escape button
            document.addEventListener("keydown", event => {
                if (event.keyCode === 27) {
                    searchNav.classList.remove("menuFadeIn");
                    searchNav.classList.add("menuFadeOut");
                    setTimeout(function () {
                        searchNav.style.display = "none";
                    }, 500)
                }
            });
        });
        // Trigger close search
        closeSearch.addEventListener("click", event => {
            searchNav.classList.remove("menuFadeIn");
            searchNav.classList.add("menuFadeOut");
            setTimeout(function () {
                searchNav.style.display = "none";
            }, 500)
        });
    }
}

/*-------------------------
ONLOAD FUNCTIONS
----------------------------------*/

var init = function() {
    
    // Smooth Scroll (plugin added on footer.php)
    SmoothScroll({ 
        stepSize: 200,
        arrowScroll: 200,
        animationTime: 800,
    });

}
// window.addEventListener('load', init);

/*-------------------------
RESIZE FUNCTIONS
----------------------------------*/

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

var resizeFn = debounce(function() {
    // ADD FUNCTIONS HERE
}, 250);

// window.addEventListener('resize', resizeFn);

/*-------------------------
POLYFILLS
----------------------------------*/
// Detect if mix-blend-mode is supported
/*if (typeof window.getComputedStyle(document.body).mixBlendMode === 'undefined') {
	document.documentElement.className += " mix-blend-mode-no";
}*/

// Detect if browser is Edge
/*if (window.navigator.userAgent.indexOf("Edge") > -1) {
    document.documentElement.className += " edge-browser"
}*/

function bowserDetection() {
    var info = bowser.parse(window.navigator.userAgent);
    // alert(JSON.stringify(info));
    var browserDetect = info.browser.name;
    var osDetect = info.os.name;

    if (browserDetect == "Microsoft Edge" || browserDetect == "Safari") {
        document.documentElement.className += " grid-about-polyfill"
    }
    if (osDetect == "iOS") {
        document.documentElement.className += " grid-about-polyfill"
    }
}

/* -------------
    ANALYTICS
----------------*/
// Using attr HTML > onclick="analyticsEvents.clickProject(this)" 

var analyticsEvents = {
    clickProject: function(anchor) {
        var titlePage = document.title;
        var projectClicked = "Click Project " + anchor.dataset.project;
        gtag('event', projectClicked, {'event_category': 'Projects', 'event_label': titlePage});
    },
    clickEmail: function() {
        var titlePage = document.title;
        gtag('event', 'Click Email', {'event_category': 'CTA', 'event_label': titlePage});
    },
    clickMenu: function(anchor) {
        var titlePage = document.title;
        var menuClicked = "Click Menu " + anchor.dataset.menu;
        gtag('event', menuClicked, {'event_category': 'Menu', 'event_label': titlePage});
    }
}

/*-------------------------
SWUP
----------------------------------*/

/*const swup = new Swup({
    plugins: [
        // new SwupDebugPlugin(),
        new SwupGtagPlugin({
            gaMeasurementId: "UA-XXXXXXXX-XX"
        })
    ]
});*/

// LOAD ALL BASE SCRIPTS
/*swup.on('pageView', init);*/

// HANDLING LINKS WITH HASH AND SCROLL
/*swup.on('clickLink', function(e){
    var linkHash = e.delegateTarget.hash;

    function scrollHashSwup() {
        if (linkHash == "") {
            window.scroll(0, 0);
        } else {
            var containerIDTop = document.querySelector(linkHash).offsetTop;
            window.scroll(0, containerIDTop);
        }
        swup.off('pageView', scrollHashSwup);
    }
    swup.on('pageView', scrollHashSwup);
});*/

// HANDLING PAGES WITH INTRO AND SCROLL
/*swup.on('clickLink', function(e){
    // DISPLAY INTRO
    var pageHasIntro = e.delegateTarget.classList.contains('has-intro');

    function displayIntro() {
        var intro = document.querySelector('.intro-global');
        var introWidth = intro.clientWidth;
        if (!pageHasIntro) {
            intro.classList.remove('fadeIn', 'fadeOut');
            intro.classList.add('fadeOut');
            setTimeout(function() {
                intro.style.display = "none";
            }, 401);            
        } else {
            if (introWidth === 0) {
                intro.classList.remove('fadeIn', 'fadeOut');
                intro.classList.add('fadeIn');
                setTimeout(function() {
                    intro.style.display = "block";
                }, 401); 
            }
        }
        swup.off('transitionStart', displayIntro);
    }
    swup.on('transitionStart', displayIntro);


    // SCROLL CATEGORIES 
    var pageIsCategory = e.delegateTarget.classList.contains('is-category');

    function scrollPage() {
        if (!pageIsCategory) {
            window.scroll(0, 0);
            console.log('scrolled')
        }
        swup.off('pageView', scrollPage);
    }
    swup.on('pageView', scrollPage);

});*/