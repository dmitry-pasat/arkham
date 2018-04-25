<?php
class HoshiMikadoFieldOnOff extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">

							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "on") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('On', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "off") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Off', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_onoff" value="on"<?php if(hoshi_mikado_option_get_value($name) == "on") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldPortfolioFollow extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "portfolio_single_follow") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "portfolio_single_no_follow") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if(hoshi_mikado_option_get_value($name) == "portfolio_single_follow") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldZeroOne extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">

							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "1") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "0") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if(hoshi_mikado_option_get_value($name) == "1") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldImageVideo extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch switch-type">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "image") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Image', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "video") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Video', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if(hoshi_mikado_option_get_value($name) == "image") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldYesEmpty extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "yes") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if(hoshi_mikado_option_get_value($name) == "yes") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldFlagPage extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "page") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if(hoshi_mikado_option_get_value($name) == "page") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldFlagPost extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "post") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if(hoshi_mikado_option_get_value($name) == "post") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldFlagMedia extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "attachment") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if(hoshi_mikado_option_get_value($name) == "attachment") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldFlagPortfolio extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "portfolio_page") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if(hoshi_mikado_option_get_value($name) == "portfolio_page") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldFlagProduct extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		global $hoshi_options;
		$dependence = false;
		if(isset($args["dependence"])) {
			$dependence = true;
		}
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"])) {
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		}
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"])) {
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->


			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if(hoshi_mikado_option_get_value($name) == "product") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('Yes', 'hoshi') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if(hoshi_mikado_option_get_value($name) == "") {
										echo " selected";
									} ?><?php if($dependence) {
										echo " dependence";
									} ?>"><span><?php esc_html_e('No', 'hoshi') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if(hoshi_mikado_option_get_value($name) == "product") {
									echo " selected";
								} ?>/>
								<input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldRange extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		$range_min      = 0;
		$range_max      = 1;
		$range_step     = 0.01;
		$range_decimals = 2;
		if(isset($args["range_min"])) {
			$range_min = $args["range_min"];
		}
		if(isset($args["range_max"])) {
			$range_max = $args["range_max"];
		}
		if(isset($args["range_step"])) {
			$range_step = $args["range_step"];
		}
		if(isset($args["range_decimals"])) {
			$range_decimals = $args["range_decimals"];
		}
		?>

		<div class="mkd-page-form-section">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->

			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="mkd-slider-range-wrapper">
								<div class="form-inline">
									<input type="text"
										class="form-control mkd-form-element mkd-form-element-xsmall pull-left mkd-slider-range-value"
										name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>

									<div class="mkd-slider-range small"
										data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"></div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}

class HoshiMikadoFieldRangeSimple extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		?>

		<div class="col-lg-3" id="mkd_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>
			<div class="mkd-slider-range-wrapper">
				<div class="form-inline">
					<em class="mkd-field-description"><?php echo esc_html($label); ?></em>
					<input type="text"
						class="form-control mkd-form-element mkd-form-element-xxsmall pull-left mkd-slider-range-value"
						name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"/>

					<div class="mkd-slider-range xsmall"
						data-step="0.01" data-max="1" data-start="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"></div>
				</div>

			</div>
		</div>
		<?php

	}

}

class HoshiMikadoFieldRadio extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

		$checked = "";
		if($default_value == $value) {
			$checked = "checked";
		}
		$html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type'    => true,
				'name'    => true,
				'value'   => true,
				'checked' => true
			),
			'br'    => true
		));

	}

}

class HoshiMikadoFieldRadioGroup extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		$dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
		$show       = !empty($args["show"]) ? $args["show"] : array();
		$hide       = !empty($args["hide"]) ? $args["hide"] : array();

		$use_images    = isset($args["use_images"]) && $args["use_images"] ? true : false;
		$hide_labels   = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
		$hide_radios   = $use_images ? 'display: none' : '';
		$checked_value = hoshi_mikado_option_get_value($name);
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>" <?php if($hidden) { ?> style="display: none"<?php } ?>>

			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->

			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?php if(is_array($options) && count($options)) { ?>
								<div class="mkd-radio-group-holder <?php if($use_images) {
									echo "with-images";
								} ?>">
									<?php foreach($options as $key => $atts) {
										$selected = false;
										if($checked_value == $key) {
											$selected = true;
										}

										$show_val = "";
										$hide_val = "";
										if($dependence) {
											if(array_key_exists($key, $show)) {
												$show_val = $show[$key];
											}

											if(array_key_exists($key, $hide)) {
												$hide_val = $hide[$key];
											}
										}
										?>
										<label class="radio-inline">
											<input
												<?php echo hoshi_mikado_get_inline_attr($show_val, 'data-show'); ?>
												<?php echo hoshi_mikado_get_inline_attr($hide_val, 'data-hide'); ?>
												<?php if($selected) {
													echo "checked";
												} ?> <?php hoshi_mikado_inline_style($hide_radios); ?>
												type="radio"
												name="<?php echo esc_attr($name); ?>"
												value="<?php echo esc_attr($key); ?>"
												<?php if($dependence) {
													hoshi_mikado_class_attribute("dependence");
												} ?>> <?php if(!empty($atts["label"]) && !$hide_labels) {
												echo esc_attr($atts["label"]);
											} ?>

											<?php if($use_images) { ?>
												<img title="<?php if(!empty($atts["label"])) {
													echo esc_attr($atts["label"]);
												} ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
											<?php } ?>
										</label>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php
	}

}

