<?php
$name=isset ($_POST ['name'])? $_POST ['name']:''; 
	$email=isset ($_POST ['email'])? $_POST ['email']:'';
	$feedback=isset ($_POST ['feedback'])? $_POST ['feedback']:'';
	$success = 	isset($_GET['success']) ? $_GET['success'] : '';
  $empty = isset ($_POST ['empty'])? $_POST ['empty']:'';
  $msg = "<h3> Thak you for your message.</h3>";
  $to = "linagriciute.g@gmail.com";
  $subject = "New contact filled";
  $message = $feedback;
  // $message = "Please be informed";
  
  
    $error = array("name" => "","email" => "", "feedback" => "","database" => "");
    
	if($_POST){
		if (strlen($name) == 0 || strlen($name) >255 || strlen($email) == 0 || strlen($email) >255 || strlen($feedback) == 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)|| strlen($empty)>0){
            
			if  (strlen($name) == 0	){
			$error['name'] = 'Insert name';
			}
			if (strlen($name) >255)	{
			$error['name'] = 'Insert shorter name';
			}
			if (strlen($email) == 0 ){
			$error['email'] = 'Insert email';
			}
			if (strlen($email) >255 ){
			$error['email'] = 'Insert shorter email';
			}
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error['email'] = 'Insert @ or . symbol';
			}
			if (strlen($feedback) == 0){
				$error['feedback'] = 'Insert message';
			}
			if (strlen($empty)>0) {
				$error['empty'] = 'You are robot';
			}			
}
		else {
		
      $conn = new mysqli('localhost', 'linasyvokiene_linasyvokiene', 'hidden', 'linasyvokiene_feedback');
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
            }
            
			$name = $conn->real_escape_string($name);
			$email = $conn->real_escape_string($email);
			$feedback = $conn->real_escape_string($feedback);
			$saved = $conn->query ("INSERT INTO feedback (Name, Email, Feedback) 
			VALUES  ('$name','$email','$feedback') ");
			if($saved){
        // header('Location: index.php');
        header('Location: ' . $_SERVER['PHP_SELF'] . '?success=OK');
        mail($to, $subject, $message);
        // echo "Your mail has been sent successfuly ! Thank you for your feedback";
       
			}else{
				$error['database'] = "Error when saving";
			}
			}
	
	}
	if(strlen($success) == 0) { 
  }
?>


<!DOCTYPE html>
<html>
	<head>	
		<meta charset="utf-8">
		<title>Lina Syvokiene</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="shortcut icon" href="images/favicon-16x16.png"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Bitter|Quicksand|Slabo+27px|Source+Serif+Pro" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=ABeeZee|Concert+One|Roboto|Slabo+27px|Ubuntu" rel="stylesheet">

    
	</head> 
		
<body>
    
<!-- Header
   ================================================== -->
   <header id="home">

    <nav>

      <ul id="menu">
      <li><a class="smoothscroll" href="#home">HOME</a></li>
      <li><a class="smoothscroll" href="#about">ABOUT</a></li>
      <li><a class="smoothscroll" href="#resume">RESUME</a></li>
      <li><a class="smoothscroll" href="#contacts">CONTACTS</a></li>
      </ul>

      <div id="toggle">
        <div class="span" id="one"></div>
        <div class="span" id="two"></div>
        <div class="span" id="three"></div>
      </div>
    </nav>

    <div id="resize">
      <ul id="menu">
      <li><a class="smoothscroll" href="#home">HOME</a></li>
      <li><a class="smoothscroll" href="#about">ABOUT</a></li>
      <li><a class="smoothscroll" href="#resume">RESUME</a></li>
      <li><a class="smoothscroll" href="#contacts">CONTACTS</a></li>
      </ul>
    </div>
    
    </nav> 

    <div class="banner">
      <div class="banner-text">
      <h1 class="headline" id="home">Hello I'm Lina</h1>
        <h3> I'm a highly motivated and persistent Web Developer who always willing to learn new skills in order to enhance my abilities. I'm constantly challenging myself to learn new Front-End technologies and tools and feeling very enthusiastic about it. And I enjoy bringing ideas to life in the browser.
        </h3>
        <hr />
        <ul class="social">
          <li><a href="https://www.linkedin.com/in/lina-šyvokienė-a92aba161" target="_blank"><i class="fab fa-linkedin"></i></a></li>
          <li><a href="https://github.com/Linasyvokiene" target="_blank"><i class="fab fa-github-square"></i></a></li>
          <li><a href="https://www.facebook.com/lina.griciute" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
          <li><a href="mailto:info@linasyvokiene.info" target="_blank"><i class="fas fa-envelope"></i></a></li>
        </ul>
      </div>
    </div>

    <p class="scrolldown">
    <a class="smoothscroll" href="#about"><i class="fas fa-chevron-circle-down"></i></a>
    </p>

  </header> <!-- Header End -->
   

