@extends('admin.master.index')

@section('headerScript')
    <link rel="stylesheet" href="{{asset('/admin/plugins/datatables/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">لیست کاربرها</h3>
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
                    <th>حذف</th>


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
                                <a href="/admin/user/{{$item->id}}/edit" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form method="post"  action="/admin/user/{{$item->id}}" onsubmit="return confirm('آیا از حذف کاربر اطمینان دارید؟');">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
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
                    <th>حذف</th>
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
    <!-- DataTables -->
    <script src="{{asset('/admin/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/admin/plugins/datatables/dataTables.bootstrap4.js')}}"></script>
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
