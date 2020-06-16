<?php
/*
    Form connected to mc-end-point.php located in the MailChimp folder
*/
?>

<div class="pdg-tb-3r">
   <form class="form-newsletter flex flex-juscon-center" id="form-mailchimp-newsletter">
      <!-- Add subscriber into a group on MailChimp list -->
      <input type="checkbox" value="ID_NUMBER_OF_THE_GROUP" name="NAME" style="display:none;" checked="checked" />

      <div class="field-email">
         <input type="email" name="EMAIL" value="" placeholder="Tu email" required />
      </div>
      <div class="field-submit">
         <input class="pointer" type="submit" value="Suscríbete" id="submit-newsletter" />
      </div>
   </form>
   <div id="success-response-newsletter" style="display:none;" class="text-center">
      <p class="text-1_5r">Thanks message</p>
   </div>
   <div id="fail-response-newsletter" style="display:none;" class="text-center">
      <p class="text-1_5r">Error message</p>
   </div>
</div>