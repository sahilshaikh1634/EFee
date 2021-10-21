<?php

session_start();
$name=$_SESSION["nam"];

$MERCHANT_KEY = "Ufhl3ewU";
$SALT = "DLMH3DaAZJ";
$suc = "https://sahilshaikh1634.000webhostapp.com/efee/success.php";
$fail = "https://sahilshaikh1634.000webhostapp.com/efee/failure.php";
$pro= "payfee";
// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
         <?php include 'css/css.html'; ?>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
      <?php    include ("menu.php");  ?>
    <h2>PayU Form</h2>
    <h3  style="color: #000000; font-size: 30px;">Payment For: <?php echo $name ?></h3>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <div class="form" style="max-width: 800px;">
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input name="surl" type="hidden" value="<?php echo $suc ?>"  />
      <input name="furl" type="hidden" value="<?php echo $fail ?>" />
      <input name="productinfo" type="hidden" value="<?php echo $pro   ?>" />
      <input name="firstname" type="hidden" value="<?php echo $name  ?>"/>
      <table>
        <tr>
          <td style="color:#ffff"><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td style="color:#ffff; font-size: 30px;">Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount']; ?>"/></td>
        </tr>
        <tr>
          <td style="color:#ffff; font-size: 30px;">Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /></td>          
        </tr>
        <tr>
          <td style="color:#ffff; font-size: 30px;">Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>"/></td>
        </tr>

        

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        
        
     

        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
    </div>
       <script src="js/index.js"></script>
               <div>
                <footer>Copyright &copy; e-fee_Official</footer>
               </div>
  </body>
</html>
