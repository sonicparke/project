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
            <li><label for="vendor_name">Vendor Name</label><input type="textbox" name="vendor_name"></li>
            <li><label for="vendor_contact_name">Contact Person</label><input type="textbox" name="vendor_contact_name"></li>
            <li><label for="vendor_address">Address</label><input type="textbox" name="vendor_address" ></li>
            <li><label for="vendor_city">City</label><input type="textbox" name="vendor_city"></li>
            <li><label for="vendor_state">State</label><input data-type="state" type="textbox" name="vendor_state" ></li>
            <li><label for="vendor_country">Country</label><input data-type="country" type="textbox" name="vendor_country" ></li>
            <li><label for="vendor_phone">Phone</label><input type="textbox" name="vendor_phone" ></li>
            <li><label for="vendor_fax">Fax</label><input type="textbox" name="vendor_fax"></li>
            <li><label for="vendor_email">Email</label><input type="textbox" name="vendor_email" ></li>
            <li><label for="vendor_url">Website of Vendor</label><input type="textbox" name="vendor_url"></li>
        </ul>
        <ul class="formGroup buttons">
            <li><input class="button" type="button" name="cancel" value="CANCEL" /></li>
            <li><input class="button" type="button" name="submit" value="SAVE" /></li>
        </ul>
    </form>
</div>
<div id="editProductPopup" class="container hidden row">
    <div id="editProductPopupTemplateArea"></div>
</div>
<div id="editShowPopup" class="container hidden row">
    <div id="editShowPopupTemplateArea"></div>
</div>
<div id="editVendorPopup" class="container hidden row">
    <div id="editVendorPopupTemplateArea"></div>
</div>
<script type="text/x-Handlebars-tmpl" id="editProductPopupTemplate">
    <form>
        <div class="pagination"></div>
        <ul id="editProductList" class="formGroup sixcol products">
        {{#each items}}
            <li><input type="checkbox" {{#if checked}} checked="checked" {{/if}} name="product_name" id="product{{product_id}}"><label for="product{{product_id}}">{{product_name}}</label></li>
        {{/each}}
        </ul>
        <div class="pagination"></div>
        <ul class="formGroup buttons">
            <li><input class="button" type="button" name="cancel" value="CANCEL" /></li>
            <li><input class="button" type="button" name="submit" value="SAVE" /></li>
        </ul>
    </form>
</script>
<script type="text/x-Handlebars-tmpl" id="editShowPopupTemplate">
    <form>
        <div class="pagination"></div>
        <ul id="editShowList" class="formGroup sixcol shows">
        {{#each items}}
            <li><input type="checkbox" {{#if checked}} checked="checked" {{/if}} name="show_name[{{show_id}}]" id="show{{show_id}}"><label for="show{{show_id}}">{{show_name}}</label></li>
        {{/each}}
        </ul>
        <div class="pagination"></div>
        <ul class="formGroup buttons">
            <li><input class="button" type="button" name="cancel" value="CANCEL" /></li>
            <li><input class="button" type="button" name="submit" value="SAVE" /></li>
        </ul>
    </form>
</script>
<script type="text/x-Handlebars-tmpl" id="editVendorPopupTemplate">
{{#each items}}
    <form>
        <ul class="formGroup sixcol vendors">
            <li><label for="vendor_name">Vendor Name</label><input type="textbox" name="vendor_name" value="{{vendor_name}}"></li>
            <li><label for="vendor_first_name">Contact Person</label><input type="textbox" name="vendor_first_name" value="{{vendor_first_name}}"></li>
            <li><label for="vendor_address">Address</label><input type="textbox" name="vendor_address"  value="{{vendor_address}}"></li>
            <li><label for="vendor_city">City</label><input type="textbox" name="vendor_city" value="{{vendor_city}}"></li>
            <li><label for="vendor_state">State</label><input data-type="state" type="textbox" name="vendor_state"  value="{{vendor_state}}"></li>
            <li><label for="vendor_country">Country</label><input data-type="country" type="textbox" name="vendor_country"  value="{{vendor_country}}"></li>
            <li><label for="vendor_phone">Phone</label><input type="textbox" name="vendor_phone"  value="{{vendor_phone}}"></li>
            <li><label for="vendor_fax">Fax</label><input type="textbox" name="vendor_fax" value="{{vendor_fax}}"></li>
            <li><label for="vendor_email">Email</label><input type="textbox" name="vendor_email"  value="{{vendor_email}}"></li>
            <li><label for="vendor_url">Website of Vendor</label><input type="textbox" name="vendor_url" value="{{vendor_url}}"></li>
        </ul>
        <ul class="formGroup buttons">
            <li><input class="button" type="button" name="cancel" value="CANCEL" /></li>
            <li><input class="button" type="button" name="submit" value="SAVE" /></li>
        </ul>
    </form>
    {{/each}}
</script>
<script type="text/x-Handlebars-tmpl" id="listRecordsTemplate">
    <h2 class="row listTitle">
        <span class="threecol col1">Vendor Name</span>
        <span class="threecol col2">Contact Name</span>
        <span class="twocol col3">Phone</span>
        <span class=" col5">Manage Vendor Details</span>
    </h2>
    <ul  class="vendors">
    {{#each items}}
        <li class="row listItem" id="{{vendor_id}}">
            <span class="threecol col1">{{vendor_name}}</span>
            <span class="threecol col2">{{vendor_contact}}</span>
            <span class="twocol col3">{{vendor_phone}}</span>
            <span class=" col5"><a href="#" data-dialog="editVendor" class="edit button">Edit</a><a href="#" data-dialog="editProduct" class="edit button">Products</a><a href="#" data-dialog="editShow" class="edit button">Shows</a><a href="#" id="" class="button delete">Delete</a></span>
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
    });
</script>
<?php include 'inc/footer.php'; ?>