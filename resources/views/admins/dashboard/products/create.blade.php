@extends('admins.dashboard.master')

@section('content')

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            Hello
        </ol>

        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="row">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-block">
                                    <div class="col-md-5 m-x-auto pull-xs-none vamiddle">
                                        <div class="card">
                                            <div class="card-block p-a-2">
                                                <h1>اضافة منتج جديد</h1>
                                                <form class="form-control" action="" method="post">
                                                    <div class="input-group m-b-1">


                                                        <input type="text" class="form-control"
                                                            placeholder=" اسم المنتج ">
                                                    </div>
                                                    <div class="input-group m-b-1">

                                                        <input type="file" class="form-control ">
                                                    </div>
                                                    <div class="input-group m-b-1">


                                                        <label> اختر لون المنتج </label> &ensp; &ensp; &ensp;
                                                        <input type="color" id="favcolor" name="favcolor"
                                                            value="#123456">
                                                    </div>
                                                    <div class="input-group m-b-1">


                                                        <label> اختر الألوان المتاحة من المنتج </label> &ensp; &ensp;
                                                        &ensp;
                                                        <input type="color" id="favcolor" name="favcolor"
                                                            value="#123456">
                                                    </div>
                                                    <div class="input-group m-b-1">


                                                        <input type="number" step="0.01" class="form-control"
                                                            placeholder=" حجم المنتج ">
                                                    </div>
                                                    <div class="input-group m-b-1">
                                                        <input type="number" step="0.01" class="form-control"
                                                            placeholder=" الأحجام المتوفره من المنتج ">
                                                    </div>
                                                    <div class="input-group m-b-1">
                                                        <input type="number" step="0.01" class="form-control"
                                                            placeholder="  الخصم  ">
                                                    </div>
                                                    <div class="input-group m-b-1">
                                                        <label> الخصم المتوفر&ensp; &ensp; &ensp; </label>
                                                        نعم <input type="checkbox"> &ensp; &ensp; &ensp;
                                                        لا<input type="checkbox" checked="checked">
                                                    </div>
                                                    <div class="input-group m-b-1">


                                                        <input type="number" step="0.01" class="form-control"
                                                            placeholder="  السعر ">
                                                    </div>
                                                    <div class="input-group m-b-1">


                                                        <input type="number" class="form-control"
                                                            placeholder="  الكمية ">
                                                    </div>
                                                    <div class="input-group m-b-1">


                                                        <input type="text" class="form-control" placeholder="  الوصف ">
                                                    </div>
                                                    <div class="input-group m-b-1">


                                                        <input type="text" class="form-control"
                                                            placeholder="  ملاحظات ">
                                                    </div>
                                                    <div>
                                                        <button type="button" class="btn btn-block btn-success">

                                                            اضافة <i class="icon-plus"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/col-->
                                </div>
                                <!--/row-->
                            </div>
                        </div>
                        <!--/row-->


                        <!--/.row-->
                        <br />

                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->
        </div>

        </div>
   @stop