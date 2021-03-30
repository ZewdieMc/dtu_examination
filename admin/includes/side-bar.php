  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="dropdown profile-element"> <span>

<img  class='img-circle' alt="image" style="width:100px;height:80px;";class="img-box" src="../User_Images /" />
</span>
<a data-toggle="dropdown" class="dropdown-toggle" href="#">
<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"></strong>
</span> <span class="text-muted text-xs block"> <b class="caret"></b></span> </span> </a>
<ul class="dropdown-menu animated fadeInRight m-t-xs">
<li><a href="change_password.php">Change Password</a></li>
<li class="divider"></li>
<li><a href="change_profile.php">Change Profile</a></li>
<li class="divider"></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>

<div class="logo-element">
DTU
</div>

    <!-- Sidebar -->
    <div class="sidebar">
       Sidebar user panel (optional) 
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/giza.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="home.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            
            </ul>
          </li>
         

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Faculty Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>
                    Add
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo SITEURL;?>/admin/index.php?page=add_faculty" class="nav-link">
                      <i class="far fa-building nav-icon"></i>
                      <p>Faculty</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-user nav-icon"></i>
                      <p>Faculty Deans</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li> -->
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>View</p>
            </a>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                View
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
              <li class="nav-item">
              <a href="<?php echo SITEURL?>admin/index.php?page=faculty" class="nav-link">
                  <i class="fas fa-building nav-icon"></i>
                  <p>Faculty</p>
                </a>
                <a href="data-table.php" class="nav-link">
                  <i class="fas fa-file nav-icon"></i>
                  <p>Reports</p>
                </a>
                   <a href="data-table.php" class="nav-link">
                  <i class="fa fa-unlock nav-icon"></i>
                  <p>Exam Status</p>
                </a>

              </li>
             
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Account Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>
                    Update
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-building nav-icon"></i>
                      <p>Change Password</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-user nav-icon"></i>
                      <p>Change Profile</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li> -->
            </ul>
          </li>

         
          
      
      
        
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
