/** SETUP */

// Setup that needs to be done on resize
onresize = ctxSetup;
function ctxSetup() {
	_WIDTH = innerWidth;
	_HEIGHT = innerHeight;
	ctx.canvas.width = _WIDTH;
	ctx.canvas.height = _HEIGHT;
}

onload = function() {
	// Canvas setup
	ctx = document.createElement( "canvas" ).getContext( "2d" );
	ctx.canvas.innerHTML = "Your browser does not fully support HTML5";
	ctxSetup();
	document.body.appendChild( ctx.canvas );

	data = [];
	while( data.push( Math.floor(Math.random() * 10) ) < 100 );
	ctx.graphBoxPlot( data, 0, 0, innerWidth, 100 );
	ctx.graphPie( ["Josh","Josh","Josh","Bryan","Bryan","Louis","Vik","Vik","Yash","Yash","Yash"], 200, 200, 100 );
};


// window.onload = function() {
// 	addItem(16, 'm', 5, 8, 'blue', 4, 'red', 'drpepper', 'vw', 'lit', 3.5);
// 	addItem(17, 'm', 6, 0, 'blue', 3, 'blue', 'coke', 'nissan', 'CS', 3.8);
// 	addItem(15, 'm', 5, 6, 'brown', 4, 'red', 'coke', 'bmw', 'math', 3.8);


// };

// var age = [],
// 	gender = [],
// 	height = [],
// 	//inches
// 	eye = [],
// 	siblings = [],
// 	color = [],
// 	soda = [],
// 	carbrand = [],
// 	favoriteclass = [],
// 	gpa = [],
// 	race = [];

// function addItem(ag, ge, heF, heI, ey, si, co, so, ca, fa, gp) {
// 	ag ? age.push(ag) : null;
// 	ge ? gender.push(ge) : null;
// 	heF ? height.push({feet: heF, inch: heI}) : null;
// 	ey ? eye.push(ey) : null;
// 	si ? siblings.push(si) : null;
// 	co ? color.push(co) : null;
// 	so ? soda.push(so) : null;
// 	ca ? carbrand.push(ca) : null;
// 	fa ? favoriteclass.push(fa) : null;
// 	gp ? gpa.push(gp) : null;
// };

// function fiveNumberSummary( data )
// {
// 	data = data || [ 13, 32, 42, 45, 18, 5, 16, 16, 17, 18, 14, 18, 19 ];
// 	console.log( "Mean: " + stats.mean( data ) );
// 	console.log( "Sx: " + stats.Sx( data ) );
// 	console.log( "Q1: " + stats.Q1( data ) );
// 	console.log( "Median: " + stats.median( data ) );
// 	console.log( "Q3: " + stats.Q3( data ) );
// 	console.log( "Mode: " + stats.mode( data ) );
// 	console.log( "Min: " + stats.min( data ) );
// 	console.log( "Max: " + stats.max( data ) );
// 	console.log( "IQR: " + stats.IQR( data ) );
// 	console.log( "Median: " + stats.median( data ) );
// 	console.log( "Outliers: " + stats.outliers( data ) );
// }