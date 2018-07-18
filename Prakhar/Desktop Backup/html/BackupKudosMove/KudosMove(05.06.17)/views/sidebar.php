      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                   <li>
                      <a href="<?php echo base_url(); ?>Dashboard/index">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a href="<?php echo base_url(); ?>Dashboard/list_users">
                          <i class="fa fa-user"></i>
                          <span>Customers</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-glass"></i>
                          <span>Service Providers</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url(); ?>Dashboard/list_drivers">MovingBased</a></li>
                          <li><a  href="<?php echo base_url(); ?>Dashboard/list_electricians">HourlyBased</a></li>
                   <!--        <li><a  href="#">Painter</a></li>
                          <li><a  href="#">Dumping</a></li>
                          <li><a  href="#">Cleaning</a></li>
                          <li><a  href="#">Plumber</a></li> -->
                      </ul>
                  </li>
<!-- 
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-book"></i>
                          <span>UI Elements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="general.html">General</a></li>
                          <li><a  href="buttons.html">Buttons</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-cogs"></i>
                          <span>Components</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="grids.html">Grids</a></li>
                      </ul>
                  </li> -->
                  <li class="sub-menu">
                      <a href="javascript:;" id="form_stuffa">
                          <i class="fa fa-tasks"></i>
                          <span>Category</span>
                      </a>
                      <ul class="sub" id="form_stuffsub">
                          <li id="add_eventli"><a  href="<?php echo base_url(); ?>Dashboard/add_category">Add Category</a></li>
                          <li id="report_eventli"><a  href="<?php echo base_url(); ?>Dashboard/listCategories">List Category</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" id="data_tablesa" >
                          <i class="fa fa-th"></i>
                          <span>Sub-Category</span>
                      </a>
                      <ul class="sub" id="data_tablessub">
                          <li id="eventsli"><a  href="<?php echo base_url(); ?>Dashboard/add_subcategory">Add SubCategory</a></li>
                          <li id="reported_eventsli"><a  href="<?php echo base_url(); ?>Dashboard/listSubCategories">List SubCategory</a></li>
                         
                      </ul>
                  </li>
                  <!-- <li>
                      <a  href="inbox.html">
                          <i class="fa fa-envelope"></i>
                          <span>Mail </span>
                          <span class="label label-danger pull-right mail-info">2</span>
                      </a>
                  </li> -->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>SubCategory Services</span>
                      </a>
                      <ul class="sub">
                          <li id="reported_eventsli"><a  href="<?php echo base_url(); ?>Dashboard/add_services">Add Services</a></li>
                          <li id="reported_eventsli"><a  href="<?php echo base_url(); ?>Dashboard/listServices">List Services</a></li>
                      </ul>
                  </li>
                  
                  <li>
                      <a href="<?php echo base_url(); ?>Dashboard/serviceRequest">
                          <i class="fa fa-shopping-cart"></i>
                          <span>Requested Services</span>
                      </a>
                  </li>

                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-shopping-cart"></i>
                          <span>Shop</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="product_list.html">List View</a></li>
                          <li><a  href="product_details.html">Details View</a></li>
                      </ul>
                  </li> -->

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-map-marker"></i>
                          <span>Maps</span>
                      </a>
                      <ul class="sub">
                          <li id="reqMapli"><a  href="<?php echo base_url(); ?>Dashboard/reqMap">Requested Services</a></li>
                          <li id="serviceProvidersli"><a  href="<?php echo base_url(); ?>Dashboard/serviceProvidersMap">Service Providers</a></li>
                      </ul>
                  </li>                 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-glass"></i>
                          <span>Promocodes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url(); ?>Dashboard/addPromocode">Add Promocode</a></li>
                          <li><a  href="<?php echo base_url(); ?>Dashboard/promocodeList">Promocodes List</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-bolt"></i>
                          <span>Membership</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url(); ?>Dashboard/addMembership">Add Membership</a></li>
                          <li><a  href="<?php echo base_url(); ?>Dashboard/membershipList">Membership List</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-car"></i>
                          <span>DriverSubscriptions</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url(); ?>Dashboard/addSubscription">Add Subscription</a></li>
                          <li><a  href="<?php echo base_url(); ?>Dashboard/listSubsciptions">Subscriptions List</a></li>
                      </ul>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>Dashboard/pushNotification">
                        <i class="fa fa-sitemap"></i>
                        <span>Send Notifications</span>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo base_url(); ?>Dashboard/pay_providers">
                        <i class="fa fa-credit-card-alt"></i>
                        <span>Pay ServiceProviders</span>
                    </a>
                  </li>

                  <li>
                    <a href="<?php echo base_url(); ?>Dashboard/settings">
                        <i class="fa fa-wrench"></i>
                        <span>Settings</span>
                    </a>
                  </li>
                  <!-- <li>
                      <a  href="login.html">
                          <i class="fa fa-hand-o-right"></i>
                          <span>Login Page</span>
                      </a>
                  </li>  -->

                  <!--multi level menu start-->
                  <!-- <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-sitemap"></i>
                          <span>Multi level Menu</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="javascript:;">Menu Item 1</a></li>
                          <li class="sub-menu">
                              <a  href="boxed_page.html">Menu Item 2</a>
                              <ul class="sub">
                                  <li><a  href="javascript:;">Menu Item 2.1</a></li>
                                  <li class="sub-menu">
                                      <a  href="javascript:;">Menu Item 3</a>
                                      <ul class="sub">
                                          <li><a  href="javascript:;">Menu Item 3.1</a></li>
                                          <li><a  href="javascript:;">Menu Item 3.2</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </li> -->
                  <!--multi level menu end-->

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      