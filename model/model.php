<?php 
class model
{
	function model()
	{
		mysql_connect("localhost","root","");
		mysql_select_db("buzzibarter");
	}

//INSERT MODEL
	public function insert($table, $fields = array(), $values = array())
	{
    	$fields = '`' . implode ( '`,`', $fields ) . '`';
    	$values = "'" . implode ( "','", $values ) . "'";
		$insert_query = "INSERT INTO {$table} ($fields) VALUES($values)";
    	$c = mysql_query($insert_query) or die(mysql_error());
		if($c)
		{
			echo "<script>alert('$table inserted')</script>";
		}
		else
		{
			echo "<script>alert('$table inserted')</script>";
 		} 
	}
	
//UPDATE MODEL
	public function update($table, $fields = array(), $where = array())
	{
		$wher = implode("=",$where);
		foreach($fields as $fil => $values)
		{
			$str = "UPDATE {$table} SET $fil=$values WHERE $wher";
			$c=mysql_query($str);
		}
		if($c)
		{
			echo "<script>alert('$table Updated')</script>";
		}
		else
		{
			echo "<script>alert('$table Updated')</script>";
 		}
	}
	
//SELECTION WITOUT WHERE CONDITION
 	public function sel($table)
	{
		$ss=mysql_query("select * from $table");
		return $ss;
	}
	
//SELECTION WITH WHERE CONDITION
	public function sel_where($table, $field, $val)
	{
		$res = mysql_query("select * from $table where $field=$val");
		return $res;
	}
	
//SELECTION WITH JOIN QUERY
	function sel_join($table, $tab=array())
	{
		$co = count($tab);
		if($co == 1)
		{
			$table1 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $table1 ON $table1.$tab[$table1]=$table.$tab[$table1]";
			$res = mysql_query($rs);
			return $res;
		}
		elseif($co == 2)
		{
			$tab1 = key($tab);
			next($tab);
			$tab2 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $tab1 ON $table.$tab[$tab1]=$tab1.$tab[$tab1] INNER JOIN $tab2 ON $table.$tab[$tab2]=$tab2.$tab[$tab2]";
			$res = mysql_query($rs);
			return $res;
		}
	}
	
	function sel_join_where($table, $tab=array(),$where,$val)
	{
		$co = count($tab);
		if($co == 1)
		{
			$table1 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $table1 ON $table1.$tab[$table1]=$table.$tab[$table1] where $table.$where=$val";
			$res = mysql_query($rs)or die(mysql_error());
			return $res;
		}
		elseif($co == 2)
		{
			$tab1 = key($tab);
			next($tab);
			$tab2 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $tab1 ON $table.$tab[$tab1]=$tab1.$tab[$tab1] INNER JOIN $tab2 ON $table.$tab[$tab2]=$tab2.$tab[$tab2] where $where=$val";
			$res = mysql_query($rs);
			return $res;
		}
	}
	
	function sel_join_where_order($table, $tab=array(),$where,$val,$order,$field)
	{
		$co = count($tab);
		if($co == 1)
		{
			$table1 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $table1 ON $table1.$tab[$table1]=$table.$tab[$table1] where $where=$val ORDER BY $field $order";
			$res = mysql_query($rs);
			return $res;
		}
		elseif($co == 2)
		{
			$tab1 = key($tab);
			next($tab);
			$tab2 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $tab1 ON $table.$tab[$tab1]=$tab1.$tab[$tab1] INNER JOIN $tab2 ON $table.$tab[$tab2]=$tab2.$tab[$tab2] where $where=$val ORDER BY $field $order";
			$res = mysql_query($rs);
			return $res;
		}
	}

	function sel_join_where_2_order($table, $tab=array(),$where,$val,$order,$field,$where1,$val1)
	{
		$co = count($tab);
		if($co == 1)
		{
			$table1 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $table1 ON $table1.$tab[$table1]=$table.$tab[$table1] where $where=$val and $where1=$val1 ORDER BY $field $order";
			$res = mysql_query($rs);
			return $res;
		}
		elseif($co == 2)
		{
			$tab1 = key($tab);
			next($tab);
			$tab2 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $tab1 ON $table.$tab[$tab1]=$tab1.$tab[$tab1] INNER JOIN $tab2 ON $table.$tab[$tab2]=$tab2.$tab[$tab2] where $table.$where=$val and $where1=$val1 ORDER BY $field $order";
			$res = mysql_query($rs)or die(mysql_error());
			return $res;
		}
	}

	function sel_join_where_2_order1($table, $tab=array(),$where,$val,$order,$field,$where1,$val1)
	{
		$co = count($tab);
		if($co == 1)
		{
			$table1 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $table1 ON $table1.$tab[$table1]=$table.$tab[$table1] where $where=$val and $where1=$val1 ORDER BY $field $order";
			$res = mysql_query($rs);
			return $res;
		}
		elseif($co == 2)
		{
			$tab1 = key($tab);
			next($tab);
			$tab2 = key($tab);
			$rs = "SELECT * FROM $table INNER JOIN $tab1 ON $table.$tab[$tab1]=$tab1.$tab[$tab1] INNER JOIN $tab2 ON $table.$tab[$tab2]=$tab2.$tab[$tab2] where $where=$val and $where1=$val1 ORDER BY $field $order";
			$res = mysql_query($rs)or die(mysql_error());
			return $res;
		}
	}
	
//DELETE MODEL
	public function delete($table,$field,$id)
	{
		mysql_query("delete from $table where $field='$id'");
		return true;
	}

//MAXIMUM MODEL
	function max($tbl,$field)
	{
		mysql_query("select max($field),* from $tbl");
		return true;
	}
}
?>