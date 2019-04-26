<?php
    ob_start();
    require "header.php";
?>
        <div class="container">
            <div id="content" class="row justify-content-center">
                <div class="col-sm-12 p-5 mx-5 bg-white">
                <h1>Edit List</h1>

                    <?php
                        require 'includes/edit.inc.php';
                    ?>
                    
                </div>
            </div>
        </div>
<?php
    require "footer.php";
?>