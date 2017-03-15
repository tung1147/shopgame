var App = function () {
    var req;
    var $modal = $('#requestModal');

    // User Interface init
    var uiInit = function () {
        // Initialize Tabs
        $('[data-toggle="tabs"] a, .js-tabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    };

    var Notify = function (notifyMsg, notifyType, notifyFrom, notifyAlign, notifyIcon, notifyUrl) {
        var $notify = $(this);
        var $notifyMsg = notifyMsg;
        var $notifyType = notifyType ? notifyType : 'info';
        var $notifyFrom = notifyFrom ? notifyFrom : 'top';
        var $notifyAlign = notifyAlign ? notifyAlign : 'right';
        var $notifyIcon = notifyIcon ? notifyIcon : '';
        var $notifyUrl = notifyUrl ? notifyUrl : '';
        $.notify(
                {
                    icon: $notifyIcon,
                    message: $notifyMsg,
                    url: $notifyUrl
                },
        {
            element: 'body',
            type: $notifyType,
            allow_dismiss: true,
            newest_on_top: true,
            showProgressbar: false,
            placement: {
                from: $notifyFrom,
                align: $notifyAlign
            },
            offset: 20,
            spacing: 10,
            z_index: 1033,
            delay: 5000,
            timer: 1000,
            animate: {
                enter: 'animated fadeIn',
                exit: 'animated fadeOutDown'
            }
        }
        );
    };

    /*
     * jQuery Appear + jQuery countTo, for more examples you can check out https://github.com/bas2k/jquery.appear and https://github.com/mhuggins/jquery-countTo
     *
     * App.initHelper('appear-countTo');
     *
     */
    var uiHelperAppearCountTo = function () {
        // Init counter functionality
        jQuery('[data-toggle="countTo"]').each(function () {
            var $this = jQuery(this);
            var $after = $this.data('after');
            var $speed = $this.data('speed') ? $this.data('speed') : 1500;
            var $interval = $this.data('interval') ? $this.data('interval') : 15;

            $this.appear(function () {
                $this.countTo({
                    speed: $speed,
                    refreshInterval: $interval,
                    onComplete: function () {
                        if ($after) {
                            $this.html($this.html() + $after);
                        }
                    }
                });
            });
        });
    };

    /*
     * Slick init, for more examples you can check out http://kenwheeler.github.io/slick/
     *
     * App.initHelper('slick');
     *
     */
    var uiHelperSlick = function () {
        // Get each slider element (with .js-slider class)
        $('.js-slider').each(function () {
            var $slider = $(this);

            // Get each slider's init data
            var $sliderArrows = $slider.data('slider-arrows') ? $slider.data('slider-arrows') : false;
            var $sliderDots = $slider.data('slider-dots') ? $slider.data('slider-dots') : false;
            var $sliderNum = $slider.data('slider-num') ? $slider.data('slider-num') : 1;
            var $sliderAuto = $slider.data('slider-autoplay') ? $slider.data('slider-autoplay') : false;
            var $sliderAutoSpeed = $slider.data('slider-autoplay-speed') ? $slider.data('slider-autoplay-speed') : 3000;

            // Init slick slider
            $slider.slick({
                arrows: $sliderArrows,
                dots: $sliderDots,
                slidesToShow: $sliderNum,
                autoplay: $sliderAuto,
                autoplaySpeed: $sliderAutoSpeed
            });
        });
    };

    return {
        init: function ($func) {
            switch ($func) {
                case 'uiInit':
                    uiInit();
                    break;
                default:
                    uiInit();
            }
        },
        notifyTopCenter: function ($notifyMsg, $notifyType, $notifyIcon) {
            Notify($notifyMsg, $notifyType, "", "center", $notifyIcon, "");
        },
        toTop: function () {
            $('html,body').animate({scrollTop: 0}, 300);
        },
        initHelper: function ($helper) {
            switch ($helper) {
                case 'appear-countTo':
                    uiHelperAppearCountTo();
                    break;
                case 'slick':
                    uiHelperSlick();
                    break;
                default:
                    return false;
            }
        },
        initHelpers: function ($helpers) {
            if ($helpers instanceof Array) {
                for (var $index in $helpers) {
                    App.initHelper($helpers[$index]);
                }
            } else {
                App.initHelper($helpers);
            }
        }
    };
}();

var CKC = App;
$(function () {
    if (typeof angular == 'undefined') {
        App.init();
        App.initHelpers(['slick', 'appear', 'appear-countTo']);
    }
});

$(document).ready(function () {
    //Modal show event
    var req;
    var $modal = $('#requestModal');

    $("#view-profiles").click(function () {
        $modal = $('#requestModal');

        var id = $(this).attr('data-id');
        if (req) {
            req.abort();
        }
        req = $.ajax({
            url: "addaccount?act=upacc",
            type: "GET"
        });
        req.done(function (response, textStatus, jqXHR) {
            $modal.empty().html(response).modal('show');
        });

        $modal.on('shown.bs.modal', function () {
            $('.hide').removeClass('hide');
            App.initHelpers('slick');
            FB.XFBML.parse();
        });

        event.preventDefault();
    });

    $("#btn-topup").click(function () {
        var $btn = $(this);
        $btn.button('loading');
        console.log("req",req);
        if (req) {
            req.abort();
        }
        var data = {
            serial: $('#cardSerial').val(),
            cardPin: $('#cardPin').val(),
            telcoCode: $('#telcoCode').val()
        }
        console.log(data);
        req = $.ajax({
//            url: "transaction/",
            url: "transaction?act=topupcard/",
//            url: "paygate",
            type: "POST",
            data: data,
            dataType:"json",
            success: function(res) {
//                alert("res",res);
                console.log(res);
            }
        });
        console.log("data",data, event);
        req.done(function (response, textStatus, jqXHR) {
//                alert("res",response);
//            console.log(response);
            $btn.button('reset');
            return;
            var json = $.parseJSON(response);
            if (json.err === 0) {
                App.notifyTopCenter(json.msg, 'success', 'fa fa-check');
            } else {
                App.notifyTopCenter(json.msg, 'danger', 'fa fa-times');
            }
        });
        event.preventDefault();
    });

    $("div[class='block clickitem']").click(function () {
        $modal = $('#requestModal');

        var id = $(this).attr('data-id');
        if (req) {
            req.abort();
        }
        req = $.ajax({
            url: "acc/info.php?id=" + id,
            type: "GET"
        });
        req.done(function (response, textStatus, jqXHR) {
            $modal.empty().html(response).modal('show');
        });

        $modal.on('shown.bs.modal', function () {
            $('.hide').removeClass('hide');
            App.initHelpers('slick');
            FB.XFBML.parse();
        });

        event.preventDefault();
    });


    //Float
    $('a#float-hide-btn').click(function () {
        if ($(this).hasClass('float-show'))
        {
            $('.float-menu').css('margin-right', '-140px');
            $(this).removeClass('float-show').addClass('float-hide')
        }
        else {
            $('.float-menu').css('margin-right', '0px');
            $(this).removeClass('float-hide').addClass('float-show')
        }
    });
    if (window.innerWidth <= 1280)
    {
        $('a#float-hide-btn').click();
    }
});