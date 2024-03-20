@extends('layouts.admin')
@section('title', 'Admin | customer-booking')

@section('content')
<div class="row my-auto align-items-center bg-white shadow-md border mb-3 py-2 mt-3">

    <div class="col-12 p-0">
        <div class="card">
            <div class="card-header">
                <h5 class="breadcrumb-item text-dark px-2"><a href="#"> Bookings</h5>
            </div>

            <div class="card-body card-body table-reHIDnsive p-0">
                @if(count($bookings) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>User</th>
                            <th>Hostel</th>
                            <th>Check-in Date</th>
                            <th>Check-out Date</th>
                            <th>Room Type</th>
                            <th>Occupants</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $booking->user->name }}</td> <!-- Assuming user has a 'name' attribute -->
                            <td>{{ $booking->hostel->name }}</td> <!-- Assuming hostel has a 'name' attribute -->
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td>{{ $booking->room_type }}</td>
                            <td>{{ $booking->occupants }}</td>
                            <td>{{ $booking->status }}</td>
                            <td class="d-flex">
                                <form id="updateBookingForm" action="{{ route('admin.customer-booking.update', $booking->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-danger mx-2" type="submit" onclick="return confirm('Are you sure you want to change the booking status?')">
                                        <i class="fas fa-jar"></i> Confirmed
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{ $bookings->links() }}</div>
                @else
                <div class="text-center text-muted p-5">No Data Found</div>
                @endif

            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->



    </div>
    <!-- /.col -->

</div>
<!-- /.content -->
@endsection
@push('.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function() {
        $('.selectpicker').selectpicker();

        //$('#datepicker').datepicker();
        // $('#datepicker').datepicker({
        //    format: 'yyyy-mm-dd'
        //    , language: 'en'
        //    , autoclose: true
        //});
    });

</script>



{{-- <script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-reHIDnsive/js/dataTables.reHIDnsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-reHIDnsive/js/reHIDnsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $("#example1").DataTable({
                "reHIDnsive": true
                , "lengthChange": false
                , "autoWidth": false
                , "searching": true
                , "bookingsing": true
                , "paging": true
                , "info": true
                , "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    });

</script> --}}
@endpush
