<!DOCTYPE html>

<?php
	include("connect.php");
	session_cache_expire( 20 );
$inactive = 1200;
session_start();


if(!isset($_SESSION['username']))
    {
      echo "<script>alert('You are not logged in!');</script>";
		  echo "<script>self.location='../index.html'</script>";
      }  

if(isset($_SESSION['start']) ) {
	$session_life = time() - $_SESSION['start'];
	if($session_life > $inactive){
		echo "<script>alert('Session Timeout! Please Login Again!');</script>";
		echo "<script>self.location='../index.html'</script>";
	}
}




$_SESSION['start'] = time();

if(isset($_SESSION['username'])){

  $name = $_SESSION['username'];


}


	if(isset($_REQUEST['logout'])){
		$time=date("h:i:sa");
		$sql="insert into Login_History('Logout_Time') values('$time');";
		$res=mysql_query($sql);

		if($res){
			echo "<script>alert('Sucessfully logged out');</script>";
			session_destroy();
		echo "<script>self.location='../index.html'</script>";

		}
		else "Unsuccessful";

		if(isset($_REQUEST['logout'])){

		session_destroy();
		echo "<script>self.location='../index.html'</script>";


}
}

 if(isset($_REQUEST['addadmin'])){

		echo "<script>self.location='addadmin.php'</script>";
		}

 if(isset($_REQUEST['syllabus'])){

		echo "<script>self.location='updatesyllabus.php'</script>";
		}


?>


<head>

	 <meta charset="UTF-8">
    <title>Admin dashboard</title>


      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
<script>
  $(document).ready(function() {


    $('select').material_select();

    $(".button-collapse").sideNav();

  });
  </script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>




<body>

   
 <nav>
	 
    <div class="nav-wrapper blue">
      <div class="row">
                                       <img hspace="10" align="left" src="logo.png" width='50' height='50'>

        <div class="col s6 offset-s4">
         <a href="#" class="">Question Paper Generator :Admin Dashboard</a></div>

<div col="col s4">

         <a href="#" class="offset-s5">Hi, <?php echo $_SESSION["username"]; ?>
       </a>

       </div>
   </div>
   
  
    
  </nav>
        
 <div class="row blue">
    <div class="col s8 blue">
      <ul class="tabs white">
        <li class="tab col s2 blue  hoverable"><a class="active white-text" href="#test1">Home
</a></li>
        <li class="tab col s2 blue"><a class="active white-text" href="#test2">Developers</a></li>
        <li class="tab col s2 blue" ><a class="active white-text" href="#test3">Guidelines</a></li>
        <li class="tab col s2 blue"><a class="active white-text" href="#test4">About Us</a></li>
        <div class="indicator white" style="z-index:1" </div>

      </ul>

    </div>
               
    </div>
    
    <iframe align="right" src="http://free.timeanddate.com/clock/i5h7s9jw/n438/tlin/fn12/fs13/fcaaa/tct/pct/ftb/tt0/tw1/tm1/ta1/tb4" frameborder="0" width="128" height="32" allowTransparency="true"></iframe>


			<br><br>
 <div id="test1" class="col s12">      
      <div class = "row">
				     
</div>
<div class="container">



<div class="row">
	<div class="col s4">
			  <div class="card hoverable">
    				<div class="card-image waves-effect waves-block waves-light">
      					<img class="activator" src="images/addadmin_new.png">
    				</div>
   					 <div class="card-content">
     					 <span class="card-title activator grey-text text-darken-4">Add Faculty<i class="material-icons right">more_vert</i></span>
      					 <p><button class="btn waves-effect waves-light blue" type="button" id="addfaculty" onClick="location.href='addteacher.php'">Add
                   <i class="material-icons right">send</i>
                </button>
    				</div>
   					 <div class="card-reveal">
      						<span class="card-title grey-text text-darken-4">Add Faculty<i class="material-icons right">close</i></span>
     						 <p>Add faculty details to the database</p>
    				</div>
  			</div>
  </div>

<div class="col s4">
  <div class="card hoverable">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/addcourse.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Add course<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="button" name="gen" id="Add Courses" onClick="location.href='course.php'">Add
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Add course<i class="material-icons right">close</i></span>
      <p>Add course details to the database</p>
    </div>
  </div>
  </div>



