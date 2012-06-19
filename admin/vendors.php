<?php include 'inc/header.php'; ?>
    <div id="vendor" class="wrapperContent admin">

        <div class="container">
            <a id="addNewVendor" data-dialog="addVendor" class="button addNew" href="#">Add New Vendor</a>
            <div class="pagination"></div>
            <div id="listRecordsTemplateArea" class="listRecords"></div>
            <div class="pagination"></div>
        </div>
    </div>

    <div id="addVendorPopup" class="container hidden row">
        <form>
                <ul class="formGroup sixcol vendors">

                    <li>
                        <label for="vendor_name">Company Name</label><input type="textbox" name="vendor_name" id="vendor_name">
                    </li>
                    <li>
                        <label for="vendor_first_name">Contact Name</label><input type="textbox" name="vendor_first_name" id="vendor_first_name">
                    </li>
                    <li>
                        <label for="vendor_level">Membership Level</label>
                        <select name="vendor_level" id="vendor_level">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </li>
                    <li>
                        <label for="vendor_address">Address</label><input type="textbox" name="vendor_address" id="vendor_address">
                    </li>
                    <li>
                        <label for="vendor_city">City</label><input type="textbox" name="vendor_city" id="vendor_city">
                    </li>
                    <li>
                        <label for="vendor_state">State</label><input data-type="state" type="textbox" name="vendor_state" id="vendor_state">
                    </li>
                    <li>
                        <label for="vendor_zip">Zip</label><input type="textbox" name="vendor_zip" id="vendor_zip">
                    </li>
                    <li>
                        <label for="vendor_country">Country</label><input data-type="country" type="textbox" name="vendor_country" id="vendor_country">
                    </li>
                    <li>
                        <label for="vendor_phone">Phone</label><input type="textbox" name="vendor_phone" id="vendor_phone">
                    </li>
                    <li>
                        <label for="vendor_fax">Fax</label><input type="textbox" name="vendor_fax" id="vendor_fax">
                    </li>
                    <li>
                        <label for="vendor_email">Email</label><input type="textbox" name="vendor_email" id="vendor_email">
                    </li>
                    <li>
                        <label for="vendor_url">Website</label><input type="textbox" name="vendor_url" id="vendor_url">
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

    <div id="editProductsPopup" class="container hidden row">
            <form>
                    <ul class="formGroup sixcol products">
                        <li>
                            <input type="checkbox" id="product_product1"><label for="product_product1">Product 1 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product2"><label for="product_product2">Product 2 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product3"><label for="product_product3">Product 3 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product4"><label for="product_product4">Product 4 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product5"><label for="product_product5">Product 5 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product6"><label for="product_product6">Product 6 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product7"><label for="product_product7">Product 7 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product8"><label for="product_product8">Product 8 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product9"><label for="product_product9">Product 9 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product10"><label for="product_product10">Product 10 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product11"><label for="product_product11">Product 11 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="product_product12"><label for="product_product12">Product 12 Name</label>
                        </li>
                    </ul>
                    <ul class="formGroup buttons">
                        <li>
                            <input href="#" id="reset" class="button" type="cancel" value="CANCEL" />
                        </li>
                        <li>
                            <input href="#" id="submitProduct" class="button" type="submit" value="SAVE" />
                        </li>
                    </ul>
            </form>
        </div>

        <div id="editShowsPopup" class="container hidden row">
            <form>
                    <ul class="formGroup sixcol products">
                        <li>
                            <input type="checkbox" id="show_show1"><label for="show_show1">Show 1 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show2"><label for="show_show2">Show 2 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show3"><label for="show_show3">Show 3 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show4"><label for="show_show4">Show 4 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show5"><label for="show_show5">Show 5 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show6"><label for="show_show6">Show 6 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show7"><label for="show_show7">Show 7 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show8"><label for="show_show8">Show 8 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show9"><label for="show_show9">Show 9 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show10"><label for="show_show10">Show 10 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show11"><label for="show_show11">Show 11 Name</label>
                        </li>
                        <li>
                            <input type="checkbox" id="show_show12"><label for="show_show12">Show 12 Name</label>
                        </li>
                    </ul>
                    <ul class="formGroup buttons">
                        <li>
                            <input href="#" id="reset" class="button" type="cancel" value="CANCEL" />
                        </li>
                        <li>
                            <input href="#" id="submitShows" class="button" type="submit" value="SAVE" />
                        </li>
                    </ul>
            </form>
        </div>

        <div id="editVendorPopup" class="container hidden row">
            <div id="editVendorPopupTemplateArea"></div>
        </div>

        <script type="text/x-Handlebars-tmpl" id="editVendorPopupTemplate">
        {{#each items}}
            <form>
                <ul class="formGroup sixcol vendors">
                    <li><label for="vendor_name">Company Name</label><input type="textbox" name="vendor_name" id="vendor_name" value="{{vendor_name}}"></li>
                    <li><label for="vendor_first_name">Contact Name</label><input type="textbox" name="vendor_first_name" id="vendor_first_name" value="{{vendor_first_name}}"></li>
                    <li><label for="vendor_level">Membership Level</label>
                        <select name="vendor_level" id="vendor_level" value="{{vendor_level}}">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        </li>
                    <li><label for="vendor_address">Address</label><input type="textbox" name="vendor_address" id="vendor_address" value="{{vendor_address}}"></li>
                    <li><label for="vendor_city">City</label><input type="textbox" name="vendor_city" id="vendor_city" value="{{vendor_city}}"></li>
                    <li><label for="vendor_state">State</label><input data-type="state" type="textbox" name="vendor_state" id="vendor_state" value="{{vendor_state}}"></li>
                    <li><label for="vendor_zip">Zip</label><input type="textbox" name="vendor_zip" id="vendor_zip" value="{{vendor_zip}}"></li>
                    <li><label for="vendor_country">Country</label><input data-type="country" type="textbox" name="vendor_country" id="vendor_country" value="{{vendor_country}}"></li>
                    <li><label for="vendor_phone">Phone</label><input type="textbox" name="vendor_phone" id="vendor_phone" value="{{vendor_phone}}"></li>
                    <li><label for="vendor_fax">Fax</label><input type="textbox" name="vendor_fax" id="vendor_fax" value="{{vendor_fax}}"></li>
                    <li><label for="vendor_email">Email</label><input type="textbox" name="vendor_email" id="vendor_email" value="{{vendor_email}}"></li>
                    <li><label for="vendor_url">Website</label><input type="textbox" name="vendor_url" id="vendor_url" value="{{vendor_url}}"></li>
                </ul>
                <ul class="formGroup buttons">
                    <li><input href="#" id="reset" class="button" type="cancel" value="CANCEL" /></li>
                    <li><input href="#" id="submit" class="button" type="submit" value="SAVE" /></li>
                </ul>
            </form>
            {{/each}}
    </script>

    <script type="text/x-Handlebars-tmpl" id="listRecordsTemplate">
             <h2 class="row listTitle">
                <span class="twocol col1">Vendor Name</span>
                <span class="twocol col2">Contact Name</span>
                <span class="onecol col3">Phone</span>
                <span class="twocol col4">Email</span>
                <span class="onecol col5">Level</span>
                <span class=" col5">Manage Vendor Details</span>
            </h2>
            <ul  class="vendors">
            {{#each items}}
                <li class="row listItem" id="{{vendor_id}}">
                    <span class="twocol col1">{{vendor_name}}</span>
                    <span class="twocol col2">{{vendor_contact}}</span>
                    <span class="onecol col3">{{vendor_phone}}</span>
                    <span class="twocol col4">{{vendor_email}}</span>
                    <span class="onecol col5">{{vendor_level}}</span>
                    <span class=" col5"><a href="#" data-dialog="editVendor" class="edit button">Edit</a><a href="#" data-dialog="editProducts" class="edit button">Products</a><a href="#" data-dialog="editShows" class="edit button">Shows</a><a href="#" id="" class="button delete">Delete</a></span>
                </li>
            {{/each}}
            </ul>
    </script>
    <script type="text/x-Handlebars-tmpl" id="vendorDetailTemplate">
        <div  class="vendorDetail" title="{{name}}">
            <ul>
                <li class="listTitle">{{name}}</li>
                <li class="listTitle">Address</li>
                <li class="listTitle">City</li>
                <li class="listTitle">State</li>
            </ul>
        </div>
    </script>

<?php include 'inc/scripts.php'; ?>

    <script>
        $(document).ready(function(e) {
            GetListItems('vendor');
            $('form li').geoSelector();
        });
    </script>
<?php include 'inc/footer.php'; ?>
