<?php

/*
$emailTo = "my@example.com";

$subject = "I hope this works!";

$body = "I think you're great!";

$headers = "From: me@mydomain.com";

if (mail($emailTo, $subject, $body, $headers)) {

    echo "The email was sent succesfully";

} else {

    echo "The email could not be sent.";

}*/

if (isset($_POST["submitButton"])) {

    $email = $_POST['inputEmail'];

    $emailSubject = $_POST['inputSubject'];

    $message = $_POST['inputText'];

    $to = 'me@mydomain.com';

    $from = "$email";

    $subject = "$emailSubject";

    $body = "$message";

    // Check if email has been entered and is valid
    if (!$_POST['inputEmail'] || !filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) {

        $errEmail = 'Please enter a valid email address';

    }

    // Check if message has been entered
    if (!$_POST['inputSubject']) {

        $errSubject = 'Please enter a subject';

    }

    // Check if message has been entered
    if (!$_POST['inputText']) {

        $errMessage = 'Please enter your message';

    }

    // If there are no errors, send the email
    if (!$errEmail && !$errSubject && !$errMessage) {
        if (mail ($to, $from, $subject, $body)) {

            $result='<div class="alert alert-success">Thank You! I will be in touch</div>';

        } else {

            $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<title>Email Form</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="x-ua-compatible" content="ie=edge">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style type="text/css">
    #succesMessage {
        display: none;
    }
</style>

</head>

<body>

    <div class="container">

        <h1>Get in touch!</h1>

        <div id="succesMessage" class="alert alert-success" role="alert">
            <p>Your message was sent, we'll get back to you ASAP!</p>
        </div>

        <div id="errorMessage"></div>

        <form method="post">
            <fieldset class="form-group">
                <label for="inputEmail">Email address</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Enter email">
                <small class="text-muted">We'll never share your email with anyone else.</small>
            </fieldset>
            <fieldset class="form-group">
                <label for="inputSubject">Subject</label>
                <input type="text" class="form-control" id="inputSubject" name="inputSubject">
            </fieldset>
            <fieldset class="form-group">
                <label for="inputText">What would you like to ask us?</label>
                <textarea class="form-control" id="inputText" name="inputText" rows="3"></textarea>
            </fieldset>
            <button type="submit" id="submitButton" name="submitButton" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function isEmail(inputEmail) {

            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(inputEmail);

        }

        $("#submitButton").click(function () {

            var errorMessage = "";
            var fieldsMissing = "";

            if ($("#inputEmail").val() == "") {

                fieldsMissing += "<br>The email field is required.";

            }

            if ($("#inputSubject").val() == "") {

                fieldsMissing += "<br>The subject field is required.";

            }

            if ($("#inputText").val() == "") {

                fieldsMissing += "<br>The content field is required.";

            }

            if (fieldsMissing != "") {

                errorMessage += "<div class='alert alert-danger' role='alert'><strong>There where error(s) in your form:</strong>" + fieldsMissing + "</div>";

            }

            if (isEmail($("#inputEmail").val()) == false) {

                errorMessage += "<div class='alert alert-danger' role='alert'>Your email adress is not valid.</div>";

            }

            if (errorMessage != "") {

                $("#errorMessage").html(errorMessage);

            } else {

                $("#succesMessage").show();
                $("#errorMessage").hide();

            }

        });
    </script>

</body>

</html>
