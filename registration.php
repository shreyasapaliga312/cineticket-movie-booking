<?php include_once 'newheader.php'; ?>
<!--/breadcrumbs -->
<div class="w3l-breadcrumbs">
    <nav id="breadcrumbs" class="breadcrumbs">
        <div class="container page-wrapper">
            <a href="index.php">Home</a> » <span class="breadcrumb_last" aria-current="page">Register</span>
        </div>
    </nav>
</div>
<!--//breadcrumbs -->
<!-- contact1 -->
<section class="w3l-contact-1">
    <div class="contacts-9 py-5">
        <div class="container py-lg-4">
            <div class="headerhny-title text-center">
                <h4 class="sub-title text-center">Register with us</h4>
                <h3 class="hny-title mb-0">Enjoy the Life of Movies</h3>
            </div>
            <div class="contact-view mt-lg-5 mt-4">
                <div class="conhny-form-section">
                    <form action="save.php" method="post" class="formhny-sec" onsubmit="return validateForm()">
                        <div class="form-grids">
                            <div class="form-input">
                                <input type="text" name="uname" id="uname" placeholder="Enter your name *" required="" />
                            </div>
                            <div class="form-input">
                                <input type="text" list="genders" name="gender" placeholder="Gender" required/>
                                <datalist id="genders">
                                    <option>Male</option>
                                    <option>Female</option>
                                </datalist>
                            </div>
                            <div class="form-input">
                                <input type="email" name="email" id="w3lSender" placeholder="Enter your email *"
                                       required />
                            </div>
                            <div class="form-input">
                                <input type="text" maxlength="10" name="phone" id="w3lPhone" placeholder="Enter your Phone Number *"
                                       required />
                            </div>
                            <div class="form-input">
                                <input type="password" name="pwd" id="pwd" placeholder="Enter your password *"
                                       required />
                            </div>
                            <div class="form-input">
                                <input type="password" name="cpwd" id="cpwd" placeholder="Confirm your password *"
                                       required />
                            </div>
                        </div>

                        <div class="submithny text-right mt-4">
                            <button class="btn read-button">Register Now</button>
                        </div>
                    </form>
                    <?php
                    if(isset($_SESSION["msg"])){
                        ?>
                    <div class="alert alert-danger text-center mt-2">
                        <?= $_SESSION["msg"] ?>
                    </div>
                    <?php
                    unset($_SESSION["msg"]);
                    }
                    ?>
                </div>

                <div class="d-grid contact-addres-inf mt-5 pt-lg-4">
                    <div class="contact-info-left d-grid">
                        <div class="contact-info">
                            <div class="icon">
                                <span class="fa fa-location-arrow" aria-hidden="true"></span>
                            </div>
                            <div class="contact-details">
                                <h4>Address:</h4>
                                <p>Book My Show, New York, USA</p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="icon">
                                <span class="fa fa-phone" aria-hidden="true"></span>
                            </div>
                            <div class="contact-details">
                                <h4>Phone:</h4>
                                <p><a href="tel:+598-658-456">+91 9811763737</a></p>
                                <p><a href="tel:+598-658-457">+91 8053431608</a></p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="icon">
                                <span class="fa fa-envelope-open-o" aria-hidden="true"></span>
                            </div>
                            <div class="contact-details">
                                <h4>Mail:</h4>
                                <p><a href="mailto:mail@example.com" class="email">info@bookmyshow.com</a></p>
                                <p><a href="mailto:mail@example.com" class="email">bookmyshow@support.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /contact1 -->
<script>
    function validateForm() {
        // Validate name field
        const name = document.getElementById('uname').value;
        const nameRegex = /^[a-zA-Z\s]+$/;
        if (!nameRegex.test(name)) {
            alert('Name should only contain letters and spaces.');
            return false;
        }

        // Validate password length
        const password = document.getElementById('pwd').value;
        if (password.length <= 6) {
            alert('Password should be more than 6 characters.');
            return false;
        }

        return true;
    }
</script>
<?php include_once 'newfooter.php'; ?>
