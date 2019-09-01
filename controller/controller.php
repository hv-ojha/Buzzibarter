<?php
include_once('../../model/model.php');
class controller
{
// Category
    
    //insert
    function cat_insert()
    {
        if(isset($_POST['ins_category']))
        {
            $cat_name=$_REQUEST['category_name'];
            $dt = new datetime();
			$cd = date_format($dt,"Y-m-d");
			$md = $cd;

            $field=array('category_name', 'created_date', 'modified_date');
            $val=array($cat_name, $cd, $md);
            $tbl='category';
            $obj=new model;
            $obj->insert($tbl,$field,$val);
        }
    }

    //UPDATE
    function cat_update($id)
    {
        if(isset($_POST["upd_category"]))
        {
            $cat_name = "'".$_REQUEST["cate_name"]."'";
            $dt = new datetime();
			$cd = date_format($dt,"Y-m-d");
            $field = array('category_name' => $cat_name, "modified_date" => $cd);
            $tbl = 'category';
            $where = array('category_id',$id);

            $obj = new model;
            $obj->update($tbl, $field, $where);
            header('location: categories.php');
        }
    }

    //DELETE
    function cat_delete($id)
    {
        if(isset($_REQUEST["del"]))
        {
            $tbl = "category";
            $field = "category_id";
            
            $obj = new model;
            $obj->delete($tbl,$field,$id);
            header('location: categories.php');   
        }
    }

    //select
    function cat_select()
    {
        $tbl = 'category';
        $obj = new model;
        $rs = $obj->sel($tbl);
        return $rs;
    }

//Sub-category
    
    //insert
    function subcat_insert()
    {
        if(isset($_POST['ins_subcategory']))
        {
            $category_name = $_POST["category_name"];
            $sub_category = $_POST["sub_category_name"];
            $dt = new datetime();
			$cd = date_format($dt,"Y-m-d");
			$md = $cd;
            
            $field=array('category_id','sub_category_name','created_date','modified_date');
            $val=array($category_name,$sub_category,$cd,$md);
            $tbl='sub_category';
            $obj=new model;
            $obj->insert($tbl,$field,$val);
        }
    }
    
    //UPDATE
    function sub_cat_update($id)
    {
        if(isset($_POST["upd_subcat"]))
        {
            $cat_name = $_POST["cat_name"];
            $sub_cat = "'".$_POST["sub_cat_name1"]."'";
            $dt = new datetime();
			$cd = date_format($dt,"Y-m-d");
            $fields = array('category_id' => $cat_name, 'sub_category_name' => $sub_cat, "modified_date" => $cd);
            $tbl = 'sub_category';
            $where = array('sub_category_id',$id);

            $obj = new model;
            $obj->update($tbl,$fields,$where);
            header('location: sub_categories.php');
        }
    }

