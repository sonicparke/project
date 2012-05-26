//ADMIN STUFF
(function  () {
	//CREATE THE ADD VENDOR FORM DIALOG
	CreateFormDialog({
        trigger: '#addVendor',
        popupContainer: '#addNewRecordPopup',
        title: 'Add New Vendor'
    });
	//CREATE THE EDIT VENDOR FORM DIALOG
	CreateFormDialog({
        trigger: '.listItem' + id,
        popupContainer: '#addNewRecordPopup',
        title: 'Edit Vendor'
    });

})();

// CREATE FORM DIALOGS
function CreateFormDialog(params) {
	// CREATE NEW VENDOR CLICK EVENT
	$(params.trigger).on('click', function (e) {
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
	})
};