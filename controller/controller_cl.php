<?php
include_once('../model/model.php');
include_once('includes/ses.php');
class controller_cl
{
    //Category Select
    function cat_select()
    {
        $tbl = 'category';
        $obj = new model;
        $rs = $obj->sel($tbl);
        return $rs;
    }

    //Sub Category Select Join Query
    function sub_cat_join()
    {
        $tbl = "sub_category";
        $col = "category_id";
        $tables = array("category" => "category_id");

        $obj = new model;
        $sub_cat = $obj->sel_join($tbl,$tables);
        return $sub_cat;
    }

    //Country Select
    function coun_select()
    {
        $tbl = 'country';
        $obj = new model;
        $rs = $obj->sel($tbl);
        return $rs;
    }

    //State Select Join Query
    function state_join()
    {
        $tbl = "state";
        $col = "country_id";
        $tables = array("country" => "country_id");

        $obj = new model;
        $sub_cat = $obj->sel_join($tbl,$tables);
        return $sub_cat;
    }

    //City SELECT
    function city_select()
    {
        $tbl = "city";
        $tables = array("country" => "country_id", "state" => "state_id");

        $obj = new model;
        $city = $obj->sel_join($tbl,$tables);
        return $city;
    }

    //Profile Update
    function prof_upd($id)
    {
        if(isset($_REQUEST["upd_all"]))
        {
            $name ="'".$_REQUEST['fname']."'";
            $add ="'".$_REQUEST['add']."'";
            $con ="'".$_REQUEST['con_upd']."'";
            $state ="'".$_REQUEST['state_upd']."'";
            $city ="'".$_REQUEST['city_upd']."'";
            $mob =$_REQUEST['mob_no'];
            $email ="'".$_REQUEST['email']."'";
            $tbl = "user";

            $field= array("user_name" => $name,
            "address" => $add, 
            "country" => $con,
            "state" => $state,
            "city" => $city,
            "mobile_no" => $mob,
            "email_id" => $email,
            );
            $where = array("user_id", $id);
            $obj = new model;
            $obj->update($tbl,$field,$where);
            header('location: dashProfile.php');
        }    
    }

	//Profile Picture Update
    function prof_pic_upd($id,$pic)
    {
        if(isset($_REQUEST["pic_upd"]))
        {
            unlink($pic);
            $file = $_FILES["pic"]["name"];
            $tmp = $_FILES["pic"]["tmp_name"];
            $path="uploads/";
            $ps = $path.$file;
            move_uploaded_file($tmp,$ps);
            $path = "'".$ps."'";
            $tbl = "user";

            $fields = array("photo" => $path);
            $where = array("user_id", $id);
            $obj = new model;
            $obj->update($tbl,$fields,$where);
            header('location: dashProfile.php');
        }
    }
	
	//Website Upload
	function website_upload()
	{
		if(isset($_REQUEST['web_upd']))
		{
			$topic =$_REQUEST['web_top'];
			$des =$_REQUEST['web_des'];
			$domain =$_REQUEST['web_domain'];
			$bid =$_REQUEST['web_bid'];
			$category = $_REQUEST['web_cat'];
			$sub_category = $_REQUEST['web_sub_cat'];
			$last_date = $_REQUEST['last_date'];
			$id = $_SESSION['user_id'];
			$dt = new datetime();
			$up_date = date_format($dt,"Y-m-d");
			$ver = "Not Verified";
			$dom_inc = $_REQUEST['dom_inc'];
			$cli_data = $_REQUEST['cli_data'];
			$cus_upd = $_REQUEST['cus_upd'];
			$ser = $_REQUEST['ser'];
			$demo = $_REQUEST['demo'];
			if($cus_upd=="Yes")
			{
				$cus_upd_price = $_REQUEST['cust_price'];
			}
			else
			{
				$cus_upd_price = 0;
			}
			
			$tbl = "website";
			$fields = array("website_topic","website_description","domain_name","category_id","sub_category_id","user_id","starting_bid","upload_date","last_date","verified","domain_including","custom_updates","custom_update_price","services","client_database","demo_url");
			$val = array($topic,$des,$domain,$category,$sub_category,$id,$bid,$up_date,$last_date,$ver,$dom_inc,$cus_upd,$cus_upd_price,$ser,$cli_data,$demo);
			$ob = new model;
			$ob->insert($tbl,$fields,$val);
		}
	}
	
