<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Shinebee</title>
<!-- Favicon-->
<link rel="icon" type="image/png" href="img/favicon.png" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
<link href="css/footer.css" rel="stylesheet" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
div.workbook:hover {
background-color:#ef6371;
}
div.workbook {
opacity: 0.7;
background-color:#f9929f;
border-radius:5px;
}
div.workbook:hover {
opacity: 1;
-webkit-transition: all 0.7s ease-in-out;
-moz-transition: all 0.7s ease-in-out;
-o-transition: all 0.7s ease-in-out;
transition: all 0.7s ease-in-out;
}


div.quiz:hover {
background-color:#098a7b;
}
div.quiz {
opacity: 0.7;
background-color:#098a7b;
border-radius:5px;
}
div.quiz:hover {
opacity: 1;
-webkit-transition: all 0.7s ease-in-out;
-moz-transition: all 0.7s ease-in-out;
-o-transition: all 0.7s ease-in-out;
transition: all 0.7s ease-in-out;
}

div.pt:hover {
background-color:#ef6371;
}
div.pt {
opacity: 0.7;
background-color:#ef6371;
border-radius:5px;
}
div.pt:hover {
opacity: 1;
-webkit-transition: all 0.7s ease-in-out;
-moz-transition: all 0.7s ease-in-out;
-o-transition: all 0.7s ease-in-out;
transition: all 0.7s ease-in-out;
}


div.mynotes:hover {
background-color:#098a7b;
}
div.mynotes {
opacity: 0.7;
background-color:#098a7b;
border-radius:5px;
}
div.mynotes:hover {
opacity: 1;
-webkit-transition: all 0.7s ease-in-out;
-moz-transition: all 0.7s ease-in-out;
-o-transition: all 0.7s ease-in-out;
transition: all 0.7s ease-in-out;
}
</style>
</head>
<body>
<!-- Top navigation-->

<!-- Header Section -->
<?php include('topheader.php');?>
<!-- Header Section -->

<!-- Home Hero Section-->
<section class="herosec">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<h1>Platform for UPSC Exam Preparation</h1>
<div class="videoWrapper">
<iframe width="560" style="border-radius:3px;" height="800" src="https://www.youtube.com/embed/NCuxPHtKxVg" frameborder="0" allowfullscreen></iframe>
</div>

<div class="row">
	<div class="col-sm-5">
		<a href="pt_yearwise.php" class="btn btn-primary btn-lg">PRELIMS FORUM</a>
	</div>

	<div class="col-sm-1">
		
	</div>

	<div class="col-sm-6">
		<a href="upload_and_practise.php" class="btn btn-primary btn-lg">UPLOAD AND PRACTISE</a>
	</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-12">
<div class="hero-home-login-form">
<div class="text-center">
<h4>Get Started with Shinebee!</h4>
<h6>Boost your UPSC exam preparation with us</h6>
</div>
<?php 
session_start();
if(isset($_SESSION['user_email']))
{
$user_email = $_SESSION['user_email'];

}
else
{
include 'home_page_login.php';
}
?>
</div>
</div>

</div>
</div>
</section>
<!-- Home Hero Section-->

<!-- Home Why Shine Bee Section-->
<section class="whyshinebeesec">
<div class="container">
<h2>Why Choose Shine Bee?</h2>
<div class="row">
<div class="col-lg-6 col-md-6 col-12">
<img src="img/why2.jpg" class="img-fluid">
</div>

<div class="col-lg-6 col-md-6 col-12">
<p>Shine Bee is designed for the students who is looking for the strategical preparation for UPSC. 
It will reduce the revision
time drastically. The notes section will make sure all the points added by you at one place. 
Shine Bee is designed for the students who is looking for the strategical preparation for UPSC. 
It will reduce the revision time drastically. The notes section will make sure all the points
added by you at one place.</p>
<p>Shine Bee is designed for the students who is looking for the strategical preparation for UPSC. 
It will reduce the revision time drastically. The notes section will make sure all the points added by you at one place. 
Shine Bee is designed for the students who is looking for the strategical preparation for UPSC. 
It will reduce the revision time drastically. The notes section will make sure all the points
added by you at one place.</p>
</div>
</div>
</div>
</section>