<!-- ================About Section================ -->

<div id="main">

  <div class="about" id="about">
  <h2>About Me</h2>
    <section class="aboutsection">  
    <hr>
    <div class="block">
      <img src="images/me111.jpg" alt="me" border-radius="50%"/>
    </div>
  <p>My journey as Web developer is just starting since my previous jobs were not related to web development, but my professional path was always closely linked to IT. I have always dreamed of having a job that I really enjoy, but only now I discovered my favorite activity web development that can make my dream come true. I started with an independent online courses, continued my training at the academy and in the future I plan to attend advanced courses. Now is the time to put my knowledge into practice and to improve with the help from the experienced ones.</p><br>
  <p> I'm looking for a place not only to gain experience, but also to contribute my knowledge and skills to the company's well-being. Although the experience of web developer is still rather limited, I will not be restricted by this as I am driven by the need of improvement and self-expression in this field and I am motivated and focused to achieve my goal. My re-qualification proves that I am not afraid of change and challenges and can quickly adapt to the new environment. I have accumulated experience in other areas that can also benefit in my new role. Creditworthiness assessment has developed excellent analytical skills, logical thinking and critical-case management capability. I have experience of coaching as I periodically trained new employees to manage technical databases. Work in the field of procurement allowed to improve negotiation skills and taught the specifics of planning and process management. By working as a specialist in IT department I had the opportunity to get to know more about the development, testing and implementation of specific applications. Experience in multinational companies improved my communication skills both inside and outside the company.</p><br>
  <p>Beside mentioned above, I am hardworking, business oriented, flexible, communicative, precise and responsible person. I appreciate good sense of humor, sharp mind, sincerity and openness. Therefore I feel confident that I could valuable asset to a company that is looking for hardworking and committed person in this field. </p>                      
    </section>

  <div class="download">
  <a href="images/Lina_Syvokiene_CV.pdf" download>
  <button type="button"><i class="fas fa-arrow-circle-down"></i> Download CV</button> </a>
</div>
<!-- end of download -->


</div>
<!-- end of about -->


<!-- ================Resume Section================ -->


<!-- ==================Experience=============== -->
<div class="experience" id="resume">
  
  <h2>Experience</h2>
  <hr>    

  <div class="timeline">

      <div class="container left">
        <div class="content">
          <h3>Senior Specialist<span id="separator"> | </span> <span id="date">2014 – Present</span></h3>
          <h5>Parliament of the Republic of Lithuania</h5>
          <p>Work in IT department with the Register of Legal Acts: registration and systematization of legal acts, editing and controlling general database.</p>
        </div>
      </div>

      <div class="container right">
        <div class="content">
          <h3>Procurement specialist<span id="separator"> | </span> <span id="date">Oct 2009 – Jul 2013</span></h3>
          <h5>UAB Circle K Lietuva</h5>
          <p>Coordination of main procurement activities: tendering, negotiating, leading and controlling, supply process regulation. Active cooperation with related business units both locally and
          internationally in order to assure appropriate, effective and economical result of goods and services procurement. </p>
        </div>
      </div>

      <div class="container left">
        <div class="content">
          <h3>Credit Underwriter<span id="separator"> | </span> <span id="date">Jan 2005 – Jul 2009</span></h3>
          <h5>EH Kreditverzicherung's AG
              /Subsidiary of Allianz SE/</h5>
          <p>Analysis of financial information, evaluation of companies’ creditworthiness, risk assessment, collection of financial information, risk monitoring, preparing and presenting proposals of
          risk assessment decisions for the Credit committee.</p>
        </div>
      </div>

      <div class="container right">
        <div class="content">
          <h3>Specialist<span id="separator"> | </span> <span id="date">2002 – 2005</span></h3>
          <h5>Parliament of the Republic of Lithuania</h5>
          <p>Coordination of documents flow of the department, preparing and organization of department’s internal database, office administration.</p>
        </div>
      </div>

      <div class="container left">
        <div class="content">
        <h3>Engineer assistant in IT department<span id="separator"> | </span> <span id="date">1999 – 2002
        </span></h3>
        <h5>Parliament of the Republic of Lithuania</h5>
        <p>Assisting in historical movies creation and documents recovery, work with internal LRS database, help during the Parliament elections.</p>
        </div>
      </div>
     
  </div>
  <!-- end of timeline -->

