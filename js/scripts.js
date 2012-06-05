// AUTOCOMPLETE STUFF
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
                // log( ui.item ?
                //  "Selected: " + ui.item.value + " aka " + ui.item.id :
                //  "Nothing selected, input was " + this.value );
            }
        });
    }
});

var ids = [{
    name: "show_city",
    category: "show",
    field: "city"
}, {
    name: "show_name",
    category: "show",
    field: "name"
}];

// RENDER THE TEMPLATES
function RenderTemplate(data, id) {
    var source, template;
    source = $("#" + id + "Template").html(); //GET THE HTML TEMPLATE
    template = Handlebars.compile(source); //COMPILE THE TEMPLATE
    $("#" + id + "TemplateArea").html(template(data)); //ADD THE TEMPLATE TO THE TEMPATE AREA
}

// SLIDING FORM
(function (params) {
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

    // $(function () {
    //  $('form li').geoSelector();
    // });

    $('#submit').on('click', function (e) {
        $('.slide').animate({
            opacity: 'toggle',
            height: 'toggle'
        }, 150, function () {
            $('#openSearch').animate({
                opacity: 1
            });
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
    console.log('pagination generated')
    console.log(elem, pp)
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
