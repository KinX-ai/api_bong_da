<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 6/18/14
 * Time: 11:38 PM
 */

?>

<form id="message-form" action="/api_bong_da/www/index.php/api/push" method="post">
	<div class="row success">
		<label for="message" class="required">Message <span class="required">*</span></label>
        <input name="message" id="messageForm" type="text">
        <div class="errorMessage" id="LoginForm_username_em_" style="display: none;"></div>
    </div>
	<div class="row buttons">
		<input type="submit" name="yt0" value="Push">
    </div>
</form>