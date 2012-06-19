<?php include 'inc/header.php'; ?>
    <div id="product" class="wrapperContent admin">

        <div class="container">
            <a id="addNewProduct" data-dialog="editProduct" class="button addNew" href="#">Add New Product</a>
            <div class="pagination"></div>
            <div id="listRecordsTemplateArea" class="listRecords"></div>
            <div class="pagination"></div>
        </div>

        <div id="editProductPopup" class="container hidden row">
            <form>
                <ul class="formGroup sixcol products">
                    <li>
                        <label for="product_name">Product Name</label><input type="textbox" name="product_name" id="product_name">
                    </li>
                </ul>
                <ul class="formGroup buttons">
                    <li>
                        <input href="#" id="reset" class="button" type="cancel" value="CANCEL" />
                    </li>
                    <li>    
                        <input href="#" id="submit" class="button" type="submit" value="SAVE" />
                    </li>
                </ul>          
            </form>
        </div>
 
    </div>
    <script type="text/x-Handlebars-tmpl" id="listRecordsTemplate">
            <h2 class="row listTitle">
                    <span class="ninecol col1" >Product Name</span>
                    <span class=" col5">Manage Product Details</span>
            </h2>
            <ul class="products">
            {{#each items}}
                <li class="row listItem" id="{{product_id}}">
                    <span class="ninecol col1" >{{product_name}}</span>
                    <span class="col5"><a href="#" data-dialog="editProduct" class="edit button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                </li>
            {{/each}}
            </ul>
    </script>

    <?php include 'inc/scripts.php'; ?>

    <script>
        $(document).ready(function(e) {
            GetListItems('product');
        });
    </script>

    <?php include 'inc/footer.php'; ?>
