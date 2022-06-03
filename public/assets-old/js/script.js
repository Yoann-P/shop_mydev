// header
(function() {
    const header = $('.js-header'),
        items = header.find('.js-header-item'),
        burger = header.find('.js-header-burger'),
        mobile = header.find('.js-header-mobile');

    items.each(function() {
        const item = $(this),
            head = item.find('.js-header-head'),
            body = item.find('.js-header-body');

        head.on('click', function(e) {
            e.stopPropagation();

            if (!item.hasClass('active')) {
                items.removeClass('active');
                item.addClass('active');
            } else {
                items.removeClass('active');
            }
        });

        body.on('click', function(e) {
            e.stopPropagation();
        });

        $('html, body').on('click', function() {
            items.removeClass('active');
        });

    });

    burger.on('click', function(e) {
        e.stopPropagation();

        burger.toggleClass('active');
        mobile.toggleClass('visible');
    });

}());

// notifications popup
(function() {
    const header = $('.js-header'),
        popup = header.find('.notifications_popup'),
        icon = header.find('.js-notifications-icon');

    icon.on('click', function(e) {
        e.stopPropagation();
        popup.toggleClass('visible');
    });
    $(document).on('click', 'body', function(e) {
        if (!$(e.target).is('.visible'))
            popup.removeClass('visible');
    });

}());
//  change log
(function() {
    const changelog = $('.changelog'),
        log = changelog.find('.overflow_log'),
        more = changelog.find('.more_log'),
        text = changelog.find('.change_text');
    text.innerHTML = "New Heading";
    more.on('click', function(e) {
        e.stopPropagation();
        log.toggleClass('visible');
        text.innerHTML = "New Heading";
    });
}());
// avatar popup
(function() {
    const header = $('.js-header'),
        popup = header.find('.avatar_popup'),
        icon = header.find('.header__avatar');

    icon.on('click', function(e) {
        e.stopPropagation();
        popup.toggleClass('visible');
    });
    $(document).on('click', 'body', function(e) {
        if (!$(e.target).is('.visible'))
            popup.removeClass('visible');
    })

}());


function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

if (readCookie('theme') == 0) {
    $(".mode").html('')
    $(".mode").append("<b>clair</b>")
    $(".body").removeClass("is__dark")
    $(".light").addClass("active")
    $(".light").addClass("is_active")
    $(".dark").removeClass("active")
    $(".dark").removeClass("is_active")
    document.getElementById("logo_js").src = "assets/img/logos/logo.png";
    document.getElementById("logo_js_f").src = "assets/img/logos/logo.png";
}

if (readCookie('theme') == 1) {
    $(".mode").html('')
    $(".mode").append("<b>sombre</b>")
    $(".body").addClass("is__dark")
    $(".light").removeClass("active")
    $(".light").removeClass("is_active")
    $(".dark").addClass("active")
    $(".dark").addClass("is_active")
    document.getElementById("logo_js").src = "assets/img/logos/logo.png";
    document.getElementById("logo_js_f").src = "assets/img/logos/logo.png";
}

$(".dark").on('click', function(e) {
    $(".mode").html('')
    $(".mode").append("<b>sombre</b>")
    $(".body").addClass("is__dark")
    $(".light").removeClass("active")
    $(".light").removeClass("is_active")
    $(".dark").addClass("active")
    $(".dark").addClass("is_active")
    document.getElementById("logo_js").src = "assets/img/logos/logo.png";
    document.getElementById("logo_js_f").src = "assets/img/logos/logo.png";
    //document.getElementById("img_email").src = "assets/img/icons/mail-send-dark.gif";
    document.cookie = "theme=1; SameSite=None; Secure";
});


$(".light").on('click', function(e) {
    $(".mode").html('')
    $(".mode").append("<b>clair</b>")
    $(".body").removeClass("is__dark")
    $(".light").addClass("active")
    $(".light").addClass("is_active")
    $(".dark").removeClass("active")
    $(".dark").removeClass("is_active")

    document.getElementById("logo_js").src = "assets/img/logos/logo.png";
    document.getElementById("logo_js_f").src = "assets/img/logos/logo.png";
    //document.getElementById("img_email").src = "assets/img/icons/mail-send.gif";
    document.cookie = "theme=0; SameSite=None; Secure";

});




