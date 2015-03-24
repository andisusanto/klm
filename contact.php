<?php include_once('top.php') ?>
<div class="page-in">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pull-left"><div class="page-in-name">Contacts: <span>Need Support? Get It!</span></div></div>
    </div>
  </div>
</div>

<div class="container marg100">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="promo-block">
              <div class="promo-text">Contact Form</div>
              <div class="center-line"></div>
            </div>
            <div class="marg50">
              <div class="row">
                <form action="assets/php/send.php" method="post" id="contactForm" />
                  <div class="col-lg-4">
                    <p class="text_cont"><input type="text" name="name" placeholder="Name" class="input-cont-textarea" /></p>
                  </div>
                  <div class="col-lg-4">
                    <p class="text_cont"><input type="text" name="email" placeholder="E-mail" class="input-cont-textarea" /></p>
                  </div>
                  <div class="col-lg-4">
                    <p class="text_cont"><input type="text" name="subject" placeholder="Subject" class="input-cont-textarea" /></p>
                  </div>
                  <div class="col-lg-12">
                    <div class="alert alert-danger error" id="nameError"><i class="icon-cancel"></i> Oh snap! Name field can't stay empty.</div>
                    <div class="alert alert-danger error" id="emailError"><i class="icon-cancel"></i> Oh snap! There was a mistake when writing a e-mail.</div>
                    <div class="alert alert-danger error" id="subjectError"><i class="icon-cancel"></i> Oh snap! Subject field can't stay empty.</div>
                  </div>
                  <div class="col-lg-12">
                    <p class="text_cont"><textarea name="message" placeholder="Message" id="message" class="input-cont-textarea" cols="40" rows="10"></textarea></p>
                    <div class="alert alert-danger error" id="messageError"><i class="icon-cancel"></i> Oh snap! This field can't stay empty.</div>
                    <div class="alert alert-success success" id="success"><i class="icon-ok"></i> Well done! You message is successfully sent.</div>
                  </div>
                  <div class="col-lg-12"><p><input type="submit" id="send" class="btn btn-default" value="Send message" /></p></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="promo-block">
              <div class="promo-text">Information</div>
              <div class="center-line"></div>
            </div>
            <div class="marg50">
                <ul class="contact-footer">
                  <li><i class="icon-location"></i> <?php echo $Company->Address ?></li>
                  <li><i class="icon-mobile"></i> <?php echo $Company->ContactNumber ?></li>
                  <li><i class="icon-videocam"></i> Skype:  <?php echo $Company->Skype ?></li>
                  <li><i class="icon-mail"></i> E-mail:  <?php echo $Company->Email ?></li>
                  <li><i class="icon-key"></i> <?php echo $Company->WorkingTime ?></li>
                </ul> 
                <ul class="soc-contacts">
                  <li><a href="<?php echo $Company->Facebook ?>"><i class="fa fa-facebook-square"></i></a></li>
                </ul> 
            </div>
          </div>
        </div>
      </div>
     <?php include_once('bottom.php') ?>