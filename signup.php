<?php
    require "header.php";
?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 p-5 mx-5 bg-white">
                    <h1>Create an account</h1>

                    <?php

                        if (isset($_GET['error'])) {
                            if ($_GET['error'] == "emptyfields") {
                                echo '<p class="error">Fill in all fields</p>';
                            }
                            else if ($_GET['error'] == "invaliduidmail") {
                                echo '<p class="error">Invalid username and email</p>';
                            }
                            else if ($_GET['error'] == "invaliduid") {
                                echo '<p class="error">Invalid username</p>';
                            }
                            else if ($_GET['error'] == "invalidmail") {
                                echo '<p class="error">Invalid email</p>';
                            }
                            else if ($_GET['error'] == "passwordhcheck") {
                                echo '<p class="error">Password fields don\'t much</p>';
                            }
                            else if ($_GET['error'] == "usertaken") {
                                echo '<p class="error">Username already taken</p>';
                            }
                        }
                        else if ($_GET['signup'] == "success") {
                            echo '<p class="success">Success</p>';
                        }

                    ?>

                    <form action="includes/signup.inc.php" method="post" class="form-width-md">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input class="form-control form-control-sm mr-sm-2" type="text" name="uid" placeholder="Username">
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control form-control-sm mr-sm-2" type="text" name="mail" placeholder="Email">
                            </div>                        
                            <div class="form-group col-md-6">
                                <input class="form-control form-control-sm mr-sm-2" type="password" name="pwd" placeholder="Password">
                            </div>  
                            <div class="form-group col-md-6">
                                <input class="form-control form-control-sm mr-sm-2" type="password" name="pwd-repeat" placeholder="Repeat password">
                            </div>  
                            <div class="form-group col-12">
                                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit" name="signup-submit">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
    require "footer.php";
?>