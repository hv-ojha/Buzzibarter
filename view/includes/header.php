<nav class="ui-nav">
    <div class="logo"><a href="index.php">BuzziBarter</a></div>
    <ul class="list-unstyled menu">
        <li class="list-inline-item menu-li">
            <a href="index.php">Home</a>
        </li>
        <li class="list-inline-item menu-li">
			<a href="listing_two.php">Listings</a>
        </li>
        <li class="list-inline-item menu-li">
            <a href="aboutus.php">About Us</a>
        </li>
        <li class="list-inline-item menu-li">
            <a href="#">Dashboard <i class="fa fa-angle-down"></i></a>
            <ul class="list-unstyled drop">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="dashProfile.php">Profile</a></li>
                <li><a href="website.php">Websites</a></li>
                <li><a href="domain.php">Domain Name</a></li>
                <li><a href="application.php">Applications</a></li>
                <li><a href="manage_biding.php">Manage Bids</a></li>
                <li><a href="winning.php">Winnings</a></li>
                <li><a href="biding.php">My Bidings</a></li>
            </ul>
        </li>
        <li class="list-inline-item menu-li"><a href="pricing.php">Membership Plans</a></li>
        <li class="list-inline-item menu-li"><a href="contact.php">Contact Us</a></li>
        <?php if(isset($_SESSION['user_id'])) { ?>
			<li class="list-inline-item menu-li"><a href="index.php?lg=true">Log Out</a></li>
		<?php } 
		else
		{ ?>
			<li class="list-inline-item menu-li">
			<a href="#">Account <i class="fa fa-angle-down"></i></a>
				<ul class="list-unstyled drop">
					<li><a href="login.php">Log In</a></li>
					<li><a href="register1.php">Sign Up</a></li>
				</ul>
			</li>
<?php		
		}?>
		<?php
        if(isset($_SESSION['user_id'])) {
        ?>
        <li class="list-inline-item menu-li">
            <a href="#" class="notifs">
                <i class="fa fa-bell"></i>
            </a>
            <ul class="list-unstyled drop">
            <?php
                $u_noti = $res['user_id'];
                $noti = mysql_query("select * from notification where user_id=$u_noti");
                if(mysql_num_rows($noti)>0)
                {
                    while($noti_row=mysql_fetch_array($noti))
                    {
                ?>
                    <li class="info"><a href="biding.php" class="text-dark"><?php echo $noti_row["description"] ?></a></li>
                <?php
                    }
                }
                else
                {
            ?>
                    <li>No new notification</li>
            <?php
                }
            ?>
            </ul>
        </li>
        <li class="list-inline-item menu-li">
            <a href="#" class="notifs">
                <i class="fa fa-credit-card"></i>
            </a>
            <ul class="list-unstyled drop">
            <?php   
            $w = $res['user_id'];
            $wall = "select * from wallet where user_id=$w";
            $wall_query = mysql_query($wall);
            $wall_res = mysql_fetch_array($wall_query);
            ?>
                <li><h5 class="text-center">Wallet</h5></li>
                <hr>
                <li><p class="text-left">Amount: <?php echo $wall_res["amount"] ?></p></li>
                <li><a href="payment.php?user_id=<?php echo $res["user_id"] ?>" class="btn btn-ui btn-success">Add Money</a></li>
                <li><a href="#" class="btn btn-ui btn-info">Extract Money</a></li>
            </ul>
        </li>
        <?php
        }
        ?>
		<?php if(isset($_SESSION['user_id'])) { ?>
        <li class="list-inline-item menu-li">
            <a href="dashProfile.php"><img src="<?php echo $res["photo"]; ?>" alt=""></a>
        </li>
		<?php } ?>
    </ul>
    <i class="fa fa-bars open-menu"></i>
</nav>