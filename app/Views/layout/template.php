<!-- // header -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- Navbar  -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- <a href="#">
            <img src="img/polytron_logo_red.svg" alt="">
        </a> -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav" style="background-color: #990011;">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/company/index">
                        <img src="/img/polytron_logo_red.svg" alt="Polytron" width="200px">
                        <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <style>
        .navbar {
            padding: 0;
            /* Hapus padding pada navbar */
            margin: 0;
            /* Hapus margin pada navbar */
        }



        .nav-item {
            margin: 0;
            padding-left: 50px;
            /* Hapus margin pada setiap nav-item */
        }

        body {
            font-family: 'Poppins';
            font-size: 22px;
        }
    </style>
    <!-- Navbar Ends  -->

    <?= $this->renderSection('content'); ?>
    <!-- body -->


    <!-- footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    </body>

</html>