<?php $__env->startSection('title',"FAQ"); ?>

<?php $__env->startSection('content'); ?>
  <!--start of middle sec-->
  <div class="middle-sec wow fadeIn" data-wow-offset="10" data-wow-duration="2s">
    <div class="page-header">
      <div class="container text-center">
        <h2 class="text-primary text-uppercase">frequently asked questions</h2>
        <p>find an answer to commonly asked questions.</p>
      </div>
    </div>
    <section class="container equal-height-container">
      <div class="row"> 
        <!--start of inner add-->
        <div class="col-sm-12">
          <div class="inner-ad"> <img width="1170" height="100" alt="" src="<?php echo e($ad); ?>" class="img-responsive"> </div>
        </div>
        <!--end of inner add-->
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-12">
              <ol class="breadcrumb  dashed-border">
                <li><a href="#">Home</a></li>
                <li class="active">Frequently Asked Questions</li>
              </ol>
            </div>
			<?php
			$placeOrders = <<<EOT
<ul>
<li>Look through our lovely selection of fashion jewellery</li>
<li>Add items to your cart</li>
<li>When done adding items to cart, click on your shopping cart to view all items selected</li>
<li>Proceed to check out</li>
<li>Register as a new customer or login as a member</li>
<li>Select mode of payment</li>
<li>select delivery option</li>
<li>Confirm your order.</li>
<li>This will generate a code</li>
<li>Make payment using this code</li>
<li>Once payment is received, you will get an email confirming your order and delivery details</li></ul>
EOT;
			
			  $set1 = [
			    'Do you have a showroom I can visit?' => "No, our business is strictly online but should you need to speak with a representative please feel free to give us a call or email us.",
			    'Could we order online and pickup at our convenience?' => "Yes, please give us a call to arrange this.",
			    'What is the latest time to place an order to get it out the same day?' => "We do not offer same day delivery option. Please give us a call for special cases.",			   
				'Do you make deliveries to P.O boxes?' => "NO, we do not deliver to PO BOXES. A valid address with the correct house number, street and preferably landmark will get your goods to you faster.",
			    'Do you ship out orders over the weekend?' => "We are open 7 days and do pack, prepare and ship orders over the weekend; however your package will not go out until Monday.",
			    'How do I place orders on your website?' => "Please see below order process<br><br>Look through our lovely selection of fashion accessories<br><br>Add items to your cart<br><br>When done adding items to cart, click on your shopping cart to view all items selected<br><br>Proceed to check out<br><br>Register as a new customer or login as a member<br>Select mode of payment<br><br>For <b>card payments</b> enter your card details and complete payment.<br><br>For <b>bank payments</b> a payment code will be generated. Make payment to our bank account using this code as reference<br><br>Once payment is received via either method, you will get an email confirming your order and delivery details<br>",
			    'How do I make payment for purchase on your site?' => "Please see below different payment options for items selected on our site<br><br><li>Online Transfer</li><li>Cash Deposit</li></ul>",
			    'Do you take phone orders?' => "Yes, we are always here to help. Please call us with your orders. You must have ready your customer ID, phone number, the item numbers and quantity.<br><br> Please Note: This is not available if you do not have an order history with us.",
			    'How do I add items to my existing order?' => "Please email or call us and one of our representatives will assist you adding or changing items to your existing order if it has not already shipped. Also, please note that the order will only be completed after payment is made.",
			    'How often do you restock items?' => "Most items that were very successful will usually be restocked right away.<br><br>For restock requests, please send us an email with the item number and we can give you a restocking date if any."			    
			  ];
			  
			  $set2 = [
			    'How much are the delivery fees?' => "Delivery cost varies per location. We charge &#8358;1000 for doorstep delivery to southwest states (Lagos, Ondo, Ekiti, Osun, Oyo, Ogun) and &#8358;2000 for other states.",
			    'How long will it take to deliver my order?' => "Orders are delivered within 48 hours in Lagos.<br><br>Orders outside Lagos are delivered between 3 – 7 days.",
			    'How do I return an item?' => "Unless you received a defective item, ALL sales are final.<br><br>Please communicate to us by email on defective items for a refund or exchange.",
			    'I have other questions' => "Please email or call us with any questions or concerns you may have. We are always here to help."
			  ];
			?>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-12 main-sec faqs">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="sub-title text-primary text-uppercase">shopping &amp; payment</h4>
                        </div>
						<?php
						foreach($set1 as $key => $value)
						{
						?>
                        <!--start of flip box-->
                        
                        <div class="col-sm-4 flip-box">
                          <div class="flip">
                            <div class="card">
                              <div class="face front">
                                <div class="well well-sm inner">
                                  <div class="icon"> <i class="ion-help-circled"></i></div>
                                  <h5><?php echo e($key); ?></h5>
                                </div>
                              </div>
                              <div class="face back">
                                <div class="well well-sm inner" style="overflow: auto !important;"> <?php echo $value; ?></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--end of flip box--> 
                        <?php
						}
						?>
                       
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-12">
                          <h4 class="sub-title text-primary text-uppercase">shipping &amp; delivery</h4>
                        </div>
                        
                        <?php
						foreach($set2 as $key => $value)
						{
						?>
                        <!--start of flip box-->
                        
                        <div class="col-sm-4 flip-box">
                          <div class="flip">
                            <div class="card">
                              <div class="face front">
                                <div class="well well-sm inner">
                                  <div class="icon"> <i class="ion-help-circled"></i></div>
                                  <h5><?php echo e($key); ?></h5>
                                </div>
                              </div>
                              <div class="face back">
                                <div class="well well-sm inner"> <?php echo $value; ?></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--end of flip box--> 
                        <?php
						}
						?>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--end of middle sec--> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\bkupp\lokl\repo\ace\resources\views/faq.blade.php ENDPATH**/ ?>