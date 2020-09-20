<?php


define("ServerName","localhost");
define("UserLogin","root");
define("UserPassword","");
define("DbName","vinni");

function makeOpisanie(){
 $db=mysqli_connect(ServerName,UserLogin,UserPassword,DbName);
 if($db){
     //if(mysql_select_db(DbName,$db)){
        mysqli_query($db,"SET names 'utf8");
        //
        $rez=mysqli_query($db,"SELECT * FROM opisanie");
        $out_page="";
        for ($i=0;$i<10;$i++){
            $row=mysqli_fetch_row($rez);
            $name=$row[1];
            $txt=$row[2];
            $out_page.="<h1 class='h1_opisan'>{$name}</h1>".
            "<div class='div_opisan'>{$txt}</div><br/>";
        }
        echo $out_page;
     //} 
     mysqli_close($db);
	 
	 function getIdMenu(){
		 $tmp=0;
		 if ($_GET) {
			 if ($_GET["id"]) {
				 $tmp= $_GET["id"];
			 }
			 if(!(($tmp>=1)&&($tmp<=3))) $tmp= 0;
		 }
		 return $tmp;
	 }
	 function getHTML($nom) {
		 $html = "";
		 $db = mysqli_connect(ServerName,UserLogin,UserPassword,DbName);
		 if($db){
			 mysqli_query($db,"SET names 'utf-8'");
			 $rez=mysqli_query(db,"SELECT*FROM razmetka WHERE (id={$nom})");
			 $kol_str=mysql_num_rows($rez);
			 if ($kol_str==1)
			 {
				 $row=mysqli_fetch_roe($rez);
				 $html=$row[1];
			 }
		 }
		 mysqli_close($db);
		 echo $html;
	 }
 }   
}

function makeTable(){
 $db=mysqli_connect(ServerName,UserLogin,UserPassword,DbName);
 if($db){
     if(mysqli_select_db(DbName,$db)){
        mysqli_query($db,"SET names 'utf8");
	    //$sql1="SELECT name, sum(kol) from tovar group by name ASC";
		//$rez1 mysqli_query($db,$sql1);
		
		$sql2="SELECT name from opisan";
		$rez2=mysqli_query($db, $sql2);
		
		function testPost(){
    if ($_POST["btn"]){
        $rez="";
        if (trim($_POST["user_name"])=="") $rez="Введите имя!";
        else if (trim($_POST["user_tel"])=="") $rez="Введите номер телефона!";
        else {
            $info = "Name: ".trim($_POST["user_name"]).
                    "Tel: ".trim($_POST["user_tel"]);

                    $file_name="".rand(1000000,9999999).".txt";
                    $rez="Заявка принята!";

                    $f=fopen(".doc/".$file_name,"w");

                    if ($f){
                        fwrite($f,  $info);
                        fclose($f);
                    }
                }
                    echo "<h1 class='h1_opisan' style='font-size:35px;'> {$rez}</h1>";
        
    }
}

$out_page="";
for($i=0;$i<10;$i++){
//$row1=mysqli_fetch_row($rez1);
$row2=mysqli_fetch_row($rez2);
//$kol-$row1[1];
$name=$row2[0];

$out_page .="<tr><td>{$name}</td><td>{}</td></tr>";
}
echo $out_page;
	 }
	 mysqli_close($db);
 }

}	
	 


?>