"use strict";
var KTDatatablesExtensionButtons = function() {

	var initTable1 = function() {

		// begin first table
		var table = $('#kt_table_1').DataTable({
			ordering: false,
			responsive: true,
		// Pagination settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			buttons: [
				'print',
				'copyHtml5',
				{ extend: 'excelHtml5', extension: '.zip' },
				'csvHtml5',
				'pdfHtml5',
				'colvis',
			],
			columnDefs: [
			{
				targets: [0],
				visible: false
			},
			{
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							
							approved: {'title': 'approved', 'class': ' kt-badge--warning'},
							mitigated: {'title': 'mitigated', 'class': ' kt-badge--warning'},
							Mitigated: {'title': 'Mitigated', 'class': ' kt-badge--warning'},
							reviewed: {'title': 'reviewed', 'class': ' kt-badge--success'},
							Reviewed: {'title': 'Reviewed', 'class': ' kt-badge--success'},
							// 7: {'title': 'Warning', 'class': ' kt-badge--warning'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: 6,
					render: function(data, type, full, meta) {
						var status = {
							Create: {'title': 'Create', 'class': 'kt-badge--danger'},
							create: {'title': 'Create', 'class': 'kt-badge--danger'},
							prepared: {'title': 'prepared', 'class': ' kt-badge--primary'},
							performed: {'title': 'performed', 'class': ' kt-badge--success'},
							approved: {'title': 'approved', 'class': ' kt-badge--warning'},
							mitigated: {'title': 'mitigated', 'class': ' kt-badge--warning'},
							Mitigated: {'title': 'Mitigated', 'class': ' kt-badge--warning'},
							reviewed: {'title': 'reviewed', 'class': ' kt-badge--success'},
							Reviewed: {'title': 'Reviewed', 'class': ' kt-badge--success'},
							identified: {'title': 'Identified', 'class': ' kt-badge--warning'},
							assessed: {'title': 'Assessed', 'class': ' kt-badge--primary'},
							Closed: {'title': 'Closed', 'class': ' kt-badge--primary'},
							Recorded: {'title': 'Recorded', 'class': 'kt-badge--danger'},
							Resolved: {'title': 'Resolved', 'class': ' kt-badge--success'},
							Assigned: {'title': 'Assigned', 'class': ' kt-badge--warning'},
							training: {'title': 'Training', 'class': ' kt-badge--primary'},
							tested: {'title': 'Tested', 'class': ' kt-badge--success'},
							trained: {'title': 'Trained', 'class': ' kt-badge--warning'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: 7,
					render: function(data, type, full, meta) {
						var status = {
						
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
							'<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
					},
				},
			],
		});
           new $.fn.dataTable.FixedHeader( table )
	};

	var initTable2 = function() {

		// begin first table
		var table = $('#kt_table_2').DataTable({
			responsive: true,
			
			buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			],
			processing: true,
			serverSide: true,
			ajax: {
				url: 'https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/server.php',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'OrderID', 'Country', 'ShipCity',
						'ShipAddress', 'CompanyAgent', 'CompanyName', 'Status', 'Type',],
				},
			},
			columns: [
				{data: 'OrderID'},
				{data: 'Country'},
				{data: 'ShipCity'},
				{data: 'ShipAddress'},
				{data: 'CompanyAgent'},
				{data: 'CompanyName'},
				{data: 'Status'},
				{data: 'Type'},
			],
			columnDefs: [
				{
					targets: 6,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Pending', 'class': 'kt-badge--brand'},
							2: {'title': 'Delivered', 'class': ' kt-badge--danger'},
							3: {'title': 'Canceled', 'class': ' kt-badge--primary'},
							4: {'title': 'Success', 'class': ' kt-badge--success'},
							5: {'title': 'Info', 'class': ' kt-badge--info'},
							6: {'title': 'Danger', 'class': ' kt-badge--danger'},
							7: {'title': 'Warning', 'class': ' kt-badge--warning'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},
				{
					targets: 7,
					render: function(data, type, full, meta) {
						var status = {
							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
							'<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
					},
				},
			],
		});

		$('#export_print').on('click', function(e) {
			e.preventDefault();
			table.button(0).trigger();
		});

		$('#export_copy').on('click', function(e) {
			e.preventDefault();
			table.button(1).trigger();
		});

		$('#export_excel').on('click', function(e) {
			e.preventDefault();
			table.button(2).trigger();
		});

		$('#export_csv').on('click', function(e) {
			e.preventDefault();
			table.button(3).trigger();
		});

		$('#export_pdf').on('click', function(e) {
			e.preventDefault();
			table.button(4).trigger();
		});

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
			initTable2();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesExtensionButtons.init();
});