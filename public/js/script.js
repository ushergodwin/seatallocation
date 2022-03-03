    function extractFilename(path) {
        if (path.substr(0, 12) === "C:\\fakepath\\")
            return path.substr(12); // modern browser
        var x;
        x = path.lastIndexOf('/');
        if (x >= 0) // Unix-based path
            return path.substr(x+1);
        x = path.lastIndexOf('\\');
        if (x >= 0) // Windows-based path
            return path.substr(x+1);
        return path; // just the filename
    }
    $(window).on('load', function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
    jQuery(function(){

        $("#show-password").on('click', function() {
            $("#eye").toggleClass('fas fa-eye-slash');
            $("#eye").toggleClass('fas fa-eye');
            if($(".password").attr('type') === 'text')
            {
                $(".password").attr('type', 'password');
            }else {
                $(".password").attr('type', 'text');
            }
        });
        
        $("#accountForm").on('submit', function(e) {
            e.preventDefault();
            let url = $(this).attr('action');
            $.ajax({
                url: url,
                type: 'POST',
                data: $(this).serializeArray(),
                beforeSend: ()=> {
                    $("#register-btn").attr("disabled", true);
                    $("#register-btn").html("<span class='spinner-border spinner-border-sm text-light'></span> creating...");
                },
                success: (data) => {
                    $(".response").html(data);
                },
                complete: () => {
                    $("#register-btn").attr('disabled', false);
                    $("#register-btn").html("CREATE ACCOUNT");
                    //$("#accountForm").trigger('reset');
                }
            });
        });


    $("#loginForm").on('submit', function(e) {
        e.preventDefault()
        const url = $(this).attr('action')
        $.ajax({
            url: url,
            type: "POST",
            data: $(this).serializeArray(),
            beforeSend: () => {
                $(".response").html("<span class='spinner-border spinner-border-sm text-light'></span> Authenticating")
                $(".login-btn").attr("disabled", true)
            },
            success: (response) => {
                let responseDiv = $(".response");
                if (response.status === 200) {
                    responseDiv.addClass('alert alert-success fade show w-50')
                    responseDiv.html("<i class='fas fa-check-circle text-success'></i> " + response.message)
                    window.location.href = response.redirect;
                } else {
                    responseDiv.addClass('alert alert-warning fade show');
                    responseDiv.html("<i class='fas fa-exclamation-triangle text-warning'></i> " + response.message)
                }
            },
            complete: () => {
                $(".login-btn").attr("disabled", false);
            }
        });
    });

    $(".exams").on('click', function(){
        $("#sup_name").html($(this).data('sup_name'))
        $.ajax({
            url: $(this).data('url'),
            method: 'GET'
        }).done((response) => {

            $("#exam-table").html(response)
        })
    })

    $("#resetPasswordForm").on('submit', function(e) {
        e.preventDefault()
        const url = $(this).attr('action')
        $.ajax({
            url: url,
            type: "POST",
            data: $(this).serializeArray(),
            beforeSend: () => {
                $(".reset-password-btn").html("<span class='spinner-border spinner-border-sm text-success'></span> reseting...")
                $(".reset-password-btn").attr("disabled", true)
            },
            success: (response) => {
                let responseDiv = $(".response");
                if (response.status === 200) {
                    responseDiv.addClass('alert alert-success fade show')
                    responseDiv.html("<i class='fas fa-check-circle text-success'></i> " + response.message)
                    if(response.isSecCheck === 200)
                    {
                        let i = 5

                        const redirectCounter = setInterval(() => {
                                document.getElementById('redirecting').innerHTML = `redirecting in 0${i}`
                                i--
                                if(i === 0)
                                {
                                    clearInterval(redirectCounter)
                                    window.location.href = `${window.location.origin}/dashboard`
                                }
                        }, 1000)
                    }
                } else {
                    responseDiv.addClass('alert alert-danger fade show');
                    responseDiv.html("<i class='fas fa-exclamation-triangle text-warning'></i> " + response.message)
                }
            },
            complete: () => {
                $(".reset-password-btn").html("RESET PASSWORD")
                $(".reset-password-btn").attr("disabled", false);
                $(this).trigger('reset');
            }
        });
    });

    $("#password2").on('keyup', function(){
        let password = $("#password1").val();
        if($(this).val() !== password)
        {
            $("#password-error").html("Passwords do not match!")
            $(".reset-password-btn").attr('disabled', true);
        }else {
            $("#password-error").html("<i class='fas fa-check-circle'></i> Passwords match")
            $(".reset-password-btn").attr('disabled', false);
        }
    })
});