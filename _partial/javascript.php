    <script src="assets/template2/js/vendor/jquery-1.12.4.min.js"></script>

    <!-- bootstrap JS
        ============================================ -->
    <script src="assets/template2/js/bootstrap.min.js"></script>

    <!-- wow JS
        ============================================ -->
    <script src="assets/template2/js/wow.min.js"></script>

    <!-- price-slider JS
        ============================================ -->
    <script src="assets/template2/js/jquery-price-slider.js"></script>

    <!-- owl.carousel JS
        ============================================ -->
    <script src="assets/template2/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="assets/template2/js/jquery.scrollUp.min.js"></script>

    <!-- meanmenu JS
        ============================================ -->
    <script src="assets/template2/js/meanmenu/jquery.meanmenu.js"></script>

    <!-- counterup JS
        ============================================ -->
    <script src="assets/template2/js/counterup/jquery.counterup.min.js"></script>
    <script src="assets/template2/js/counterup/waypoints.min.js"></script>
    <script src="assets/template2/js/counterup/counterup-active.js"></script>

    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="assets/template2/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- sparkline JS
        ============================================ -->
    <script src="assets/template2/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/template2/js/sparkline/sparkline-active.js"></script>

    <!-- flot JS
        ============================================ -->
    <script src="assets/template2/js/flot/jquery.flot.js"></script>
    <script src="assets/template2/js/flot/jquery.flot.resize.js"></script>
    <script src="assets/template2/js/flot/flot-active.js"></script>

    <!-- knob JS
        ============================================ -->
    <script src="assets/template2/js/knob/jquery.knob.js"></script>
    <script src="assets/template2/js/knob/jquery.appear.js"></script>
    <script src="assets/template2/js/knob/knob-active.js"></script>
    <!-- Input Mask JS
        ============================================ -->
    <script src="assets/template2/js/jasny-bootstrap.min.js"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="assets/template2/js/icheck/icheck.min.js"></script>
    <script src="assets/template2/js/icheck/icheck-active.js"></script>
    <!-- rangle-slider JS
        ============================================ -->
    <script src="assets/template2/js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="assets/template2/js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="assets/template2/js/rangle-slider/rangle-active.js"></script>

    <!--  todo JS
        ============================================ -->
    <script src="assets/template2/js/todo/jquery.todo.js"></script>

    <!--  wave JS
        ============================================ -->
    <script src="assets/template2/js/wave/waves.min.js"></script>
    <script src="assets/template2/js/wave/wave-active.js"></script>

    <!-- plugins JS
        ============================================ -->
    <script src="assets/template2/js/plugins.js"></script>

    <!-- Data Table JS
        ============================================ -->
    <script src="assets/template2/js/data-table/jquery.dataTables.min.js"></script>
    <script src="assets/template2/js/data-table/data-table-act.js"></script>

    <!-- main JS
        ============================================ -->
    <script src="assets/template2/js/main.js"></script>

    <!-- select -->
    <script src="assets/template2/js/bootstrap-select/bootstrap-select.js"></script>
    <script src="assets/template2/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="assets/template2/js/datapicker/datepicker-active.js"></script>
    <script type="text/javascript" src="assets/template2/js/session_waktu/jquery.idle.js"></script>
    <!-- Supaya di tabel tidak ada ORDER BY(otomatis data table) -->
    <script>
        $('#data-table-basic').DataTable({
            ordering: false
        });
    </script>
    <!-- Agar input tidak ada history -->
    <script>
        $("form :input").attr("autocomplete", "off");
    </script>

    <!-- User Tiap 10 menit akan logout otomatis Jika tidak melakukan apa apa-->
    <!-- <script>
        $(document).idle({
            onIdle: function(){
                window.location="logout.php";                
            },
            // 1 detik = 1000 
            // 10 menit
            idle: 600000
        });
    </script> -->
    <!-- Ketika Close browser atau Tutup Tab browser otomatis logout -->
    <!-- <script>
        window.onbeforeunload = function(){
        //Ajax request to update the database
        $.ajax({
            type: "POST",
            url: "logout.php"
        });
    }
    </script> -->
    <!--Load barang ketika di klik select option (FORM work order)  -->
     <script>  
         $(document).ready(function(){  
              $('#kode_customer').change(function(){  
                   var kode_customer = $(this).val();  
                   $.ajax({  
                        url:"transaksi/work_order/load_data_customer.php",  
                        method:"POST",  
                        data:{kode_customer:kode_customer},  
                        success:function(data){  
                             $('#tampil_customer').html(data);  
                        }  
                   });  
              });  
         });  
         </script>

           <!--Load barang ketika di klik select option (FORM penjualan work order)  -->
         <script>  
         $(document).ready(function(){  
              $('#kode_barang').change(function(){  
                   var kode_barang = $(this).val();  
                   $.ajax({  
                        url:"transaksi/penjualan/load_data_barang.php",  
                        method:"POST",  
                        data:{kode_barang:kode_barang},  
                        success:function(data){  
                             $('#tampil_barang').html(data);  
                        }  
                   });  
              });  
         });  
         </script>  

         <!--Load service ketika di klik select option (FORM penjualan work order)  -->
         <script>  
         $(document).ready(function(){  
              $('#kode_service').change(function(){  
                   var kode_service = $(this).val();  
                   $.ajax({  
                        url:"transaksi/penjualan/load_data_service.php",  
                        method:"POST",  
                        data:{kode_service:kode_service},  
                        success:function(data){  
                             $('#tampil_service').html(data);  
                        }  
                   });  
              });  
         });  
         </script>  