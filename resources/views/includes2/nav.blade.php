<div class="navbar-header marg">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a  href="/dashboard">
         <img src="{{ asset('images/dstreet-logo2.png') }}" class="logo-size" 
                title="welcome to dstreet" alt="dstreet logo buy and sell in nigeria"/></a>
    </div>
    
    <!-- /.navbar-header -->
    <ul class="nav navbar-nav navbar-right ">
        
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
      <a href="/" class="btn btn-primary font">Go To Site</a>
      <a href="{{ route('logout') }}" class="btn btn-danger font"  onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">Logout</a>

  </div>
   
      
  
    </form>
    <div class="navbar-default sidebar " role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
        
                <li>
                    <a href="/dashboard" class='font'><i class="fa fa-dashboard fa-fw nav_icon "></i>Dashboard</a>
                </li>
                <li>
                    <a href="#"  class='font'><i class="fa fa-bullhorn nav_icon"></i>Post<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('post-page')}}"  class='font'><i class="fa fa-pencil nav_icon"></i>Create</a>
                        </li>
                        <li>
                            <a href="/manage-post"  class='font'><i class="fa fa-edit nav_icon"></i>Manage</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
              

                <li>
                    <a href="#"  class='font'><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                       
                        <li>
                            <a href="/new-message"  class='font'><i class="fa fa-bell-o nav_icon"></i>New Conversations     (<span class=''>{{$unread}}</span>)</a>
                        </li>
                        <li>
                            <a href="/message-feedback"  class='font'><i class="fa fa-reply nav_icon"></i>Running Conversations     (<span class=''>{{$running}}</span>)</a>
                        </li>
                    </ul>
                   
                </li>

              <li>
                    <a href="{{route('request-page')}}"  class='font'><i class="fa fa-truck nav_icon"></i>Requests</a>
                </li>
                <li>
                    <a href="#"  class='font'><i class="fa fa-star nav_icon"></i>Favourites<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="/favourites"  class='font'><i class="fa fa-bullhorn nav_icon"></i>Post</a>
                        </li>
                        <li>
                            <a href="/favourites-ad"  class='font'><i class="fa fa-bell nav_icon"></i>Advert</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                        <a href="#"  class='font'><i class="fa fa-credit-card nav_icon"></i>Premium ADs<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                    <a href="/ads"  class='font'><i class="fa fa-certificate nav_icon"></i>New</a>
                            </li>
                            <li>
                                    <a href="/payment_history"  class='font'><i class="fa fa-info  nav_icon"></i>Overview</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                <li>
                    <a href="/profile"  class='font'><i class="fa fa-user nav_icon"></i>User Profile</a>
                </li>

                
                 
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->