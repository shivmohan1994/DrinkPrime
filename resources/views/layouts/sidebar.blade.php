<div class="nav-side-menu">
    <div class="brand"><a href="{{ url('/') }}" style="color:white"><i class="fa fa-glass" style="color:gold"></i> DrinkPrime</a></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                  <a href="#">
                    <i class="fa fa-dashboard fa-lg"></i> Dashboard
                  </a>
                </li>

                <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                  <a href="#"><i class="fa fa-user-circle-o fa-lg"></i> Leads <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="{{'getLeads'}}">New Leads</a></li>
                    <li><a href="{{'newLead'}}">Create New Leads</a></li>
                </ul>
                <li  class="collapsed active">
                  <a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-lg"></i> LogOut </a>
                </li>
            </ul>
     </div>
</div>