
<!-- jQuery -->
<script src="{{asset('adminTemp/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminTemp/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminTemp/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('adminTemp/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>




<!-- DataTables  & Plugins -->
<script src="{{asset('adminTemp/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminTemp/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{asset('js/extra/ckeditor/ckeditor.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    //ckeditor
   ClassicEditor
                 .create( document.querySelector( '#editor1' ) )
                 .then( editor => {
                   console.log( editor );
                                } )
                 .catch( error => {
                  console.error( error );
                        } );

                        ClassicEditor
                 .create( document.querySelector( '#editor2' ) )
                 .then( editor => {
                   console.log( editor );
                                } )
                 .catch( error => {
                  console.error( error );
                        } );





    //flash
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    //datatable
    $(".dataTable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,"bPaginate": false,"bInfo": false

    });

    $('.sa-delete').on('click', function (){

         let form_id=$(this).data('form-id');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    $('#'+form_id).submit();

                }
            });

    });

    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    $(function () {
  bsCustomFileInput.init();
});


//text change

</script>


<script>
function change(te){
 $('#slug').val(te.value);
}

$('.itemnavr').click(function (event) {

    event.preventDefault();

    // Load the content from the link's href attribute
    $('.content').load($(this).attr('href'));
});


$("#btype").change(function(){

    var type=$("#btype option:selected").text();

    if(type=="Default"){
        $("#imageText").text("Default(300x300)");
    }

    if(type=="Small"){
        $("#imageText").text("Small(300x150)");

    }

    if(type=="Medium"){
        $("#imageText").text("Medium(300x200)");

    }
    
    if(type=="Vertical"){
        $("#imageText").text("Vertical(200x300)");

    }
    



   

});


$('.imgview').click(function(){
  var image = $(this).attr('src');
  
   $('#imgbig').attr('src',image);
    
});

function getCollection(id){
		  alert(id);
                // $.ajax({
                //     url: 'popd.php',
                //     type: 'POST',
                //     data: {'ab':id},
				// 	 dataType: 'json',
				// 	cache:false,
				// 	 success: function (data) {
                //    var imgurl="images/"+data.icon;
                //     $('#popimg').attr('src',imgurl);
                //       $('#popname').html(data.name);
				// 		 $('#popdetails').html(data.details);
                     

     
     
    }





</script>



@stack('scripts')
