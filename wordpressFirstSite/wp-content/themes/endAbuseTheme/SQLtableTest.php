<?php /* Template Name: Resources2 */ ?>

<?php get_header(); ?>

<!--
<div class="row">
    <div class="col-sm-12 text-left mainPageBlurb">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Forms of Abuse: What?</caption>
 
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
$queryAV = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'AudioVideo' && Physical = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$querySites = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Website' && Physical = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$queryArticles = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Article' && Physical = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$queryBlogs = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'Blog' && Physical = 'TRUE' ORDER BY TITLE";
//Physical, Websites
$queryFactSheets = "SELECT Format, Title, Link, CONCAT('<a href=\"', Link, '\">', Title, '</a>') As ClickLink FROM MASTER1023 WHERE Format = 'FactSheet' && Physical = 'TRUE' ORDER BY TITLE";

// results based on select queries above.
$result1 = mysqli_query($connect, $queryAV);
$result2 = mysqli_query($connect, $querySites);
$result3 = mysqli_query($connect, $queryArticles);
$result4 = mysqli_query($connect, $queryBlogs);
$result5 = mysqli_query($connect, $queryFactSheets);
?>

<!-- Physical, AudioVideo -->
<div class="row">
    <div class="col-sm-12 text-left mainPageBlurb">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Video and Audio</caption>    
            <tr>
<!--Dave: Just testing the format below, gonna delete it later.-->
                <th>Format</th> 
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <tr>
                <td><?php echo $row1["Format"];?></td>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>
<br><br>

<!-- Physical, Websites-->
<div class="row">
    <div class="col-sm-12 text-left mainPageBlurb">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Websites</caption>    
            <tr>
<!--Dave: Just testing the format below, gonna delete it later.-->
                <th>Format</th> 
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result2)):;?>
            <tr>
                <td><?php echo $row1["Format"];?></td>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>    
<br><br>

<!-- Physical, Articles-->
<div class="row">
    <div class="col-sm-12 text-left mainPageBlurb">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Articles</caption>     
            <tr>
<!--Dave: Just testing the format below, gonna delete it later.-->
                <th>Format</th> 
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result3)):;?>
            <tr>
                <td><?php echo $row1["Format"];?></td>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>    
<br><br>

<!-- Physical, Blogs-->
<div class="row">
    <div class="col-sm-12 text-left mainPageBlurb">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Blogs</caption>     
            <tr>
<!--Dave: Just testing the format below, gonna delete it later.-->
                <th>Format</th> 
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result4)):;?>
            <tr>
                <td><?php echo $row1["Format"];?></td>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>    
<br><br>

<!-- Physical, Fact Sheets-->
<div class="row">
    <div class="col-sm-12 text-left mainPageBlurb">
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
        <caption>Fact Sheets</caption>         
            <tr>
<!--Dave: Just testing the format below, gonna delete it later.-->
                <th>Format</th> 
                <th>Link</th>
            </tr>
            <?php while($row1 = mysqli_fetch_array($result5)):;?>
            <tr>
                <td><?php echo $row1["Format"];?></td>
                <td><?php echo $row1["ClickLink"];?></td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
    </div>
</div>    
<br><br>






        
<!--
"<table class=\"table table-responsive table-hover\" id=\"myTable\">
            <caption>Forms of Abuse: What?</caption>-->
