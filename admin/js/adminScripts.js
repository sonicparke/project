//ADMIN STUFF
(function  () {
	//CREATE THE ADD VENDOR FORM DIALOG
	$('#addVendor').on('click', function (e) {
		CreateFormDialog({
			popupContainer: '#addNewRecordPopup',
			title: 'Add New Vendor'
		})
		e.stopPropagation();
		e.preventDefault();
	})

	//CREATE THE EDIT VENDOR FORM DIALOG
	$('.editVendor').on('click', function (e) {
		var thisID = $(this).closest('li').attr('id');
		CreateFormDialog({
			popupContainer: '#addNewRecordPopup',
			title: 'Edit Vendor ' + thisID
		})
		e.stopPropagation();
		e.preventDefault();
	})

	//CREATE THE EDIT SHOW FORM DIALOG
	$('.editVendorProducts').on('click', function (e) {
		var thisID = $(this).closest('li').attr('id');
		CreateFormDialog({
			popupContainer: '#addNewRecordPopup',
			title: 'Edit Products for Vendor ' + thisID
		})
		e.stopPropagation();
		e.preventDefault();
	})

	//CREATE THE EDIT PRODUCT FORM DIALOG
	$('.editVendorShows').on('click', function (e) {
		var thisID = $(this).closest('li').attr('id');
		CreateFormDialog({
			popupContainer: '#addNewRecordPopup',
			title: 'Edit Shows for Vendor ' + thisID
		})
		e.stopPropagation();
		e.preventDefault();
	})

	//CREATE THE DELETE FORM DIALOG
	$('.delete').on('click', function (e) {
		var thisID = $(this).closest('li').attr('id');
		console.log('deleted');
		e.stopPropagation();
		e.preventDefault();
	})

})();

// CREATE FORM DIALOGS
function CreateFormDialog(params) {
		$(params.popupContainer).dialog({
			title: params.title,
			width: 640,
			modal: true,
			close: function(event, ui) { 
				$(this).find('input[type=textbox]').val('');
			}
		});
		$('.button[type=cancel]').on('click', function (e) {
			console.log('clicked close')
			$(params.popupContainer).dialog('close');
		})
};