// menu popup
(function() {
    const header = $('.js-header'),
        popup = header.find('.menu__popup'),
        icon = header.find('.has_popup');

    icon.on('click', function(e) {
        e.stopPropagation();
        popup.toggleClass('visible');
    });
    $(document).on('click', 'body', function(e) {
        if (!$(e.target).is('.visible'))
            popup.removeClass('visible');
    })

}());
(function() {
    const header = $('.js-header'),
        popup = header.find('.menu__popup2'),
        icon = header.find('.has_popup2');
    icon.on('click', function(e) {
        e.stopPropagation();
        popup.toggleClass('visible');
    });
    $(document).on('click', 'body', function(e) {
        if (!$(e.target).is('.visible'))
            popup.removeClass('visible');
    })

}());

//  share popup
(function() {
    const share = $('.share'),
        popup = share.find('.dropdown__popup'),
        icon = share.find('.icon');

    icon.on('click', function(e) {
        e.stopPropagation();
        popup.toggleClass('visible');
    });
    $(document).on('click', 'body', function(e) {
        if (!$(e.target).is('.visible'))
            popup.removeClass('visible');
    })

}());
//  more popup
(function() {
    const share = $('.more'),
        popup = share.find('.dropdown__popup'),
        icon = share.find('.icon');

    icon.on('click', function(e) {
        e.stopPropagation();
        popup.toggleClass('visible');
    });
    $(document).on('click', 'body', function(e) {
        if (!$(e.target).is('.visible'))
            popup.removeClass('visible');
    })

}());

// =========== swiper

var mySwiper = new Swiper(".swiper_artists", {
    // Optional parameters
    loop: true,
    slidesPerView: 3,
    spaceBetween: 10,

    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
        },
        // when window width is >= 480px
        768: {
            slidesPerView: 2,
        },
        1000: {
            slidesPerView: 4,
        },
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var mySwiper = new Swiper(".swiper_hero", {
    // Optional parameters
    loop: true,
    slidesPerView: 3,
    spaceBetween: 10,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
        },
        // when window width is >= 480px
        576: {
            slidesPerView: 2,
        },
        876: {
            slidesPerView: 3,
        },
        1150: {
            slidesPerView: 3,
        },
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// ========== . countdown

function makeTimer() {

    //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
    var endTime = new Date("29 April 2023 9:56:00 GMT+01:00");
    endTime = (Date.parse(endTime) / 1000);

    var now = new Date();
    now = (Date.parse(now) / 1000);

    var timeLeft = endTime - now;

    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < "10") { hours = "0" + hours; }
    if (minutes < "10") { minutes = "0" + minutes; }
    if (seconds < "10") { seconds = "0" + seconds; }

    $(".days").html(days + "<span></span>");
    $(".hours").html(hours + "<span></span>");
    $(".minutes").html(minutes + "<span></span>");
    $(".seconds").html(seconds + "<span></span>");

}

setInterval(function() { makeTimer(); }, 1000);


// Scroll Animation
(function() {

    gsap.registerPlugin(ScrollTrigger);
    gsap.to(".creators_anim1", {
        x: 500,
        duration: 3,
        scrollTrigger: {
            trigger: ".dribbble_svg",
            scrub: true
        }
    });

    gsap.to(".creators_anim2", {
        x: -500,
        duration: 3,
        scrollTrigger: {
            trigger: ".dribbble_svg",
            scrub: true
        }
    });
    gsap.to(".creators_anim3", {
        x: 500,
        duration: 3,
        scrollTrigger: {
            trigger: ".dribbble_svg",
            scrub: true
        }
    });


}());

// profile Image
$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview(uploader) {
    if (uploader.files && uploader.files[0]) {
        $('#profileImage').attr('src',
            window.URL.createObjectURL(uploader.files[0]));
    }
}

$("#imageUpload").change(function() {
    fasterPreview(this);
});



// set the first nav item as active
var dis = $(".list-wrap li").eq(0);

// align the wave
align(dis);

// align the wave on click
$(".list-wrap li").click(function() {
    dis = $(this);
    align(dis);
});


function align(dis) {

    // get index of item
    var index = dis.index() + 1;

    // add active class to the new item
    $(".list-wrap li").removeClass("active");
    dis.delay(100).queue(function() {
        //dis.addClass('active').dequeue();
    });

    // move the wave
    var left = index * 80 - 98;
    $("#wave").css('left', left);


}