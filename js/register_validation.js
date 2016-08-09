/**
 * Created by Steve on 09/08/2016.
 */

$(document).ready(function() {
    $("#btn-register").click(function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if (name == '' || email == '' || password == '' || cpassword == '') {
            alert("All fields are required");
        } else if ((password.length) < 8) {
            alert("Please enter a password greater than 8 characters");
        } else if (!(password).match(cpassword)) {
            alert("Your passwords don't match. Try again?");
        } else {
            $.post("/login/register_process.php", {
                name1: name,
                email1: email,
                password1: password
            }, function(data) {
                if (data == 'Okay') {
                    $("form")[0].reset();
                }
                alert(data);
            });
        }
    });
});