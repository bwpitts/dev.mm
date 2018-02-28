<?php
/**
 * Adds Stock Widget.
 */
class Stock_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'my_stock_widget', // Base ID
			esc_html__( 'Stock Widget', 'sw_domain' ), // Name
			array( 'description' => esc_html__( 'Widget to get up to date stock prices', 'sw_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		//content output
		echo '<form name="stockForm" action="#" method="get"><input type="text" id="Ticker" name="Ticker"/><input type="submit" value="Get Price"/></form>';
		
		//get the ticker from the input
		if($_GET['Ticker'] != ''){
			
			$barchart = 'https://marketdata.websol.barchart.com/getQuote.json?apikey=03f07b5f8e633db016d168e781ad2a44&symbols=' . urlencode($_GET['Ticker']).'&fields=lastprice&mode=R';
			//use the input ticker and call the api
			
			$ticker_json = file_get_contents($barchart);
			$ticker_array = json_decode($ticker_json, TRUE);
			
			//$lastprice = $ticker_array['lastprice'];
			$lastprice = $ticker_array['results'][0]['lastPrice'];
			$name = $ticker_array['results'][0]['name'];
			$symbol = $ticker_array['results'][0]['symbol'];

			//return the api call
			echo 'The last price for '. $name . '(' . $symbol . ') is $' . $lastprice;

		}
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Stock Widget', 'sw_domain' );
		?>
		
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_attr_e( 'Title:', 'sw_domain' ); ?>
		</label> 
		<input 
		class="widefat" 
		id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
		name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
		type="text" 
		value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	
}