<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>Chat</strong>-SYSTEM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img class="img-circle elevation-2 " id="picture" alt="User Image" style="width:70px; height:70px">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize pl-2 text-bold pt-3" id="user-name"></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline" id="frm">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" id="srhFrnd" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">FRIENDS</li>
                  <div id="friendds">
                     <!-- <li class="nav-item" id="frnds">
                     <a href='javascript:void(0)' class='nav-link'>
                     <i id="abc" class="far fa-circle nav-icon text-success"></i>
                     <p>Name</p>
                     </a>
                     </li>  -->
                     
                     </div>
               
         <li class="nav-header p-2">CONTROLS</li>
        <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Controls
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="email.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link" onclick="logOut()">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Log Out</p>
                </a>
              </li>
          </a>
              </li>
            </ul>
          </li>
       </ul>
      </nav>
    </div>
  </aside>
  <script>
  function logOut(){
   window.location.href = "ajax.php?logout=true";
   }
   </script>
 