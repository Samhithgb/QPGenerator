<?php 

include("connect.php");
session_start();
function pick_questions($mark,$y,$CID)
{
	echo "<script>console.log('Pick Here');</script>";
     $lim=0;
     echo"<br>"; 
     $query="SELECT Ques_ID,Marks,Description,Unit_No,Course_Id,LOD FROM Questions WHERE Unit_No='$y' and Course_Id='$CID' and Marks<=2 ORDER BY RAND()";
     $res=mysql_query($query);
     if(!$res){
    die('Error'.mysql_error());
}
     while (($row = mysql_fetch_array($res, MYSQL_BOTH)) AND ($lim<=$mark) ) {
     if(($mark-$lim)==1){
				if($row[1]==1){
          printf ("Question: %s      Marks: %d     ID: %s     Unit: %d     LOD : %d",$row[2],$row[1],$row[0],$row[3],$row[5]);
          
					       echo"<br>";                                               
					       $lim=$lim+$row[1];
					      }
                        }
     else{
          if($lim<$mark){
       
          printf ("Question: %s        Marks: %d      ID: %s     Unit: %d     LOD : %d",$row[2],$row[1],$row[0],$row[3],$row[5]);
          echo"<br>";
          $lim=$lim+$row[1];}
         }
 
    }
}

$used_questions=array();


function pick_theory_questions($unit,$CID){
$marks=0;
$arr=array(6,8,5,10);
$r=rand(0,3);    
$i=0;
while($i<2){
if($marks==0)
$marks=$arr[$r];
printf("MARKS NOW %s",$CID);
    

$query="SELECT Ques_ID,Marks,Description,Unit_No,Course_Id,LOD FROM Questions WHERE Unit_No='$unit' and Course_Id='$CID' and Marks<=10 ORDER BY RAND() LIMIT 1";


$res=mysql_query($query);
//printf("MARKS NOW %s",$res[0]);

//printf("%s",$res);
if(!$res){
    
    die(mysql_error());
}

//$row = mysql_fetch_array($res, MYSQL_BOTH);
$row=$res;
printf("Marks before loop %d\n",$res[1]);
if(!(in_array($row[0],$used_questions))){
printf ("Question: %s        Marks: %d      ID: %s     Unit: %d     LOD : %d",$row[2],$row[1],$row[0],$row[3],$row[5]);
array_push($used_questions,$row[0]);
}


$marks=10-$marks;
$i++;  
  
 
}  
}




if(isset($_REQUEST['save']));
{
 
    
    $u1=$_REQUEST['unit_1']; 
    $u2=$_REQUEST['unit_2'];    
    $u3=$_REQUEST['unit_3'];    
    $u4=$_REQUEST['unit_4'];    
    $u5=$_REQUEST['unit_5']; 
    
  
    
  
   

    
   
    $CID=$_SESSION['subject'];
     printf("%s",$CID);
    $type="CIE";  

$cnt[0]=0;
$cnt[1]=0;
$cnt[2]=0;
$cnt[3]=0;
$cnt[4]=0;
$cnt[5]=0;
$no_of_units=0; 
$t=array(0,0,0,0,0,0);

if($u1=="yes") {$cnt[1]++;$no_of_units++;$t[1]=$_REQUEST['tunit_1'];}
if($u2=="yes") {$cnt[2]++;$no_of_units++;$t[2]=$_REQUEST['tunit_2'];}
if($u3=="yes") {$cnt[3]++;$no_of_units++;$t[3]=$_REQUEST['tunit_3'];}
if($u4=="yes") {$cnt[4]++;$no_of_units++;$t[4]=$_REQUEST['tunit_4'];}
if($u5=="yes") {$cnt[5]++;$no_of_units++;$t[5]=$_REQUEST['tunit_5'];}
    
    $t1="CIE";
    $t2="SEE";
    $qu_max=15;
    $x=1;
    $th_max=50;
    $qu_max=15;

    if($type==$t2){
		   $qu_max=20;
		   $th_max=160;	
                   $no_of_units=5;
		}

    $x=1;
    $check=true; 
    if($qu_max%$no_of_units==0)$check=false;
	
    $marks=ceil($qu_max/$no_of_units);
	
    $marks1=ceil($th_max/$no_of_units);
    $f1=0;
    $f2=0; 
	$z=2;
	$y=1;	
    $te=$no_of_units;
    $changer=0;
    
          printf ("Quiz Questions");
    
while($x<=5){
		echo "<script>console.log('Here1');</script>";
			if($cnt[$x]==1)
			{
				if($te>1){
			
				$cnt[$x]=$marks;
				$temp=$marks;
				
				echo"<br>";
	                        pick_questions($temp,$x,$CID);
				
			        echo"<br>";
	                       
                                $te--;
                                //$f1=1;
			}
				
        		else if($te==1)
			{
				if($check)
				{
			                 echo "<script>console.log('Here2');</script>";
				$cnt[$x]=$qu_max-$marks*($no_of_units-1);
				//echo "$cnt[$x]";
				$temp=$cnt[$x];
				//echo "$temp";
				pick_questions($temp,$x,$CID);
				
                                $te--;
                                //$f2=1;
			}
				else{
                    echo "<script>console.log('Here3');</script>";
				$cnt[$x]=$marks;
				$temp=$marks;
				
				echo"<br>";
	                        pick_questions($temp,$x,$CID);
				
			        echo"<br>";
	                       
                                $te--;

					}}
		
                       }

$x++;

}


printf("Theory Questions");



$x=1;
//printf("%d %d %d %d %d",$t[1],$t[2],$t[3],$t[4],$t[5]);

while($x<=5){
		
        while($t[$x]!=0){
          //  printf("%d, %d",$t[$x],$x);
            pick_theory_questions($x,$CID);
            $t[$x]--;
        }

$x++;

}











}

?>
