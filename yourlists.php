<?php
    ob_start();
    require "header.php";
?>
        <div class="container">
            <div id="content" class="row justify-content-center">
                <div class="col-sm-12 p-5 mx-5 bg-white">
                    <h1>Your lists</h1>
                    <table>
                        <tbody>
                            <?php
                                require "includes/yourlists.inc.php";
                            ?>
                        </tbody>
                    </table>                                     
                </div>
            </div>
        </div>
<?php
    require "footer.php";
?>