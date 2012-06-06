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
            // source: "ajaxsearch.php?category=" + show + "&field=" + name + "&term="
            minLength: 2,
            select: function (event, ui) {
                var inputID = "#" + $(this).attr('id');
                $(inputID).parent().nextUntil('.formGroup').addClass('disabled');
                $(inputID).val(ui.item.label);
                console.log(ui)
                DisableFields();
                // log( ui.item ?
                //  "Selected: " + ui.item.value + " aka " + ui.item.id :
                //  "Nothing selected, input was " + this.value );
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
    console.log("this555: ",this)
    "use strict";
    $('input[type=textbox]').focus(function (argument) {
        var inputID = "#" + $(this).attr('id');
        if (inputID === '#vendor_name') {
            $(inputID).parent().nextUntil('.formGroup').addClass('disabled');
            $('li.disabled input[type=textbox]').attr('disabled', 'disabled');
            $(inputID).blur(function (e) {
                if ($(this).val() === '') {
                    $(this).closest('.formGroup').children('li').removeClass('disabled').find('input[type=textbox]').removeAttr('disabled');
                    console.log("this: ",this)
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
    

    // $(function () {
    //  $('form li').geoSelector();
    // });

    $('#submit').on('click', function (e) {
        var dataToBeSent = decodeURIComponent($('form').serialize());
        var url = "search/finalsearch.php?" + dataToBeSent;
        console.log(url)
        e.preventDefault();
        e.stopPropagation();

    
    

        $.ajax({
            url: "search/finalsearch.php?" + dataToBeSent,
            success: function (data) {
                if(data.length){
                    RenderTemplate(data, 'searchResults');
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
    $("#searchResultsList li").on('click', function (e) {
        var $this, context, vendorID, data;
        $this = $(this);
        context = $this.closest('.container');
        vendorID = $this.attr('id');
        data = {
            name: vendorID
        };
        // Render Handlebars Template
        RenderTemplate(data, 'vendorDetail');
        $(".vendorDetail" ).dialog({
            height: 140,
            modal: true,
            close: function(event, ui) {
                $("#vendorDetailTemplateArea").empty();
                $(".vendorDetail").remove();
            }
        });
    })

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


// JQUERY GEOSELECTOR FROM https://github.com/LawnGnome/jQuery-geoselector
// (function ($) {
//  $.fn.geoSelector = function (options) {
//    var settings = $.extend({
//      countrySelector: "*[name='country']",
//      stateSelector: "*[name='state']",
//      data: "../js/divisions.json",
//      // data: '',
//      defaultCountry: "Australia",
//      defaultState: "Western Australia",
//    }, options);

//    var countries = $(settings.countrySelector, this);
//    var states = $(settings.stateSelector, this);

//    if (countries.length != 1) {
//      throw "Unexpected number of country selectors";
//    }

//    if (states.length != 1) {
//      throw "Unexpected number of state selectors";
//    }

//    $.getJSON(settings.data, function (data) {
//      var country = $("<select />").attr("name", countries.attr("name"));
//      var state = $("<select />").attr("name", states.attr("name"));

//      $.each(data.countries, function (code, name) {
//        var option = $("<option />").text(name).attr("code", code).appendTo(country);

//        if (settings.defaultCountry == name) {
//          option.attr("selected", "selected");
//        }
//      });

//      var updateStates = function (code, def) {
//        state.empty();
//        if (data.divisions[code] && data.divisions[code].length) {
//          $.each(data.divisions[code], function (i, name) {
//            var option = $("<option />").text(name).appendTo(state);

//            if (def == name) {
//              option.attr("selected", "selected");
//            }
//          });
//        } else {
//          $("<option />").text(" ").appendTo(state);
//        }
//      };

//      countries.replaceWith(country);
//      states.replaceWith(state);
//      updateStates($("option:selected", country).attr("code"), settings.defaultState);

//      country.change(function () {
//        updateStates($("option:selected", this).attr("code"));
//        return true;
//      });
//    });
//  };
// })(jQuery);