<div class="col s4">
  <div class="card hoverable">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/assign_new.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Assign faculty<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="button" id="AssignTeacher" onClick="location.href='assignteacher.php'">Assign
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Assign faculty<i class="material-icons right">close</i></span>
      <p>Assign faculty to a course in the current semester</p>
    </div>
  </div>
  </div>

  <div class="col s4">
  <div class="card hoverable">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/eval1.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Add evaluation<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="button" id="addeval" onClick="location.href='addeval.php'">Add
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Add evaluation<i class="material-icons right">close</i></span>
      <p>Add an evalution CIE or SEE with start date</p>
    </div>
  </div>
  </div>
  <div class="col s4">
  <div class="card hoverable">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/update.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Update syllabus<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="syllabus" name="syllabus" id="syll" onClick="location.href='updatesyllabus.php'">Update
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Update sylabus<i class="material-icons right">close</i></span>
      <p>Update the syllabus for a course</p>
    </div>
  </div>
  </div>

  <div class="col s4">
  <div class="card hoverable">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/qp.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Select QP<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="button" id="SelQP" onClick="location.href='selqp.php'">Select
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Select QP<i class="material-icons right">close</i></span>
      <p>Select a question paper for evaluation CIE or SEE</p>
    </div>
  </div>
  </div>




  <div class="col s4">
  <div class="card hoverable">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/addadmin_new.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Add admin<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="addadmin" name="addadmin" id="addadmin" onClick="location.href='addadmin.php'">Add
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Add admin<i class="material-icons right">close</i></span>
      <p>Add new user with admin privelege</p>
    </div>
  </div>
  </div>

  <div class="col s4">
  <div class="card hoverable">
  	  <div class="card-image waves-effect waves-block waves-light">
    	  <img class="activator" src="images/assign.png">
      </div>
      <div class="card-content">
      		<span class="card-title activator grey-text text-darken-4">Generete reports<i class="material-icons right">more_vert</i></span>
      		<p><button class="btn waves-effect waves-light blue" type="button" id="report" onClick="location.href='report.php'">Get reports
    		<i class="material-icons right">send</i>
 			 </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Generate reports<i class="material-icons right">close</i></span>
      <p>Generate various reports about the usage of the portal</p>
    </div>
  </div>
  </div>

  <div class="col s4">
  <div class="card hoverable">
      <div class="card-image waves-effect waves-block waves-light">
        <img class="activator" src="images/logout.png">
      </div>
      <div class="card-content">
          <span class="card-title activator grey-text text-darken-4">Logout<i class="material-icons right">more_vert</i></span>
          <p><button class="btn waves-effect waves-light blue" type="submit" name="logout" id="prevqp" onclick="location.href='../index.html'">Logout
        <i class="material-icons right">send</i>
       </button>
      </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">Logout of the System<i class="material-icons right">close</i></span>
      <p>Click the button to logout of the system</p>
    </div>
  </div>
  </div>



        	</form>




			</div>      
   </div>
   </div>   
   <div id="test2" class="col s12">
    
    
<div class="row">
<center>
	<div class="col s3 offset-s3">
		
			  <div class="card hoverable">
    				<div class="card-image waves-effect waves-block waves-light">
      					<img class="activator" src="images/samhith.jpg">
    				</div>
   					 <div class="card-content">
     					 <span class="card-title activator grey-text text-darken-4">Samhith G B<i class="material-icons right">more_vert</i></span>
      					 <p>
    				</div>
   					 <div class="card-reveal">
      						<span class="card-title grey-text text-darken-4">Samhith G B<i class="material-icons right">close</i></span>
     						 <p>7th Semester, Department of Information Science and Engineering</p>
    				</div>
  </div>
  			</div>
  
    <div class="col s3">
		
			  <div class="card hoverable">
    				<div class="card-image waves-effect waves-block waves-light">
      					<img class="activator" src="images/pradeep.jpg">
    				</div>
   					 <div class="card-content">
     					 <span class="card-title activator grey-text text-darken-4">Pradeep V R<i class="material-icons right">more_vert</i></span>
      					 <p>
    				</div>
   					 <div class="card-reveal">
      						<span class="card-title grey-text text-darken-4">Pradeep V R<i class="material-icons right">close</i></span>
     						 <p>7th Semester, Department of Information Science and Engineering</p>
    				</div>
  			</div>
  </div>
   
    </div>
    </div>
    <div class="container">
   <div id="test3" class="col s12">
  <ul class="collapsible popout" data-collapsible="accordion">
 <li>
         <div class="collapsible-header"><i class="material-icons">filter_drama</i>Content</div>

<div class="collapsible-body">
    <p>
The examination will test a representative sample of the knowledge, understanding and skills outcomes in any given year. The intention of the examination in its formulation is to avoid predictability and encourage students to prepare for all syllabus outcomes. Over a number of years, it is expected that the full range of syllabus outcomes that are appropriately measured by an examination will be covered.
The examination as a whole will be constructed in such a way that it provides a representative sampling of a range of syllabus outcomes and questions that allow demonstration of performance across all levels in the performance scale.
The coverage of syllabus outcomes and content in the examination must allow students to demonstrate the levels of performance that are described in the bands on the performance scale. In preparation of a paper, each question should be mapped against syllabus outcomes, content and performance descriptions that students may demonstrate in answering the question. These will be addressed in the table of specifications, constructed by the examination committee each year.
Values and attitudes outcomes will not be included in the examination.</p></div>
</li>
<li>
         <div class="collapsible-header"><i class="material-icons">filter_drama</i>Level of difficulty</div>

