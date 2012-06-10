<?php include 'inc/header.php'; ?>

        <div class="wrapperContent">
            <div class="ui-widget searchForm container row clearfix">
                <form>
                    <div class="slide">
                        <ul class="formGroup fourcol vendors">
                            <li class="listTitle">Company Information
                                <span>Search for a company you're hoping to find at a show.</span>
                            </li>
                            <li>
                                <label for="vendors">Name </label><input type="textbox" name="vendor_name" id="vendor_name">
                            </li>
                            <li>
                                <label for="vendors">City </label><input type="textbox" name="vendor_city" id="vendor_city">
                            </li>
                            <li>
                                <label for="vendors">State </label><input type="textbox" name="vendor_state" id="vendor_state">
                            </li>
                            <li>
                                <label for="vendors">Country </label><input type="textbox" name="vendor_country" id="vendor_country">
                            </li>
                        </ul>
                        <ul class="formGroup fourcol shows">
                            <li class="listTitle">Show Information
                                <span>Search for the name of the show and the city where it is located.</span>
                            </li>
                            <li>
                                <label for="vendors">City </label><input type="textbox" name="show_city" id="show_city">
                            </li>
                            <li>
                                <label for="vendors">Name </label><input type="textbox" name="show_name" id="show_name">
                            </li>
                        </ul>
                        
                        <ul class="formGroup fourcol last products">
                            <li class="listTitle">Product Information
                                <span>Search for products you want to locate at a show.</span>
                            </li>
                            <li>
                                <label for="vendors">Product </label><input type="textbox" name="product_name" id="product_name">
                            </li>
                        </ul>
                        <ul class="formGroup buttons">
                            <li>
                                <input href="#" id="reset" class="button" type="reset" value="RESET" />
                            </li>
                            <li>    
                                <input href="#" id="submit" class="button" type="submit" value="GO" />
                            </li>
                        </ul>
                        
                    </div>
                    
                    <div>
                        
                        

                    </div>
                   
                </form>
                <a href="#" id="openSearch" class="button ">Search Again</a> 
            </div>
            
            </div>
            <div id="searchResultsTemplateArea" class="container">
                
            </div>


        </div> 

    </div>

<div id="vendorDetailTemplateArea">
    
</div>

    <script type="text/x-Handlebars-tmpl" id="searchResultsTemplate">
        <div class="pagination"></div>
            <div class="listRecords searchResults">   
                <h2 class="row listTitle"><span class="fourcol col1 ">Company Name</span><span class="threecol col2">Phone</span><span class="fourcol col3">Website</span></h2>
                <ul id="searchResultsList">
                {{#each items}}
                    <li class="row listItem" id="vendor{{vendor_id}}"><span class="fourcol col1" >{{vendor_name}}</span><span class="threecol col2">{{vendor_phone}}</span><span class="fourcol col3"><a href="http://{{vendor_url}}" target="_blank" alt="{{vendor_name}}">{{vendor_url}}</a></span></li>
                {{/each}}
                </ul>
            </div>
        <div class="pagination"></div>
    </script>

    <script type="text/x-Handlebars-tmpl" id="vendorDetailTemplate">
        <div id="vendor{{vendor_id}}Detail"  class="vendorDetail" title="{{vendor_name}}">
            <ul>
                <li class="listTitle">{{vendor_name}}</li>
                <li class="listTitle">Address</li>
                <li class="listTitle">City</li>
                <li class="listTitle">State</li>
            </ul>
        </div>
    </script>

    <?php include 'inc/footer.php'; ?>

