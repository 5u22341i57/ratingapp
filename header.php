<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rate Anything!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container-fluid px-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <a class="navbar-brand" href="index.php">
                    <i class="fas fa-sort-amount-up"></i>
                    Rate Anything!
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto">

                        <?php
                            if (isset($_SESSION['userId'])) {
                                echo '
                                    <li class="nav-item">
                                        <span class="nav-link" style="color: #DAA520">Hi, ' . $_SESSION['userUid'] . '!</span>
                                    </li>';
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">All Lists</a>
                        </li>

                        <?php
                        
                            if (isset($_SESSION['userId'])) {
                                echo '
                                    <li>
                                        <a class="nav-link" href="yourlists.php">Your Lists</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="createlist.php">Create List</a>
                                    </li>
                                    <li class="nav-item">
                                        <form class="form-inline form-right mt-1 ml-2" action="includes/logout.inc.php" method="post">
                                            <button class="btn btn-outline-secondary btn-sm" type="submit" name="logout-submit" align="right">
                                            Log Out
                                            </button>
                                        </form>
                                    </li>';
                            }
                            else {
                                echo '
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">
                                            Log In
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="signup.php" class="nav-link">Register</a>
                                    </li>';
                            }

                        ?>
                    </ul>
                </div>

            </nav>

            <!-- Modal -->
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="loginModalLongTitle">🤔</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="my-2 my-lg-0 text-center" action="includes/login.inc.php" method="post">
                                <div class="form-group">
                                    <input class="form-control form-control-sm mr-sm-2" type="text" name="mailuid" placeholder="Username" aria-labelledby="Username">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-sm mr-sm-2" type="password" name="pwd" placeholder="Password" aria-labelledby="Password">
                                </div>
                                <button class="btn btn-outline-secondary btn-sm" type="submit" name="login-submit">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>