<div class="collapsible-body">

<p>
The examination paper as a whole will provide the range of candidates with the opportunity to demonstrate what they know, understand and are able to do and will allow for appropriate differentiation of student performance at each band on the performance scale, including demonstration of higher order skills.
The level of difficulty of a paper should be maintained consistently from year to year.
</p></div>
</li><li>
     <div class="collapsible-header"><i class="material-icons">filter_drama</i>Paper format, length and layout</div>

<div class="collapsible-body">


<p>
In accordance with the examination specifications, the examinations should include a range and balance of question types, including multiple-choice questions, short-answer free response questions, open-ended questions and extended responses including essays.
The demands of the examination in terms of the number and length of student responses required, the amount of reading time provided and the complexity of the questions will be appropriate for the time allocated for the examination.
Examination layout will assist students in working through the paper and instructions will be clear and concise.
Questions will be set simultaneously with marking guidelines and will allow for marks to be awarded commensurate with performance.
The mark allocations and space provided to answer questions will be appropriate for the anticipated range of responses.
The marks allocated for each question or part question will be clearly indicated.
Wherever appropriate, explanatory information will be placed at the top of a section or page, rather than written within a question.
</p>
</div>
</li>
<li>
 <div class="collapsible-header"><i class="material-icons">filter_drama</i>Question structure and language</div>

<div class="collapsible-body">


<p>The language used in questions will be accessible to candidates. It is preferable to use the simplest and clearest language in the wording of questions so that it is clear to all students what they are expected to do.
Questions will require minimal reading time except where reading and comprehension are being specifically examined.
Stimulus material will only be provided when it is essential to answering the question.
Questions must be free of culture or gender bias, stereotyping or tokenism.
The requirements of the question will be clear to all adequately prepared students while encouraging flexibility in their responses.
Free response questions will have simple structures with a minimal number of parts and sub-parts. The parts will be sequenced in order of difficulty and allow the candidates to demonstrate what they know, understand and are able to do.
Where definitions such as ‘describe’, ‘analyse’, ‘synthesise’ and ‘evaluate’ are used they will be used consistently and appropriately.
</p>
</div>
</li>
<li>
 <div class="collapsible-header"><i class="material-icons">filter_drama</i>Comparability and moderation</div>

<div class="collapsible-body">

<p>To assist in achieving comparability, optional questions within a section of the paper must be marked using similar marking criteria. Choices within questions should have a comparable degree of difficulty.
To assist moderation in papers where there is a core and options there will be no internal choice within questions in the core section of the paper.
   </p>
   
   </div>
   </li>
     </div>
     <div id="test4" class = "col s12">
       
        <ul class="collapsible popout" data-collapsible="accordion">
 <li>
         <div class="collapsible-header"><i class="material-icons">filter_drama</i>About Project</div>

<div class="collapsible-body">
    <p>
      The Question Paper Generation is a project intended to automate the task of preparing the question paper for tests and exams. The question paper generation system provides a portal for the faculty to generate papers automatically with the help of a database of questions. All the questions are mapped to the course outcomes and Bloom’s taxonomy prior to the generation of the paper. The project can be implemented for both internal evaluations and final exams. The faculty gives the constraints as to how much weightage to be given for each unit included in the test syllabus. Repetition of questions are avoided and thus generation of a quality question paper is expected. The questions can be modified and deleted from the database. The faculty can only generate the question paper, review and approval of the question paper is given only to higher authority. Additional features such as adding questions, courses, faculty, syllabus to the database manually through forms and by uploading excel sheet are provided. The system is secure from unauthorized persons who try to access it. 
      </p>
      </div>
      </li>
<li>
         <div class="collapsible-header"><i class="material-icons">filter_drama</i>Purpose</div>

<div class="collapsible-body">
    <p>
      
            The purpose of the proposed system is to help the teachers create question papers from a pre- uploaded question bank. They can specify the chapter/unit and weightage of marks to be given for each unit and the question paper will be generated according to that constraint. Any number of question papers can be generated for a given set of constraints thereby giving the flexibility to choose the best out of the many number of question papers generated. The proposed system will minimize the burden on faculty to make sure that the question paper is within the realm of the syllabus and marks constraints as opposed to manually preparing the question paper.    </p>
            </div>
            </li>
            <li>
         <div class="collapsible-header"><i class="material-icons">filter_drama</i>Objective/Scope</div>

<div class="collapsible-body">
    <p>
         This system has its scope with every department in the college as every one of them needs to make question papers every month. They have to maintain each and every format detail and adhere to the syllabus. As the syllabus keeps changing they face trouble sticking to the valid questions. This system will help in a way that would break boundaries in generating question paper without worrying about various conditions since the conditions are handled by the question paper generator.   
         </p></div></li>
            
       </div>
   
			
			<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?4LnIqey2wEmjhJZqe62CvS0KdooNu81w";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
			
			</div>
			
			
			
			
			
		
</body>
</html>
