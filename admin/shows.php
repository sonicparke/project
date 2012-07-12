<?php include 'inc/header.php'; ?>
<div id="show" class="wrapperContent admin">
    <div class="container">
        <a id="addNewShow" data-dialog="addShow" class="button addNew" href="#">Add New Show</a>
        <div class="pagination"></div>
        <div id="listRecordsTemplateArea" class="listRecords"></div>
        <div class="pagination"></div>
    </div>
    <div id="addShowPopup" class="container hidden row">
        <form>
            <ul class="formGroup sixcol shows">
                <li><label for="show_name">Show Name</label><input type="textbox" name="show_name" id="show_name" /></li>
                <li><label for="show_city">Show City</label><input type="textbox" name="show_city" id="show_city" /></li>
                <li><label for="show_year">Show Year</label><input type="textbox" name="show_year" id="show_year" /></li>
                <li><label for="show_url">XPO Show Link</label><input type="textbox" name="show_url" id="show_url" /></li>
            </ul>
            <ul class="formGroup buttons">
                <li><input class="button" type="button" name="cancel" value="CANCEL" /></li>
                <li><input class="button" type="button" name="submit" value="SAVE" /></li>
            </ul>          
        </form>
    </div>
    <div id="editShowPopup" class="container hidden row">
        <div id="editShowPopupTemplateArea"></div>
    </div>
</div>
<script type="text/x-Handlebars-tmpl" id="editShowPopupTemplate">
    <form>
        <ul class="formGroup sixcol shows">
            <li><label for="show_name">Show Name</label><input type="textbox" name="show_name" id="show_name" value="{{show_name}}"/></li>
            <li><label for="show_city">Show City</label><input type="textbox" name="show_city" id="show_city" value="{{show_city}}"/></li>
            <li><label for="show_year">Show Year</label><input type="textbox" name="show_year" id="show_year" value="{{show_year}}"/></li>
            <li><label for="show_url">XPO Show Link</label><input type="textbox" name="show_url" id="show_url" value="{{show_url}}"/></li>
        </ul>
        <ul class="formGroup buttons">
            <li><input class="button" type="button" name="cancel" value="CANCEL" /></li>
            <li><input class="button" type="button" name="submit" value="SAVE" /></li>
        </ul>          
    </form>
</script>
<script type="text/x-Handlebars-tmpl" id="listRecordsTemplate">
        <h2 class="row listTitle">
            <span class="threecol col1">Show Name</span>
            <span class="threecol col2">City</span>
            <span class="onecol col3">Year</span>
            <span class="threecol col5">XPO Show Link</span>
            <span class=" col5">Manage Show Details</span>
        </h2>
        <ul class="shows">
        {{#each items}}
            <li class="row listItem hasSubGroup" id="{{show_id}}">
                <span class="threecol col1">{{show_name}}</span>
                <span class="threecol col2">{{show_city}}</span>
                <span class="onecol col3">{{show_year}}</span>
                <span class="threecol col5">{{show_url}}</span>
                <span class="col5"><a href="#" data-dialog="editShow" class="edit button">Edit</a><a href="#" class="button delete">Delete</a></span>
                {{#if subShows}}
                <ul class="subGroup">
                    {{#each subShows}}
                    <li class="row listItem" id="{{show_id}}">
                        <span class="threecol col1">{{show_name}}</span>
                        <span class="threecol col2">{{show_city}}/span>
                        <span class="onecol col3">{{show_year}}</span>
                        <span class="threecol col5">{{show_url}}</span>
                        <span class=" col5"><a href="#" data-dialog="editShow" class="edit button">Edit</a><a href="#" class="button delete">Delete</a></span>
                    </li>
                    {{/each}}
                </ul>
                {{/if}}
            </li>
        {{/each}}
        </ul>                    
</script>
<?php include 'inc/scripts.php'; ?>
<script>
    $(document).ready(function(e) {
        GetListItems('show');
    });
</script>
<?php include 'inc/footer.php'; ?>