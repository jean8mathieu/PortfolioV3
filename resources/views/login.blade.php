@extends('master')

@section('title')
    Contact
@endsection

@section('content')
    <div class="container">
        <div class="alert"></div>
        <form id="loginForm">
            @csrf
            <div class="mt-2"></div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label>Username</label>
                    <input type="text" id="username" class="form-control" name="username">

                    <div class="mt-2"></div>
                    <label>Password</label>
                    <input type="password" id="password" class="form-control" name="password">

                    <button class="btn btn-primary mt-2 w-100" type="button" id="login">Log in <i
                            class="fas fa-sign-in-alt"></i></button>
                </div>
            </div>

        </form>
    </div>

    <script>
        $('#login').on('click', function () {
            //Initializing the alert
            let alert = $(".alert");

            //Emptying the alert
            alert.html("");

            //Initializing the username
            let username = $("#username").val();
            //Initializing the password
            let password = $("#password").val();

            //Initializing the error
            let error = false;

            //Checking that the username isn't empty
            if (username.length === 0) {
                alert.append(getAlert('danger', 'You must type a username!'));
                error = true;
            }

            //Checking that the password isn't empty
            if (password.length === 0) {
                alert.append(getAlert('danger', 'You must type a password!'));
                error = true;
            }

            //Checking if there's any error
            if (!error) {
                let form = new FormData($('#loginForm')[0]);

                //Sending the ajax call
                $.ajax({
                    type: 'POST',
                    data: form,
                    url: '/login',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.error === false) {
                            alert.append(getAlert('success', data.message));
                            setTimeout(function () {
                                location.href = data.href;
                            }, 3000);
                        } else {
                            alert.append(getAlert('danger', data.message));
                        }
                    },
                    error: function (request, status, error) {
                        alert.append(getAlert('danger', 'There was an error when attempting to login. Please try again.'));
                    }
                })
            }


        });


        /**
         * Generating the alert popup
         * @param type
         * @param text
         * @returns {string}
         */
        function getAlert(type, text) {
            let button = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
                "    <span aria-hidden=\"true\">&times;</span>\n" +
                "  </button>";

            return "<div class='alert alert-" + type + "' role='alert'>" + text + button +"</div>";
        }
    </script>
@endsection
