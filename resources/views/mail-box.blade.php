<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Miminium</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/icheck/skins/flat/red.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/normalize.css"/>

	<link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="asset/img/logomi.png">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.blade.php" class="navbar-brand">
                 <b>MIMIN</b>
                </a>

              <ul class="nav navbar-nav search-nav">
                <li>
                   <div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Type anywhere to <b>Search</b> </label>
                    </div>
                  </div>
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Akihiko Avaron</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                     <li><a href="#"><span class="fa fa-calendar"></span> My Calendar</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href=""><span class="fa fa-cogs"></span></a></li>
                        <li><a href=""><span class="fa fa-lock"></span></a></li>
                        <li><a href=""><span class="fa fa-power-off "></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li ><a href="#" class="opener-right-menu"><span class="fa fa-coffee"></span></a></li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="active ripple">
                      <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Dashboard 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="dashboard-v1.blade.php">Dashboard v.1</a></li>
                          <li><a href="dashboard-v2.blade.php">Dashboard v.2</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span> Layout
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="topnav.blade.php">Top Navigation</a></li>
                        <li><a href="boxed.blade.php">Boxed</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span> Charts
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="chartjs.blade.php">ChartJs</a></li>
                        <li><a href="morris.blade.php">Morris</a></li>
                        <li><a href="flot.blade.php">Flot</a></li>
                        <li><a href="sparkline.blade.php">SparkLine</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="fa fa-pencil-square"></span> Ui Elements  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="color.blade.php">Color</a></li>
                        <li><a href="weather.blade.php">Weather</a></li>
                        <li><a href="typography.blade.php">Typography</a></li>
                        <li><a href="icons.blade.php">Icons</a></li>
                        <li><a href="buttons.blade.php">Buttons</a></li>
                        <li><a href="media.blade.php">Media</a></li>
                        <li><a href="panels.blade.php">Panels & Tabs</a></li>
                        <li><a href="notifications.blade.php">Notifications & Tooltip</a></li>
                        <li><a href="badges.blade.php">Badges & Label</a></li>
                        <li><a href="progress.blade.php">Progress</a></li>
                        <li><a href="sliders.blade.php">Sliders</a></li>
                        <li><a href="timeline.blade.php">Timeline</a></li>
                        <li><a href="modal.blade.php">Modals</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-check-square-o"></span> Forms  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="formelement.blade.php">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-table"></span> Tables  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.blade.php">Data Tables</a></li>
                        <li><a href="handsontable.blade.php">handsontable</a></li>
                        <li><a href="tablestatic.blade.php">Static</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a href="calendar.blade.php"><span class="fa fa-calendar-o"></span>Calendar</a></li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-envelope-o"></span> Mail <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.blade.php">Inbox</a></li>
                        <li><a href="compose-mail.blade.php">Compose Mail</a></li>
                        <li><a href="view-mail.blade.php">View Mail</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-file-code-o"></span> Pages  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="forgotpass.blade.php">Forgot Password</a></li>
                        <li><a href="login.blade.php">SignIn</a></li>
                        <li><a href="reg.blade.php">SignUp</a></li>
                        <li><a href="article-v1.blade.php">Article v1</a></li>
                        <li><a href="search-v1.blade.php">Search Result v1</a></li>
                        <li><a href="productgrid.blade.php">Product Grid</a></li>
                        <li><a href="profile-v1.blade.php">Profile v1</a></li>
                        <li><a href="invoice-v1.blade.php">Invoice v1</a></li>
                      </ul>
                    </li>
                     <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="view-mail.blade.php">Level 1</a></li>
                        <li><a href="view-mail.blade.php">Level 1</a></li>
                        <li class="ripple">
                          <a class="sub-tree-toggle nav-header">
                            <span class="fa fa-envelope-o"></span> Level 1
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list sub-tree">
                            <li><a href="mail-box.blade.php">Level 2</a></li>
                            <li><a href="compose-mail.blade.php">Level 2</a></li>
                            <li><a href="view-mail.blade.php">Level 2</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="credits.blade.php">Credits</a></li>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->

          <!-- start: Content -->
      		<div id="content">
            <div class="col-md-12" style="padding:20px;">
              <div class="col-md-12 mail-wrapper">
                    
                  <div class="col-md-12 padding-0">
                      <div class="col-md-3 mail-left">
                          <div class="col-md-12 mail-left-header">
                                <center>
                                <input type="button" class="btn btn-danger btncompose-mail" value="Compose Mail"/>
                                </center>
                          </div>
                          <div class="col-md-12 mail-left-content">
                               <ul class="nav">
                                  <li></li>
                                  <li><h5>Folder</h5></li>
                                  <li>
                                    <a href="" class="active"><span class="fa fa-inbox"></span> Inbox (20)</a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-send-o"></span> Send Mail</a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-folder"></span> Drafts</a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-lock"></span> Important</a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-star"></span> Favorite</a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-fire"></span> Spam</a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-trash"></span> Trash</a>
                                  </li>
                                  <li><hr/></li>
                                  <li><h5>Categories</h5></li>
                                  <li>
                                    <a href=""><div class="fa fa-circle text-primary"></div> Social</a>
                                  </li>
                                   <li>
                                    <a href=""><div class="fa fa-circle text-success"></div> Advertising</a>
                                  </li>
                                   <li>
                                    <a href=""><div class="fa fa-circle text-info"></div> Forum</a>
                                  </li>
                                   <li>
                                    <a href=""><div class="fa fa-circle text-warning"></div> News</a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-circle text-danger"></span> Document</a>
                                  </li>
                                  <li><hr/></li>
                                  <li><h5>Tags</h5></li>
                                  <li>
                                    <ul class="tags">
                                        <li><a href=""><span class="fa fa-tag"></span> Hacking</a></li>
                                        <li><a href=""><span class="fa fa-tag"></span> Phising</a></li>
                                        <li><a href=""><span class="fa fa-tag"></span> Cracking</a></li>
                                        <li><a href=""><span class="fa fa-tag"></span> CSRF</a></li>
                                        <li><a href=""><span class="fa fa-tag"></span> XSS</a></li>
                                    </ul>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-md-9 mail-right">
                          <div class="col-md-12 mail-right-header">
                            <div class="col-md-10 col-sm-10 padding-0">
                                 <div class="input-group searchbox-v1">
                                  <span class="input-group-addon  border-none box-shadow-none" id="basic-addon1">
                                    <span class="fa fa-search"></span>
                                  </span>
                                  <input type="text" class="txtsearch border-none box-shadow-none" placeholder="Search Email..." aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 padding-0 text-right mail-right-options">
                                 <div class="btn-group pull-right right-option-v1">
                                    <i class="fa fa-ellipsis-v right-option-v1-icon" data-toggle="dropdown"></i>
                                    <ul class="dropdown-menu" role="menu">
                                      <li><a href="#">Action</a></li>
                                      <li><a href="#">Another action</a></li>
                                      <li><a href="#">Something else here</a></li>
                                      <li class="divider"></li>
                                      <li><a href="#">Separated link</a></li>
                                    </ul>
                                  </div>
                            </div>
                          </div>
                          <div class="col-md-12 col-sm-12 mail-right-tool">
                              <ul class="nav">
                                  <li>
                                    <input type="checkbox" class="icheck" name="checkbox1" />
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-eye"></span></a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-star"></span></a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-lock"></span></a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-folder"></span></a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-fire"></span></a>
                                  </li>
                                  <li>
                                    <a href=""><span class="fa fa-trash"></span></a>
                                  </li>
                                  <li class="nav navbar-right" >
                                      <ul class="nav">
                                        <li> <a href=""><span class="fa fa-angle-left"></span></a></li>
                                        <li> <a href="" class="btn-info"><span class="fa fa-angle-right"></span></a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </div>
                          <div class="col-md-12 mail-right-content">
                              <table class="table table-hover">
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact">
                                      <a href="">Google  </a> <span class="label pull-right label-danger">Document</span>
                                    </td>
                                     <td class="subject">
                                      <a href="#">Nunc nonummy metus. Mauris sollicitudin fermentum libero.</a>
                                      </td>
                                  </tr>
                                  <tr class="unread">
                                    <td class="check"><input type="checkbox" checked="checked" class="icheck" name="checkbox1" /></td>
                                    <td class="contact">Facebook</td>
                                    <td class="subject">
                                      <a href="#">Quisque id odio. Maecenas nec odio et ante tincidunt tempus.</a>
                                    </td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact">
                                      <a href=""#>Priscilla Burke </a> <span class="label pull-right label-primary"> Social</span>
                                    </td>
                                     <td class="subject">
                                        <a href="#">Curabitur at lacus ac velit ornare lobortis. </a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact">
                                      <a>Priscilla Burke </a> <span class="label pull-right label-success">Ads</span></td>
                                     <td class="subject"><a href="#">Sed in libero ut nibh placerat accumsan. Vivamus consectetuer hendrerit lacus.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Nam ipsum risus, rutrum vitae, vestibulum eu, volutpat a, suscipit non, turpis.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Quisque libero metus, condimentum nec, tempor a,Morbi ac felis.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Praesent venenatis metus at tortor pulvinar varius. Proin veros.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Praesent ac sem eget est egestas volutpat. Quisque id odio.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Nullam quis ante. In ut quam vitae odio lacinia tincidunt.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Curabitur nisi. Sed in libero ut nibh placerat accumsan.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Curabitur nisi. Suspendisse potenti.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Duis leo. Nam pretium turpis et arcu.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Ut tincidunt tincidunt erat. Phasellus magna.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Maecenas ullamcorper, dui et placerat feugiat</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Quisque ut nisi. Nulla facilisi.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact">
                                      <a>Priscilla Burke </a> <span class="label pull-right label-info">Forum</span>
                                    </td>
                                     <td class="subject"><a href="#">Donec interdum, metus et hendrerit aliquet, dolor diam sagittis ligula</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Suspendisse feugiat. Curabitur blandit mollis lacus.</a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact">
                                      <a href="#">Priscilla Burke </a> <span class="label pull-right label-warning">News</span>
                                    </td>
                                     <td class="subject"><a href="#">Duis lobortis massa imperdiet quam. Proin faucibus arcu </a></td>
                                  </tr>
                                  <tr class="read">
                                    <td class="check"><input type="checkbox" class="icheck" name="checkbox1" /></td>
                                    <td class="contact"><a href=""#>Priscilla Burke</a></td>
                                     <td class="subject"><a href="#">Morbi nec metus. Pellentesque libero to semper nec, quam.</a></td>
                                  </tr>
                              </table>
                          </div>
                      </div>
                  </div>

              </div>
            </div>
      		</div>
          <!-- end: Content -->
      
          <!-- start: right menu -->
            <div id="right-menu">
              <ul class="nav nav-tabs">
                <li class="active">
                 <a data-toggle="tab" href="#right-menu-user">
                  <span class="fa fa-comment-o fa-2x"></span>
                 </a>
                </li>
                <li>
                 <a data-toggle="tab" href="#right-menu-notif">
                  <span class="fa fa-bell-o fa-2x"></span>
                 </a>
                </li>
                <li>
                  <a data-toggle="tab" href="#right-menu-config">
                   <span class="fa fa-cog fa-2x"></span>
                  </a>
                 </li>
              </ul>

              <div class="tab-content">
                <div id="right-menu-user" class="tab-pane fade in active">
                  <div class="search col-md-12">
                    <input type="text" placeholder="search.."/>
                  </div>
                  <div class="user col-md-12">
                   <ul class="nav nav-list">
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="away">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-desktop"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>

                  </ul>
                </div>
                <!-- Chatbox -->
                <div class="col-md-12 chatbox">
                  <div class="col-md-12">
                    <a href="#" class="close-chat">X</a><h4>Akihiko Avaron</h4>
                  </div>
                  <div class="chat-area">
                    <div class="chat-area-content">
                      <div class="msg_container_base">
                        <div class="row msg_container send">
                          <div class="col-md-9 col-xs-9 bubble">
                            <div class="messages msg_sent">
                              <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                              </div>
                            </div>
                            <div class="col-md-3 col-xs-3 avatar">
                              <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                            </div>
                          </div>

                          <div class="row msg_container receive">
                            <div class="col-md-3 col-xs-3 avatar">
                              <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                            </div>
                            <div class="col-md-9 col-xs-9 bubble">
                              <div class="messages msg_receive">
                                <p>that mongodb thing looks good, huh?
                                  tiny master db, and huge document store</p>
                                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                </div>
                              </div>
                            </div>

                            <div class="row msg_container send">
                              <div class="col-md-9 col-xs-9 bubble">
                                <div class="messages msg_sent">
                                  <p>that mongodb thing looks good, huh?
                                    tiny master db, and huge document store</p>
                                    <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                  </div>
                                </div>
                                <div class="col-md-3 col-xs-3 avatar">
                                  <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                </div>
                              </div>

                              <div class="row msg_container receive">
                                <div class="col-md-3 col-xs-3 avatar">
                                  <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                </div>
                                <div class="col-md-9 col-xs-9 bubble">
                                  <div class="messages msg_receive">
                                    <p>that mongodb thing looks good, huh?
                                      tiny master db, and huge document store</p>
                                      <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                  </div>
                                </div>

                                <div class="row msg_container send">
                                  <div class="col-md-9 col-xs-9 bubble">
                                    <div class="messages msg_sent">
                                      <p>that mongodb thing looks good, huh?
                                        tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                      </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3 avatar">
                                      <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                  </div>

                                  <div class="row msg_container receive">
                                    <div class="col-md-3 col-xs-3 avatar">
                                      <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                    <div class="col-md-9 col-xs-9 bubble">
                                      <div class="messages msg_receive">
                                        <p>that mongodb thing looks good, huh?
                                          tiny master db, and huge document store</p>
                                          <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="chat-input">
                                <textarea placeholder="type your message here.."></textarea>
                              </div>
                              <div class="user-list">
                                <ul>
                                  <li class="online">
                                    <a href=""  data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <div class="user-avatar"><img src="asset/img/avatar.jpg" alt="user name"></div>
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="online">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="online">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div id="right-menu-notif" class="tab-pane fade">

                            <ul class="mini-timeline">
                              <li class="mini-timeline-highlight">
                               <div class="mini-timeline-panel">
                                <h5 class="time">07:00</h5>
                                <p>Coding!!</p>
                              </div>
                            </li>

                            <li class="mini-timeline-highlight">
                             <div class="mini-timeline-panel">
                              <h5 class="time">09:00</h5>
                              <p>Playing The Games</p>
                            </div>
                          </li>
                          <li class="mini-timeline-highlight">
                           <div class="mini-timeline-panel">
                            <h5 class="time">12:00</h5>
                            <p>Meeting with <a href="#">Clients</a></p>
                          </div>
                        </li>
                        <li class="mini-timeline-highlight mini-timeline-warning">
                         <div class="mini-timeline-panel">
                          <h5 class="time">15:00</h5>
                          <p>Breakdown the Personal PC</p>
                        </div>
                      </li>
                      <li class="mini-timeline-highlight mini-timeline-info">
                       <div class="mini-timeline-panel">
                        <h5 class="time">15:00</h5>
                        <p>Checking Server!</p>
                      </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-success">
                      <div class="mini-timeline-panel">
                        <h5 class="time">16:01</h5>
                        <p>Hacking The public wifi</p>
                      </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-danger">
                      <div class="mini-timeline-panel">
                        <h5 class="time">21:00</h5>
                        <p>Sleep!</p>
                      </div>
                    </li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>

                </div>
                <div id="right-menu-config" class="tab-pane fade">
                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Notification</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-info">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch1" checked>
                        <label class="onoffswitch-label" for="myonoffswitch1"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Custom Designer</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-danger">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch2" checked>
                        <label class="onoffswitch-label" for="myonoffswitch2"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Autologin</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-success">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch3" checked>
                        <label class="onoffswitch-label" for="myonoffswitch3"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Auto Hacking</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-warning">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch4" checked>
                        <label class="onoffswitch-label" for="myonoffswitch4"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Auto locking</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch5" checked>
                        <label class="onoffswitch-label" for="myonoffswitch5"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>FireWall</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch6" checked>
                        <label class="onoffswitch-label" for="myonoffswitch6"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>CSRF Max</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-warning">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch7" checked>
                        <label class="onoffswitch-label" for="myonoffswitch7"></label>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Man In The Middle</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-danger">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch8" checked>
                        <label class="onoffswitch-label" for="myonoffswitch8"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Auto Repair</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-success">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch9" checked>
                        <label class="onoffswitch-label" for="myonoffswitch9"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <input type="button" value="More.." class="btnmore">
                  </div>

                </div>
              </div>
            </div>  
          <!-- end: right menu -->
          
      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="active ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Dashboard 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="dashboard-v1.blade.php">Dashboard v.1</a></li>
                          <li><a href="dashboard-v2.blade.php">Dashboard v.2</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span>Layout
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="topnav.blade.php">Top Navigation</a></li>
                        <li><a href="boxed.blade.php">Boxed</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Charts
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="chartjs.blade.php">ChartJs</a></li>
                        <li><a href="morris.blade.php">Morris</a></li>
                        <li><a href="flot.blade.php">Flot</a></li>
                        <li><a href="sparkline.blade.php">SparkLine</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span>Ui Elements
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="color.blade.php">Color</a></li>
                        <li><a href="weather.blade.php">Weather</a></li>
                        <li><a href="typography.blade.php">Typography</a></li>
                        <li><a href="icons.blade.php">Icons</a></li>
                        <li><a href="buttons.blade.php">Buttons</a></li>
                        <li><a href="media.blade.php">Media</a></li>
                        <li><a href="panels.blade.php">Panels & Tabs</a></li>
                        <li><a href="notifications.blade.php">Notifications & Tooltip</a></li>
                        <li><a href="badges.blade.php">Badges & Label</a></li>
                        <li><a href="progress.blade.php">Progress</a></li>
                        <li><a href="sliders.blade.php">Sliders</a></li>
                        <li><a href="timeline.blade.php">Timeline</a></li>
                        <li><a href="modal.blade.php">Modals</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                       <span class="fa fa-check-square-o"></span>Forms
                       <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="formelement.blade.php">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-table"></span>Tables
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.blade.php">Data Tables</a></li>
                        <li><a href="handsontable.blade.php">handsontable</a></li>
                        <li><a href="tablestatic.blade.php">Static</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="calendar.blade.php">
                         <span class="fa fa-calendar-o"></span>Calendar
                      </a>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-envelope-o"></span>Mail
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.blade.php">Inbox</a></li>
                        <li><a href="compose-mail.blade.php">Compose Mail</a></li>
                        <li><a href="view-mail.blade.php">View Mail</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-file-code-o"></span>Pages
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="forgotpass.blade.php">Forgot Password</a></li>
                        <li><a href="login.blade.php">SignIn</a></li>
                        <li><a href="reg.blade.php">SignUp</a></li>
                        <li><a href="article-v1.blade.php">Article v1</a></li>
                        <li><a href="search-v1.blade.php">Search Result v1</a></li>
                        <li><a href="productgrid.blade.php">Product Grid</a></li>
                        <li><a href="profile-v1.blade.php">Profile v1</a></li>
                        <li><a href="invoice-v1.blade.php">Invoice v1</a></li>
                      </ul>
                    </li>
                     <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="view-mail.blade.php">Level 1</a></li>
                        <li><a href="view-mail.blade.php">Level 1</a></li>
                        <li class="ripple">
                          <a class="sub-tree-toggle nav-header">
                            <span class="fa fa-envelope-o"></span> Level 1
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list sub-tree">
                            <li><a href="mail-box.blade.php">Level 2</a></li>
                            <li><a href="compose-mail.blade.php">Level 2</a></li>
                            <li><a href="view-mail.blade.php">Level 2</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="credits.blade.php">Credits</a></li>
                  </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->

<!-- start: Javascript -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery.ui.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

   
    
    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/icheck.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>


    <!-- custom -->
     <script src="asset/js/main.js"></script>
     <script type="text/javascript">
      (function(jQuery){
           $('input').iCheck({
              checkboxClass: 'icheckbox_flat-red',
              radioClass: 'iradio_flat-red'
            });
        })(jQuery);
     </script>
  <!-- end: Javascript -->
  </body>
</html>