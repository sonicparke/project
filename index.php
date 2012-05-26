<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>XPO Everything Finder</title>
    <link rel="stylesheet" type="text/css" href="css/jQuery-UI/jquery-ui-1.8.20.custom.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Nunito?family=Cabin:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="">
        <div class="header">
            <img src="images/logomergeb.gif" alt="XPO Press" />
            <h1 class="title">XPO Everything Finder</h1>
        </div>

        <div class="wrapperContent">
            <div class="ui-widget searchForm container row clearfix">
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
            <div class="container">
                <div class="pagination"></div>
                
               <!--  <div class="searchResults">
                    <table id="searchResultsList">
                        <thead>
                            <tr>
                                <th scope="col" >Company Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">City, ST, Zip</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Web</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="col" >Company Name</td>
                                <td scope="col">Address</td>
                                <td scope="col">City, ST, Zip</td>
                                <td scope="col">Phone</td>
                                <td scope="col">Email</td>
                                <td scope="col">Web</td>
                            </tr>
                            <tr>
                                <td scope="col" >Company Name</td>
                                <td scope="col">Address</td>
                                <td scope="col">City, ST, Zip</td>
                                <td scope="col">Phone</td>
                                <td scope="col">Email</td>
                                <td scope="col">Web</td>
                            </tr>
                            <tr>
                                <td scope="col" >Company Name</td>
                                <td scope="col">Address</td>
                                <td scope="col">City, ST, Zip</td>
                                <td scope="col">Phone</td>
                                <td scope="col">Email</td>
                                <td scope="col">Web</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
               

                <div class="listRecords searchResults">
                    <h2 class="row listTitle"><span class="twocol col1 ">Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></h2>
                    <ul id="searchResultsList">
                        <li class="row listItem" id="1"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id="2"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id="3"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id="4"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id="5"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id="6"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id="7"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id="8"><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li><li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                        <li class="row listItem" id=""><span class="twocol col1" >Company Name</span><span class="twocol col2">Address</span><span class="twocol col3">City, ST, Zip</span><span class="twocol col4 ">Phone</span><span class="twocol col5 ">Email</span><span class="twocol col6 last">Web</span></li>
                    </ul>
                </div>
                
                <div class="pagination"></div>
            </div>


        </div> 

    </div>

<div id="vendorDetailTemplateArea">
    
</div>

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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/handlebars-1.0.0.beta.6.js"></script>
    <script type="text/javascript" src="js/jPages.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
        $(document).ready(function(e) {
            Paginate("searchResultsList", 20);
            
             
  


        });
    </script>
  </body>
</html>