	//Website Update
	function web_update($id)
	{
		if(isset($_REQUEST["upd_web"]))
        {
            $topic = "'".$_REQUEST['web_top']."'";
			$des = "'".$_REQUEST['web_des']."'";
			$domain = "'".$_REQUEST['web_domain']."'";
			$bid = "'".$_REQUEST['web_bid']."'";
			$last_date = "'".$_REQUEST['web_last_date']."'";
            $field = array('website_topic' => $topic,
			'website_description' => $des,
			'domain_name' => $domain,
			'starting_bid' => $bid,
			'last_date' => $last_date
			);
            $tbl = 'website';
            $where = array('website_id',$id);

            $obj = new model;
            $obj->update($tbl, $field, $where);
            header("location: website.php");
        }
	}
	
	//ALL website display
	function web_sel()
	{
		$tbl = "website";
        $tables = array("user" => "user_id");

        $obj = new model;
        $res = $obj->sel_join($tbl,$tables);
        return $res;
	}
	
	//Website SELECT where details
	function web_details($val)
	{
		$tbl="website";
		$field="website_id";
		$ob=new model;
		$res=$ob->sel_where($tbl,$field,$val);
		return $res;
	}
	
	//website detail description
	function web_details_where($val)
	{
		$tbl = "website";
        $tables = array("user" => "user_id");
		$where = "website_id";

        $obj = new model;
        $res = $obj->sel_join_where($tbl,$tables,$where,$val);
        return $res;
	}
	
	//Domain Upload
	function domain_upload()
	{
		if(isset($_REQUEST['dom_upd']))
		{
			$topic =$_REQUEST['dom_top'];
			$des =$_REQUEST['dom_des'];
			$domain =$_REQUEST['dom_name'];
			$bid =$_REQUEST['dom_bid'];
			$category = $_REQUEST['dom_cat'];
			$sub_category = $_REQUEST['web_sub_cat'];
			$last_date = $_REQUEST['last_date'];
			$id = $_SESSION['user_id'];
			$dt = new datetime();
			$up_date = date_format($dt,"Y-m-d");
			$ver = "Not Verified";
			
			$tbl = "domains";
			$fields = array("domain_topic","domain_description","domain_name","category_id","sub_category_id","user_id","starting_bid","upload_date","last_date","verified");
			$val = array($topic,$des,$domain,$category,$sub_category,$id,$bid,$up_date,$last_date,$ver);
			$ob = new model;
			$ob->insert($tbl,$fields,$val);
		}
	}

	//Domain Update
	function dom_update($id)
	{
		if(isset($_REQUEST["upd_dom"]))
        {
            $topic = "'".$_REQUEST['dom_top']."'";
			$des = "'".$_REQUEST['dom_des']."'";
			$domain = "'".$_REQUEST['dom_domain']."'";
			$bid = "'".$_REQUEST['dom_bid']."'";
			$last_date = "'".$_REQUEST['dom_last_date']."'";
            $field = array('domain_topic' => $topic,
			'domain_description' => $des,
			'domain_name' => $domain,
			'starting_bid' => $bid,
			'last_date' => $last_date
			);
            $tbl = 'domains';
            $where = array('domain_id',$id);

            $obj = new model;
            $obj->update($tbl, $field, $where);
            header("location: domain.php");
        }
	}

	//Domain Details
	function dom_details($val)
	{
		$tbl="domains";
		$field="domain_id";
		$ob=new model;
		$res=$ob->sel_where($tbl,$field,$val);
		return $res;
	}
	
	//domain detail description
	function dom_details_where($val)
	{
		$tbl = "domains";
        $tables = array("user" => "user_id");
		$where = "domain_id";

        $obj = new model;
        $res = $obj->sel_join_where($tbl,$tables,$where,$val);
        return $res;
	}
	
