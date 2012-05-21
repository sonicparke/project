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
	$(".vendorDetail" ).dialog({
			height: 140,
			modal: true
		});

})
	
})();




