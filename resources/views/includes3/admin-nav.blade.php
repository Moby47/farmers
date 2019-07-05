<div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a  href="/dashhboard">
         <img src="{{ asset('images/dstreet-logo2.png') }}" class="logo-size" 
                title="welcome to dstreet" alt="dstreet logo buy and sell in nigeria"/></a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
            <ul class="dropdown-menu">
            
                <!-- dont remove!!!!!!! -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
              </form>
            <!-- dont remove!!!!!!! -->
            
            </ul>
          </li>
    </ul>
    <form class="navbar-form navbar-right">
    <div class="text-center">
      <a href="/" class="btn btn-primary font">Back to Site</a>
      <a href="{{ route('logout') }}" class="btn btn-danger font"  onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Logout</a>
  </div>
   
      
  
    </form>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/dashhboard" class='font'><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                </li>
               
                <li>
                    <a href="#" class='font'><i class="fa fa-bullhorn nav_icon"></i>Posts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       
                        <li>
                            <a href="/admin-manage-post" class='font'><i class="fa fa-edit nav_icon"></i>Manage</a>
                        </li>
                        <li>
                            <a href="/approved_posts" class='font'><i class="fa fa-thumbs-up nav_icon"></i>Approved</a>
                        </li>
                        <li>
                            <a href="/declined_posts" class='font'><i class="fa fa-thumbs-down nav_icon"></i>Declined</a>
                        </li>
                    </ul>
                   
                </li>

                <li>
                    <a href="#" class='font'><i class="fa fa-users nav_icon"></i>Admins<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       
                        <li>
                            <a href="/create-admin" class='font'><i class="fa fa-edit nav_icon"></i>Create</a>
                        </li>
                        <li>
                            <a href="/view_admins" class='font'><i class="fa fa-eye nav_icon"></i>View</a>
                        </li>
                    </ul>
                   
                </li>
                

            
            <li>
                    <a href="#" class='font'><i class="fa fa-envelope nav_icon"></i>Manage Ads<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       
                        <li>
                            <a href="/manage_ads" class='font'><i class="fa fa-briefcase nav_icon"></i>General</a>
                        </li>
                        <li>
                            <a href="/custom_ads" class='font'><i class="fa fa-star nav_icon"></i>Custom</a>
                        </li>
                    </ul>
                   
                </li>
           
                <li>
                        <a href="/admin-post" class='font'><i class="fa fa-bullhorn nav_icon"></i>Admin Post</a>
                    </li>

                <li>
                        <a href="/project-page" class='font'><i class="fa fa-book nav_icon"></i>Projects</a>
                    </li>
                <li>
                    <a href="/question" class='font'><i class="fa fa-question nav_icon"></i>Questions</a>
                </li>
                <li>
                        <a href="/manage-requests" class='font'><i class="fa fa-truck nav_icon"></i>Requests</a>
                    </li>
                <li>
                        <a href="/reports" class='font'><i class="fa fa-warning fa-fw nav_icon"></i>Reports</a>
                    </li>
                <li>
                    <a href="/log" class='font'><i class="fa fa-archive nav_icon"></i>Activity Log</a>
                </li>
                <li>
                        <a href="#" class='font'><i class="fa fa-cogs nav_icon"></i>Settings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                           
                            <li>
                                <a href="/site-settings" class='font'><i class="fa fa-file nav_icon"></i>Exports</a>
                            </li>
                            <li>
                                <a href="/users" class='font'><i class="fa fa-users nav_icon"></i>Users</a>
                            </li>
                            <li><!-- to server-->
                                <a href="/mail-marketing" class='font'><i class="fa fa-bullhorn nav_icon"></i>Mailing</a>
                            </li>
                        </ul>
                       
                    </li>
               
            
                       
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->