</div>
<!-- end of experience -->


<!-- ==================Education=============== -->

<div class="resume">

<div class="education-big">
  <h2>Education</h2>
  <hr>    

    <ol>
      <li>
        <p class="diplome">VILNIUS COLLEGE</p>
        <span class="point"></span>
        <p class="description"> <span id="strong"> Office administration (Higher edc.) </span><br><span id="italic"> 1998 – 2001 </span> </p>
      </li>
      <li>
        <p class="diplome">LITHUANIAN UNIVERSITY OF EDUCATIONAL SCIENCES</p>
        <span class="point"></span>
        <p class="description"><span id="strong"> Economy and business fundamentals (Bachelor’s degree) </span> <br> <span id="italic">  2002 – 2006 </span></p>
      </li>
      <li>
        <p class="diplome">VILNIUS UNIVERSITY</p>
        <span class="point"></span>
        <p class="description"><span id="strong"> Insurance management (Master’s degree)</span> <br> <span id="italic"> 2006 – 2008 </span> </p>
      </li>
      <li>
        <p class="diplome">CODE ACADEMY</p>
          <span class="point"></span>
        <p class="description"> <span id="strong"> Front End Courses </span> <br> <span id="italic"> March 2018 <br>– May 2018 </span> </p>
      </li>
      <li>
      <p class="diplome">CODE ACADEMY</p>
        <span class="point"></span>
        <p class="description"> <span id="strong"> Full Stack Courses </span> <br> <span id="italic">  July 2018 <br>– Sept 2018 </span> </p>
      </li>
      <li>
      <p class="diplome">To be continued</p>
      <span class="point"></span>
      <p class="description">I Believe in Lifelong Learning :)</p>
    </li>
  </ol>

</div>
<!-- end of education big -->

<div class="education">
  <h2>Education</h2>
    <hr>   

		<div class="boxed-section1">  

      <div class="highlight-box">
        <div>
          <p><span id="text">VILNIUS COLLEGE</span></p>
          <p class="description"> <span id="strong"> Office administration (Higher edc.) </span><br><span id="italic"> 1998 – 2001 </span> </p>
        </div>
      </div>

      <div class="highlight-box">
        <div>
          <p><span id="text">LITHUANIAN UNIVERSITY OF EDUCATIONAL SCIENCES</span></p>
        <p class="description"><span id="strong"> Economy and business fundamentals (Bachelor’s degree) </span> <br><span id="italic">  2002 – 2006 </span></p>
        </div>
      </div>

      <div class="highlight-box">
        <div>
          <p><span id="text">VILNIUS UNIVERSITY</span></p>
          <p class="description"><span id="strong"> Insurance management (Master’s degree) </span> <br><span id="italic">  2006 – 2008  </span></p>
        </div>
      </div>


      <div class="highlight-box">
        <div>
          <p><span id="text">CODE ACADEMY</span></p>
          <p class="description"><span id="strong"> Front End Courses</span> <br><span id="italic">   March 2018 <br>– May 2018 </span></p>
        </div>
      </div>


      <div class="highlight-box">
        <div>
          <p><span id="text">CODE ACADEMY</span></p>
          <p class="description"><span id="strong"> Full Stack Courses</span> <br><span id="italic"> July 2018 <br>– Sept 2018 </span></p>
        </div>
      </div>

      <div class="highlight-box">
        <div>
          <p><span id="text">To be continued</span></p>
          <p class="description"><span id="strong"> I Believe in Lifelong Learning :)</span></p>
        </div>
      </div>


