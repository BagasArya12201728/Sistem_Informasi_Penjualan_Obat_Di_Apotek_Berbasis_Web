// $('#btn1').on('click',  function () {
// 	$('.hide').removeClass('hide');
 
// 	// $(this).addClass('active');s
// });


  // $(document).ready(function(){
  //   $(".add-cart").click(function(){
  //     var data = $('.form-user').serialize();
  //     $.ajax({
  //       type: 'POST',
  //       url: "action/action?act=add-cart-penjualan",
  //       data: data,
  //       success: function() { 
  //         $('.cart-penjualan').load("cart-penjualan.php");
  //       }
  //     });
  //   });
  // });


//data obat ----------------------------------------------------------------------------------------------------
 $(document).ready(function() {
     var table = $('#data_obat').DataTable( { 
      
         "processing": true,
         "serverSide": true,
         "ajax": "asset/ajax/data_obat.php",
         "columnDefs": [ {
             // "targets": -1,
             "data": null,
         }]
     });
 
     // $('#data_obat tbody').on( 'click', '.tblEdit', function () {
     //     var data = table.row( $(this).parents('tr') ).data();
     //     window.location.id = data[0];
     // } );

     // $('#data_obat tbody').on( 'click', '.hps', function () {
     //     var data = table.row( $(this).parents('tr') ).data();
     //     window.location.href = "hapus-data-obat.php?kode="+ data[0];
     // } );

 });
//end data obat-------------------------------------------------------------------------------------------------





$(document).ready(function(){

        $('#edit_sup').on('show.bs.modal', function (e) {

            var idx = $(e.relatedTarget).data('kode');

            //menggunakan fungsi ajax untuk pengambilan data

            $.ajax({

                type : 'post',

                url : 'pages/view/e-suplier.php',

                data :  'kode='+ idx,

                success : function(data){

                $('.hasil-data').html(data);//menampilkan data ke dalam modal

                }

            });

         });

    });


//list obat ----------------------------------------------------------------------------------------------------
 $(document).ready(function() {
     var table = $('#list-jual').DataTable( { 
         "processing": true,
         "serverSide": true,
         "ajax": "asset/ajax/list-obat.php",
         "columnDefs": [ {
             "targets": -1,
             "data": null,
     "defaultContent": "<button class='btn btn-dark btn-sm addcart'><span class='fa fa-plus'></span> Pilih</button>",
         }]
     });
 
     $('#list-jual tbody').on( 'click', '.addcart', function () {
         var data = table.row( $(this).parents('tr') ).data();
         window.location.href = "?p=form-penjualan&&data="+ data[1] +"&&kode="+ data[0];
     } );
 });
//end list obat-------------------------------------------------------------------------------------------------


// view data penjualan --------------------------------------------------------------------------------------------------------------------------- -->
 $(document).ready(function() {
     var table = $('#data_penjualan').DataTable( { 
         "processing": true,
         "serverSide": true,
         "ajax": "asset/ajax/data_penjualan.php",
         
         "columnDefs": [ {
             "targets": -1,
             "data": null,
             "defaultContent": "<button class='btn btn-danger btn-sm struk' target=blank><span class='fa fa-print'></span> Cetak</button>",
         }]
     });
 

     $('#data_penjualan tbody').on( 'click', '.struk', function () {
         var data = table.row( $(this).parents('tr') ).data();
         window.location.href = "pages/view/struk.php?kode="+ data[0];
     } );

 });


// end view data penjualan  ------------------------------------------------------------------------------------------------------------------ -->

// select 2 ----------------------------------------------------------------------------------------------------------------------------------
     $(document).ready(function () {
                $("#select2").select2({
                    placeholder: "Please Select"
                });
 
                $("#kota2").select2({
                    placeholder: "Please Select"
                });
            });
// end select 2 ----------------------------------------------------------------------------------------------------------------------------------

// select2 mencari dataobat stok opname

$(document).ready(function () {

    $("#selected2").select2({
        placeholder: "Select a State",
        allowClear: true,
        minimumInputLength: 5
    });
    $("#e2_2").select2({
        placeholder: "Select a State"
    });
            });


var totalNumber = 0;
$('[name="bil1"]').bind('keyup keypress', function () {
    var nilai = parseInt($(this).val());
    var bil2 = parseInt($('[name="bil2"]').val());
    if (!isNaN(nilai) && !isNaN(bil2)) {
        totalNumber = nilai - bil2;
        $('[name="total"]').val(totalNumber);
    }
})

$('[name="bil2"]').bind('keyup keypress', function () {
    var nilai = parseInt($(this).val());
    var bil1 = parseInt($('[name="bil1"]').val());
    if (!isNaN(nilai) && !isNaN(bil1)) {
        totalNumber = nilai - bil1;
        $('[name="total"]').val(totalNumber);
    }
})

