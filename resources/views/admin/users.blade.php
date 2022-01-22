@extends('admin.master.index')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Table With Full Features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>پست الکترونیکی</th>
                    <th>دسترسی</th>
                    <th>ویرایش</th>


                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                    <tr>
                        <td>{{$item->fname}}</td>
                        <td>{{$item->lname}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->type}}</td>
                        <td>
                            <a href="/admin/user/{{$item->id}}/edit" >hndj</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>پست الکترونیکی</th>
                    <th>دسترسی</th>
                    <th>ویرایش</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection


@section('footerScript')
    <script>
        $(function () {
            $("#example1").DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
            });
            $('#example2').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