</div>
<!-- end of education -->
</div>
<!-- end of resume -->

<!-- ================Skills=================== -->
  <div class="skills">
    <h2>Skills</h2>
    <hr>   

		<div class="boxed-section">

      <div class="highlight-box">
          <div>
            <p><span id="text">HTML</span><br><i class="fas fa-check"></i></p>
          </div>
      </div>

      <div class="highlight-box">
          <div>
            <p><span id="text">CSS</span><br><i class="fas fa-check"></i></p>
          </div>
      </div>

      <div class="highlight-box">
            <div>
              <p><span id="text">RESPONSIVE DESIGN</span><br><i class="fas fa-check"></i></p>
            </div>
      </div>

      <div class="highlight-box">
            <div>
              <p><span id="text">Bootstrap</span><br><i class="fas fa-check"></i></p>
            </div>
      </div>

      <!-- <div class="highlight-box">
            <div>
              <p><span id="text">Flexbox</span><br><i class="fas fa-check"></i></p>
            </div>
      </div> -->

      <div class="highlight-box">
            <div>
              <p><span id="text">GitHub</span><br><i class="fas fa-check"></i></p>
            </div>
      </div>

      <div class="highlight-box">
            <div>
              <p><span id="text">JavaScript</span><br><i class="fas fa-check"></i></p>
            </div>
      </div>

      <div class="highlight-box">
            <div>
              <p><span id="text">PHP</span><br><i class="fas fa-check"></i></p>
            </div>
      </div>

      <div class="highlight-box">
              <div>
                <p><span id="text">MySQL</span><br><i class="fas fa-check"></i></p>
              </div>
      </div>

    </div>
    <!-- end of boxed -->

  </div>
  <!-- end of skills -->



  <!-- ==============Courses=============== -->
  
  <div class="courses">

    <h2>Online courses</h2>
    <hr>   
    </div>

      <div class="courses_wrapper">
        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <p>Khan Academy</p>
            </div>
            <div class="flip-box-back">
              <img src="images/khanacademy.png" alt="khan"/>
            </div>
          </div>
        </div>
        

      <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <p>Udemy</p>
            </div>
              <div class="flip-box-back">
                <img src="images/udemy1.jpg" alt="udemy" height="170" width="470"/>
              </div>
            </div>
          </div>
      

      <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <p>Free Code Camp</p>
            </div>
            <div class="flip-box-back">
              <img src="images/free1.png" alt="free" height="140" width="300"/>
            </div>
          </div>
        </div>

      <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <p>CodeCademy</p>
            </div>
            <div class="flip-box-back">
              <img src="images/codecademy.png" alt="code" height="140" width="300"/>
            </div>
          </div>
        </div>

</div>
<!-- end of courses -->

<!-- ==============Trainings=============== -->

  <div class="trainings">
    <h2>Trainings</h2>
    <hr>   
  </div>

  <div class="trainings_wrapper">

    <section class="train">
    <img src="images/negotiation.jpg" alt="nego" class="under" height="180px"/>
      <div class="middle">
      <div class="textontop">Negotiating skills courses („Scotwork“) </div>
      </div>
  </section>

    <section class="train">
    <img src="images/it1.jpg" alt="it" class="under" height="180px"/>
      <div class="middle">
      <div class="textontop">Information and communication
          technologies (Lithuanian Institute of Public Administration)
      </div>
      </div>
  </section>

    <section class="train">
    <img src="images/legal.jpg" alt="legal" class="under" height="180px"/>
      <div class="middle">
        <div class="textontop">Public administration system and legal principles of administrative activities (Lithuanian Institute of Public Administration)
        </div>
      </div>
  </section>

    <section class="train">
    <img src="images/fish.jpg" alt="fish" class="under" height="180px"/>
      <div class="middle">
        <div class="textontop">Office-work qualification courses (Lithuanian Institute of Public Administration)</div>
      </div>
  </section>


