<?php 

include("connect.php");
session_start();
function pick_questions($mark,$y,$CID)
{
	echo "<script>console.log('Pick Here');</script>";
     $lim=0;
   //  echo"<br>"; 
     $query="SELECT Ques_ID,Marks,Description,Unit_No,Course_Id,LOD FROM Questions WHERE Unit_No='$y' and Course_Id='$CID' and Marks<=2 ORDER BY RAND()";
     $res=mysql_query($query);
     if(!$res){ 
    die('Error'.mysql_error());
}
     while (($row = mysql_fetch_array($res, MYSQL_BOTH)) AND ($lim<=$mark) ) {
     if(($mark-$lim)==1){
				if($row[1]==1){
          printf ("Question: %s      Marks: %d    Unit: %d     LOD : %d",$row[2],$row[1],$row[3],$row[5]);
          
					       echo"<br>";                                               
					       $lim=$lim+$row[1];
					      }
                          else continue;
                        }
          if($lim<$mark){
       
          printf ("Question: %s        Marks: %d         Unit: %d     LOD : %d",$row[2],$row[1],$row[3],$row[5]);
          echo"<br>";
          $lim=$lim+$row[1];}
         }
 
    }


function pick_theory_questions($u,$CID,$used_array){
     
$lim=16;
$sel=rand(0,2);
$sel=0;
$no=0;
switch($sel){
    
   case 0: 
   $no=2;
   $query1= "Select Ques_ID,Marks,Description,Unit_No,Course_Id,LOD from Questions where Unit_No='$u' and Marks=10 order by rand()";
   $res1= mysql_query($query1);echo"c0:query 1 exec<br>";
   $query2= "Select Ques_ID,Marks,Description,Unit_No,Course_Id,LOD from Questions where Unit_No='$u' and Marks=6 order by rand()";
   $res2= mysql_query($query2);echo"c0:query 2 exec<br>";
   break;
   
   
   case 1:
   $no=2;
   $query1= "Select Ques_ID,Marks,Description,Unit_No,Course_Id,LOD from Questions where Unit_No='$u' and Marks=8 order by rand()";
   $res1= mysql_query($query1);echo"c1:query 1 exec<br>";
   $query2= "Select Ques_ID,Marks,Description,Unit_No,Course_Id,LOD from Questions where Unit_No='$u' and Marks=8 order by rand()";
   $res2= mysql_query($query2);echo"c1:query 2 exec<br>";
   break;
   
    case 2: 
    $no=3;
    $query1= "Select Ques_ID,Marks,Description,Unit_No,Course_Id,LOD from Questions where Unit_No='$u' and Marks=6 order by rand()";
    $res1= mysql_query($query1);echo"c2:query 1 exec<br>";
    $query2= "Select Ques_ID,Marks,Description,Unit_No,Course_Id,LOD from Questions where Unit_No='$u' and Marks=4 order by rand()";
    $res2= mysql_query($query2);echo"c2:query 2 exec<br>";
    $query3= "Select Ques_ID,Marks,Description,Unit_No,Course_Id,LOD from Questions where Unit_No='$u' and Marks=6 order by rand()";
    $res3= mysql_query($query3);echo"c2:query 3 exec<br>";
   break;
   
    
}
   
    
$z=0;
while($r1 = mysql_fetch_array($res1,MYSQL_BOTH) and $z<1){
if(!(in_array($r1[0],$used_questions))){
$z++;
echo "<br>";
echo "query1";
echo "<br>";
printf ("Question: %s        Marks: %d     Unit: %d     LOD : %d",$r1[2],$r1[1],$r1[3],$r1[5]);
echo "<br>";
array_push($used_questions,$r1[0]);
}

else {echo "Used Question Found";continue;}
}
     
$z=0;
while($r2 = mysql_fetch_array($res2,MYSQL_BOTH) and $z<1){
if(!(in_array($r2[0],$used_questions))){
$z++;
echo "<br>";
echo "query2";
echo "<br>";
printf ("Question: %s        Marks: %d     Unit: %d     LOD : %d",$r2[2],$r2[1],$r2[3],$r2[5]);
echo "<br>";
array_push($used_questions,$r2[0]);
}

else {continue;}
}     
     
 
if($no==3){
$z=0;   
while($r3 = mysql_fetch_array($res3, MYSQL_BOTH) and $z<1){
if(!(in_array($r3[0],$used_questions))){
$z++;
echo "<br>";
echo "query3";
echo "<br>";
printf ("Question: %s        Marks: %d     Unit: %d     LOD : %d",$r3[2],$r3[1],$r3[3],$r3[5]);
echo "<br>";
array_push($used_questions,$r3[0]);
}

else {continue;}
}   
    
    
} 
 
 
     
 }  
     

if(isset($_REQUEST['save']));
{
 
    $CID=$_SESSION['subject'];
     //printf("%s",$CID);
    $type="SEE";  

$cnt[0]=1;
$cnt[1]=1;
$cnt[2]=1;
$cnt[3]=1;
$cnt[4]=1;
$cnt[5]=1;
$no_of_units=5; 
$t=array(0,0,0,0,0,0);

 
		   $qu_max=20;
		   $th_max=160;	
    $no_of_units=5;
		
    $x=1;	
    $marks=4;
	
    //$marks1=ceil($th_max/$no_of_units);
    $f1=0;
    $f2=0; 
	$z=2;
	$y=1;	
    $te=$no_of_units;
    $changer=0;
    
          printf ("Quiz Questions");echo "<br>";
    
while($x<=5){
		//echo "<script>console.log('Here1');</script>";
			if($cnt[$x]==1)
			{
				
			
				$cnt[$x]=$marks;
				$temp=$marks;
				
				echo"<br>";
	                        pick_questions($temp,$x,$CID);
				
			      
	                       
                                $te--;
                                //$f1=1;
			}
				
        		
		$x++;

                       }
                       
                       
$x=1;
echo"<br>";
printf("Theory Questions");echo "<br>";
$used=array();
while($x<=5){
   
   $used=pick_theory_questions($x,$CID,$used);
   $x++;
    
    
    
}


}



     
     
     
     
 










?>