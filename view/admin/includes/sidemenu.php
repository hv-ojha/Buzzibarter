<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
          <img src="images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
        </div>
        <div class="info float-left">
          <p><?php echo $res["adm_name"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
		  <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="active">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="latest_product.php">Latest</a></li>
            <li><a href="pending_product.php">Pending Review</a></li>
            <li><a href="verified_product.php">Verified</a></li>
          </ul>
        </li>
        <li class="">
          <a href="categories.php">
            <i class="fa fa-th"></i>
			  <span>Categories</span>
          </a>
        </li>
        <li>
          <a href="sub_categories.php">
            <i class="fa fa-th"></i>
			  <span>Sub-Categories</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-map-marker"></i>
            <span>Location</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="country.php">Country</a></li>
            <li><a href="state.php">State</a></li>
            <li><a href="city.php">City</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gavel"></i>
            <span>Bidding</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="latest_bidding.php">Latest</a></li>
            <li><a href="winner_bidding.php">Winners</a></li>
            <li><a href="running_bidding.php">Running</a></li>
          </ul>
        </li>
        <li>
          <a href="transaction.php">
            <i class="fa fa-th"></i>
			  <span>Transactions</span>
          </a>
        </li>
		<li>
          <a href="user.php">
            <i class="fa fa-th"></i>
			  <span>Users</span>
          </a>
        </li>
        <li>
          <a href="site_setting.php">
            <i class="fa fa-table"></i> 
            <span>Site Setting</span>
          </a>
        </li>
      </ul>
    </section>
    <div class="sidebar-footer">
		<!-- item-->
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a>
		<!-- item-->
		<a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a>
		<!-- item-->
		<a href="index.php?lg='true'" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
	</div>
  </aside>