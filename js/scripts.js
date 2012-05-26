// AUTOCOMPLETE STUFF
$(function () {
    "use strict";
    var i, id, ids;
    ids = ["showcity", "showname", "vendor", "companycity", "companystate", "companycountry", "product"];
    for (i = 0; i < ids.length; i++) {
        id = ids[i];
        // alert("Adding getoptions.php?category=" + id + " to #" + id);
        $("#" + id).autocomplete({
            source: "getoptions.php?category=" + id
        });
    }
});

// SLIDING FORM
(function  (params) {




	$('#submit').on('click', function (e) {
			$('.slide').animate({
				opacity: 'toggle',
				height: 'toggle'
			},
				150, function() {
					$('#openSearch').animate({
						opacity: 1
					});
			});
		e.preventDefault();
		e.stopPropagation();
	})


	$('#openSearch').on('click', function (e) {
			$('#openSearch').animate({
				opacity: 0
			}, 250);
			$('.slide').animate({
				opacity: 'toggle',
				height: 'toggle'
			},
				250, function() {
				
			});
		e.preventDefault();
		e.stopPropagation();
	})

	$("#searchResultsList li").on('click', function (e) {
		$this = $(this);
		var context = $this.closest('.container')
		var vendorID = $this.attr('id');
		var data = {
			name: vendorID
		}
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


function RenderTemplate (data, id) {
	var source = $("#" + id + "Template").html(); //GET THE HTML TEMPLATE
	var template = Handlebars.compile(source); //COMPILE THE TEMPLATE
	$("#" + id + "TemplateArea").html(template(data)); //ADD THE TEMPLATE TO THE TEMPATE AREA
}


// CROSSBROWSER PLACEHOLDER TEXT FOR TEXT INPUTS FROM http://bavotasan.com/2011/html5-placeholder-jquery-fix/
$(function() {
	var input = document.createElement("input");
    if(('placeholder' in input)==false) { 
		$('[placeholder]').focus(function() {
			var i = $(this);
			if(i.val() == i.attr('placeholder')) {
				i.val('').removeClass('placeholder');
				if(i.hasClass('password')) {
					i.removeClass('password');
					this.type='password';
				}			
			}
		}).blur(function() {
			var i = $(this);	
			if(i.val() == '' || i.val() == i.attr('placeholder')) {
				if(this.type=='password') {
					i.addClass('password');
					this.type='text';
				}
				i.addClass('placeholder').val(i.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var i = $(this);
				if(i.val() == i.attr('placeholder'))
					i.val('');
			})
		});
	}
});