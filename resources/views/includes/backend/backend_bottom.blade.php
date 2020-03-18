<script src="{{ asset('js/backend/gsap/main-gsap.js') }}"></script>
<script src="{{ asset('js/backend/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>

    
    <script src="{{ asset('js/backend/bootstrap.js') }}"></script>
    <script src="{{ asset('js/backend/joinable.js') }}"></script>
    <script src="{{ asset('js/backend/resizeable.js') }}"></script>
    <script src="{{ asset('js/backend/neon-api.js') }}"></script>
    <script src="{{ asset('js/backend/toastr.js') }}"></script>
    <script src="{{ asset('js/backend/fileinput.js') }}"></script>
    <script src="{{ asset('js/backend/neon-chat.js') }}"></script>
    <script src="{{ asset('js/backend/neon-custom.js') }}"></script>
    <script src="{{ asset('js/backend/neon-demo.js') }}"></script>
    <script src="{{ asset('js/backend/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/backend/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/backend/daterangepicker/moment.js') }}"></script>
    <script src="{{ asset('js/backend/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/backend/bootstrap-datepicker.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <script type="text/javascript" src="{{ asset('js/backend/datatable/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/backend/datatable/datatables/js/dataTables.bootstrap.js') }}" ></script>

<script type="text/javascript" src="{{ asset('js/backend/datatable/buttons/js/dataTables.buttons.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/backend/datatable/buttons/js/buttons.bootstrap.js') }}"></script>


{{-- For select option --}}
    <script src="{{ asset('js/backend/select2/select2.min.js') }}"></script>
<script src="{{ asset('js/backend/selectboxit/jquery.selectBoxIt.min.js') }}"></script>

<!-- SHOW TOASTR NOTIFIVATION -->
@if (Session::has('success_message'))
<script type="text/javascript">
    toastr.success( '{{ session('success_message') }}' );
</script>
@endif

@if (Session::has('error_message'))
<script type="text/javascript">
    toastr.error( '{{ session('error_message') }}' );
</script>
@endif

<!-- Toastr and alert notifications scripts -->
<script type="text/javascript">
function notify(message) {
  toastr.error(message);
}

function success_notify(message) {
  toastr.success(message);
}

function error_notify(message) {
  toastr.error(message);
}
</script>

<script src="{{ asset('js/backend/font-awesome-icon-picker/fontawesome-iconpicker.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/backend/custom.js') }}"></script>

{{-- For showing icons dialouge --}}
<script type="text/javascript">
  $(document).ready(function() {
    $(function() {
       $('.icon-picker').iconpicker();
     });
  });
</script>

<script type="text/javascript">

  jQuery(document).ready(function($)
  {
    var datatable = $("#table_export").dataTable();
  });

</script>

