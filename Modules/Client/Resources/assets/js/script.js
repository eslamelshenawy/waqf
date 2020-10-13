$(window).on("load", function() {
    const heightw = $("body").height();
    const heightH = $("header").height();
    const heightF = $("footer").height();
    const heightHF = heightH + heightF;

    $("main").css({"min-height" : (heightw - heightHF) + 29+"px" });

    // $(window).scroll(function() {
    //     if ($(window).scrollTop() > 600) { // this refers to window
    //         var s= $(".Distinctive_properties_img img").attr("datad");
    //         console.log(s)
    //     } else {
    //         var s= $(".Distinctive_properties_img img").attr("datad");
    //         console.log(s)
    //         $(".Distinctive_properties_img img").attr("src" , s)
    //     }

    // });

    // removing padding-right when modal open
    // $("#reserve_request").on("shown.bs.modal", function() {
    //   console.log("The modal is fully shown.");
    //   $(".reserve_request.show").css("padding-right", "0");
    //   // $("body.modal-open").css("padding-right", "0");
    // });

    // fancybox

    // $("a.group").fancybox({
    //   transitionIn: "elastic",
    //   transitionOut: "elastic",
    //   speedIn: 600,
    //   speedOut: 200,
    //   overlayShow: false
    // });

    // $('[data-fancybox="gallery"]').fancybox({
    //   // Options will go here
    // });

    // $("[data-fancybox]").fancybox({
    //   youtube: {
    //     controls: 0,
    //     showinfo: 0
    //   },
    //   vimeo: {
    //     color: "f00"
    //   }
    // });

    // Bootstrap form validation

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName("needs-validation");
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener(
            "submit",
            function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false
        );
    });

    // slider

    $(".owl-carousel-2").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        rtl: true,
        autoplay: true,
        // animate: true,
        navText: [
            "<i class='fa fa-angle-right' aria-hidden='true'></i>",
            "<i class='fa fa-angle-left' aria-hidden='true'></i>"
        ],
        responsive: {
            500: {
                items: 1
            },
            750: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $(".slider_header_owl").owlCarousel({
        loop: true,
        margin: 10,
        items: 1,
        rtl: true,
        autoplay: false,
        // animate: true,
        navText: [
            "<i class='fa fa-angle-right' aria-hidden='true'></i>",
            "<i class='fa fa-angle-left' aria-hidden='true'></i>"
        ],
        responsive: {
            500: {
                items: 1
            },
            750: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $(".slider_handy_team_owl").owlCarousel({
        loop: true,
        margin: 10,
        items: 4,
        rtl: true,
        autoplay: false,
        // animate: true,
        navText: [
            "<i class='fa fa-angle-right' aria-hidden='true'></i>",
            "<i class='fa fa-angle-left' aria-hidden='true'></i>"
        ],
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $(".Dear_customers_slider_owl").owlCarousel({
        loop: true,
        margin: 10,
        items: 4,
        rtl: true,
        center: true,
        autoplay: false,
        // animate: true,
        navText: [
            "<i class='fa fa-angle-right' aria-hidden='true'></i>",
            "<i class='fa fa-angle-left' aria-hidden='true'></i>"
        ],
        responsive: {
            0: {
                items: 1,
                dots: false
                // center : false,
            },
            750: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    $(".owl-carousel-addetails").owlCarousel({
        loop: true,
        items: 1,
        thumbs: true,
        thumbImage: true,
        thumbContainerClass: "owl-thumbs",
        thumbItemClass: "owl-thumb-item",
        margin: 0,
        rtl: true,
        autoplay: true,
        nav: true,
        navText: [
            "<i class='fa fa-angle-right' aria-hidden='true'></i>",
            "<i class='fa fa-angle-left' aria-hidden='true'></i>"
        ],
        responsive: {
            500: {
                items: 1
            },
            750: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    // nav
    $(".click--nav").click(function() {
        $(this).toggleClass("open");
        $(".click--nav").toggleClass("active");
        $(".body-overlay").toggleClass("back");
        $(".nav").toggleClass("back");
        $("body").toggleClass("over_f");
    });

    $(".body-overlay").click(function() {
        $(".click--nav").removeClass("open");
        $(".click--nav").removeClass("active");
        $(".body-overlay").removeClass("back");
        $(".nav").removeClass("back");
        $("body").removeClass("over_f");
    });

    // departments
    $(".all-DEPARTMENt ul li").click(function() {
        $(".all-DEPARTMENt ul li")
            .not(this)
            .removeClass("active");
        $(this).addClass("active");
        var att = $(this)
            .children()
            .children()
            .attr("class");
        $(".dep-icon i").attr("class", att);

        var att2 = $(this).attr("my-data");
        console.log(att2);
        var datah2 = $(att2)
            .find(".h2")
            .html();
        var datap = $(att2)
            .find("p")
            .html();

        $("section.DEPARTMENt .disease-des h2").html(datah2);

        $("section.DEPARTMENt .disease-des p").html(datap);
    });

    // var playy  = new mediaelementplayer("video");
    $(document).ready(function(e) {
        $("#player1").click(function() {
            $(".vedio svg").addClass("active");
        });
        $(".vedio svg").click(function() {
            $(this).removeClass("active");
            // $("#player1 ").trigger("play");
        });
        // $(".vedio svg.active").click(function () {
        //     $("#player1").toggleClass("active")
        //     // $("#player1 source").trigger("play")
        //     // $('#player1').attr({'autoplay':'true'});
        // })
    });

    //register new building

    // $('.tabs-register .nav-tabs a').click(function () {
    //   $(this).tab('show');
    //   $("<a>").data("target", $(this).data("toggle")).tab("show")
    // })
    // $('#tabs a[data-toggle="tab"]').on('show.bs.tab', function(e) {
    //   let target = $(e.target).data('target');
    //   $(target)
    //     .addClass('active show')
    //     .siblings('.tab-pane.active')
    //     .removeClass('active show')
    // });
    $(document).ready(function() {
        $("#mytabs a").click(function() {
            var href = $(this).attr("href");
            var num = href.split("-")[1];
            console.log("num", num);
            $(".tab-pane").css("display", "none");
            $("[class^='etab-'][class^='etabi-']").removeClass("show");
            $(".etab-p" + num).css("display", "block");
            $(".etabi-img" + num).css("display", "block");
            $(".etab-p" + num).addClass("show");
            $(".etabi-img" + num).addClass("show");
        });
    });

    // // toggle password visibility
    // const passInputs = document.querySelectorAll("input[type='password'");
    // const showPass = document.querySelector("#show-pass");
    // showPass.addEventListener("click", () => {
    //     passInputs.forEach(input => {
    //         if (input.type === "password") {
    //             input.type = "text";
    //         } else {
    //             input.type = "password";
    //         }
    //     });
    // });
});
