@extends('admins.dashboard.master')

@section('content')

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="nav-link " href="{{route('products.create')}}"><button class="btn btn-primary" > + اضافة </button></a>

                                 <i class="fa fa-align-justify"></i>    كل المنتجات  
                            </div>
                            <div class="card-block">
                                <table class="table table-bordered table-striped table-condensed">
                                    <thead>
                                        <tr>
                                        <th>رقم المنتج</th>
                                        <th>اسم المنتج</th> 
                                        <th>الصورة</th>
                                        <th>اللون</th>
                                        <th>الحجم</th>
                                        <th>الخصم  </th> 
                                        <th>السعر</th>
                                        <th>الوصف</th>
                                        <th>الكميه في الطلب</th>
                                        <th>التصنيف</th>
                                        <th>العمليات</th>
                                              
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td><img src="{{$product->image}}" alt="" height="45" width="45"></td>
                                            <td><div style="background: {{$product->color}}; height:45px; width:45px; "></div></td>
                                            <td>{{$product->availableSize}}</td>
                                            <td>{{$product->disCount}}</td>
                                            <td>{{$product->price}} {{$product->unitPrice}}</td>
                                            <td>{{$product->description}}</td>
                                            <td> سقف الطلبات {{$product->unitOnOrder}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>
                                                <form action="{{route('products.destroy' , $product->id)}}" method="POST">
                                                 @csrf
                                                 @method('delete')
                                                 <a href="{{route('products.edit' , $product->id)}}">edit</a>
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
    @endsection