</div>
<!-- end of trainings wr -->

</div>
<!-- end of resume -->


<!-- ============Contacts=========== -->

  <div class="theend">

    <div class="contacts" id="contacts">
      <h2>Contacts</h2>
      <hr>   
    </div>


    <div class="getin">

      <div class="leave">
        <h2 span id="smth"> Let's get in touch</span> </h2>
      </div>

    <div class="allcontacts">

      <div class="mob">
        <div class="conticon">
          <div class="tooltip">
          <a><i class="fas fa-phone-square"></i></a><br><span class="tooltiptext">+37065059557</span>
          </div>
        </div>
      </div> 

      <div class="email">
        <div class="conticon">
          <div class="tooltip">
          <a href="mailto:info@linasyvokiene.info" target="_blank" class="btn btn-default btn-lg"><i class="fas fa-envelope"></i></a><br><span class="tooltiptext">info@linasyvokiene.info</span>
          </div>
        </div>
      </div> 

      <div class="linkedin">
        <div class="conticon">
          <div class="tooltip">
          <a href="https://www.linkedin.com/in/lina-šyvokienė-a92aba161" target="_blank"><i class="fab fa-linkedin"></i></a><br><span class="tooltiptext">Lina Šyvokienė</span>
          </div>
        </div>
      </div> 

      <div class="facebook">
        <div class="conticon">
          <div class="tooltip">
          <a href="https://www.facebook.com/lina.griciute" target="_blank"><i class="fab fa-facebook-square"></i></a><br><span class="tooltiptext">Lina Šy</span>
          </div>
        </div>
      </div> 

      <div class="git">
        <div class="conticon">
          <div class="tooltip">
          <a href="https://github.com/Linasyvokiene" target="_blank"><i class="fab fa-github-square"></i></a><br><span class="tooltiptext">Lina Šyvokienė</span>
          </div>
        </div>
      </div> 


    </div>
  <!-- end of allcontacts -->


    </div>
<!-- end of getin -->


   <div class="feedback">
    <section>
      <div class="leave">
      <h2 span id="smth">Or leave a message </span> </h2>
      </div>

     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

      <div class="row" id="fdbck">
        <div class="cellone">
          <input type="text" name ="name" value="<?php echo $name;?>" placeholder="Name"/><br>
          <?php echo "<p style='color:red; font-size:14px;'>" .$error['name']."</p>"; ?><br>
          </div>
          <div class="celltwo">
          <input type="email" name ="email" value="<?php echo $email; ?>" placeholder="Email"/><br>
          <?php echo "<p style='color:red; font-size:14px;'>" .$error['email'] ."</p>"; ?><br>
        </div> 
      </div> 
        <!-- end of row -->

      <div class="messagebox">
        <textarea name="feedback" placeholder="Your message"><?php echo $feedback; ?></textarea><br>
        <?php echo "<p style='color:red; font-size:14px;'>" .$error['feedback'] ."</p>"; ?><br>

      </div>
          <input type="text" name ="empty" value=""/><br>
          <button type="submit" class="leavefeedbackbtn">SEND</button>	

     </form>
    </section>

     </div>
  <!-- end of feedback -->

 
  </div>
<!-- end of theend -->


<div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="fas fa-chevron-circle-up"></i></a></div>


</div> 

</div>
  
</div>


<footer>

  <div class="copyright">

  <p>&copy; 2018 Lina Šyvokienė. All rights resserved.
  </p>   

  </div>

</footer>



   <!-- Java Script
   ================================================== -->
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
<script>
$(document).ready(function(){
  $("a").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        window.location.hash = hash;
      });
    } 
  });
});
</script>


<script>
$(function() {
  
  $("#toggle").click(function() {
    $(this).toggleClass("on");
    $("#resize").toggleClass("active");
  });
  
});

</script>

</body>
		
</html>



