<?php 

class WC_Tarlan_Payments_Gateway extends WC_Payment_Gateway{

    private $order_status;

	public function __construct(){
		$this->id = 'tarlan_payments';
		$this->method_title = __('Tarlan Payments','tarlan-payments-gateway');
		$this->title = __('Tarlan Payments','tarlan-payments-gateway');
		$this->has_fields = true;
		$this->init_form_fields();
		$this->init_settings();
		$this->enabled = $this->get_option('enabled');
		$this->title = $this->get_option('title');
		$this->merchant_id = $this->get_option('merchant_id');
		$this->secret_key = $this->get_option('secret_key');
		$this->description = $this->get_option('description');
		$this->hide_text_box = $this->get_option('hide_text_box');
		$this->order_status = $this->get_option('order_status');
		
		
		add_action('woocommerce_update_options_payment_gateways_'.$this->id, array($this, 'process_admin_options'));
	}

	public function init_form_fields(){
				$this->form_fields = array(
					'enabled' => array(
					'title' 		=> __( 'Разрешить/Запретить', 'tarlan-payments-gateway' ),
					'type' 			=> 'checkbox',
					'label' 		=> __( 'Пользовательский платеж', 'tarlan-payments-gateway' ),
					'default' 		=> 'yes'
					),

		            'title' => array(
						'title' 		=> __( 'Заголовок', 'tarlan-payments-gateway' ),
						'type' 			=> 'text',
						'description' 	=> __( 'Контроль заголовка', 'tarlan-payments-gateway' ),
						'default'		=> __( 'Tarlan Payments', 'tarlan-payments-gateway' ),
						'desc_tip'		=> true,
					),
					'merchant_id' => array(
						'title'       => __( 'Merchant ID', 'tarlan-payments-gateway' ),
						'type'        => 'text',
						'description' => __( 'Идентификатор мерчанта.', 'tarlan-payments-gateway' ),
						'default'     => '',
					),
					'secret_key' => array(
						'title'       => __( 'Secret Key', 'tarlan-payments-gateway' ),
						'type'        => 'text',
						'description' => __( 'Секретный ключ.', 'tarlan-payments-gateway' ),
						'default'     => '',
					),
					'description' => array(
						'title' => __( 'Сообщение пользователю', 'tarlan-payments-gateway' ),
						'type' => 'textarea',
						'css' => 'width:500px;',
						'default' => 'Сообщение.',
						'description' 	=> __( 'Сообщение выводится на странице оформления заказа.', 'tarlan-payments-gateway' ),
					),
					'hide_text_box' => array(
						'title' 		=> __( 'Поле сообщения', 'tarlan-payments-gateway' ),
						'type' 			=> 'checkbox',
						'label' 		=> __( 'Спрятать', 'tarlan-payments-gateway' ),
						'default' 		=> 'no',
						'description' 	=> __( 'Спрятать поле сообщения.', 'tarlan-payments-gateway' ),
					),
					'order_status' => array(
						'title' => __( 'Статус заказа', 'tarlan-payments-gateway' ),
						'type' => 'select',
						'options' => wc_get_order_statuses(),
						'default' => 'wc-on-hold',
						'description' 	=> __( 'Статус заказа по умолчанию.', 'tarlan-payments-gateway' ),
					),
			 );
	}


	public function admin_options() {
		?>
		<h3><?php _e( 'Настройки платежной системы Tarlan Payments', 'tarlan-payments-gateway' ); ?></h3>
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<table class="form-table">
							<?php $this->generate_settings_html();?>
						</table><!--/.form-table-->
					</div>
					<div id="postbox-container-1" class="postbox-container">
	                        <div id="side-sortables" class="meta-box-sortables ui-sortable"> 
	                           
     							<div class="postbox ">
	                                <div class="handlediv" title="Click to toggle"><br></div>
	                                <h3 class="hndle"><span><i class="dashicons dashicons-update"></i>&nbsp;&nbsp;:)</span></h3>
	                                <div class="inside">
	                                    <div class="support-widget">
	                                        <ul>
																
	                                           <img style="width: 70%;margin: 0 auto;position: relative;display: inherit;" src="https://tarlanpayments.kz/dist/images/logo.svg"> 

	                                        </ul>
											<a href="https://tarlanpayments.kz" class="button tarlan_button" target="_blank"><span class="dashicons dashicons-star-filled"></span> Go Ahead</a> 
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
				</div>
				<div class="clear"></div>
				<style type="text/css">
				.tarlan_button{
					background-color:#4CAF50 !important;
					border-color:#4CAF50 !important;
					color:#ffffff !important;
					width:100%;
					padding:5px !important;
					text-align:center;
					height:35px !important;
					font-size:12pt !important;
				}
				</style>
				<?php
	}
	
	public function process_payment( $order_id) {
		global $woocommerce;
		
		$order = new WC_Order($order_id);
		
		$array_data = [
		'merchant_id' => $this->merchant_id,
		'secret_key' => $this->secret_key,
		'request_url' => $_SERVER['HTTP_HOST'],
		'back_url' => $_SERVER['HTTP_HOST'] . '/recieve-response',
		'reference_id' => $order->id,
		'description' => $this->description,
		'amount' => $order->get_total(),
		'user_id' => $order->user_id
		];

		
		
		$order_status = $order->update_status($this->order_status, __( 'Awaiting payment', 'tarlan-payments-gateways' ));
		$woocommerce->cart->empty_cart();
		
		$hash = password_hash($order->id.$this->secret_key, PASSWORD_DEFAULT, ['cost' => 10]);
		$array_data['secret_key'] = $hash; 
		
		$ctp_url = 'https://api.tarlanpayments.kz/invoice/create';
		
		$curl = curl_init($ctp_url);

		curl_setopt($curl, CURLOPT_HTTPHEADER, array (
		 'Accept: application/json'
		));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $array_data);
		
		$response = curl_exec($curl);
	
		$redirect_url = json_decode($response, true);
	
		return  array(
		'result' => 'success',
		'redirect'	 => $redirect_url['data']['redirect_url']
		);
	}
	
	public function payment_fields(){
		if($this->hide_text_box !== 'yes'){
	    ?>

		<fieldset>
			<p class="form-row form-row-wide">
				<label for="<?php echo $this->id; ?>-admin-note"><?php echo ($this->description); ?> <span class="required">*</span></label>
				<textarea id="<?php echo $this->id; ?>-admin-note" class="input-text" type="text" name="<?php echo $this->id; ?>-admin-note"></textarea>
			</p>						
			<div class="clear"></div>
		</fieldset>
		<?php
		}
	}
}
	

	
?>