	//Application Upload
	function application_upload()
	{
		if(isset($_REQUEST['app_upd']))
		{
			$topic =$_REQUEST['app_top'];
			$des =$_REQUEST['app_des'];
			$app =$_REQUEST['app_name'];
			$bid =$_REQUEST['app_bid'];
			$category = $_REQUEST['dom_cat'];
			$api_key = $_REQUEST['api_key'];
			$type = "Android";
			$sub_category = $_REQUEST['web_sub_cat'];
			$last_date = $_REQUEST['last_date'];
			$id = $_SESSION['user_id'];
			$dt = new datetime();
			$up_date = date_format($dt,"Y-m-d");
			$ver = "Not Verified";
			
			$tbl = "application";
			$fields = array("application_topic","application_description","application_name","application_type","api_key","category_id","sub_category_id","user_id","starting_bid","upload_date","last_date","verified");
			$val = array($topic,$des,$app,$type,$api_key,$category,$sub_category,$id,$bid,$up_date,$last_date,$ver);
			$ob = new model;
			$ob->insert($tbl,$fields,$val);
		}
	}

	//Application Update
	function app_update($id)
	{
		if(isset($_REQUEST["upd_web"]))
		{
			$topic = "'".$_REQUEST['app_top']."'";
			$des = "'".$_REQUEST['app_des']."'";
			$name = "'".$_REQUEST['app_name']."'";
			$bid = "'".$_REQUEST['app_bid']."'";
			$api = "'".$_REQUEST['api_key']."'";
			$last_date = "'".$_REQUEST['app_last_date']."'";
			$field = array('application_topic' => $topic,
			'application_description' => $des,
			'application_name' => $name,
			'api_key' => $api,
			'starting_bid' => $bid,
			'last_date' => $last_date
			);
			$tbl = 'application';
			$where = array('application_id',$id);

			$obj = new model;
			$obj->update($tbl, $field, $where);
			header("location: application.php");
		}
	}

//APPLICATION DETAILS DISPLAY
	function app_details_where($val)
	{
		$tbl = "application";
        $tables = array("user" => "user_id");
		$where = "application_id";

        $obj = new model;
        $res = $obj->sel_join_where($tbl,$tables,$where,$val);
        return $res;
	}

	// DETAILS OF APPLICATION
	function app_details($val)
	{
		$tbl="application";
		$field="application_id";
		$ob=new model;
		$res=$ob->sel_where($tbl,$field,$val);
		return $res;
	}
	
//APPLICATION
	//Application Display
	function app_display()
	{
		$tbl = "application";
		$field = "user_id";
		$where = $_SESSION["user_id"];
		
		$ob = new model;
		$ss = $ob->sel_where($tbl, $field, $where);
		return $ss;
	}
	