    //DELETE
    function sub_cat_delete($id)
    {
        if(isset($_REQUEST["del"]))
        {
            $field = "sub_category_id";
            $tbl = "sub_category";

            $obj = new model;
            $obj->delete($tbl,$field,$id);
        }
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

//Country

    //insert
    function coun_insert()
    {
        if(isset($_POST['ins_country']))
        {
            $coun_name=$_POST['country_name'];
            $dt = new datetime();
			$up_date = date_format($dt,"Y-m-d");
			$md = $up_date;

            $field=array('country_name','created_date','modified_date');
            $val=array($coun_name,$up_date,$md);
            $tbl='country';
            $obj=new model;
            $obj->insert($tbl,$field,$val);
        }
    }

    //Update
    function coun_update($id)
    {
        if(isset($_POST["upd_country"]))
        {
            $con_name = $_POST["con_name"];
            $dt = new datetime();
			$cd = date_format($dt,"Y-m-d");
            $fields = array('country_name' => $con_name, "modified_date" => $cd);
            $tbl = 'country';
            $where = array('country_id',$id);

            $obj = new model;
            $obj->update($tbl,$fields,$where);
            header('location: country.php');

        }
    }

    //Delete
    function coun_delete()
    {
        if(isset($_GET["del"]))
        {
            $tbl = 'country';
            $field = 'country_id';
            $val = $_GET["del"];

            $obj = new model;
            $obj->delete($tbl,$field,$val);
        }
    }

    //select
    function coun_select()
    {
        $tbl = 'country';
        $obj = new model;
        $rs = $obj->sel($tbl);
        return $rs;
    }

//State
    //insert
    function state_insert()
    {
        if(isset($_POST['ins_state']))
        {
            $con_name = $_POST["con_name"];
            $state = $_POST["state_name"];
            $dt = new datetime();
			$up_date = date_format($dt,"Y-m-d");
			$md = $up_date;

            $field = array('state','country_id','created_date','modified_date');
            $val = array($state,$con_name,$up_date,$md);
            $tbl = 'state';
            $obj=new model;
            $obj->insert($tbl,$field,$val);
            header('location: state.php');
        }
    }

    //UPDATE
    function state_update($id)
    {
        if(isset($_POST["upd_state"]))
        {
            $con_name = $_POST["con_name"];
            $state = "'".$_POST["state_name1"]."'";
            $dt = new datetime();
			$cd = date_format($dt,"Y-m-d");
            $fields = array('country_id' => $con_name, 'state' => $state, "modified_date" => $cd);
            $tbl = 'state';
            $where = array('state_id',$id);

            $obj = new model;
            $obj->update($tbl,$fields,$where);
            header('location: state.php');
        }
    }

    //DELETE
    function state_delete($id)
    {
        if(isset($_REQUEST["del"]))
        {
            $field = "state_id";
            $tbl = "state";

            $obj = new model;
            $obj->delete($tbl,$field,$id);
        }
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

//City
    //insert
    function city_insert()
    {
        if(isset($_POST['ins_city']))
        {
            $coun = $_POST["con_name"];
            $state = $_POST["state_name"];
            $city = $_POST["city_name"];
            $dt = new datetime();
			$up_date = date_format($dt,"Y-m-d");
			$md = $up_date;

            $field = array('country_id','state_id','city','created_date','modified_date');
            $val = array($coun,$state,$city,$up_date,$md);
            $tbl = "city";
            $obj = new model;
            $obj->insert($tbl,$field,$val);
        }
    }

    //UPDATE
    function city_update($id)
    {
        if(isset($_REQUEST["upd_city"]))
        {
            $coun = $_POST["con_name"];
            $state= $_POST["state_name"];
            $city1= "'".$_POST["city_name1"]."'";
            $dt = new datetime();
			$cd = date_format($dt,"Y-m-d");
            $tbl = "city";

            $field= array("city" => $city1, "state_id" => $state, "country_id" => $coun, "modified_date" => $cd);
            $where = array("city_id", $id);
            $obj = new model;
            $obj->update($tbl,$field,$where);
        }
    }

    //DELETE
    function city_delete($id)
    {
        if(isset($_REQUEST["del"]))
        {
            $tbl = "city";
            $field = "city_id";

            $obj = new model;
            $obj->delete($tbl, $field, $id);
        }
    }

    //SELECT
    function city_select()
    {
        $tbl = "city";
        $tables = array("country" => "country_id", "state" => "state_id");

        $obj = new model;
        $city = $obj->sel_join($tbl,$tables);
        return $city;
    }

//SITE SETTING

    //Select
    function site_select()
    {
        $tbl = "site_setting";
        $obj = new model;
        $rs = $obj->sel($tbl);
        return $rs;
    }

    //UPDATE
    function site_update($id)
    {
        if(isset($_REQUEST["upd_site"]))
        {
            $tbl = "site_setting";
            $val = "'".$_REQUEST['field_name']."'";
            $fields = array("value" => $val);
            $where = array("field_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
            header('location: site_setting.php');
        }
    }
	
//WEBSITE
	//WEBSITE DETAILS
	function web_details_where($val)
	{
		$tbl = "website";
        $tables = array("user" => "user_id");
		$where = "website_id";

        $obj = new model;
        $res = $obj->sel_join_where($tbl,$tables,$where,$val);
        return $res;
	}
	
	//Verification of WEBSITE
	function website_verify($id)
	{
		if($_REQUEST['table']=="website")
        {
            $tbl = "website";
            $val = "'Verified'";
            $fields = array("verified" => $val);
            $where = array("website_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
            
            $tbl = "website";
            $field = "user_id";
            $ob = new model;
            $ss = $ob->sel_where($tbl, $field, $where);
            $tbl = "listing";
            $type = "Website";
            $dt = new datetime();
            $up = date_format($dt,"Y-m-d");
            $fields = array("pro_id","listing_type","opened_date");
            $val = array($id,$type,$up);
            $obj->insert($tbl,$fields,$val);
			header('location:pending_product.php');
        }
	}

	//NOT VERIFIED Display
	function website_not_verified_display()
	{
		$tbl = 'website';
		$table = array("user" => "user_id");
		$field = 'verified';
		$value = '\'Not Verified \'';
        $obj = new model;
        $rs = $obj->sel_join_where($tbl,$table,$field,$value);
        return $rs;
	}
	
	//VERIFIED Display
	function website_verified_display()
	{
		$tbl = 'website';
		$table = array("user" => "user_id");
		$field = 'verified';
		$value = '\'Verified\'';
        $obj = new model;
        $rs = $obj->sel_join_where($tbl,$table,$field,$value);
        return $rs;
	}
	
	//Display
	function website_display()
	{
		$tbl = 'website';
		$table = array("user" => "user_id");
		$obj = new model;
        $rs = $obj->sel_join($tbl,$table);
        return $rs;
	}
	
//DOMAIN NAME
	//Verification of Domains
	function domain_verify($id)
	{
		if($_REQUEST['table']=="domains")
        {
            $tbl = "domains";
            $val = "'Verified'";
            $fields = array("verified" => $val);
            $where = array("domain_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);
			
			$tbl = "listing";
			$type = "Domain_name";
            $dt = new datetime();
            $up = date_format($dt,"Y-m-d");
            $fields = array("pro_id","listing_type","opened_date");
            $val = array($id,$type,$up);
			$obj->insert($tbl,$fields,$val);
			header('location:pending_product.php');
        }
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

	//NOT VERIFIED Display
	function dom_not_verified_display()
	{
		$tbl = 'domains';
		$table = array("user" => "user_id");
		$field = 'verified';
		$value = '\'Not Verified \'';
        $obj = new model;
        $rs = $obj->sel_join_where($tbl,$table,$field,$value);
        return $rs;
	}
	
	//VERIFIED Display
	function dom_verified_display()
	{
		$tbl = 'domains';
		$table = array("user" => "user_id");
		$field = 'verified';
		$value = '\'Verified\'';
        $obj = new model;
        $rs = $obj->sel_join_where($tbl,$table,$field,$value);
        return $rs;
	}
	
	//Display
	function dom_display()
	{
		$tbl = 'domains';
		$table = array("user" => "user_id");
		$obj = new model;
        $rs = $obj->sel_join($tbl,$table);
        return $rs;
	}
	
//APPLICATION
	//Verification of WEBSITE
	function app_verify($id)
	{
		if($_REQUEST['table']=="application")
        {
            $tbl = "application";
            $val = "'Verified'";
            $fields = array("verified" => $val);
            $where = array("application_id",$id);

            $obj = new model;
            $obj->update($tbl, $fields, $where);

            $tbl = "listing";
			$type = "Application";
            $dt = new datetime();
            $up = date_format($dt,"Y-m-d");
            $fields = array("pro_id","listing_type","opened_date");
            $val = array($id,$type,$up);
			$obj->insert($tbl,$fields,$val);
			header('location:pending_product.php');
        }
    }
    
    //App details display
    function app_details_where($val)
	{
		$tbl = "application";
        $tables = array("user" => "user_id");
		$where = "application_id";

        $obj = new model;
        $res = $obj->sel_join_where($tbl,$tables,$where,$val);
        return $res;
	}

	//NOT VERIFIED Display
	function app_not_verified_display()
	{
		$tbl = 'application';
		$table = array("user" => "user_id");
		$field = 'verified';
		$value = '\'Not Verified \'';
        $obj = new model;
        $rs = $obj->sel_join_where($tbl,$table,$field,$value);
        return $rs;
	}
	
	//NOT VERIFIED Display
	function app_verified_display()
	{
		$tbl = 'application';
		$table = array("user" => "user_id");
		$field = 'verified';
		$value = '\'Verified \'';
        $obj = new model;
        $rs = $obj->sel_join_where($tbl,$table,$field,$value);
        return $rs;
	}
	
	//Display
	function app_display()
	{
		$tbl = 'application';
		$table = array("user" => "user_id");
		$obj = new model;
        $rs = $obj->sel_join($tbl,$table);
        return $rs;
	}
	
//BIDDINGS
	//Running Biddings Display
	function run_bid()
	{
		$tbl = "bidding";
        $tables = array("user" => "user_id", "listing" => "listing_id");

        $obj = new model;
        $res = $obj->sel_join($tbl,$tables);
        return $res;
	}
    
    //Winning Biddings Display
	function win_bid()
	{
		$tbl = "winner";
        $tables = array("user" => "user_id", "listing" => "listing_id");

        $obj = new model;
        $res = mysql_query("Select * from winner INNER JOIN listing ON listing.listing_id=winner.listing_id INNER JOIN bidding ON bidding.bid_id=winner.bid_id INNER JOIN user ON user.user_id=winner.user_id");
        return $res;
	}

	//BIDDINGS DETAILS
	function bid_details($id)
	{
		$tbl = "bidding";
        $tables = array("user" => "user_id", "listing" => "listing_id");
		$field = "pro_id";
        $value = $id;
        $f1 = "listing_type";
        $v1 = "'Website'";
		$or = "DESC";
		$or_field = "amount";
		

        $obj = new model;
        $res = $obj->sel_join_where_2_order1($tbl,$tables,$field,$value,$or,$or_field,$f1,$v1);
        return $res;
    }
    
    function bid_details_dom($id)
	{
		$tbl = "bidding";
        $tables = array("user" => "user_id", "listing" => "listing_id");
		$field = "pro_id";
		$value = $id;
		$f1 = "listing_type";
        $v1 = "'Domain_name'";
		$or = "DESC";
		$or_field = "amount";
		

        $obj = new model;
        $res = $obj->sel_join_where_2_order1($tbl,$tables,$field,$value,$or,$or_field,$f1,$v1);
        return $res;
    }
    
    function bid_details_app($id)
	{
		$tbl = "bidding";
        $tables = array("user" => "user_id", "listing" => "listing_id");
		$field = "pro_id";
		$value = $id;
		$f1 = "listing_type";
        $v1 = "'Application'";
		$or = "DESC";
		$or_field = "amount";
		

        $obj = new model;
        $res = $obj->sel_join_where_2_order1($tbl,$tables,$field,$value,$or,$or_field,$f1,$v1);
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
    
    //HIGHEST BIDDINGS
	function max_bid_dom($id)
	{
		$sel = "select max(amount) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Domain_name'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}
	
	//COUNT BIDDINGS
	function count_bid_dom($id)
	{
		$sel = "select count(*) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Domain_name'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
    }
    
    //HIGHEST BIDDINGS
	function max_bid_app($id)
	{
		$sel = "select max(amount) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Application'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}
	
	//COUNT BIDDINGS
	function count_bid_app($id)
	{
		$sel = "select count(*) from bidding inner join listing on bidding.listing_id=listing.listing_id where pro_id=$id and listing_type='Application'";
		$res = mysql_query($sel);
		$row = mysql_fetch_array($res);
		return $row;
	}
}
?>
