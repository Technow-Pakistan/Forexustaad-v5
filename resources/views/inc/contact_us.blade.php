<form action="<?php echo BASE_URL?>/inc/ajax-response.php" method="post" class="msg_form">
    <div class="contact_us_form wow animated fadeInUp">
        <div class="form-group">
            <input type="text" class="form-control text-gray explore_form" placeholder="Your Name *" name="name" id="name">

        </div>
        <div class="form-group">
            <input type="text" class="form-control text-gray explore_form" placeholder="Your Phone *" name="phone" id="phone">
        </div>
        <div class="form-group">
            <input type="text" class="form-control text-gray explore_form" placeholder="Your Email *" name="email" id="email">
        </div>
        <div class="form-group">
            <textarea name="message" id="messag" class="form-control text-gray explore_form" placeholder="Your Message *" rows="4"></textarea>
        </div>
        <div class="form-group text-left">
            <button class="btn btn-primary text-uppercase send_msg" type="button" disabled>Send a message</button>
        </div>
    </div>
</form>
<div class="show_msg d-none">
</div>
