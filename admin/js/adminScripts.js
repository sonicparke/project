//ADMIN STUFF
(function  () {

	//VENDORS PAGE
		// var recordType = 'vendor'
		// var recordType = $('div.wrapperContent').attr('title');
		var recordType = $('body').attr('id');
		$('#' + recordType + ' .addNewRecord').on('click', function (e) {
			CreateFormDialog({
				popupContainer: '#addNewRecordPopup',
				title: 'Add New ' + recordType
			});
			e.stopPropagation();
			e.preventDefault();
		});


		$('.edit').on('click', function (e) {
			var thisID = $(this).closest('li').attr('id');
			CreateFormDialog({
				popupContainer: '#addNewRecordPopup',
				title: 'Edit ' + recordType + ' ' + thisID
			});
			e.stopPropagation();
			e.preventDefault();
		});

		//CREATE THE EDIT VENDOR FORM DIALOG
		$('.editVendor').on('click', function (e) {
			var thisID = $(this).closest('li').attr('id');
			CreateFormDialog({
				popupContainer: '#addNewRecordPopup',
				title: 'Edit Vendor ' + thisID
			});
			e.stopPropagation();
			e.preventDefault();
		});

		//CREATE THE EDIT PRODUCT FORM DIALOG
		$('.editVendorProducts').on('click', function (e) {
			var thisID = $(this).closest('li').attr('id');
			CreateFormDialog({
				popupContainer: '#addNewRecordPopup',
				title: 'Edit Products for Vendor ' + thisID
			});
			e.stopPropagation();
			e.preventDefault();
		});

		//CREATE THE EDIT SHOW FORM DIALOG
		$('.editVendorShows').on('click', function (e) {
			var thisID = $(this).closest('li').attr('id');
			CreateFormDialog({
				popupContainer: '#addNewRecordPopup',
				title: 'Edit Shows for Vendor ' + thisID
			});
			e.stopPropagation();
			e.preventDefault();
		});







	//CREATE THE DELETE FORM DIALOG
	$('.delete').on('click', function (e) {
		var thisID = $(this).closest('li').attr('id');
		$('body').append('<div class="warning hidden"><p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This item will be <strong>permanently deleted</strong> and cannot be recovered. Are you sure?</p></div>');
		$('.warning').dialog({
			title: 'Warning!',
			resizable: false,
			// height:140,
			width: 350,
			modal: true,
			buttons: {
				"Delete Item": function() {
					$( this ).dialog( "close" );
					$('#' + thisID).remove();
					console.log('deleted ' + recordType + ': ', thisID );
					$(this).remove();
				},
				Cancel: function() {
					$( this ).dialog( "close" );
					$(this).remove();
				}
			}

		});
		e.stopPropagation();
		e.preventDefault();
	});

	//ADD THE JQUERY UI DATEPICKER
	$('.datepicker input').datepicker();

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
			console.log('clicked close');
			$(params.popupContainer).dialog('close').find('select').val('1');
		});
}