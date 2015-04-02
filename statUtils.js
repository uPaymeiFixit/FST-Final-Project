/**
* Statistic Utilities r0609121146
* @author Josh Gibbs - uPaymeiFixit@gmail.com
*
*	The full website can be located at
*	http://upaymeifixit.dlinkddns.com/FSTstat/
*
* Description:
*	Extra statistic utilities
*
* Usage:
*	The default input is an array of real numbers unless stated otherwise above the function.
*	The default output is a floating point number unless stated otherwise above the function.
*
*	var mean = stats.mean( [1,2,3,4,5] )
*/
stats=
{

	// Mean (average)
	mean: function( data )
	{
		var mean = 0, i;
		for ( i in data )
			mean += data[i];
		return mean / i;
	},

	// Median (Q2)
	median: function( data )
	{
		data.sort( function( a, b ) { return a - b; } );
		return data[ Math.round( 0.5 * ( data.length + 1 ) ) ];
	},

	// Mode
	// Input: array of data type
	// Output: array of strings
	mode: function( data )
	{
		data = this.frequency( data );
		var max = 0, mode, i;
		for ( i in data )
		{
			if( data[i] > max )
				max = data[i],
				mode = [];
			if ( data[i] === max )
				mode.push(i);
		}
		return mode;
	},

	// Converts array to object with frequency
	// Input: array of any data type
	// Output: object with frequency
	frequency: function( data )
	{
		var count = {}, i;
		for ( i in data )
			count[ data[i] ] = count[ data[i] ] ? ++count[ data[i] ] : 1;
		// count.__defineGetter__( "length", function()
		// {
		// 	var c = 0, i;
		// 	for ( i in this )
		// 		if ( this.hasOwnProperty(i) )
		// 			c++;
		// 	return c;
		// });
		return count;
	},

	// Standard deviation
	Sx: function( data )
	{
		var variance = 0, mean = this.mean( data ), i;
		for ( i in data )
			variance += Math.pow( ( data[i] - mean ), 2 );
		return Math.sqrt( variance /= i - 1 );
	},

	// First Quartile
	Q1: function( data )
	{
		data.sort( function( a, b ) { return a - b; } );
		return data[ Math.round( 0.25 * ( data.length + 1 ) ) ];
	},

	// Third Quartile
	Q3: function( data )
	{
		data.sort( function( a, b ) { return a - b; } );
		return data[ Math.round( 0.75 * ( data.length + 1 ) ) ];
	},

	// Minimum
	min: function( data )
	{
		return data.sort( function( a, b ) { return a - b; } )[0];
	},

	// Maximum
	max: function( data )
	{
		return data.sort( function( a, b ) { return b - a; } )[0];
	},

	// Inner Quartile Range
	IQR: function( data )
	{
		return this.Q3( data ) - this.Q1( data );
	},

	// Range
	range: function( data )
	{
		return this.max( data ) - this.min( data );
	},

	// Outliers (low and high)
	// Output: 2D array of floats, first index (0) is low outliers
	outliers: function( data )
	{
		data.sort( function( a, b ) { return a - b; } );
		var iqr = this.IQR( data ) * 1.5,
			min = this.Q1( data ) - iqr,
			max = this.Q3( data ) + iqr,
			low = [], high = [], i;
		for ( i in data )
			if ( data[i] <= min )
				low.push( data[i] );
			else if ( data[i] >= max )
				high.push( data[i] );
		return [low,high];
	}

};