<?php include 'inc/header.php'; ?>
<div class="wrapperContent">
    <div class="ui-widget searchForm container row clearfix">
        <form>
            <div class="slide clearfix">
                <div class="wrapperFormGroups">    
                    <ul class="formGroup fourcol products">
                        <li class="listTitle">Search by Product
                            <span>Type name of product you are searching for to find a vendor or show where it may be purchased</span>
                        </li>
                        <!-- <li><label for="product_name">Product </label><input type="textbox" name="product_name" id="product_name"></li> -->
                        <li><label class="forSelect" for="product_name">Product </label><select name="product_name" id="productOptionsTemplateArea"></select></li>
                    </ul>
                    <ul class="formGroup fourcol vendors">
                        <li class="listTitle">Search by Vendor
                            <span>Type vendor name, city, state or country to search for a vendor</span>
                        </li>
                        <li><label for="vendor_name">Vendor Name </label><input type="textbox" name="vendor_name" id="vendor_name"></li>
                        <li><label for="vendor_contact_name">Contact Name </label><input type="textbox" name="vendor_contact_name" id="vendor_contact_name"></li>
                        <li><label for="vendor_city">City </label><input type="textbox" name="vendor_city" id="vendor_city"></li>
                        <li><label for="vendor_state">State </label><input type="textbox" name="vendor_state" id="vendor_state"></li>
                        <li><label for="vendor_country">Country </label><input type="textbox" name="vendor_country" id="vendor_country"></li>
                    </ul>
                    <ul class="formGroup fourcol shows last">
                        <li class="listTitle">Search by Show
                            <span>Type show name or city to find your vendor or product</span>
                        </li>
                        <li><label for="show_year">Year </label><input type="textbox" name="show_year" id="show_year"></li>
                        <!-- <li><label for="show_city">City </label><input type="textbox" name="show_city" id="show_city"></li> -->
                        <li><label class="forSelect" for="product_city">City </label><select name="show_city" id="showOptionsTemplateArea"></select></li>
                        <li><label for="show_name">Name </label><input type="textbox" name="show_name" id="show_name"></li>
                    </ul>
                </div>
                <div class="formButtons">
                    <ul class="buttons">
                        <li><input href="#" id="reset" class="button" type="reset" value="RESET" /></li>
                        <li><input href="#" id="submit" class="button" type="submit" value="GO" /></li>
                    </ul>
                </div>
            </div>
        </form>
        <a href="#" id="openSearch" class="button ">Search Again</a> 
    </div>
</div>
<div id="searchResultsTemplateArea" class="container"></div>
<div id="vendorDetailTemplateArea"></div>
<script type="text/x-Handlebars-tmpl" id="searchResultsTemplate">
    <p class="hint">Click on Vendor name for complete contact, product and show information (if it has been provided).</p>
    <div class="pagination"></div>
        <div class="listRecords searchResults">   
            <h2 class="row listTitle"><span class="threecol col1 ">Vendor Name</span><span class="threecol col2">City, State, Country</span><span class="fourcol col3">Show Name</span><span class="twocol col4">Show Year</span></h2>
            <ul id="searchResultsList">
            {{#each items}}
                <li class="row listItem" id="vendor{{vendor_id}}"><span class="threecol col1" >{{vendor_name}}</span><span class="threecol col2">{{vendor_city}}, {{vendor_state}}, {{vendor_country}}</span><span class="fourcol col3">{{show_name}}</span><span class="twocol col4">{{show_year}}</span></li>
            {{/each}}
            </ul>
        </div>
    <div class="pagination"></div>
</script>
<script type="text/x-Handlebars-tmpl" id="vendorDetailTemplate">
    <div id="vendor{{vendor_id}}Detail"  class="vendorDetail" title="{{vendor_name}}">
        <ul>
            <li class="listTitle">{{vendor_name}}</li>
            <li class="listTitle">{{vendor_address}}</li>
            <li class="listTitle">{{vendor_phone}}</li>
            <li class="listTitle">{{vendor_fax}}</li>
            <li class="listTitle">{{vendor_email}}</li>
            <li class="listTitle"><a href="http://{{vendor_url}}" target="_blank" alt="{{vendor_name}}">{{vendor_url}}</a></li>
        </ul>
    </div>
</script>
<script type="text/x-Handlebars-tmpl" id="productOptionsTemplate">
    <option value=""></option>
{{#each items}}
    <option value="{{product_name}}">{{product_name}}</option>
{{/each}}
</script>
<script type="text/x-Handlebars-tmpl" id="showOptionsTemplate">
    <option value=""></option>
{{#each items}}
    <option value="{{show_name}}">{{show_name}}</option>
{{/each}}
</script>
<?php include 'inc/scripts.php'; ?>
<script>
    $(document).ready(function(e) {
        Paginate("searchResultsList", 20);

        var params= [
            'product',
            'city'
        ]
        new GetSelectBoxOptions(params);

    });
</script>
<?php include 'inc/footer.php'; ?>