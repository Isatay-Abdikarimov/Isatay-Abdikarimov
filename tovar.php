<?php
 
if ($_GET){
        $flag=false;
        for($i=1;$i<=10;$i++){
            $tmp="tov".$i;

            if($_GET[$tmp]){
                $flag=true;
                 break;
            }
			else{
			echo"1-oe yslovie error";
			}
        }

        if($flag){
            runMySQL();
        }
		else{
			echo "2-oe yslovie error";   
		}
}

function runMySQL(){
    $db=mysqli_connect("localhost","root","");
	
	if($db){
		if (mysqli_select_db("Vinni",$db)){
			mysqli_query("SET names 'utf8'",$db);
			getQuery();	
	        javakol();
			}
		mysqli_close($db);
	}   
}

function getQuery(){
	$date_time=date('Y-m-d [H:i:s]');
	for ($i=1;$i<=10;$i++){
		$tmp="tov".$i;
		if($_GET[tmp]){
			$kol=$_GET[$tmp];
			$q="INSERT INTO tovar (name, kol, dv)".
			"VALUES ({$i},{$kol},'{date_time}')";
			mysql_query($q);
		}
	}
}

function javakol(){
	$otvet="";
	$sql="select name,SUM(kol) from tovar group by name ACS";
	
	$rez=mysql_query($sql);
	for($i=0;$i<10;$i++){
		$row=mysql_fetch_row($rez) ;
		$kol=$row[1];//
		$otvet.=$kol;
		if($i!=9)$otvet.="~";		
    }
echo $otvet;
}
testPost(){
	if ($_POST["btn"]){
		$rez="";
		if (trim($_POST["user_name"])=="") $rez="Введите имя!"
		else if (trim($_POST["user_tel"]=="") $rez="Введите номер телефона!";
		else{
			$info = "Name: ".trim($_POST["user_name"]).
			"Tel: ".trim($_POST["user_tel"]);
			
			$file_name="".rand(100000000,9999999999)."txt"
			$rez="Заявка принята!";
			
			$f=fopen(".doc/".$file name,"w");
			
		if($f){
			fwrite($f, $info);
			fclose($f);
		}
		}
		echo"<h1 class='h1_opisan' style='font-size:35px;'> {$rez}</h1>";
	}
}
?>