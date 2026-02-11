@extends('app.main')

@section('content')

<div class="container mt-5">

 <!-- <div class="text-center my-3"><h1 class="display-4">DOCUMENT VERIFICATION PORTAL</h1></div> -->
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <!-- <th>id</th> -->
                <th>Name</th>
                <th>Enrollment No</th>
                <th>Cell No</th>
                <th>CNIC</th>

                <th>Email</th>
                <th>Fee Voucher</th>


                <th>Files</th>
                <th>Document Validity Period</th>

                <th>Date Time</th>
                <th>Action</th>


                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <!-- Populate with your data -->
            @foreach($data as $list)
            <tr>
                <!-- <td>{{$list['id']}}</td> -->
                <td>{{$list['name']}}</td>
                <td>{{$list['enrollment']}}</td>
                <td>{{$list['cell']}}</td>
                <td>{{$list['CNIC']}}</td>

                <td>{{$list['email']}}</td>
                <td>{{$list['fee_voucher']}}</td>

                <td>{{$list['filename']}}</td>
                <td>{{$list['validity_qr']}}</td>

                <td>{{$list['created_at']}}</td>
                <td><a href="{{url('/index')}}/{{$list['id']}}">View</a></td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": true, // Enable pagination
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });

    // Example dynamic data (replace with your actual data)

    // const data = [
    //     ['Data 1', 'Value 1'],
    //     ['Data 2', 'Value 2'],
    //     // Add more rows as needed
    // ];

    // const data=@json($data);

    const table = $('#example').DataTable();
    table.destroy();
    // Populate the table with data
    data.forEach(row => {
        table.row.add(row).draw();
    });
    // console.log(@json($data));
</script>


</body>

</html>
@endsection