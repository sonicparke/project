<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>XPO Everything Finder Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/jQuery-UI/jquery-ui-1.8.20.custom.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
  </head>
  <body>
    <div class="header">
        <img src="images/logomergeb.gif" alt="XPO Press" />
        <h1 class="title">XPO Everything Finder Admin</h1>
    </div>

    <div class="wrapperContent products">

        <div class="container">
                <a id="addVendor" class="button addNewRecord" href="#">Add New Product</a>
                <div class="pagination"></div>
                <div id="listProducts" class="listRecords">
                    <h2 class="row listTitle">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5">Manage Product Details</span>
                    </h2>
                    <ul>
                        <li class="row listItem" id="1">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="2">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="3">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="4">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="5">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="6">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="7">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="8">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="9">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="10">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="11">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="12">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                        <li class="row listItem" id="13">
                            <span class="ninecol col1" >Product Name</span>
                            <span class=" col5"><a href="#" id="" class="editVendor button">Edit</a><a href="#" id="" class="button delete">Delete</a></span>
                        </li>
                    </ul>
                </div>
                
                <div class="pagination"></div>
            </div>






        <div class="ui-widget container row clearfix">
            <form>
                <div class="slide">
                    <ul class="formGroup fourcol vendors">
                        <li class="listTitle">Company Information
                            <span>Search for a company you're hoping to find at a show.</span>
                        </li>
                        <li>
                            <label for="vendors">Name </label><input type="textbox" id="vendor">
                        </li>
                        <li>
                            <label for="vendors">City </label><input type="textbox" id="companycity">
                        </li>
                        <li>
                            <label for="vendors">State </label><input type="textbox" id="companystate">
                        </li>
                        <li>
                            <label for="vendors">Country </label><input type="textbox" id="companycountry">
                        </li>
                    </ul>
                    <ul class="formGroup fourcol shows">
                        <li class="listTitle">Show Information
                            <span>Search for the name of the show and the city where it is located.</span>
                        </li>
                        <li>
                            <label for="vendors">City </label><input type="textbox" id="showcity">
                        </li>
                        <li>
                            <label for="vendors">Name </label><input type="textbox" id="showname">
                        </li>
                    </ul>
                    
                    <ul class="formGroup fourcol last products">
                        <li class="listTitle">Product Information
                            <span>Search for products you want to locate at a show.</span>
                        </li>
                        <li>
                            <label for="vendors">Product </label><input type="textbox" id="product">
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



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/handlebars-1.0.0.beta.6.js"></script>
    <script type="text/javascript" src="../js/jPages.min.js"></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
    <script type="text/javascript" src="js/adminScripts.js"></script>
    <script>
        $(document).ready(function(e) {
            Paginate("listProducts ul", 5);
        });
    </script>
  </body>
</html>
