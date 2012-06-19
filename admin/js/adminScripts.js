/*jslint devel: true, browser: true, white: false */
//ADMIN STUFF
function GetListItems (params) {
    "use strict";
    $.ajax({
        url: '../search/finalsearch.php?get_all=' + params,
        success: function (data) {
            RenderTemplate(data, 'listRecords');
            InitializeAdminFunctions();
            return false;
        },
        complete: function (data) {
            new Paginate("listRecordsTemplateArea > ul", 25);
        },
        error: function (data) {
            alert('error');
        }
    });
};

//ADD THE JQUERY UI DATEPICKER
$('.datepicker input').datepicker();

// PAGINATION FUNCTION
function Paginate(elem, pp) {
    $("div.pagination").jPages({
        containerID: elem,
        perPage: pp,
        first: "first",
        last: "last"
    });
};

function InitializeAdminFunctions() {
    "use strict";
    var $this;
    var recordType;
    var dataDialog;
    var thisID;
    var thisRecordID;
    var thisValue;

    //CREATE THE EDIT VENDOR PRODUCTS FORM DIALOG
    $(".edit").on("click", function (e) {
        $this = $(this);
        recordType = $(".wrapperContent.admin").attr("id");
        dataDialog = $this.attr("data-dialog");
        thisID = $this.attr("id");
        thisRecordID = $this.closest("li").attr("id");
        thisValue = $('#' + thisRecordID).find('span.col1').text();
        $.ajax({
            url: '../search/finalsearch.php?' + recordType + '_id=' + thisRecordID,
            success: function (data) {
                new CreateFormDialog({
                    popupContainer: dataDialog + "Popup",
                    title: "Edit " + recordType + " " + thisRecordID,
                    value: thisValue,
                    id: thisRecordID,
                    action: 'update',
                    recordType: recordType,
                    useTemplate: true,
                    data: data
                });
                return false;
            },
            complete: function (data) {
                new Paginate("listRecordsTemplateArea > ul", 25);
            },
            error: function (data) {
                alert('error');
            }
        });
        
        e.stopPropagation();
        e.preventDefault(); 
    });

    $(".addNew").on("click", function (e) {
        $this = $(this);
        recordType = $(".wrapperContent.admin").attr("id");
        dataDialog = $this.attr("data-dialog");
        thisID = $this.attr("id");
        thisRecordID = $this.closest("li").attr("id");
        thisValue = $('#' + thisRecordID).find('span.col1').text();
        new CreateFormDialog({
                popupContainer: dataDialog + "Popup",
                title: "Add new " + recordType,
                value: thisValue,
                id: thisRecordID,
                action: 'create',
                recordType: recordType
            });
        e.stopPropagation();
        e.preventDefault(); 
    });

    //CREATE THE DELETE FORM DIALOG
    $(".delete").on("click", function (e) {
        var btnHTML;
        recordType = $(".wrapperContent.admin").attr("id");
        thisRecordID = $(this).closest("li").attr("id");
        btnHTML = "<div class=\"warning hidden\"><p><span class=\"ui-icon ui-icon-alert\" style=\"float:left; margin:0 7px 20px 0;\"></span>This item will be <strong>permanently deleted</strong> and cannot be recovered. Are you sure?</p></div>";
        $("body").append(btnHTML);
        $(".warning").dialog({
            title: "Warning!",
            resizable: false,
            // height:140,
            width: 350,
            modal: true,
            buttons: {
                "Delete Item": function () {
                    $(this).dialog("close");
                    $("#" + thisRecordID).remove();
                    $(this).remove();
                    var url = "edit.php?action=delete&category=" + recordType + "&" + recordType + "_id=" + thisRecordID;
                    $.ajax({
                        url: url,
                        success: function (data) {
                            return false;
                        },
                        complete: function (data) {
                        },
                        error: function (data) {
                            alert(data);
                        }
                    });
                    $("#listRecordsTemplateArea ul").jPages("destroy");
                    new Paginate("listRecordsTemplateArea > ul", 25);
                },
                Cancel: function () {
                    $(this).dialog("close");
                    $(this).remove();
                }
            }

        });
        e.stopPropagation();
        e.preventDefault();
    });


    

    // CREATE FORM DIALOGS
    function CreateFormDialog(params) {

        $("#" + params.popupContainer).dialog({
            title: params.title,
            width: 640,
            modal: true,
            open: function(event, ui) { 
                if(params.useTemplate === true){
                    RenderTemplate(params.data, params.popupContainer);
                } else {
                    return
                }
            },
            close: function (event, ui) {
                $(this).find("input[type=textbox]").val("");
            }
        });
        $(".button[type=cancel]").on("click", function (e) {
            $("#" + params.popupContainer).dialog("close").find("select").val("1");
        });
        $('#submit').on('click.SubmitRecord', function (e) {
            var dataToBeSent = $('form').serialize();
            var url = "edit.php?action=" + params.action + "&category=" + params.recordType + "&" + dataToBeSent;
            $.ajax({
                url: url,
                success: function (data) {
                    $("#" + params.popupContainer).dialog("close");
                    GetListItems(params.recordType);
                    return false;
                },
                complete: function (data) {
                    $('#submit').unbind('click.SubmitRecord');
                },
                error: function (data) {
                    alert(data);
                }
            });
            
            e.stopPropagation();
            e.preventDefault();
        });
    }
}

function RenderTemplate(data, id) {
    var source, template;
    source = $("#" + id + "Template").html(); //GET THE HTML TEMPLATE
    template = Handlebars.compile(source); //COMPILE THE TEMPLATE
    $("#" + id + "TemplateArea").html(template(data)); //ADD THE TEMPLATE TO THE TEMPATE AREA
}


// JQUERY GEOSELECTOR FROM https://github.com/LawnGnome/jQuery-geoselector
(function ($) {
 $.fn.geoSelector = function (options) {
   var settings = $.extend({
     countrySelector: "*[data-type='country']",
     stateSelector: "*[data-type='state']",
     data: "../../js/divisions.json",
     // data: '',
     defaultCountry: "United States",
     // defaultState: "Western Australia",
   }, options);

   var countries = $(settings.countrySelector, this);
   var states = $(settings.stateSelector, this);

   if (countries.length != 1) {
     throw "Unexpected number of country selectors";
   }

   if (states.length != 1) {
     throw "Unexpected number of state selectors";
   }

   $.getJSON(settings.data, function (data) {
     var country = $("<select />").attr("data-type", countries.attr("data-type"));
     var state = $("<select />").attr("data-type", states.attr("data-type"));

     $.each(data.countries, function (code, name) {
       var option = $("<option />").text(name).attr("code", code).appendTo(country);

       if (settings.defaultCountry == name) {
         option.attr("selected", "selected");
       }
     });

     var updateStates = function (code, def) {
       state.empty();
       if (data.divisions[code] && data.divisions[code].length) {
         $.each(data.divisions[code], function (i, name) {
           var option = $("<option />").text(name).appendTo(state);

           if (def == name) {
             option.attr("selected", "selected");
           }
         });
       } else {
         $("<option />").text(" ").appendTo(state);
       }
     };

     countries.replaceWith(country);
     states.replaceWith(state);
     updateStates($("option:selected", country).attr("code"), settings.defaultState);

     country.change(function () {
       updateStates($("option:selected", this).attr("code"));
       return true;
     });
   });
 };
})(jQuery);
