<?php 
	function stock_shortcode( $atts, $content = null){
		
		$atts = shortcode_atts(
			array(
			'ticker' => 'amzn',
			), $atts
		);
		
		$barchart = 'https://marketdata.websol.barchart.com/getQuote.json?apikey=03f07b5f8e633db016d168e781ad2a44&symbols=' . urlencode($atts['ticker']).'&mode=R';
		//use the input ticker and call the api
			
		$ticker_json = file_get_contents($barchart);
		$ticker_array = json_decode($ticker_json, TRUE);
			
		//$lastprice = $ticker_array['lastprice'];
		$lastprice = $ticker_array['results'][0]['lastPrice'];
		$name = $ticker_array['results'][0]['name'];
		$symbol = $ticker_array['results'][0]['symbol'];
		
		return 'The price of '. $name . '(' . $symbol . ') is $' . $lastprice;
	}
add_shortcode('stockprice', 'stock_shortcode');