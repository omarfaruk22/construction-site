    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Admin <i>Area</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{route('dashboard')}}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
          <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Admin Area</label>
        
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-user"></i>
            <span class="menu-item-label">Admin</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
           
            <li class="sub-item"><a href="{{route('adminmanage')}}" class="sub-link">Manage Admin</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Post</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('postcreate')}}" class="sub-link">Add Post</a></li>
            <li class="sub-item"><a href="{{route('postmanage')}}" class="sub-link">Manage Post</a></li>
          </ul>
        </li>
      
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-users"></i>
            <span class="menu-item-label">Employee</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('employeecreate')}}" class="sub-link">Add Employee</a></li>
            <li class="sub-item"><a href="{{route('employeemanage')}}" class="sub-link">Manage Employee</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-user"></i>
            <span class="menu-item-label">Clients</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('clientcreate')}}" class="sub-link">Add clients</a></li>
            <li class="sub-item"><a href="{{route('clientmanage')}}" class="sub-link">Manage clients</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fa fa-question"></i>
            <span class="menu-item-label">Query</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('querycreate')}}" class="sub-link">Add Query</a></li>
            <li class="sub-item"><a href="{{route('querymanage')}}" class="sub-link">Manage Query</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-list outline tx-20"></i>
            <span class="menu-item-label">Category</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('createcategory')}}" class="sub-link">Manage Category</a></li>
          
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fab fa-blogger-b"></i>
            <span class="menu-item-label">Blog</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('blogpostcreate')}}" class="sub-link">Add Blog</a></li>
            <li class="sub-item"><a href="{{route('blogpostmanage')}}" class="sub-link">Manage Blog</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="fas fa-comment"></i>
            <span class="menu-item-label">Comment</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{route('bgcommentmanage')}}" class="sub-link">Blog Comment</a></li>
            <li class="sub-item"><a href="{{route('commentmanage')}}" class="sub-link">Post Comment</a></li>
          </ul>
        </li>
        <li class="br-menu-item">
          <a href="{{route('contactmanage')}}" class="br-menu-link ">
            <i class="fas fa-address-book"></i>
            <span class="menu-item-label">Contact</span>
          </a><!-- br-menu-link -->
        
        </li>
        
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->