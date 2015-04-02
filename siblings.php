<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
  
$con = mysql_connect("localhost","pics","password");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("Statistics", $con);

$sql = "SELECT * FROM Data";
$result = mysql_query( $sql );

while($row = mysql_fetch_array($result))
{
  if ( $row['gender'] == 'male' )
    $male++;
  else
    $female++;
  $gender .= "'" . $row['gender'] . "',";
  $age .= "'" . $row['age'] . "',";
  $siblings .= "'" . $row['siblings'] . "',";
}
echo 'male: ' . $male . ', female: ' . $female;
$genPie = "[['Male',$male],['Female',$female]];";
$gender .= "'DEL'";
$age .= "'DEL'";
$siblings .= "'DEL'";
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>tree_tops template</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />




<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.jqplot.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.donutRenderer.min.js"></script>
<link rel="stylesheet" type="text/css" hrf="jquery.jqplot.min.css" />

<script type="text/javascript" src="plugins/jqplot.barRenderer.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script type="text/javascript" src="plugins/jqplot.pointLabels.min.js"></script>


<script type="text/javascript">
<?php echo "genPie = $genPie
      gender = [$gender];
      age = [$age];
      siblings = [$siblings];
      gender.pop();
      age.pop();
      siblings.pop();" ?>
</script>

    <script language="JavaScript" type="text/javascript" src="/APIs/HSVtoRGB.js"></script>
    <script language="JavaScript" type="text/javascript" src="statUtils.js"></script>
    <script language="JavaScript" type="text/javascript" src="graphs.js"></script>

</head>

<body>
  <div id="main">
  <div id="links"></div>
  <div id="header">
    <div id="logo">
    <div id="logo_text">
      <h1>FST<span class="alternate_colour">project</span></h1>
    </div>
    </div>
    <div id="menubar">
    <ul id="menu">
      <!-- put class="tab_selected" in the li tag for the selected page - to highlight which page you're on -->
      <li><a href="/FSTstat">Home</a></li>
      <li><a href="age">Age Statistics</a></li>
      <li class="tab_selected"><a href="siblings">Siblings Statistics</a></li>
      <li><a href="/">Main Website</a></li>
    </ul>
    </div>
  </div>
  <div id="site_content">
    <div id="panel"><img src="style/panel.jpg" alt="tree tops" /></div>
    <div class="sidebar">



    <!-- insert your sidebar items here -->
    <h1>Siblings Statistics</h1>

    <h6>Mean: </h6>
    <span id="Mean"></span>
    <br/><br/>

    <h6>Median: </h6>
    <span id="Median"></span>
    <br/><br/>

    <h6>Mode: </h6>
    <span id="Mode"></span>
    <br/><br/>

    <h6>Standard Deviation: </h6>
    <span id="Sx"></span>
    <br/><br/>

    <h6>Q1: </h6>
    <span id="Q1"></span>
    <br/><br/>

    <h6>Q3: </h6>
    <span id="Q3"></span>
    <br/><br/>

    <h6>Min: </h6>
    <span id="Min"></span>
    <br/><br/>

    <h6>Max: </h6>
    <span id="Max"></span>
    <br/><br/>

    <h6>IQR: </h6>
    <span id="IQR"></span>
    <br/><br/>

    <h6>Range: </h6>
    <span id="Range"></span>
    <br/><br/>

    <h6>Outliers: </h6>
    <span id="Outliers"></span>
    <br/><br/>



    </div>
    <div id="content">
    <!-- insert the page content here -->



    <form action="update.php" method="post">
      <h1>Submit your data</h1>
      <h3>Gender</h3>
      <ul>
        <li><input type="radio" name="gender" value="female"> &nbsp Female</li>
        <li><input type="radio" name="gender" value="male"> &nbsp Male</li>
      </ul>
      <h3>Age</h3>
      <input type="number" name="age"><br/><br/>
      <h3>Siblings</h3>
      <input type="number" name="siblings"><br/><br/>
      <input type="submit" value="submit"><br/>
    </form>

    <div id="chart1" style="height:300px;width:400px;position:relative;top:-270px;left:200px; "></div>

    <h1 style="position:relative;top:-270px;left:0px;">Siblings Box Plot</h1>
    <div id="chart2" style="height:200px;width:600px;position:relative;top:-270px;left:0px; "></div>

    <h1 style="position:relative;top:-270px;left:0px;">Siblings Bar Graph</h1>
    <div id="chart3" style="height:200px;width:600px;position:relative;top:-270px;left:0px;"></div>




    <script type="text/javascript">
// GRAPHS

for ( var i in siblings )
  siblings[i] = parseInt(siblings[i]);

$(document).ready(function(){

  var data = [
    ['Female', 12],['Male', 9],
  ];
  var plot1 = jQuery.jqplot ('chart1', [genPie], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true }
    }
  );

  // Blank chart
  var plot2 = jQuery.jqplot ('chart2', [["test",null]], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: false
        }
      }, 
      legend: { show:false }
    }
  );

    var ctx = $("#chart2 .jqplot-event-canvas")[0].getContext("2d");
  ctx.graphBoxPlot( siblings, 40, 20, 500, 120 );

  // Shadow
  ctx = $("#chart2 .jqplot-series-shadowCanvas")[0].getContext("2d");

  ctx.shadowBlur = 10;
  ctx.shadowOffsetX = 5;
  ctx.shadowOffsetY = 5;
  ctx.shadowColor = "bbb";

  ctx.graphBoxPlot( siblings, 40, 20, 500, 120 );

//});


var f = stats.frequency(siblings),
    s1 = [],
    ticks = [];
for ( var i in f )
{
  ticks.push(i);
  s1.push(f[i]);
}

//$(document).ready(function(){
      $.jqplot.config.enablePlugins = true;
        //var s1 = [2, 6, 7, 10];
        //var ticks = ['a', 'b', 'c', 'd', 'a', 'b', 'c', 'd'];
         
        plot1 = $.jqplot('chart3', [s1], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: ticks
                }
            },
            highlighter: { show: false }
        });
    //});



    });


// GRAPHS


$("#Mean")[0].innerText = Math.round(stats.mean(siblings));
$("#Median")[0].innerText = Math.round(stats.median(siblings));
$("#Mode")[0].innerText = stats.mode(siblings);
$("#Sx")[0].innerText = Math.round(stats.Sx(siblings));
$("#Q1")[0].innerText = Math.round(stats.Q1(siblings));
$("#Q3")[0].innerText = Math.round(stats.Q3(siblings));
$("#Min")[0].innerText = Math.round(stats.min(siblings));
$("#Max")[0].innerText = Math.round(stats.max(siblings));
$("#IQR")[0].innerText = Math.round(stats.IQR(siblings));
$("#Range")[0].innerText = Math.round(stats.range(siblings));
$("#Outliers")[0].innerText = stats.outliers(siblings);



    </script>

<<style type="text/css">
  .jqplot-table-legend-swatch-outline .jqplot-table-legend-swatch {
    width: 10px;
    height: 20px;
  }
</style>
    
    </div>
  <div id="site_content_bottom"></div>
  </div>
  <div id="footer">Copyright &copy; uPaymeiFixit. All Rights Reserved. | <a href="http://www.squidfingers.com">pattern from squidfingers</a> | <a href="http://www.dcarter.co.uk">design by dcarter</a></div>
  </div>
</body>
</html>
