@extends('admin.master.index')

@section('content')
    <div class="col-8 bg-light p-3">
        <form method="post" action="/admin/user/{{$user->id}}/updatePassword">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                <label for="password">رمز عبور جدید:</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="form-group">
                <label for="password_confirmation">تکرار رمز عبور جدید:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">تغییر رمز</button>
        </form>
    </div>
@endsection
