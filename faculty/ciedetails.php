<?php 

include("connect.php");
session_start();

function pick_questions($mark,$y,$CID)
{
	echo "<script>console.log('Pick Here');</script>";
     $lim=0;
    $query="SELECT Ques_ID,Marks,Description,Unit_No,Course_Id,LOD,CO FROM Questions WHERE Unit_No='$y' and Course_Id='$CID' and Marks<=2 ORDER BY RAND()";
     $res=mysql_query($query);
     if(!$res){
    die('Error'.mysql_error());
}
     while (($row = mysql_fetch_array($res, MYSQL_BOTH)) AND ($lim<=$mark) ) {
     if(($mark-$lim)==1){
				if($row[1]==1){
         // printf ("Question: %s      Marks: %d    Unit: %d     LOD : %d",$row[2],$row[1],$row[3],$row[5]);
          echo "<tr><td style='width:1000px'>"; 
          echo $row[2];
         echo "</td><td>";   
           echo $row[1];
        
         echo "</td><td>";   
           echo $row[5];
         echo "</td><td>";   
           echo $row[6];
             echo "</td></tr>";
          
           
           
          


          
					                                          
					       $lim=$lim+$row[1];
					      }
                          else continue;
                        }
          else if($lim<$mark){
         echo "<tr><td style='width:1000px'>"; 
          echo $row[2];
         echo "</td><td>";   
           echo $row[1];
       
         echo "</td><td>";   
           echo $row[5];
         echo "</td><td>";   
           echo $row[6];
             echo "</td></tr>";
          //printf ("Question: %s        Marks: %d         Unit: %d     LOD : %d",$row[2],$row[1],$row[3],$row[5]);
         
          $lim=$lim+$row[1];}
         }
 
    }




function pick_theory_questions($unit,$CID,$used_questions){
$marks=0;
$arr=array(6,8,5,10);


$r=rand(0,3);    
$i=0;
while($i<2){
		echo "<script>console.log('Inside While loop');</script>";
    
if($marks==0)
$marks=$arr[$r]; 
//echo $r;


//echo "Fetching for $marks marks from unit $unit<br>"; 

$query="SELECT Ques_ID,Marks,Description,Unit_No,Course_Id,LOD,CO FROM Questions WHERE Unit_No='$unit' and Course_Id='$CID' and Marks=$marks and Marks>1 ORDER BY RAND()";


$res1=mysql_query($query);
//printf("MARKS NOW %s",$res[0]);

//printf("%s",$res);
if(!$res1){
    
    die(mysql_error());
}

if(mysql_num_rows($res1)==0){
    if(i==0){
    $arr=array(6,8,5,10);
$r=rand(0,3);$marks=$arr[$r]; echo "<script>console.log('QUestion Not Found!');</script>";   continue;}

else if( i==1) {
     echo "<script>window.location.reload();</script>";
    echo "Not enough questions! Please add questions to the database!";
}
}

$z=0;
while($res = mysql_fetch_array($res1, MYSQL_BOTH) and $z<1){


if(!(in_array($res[0],$used_questions))){
$z++; 
 echo "<tr><td style='width:1000px'>"; 
          echo $res[2];
         echo "</td ><td>";   
           echo $res[1];
        
         echo "</td><td>";   
           echo $res[5];
         echo "</td><td>";   
           echo $res[6];
             echo "</td></tr>";
//printf ("Question: %s        Marks: %d     Unit: %d     LOD : %d",$res[2],$res[1],$res[3],$res[5]);

array_push($used_questions,$res[0]);
}

else {continue;}
}

if($res==null and $z<1){
         

  echo "<script>window.location.reload();</script>";

    echo "<h3><strong>Sorry! We could not find enough questions of required variety in database!Reload the page or add questions of $marks marks of unit $unit into database!</strong></H3>";
    return $used_questions; 
}


$marks=10-$marks;
if($marks<=0)break;
$i++;  

}  

return $used_questions;
}




if(isset($_REQUEST['save']));
{
 
    
    $u1=$_REQUEST['unit_1']; 
    $u2=$_REQUEST['unit_2'];    
    $u3=$_REQUEST['unit_3'];    
    $u4=$_REQUEST['unit_4'];    
    $u5=$_REQUEST['unit_5']; 
    
  
    
  
   

    
   
    $CID=$_SESSION['subject'];
     //printf("%s",$CID);
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



 echo "<center><table border='1' style='border-collapse: collapse;'>";
          echo "<tr><td style='width:1000px'>";
          echo "<center><strong>R V College of Engineering<br>Department of Information Science and Engineering<br>CIE Question Paper</center></strong>"; 
          echo "</tr>";
                  echo "<tr><td style='width:50px'>";  
                 
 echo "</table>";




    
      

echo "<center><strong>Part 1</strong></center>";
 echo "<center><table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>Question</th><th>Marks</th><th>LOD</th><th>CO</th></tr>"; 
    
while($x<=5){
		echo "<script>console.log('Here1');</script>";
			if($cnt[$x]==1)
			{
				if($te>1){
			
				$cnt[$x]=$marks;
				$temp=$marks;
				//echo "$temp";
				
	                        pick_questions($temp,$x,$CID);
				 
	                       
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
				//echo "$temp";
				
				
	                        pick_questions($temp,$x,$CID);
				
			      
	                       
                                $te--;

					}}
		
                       }

$x++;

}

$used=array();

echo "</table></center>";
echo "<center><strong>Part 2</strong></center>";
$x=1;
//printf("%d %d %d %d %d",$t[1],$t[2],$t[3],$t[4],$t[5]);
 echo "<center><table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>Question</th><th>Marks</th><th>LOD</th><th>CO</th></tr>"; 
while($x<=5){
		//echo "<script>console.log('Inside while');</script>";
        while($t[$x]!=0){
         // echo"<br>"; printf("%d, %d",$t[$x],$x);
            $used=pick_theory_questions($x,$CID,$used);
            echo "<script>console.log('Called');</script>";
	    
            $t[$x]--;
        }

$x++;

}











}

?>
