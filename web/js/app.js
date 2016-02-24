(function ($) {

    var $navbar = $('#navbar-left'),
        $navbarLinks = $('li', $navbar);

    $navbarLinks.click(function (e) {
        var $attr = $(this).attr('submenu'),
            $icon = $(this).find('a').find('span.fa.arrow'),
            $arrowRight = 'fa-angle-right',
            $arrowDown = 'fa-angle-down';

        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            var $submenu = $('.submenu-' + $attr);
            $submenu.slideUp(500);

            $icon.removeClass($arrowDown);
            $icon.addClass($arrowRight);
        } else {
            $(this).addClass('active');

            if ($attr !== undefined) {
                e.preventDefault();
                $icon.removeClass($arrowRight);
                $icon.addClass($arrowDown);

                var $submenu = $('.submenu-' + $attr);
                $submenu.slideDown(500);
            }
        }
    });

    $('.login_submit').click(function (e) {
        e.preventDefault();
        var username = $('.login_username').val(),
            password = $('.login_password').val();

        if (username == '' || password == '') {
            $('.flash').empty().append("<div class='alert red'><i class='fa fa-close'></i> Veuillez remplir tout les champs</div>");
        } else {
            $.ajax({
                method: 'POST',
                url: $(this).attr('ajax-action'),
                data: {username: username, password: password},
                success: function (data) {
                    console.log(data);
                    if (data.state == true) {
                        location.reload();
                    } else {
                        $('.flash').empty().append("<div class='alert red'><i class='fa fa-close'></i> Nom de compte ou mot de passe incorrect</div>");
                    }
                }
            })
        }
    });

    $('#datepicker').datepicker();

    $("#ct_games, #ct_disciplines").hide();

    $("#ct_consoles select").on('change', function () {
        var $id = $("#ct_consoles select option:selected").val();
        $("#ct_games").fadeIn(500);
        $("#ct_games").find('select option').css('display','none');
        $("#ct_games").find('select option[consoleId='+$id+']').show();
    });

    $("#ct_games select").on('change', function () {
        $("#ct_disciplines").fadeIn(500);
    });

}(jQuery));