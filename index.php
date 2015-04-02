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
		  <li class="tab_selected"><a href="/FSTstat">Home</a></li>
		  <li><a href="age">Age Statistics</a></li>
		  <li><a href="siblings">Siblings Statistics</a></li>
		  <li><a href="/">Main Website</a></li>
		</ul>
	  </div>
	</div>
	<div id="site_content">
	  <div id="panel"><img src="style/panel.jpg" alt="tree tops" /></div>
	  <div class="sidebar">



		<!-- insert your sidebar items here -->
		<h1>FST Stat Project</h1>
		<h2>PROJECT #6</h2>
		<h3>June 10th, 2012</h3>
		<p>We constructed a database of people's information and showed the data. Below we have documented a summary of the data and selected two variables that seemed to differ the most by age.</p>
		<h1>Graphs and Formulas</h1>
		<p>We developed the site, graphs, and algorithms to find the summary data.</p>
		<h3>By Callum Raine and Josh Gibbs</h3>
		<h3>Period 5</h3>


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

		<h1 style="position:relative;top:-270px;left:0px;">Data Summary</h1>
		<div style="position:relative;top:-270px;left:0px;">
			The typical student attending Brea Olinda Hight School has the following characteristics and preferences: has an age of 16 years old, a heigh of 55 in., has 3 siblings, has a favorite color of Green, favorite car is a Toyota, favorite food is pizza, has brown colored eyes, favorite kind of music is electronic, and whose favorite hobby is playing video games on their free time. 
		</div>
		<h1 style="position:relative;top:-270px;left:0px;">Differing Variables</h1>
		<div style="position:relative;top:-270px;left:0px;">
			A variable whose value differs a bit by gender is favorite food. Male: [ pizza, pizza, pizza, cheeseburger, cheeseburger, cheeseburger, steak, steak, fried chicken, funnel cake ]. This shown that men will usually eat more fatty and greasy food compared to women. Female: [ salad, salad, salad, fruit, salad, grilled chicken, veggie dip, fish, pasta, oat male, fruit smoothies] This shows that women will eat more healthy foods compared to men. A variable that does not differ by gender is age, since age is by time one not by choice. The average age for males was 18 and the average age for females was 18.
		</div>



		<script type="text/javascript">
// GRAPHS


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



});
// GRAPHS



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