class HoshiMikadoFieldCheckBox extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {

		$checked = "";
		if($default_value == $value) {
			$checked = "checked";
		}
		$html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type'    => true,
				'name'    => true,
				'value'   => true,
				'checked' => true
			),
			'br'    => true
		));

	}

}

class HoshiMikadoFieldDate extends HoshiMikadoFieldType {

	public function render($name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {
		$col_width = 2;
		if(isset($args["col_width"])) {
			$col_width = $args["col_width"];
		}
		?>

		<div class="mkd-page-form-section" id="mkd_<?php echo esc_attr($name); ?>"<?php if($hidden) { ?> style="display: none"<?php } ?>>


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->

			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
							<input type="text"
								id="portfolio_date"
								class="datepicker form-control mkd-input mkd-form-element"
								name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(hoshi_mikado_option_get_value($name)); ?>"
								/></div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}

}


class HoshiMikadoFieldFactory {

	public function render($field_type, $name, $label = "", $description = "", $options = array(), $args = array(), $hidden = false) {


		switch(strtolower($field_type)) {

			case 'text':
				$field = new HoshiMikadoFieldText();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'textsimple':
				$field = new HoshiMikadoFieldTextSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'textarea':
				$field = new HoshiMikadoFieldTextArea();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'textareasimple':
				$field = new HoshiMikadoFieldTextAreaSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'color':
				$field = new HoshiMikadoFieldColor();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'colorsimple':
				$field = new HoshiMikadoFieldColorSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'image':
				$field = new HoshiMikadoFieldImage();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'imagesimple':
				$field = new HoshiMikadoFieldImageSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'font':
				$field = new HoshiMikadoFieldFont();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'fontsimple':
				$field = new HoshiMikadoFieldFontSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'select':
				$field = new HoshiMikadoFieldSelect();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'selectblank':
				$field = new HoshiMikadoFieldSelectBlank();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'selectsimple':
				$field = new HoshiMikadoFieldSelectSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'selectblanksimple':
				$field = new HoshiMikadoFieldSelectBlankSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'yesno':
				$field = new HoshiMikadoFieldYesNo();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'yesnosimple':
				$field = new HoshiMikadoFieldYesNoSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'onoff':
				$field = new HoshiMikadoFieldOnOff();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'portfoliofollow':
				$field = new HoshiMikadoFieldPortfolioFollow();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'zeroone':
				$field = new HoshiMikadoFieldZeroOne();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'imagevideo':
				$field = new HoshiMikadoFieldImageVideo();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'yesempty':
				$field = new HoshiMikadoFieldYesEmpty();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'flagpost':
				$field = new HoshiMikadoFieldFlagPost();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'flagpage':
				$field = new HoshiMikadoFieldFlagPage();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'flagmedia':
				$field = new HoshiMikadoFieldFlagMedia();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'flagportfolio':
				$field = new HoshiMikadoFieldFlagPortfolio();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'flagproduct':
				$field = new HoshiMikadoFieldFlagProduct();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'range':
				$field = new HoshiMikadoFieldRange();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'rangesimple':
				$field = new HoshiMikadoFieldRangeSimple();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'radio':
				$field = new HoshiMikadoFieldRadio();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'checkbox':
				$field = new HoshiMikadoFieldCheckBox();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;

			case 'date':
				$field = new HoshiMikadoFieldDate();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;
			case 'radiogroup':
				$field = new HoshiMikadoFieldRadioGroup();
				$field->render($name, $label, $description, $options, $args, $hidden);
				break;
			default:
				break;

		}

	}

}

/*
   Class: HoshiMikadoMultipleImages
   A class that initializes Mikado Multiple Images
*/

class HoshiMikadoMultipleImages implements iHoshiMikadoRender {
	private $name;
	private $label;
	private $description;


	function __construct($name, $label = "", $description = "") {
		global $hoshi_Framework;
		$this->name        = $name;
		$this->label       = $label;
		$this->description = $description;
		$hoshi_Framework->mkdMetaBoxes->addOption($this->name, "");
	}

