@extends('admins.dashboard.master')

@section('content')
    
<div class="container-fluid">

    <div class="animated fadeIn">
        <div class="row">
            
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <a class="nav-link " href="{{route('categories.create')}}"><button class="btn btn-primary" > + اضافة </button></a>

                         <i class="fa fa-align-justify"></i>    كل التصنيفات  
                    </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>
                                <th>رقم الصنف</th> 
                                <th>اسم الصنف</th> 
                                <th>الوصف</th>
                                <th>الصورة</th>
                                <th><a class="nav-link " href="admin_editcategory.html">تعديل</a></th>
                                   
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)  
                                <tr>
                                     <td>{{$category->id}}</td>
                                     <td>{{$category->name}}</td>
                                     <td>{{$category->description}}</td>
                                     <td><img src="{{$category->image}}" height="40" width="40" alt="" style="border-radius: 50%"></td>
                                     <td>ed</td>
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
@endsection
