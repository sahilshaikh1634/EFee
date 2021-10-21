<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="DLMH3DaAZJ";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   } else {?>
                                <html>
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <head>
                                  <title>payment failure</title>
                                  <?php include 'css/css.html'; ?>
                                </head>
                                <body>
                                    <?php    include ("menu.php");  ?>
                                    <div class="form" >

                                 <div id="show">   
                                  <h1>YOUR FEE PAYMENT IS NOT DONE</h1>

                                  <form action="index.php" method="post" autocomplete="off" enctype="multipart/form-data">
                                      <div class="field-wrap" align="center">
                                          <img src="img/load.gif" style="max-width: 150px;"/>
                                  </div>  




                                  <div class="field-wrap">

                                      <h2>Thank You. Your order status is <?php echo $status ?></h2>
                                  </div>




                                  <div class="field-wrap">

                                      <h2>Your Transaction ID for this transaction is  <?php echo $txnid ?> </h2>
                                  </div>



                                  <div class="field-wrap">

                                      <h2>We have received a payment of Rs. <?php echo $amount ?> Your order will soon be shipped.</h2>
                                  </div> 
                                      
                                    <button class="button button-block"  input type="submit" name="submit" value="Submit" />RETRY !!</button>

                                  </form>

                                </div> 
                            </div><!-- /form -->


                            <script src="js/index.js"></script>

                            </body>
                            </html>
		<?php } ?>
