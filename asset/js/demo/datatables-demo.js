// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});


//$(document).ready(function() {
//  $('table.datapenjualan').DataTable({
//    "iDisplayLength": -1,
//    "aaSorting": [[1, 'asc']]
//  }) ;
//});

$(document).ready(function() {
 $('#tablestok').DataTable({
       dom:'Bfrtip',
     buttons : [
     'copy', 'csv','excel', 'pdf', 'print'
   ]
 });
 });

// $(document).ready(function() {
//   $('#example').DataTable( {
//       dom: 'Bfrtip',
//       buttons: [
//           'copy', 'csv', 'excel', 'pdf', 'print'
//       ]
//   } );
// } );