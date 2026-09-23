<style>
    select.form-control[multiple], select.form-control[size] {
        min-height: 331px;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('assets-admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <?php
    $var = explode('/', request()->route()->uri);
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
        <?php if ($var[0] == 'seo') { ?>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="" onclick="location.href ='{{url('seo/dashboard')}}';">
                      <a href="{{url('seo/dashboard')}}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Home Page Component
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('seo/homepage/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Navigation 
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('seo/navigation/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('seo/navigation/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              category
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item">
                              <a href="{{url('seo/category/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('seo/category/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Sub category
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item">
                              <a href="{{url('seo/subcategory/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('seo/subcategory/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
        <?php } else { ?>
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="" onclick="location.href ='{{url('admin/dashboard')}}';">
                      <a href="{{url('admin/dashboard')}}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">


                      </ul>
                  </li>


                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Category
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/speciality/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/speciality/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>  
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Sub category
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/subspeciality/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/subspeciality/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Banner/Video Upload
                              <i class="fas fa-angle-left right"></i>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/banner/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/banner/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Faculty
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/doctors/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/doctors/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              CMS
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/cms/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/cms/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Blogs
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/blogs/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/blogs/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Events
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/events/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/events/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Leads
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item">
                              <a href="{{url('admin/leads/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              Image Upload
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('admin/image/add')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/image/list')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>List</p>
                              </a>
                          </li>
                      </ul> 
                  </li>
          </nav>
        <?php } ?>  
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>