	public function render($factory) {
		global $post;
		?>

		<div class="mkd-page-form-section">


			<div class="mkd-field-desc">
				<h4><?php echo esc_html($this->label); ?></h4>

				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->

			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="mkd-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta($post->ID, $this->name, true);
								if($image_gallery_val != '') {
									$image_gallery_array = explode(',', $image_gallery_val);
								}

								if(isset($image_gallery_array) && count($image_gallery_array) != 0):

									foreach($image_gallery_array as $gimg_id):

										$gimage_wp = wp_get_attachment_image_src($gimg_id, 'thumbnail', true);
										echo '<li class="mkd-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';

									endforeach;

								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr($this->name) ?>" name="<?php echo esc_attr($this->name) ?>">

							<div class="mkd-gallery-uploader">
								<a class="mkd-gallery-upload-btn btn btn-sm btn-primary"
									href="javascript:void(0)"><?php esc_html_e('Upload', 'hoshi'); ?></a>
								<a class="mkd-gallery-clear-btn btn btn-sm btn-default pull-right"
									href="javascript:void(0)"><?php esc_html_e('Remove All', 'hoshi'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
		<?php

	}
}

/*
   Class: HoshiMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class HoshiMikadoImagesVideos implements iHoshiMikadoRender {
	private $label;
	private $description;


	function __construct($label = "", $description = "") {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>
		<div class="mkd_hidden_portfolio_images" style="display: none">
			<div class="mkd-page-form-section">


				<div class="mkd-field-desc">
					<h4><?php echo esc_html($this->label); ?></h4>

					<p><?php echo esc_html($this->description); ?></p>
				</div>
				<!-- close div.mkd-field-desc -->

				<div class="mkd-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="mkd-field-description">Order Number</em>
								<input type="text"
									class="form-control mkd-input mkd-form-element"
									id="portfolioimgordernumber_x"
									name="portfolioimgordernumber_x"
									placeholder=""/></div>
							<div class="col-lg-10">
								<em class="mkd-field-description">Image/Video title (only for gallery layout - Portfolio Style 6)</em>
								<input type="text"
									class="form-control mkd-input mkd-form-element"
									id="portfoliotitle_x"
									name="portfoliotitle_x"
									placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="mkd-field-description">Image</em>

								<div class="mkd-media-uploader">
									<div style="display: none"
										class="mkd-media-image-holder">
										<img src="" alt=""
											class="mkd-media-image img-thumbnail"/>
									</div>
									<div style="display: none"
										class="mkd-media-meta-fields">
										<input type="hidden" class="mkd-media-upload-url"
											name="portfolioimg_x"
											id="portfolioimg_x"/>
										<input type="hidden"
											class="mkd-media-upload-height"
											name="mkd_options_theme[media-upload][height]"
											value=""/>
										<input type="hidden"
											class="mkd-media-upload-width"
											name="mkd_options_theme[media-upload][width]"
											value=""/>
									</div>
									<a class="mkd-media-upload-btn btn btn-sm btn-primary"
										href="javascript:void(0)"
										data-frame-title="<?php esc_html_e('Select Image', 'hoshi'); ?>"
										data-frame-button-text="<?php esc_html_e('Select Image', 'hoshi'); ?>"><?php esc_html_e('Upload', 'hoshi'); ?></a>
									<a style="display: none;" href="javascript: void(0)"
										class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'hoshi'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="mkd-field-description">Video type</em>
								<select class="form-control mkd-form-element mkd-portfoliovideotype"
									name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube">Youtube</option>
									<option value="vimeo">Vimeo</option>
									<option value="self">Self hosted</option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="mkd-field-description">Video ID</em>
								<input type="text"
									class="form-control mkd-input mkd-form-element"
									id="portfoliovideoid_x"
									name="portfoliovideoid_x"
									placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="mkd-field-description">Video image</em>

								<div class="mkd-media-uploader">
									<div style="display: none"
										class="mkd-media-image-holder">
										<img src="" alt=""
											class="mkd-media-image img-thumbnail"/>
									</div>
									<div style="display: none"
										class="mkd-media-meta-fields">
										<input type="hidden" class="mkd-media-upload-url"
											name="portfoliovideoimage_x"
											id="portfoliovideoimage_x"/>
										<input type="hidden"
											class="mkd-media-upload-height"
											name="mkd_options_theme[media-upload][height]"
											value=""/>
										<input type="hidden"
											class="mkd-media-upload-width"
											name="mkd_options_theme[media-upload][width]"
											value=""/>
									</div>
									<a class="mkd-media-upload-btn btn btn-sm btn-primary"
										href="javascript:void(0)"
										data-frame-title="<?php esc_html_e('Select Image', 'hoshi'); ?>"
										data-frame-button-text="<?php esc_html_e('Select Image', 'hoshi'); ?>"><?php esc_html_e('Upload', 'hoshi'); ?></a>
									<a style="display: none;" href="javascript: void(0)"
										class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'hoshi'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="mkd-field-description">Video webm</em>
								<input type="text"
									class="form-control mkd-input mkd-form-element"
									id="portfoliovideowebm_x"
									name="portfoliovideowebm_x"
									placeholder=""/></div>
							<div class="col-lg-4">
								<em class="mkd-field-description">Video mp4</em>
								<input type="text"
									class="form-control mkd-input mkd-form-element"
									id="portfoliovideomp4_x"
									name="portfoliovideomp4_x"
									placeholder=""/></div>
							<div class="col-lg-4">
								<em class="mkd-field-description">Video ogv</em>
								<input type="text"
									class="form-control mkd-input mkd-form-element"
									id="portfoliovideoogv_x"
									name="portfoliovideoogv_x"
									placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="mkd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;">Remove portfolio image/video</a>
							</div>
						</div>


					</div>
				</div>
				<!-- close div.mkd-section-content -->

			</div>
		</div>

		<?php
		$no               = 1;
		$portfolio_images = get_post_meta($post->ID, 'mkd_portfolio_images', true);
		if(count($portfolio_images) > 1) {
			usort($portfolio_images, "hoshi_mikado_compare_portfolio_videos");
		}
		while(isset($portfolio_images[$no - 1])) {
			$portfolio_image = $portfolio_images[$no - 1];
			?>
			<div class="mkd_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">

				<div class="mkd-page-form-section">


					<div class="mkd-field-desc">
						<h4><?php echo esc_html($this->label); ?></h4>

						<p><?php echo esc_html($this->description); ?></p>
					</div>
					<!-- close div.mkd-field-desc -->

					<div class="mkd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="mkd-field-description">Order Number</em>
									<input type="text"
										class="form-control mkd-input mkd-form-element"
										id="portfolioimgordernumber_<?php echo esc_attr($no); ?>"
										name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>"
										placeholder=""/></div>
								<div class="col-lg-10">
									<em class="mkd-field-description">Image/Video title (only for gallery layout - Portfolio Style 6)</em>
									<input type="text"
										class="form-control mkd-input mkd-form-element"
										id="portfoliotitle_<?php echo esc_attr($no); ?>"
										name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>"
										placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="mkd-field-description">Image</em>

									<div class="mkd-media-uploader">
										<div<?php if(stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
											class="mkd-media-image-holder">
											<img src="<?php if(stripslashes($portfolio_image['portfolioimg']) == true) {
												echo esc_url(hoshi_mikado_generate_filename(stripslashes($portfolio_image['portfolioimg']), get_option('thumbnail'.'_size_w'), get_option('thumbnail'.'_size_h')));
											} ?>" alt=""
												class="mkd-media-image img-thumbnail"/>
										</div>
										<div style="display: none"
											class="mkd-media-meta-fields">
											<input type="hidden" class="mkd-media-upload-url"
												name="portfolioimg[]"
												id="portfolioimg_<?php echo esc_attr($no); ?>"
												value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
											<input type="hidden"
												class="mkd-media-upload-height"
												name="mkd_options_theme[media-upload][height]"
												value=""/>
											<input type="hidden"
												class="mkd-media-upload-width"
												name="mkd_options_theme[media-upload][width]"
												value=""/>
										</div>
										<a class="mkd-media-upload-btn btn btn-sm btn-primary"
											href="javascript:void(0)"
											data-frame-title="<?php esc_html_e('Select Image', 'hoshi'); ?>"
											data-frame-button-text="<?php esc_html_e('Select Image', 'hoshi'); ?>"><?php esc_html_e('Upload', 'hoshi'); ?></a>
										<a style="display: none;" href="javascript: void(0)"
											class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'hoshi'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="mkd-field-description">Video type</em>
									<select class="form-control mkd-form-element mkd-portfoliovideotype"
										name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
										<option value=""></option>
										<option <?php if($portfolio_image['portfoliovideotype'] == "youtube") {
											echo "selected='selected'";
										} ?> value="youtube">Youtube
										</option>
										<option <?php if($portfolio_image['portfoliovideotype'] == "vimeo") {
											echo "selected='selected'";
										} ?> value="vimeo">Vimeo
										</option>
										<option <?php if($portfolio_image['portfoliovideotype'] == "self") {
											echo "selected='selected'";
										} ?> value="self">Self hosted
										</option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="mkd-field-description">Video ID</em>
									<input type="text"
										class="form-control mkd-input mkd-form-element"
										id="portfoliovideoid_<?php echo esc_attr($no); ?>"
										name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
										placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="mkd-field-description">Video image</em>

									<div class="mkd-media-uploader">
										<div<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
											class="mkd-media-image-holder">
											<img src="<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == true) {
												echo esc_url(hoshi_mikado_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']), get_option('thumbnail'.'_size_w'), get_option('thumbnail'.'_size_h')));
											} ?>" alt=""
												class="mkd-media-image img-thumbnail"/>
										</div>
										<div style="display: none"
											class="mkd-media-meta-fields">
											<input type="hidden" class="mkd-media-upload-url"
												name="portfoliovideoimage[]"
												id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
												value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
											<input type="hidden"
												class="mkd-media-upload-height"
												name="mkd_options_theme[media-upload][height]"
												value=""/>
											<input type="hidden"
												class="mkd-media-upload-width"
												name="mkd_options_theme[media-upload][width]"
												value=""/>
										</div>
										<a class="mkd-media-upload-btn btn btn-sm btn-primary"
											href="javascript:void(0)"
											data-frame-title="<?php esc_html_e('Select Image', 'hoshi'); ?>"
											data-frame-button-text="<?php esc_html_e('Select Image', 'hoshi'); ?>"><?php esc_html_e('Upload', 'hoshi'); ?></a>
										<a style="display: none;" href="javascript: void(0)"
											class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'hoshi'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="mkd-field-description">Video webm</em>
									<input type="text"
										class="form-control mkd-input mkd-form-element"
										id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
										name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
										placeholder=""/></div>
								<div class="col-lg-4">
									<em class="mkd-field-description">Video mp4</em>
									<input type="text"
										class="form-control mkd-input mkd-form-element"
										id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
										name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
										placeholder=""/></div>
								<div class="col-lg-4">
									<em class="mkd-field-description">Video ogv</em>
									<input type="text"
										class="form-control mkd-input mkd-form-element"
										id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
										name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
										placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="mkd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;">Remove portfolio image/video</a>
								</div>
							</div>


						</div>
					</div>
					<!-- close div.mkd-section-content -->

				</div>
			</div>
			<?php
			$no++;
		}
		?>
		<br/>
		<a class="mkd_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/">Add portfolio image/video</a>
		<?php

	}
}


/*
   Class: HoshiMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class HoshiMikadoImagesVideosFramework implements iHoshiMikadoRender {
	private $label;
	private $description;


	function __construct($label = "", $description = "") {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<!--Image hidden start-->
		<div class="mkd-hidden-portfolio-images" style="display: none">
			<div class="mkd-portfolio-toggle-holder">
				<div class="mkd-portfolio-toggle mkd-toggle-desc">
					<span class="number">1</span><span class="mkd-toggle-inner">Image - <em>(Order Number, Image Title)</em></span>
				</div>
				<div class="mkd-portfolio-toggle mkd-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="mkd-portfolio-toggle-content">
				<div class="mkd-page-form-section">
					<div class="mkd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="mkd-media-uploader">
										<em class="mkd-field-description">Image </em>

										<div style="display: none" class="mkd-media-image-holder">
											<img src="" alt="" class="mkd-media-image img-thumbnail">
										</div>
										<div class="mkd-media-meta-fields">
											<input type="hidden" class="mkd-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="mkd-media-upload-height" name="mkd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="mkd-media-upload-width" name="mkd_options_theme[media-upload][width]" value="">
										</div>
										<a class="mkd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image">Upload</a>
										<a style="display: none;" href="javascript: void(0)" class="mkd-media-remove-btn btn btn-default btn-sm">Remove</a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="mkd-field-description">Order Number</em>
									<input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
								</div>
								<div class="col-lg-8">
									<em class="mkd-field-description">Image Title (works only for Gallery portfolio type selected) </em>
									<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

						</div>
						<!-- close div.container-fluid -->
					</div>
					<!-- close div.mkd-section-content -->
				</div>
			</div>
		</div>
		<!--Image hidden End-->

		<!--Video Hidden Start-->
		<div class="mkd-hidden-portfolio-videos" style="display: none">
			<div class="mkd-portfolio-toggle-holder">
				<div class="mkd-portfolio-toggle mkd-toggle-desc">
					<span class="number">2</span><span class="mkd-toggle-inner">Video - <em>(Order Number, Video Title)</em></span>
				</div>
				<div class="mkd-portfolio-toggle mkd-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="mkd-portfolio-toggle-content">
				<div class="mkd-page-form-section">
					<div class="mkd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="mkd-media-uploader">
										<em class="mkd-field-description">Cover Video Image </em>

										<div style="display: none" class="mkd-media-image-holder">
											<img src="" alt="" class="mkd-media-image img-thumbnail">
										</div>
										<div style="display: none" class="mkd-media-meta-fields">
											<input type="hidden" class="mkd-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="mkd-media-upload-height" name="mkd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="mkd-media-upload-width" name="mkd_options_theme[media-upload][width]" value="">
										</div>
										<a class="mkd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image">Upload</a>
										<a style="display: none;" href="javascript: void(0)" class="mkd-media-remove-btn btn btn-default btn-sm">Remove</a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="mkd-field-description">Order Number</em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
										</div>
										<div class="col-lg-10">
											<em class="mkd-field-description">Video Title (works only for Gallery portfolio type selected)</em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="mkd-field-description">Video type</em>
											<select class="form-control mkd-form-element mkd-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube">Youtube</option>
												<option value="vimeo">Vimeo</option>
												<option value="self">Self hosted</option>
											</select>
										</div>
										<div class="col-lg-2 mkd-video-id-holder">
											<em class="mkd-field-description" id="videoId">Video ID</em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" placeholder="">
										</div>
									</div>

									<div class="row next-row mkd-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="mkd-field-description">Video webm</em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" placeholder="">
										</div>
										<div class="col-lg-4">
											<em class="mkd-field-description">Video mp4</em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" placeholder="">
										</div>
										<div class="col-lg-4">
											<em class="mkd-field-description">Video ogv</em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" placeholder="">
										</div>
									</div>
								</div>

							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div>
						<!-- close div.container-fluid -->
					</div>
					<!-- close div.mkd-section-content -->
				</div>
			</div>
		</div>
		<!--Video Hidden End-->


		<?php
		$no               = 1;
		$portfolio_images = get_post_meta($post->ID, 'mkd_portfolio_images', true);
		if(count($portfolio_images) > 1) {
			usort($portfolio_images, "hoshi_mikado_compare_portfolio_videos");
		}
		while(isset($portfolio_images[$no - 1])) {
			$portfolio_image = $portfolio_images[$no - 1];
			if(isset($portfolio_image['portfolioimgtype'])) {
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			} else {
				if(stripslashes($portfolio_image['portfolioimg']) == true) {
					$portfolio_img_type = "image";
				} else {
					$portfolio_img_type = "video";
				}
			}
			if($portfolio_img_type == "image") {
				?>

				<div class="mkd-portfolio-images mkd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="mkd-portfolio-toggle-holder">
						<div class="mkd-portfolio-toggle mkd-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner">Image - <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
						</div>
						<div class="mkd-portfolio-toggle mkd-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="mkd-portfolio-toggle-content" style="display: none">
						<div class="mkd-page-form-section">
							<div class="mkd-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="mkd-media-uploader">
												<em class="mkd-field-description">Image </em>

												<div<?php if(stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
													class="mkd-media-image-holder">
													<img src="<?php if(stripslashes($portfolio_image['portfolioimg']) == true) {
														echo esc_url(hoshi_mikado_generate_filename(stripslashes($portfolio_image['portfolioimg']), get_option('thumbnail'.'_size_w'), get_option('thumbnail'.'_size_h')));
													} ?>" alt=""
														class="mkd-media-image img-thumbnail"/>
												</div>
												<div style="display: none"
													class="mkd-media-meta-fields">
													<input type="hidden" class="mkd-media-upload-url"
														name="portfolioimg[]"
														id="portfolioimg_<?php echo esc_attr($no); ?>"
														value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
													<input type="hidden"
														class="mkd-media-upload-height"
														name="mkd_options_theme[media-upload][height]"
														value=""/>
													<input type="hidden"
														class="mkd-media-upload-width"
														name="mkd_options_theme[media-upload][width]"
														value=""/>
												</div>
												<a class="mkd-media-upload-btn btn btn-sm btn-primary"
													href="javascript:void(0)"
													data-frame-title="<?php esc_html_e('Select Image', 'hoshi'); ?>"
													data-frame-button-text="<?php esc_html_e('Select Image', 'hoshi'); ?>"><?php esc_html_e('Upload', 'hoshi'); ?></a>
												<a style="display: none;" href="javascript: void(0)"
													class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'hoshi'); ?></a>
											</div>
										</div>
										<div class="col-lg-2">
											<em class="mkd-field-description">Order Number</em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" placeholder="">
										</div>
										<div class="col-lg-8">
											<em class="mkd-field-description">Image Title (works only for Gallery portfolio type selected) </em>
											<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" placeholder="">
										</div>
									</div>
									<input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
									<input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
									<input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
									<input type="hidden" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]">
									<input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
									<input type="hidden" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
								</div>
								<!-- close div.container-fluid -->
							</div>
							<!-- close div.mkd-section-content -->
						</div>
					</div>
				</div>

				<?php
			} else {
				?>
				<div class="mkd-portfolio-videos mkd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="mkd-portfolio-toggle-holder">
						<div class="mkd-portfolio-toggle mkd-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner">Video - <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
						</div>
						<div class="mkd-portfolio-toggle mkd-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="mkd-portfolio-toggle-content" style="display: none">
						<div class="mkd-page-form-section">
							<div class="mkd-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="mkd-media-uploader">
												<em class="mkd-field-description">Cover Video Image </em>

												<div<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
													class="mkd-media-image-holder">
													<img src="<?php if(stripslashes($portfolio_image['portfoliovideoimage']) == true) {
														echo esc_url(hoshi_mikado_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']), get_option('thumbnail'.'_size_w'), get_option('thumbnail'.'_size_h')));
													} ?>" alt=""
														class="mkd-media-image img-thumbnail"/>
												</div>
												<div style="display: none"
													class="mkd-media-meta-fields">
													<input type="hidden" class="mkd-media-upload-url"
														name="portfoliovideoimage[]"
														id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
														value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
													<input type="hidden"
														class="mkd-media-upload-height"
														name="mkd_options_theme[media-upload][height]"
														value=""/>
													<input type="hidden"
														class="mkd-media-upload-width"
														name="mkd_options_theme[media-upload][width]"
														value=""/>
												</div>
												<a class="mkd-media-upload-btn btn btn-sm btn-primary"
													href="javascript:void(0)"
													data-frame-title="<?php esc_html_e('Select Image', 'hoshi'); ?>"
													data-frame-button-text="<?php esc_html_e('Select Image', 'hoshi'); ?>"><?php esc_html_e('Upload', 'hoshi'); ?></a>
												<a style="display: none;" href="javascript: void(0)"
													class="mkd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'hoshi'); ?></a>
											</div>
										</div>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<em class="mkd-field-description">Order Number</em>
													<input type="text" class="form-control mkd-input mkd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" placeholder="">
												</div>
												<div class="col-lg-10">
													<em class="mkd-field-description">Video Title (works only for Gallery portfolio type selected) </em>
													<input type="text" class="form-control mkd-input mkd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" placeholder="">
												</div>
											</div>
											<div class="row next-row">
												<div class="col-lg-2">
													<em class="mkd-field-description">Video Type</em>
													<select class="form-control mkd-form-element mkd-portfoliovideotype"
														name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
														<option value=""></option>
														<option <?php if($portfolio_image['portfoliovideotype'] == "youtube") {
															echo "selected='selected'";
														} ?> value="youtube">Youtube
														</option>
														<option <?php if($portfolio_image['portfoliovideotype'] == "vimeo") {
															echo "selected='selected'";
														} ?> value="vimeo">Vimeo
														</option>
														<option <?php if($portfolio_image['portfoliovideotype'] == "self") {
															echo "selected='selected'";
														} ?> value="self">Self hosted
														</option>
													</select>
												</div>
												<div class="col-lg-2 mkd-video-id-holder">
													<em class="mkd-field-description">Video ID</em>
													<input type="text"
														class="form-control mkd-input mkd-form-element"
														id="portfoliovideoid_<?php echo esc_attr($no); ?>"
														name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
														placeholder=""/>
												</div>
											</div>

											<div class="row next-row mkd-video-self-hosted-path-holder">
												<div class="col-lg-4">
													<em class="mkd-field-description">Video webm</em>
													<input type="text"
														class="form-control mkd-input mkd-form-element"
														id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
														name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
														placeholder=""/></div>
												<div class="col-lg-4">
													<em class="mkd-field-description">Video mp4</em>
													<input type="text"
														class="form-control mkd-input mkd-form-element"
														id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
														name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
														placeholder=""/></div>
												<div class="col-lg-4">
													<em class="mkd-field-description">Video ogv</em>
													<input type="text"
														class="form-control mkd-input mkd-form-element"
														id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
														name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
														placeholder=""/></div>
											</div>
										</div>

									</div>
									<input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
								</div>
								<!-- close div.container-fluid -->
							</div>
							<!-- close div.mkd-section-content -->
						</div>
					</div>
				</div>
				<?php
			}
			$no++;
		}
		?>

		<div class="mkd-portfolio-add">
			<a class="mkd-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i> Add Image</a>
			<a class="mkd-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i> Add Video</a>

			<a class="mkd-toggle-all-media btn btn-sm btn-default pull-right" href="#"> Expand All</a>
		</div>
		<?php

	}
}

class HoshiMikadoTwitterFramework implements iHoshiMikadoRender {
	public function render($factory) {
		$twitterApi = MikadoTwitterApi::getInstance();
		$message    = '';

		if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
			if(!empty($_GET['oauth_token'])) {
				update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
			}

			if(!empty($_GET['oauth_verifier'])) {
				update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
			}

			$responseObj = $twitterApi->obtainAccessToken();
			if($responseObj->status) {
				$message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'hoshi');
			} else {
				$message = $responseObj->message;
			}
		}

		$buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'hoshi') : esc_html__('Connect with Twitter', 'hoshi');
		?>
		<?php if($message !== '') { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html($message); ?></span>
			</div>
		<?php } ?>
		<div class="mkd-page-form-section" id="mkd_enable_social_share">

			<div class="mkd-field-desc">
				<h4><?php esc_html_e('Connect with Twitter', 'hoshi'); ?></h4>

				<p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'hoshi'); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->

			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a id="mkd-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
							<input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
	<?php }
}

class HoshiMikadoInstagramFramework implements iHoshiMikadoRender {
	public function render($factory) {
		$instagram_api = MikadoInstagramApi::getInstance();
		$message       = '';

		//if code wasn't saved to database
		if(!get_option('mkd_instagram_code')) {
			//check if code parameter is set in URL. That means that user has connected with Instagram
			if(!empty($_GET['code'])) {
				//update code option so we can use it later
				$instagram_api->storeCode();
				$instagram_api->getAccessToken();
				$message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'hoshi');

			} else {
				$instagram_api->storeCodeRequestURI();
			}
		}

		$buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'hoshi') : esc_html__('Connect with Instagram', 'hoshi');

		?>
		<?php if($message !== '') { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html($message); ?></span>
			</div>
		<?php } ?>
		<div class="mkd-page-form-section" id="mkd_enable_social_share">

			<div class="mkd-field-desc">
				<h4><?php esc_html_e('Connect with Instagram', 'hoshi'); ?></h4>

				<p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'hoshi'); ?></p>
			</div>
			<!-- close div.mkd-field-desc -->

			<div class="mkd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.mkd-section-content -->

		</div>
	<?php }
}

/*
   Class: HoshiMikadoImagesVideos
   A class that initializes Mikado Images Videos
*/

class HoshiMikadoOptionsFramework implements iHoshiMikadoRender {
	private $label;
	private $description;


