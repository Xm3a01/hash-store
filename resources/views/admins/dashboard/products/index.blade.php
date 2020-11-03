@extends('admins.dashboard.master')

@section('content')

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
          
        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="row">
                    
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="nav-link " href="admin_addproduct.html"><button class="btn btn-primary" > + اضافة </button></a>

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
                                        <th>اللون المتوفر</th> 
                                        <th>الحجم</th>
                                        <th>الحم المتوفر</th>
                                        <th>الخصم  </th> 
                                        <th>الخصم المتوفر</th>
                                        <th>السعر</th>
                                        <th>الكمية </th> 
                                        <th>الوصف</th>
                                        <th>ملاحظات</th>
                                        <th><a class="nav-link " href="admin_editproduct.html">تعديل</a></th>
                                              
                                        </tr>
                                    </thead>


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