<!-- <div class="container-fluid">

<div height="250px" style="text-align:center; color:white; font-size:30px; background-color:#e04a58; border-radius:5px;">Workbook Downloads</div>
<br/>
<div class="row">
<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center workbook">
<a class="btn btn-danger p-3" href="workbook.php?id=1">Workbook #1</a>
</div>	
</div>

<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center workbook">
<a class="btn btn-danger p-3" href="workbook.php?id=2">Workbook #2</a>
</div>
</div>

<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center workbook">
<a class="btn btn-danger p-3" href="workbook.php?id=3">Workbook #3</a>
</div>
</div>
</div>
</div>
<br/>
<hr>
<div class="container-fluid">

<div height="250px" style="text-align:center; color:white; font-size:30px; background-color:#0976ab; border-radius:5px; color:white">Training and Mind Quiz</div>
<br/>
<div class="row">
<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center quiz">
<span align="center">
<h2>Level 1</h2>
<br/>
<a class="btn btn-info" href="take_quiz.php?quiz_level=1">Take Quiz</a>
</span>		
</div>
</div>

<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center quiz">
<span align="center">
<h2>Level 2</h2>
<br/>
<a class="btn btn-info" href="take_quiz.php?quiz_level=2">Take Quiz</a>
</span>		
</div>
</div>

<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center quiz">
<span align="center">
<h2>Level 3</h2>
<br/>
<a class="btn btn-info" href="take_quiz.php?quiz_level=3">Take Quiz</a>
</span>		
</div>
</div>
</div>
</div>


<br/>
<hr>
<div class="container-fluid">

<div style="text-align:center; color:white; font-size:30px; background-color:#e04a58; border-radius:5px;">UPSC Last Year Questions</div>
<br/>
<div class="row">
<div class="col-sm-3">
<div class="jumbotron jumbotron-fluid text-center pt">
<span align="center">
<h2>Year Wise</h2>
<br/>
<a class="btn btn-danger" href="pt_yearwise.php">Start Analysis</a>
</span>		
</div>
</div>

<div class="col-sm-3">
<div class="jumbotron jumbotron-fluid text-center pt">
<span align="center">
<h2>Topic Wise</h2>
<br/>
<a class="btn btn-danger" href="pt_topicwise.php">Start Analysis</a>
</span>		
</div>
</div>

<div class="col-sm-3">
<div class="jumbotron jumbotron-fluid text-center pt">
<span align="center">
<h2>Question Wise</h2>
<br/>
<a class="btn btn-danger" href="pt_question_typewise.php">Start Analysis</a>
</span>		
</div>
</div>

<div class="col-sm-3">
<div class="jumbotron jumbotron-fluid text-center pt">
<span align="center">
<h2>Analyse tag Wise</h2>
<br/>
<a class="btn btn-danger" href="pt_question_tagwise.php">Start Analysis</a>
</span>		
</div>
</div>
</div>
</div>




<br/>
<hr>
<div class="container-fluid">

<div style="text-align:center; color:white; font-size:30px; background-color:#0976ab; border-radius:5px;">My Notes</div>
<br/>
<div class="row">
<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center mynotes">
<span align="center">
<a class="btn btn-info p-3" href="my_notes_of_quiz.php">Notes of Training Mind Quiz</a>
</span>		
</div>
</div>

<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center mynotes">
<span align="center">
<a class="btn btn-info p-3" href="my_notes_of_pt_last_year.php">Notes of UPSC Last Year Question</a>
</span>		
</div>
</div>

<div class="col-sm-4">
<div class="jumbotron jumbotron-fluid text-center mynotes">
<span align="center">
<a class="btn btn-info p-3" href="other_notes.php">Other Notes</a>
</span>		
</div>
</div>
</div>
</div> -->

<?php 
include 'footer.html';
?>
</body>
</html>
