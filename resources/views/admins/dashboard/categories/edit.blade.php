<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title> Admin Dashboard</title>
    <!-- Icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="dest/style.css" rel="stylesheet">
</head>
<!-- BODY options, add following classes to body to change options
		1. 'compact-nav'     	  - Switch sidebar to minified version (width 50px)
		2. 'sidebar-nav'		  - Navigation on the left
			2.1. 'sidebar-off-canvas'	- Off-Canvas
				2.1.1 'sidebar-off-canvas-push'	- Off-Canvas which move content
				2.1.2 'sidebar-off-canvas-with-shadow'	- Add shadow to body elements
		3. 'fixed-nav'			  - Fixed navigation
		4. 'navbar-fixed'		  - Fixed navbar
	-->

<body class="navbar-fixed sidebar-nav fixed-nav">
     <header class="navbar">
        <div class="container-fluid">
            <ul class="nav navbar-nav hidden-md-down">
                <li class="nav-item">
                    <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span></a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                        <span class="hidden-md-down">المدير</span>
                        
                        
                    </a>
                     <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header text-xs-center">
                            <strong>الحساب</strong>
                        </div>
                        
                        <a class="dropdown-item" href="#"><i class="icon-settings"></i> إعدادات الحساب</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> خروج</a>
                    </div>
                </li>
                <li class="nav-item">
                </li>

                
            </ul>
            
        </div>
    </header>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.html"><i class="fa fa-dashboard"></i> الصفحة الرئيسية </a>
                </li>

                <li class="nav-title">
                    المحتويات
                </li>
                  <li class="nav-item nav-dropdown">
                    <a class="nav-link " href="admin_category.html"><i class="icon-tag"></i> التصنيفات</a>
                    <a class="nav-link " href="admin_product.html"><i class="icon-paypal"></i> المنتجات</a>
                    <a class="nav-link " href="admin_order.html"><i class="icon-handbag"></i> الطالبات</a>
                    <a class="nav-link " href="admin_user.html"><i class="icon-user"></i> المستخدمين</a>
                  
                </li>
               
             

            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            
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
                    
                        <h1>تعديل صنف </h1>
                        <from class="form-control" action=" " method="post">
                        <div class="input-group m-b-1">
                            
                            </span>
                            <input type="text" class="form-control" placeholder=" اسم الصنف ">
                        </div>
                        <div class="input-group m-b-1">
                            
                            </span>
                            <input type="text" class="form-control " placeholder="الوصف ">
                        </div>
                        <div class="input-group m-b-1">
                            
                            <input type="file" class="form-control " >
                        </div>
                        <div>
                        <button type="button" class="btn btn-block btn-success">
                           
                            تعديل     <i class="fa fa-edit"></i></button>
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
    </main>

    <aside class="aside-menu">
       
    </aside>

    
    <!-- Bootstrap and necessary plugins -->
    <script src="js/libs/jquery.min.js"></script>
    <script src="js/libs/tether.min.js"></script>
    <script src="js/libs/bootstrap.min.js"></script>
    <script src="js/libs/pace.min.js"></script>

    <!-- Plugins and scripts required by all views -->
    <script src="js/libs/Chart.min.js"></script>

    <!-- CoreUI main scripts -->

    <script src="js/app.js"></script>

    <!-- Plugins and scripts required by this views -->
    <!-- Custom scripts required by this view -->
    <script src="js/views/main.js"></script>

    <!-- Grunt watch plugin -->
    <script src="//localhost:35729/livereload.js"></script>
</body>

</html>
