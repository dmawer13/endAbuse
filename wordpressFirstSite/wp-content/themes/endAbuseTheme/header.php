<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        <?php echo get_bloginfo( 'name'); ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--font awesome source-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--bootstrap source-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--delete in the future, local bootstrap css.-->
    <!--    <link rel="stylesheet" href="bootstrap.min.css">-->

    <!--Google Charts source    -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--my css source-->
    <link href="<?php echo get_bloginfo('template_directory');?>/mystyle.css" rel="stylesheet">

    <!--    <link rel="stylesheet" type="text/css" href="myStyle.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--    Google Fonts source-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600" rel="stylesheet">
    
    
<!--    DataTables Plugin, not sure if using yet...-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

    
    
    <script type="text/javascript">
<!--// Load the Visualization API and the piechart package.-->
    google.charts.load('current', {'packages':['corechart']});
      
<!--// Set a callback to run when the Google Visualization API is loaded.-->
    google.charts.setOnLoadCallback(drawChart);
         
        
    function drawChart() {
      var jsonData = $.ajax({
          url: "<?php echo get_bloginfo('template_directory');?>/getData.php",
          dataType: "sql",
          async: false
          }).responseText;
          
<!--// Create our data table out of JSON data loaded from server.-->
      var data = new google.visualization.DataTable(jsonData);

<!--// Instantiate and draw our chart, passing in some options.-->
      var chart = new google.visualization.Table(document.getElementById('chart_div'));
      chart.draw(data, {width: 400, height: 240});
    }
    </script>
    
<!--
    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('number', 'Salary');
        data.addColumn('boolean', 'Full Time Employee');
        data.addRows([
          ['Mike',  {v: 10000, f: '$10,000'}, true],
          ['Jim',   {v:8000,   f: '$8,000'},  false],
          ['Alice', {v: 12500, f: '$12,500'}, true],
          ['Bob',   {v: 7000,  f: '$7,000'},  true]
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>
-->

    <?php wp_head();?>

</head>

<body>

    <!--    panic button-->
<!--
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-sm-12" style="background-color:lightgrey;">
                <a href="https://weather.com/">
                    <p style="padding-top: 5px; font-size:12px;">panic mode: click here to quickly exit this webpage.</p>
                </a>
            </div>
        </div>
    </div>
-->
<!--<div class="sr-only"><a href="#content">Skip to main content</a></div>-->

    <nav class="navbar navbar-inverse navPadding">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo get_bloginfo( 'wpurl' );?>"><span style="color:white; font-weight: 300;">end</span><span style="color: #2699FB; font-weight:600;">abuse</span></a>
            </div>

            <!--             <div class="col-sm-6 text-left"><a href="#"><h1><span style="color: black; font-weight:300;">end</span><span style="color: #2699FB; font-weight: 600;">abuse</span></h1></a></div>-->

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="http://localhost:8888/wordpressFirstSite/forms-of-abuse/">resources
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="http://localhost:8888/wordpressFirstSite/forms-of-abuse/">Forms of Abuse: What?</a></li>
                            <li><a href="http://localhost:8888/wordpressFirstSite/targets-of-abuse/">Targets of Abuse: Who?</a></li>
                            <li><a href="http://localhost:8888/wordpressFirstSite/support-and-advocacy/">Support and Advocacy</a></li>
                            <li><a 
                            href="http://localhost:8888/wordpressFirstSite/get-help-now/">Get Help Now</a></li>
                        </ul>
                    </li>
                    <li><a href="#">about</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">search</a></li>
                    <li><a href="#">translate</a></li>
                    <!--                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
                </ul>
            </div>
        </div>
    </nav>
    
