@extends('admins.dashboard.master')

@section('content')

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <!--a class="nav-link " href="admin_addcategory.html"><button class="btn btn-primary" > + اضافة </button></a-->

                                 <i class="fa fa-align-justify"></i>    كل الطلبات  
                            </div>
                            <div class="card-block">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                        <th>رقم المستخدم</th> 
                                        <th>اسم المستخدم</th>
                                        <th>عنوان البريد </th>
                                        <th>رقم الهاتف </th> 
                                        
                                        
                                        <th>العمليات</th>
                                           
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>
                                                <form action="{{route('users.destroy' , $user->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{route('users.edit' , $user->id)}}">edit</a>
                                                    <button type="submit">delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                    

                </div>
                <!--/row-->

                
                                <!--/.row-->
                                <br/>
                                                                            
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                </div>
                <!--/.row-->
            </div>

        </div>
        <!--/.container-fluid-->
  @stop