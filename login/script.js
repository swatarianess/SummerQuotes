/**
 * Created by Steve on 08/08/2016.
 */

$('document').ready(function()
{
    /* validation */
    $("#login-form").validate({
        rules:
        {
            password: {
                required: true
            },
            user_email: {
                required: true,
                email: true
            }
        },
        messages:
        {
            password:{
                required: "please enter your password"
            },
            user_email: "please enter your email address"
        },
        submitHandler: submitForm
    });
    /* validation */

    /* login submit */
    function submitForm()
    {
        var data = $("#login-form").serialize();
        console.log(data.toString());

        $.ajax({
            type : 'POST',
            url  : 'login/login_process.php',
            contentType : 'application/',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
                console.log('Sending...');
            },
            success :  function(response)
            {
                if(response=="ok"){

                    $("#btn-login").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                    setTimeout(' window.location.href = "home.php"; ',4000);
                } else if(response=="404"){
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' - user not found !</div>');
                } else{
                    $("#error").fadeIn(1000, function(){
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Login In');
                        console.log("Response:" + response)
                    });
                }
            }
        });
        return false;
    }
    /* login submit */
});