<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-basic</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">

    <style>
        .full-parent {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ddd;
        }
    </style>

</head>
<body class="full-parent">

    <div class="bg-light col-12 col-md-6 col-lg-3 shadow border rounded border-1 p-4">
        <form action="">
            <div class="d-flex justify-content-center mb-4">
                <img src="./assets/images/logo.png" alt="" width="120" class="rounded-pill shadow">
            </div>
            <div class="mb-3">
                <label for="txtUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="txtUsername" name="txtUsername" placeholder="Enter username">
            </div>
            <div class="mb-5">
                <label for="txtPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Enter password">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary" id="Submit" name="Submit" value="Login">
            </div>
        </form>
    </div>

    <script type="text/javascript" src="./assets/js/popperjs/popper.min.js"></script>
    <script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>