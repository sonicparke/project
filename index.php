<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>XPO Everything Finder</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1 class="title">XPO Everything Finder</h1>
        	<div class="chooser">
        		<ul>
	        		<li class="computer"><input type="radio" id="host-data" value="host-data" name="group1" /><label for="host-data">Computer information for a specific computer</label></li>
	        		<li class="computer"><input type="radio" id="host-apps" value="host-apps" name="group1" /><label for="host-apps">Software installed on a specific computer</label></li>
	        		<li class="user"><input type="radio" id="host-user" value="host-user" name="group1" /><label for="host-user">Computers for a specific username</label></li>
        		</ul>
        	</div>
            <div class="wrapperForm">
            	<h2 class="title">choose query type</h1>
    			<span id="userImage">&nbsp;</span>
                <div class="becauseMSWebFormsStripFormTags">
                    <input id="qString" type="text" />
                    <button id="submit" type="submit">GO</button>
                </div>
                <div id="alert"></div>
            </div>
        </div>
        
        <iframe id="results" src="">
        </iframe>
    </div>


<script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="js/scripts.js"></script>
<script>
	$(document).ready(function(e) {
	
    });
</script>
</body>
</html>