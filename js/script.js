$(document).ready(function(){

    $("#form-signin").submit(function(e) {
        e.preventDefault();

        var login = $.trim($("#login").val());
        var pass = $.trim($("#password").val());

        if(login == '' || pass == '') {
            $("img.profile-img").attr("src", "/images/user-error.png");
        } else {
            $("img.profile-img").attr("src", "/images/user-ok.png");
            $(this).unbind().submit();
        }
    });
    $(".buttonSubmit").click(function(e) {
        e.preventDefault();
        let data=$('.form-tasks').serialize();
        let action=$('.form-tasks').attr('action');
        $.ajax({
            type: 'POST',
            url: action,
            data: data,
            success: function(data){
                console.log(data);
                if (data =='success'){
                    swal({
                        title: "Успешно!",
                        text: "Данные успешно сохранены!",
                        icon: "success",
                        button: "ok",
                    }).then((value) => {
                        if (value) {
                            location.href='/';
                        }
                    });
                } else {
                    swal({
                        title: "Ошибка!",
                        text: "Данные не сохранены!",
                        icon: "error",
                        button: "ok",
                    });
                }
            }
        });
    });

});
