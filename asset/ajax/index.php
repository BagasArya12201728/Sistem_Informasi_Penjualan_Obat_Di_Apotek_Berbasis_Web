<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Gentelella Alela! | </title>

    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
</head>
<body class="nav-md">
<table id="tabelAuthor" class="table table-bordered table-hover">
    <thead>
        <tr>
     <th>kode</th>
     <th>Nama</th>
     <th>Email</th>
     <th>Tgl. Lahir</th>
     <th>Action</th>
 </tr>
    </thead>
    <tbody>
 <tr>
     <td>Nama Awal</td>
     <td>Nama Akhir</td>
     <td>Email</td>
     <td>Tgl. Lahir</td>
     <td></td>
        </tr>
    </tbody>
</table>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
 
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
 

</body>	
<script type="text/javascript">
 $(document).ready(function() {
     var table = $('#tabelAuthor').DataTable( { 
         "processing": true,
         "serverSide": true,
         "ajax": "dataTables.php",
         "columnDefs": [ {
             "targets": -1,
             "data": null,
             "defaultContent": "<button class='btn btn-success btn-xs tblEdit'> Delete</button> || <button class='btn btn-success btn-xs hps'>Hapus</button>",
         }]
     });
 
     $('#tabelAuthor tbody').on( 'click', '.tblEdit', function () {
         var data = table.row( $(this).parents('tr') ).data();
         window.location.href = "edit.php?id="+ data[0];
     } );

     $('#tabelAuthor tbody').on( 'click', '.hps', function () {
         var data = table.row( $(this).parents('tr') ).data();
         window.location.href = "hapus.php?id="+ data[0];
     } );

 });
</script>
  </body>

</html>
