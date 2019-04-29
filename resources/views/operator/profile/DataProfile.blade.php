@extends('layouts.templateOPMaster')
@section('content')  
<div class="row clearfix">
    <div class="col-xs-12 col-sm-5">
        <div class="card profile-card">
            <div class="profile-header">&nbsp;</div>
            <div class="profile-body">
                <div class="image-area">
                    <img src="{{ asset('assets/images/user-lg.jpg')}}" alt="AdminBSB - Profile Image" />
                </div>
                <div class="content-area">
                    <h3>{{$operator->name}}</h3>
                    <p>{{$operator->address}}</p>
                </div>
            </div>
        </div>
        <div class="card card-about-me" style="margin-top:-8%">
            <div class="body">
                <ul>
                    <li>
                        <div class="title">
                            <i class="material-icons">library_books</i>
                            Email
                        </div>
                        <div class="content">
                            {{$operator->email}}
                        </div>
                    </li>
                    <li>
                        <div class="title">
                            <i class="material-icons">location_on</i>
                            Alamat
                        </div>
                        <div class="content">
                            {{$operator->address}}
                        </div>
                    </li> 
                    <li>
                        <div class="title">
                            <i class="material-icons">phone</i>
                            Phone
                        </div>
                        <div class="content">
                            {{$operator->telp}}
                        </div>
                    </li>
                </ul>
            </div>    
        </div>
    </div>
    <div class="col-xs-12 col-sm-7">
        <div class="card">
            <div class="body">
                <div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile Settings</a></li>
                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="profile">
                            <form class="form-horizontal" method="post" action="{{ route('operator.update',$operator->id) }}">
                            @method('PATCH')
                            @csrf
                            @if ($errors->any())
                            <div class="col-md-10">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @if(session()->get('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ session()->get('success') }}  
                                </div><br />
                            @endif 
                                <div class="form-group">
                                    <label for="NameSurname" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="NameSurname" name="name" placeholder="Name" value="{{$operator->name}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="{{$operator->email}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputExperience" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <textarea class="form-control" id="InputExperience" name="address" rows="3" placeholder="Address">{{$operator->address}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputSkills" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="InputSkills" value="{{$operator->telp}}" name="telp" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">UPDATE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                            <form class="form-horizontal" method="post" action="/UpdatePass/{{ $operator->id }}">
                            @csrf
                            @if ($errors->any())
                            <div class="col-md-10">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @if(session()->get('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ session()->get('success') }}  
                                </div><br />
                            @endif                                
                                <div class="form-group">
                                    <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password" placeholder="New Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                    <div class="col-sm-9">
                                        <div class="form-line">
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="New Password (Confirm)" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-danger">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection