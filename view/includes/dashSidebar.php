<div class="side-nav">
    <div class="dash-logo">
        <i class="fa fa-times cls-nav"></i>
        <h2>Buzzibarter</h2>
    </div>
    <div class="links-container">
        <div class="panel-user">
            <div class="panel-user-img">
                <img src="<?php echo $res["photo"]; ?>" alt="No image to display">
            </div>
            <a href="#"><strong><?php echo $res["user_name"]; ?></strong></a>
        </div>
        <ul class="list-unstyled dash-links">
            <li><a href="dashboard.php" class="active"><i class="fa fa-th-large"></i> <span>Dashboard</span></a></li>
            <li><a href="dashProfile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <li><a href="dashchangePwd.php"><i class="fa fa-key"></i> <span>Change Password</span></a></li>

            <li class="list-unstyled">
				<a href="#"><i class="fa fa-user"></i> <span>Selling</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a> 
				<ul>
					<li class="list-inline-item menu-li"><a href="website.php">Website</a></li>
					<li class="list-inline-item menu-li"><a href="application.php">Application</a></li>
					<li class="list-inline-item menu-li"><a href="domain.php">Domain</a></li> 
				</ul>
			</li>
			<li class="list-unstyled">
				<a href="#"><i class="fa fa-user"></i> <span>Bids on Product</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a> 
				<ul>
					<li class="list-inline-item menu-li"><a href="manage_biding.php">Pending Bids</a></li>
                    <li class="list-inline-item menu-li"><a href="short_listed_biddings.php">Short Listed Bids</a></li>
                    <li class="list-inline-item menu-li"><a href="winning_bids.php">Winning Bids</a></li>
				</ul>
			</li>
			<li class="list-unstyled">
                <a href="#"><i class="fa fa-user"></i> <span>Purchasing</span> <span class="fa fa-angle-right" style="float:right"></span><div class="clearfix"></div></a> 
				<ul> 
					<li class="list-inline-item menu-li"><a href="biding.php">Biding</a></li>
					<li class="list-inline-item menu-li"><a href="winning.php">Winning</a></li>
					<li class="list-inline-item menu-li"><a href="transaction.php">Transactions</a></li>					
				</ul>
			</li>
        </ul>
        <div class="logout"><a href="index.php?lg=true">Logout</a></div>
    </div>
</div>