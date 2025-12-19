<?php include_once 'dbfun.php'; ?>
<?php include_once 'newheader.php';?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $subject = $_POST['Subject'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $message = $_POST['Message'];

    // Insert data into database
    insertContactMessage($name, $subject, $email, $phone, $message);

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
    <script>
        function validateForm() {
            var name = document.getElementById("w3lName").value;
            var phone = document.getElementById("w3lPhone").value;
            var nameError = document.getElementById("name-error");
            var phoneError = document.getElementById("phone-error");
            var valid = true;
            
            if (!/^[a-zA-Z]+$/.test(name)) {
                nameError.innerText = "Please enter a valid name (letters only).";
                valid = false;
            } else {
                nameError.innerText = "";
            }

            if (phone.length !== 10 || isNaN(phone)) {
                phoneError.innerText = "Please enter a valid 10-digit phone number.";
                valid = false;
            } else {
                phoneError.innerText = "";
            }

            return valid;
        }
    </script>
</head>
<body>



		<!--/breadcrumbs -->
	<div class="w3l-breadcrumbs">
		<nav id="breadcrumbs" class="breadcrumbs">
			<div class="container page-wrapper">
			<a href="index.html">Home</a> » <span class="breadcrumb_last" aria-current="page">Contact</span>
			</div>
		</nav>
	</div>
 <!--//breadcrumbs -->
	  <!-- contact1 -->
	  <section class="w3l-contact-1">
		<div class="contacts-9 py-5">
		  <div class="container py-lg-4">
			<div class="headerhny-title text-center">
				<h4 class="sub-title text-center">Contact us</h4>
				<h3 class="hny-title mb-0">Leave a Message</h3>
				<p class="hny-title mb-lg-5 mb-4">If you have a question regarding our services, feel free to contact us using the form below.</p>
			</div>
			<div class="contact-view mt-lg-5 mt-4">
			  <div class="conhny-form-section">
				<form action="" method="post" class="formhny-sec"onsubmit="return validateForm()">
						<div class="form-grids">
							<div class="form-input">
								<input type="text" name="Name" id="w3lName" placeholder="Enter your name *" required="" />
								<span id="name-error" style="color: red; font-size:12px;"></span><br><br>
							</div>
							<div class="form-input">
								<input type="text" name="Subject" id="w3lSubject" placeholder="Enter subject " required />
							</div>
							<div class="form-input">
								<input type="email" name="Email" id="w3lSender" placeholder="Enter your email *"
									required />
							</div>
							<div class="form-input">
								<input type="text" name="Phone" id="w3lPhone" placeholder="Enter your Phone Number *"
									required />
									<span id="phone-error" style="color: red;  font-size:12px;"></span><br><br>
								
							</div>
						</div>
						<div class="form-input mt-4">
							<textarea name="Message" id="w3lMessage" placeholder="Type your query here"
								required=""></textarea>
						</div>
						<div class="submithny text-right mt-4">
							<input type="submit" style="background-color:#df0e62;color:white; width:140px; margin-right:350px;"  >
						</div>
					</form>
			  </div>

			  <div class="d-grid contact-addres-inf mt-5 pt-lg-4">
				<div class="contact-info-left d-grid">
					<div class="contact-info">
						<div class="icon">
							<span class="fa fa-location-arrow" aria-hidden="true"></span>
						</div>
						<div class="contact-details">
							<h4>Address:</h4>
							<p>udupi- Manglore Karnataka</p>
						</div>
					</div>
					<div class="contact-info">
						<div class="icon">
							<span class="fa fa-phone" aria-hidden="true"></span>
						</div>
						<div class="contact-details">
							<h4>Phone:</h4>
							<p><a href="tel:+598-658-456">+598-658-346</a></p>
							<p><a href="tel:+598-658-457">+598-658-436</a></p>
						</div>
					</div>
					<div class="contact-info">
						<div class="icon">
							<span class="fa fa-envelope-open-o" aria-hidden="true"></span>
						</div>
						<div class="contact-details">
							<h4>Mail:</h4>
							<p><a href="mailto:mail@example.com" class="email">CineTicket24@gmail.com</a></p>
							<p><a href="mailto:mail@example.com" class="email">CineTicket@gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
			</div>
		  </div>
		</div>
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.305935303!2d-74.25986548248684!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563262564932!5m2!1sen!2sin" style="border:0" allowfullscreen=""></iframe>
		</div>
	  </section>
	  <!-- /contact1 -->
          <?php include_once 'newfooter.php';?>
			</body>
			</html>