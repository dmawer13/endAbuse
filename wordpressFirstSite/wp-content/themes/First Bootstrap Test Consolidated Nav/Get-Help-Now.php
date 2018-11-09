<?php /* Template Name: Get-Help-Now */ ?>

<?php get_header(); ?>

<?php
// php populate html table from mysql database
$hostname = "localhost";
$username = "root";
$password = "root";
$databaseName = "CSV_DB";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query

//Hotline, one shot.

$HotlineConcat = "SELECT Format, Title, Link, Number, Notes, CONCAT('<a href=\"tel:', Number, '\">', Number, '</a>') As ClickPhone FROM MASTER1023 WHERE Format = 'Hotline' ORDER BY TITLE";


// results based on select queries above.
//$result1 = mysqli_query($connect, $Hotline);
$result2 = mysqli_query($connect, $HotlineConcat)
?>

<div class="container-fluid">

  <div class="row">
        <div class="col-sm-12 text-center lackMargins" style="background-color: #D5EBFF">
            <img src="<?php echo get_bloginfo('template_directory');?>/DDPCProject1Small.jpg" class="photoMargins img-fluid" alt="Intro Image">
        </div>
    </div>

 <div class="row">
        <div class="col-sm-12 text-left mainPageBlurb" style="background-color:#3482C9;">
                    <h1 style="color: white;">Get Help Now</h1>
                    <p style="color:white; padding-bottom: 20px;">Are you or someone you know in need of immediate assistance? Utilize a list of hotlines to report suspected incidents of abuse, neglect, or exploitation to professionals.</p>
        </div>
    </div>    

<div class="text-left mainPageBlurb"> 
<div class="row">
    
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Hotlines</caption>    
            <tr>
                <th>Title</th>
                <th>Number</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result2)):;?>
            <tr class="accordion-toggle" data-toggle="collapse" data-target=".123">
                <td><?php echo $row1["Title"];?></td>
                <td><?php echo $row1["ClickPhone"];?></td>
            </tr>
            <tr class="accordion-body collapse 123" style="font-size:12px">
                <td class="tableExpSm"><?php echo $row1["Notes"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>
  </div>
    

<!--
<table class="table">
  <thead>
    <tr>
      <th>Account ID</th>
      <th>Name</th>
      <th>Number</th>
      <th>Owner</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <tr class="accordion-toggle" data-toggle="collapse" data-target="#12345-cores">
      <td>12345</td>
      <td>Title of Study</td>
      <td>4444-5555-2222-347012</td>
      <td>Daniel Rader</td>
      <td>Granted</td>
    </tr>
    <tr>
      <td class="accordion-body collapse" id="12345-cores">
        <table class="table">
          <thead>
            <th>Core</th>
            <th>Spending Limit</th>
          </thead>
          <tbody>
            <tr>
              <td>GDL</td>
              <td>2,000.00</td>
            </tr>
            <tr>
              <td>MCS</td>
              <td>15,700.61</td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
    
    
-->
<!--leave this div alone.          -->
</div>      

<?php get_footer(); ?>