	//Unpublish Application
	function unpub_app($id)
	{
		if(isset($_REQUEST["unpub"]))
        {
            $tbl = "application";
            $val = "'Unpublish'";
            $fields = array("publish" => $val);
            $where = array("application_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
			header('location:application.php');
        }
	}
	
	//Publish Website
	function pub_app($id)
	{
		if(isset($_REQUEST["pub"]))
        {
            $tbl = "application";
            $val = "'Publish'";
            $fields = array("publish" => $val);
            $where = array("application_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
			header('location:application.php');
        }
	}
	
//WEBSITES
	//Website Display
	function web_display()
	{
		$tbl = "website";
		$field = "user_id";
		$where = $_SESSION["user_id"];
		
		$ob = new model;
		$ss = $ob->sel_where($tbl, $field, $where);
		return $ss;
	}
	
	//Unpublish Website
	function unpub_web($id)
	{
		if(isset($_REQUEST["unpub"]))
        {
            $tbl = "website";
            $val = "'Unpublish'";
            $fields = array("publish" => $val);
            $where = array("website_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
			header('location:website.php');
        }
	}
	
	//Publish Website
	function pub_web($id)
	{
		if(isset($_REQUEST["pub"]))
        {
            $tbl = "website";
            $val = "'Publish'";
            $fields = array("publish" => $val);
            $where = array("website_id",$id);

            $obj = new model;
			$obj->update($tbl, $fields, $where);
			$field = "website_id";
			header('location:website.php');
        }
	}

//DOMAIN NAMES
	//Domain Name Display
	function domain_display()
	{
		$tbl = "domains";
		$field = "user_id";
		$where = $_SESSION["user_id"];
		
		$ob = new model;
		$ss = $ob->sel_where($tbl, $field, $where);
		return $ss;
	}
	
	//Unpublish Domains
	function unpub_dom($id)
	{
		if(isset($_REQUEST["unpub"]))
        {
            $tbl = "domains";
            $val = "'Unpublish'";
            $fields = array("publish" => $val);
            $where = array("domain_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
			header('location:domain.php');
        }
	}
	
	//Publish Website
	function pub_dom($id)
	{
		if(isset($_REQUEST["pub"]))
        {
            $tbl = "domains";
            $val = "'Publish'";
            $fields = array("publish" => $val);
            $where = array("domain_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
			header('location:domain.php');
        }
	}
	
//BIDDINGS
	function bid_insert()
	{
		if(isset($_REQUEST['place_bid']))
		{
			$user = $_SESSION["user_id"];
			$web = $_REQUEST["list_id"];
			$amt = $_REQUEST["bid"];
			$dt = new datetime();
			$up_date = date_format($dt,"Y-m-d");
			$md = $up_date;
			
			$tbl = "bidding";
			$fields = array("user_id","listing_id","amount","created_date","modified_date");
			$val = array($user,$web,$amt,$up_date,$md);
			$ob = new model;
			$ob->insert($tbl,$fields,$val);
		}
	}
	
	//SHOW BIDDINGS OF PARTICULAR USER
	function bid_show_user()
	{
		$tbl = "bidding";
		$table = array("listing" => "listing_id");
		$field = "user_id";
		$value = $_SESSION["user_id"];
		$ob = new model;
		$res = $ob->sel_join_where($tbl,$table,$field,$value)or die(mysql_error());
		return $res;
	}
	
	//SHOW BIDDINGS OF PARTICULAR WEBSITES
	function bid_show_web()
	{
		$tbl = "bidding";
		$table = array("user" => "user_id", "listing" => "listing_id");
		$field = "listing_id";
		$value = $_REQUEST["list_id"];
		$f = "listing_type";
		$v = "'Website'";
		$ob = new model;
		$or = "DESC";
		$or_field = "amount";
		$res = $ob->sel_join_where_2_order($tbl,$table,$field,$value,$or,$or_field,$f,$v);
		return $res;
	}

	//SHOW BIDDING OF PARTICULAR DOMAIN
	function bid_show_dom()
	{
		$tbl = "bidding";
		$table = array("user" => "user_id", "listing" => "listing_id");
		$field = "listing_id";
		$value = $_REQUEST["list_id"];
		$f = "listing_type";
		$v = "'Domain_name'";
		$ob = new model;
		$or = "DESC";
		$or_field = "amount";
		$res = $ob->sel_join_where_2_order($tbl,$table,$field,$value,$or,$or_field,$f,$v);
		return $res;
	}

	//SHOW BIDDING OF PARTICULAR APPLICATION
	function bid_show_app()
	{
		$tbl = "bidding";
		$table = array("user" => "user_id", "listing" => "listing_id");
		$field = "listing_id";
		$value = $_REQUEST["list_id"];
		$f = "listing_type";
		$v = "'Application'";
		$ob = new model;
		$or = "DESC";
		$or_field = "amount";
		$res = $ob->sel_join_where_2_order($tbl,$table,$field,$value,$or,$or_field,$f,$v);
		return $res;
	}
	
	//HIGHEST BIDDINGS
	function max_bid($id)
	{
		$sel = "select max(amount) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Website'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}
	
	//COUNT BIDDINGS
	function count_bid($id)
	{
		$sel = "select count(*) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Website'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}
	
	//HIGHEST BIDDINGS Applications
	function max_bid_app($id)
	{
		$sel = "select max(amount) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Application'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}

	//COUNT BIDDINGS Applications
	function count_bid_app($id)
	{
		$sel = "select count(*) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Application'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}

	//HIGHEST BIDDINGS Domain_names
	function max_bid_dom($id)
	{
		$sel = "select max(amount) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Domain_name'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}

	//COUNT BIDDINGS Domain_names
	function count_bid_dom($id)
	{
		$sel = "select count(*) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Domain_name'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}
//LISTINGS
	
	//SELECT ALL
	function sel_all()
	{
		$tbl = "listing";
		$ob = new model;
		$res = mysql_query("select * from listing order by listing_id DESC");
		return $res;
	}

	//Select ALL CONDITION
	function sel_all_where($where,$val)
	{
		$tbl = "listing";
		$ob = new model;
		$res = $ob->sel_where($tbl,$where,$val);
		return $res;
	}
}
?>