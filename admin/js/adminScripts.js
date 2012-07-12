/*jslint devel: true, browser: true, white: false */
//ADMIN STUFF
function GetListItems(params) {
    "use strict";
    $.ajax({
        url: '../search/finalsearch.php?get_all=' + params,
        success: function (data) {
            new RenderTemplate(data, 'listRecords');
            new InitializeAdminFunctions();
            return false;
        },
        complete: function (data) {
            new Paginate("listRecordsTemplateArea > ul", 25);
        },
        error: function (data) {
            alert('error');
        }
    });
}

//ADD THE JQUERY UI DATEPICKER
$('.datepicker input').datepicker();

// PAGINATION FUNCTION
function Paginate(elem, pp) {
    "use strict";
    $("div.pagination").jPages({
        containerID: elem,
        perPage: pp,
        first: "first",
        last: "last"
    });
}

function PaginatePopups(elem, pp) {
    "use strict";
    var paginationDiv = '#' + elem + 'Popup div.pagination';
    var containerID = elem + 'List';
    $(paginationDiv).jPages({
        containerID: containerID,
        perPage: pp,
        first: "first",
        last: "last"
    });
}

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
        if (dataDialog === 'editProduct') {
            thisRecordID = $this.closest("li").attr("id");
            if (recordType === 'product') {
                var data = {product_name: thisValue};
                new CreateFormDialog({
                        popupContainer: dataDialog + "Popup",
                        title: "Edit product " + thisRecordID,
                        value: thisValue,
                        id: thisRecordID,
                        action: 'update',
                        recordType: recordType,
                        useTemplate: true,
                        data: data,
                        url: "edit.php?action=update&category=" + recordType
                    });
            } else {
                $.ajax({
                    url: '../search/finalsearch.php?get_all=product&vendor_id=' + thisRecordID,
                    success: function (data) {
                        new CreateFormDialog({
                            popupContainer: dataDialog + "Popup",
                            title: "Edit products for " + recordType + " " + thisRecordID,
                            value: thisValue,
                            id: thisRecordID,
                            action: 'update',
                            recordType: recordType,
                            useTemplate: true,
                            data: data,
                            url: "edit.php?action=update&category=" + recordType
                        });
                    },
                    complete: function (data) {
                        new PaginatePopups("editProduct", 10);
                    },
                    error: function (data) {
                        alert('error');
                    }
                });
            }
        } 
        else if (recordType === 'vendor' && dataDialog === 'editShow') {
            thisRecordID = $this.closest("li").attr("id");
            $.ajax({
                url: '../search/finalsearch.php?get_all=show&vendor_id=' + thisRecordID,
                success: function (data) {
                    new CreateFormDialog({
                        popupContainer: dataDialog + "Popup",
                        title: "Edit shows for " + recordType + " " + thisRecordID,
                        value: thisValue,
                        id: thisRecordID,
                        action: 'update',
                        recordType: recordType,
                        useTemplate: true,
                        data: data,
                        url: "edit.php?action=update&category=" + recordType
                    });
                },
                complete: function (data) {
                    new PaginatePopups("editShow", 10);
                },
                error: function (data) {
                    alert('error');
                }
            });
        } else {
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
                        data: data,
                        url: "edit.php?action=update&category=" + recordType
                    });
                },
                complete: function (data) {
                    // new Paginate("listRecordsTemplateArea > ul", 25);
                },
                error: function (data) {
                    alert('error');
                }
            });
        }
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
                recordType: recordType,
                useTemplate: false,
                url: "edit.php?action=create&category=" + recordType
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
        // console.log(params)
        $("#" + params.popupContainer).dialog({
            title: params.title,
            width: 640,
            modal: true,
            open: function (event, ui) { 
                if (params.useTemplate === true) {
                    new RenderTemplate(params.data, params.popupContainer);
                    
                    if (recordType === 'vendor' && dataDialog === 'editVendor') {
                        $(this).find('select[name=vendor_level]').val(params.data.items[0].vendor_level);
                        $("#" + params.popupContainer).geoSelector();
                    }
                    
                } else {
                    return false;
                }
            },
            close: function (event, ui) {
                $(this).find("input[type=textbox]").val("");
            }
        });
        $(".button[name=cancel]").on("click", function (e) {
            $("#" + params.popupContainer).dialog("close").find("select").val("1");
            e.stopPropagation();
            e.preventDefault();
        });
        $('.button[name=submit]').on('click.SubmitRecord', function (e) {
            var url;
            var formData;
            var idArray = [];
            var checkbox;
            if (recordType === 'vendor' && dataDialog === 'editProduct') {
                checkbox = $(this).closest('form').find('input[type=checkbox]');
                $.each(checkbox, function () {
                    if ($(this).prop('checked')) {
                        var vendor_product_id = "&vendor_product_id%5B%5D=" + $(this).attr('id').slice(7);
                        idArray.push(vendor_product_id);
                    }
                });
                url = params.url + "&vendor_id=" + params.id + idArray.join(""); // APPEND THE PRODUCT-ID STRING HERE.
            }
            else if (recordType === 'product' && dataDialog === 'editProduct') {
                var newValue = $(this).closest('form').serialize();
                url = params.url + '&product_id=' + params.id + '&' + newValue; // APPEND THE PRODUCT-ID STRING HERE.
            }
            else if (recordType === 'vendor' && dataDialog === 'editShow') {
                url = [];
                checkbox = $(this).closest('form').find('input[type=checkbox]');
                $.each(checkbox, function () {
                    if ($(this).prop('checked')) {
                        var thisID = $(this).attr('id');
                        var boothNumber = $('input[name=' + thisID + "_booth]").val();
                        var vendor_show_id = "&vendor_show_id%5B" + $(this).attr('id').slice(4) + "%5D=" + boothNumber;
                        idArray.push(vendor_show_id);
                    }
                });
                url = params.url + "&vendor_id=" + params.id + idArray.join("");
            }
            else {
                formData = $('#' + params.popupContainer + ' form').serialize();
                url = params.url + "&vendor_id=" + params.id + "&" + formData;
            }
            
            $.ajax({
                url: url,
                success: function (data) {
                    $("#" + params.popupContainer).dialog("close");
                    new GetListItems(params.recordType);
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
    "use strict";
    var source, template;
    source = $("#" + id + "Template").html(); //GET THE HTML TEMPLATE
    template = Handlebars.compile(source); //COMPILE THE TEMPLATE
    $("#" + id + "TemplateArea").html(template(data)); //ADD THE TEMPLATE TO THE TEMPATE AREA
}


// JQUERY GEOSELECTOR FROM https://github.com/LawnGnome/jQuery-geoselector
(function ($) {
    "use strict";
    $.fn.geoSelector = function (options) {
        var settings = $.extend({
            countrySelector: "*[data-type='country']",
            stateSelector: "*[data-type='state']",
            data: "../../js/divisions.json",
            defaultCountry: "United States"
            // defaultState: "Western Australia",
        }, options);

        var countries = $(settings.countrySelector, this);
        var states = $(settings.stateSelector, this);

        if (countries.length !== 1) {
            throw "Unexpected number of country selectors";
        }

        if (states.length !== 1) {
            throw "Unexpected number of state selectors";
        }

        $.getJSON(settings.data, function (data) {
            var country = $("<select />").attr({"data-type": countries.attr("data-type"), "name": countries.attr("name")});
            var state = $("<select />").attr({"data-type": states.attr("data-type"), "name": states.attr("name")});

            $.each(data.countries, function (code, name) {
                var option = $("<option />").text(name).attr("code", code).appendTo(country);

                if (settings.defaultCountry === name) {
                    option.attr("selected", "selected");
                }
            });

            var updateStates = function (code, def) {
                state.empty();
                if (data.divisions[code] && data.divisions[code].length) {
                    $.each(data.divisions[code], function (i, name) {
                        var option = $("<option />").text(name).appendTo(state);

                        if (def === name) {
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