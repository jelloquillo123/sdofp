<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
require 'school_authentication.php';
$username = $_SESSION['username'];

$error_message="";
$n0=""; $n1=""; $n2=""; $n3=""; $n6=""; $n7=""; $n8=""; $n9="";
$sch=mysqli_query($db,"SELECT school.school_name,diocese.diocese_name,school.school_id
  FROM school
  INNER JOIN diocese
  ON school.diocese_id=diocese.diocese_id
  INNER JOIN coordinator
  ON school.school_id=coordinator.school_id
  INNER JOIN account
  ON coordinator.account_id=account.account_id
  WHERE account.username='$username'");
$scn=mysqli_fetch_row($sch);
$school=$scn[2];
$stud=mysqli_query($db,"SELECT stud_id,lname,fname,mname,g_level,gender,age,account_id,email,t_stat
  FROM student WHERE school_id='$school'");
$stud_totalq=mysqli_query($db,"SELECT COUNT(student.stud_id) FROM student WHERE school_id='$school'");
$stud_total=mysqli_fetch_row($stud_totalq);

if(isset($_POST['submit']))
{
  $n0 = $_POST['studnum'];
  $n1 = $_POST['lname'];
  $n2 = $_POST['fname'];
  $n3 = $_POST['mname'];
  $n6 = $_POST['glevel'];
  $n7 = $_POST['gender'];
  $n8 = $_POST['bday'];
  $n9 = $_POST['email'];
  
  $query_stud="SELECT * FROM student WHERE stud_id='$n0'";
  $res_stud=mysqli_query($db,$query_stud);
    
    if (mysqli_num_rows($res_stud) > 0 ) {

      $error_message = "Sorry... Student ID already listed";  
    }

    else{

      $studi=mysqli_query($db,"SELECT account_id from account");
      

      while($s=mysqli_fetch_assoc($studi))
      {
        $stuid=$s['account_id'];
      }

      $stuid=$stuid+1;
      
      $year= date("Y");
      $today = date("Y-m-d");
      $diff = date_diff(date_create($n8),date_create($today));
      $ag = $diff->format('%y');
      $default_pass="sdofp-ecmi";
      $hash_password = password_hash($default_pass, PASSWORD_DEFAULT);

      mysqli_query($db,"INSERT INTO account (username,pword,user_id)
        VALUES('$n0','$hash_password','3')");

      mysqli_query($db, "INSERT INTO student (stud_id,fname,lname,mname,school_id,g_level,gender,account_id,age,email,t_stat,year) 
        VALUES ('$n0','$n2','$n1','$n3','$school','$n6','$n7','$stuid','$ag','$n9','Not taken','$year')");
      echo "<script>
      alert('Successfully Added a Student.');
      window.location.href='school_students.php';
      </script>";
    }
}

$taken_query=mysqli_query($db,"SELECT COUNT(student.stud_id) FROM student WHERE student.t_stat='Taken' AND student.school_id='$school'");
$taken_total=mysqli_fetch_row($taken_query);

$not_taken_query=mysqli_query($db,"SELECT COUNT(student.stud_id) FROM student WHERE student.t_stat='Not taken' AND student.school_id='$school'");
$nt_total=mysqli_fetch_row($not_taken_query);
?>