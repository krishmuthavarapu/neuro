
<form name="" action="" method="POST">

<!--Grid row-->
<div class="row">

    <!--Grid column-->
    <div class="col-md-12">
        <div class="md-form mb-0">
        <i class="fas fa-user prefix grey-text"></i>
            <input type="text" id="name" name="name" class="form-control" required>
            <label for="name" class="">Your name</label>
        </div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-12">
        <div class="md-form mb-0">
        <i class="fas fa-envelope prefix grey-text"></i>
            <input type="email" id="email" name="email" class="form-control" required>
            <label for="email" class="">Your email</label>
        </div>
    </div>
    <!--Grid column-->

</div>
<!--Grid row-->

<!--Grid row-->
<div class="row">
    <div class="col-md-12">
        <div class="md-form mb-0">
        <i class="fas fa-phone prefix grey-text"></i>
            <input type="text" id="number" name="number" class="form-control" required>
            <label for="number" class="">Phone number</label>
        </div>
    </div>
</div>
<!--Grid row-->
<div class="row">
<div class="col-md-12">
        <div class="md-form mb-0">
        <!-- <i class="fas fa-star prefix grey-text"></i> -->
        <i class="fas fa-envelope-open-text prefix grey-text"></i>
            <input type="text" id="subject" name="subject" class="form-control" required>
            <label for="subject" class="">Subject</label>
        </div>
    </div>
</div>
<!--Grid row-->
<div class="row">

    <!--Grid column-->
    <div class="col-md-12">

        <div class="md-form">
        <i class="fas fa-comment prefix grey-text"></i>
        
            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" required></textarea>
            <label for="message">Your message</label>
        </div>

    </div>
</div>
<!--Grid row-->
<div class="text-center text-md-left">
    <button class="btn btn-primary br-90 cus-grad" type="submit" value="send" id="btncontact" name="save">Send</button>
</div>
</form>