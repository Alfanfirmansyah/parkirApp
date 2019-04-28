@extends('layouts.templateMaster')
@section('content')  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data User Registration
                            </h2>
                        </div>

                    
                        <div class="body">
                            <div class="table-responsive">
                                    @if(session()->get('success'))
                                    <div class="alert alert-success alert-close">
                                        {{ session()->get('success') }}  
                                    </div><br />
                                    @endif
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Adress</th>
                                            <th class="col-md-2">Aksi</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>
                                                <form action="{{ route('user.destroy', $row->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="return confirm('Are you sure?')">
                                                    <button class="btn btn-icon btn-sm btn-danger" type="submit">
                                                    <i style="color:#fff" class="material-icons">delete</i>
                                                    <span>Delete</span>
                                                    </button>
                                                </a>
                                                </form>
                                
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        @endsection