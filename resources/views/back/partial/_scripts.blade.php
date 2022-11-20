<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
<script src="{{asset('adminr/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminr/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminr/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('adminr/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('adminr/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>



<!-- DataTables  & Plugins -->
<script src="{{asset('adminr/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminr/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('adminr/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('adminr/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('adminr/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    //flash
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    //datatable
    $(".dataTable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false

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
ClassicEditor
                 .create( document.querySelector( '#editor' ) )
                 .then( editor => {
                   console.log( editor );
                                } )
                 .catch( error => {
                  console.error( error );
                        } );
</script>
@stack('scripts')