	function __construct($label = "", $description = "") {
		$this->label       = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="mkd-portfolio-additional-item-holder" style="display: none">
			<div class="mkd-portfolio-toggle-holder">
				<div class="mkd-portfolio-toggle mkd-toggle-desc">
					<span class="number">1</span><span class="mkd-toggle-inner">Additional Sidebar Item <em>(Order Number, Item Title)</em></span>
				</div>
				<div class="mkd-portfolio-toggle mkd-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="mkd-portfolio-toggle-content">
				<div class="mkd-page-form-section">
					<div class="mkd-section-content">
						<div class="container-fluid">
							<div class="row">

								<div class="col-lg-2">
									<em class="mkd-field-description">Order Number</em>
									<input type="text" class="form-control mkd-input mkd-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" placeholder="">
								</div>
								<div class="col-lg-10">
									<em class="mkd-field-description">Item Title </em>
									<input type="text" class="form-control mkd-input mkd-form-element" id="optionLabel_x" name="optionLabel_x" placeholder="">
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="mkd-field-description">Item Text</em>
									<textarea class="form-control mkd-input mkd-form-element" id="optionValue_x" name="optionValue_x" placeholder=""></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="mkd-field-description">Enter Full URL for Item Text Link</em>
									<input type="text" class="form-control mkd-input mkd-form-element" id="optionUrl_x" name="optionUrl_x" placeholder="">
								</div>
							</div>
						</div>
						<!-- close div.mkd-section-content -->
					</div>
					<!-- close div.container-fluid -->
				</div>
			</div>
		</div>
		<?php
		$no         = 1;
		$portfolios = get_post_meta($post->ID, 'mkd_portfolios', true);
		if(count($portfolios) > 1) {
			usort($portfolios, "hoshi_mikado_compare_portfolio_options");
		}
		while(isset($portfolios[$no - 1])) {
			$portfolio = $portfolios[$no - 1];
			?>
			<div class="mkd-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
				<div class="mkd-portfolio-toggle-holder">
					<div class="mkd-portfolio-toggle mkd-toggle-desc">
						<span class="number"><?php echo esc_html($no); ?></span><span class="mkd-toggle-inner">Additional Sidebar Item - <em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
					</div>
					<div class="mkd-portfolio-toggle mkd-portfolio-control">
						<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
						<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="mkd-portfolio-toggle-content" style="display: none">
					<div class="mkd-page-form-section">
						<div class="mkd-section-content">
							<div class="container-fluid">
								<div class="row">

									<div class="col-lg-2">
										<em class="mkd-field-description">Order Number</em>
										<input type="text" class="form-control mkd-input mkd-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>" placeholder="">
									</div>
									<div class="col-lg-10">
										<em class="mkd-field-description">Item Title </em>
										<input type="text" class="form-control mkd-input mkd-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>" placeholder="">
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="mkd-field-description">Item Text</em>
										<textarea class="form-control mkd-input mkd-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]" placeholder=""><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="mkd-field-description">Enter Full URL for Item Text Link</em>
										<input type="text" class="form-control mkd-input mkd-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" placeholder="">
									</div>
								</div>
							</div>
							<!-- close div.mkd-section-content -->
						</div>
						<!-- close div.container-fluid -->
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>

		<div class="mkd-portfolio-add">
			<a class="mkd-add-item btn btn-sm btn-primary" href="#"> Add New Item</a>


			<a class="mkd-toggle-all-item btn btn-sm btn-default pull-right" href="#"> Expand All</a>
		</div>


		<?php

	}
}