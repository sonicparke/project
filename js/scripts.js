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




	// $('#submit, #toggleSlide').on('click', function (e) {
	// 	$('.searchForm form').not('#submit').animate({
	// 		opacity: 'toggle',
	// 		height: 'toggle'
	// 	},
	// 		1000, function() {
	// 		// stuff to do after animation is complete
	// 	});
	// })

$(".listItem").on('click', function (e) {
	$this = $(this);
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


function RenderTemplate (data, id) {
	var source = $("#" + id + "Template").html(); //GET THE HTML TEMPLATE
	var template = Handlebars.compile(source); //COMPILE THE TEMPLATE
	$("#" + id + "TemplateArea").html(template(data)); //ADD THE TEMPLATE TO THE TEMPATE AREA
}


