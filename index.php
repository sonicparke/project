<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>XPO Everything Finder</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="container">
        <div class="header">
            <img src="images/logomergeb.gif" alt="XPO Press" />
            <h1 class="title">XPO Everything Finder</h1>
        </div>

        <div class="wrapperContent container row">
            <div class="ui-widget searchForm clearfix">
                <form>
                    <ul class="formGroup vendors">
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
                    <ul class="formGroup shows">
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
                    
                    <ul class="formGroup products">
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
                </form>
            </div>
        </div> 
    </div>



    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/handlebars-1.0.0.beta.6.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script>
        $(document).ready(function(e) {
            
             
        });
    </script>
  </body>
</html>
