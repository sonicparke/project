// AUTOCOMPLETE STUFF
    var show_id;
    var show_city;
    var show_name;
    var vendor_id;
    var vendor_name;
    var vendor_city;
    var vendor_state;
    var vendor_country;
    var product_id;
    var product_name;

$(function () {
    "use strict";
    var i, id, ids;
    ids = ["show_city", "show_name", "vendor_name", "vendor_city", "vendor_state", "vendor_country", "product_name"];
    for (i = 0; i < ids.length; i++) {
        id = ids[i];
        // alert("Adding search/ajaxsearch.php?field=" + id);
        $("#" + id).autocomplete({
            source: "search/ajaxsearch.php?field=" + id,
            minLength: 2,
            select: function (event, ui) {
                var inputID = "#" + $(this).attr('id');
                $(inputID).parent().nextUntil('.formGroup').addClass('disabled');
                $(inputID).val(ui.item.label);
                DisableFields();
            }
        });
    }
});


// RENDER THE TEMPLATES
function RenderTemplate(data, id) {
    var source, template;
    source = $("#" + id + "Template").html(); //GET THE HTML TEMPLATE
    template = Handlebars.compile(source); //COMPILE THE TEMPLATE
    $("#" + id + "TemplateArea").html(template(data)); //ADD THE TEMPLATE TO THE TEMPATE AREA
}

function DisableFields() {
    "use strict";
    $('input[type=textbox]').focus(function (argument) {
        var inputID = "#" + $(this).attr('id');
        if (inputID === '#vendor_name') {
            $(inputID).parent().nextUntil('.formGroup').addClass('disabled');
            $('li.disabled input[type=textbox]').attr('disabled', 'disabled');
            $(inputID).blur(function (e) {
                if ($(this).val() === '') {
                    $(this).closest('.formGroup').children('li').removeClass('disabled').find('input[type=textbox]').removeAttr('disabled');
                } else {
                    return;
                }
            });

        } else {
            return;
        }
    });
}

// SLIDING FORM
(function (params) {
    $('#submit').on('click', function (e) {
        // var dataToBeSent = decodeURIComponent($('form').serialize());
        var dataToBeSent = $('form').serialize();
        var url = "search/finalsearch.php?" + dataToBeSent;
        e.preventDefault();
        e.stopPropagation();
        $.ajax({
            url: "search/finalsearch.php?" + dataToBeSent,
            success: function (data) {
                var items = data.items; 
                if(items.length){
                    RenderTemplate(data, 'searchResults');
                    console.log('items.length: ', items)
                    CreateVendorDetailClickEvent(items);
                    $('.slide').animate({
                        opacity: 'toggle',
                        height: 'toggle'
                    }, 150, function () {
                        $('#openSearch').animate({
                            opacity: 1
                        });
                    });

                } else {
                    ErrorAlert('Please try your search again. You may need to be less specific.', '.slide')
                }

                return false;
            },
            complete: function (data) {

            },
            error: function (data) {
                alert(data)
            }

        });

        
        e.preventDefault();
        e.stopPropagation();
    });

    $('#openSearch').on('click', function (e) {
        $('#openSearch').animate({
            opacity: 0
        }, 250);
        $('.slide').animate({
            opacity: 'toggle',
            height: 'toggle'
        }, 250, function () {
        });
        e.preventDefault();
        e.stopPropagation();
    });

    // POPUP THE DIALOG BOX FOR THE VENDOR DETAIL
    function CreateVendorDetailClickEvent(data) {
        $("#searchResultsList").on('click', 'li', function (e) {
            var $this, context, vendorID;
            $this = $(this);
            // context = $this.closest('.container');
            vendorID = $this.attr('id');
            // Render Handlebars Template
            RenderTemplate(data, 'vendorDetail');
            $(".vendorDetail" ).dialog({
                // height: 140,
                modal: true,
                close: function(event, ui) {
                    $("#vendorDetailTemplateArea").empty();
                    $(".vendorDetail").remove();
                }
            });
        })
    }
    

    // REMOVE THE DISABLE FROM INPUTS ON RESET
    $('#reset').on('click', function (e) {
        $('.formGroup li').removeClass('disabled').find('input[type=textbox]').removeAttr('disabled');
    })

})();

// PAGINATION FUNCTION
function Paginate(elem, pp) {
    $("div.pagination").jPages({
        containerID: elem,
        perPage: pp,
        first: "first",
        last: "last"
    });
};

// CROSSBROWSER PLACEHOLDER TEXT FOR TEXT INPUTS FROM http://bavotasan.com/2011/html5-placeholder-jquery-fix/
$(function() {
    var input = document.createElement("input");
    if (('placeholder' in input)==false) {
        $('[placeholder]').focus(function() {
            var i = $(this);
            if (i.val() == i.attr('placeholder')) {
                i.val('').removeClass('placeholder');
                if (i.hasClass('password')) {
                    i.removeClass('password');
                    this.type='password';
                }
            }
        }).blur(function() {
            var i = $(this);
            if (i.val() == '' || i.val() == i.attr('placeholder')) {
                if (this.type=='password') {
                    i.addClass('password');
                    this.type='text';
                }
                i.addClass('placeholder').val(i.attr('placeholder'));
            }
        }).blur().parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var i = $(this);
                if (i.val() == i.attr('placeholder'))
                    i.val('');
            })
                });
    }
});

/***** ERROR ALERT *****/
function ErrorAlert(d, element) {
    var alertHTML = '<div id="alert" class="alert" style="display: none; "><img src="images/icn-alert.png" /><h2 style="opacity: 0; ">' + d + '</h2></div>';
    $(element).prepend(alertHTML);
    var errorID = '#alert';
    var error = $(errorID);
    if($('#alert').is(":visible")){
        return
    } else {
        error.slideDown('fast', function () {
            // $(this).html('<h2>' + d + '</h2>');
            $(this).children().animate({opacity: '1'}, 'fast')
            .delay('2600').animate({opacity: '0'}, 'fast');
        })
            .delay('3000')
            .slideUp('fast', function () {
            $(this).remove();
        });     
    }
};