<?php /* Template Name: Forms_Neglect_Subpage */ ?>

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

//Neglect, AudioVideo
$negAV = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'AudioVideo' && Neglect = 'TRUE' ORDER BY TITLE";
//Neglect, Websites
$negSites = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Website' && Neglect = 'TRUE' ORDER BY TITLE";
//Neglect, Websites
$negArticles = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Article' && Neglect = 'TRUE' ORDER BY TITLE";
//Neglect, Websites
$negBlogs = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Blog' && Neglect = 'TRUE' ORDER BY TITLE";
//Neglect, Websites
$negFactSheets = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'FactSheet' && Neglect = 'TRUE' ORDER BY TITLE";


// results based on select queries above.
$result1 = mysqli_query($connect, $negAV);
$result2 = mysqli_query($connect, $negSites);
$result3 = mysqli_query($connect, $negArticles);
$result4 = mysqli_query($connect, $negBlogs);
$result5 = mysqli_query($connect, $negFactSheets);
?>

<div class="container-fluid">

  <div class="row">
        <div class="col-sm-12 text-center lackMargins" style="background-color: #D5EBFF">
            <img src="<?php echo get_bloginfo('template_directory');?>/DDPCProject1Small.jpg" class="photoMargins img-fluid" alt="Intro Image">
        </div>
    </div>

 <div class="row">
        <div class="col-sm-12 text-left mainPageBlurb" style="background-color:#3482C9;">
                    <h1 style="color: white;">Forms of Abuse: What?</h1>
                    <p style="color:white; padding-bottom: 20px;">Abuse appears in many different forms. Explore available information about the different types of abuse, warning signs, and ways to help victims.  Select a category from the selection below.</p>
        </div>
    </div>
    
<!---------------------------- Centered Pills ------------------------------>
    
<div class="row">
<div class="col-sm-12 subCatDiv">
<!--    background-color:#D5EBFF;-->
<ul class="nav nav-pills nav-justified">
  <li class="nav-item">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/forms-of-abuse/physical-abuse/">Physical Abuse</a></li>
  <li class="nav-item active">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/forms-of-abuse/neglect/">Neglect and Exploitation</a></li>
  <li class="nav-item">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/forms-of-abuse/verbal/">Verbal and Psychological Abuse</a></li>
  <li class="nav-item">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/forms-of-abuse/online/">Cyber/Online Abuse</a></li>
  <li class="nav-item">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/forms-of-abuse/sexual-abuse/">Sexual Abuse</a></li>
<!--  <li><a href="#">Menu 3</a></li>-->
</ul>
    </div>
    </div>    
    
<br>    
<br>    
    
    
<div class="row">
<div class="col-sm-12 text-left mainPageBlurb">    
<!------------------------------Tabs Start Here------------------------------------>
<ul class="nav nav-tabs nav-justified">
  <li class="active"><a data-toggle="tab" href="#home">Video and Audio</a></li>
  <li><a data-toggle="tab" href="#menu1">Websites</a></li>
  <li><a data-toggle="tab" href="#menu2">Articles</a></li>
  <li><a data-toggle="tab" href="#menu3">Blogs</a></li>
  <li><a data-toggle="tab" href="#menu4">Fact Sheets</a></li>
</ul>
    </div>
    </div>

<div class="tab-content mainPageBlurb">
    
  <div id="home" class="tab-pane fade in active">
    <!-- Neglect, AudioVideo -->
<div class="row">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Video and Audio</caption>    
            <tr>
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <tr>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>
  </div>
    
  <div id="menu1" class="tab-pane fade">
    <!-- Neglect, Websites-->
<div class="row">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Websites</caption>    
            <tr>
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result2)):;?>
            <tr>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>   
  </div>
    
    
  <div id="menu2" class="tab-pane fade">
      <!-- Neglect, Articles-->
<div class="row">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Articles</caption>     
            <tr>
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result3)):;?>
            <tr>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>    
      
<div id="menu3" class="tab-pane fade"> 
<!-- Neglect, Blogs-->
<div class="row">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Blogs</caption>     
            <tr>
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result4)):;?>
            <tr>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>    
   
<div id="menu4" class="tab-pane fade"> 
<!-- Neglect, Fact Sheets-->
<div class="row">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Fact Sheets</caption>         
            <tr> 
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result5)):;?>
            <tr>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>     
    
      
</div>      
</div>


<br><br>

<?php get_footer(); ?>
