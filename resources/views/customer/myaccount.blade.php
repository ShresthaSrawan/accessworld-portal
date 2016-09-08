{!! Form::model($customer, array('method'=>'PUT', 'files'=>'true','route' => array('customer.update', $customer->slug), 'class' => 'password-validate', 'data-preq' => false)) !!}
<div class="card card-underline sub-card">
    <div class="card-body">
        <button type="button" data-message="save these changes?" class="btn btn-primary btn-submit pull-right"><i class="fa fa-save"></i> Save</button>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="text-center margin-bottom-1">
                    <img src="{{$customer->image->thumbnail(200,200)}}" class="img-avatar">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="customer-email">Email</label>
                    <input type="text" class="form-control" id="customer-email" value="{{ $customer->email }}" readonly="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="customer-username">Username</label>
                    <input type="text" class="form-control" id="customer-username" value="{{ $customer->username }}" readonly="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('detail[first_name]', 'First Name') !!}
                    {!! Form::text('detail[first_name]', old('first_name'),['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('detail[last_name]', 'Last Name') !!}
                    {!! Form::text('detail[last_name]', old('last_name'),['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('detail[phone]', 'Phone') !!}
                    {!! Form::text('detail[phone]', old('phone'),['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('detail[address]', 'Address') !!}
                    {!! Form::text('detail[address]', old('address'),['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'register-password']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Repeat Password') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('detail[company]', 'Company') !!}
                    {!! Form::text('detail[company_name]', old('company_name'),['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('profile_picture', 'Avatar') !!}
                    {!! Form::file('profile_picture', ['id' => 'avatar-button','accept' => 'image/jpeg, image/png, image/gif']) !!}
                </div>
            </div>
        </div>
    </div><!--end .card-body -->
</div>
{!! Form::close() !!}
{{ Html::script('assets/js/password.validation.js') }}
<script>
    (function(){
        "use strict";
        var readURL = function(input){
            var imgId = $(input).data('id');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#avatar-image').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        };

        $('#avatar-image').click(function(){
            $('#avatar-button').trigger('click');
        });

        $("#avatar-button").change(function(){
            readURL(this);
        });

    }())
</script>
