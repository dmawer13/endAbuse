<?php /* Template Name: Targets_Elder_Subpage */ ?>

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

//Physical, AudioVideo
$elderAV = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'AudioVideo' && Elder = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$elderSites = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Website' && Elder = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$elderArticles = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Article' && Elder = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$elderBlogs = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Blog' && Elder = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$elderFactSheets = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'FactSheet' && Elder = 'TRUE' ORDER BY TITLE";


// results based on select queries above.
$result1 = mysqli_query($connect, $elderAV);
$result2 = mysqli_query($connect, $elderSites);
$result3 = mysqli_query($connect, $elderArticles);
$result4 = mysqli_query($connect, $elderBlogs);
$result5 = mysqli_query($connect, $elderFactSheets);
?>

<div class="container-fluid">

  <div class="row">
        <div class="col-sm-12 text-center lackMargins" style="background-color: #D5EBFF">
            <img src="<?php echo get_bloginfo('template_directory');?>/DDPCProject1Small.jpg" class="photoMargins img-fluid" alt="Intro Image">
        </div>
    </div>

 <div class="row">
        <div class="col-sm-12 text-left mainPageBlurb" style="background-color:#3482C9;">
                    <h1 style="color: white;">Targets of Abuse: Who?</h1>
                    <p style="color:white; padding-bottom: 20px;">Abuse can happen to anyone, and some populations are at a greater risk of becoming a target of abuse, neglect, or exploitation. Learn more about the victimization of children, elders, and those living in group homes.</p>
        </div>
    </div>
    
<!---------------------------- Centered Pills ------------------------------>
    
<div class="row">
<div class="col-sm-12 subCatDiv">
<!--    background-color:#D5EBFF;-->
<ul class="nav nav-pills nav-justified">
  <li class="nav-item active">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/targets-of-abuse/elder-abuse/">Elder Abuse</a></li>
  <li class="nav-item">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/targets-of-abuse/child-abuse/">Child Abuse</a></li>
  <li class="nav-item">
      <a class="subCatPills" href="http://localhost:8888/wordpressFirstSite/targets-of-abuse/domestic/">Domestic/Group Home Abuse</a></li>
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
    <!-- Elder, AudioVideo -->
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
    <!-- Elder, Websites-->
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
      <!-- Elder, Articles-->
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
<!-- Elder, Blogs-->
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
<!-- Elder, Fact Sheets-->
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
</div>
</div>

<br><br>

<?php get_footer(); ?>
