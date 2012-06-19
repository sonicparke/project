<?php include 'inc/header.php'; ?>
    <div id="show" class="wrapperContent admin">

        <div class="container">
                <a id="addNewShow" data-dialog="editShow" class="button addNew" href="#">Add New Show</a>
                <div class="pagination"></div>
                <div id="listRecordsTemplateArea" class="listRecords"></div>
                <div class="pagination"></div>
            </div>






        <div id="editShowPopup" class="container hidden row">
            <form>
                    <ul class="formGroup sixcol shows">
                        <li>
                            <label for="show_name">Show Name</label><input type="textbox" name="show_name" id="showName" />
                        </li>
                        <li class="datepicker">
                           <!-- <label for="showStartDate">Dates</label><span><label for="showStartDate">Start</label><input type="textbox" id="showStartDate" /></span><span><label for="showEndDate">End</label><input type="textbox" id="showEndDate" /></span> -->
                           <label for="show_start_date">Dates</label><input  placeholder="Start" type="textbox" name="show_start_date" id="show_start_date" /><input placeholder="End" type="textbox"  name="show_end_date" id="show_end_date" />
                        </li>
                        <li>
                            <label for="show_hours">Hours</label><input type="textbox" name="show_hours" id="showHours" />
                        </li>
                        <li>
                            <label for="show_contact_name">Contact Name</label><input type="textbox" name="show_contact_name" id="show_contact_name" />
                        </li>
                        <li>
                            <label for="show_address">Address</label><input type="textbox" name="show_address" id="show_address" />
                        </li>
                        <li>
                            <label for="show_city">City</label><input type="textbox" name="show_city" id="show_city" />
                        </li>
                        <li>
                            <label for="show_state">State</label><input data-type="state" name="show_state" type="textbox" id="show_state" />
                        </li>
                        <li>
                            <label for="show_zip">Zip</label><input type="textbox" name="show_zip" id="show_zip" />
                        </li>
                        <li>
                            <label for="show_country">Country</label><input data-type="country" name="show_country" type="textbox" id="show_country" />
                        </li>
                        <li>
                            <label for="show_phone">Phone</label><input type="textbox" name="show_phone" id="show_phone" />
                        </li>
                        <li>
                            <label for="show_fax">Fax</label><input type="textbox" name="show_fax" id="show_fax" />
                        </li>
                        <li>
                            <label for="show_email">Email</label><input type="textbox" name="show_email" id="show_email" />
                        </li>
                        <li>
                            <label for="show_url">Link</label><input type="textbox" name="show_url" id="show_url" />
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
                <span class="threecol col1">Show Name</span>
                <span class="onecol col2">City</span>
                <span class="onecol col3">Start Date</span>
                <span class="onecol col4">End Date</span>
                <span class="threecol col5">URL to Show Page</span>
                <span class=" col5">Manage Show Details</span>
            </h2>
            <ul class="shows">
            {{#each items}}
                <li class="row listItem hasSubGroup" id="{{show_id}}">
                    <span class="threecol col1">{{show_name}}</span>
                    <span class="onecol col2">{{show_city}}</span>
                    <span class="onecol col3">{{show_start_date}}</span>
                    <span class="onecol col4">{{show_end_date}}</span>
                    <span class="threecol col5">{{show_url}}</span>
                    <span class="col5"><a href="#" data-dialog="editShow" class="edit button">Edit</a><a href="#" class="button delete">Delete</a></span>
                    {{#if subShows}}
                    <ul class="subGroup">
                        {{#each subShows}}
                        <li class="row listItem" id="{{show_id}}">
                            <span class="threecol col1">{{show_name}}</span>
                            <span class="onecol col2">{{show_city}}/span>
                            <span class="onecol col3">{{show_start_date}}</span>
                            <span class="onecol col4">{{show_end_date}}</span>
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
            $('form li').geoSelector();
        });
    </script>
<?php include 'inc/footer.php'; ?>
