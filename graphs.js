CanvasRenderingContext2D.prototype.graphBoxPlot = function( data, x, y, width, height )
{
	function map( i )
	{
		return (i - r_min) * width / ( r_max - r_min ) + x;
	}
	var r_min = stats.min( data ),
		r_max = stats.max( data );




	var Q1 = map( stats.Q1( data ) ),
		Q3 = map( stats.Q3( data ) ),
		min = map( r_min ),
		max = map( r_max ),
		median = map( stats.median( data ) );

	// Min and max line
	this.strokeStyle = "000";
	this.beginPath();
	this.moveTo( min, y + height/2 );
	this.lineTo( max, y + height/2 );
	this.closePath();
	this.stroke();

	// Max and min end ball
	this.fillStyle = "#EAA228";
	this.arc( min, y + height/2, 5, 0, Math.PI * 2);
	this.arc( max, y + height/2, 5, 0, Math.PI * 2);
	this.fill();

	// Q1
	this.fillStyle = "#EAA228";
	this.fillRect( Q1, y, median - Q1, height );

	// Q3
	this.fillStyle = "#4BB2C5";
	this.fillRect( median, y, Q3 - median, height );

	// IQR box
	this.strokeRect( Q1, y, Q3 - Q1, height );

	// Median line
	this.beginPath();
	this.moveTo( median, y );
	this.lineTo( median, y + height );
	this.closePath();
	this.stroke();
};

 

CanvasRenderingContext2D.prototype.graphPie = function( data, x, y, radius )
{
	data = stats.frequency( data );
	console.log( data );
	var prev = 0, i, length = data.length;
	console.log(data.length);
	for ( i in data )
		this.beginPath(),
		this.moveTo(x,y),
		this.fillStyle = hsva(Math.random(),1,1,1),
		this.arc( x, y, radius, prev, ( prev += data[i] / length / Math.PI*2 ) ),
		this.fill(),
		this.closePath();
};