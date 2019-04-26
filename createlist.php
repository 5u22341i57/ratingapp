<?php
    require "header.php";
?>
        <div class="container">
            <div id="content" class="row justify-content-center">
                <div class="col-sm-12 p-5 mx-5 bg-white">
                    <h2>Give your list a name</h2>

                    <form action="includes/createlist.inc.php" method="post" class="form-width-md">
                        <div class="form-group">
                            <input class="form-control" type="text" name="listNameRatings">
                            <small class="form-text text-muted">"Coffee Shops in LA", "Albums 2019", "Miiiilk!!!"<br>(No accented characters)</small>
                        </div>
                        <h2>Add an item and rate it (optional)</h2>
                        <div class="form-row field_wrapper">
                            <div class="form-group col-md-10">
                                <input class="form-control" type="text" name="itemRatings[]">
                                <small class="form-text text-muted">"Ariana Grande - Thank U, Next", "Bar Nine", "Stremicks Heritage Organic Vitamin D"</small>
                            </div>
                            <div class="form-group col-md-2">
                                <input class="form-control" type="number" name="ratingRatings[]">
                                <small class="form-text text-muted">1-10</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="javascript:void(0);" class="add_input_button btn btn-outline-primary btn-sm" title="Add field">Add Item</a>
                            <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit" name="createlist-submit" id="createlist-submit">Create List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
    require "footer.php";
?>