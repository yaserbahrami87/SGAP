@extends('admin.master.index')
@section('content')
    <div class="container bootstrap snippet bg-light">
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                <div class="text-center">
                    <img src="{{asset('/images/users/avatar.png')}}" class="avatar img-circle img-thumbnail mb-3" alt="avatar">
                    <a href="/admin/user/{{$user->id}}/password" class="btn btn-info text-light">
                        تغییر رمز
                        <i class="bi bi-key-fill"></i>
                    </a>
                </div>
            </div><!--/col-3-->
            <div class="col-sm-9">
                <form class="form" action="/admin/user/{{$user->id}}" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="fname"><p>نام:</p></label>
                            <input type="text" class="form-control" name="fname" id="fname" placeholder="مثلا: علی" value="{{old('fname',$user->fname)}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="lname"><p>نام خانوادگی:</p></label>
                            <input type="text" class="form-control" name="lname" id="lname" placeholder="مثلا:اکبری" value="{{old('lname',$user->lname)}}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="username"><p>نام کاربری:</p></label>
                            <input type="text" class="form-control" name="username" id="username" value="{{old('username',$user->username)}}" @if(!is_null($user->username)) disabled @endif/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="tel"><p>تلفن همراه</p></label>
                            <input type="text" class="form-control" name="tel" id="tel" value="{{old('tel',$user->tel)}}" @if(!is_null($user->tel)) disabled @endif />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="email"><p>ایمیل:</p></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" value="{{old('email',$user->email)}}" @if(!is_null($user->email)) disabled @endif/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type">دسترسی:</label>
                        <select class="form-control" id="type" name="type">
                            <option selected >انتخاب کنید</option>
                            <option @if($user->type==1) selected @endif value="1">کاربر ساده</option>
                            <option @if($user->type==2) selected @endif value="2"> مدیر</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn  btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> بروزرسانی</button>
                        </div>
                    </div>
                </form>
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
@endsection


@section('footerScript')
    <script>
        $(document).ready(function() {

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
    </script>
@endsection
