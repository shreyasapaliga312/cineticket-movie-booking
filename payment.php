<?php include_once 'dbfun.php'; ?>
<?php include_once 'newheader.php'; ?>
<style>
    th,h4,label{
        color:var(--theme-title);
    }
</style>

<div class="container" style="margin-top: 70px;">
    <br>
    <div class="creditCardForm">
        <div class="payment row">
            <div class="col-sm-6">
                <form action="process_payment.php" method="POST" onsubmit="return validateForm()">
                    <div class="form-group owner">
                        <label for="owner">Name on Card</label>
                        <input type="text" class="form-control" id="owner" name="name_on_card" required>
                        <span id="owner-error" style="color: red; font-size: 14px;"></span>
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" required>
                        <span id="cvv-error" style="color: red;font-size: 14px;"></span>
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="card_number" required>
                        <span id="cardNumber-error" style="color: red; font-size: 14px;"></span>
                    </div>
                    <div class="form-group row" id="expiration-date">
                        <label class="col-sm-4">Expiration Date</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="exp_month" required>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control" name="exp_year" required>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="images/visa.jpg" id="visa">
                        <img src="images/mastercard.jpg" id="mastercard">
                        <img src="images/amex.jpg" id="amex">
                    </div>
                    <div class="form-group" id="pay-now">
                        <input type="hidden" name="bid" value="<?= isset($_GET['id']) ? $_GET['id'] : null; ?>">
                        <button type="submit" class="btn btn-primary" id="confirm-purchase">Confirm Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once 'newfooter.php'; ?>

<script>
function validateForm() {
    var owner = document.getElementById("owner").value;
    var ownerError = document.getElementById("owner-error");

    // Check if the owner name contains only alphabetic characters
    var regex = /^[a-zA-Z\s]+$/;
    if (!regex.test(owner)) {
        ownerError.innerText = "Please enter a card name in text.";
        return false; // Prevent form submission
    } else {
        ownerError.innerText = "";
    }

    var cvv = document.getElementById("cvv").value;
    var cvvError = document.getElementById("cvv-error");

    if (cvv.length !== 3 || isNaN(cvv)) {
        cvvError.innerText = "Please enter a valid 3-digit CVV number.";
        return false; // Prevent form submission
    } else {
        cvvError.innerText = "";
    }

    var cardNumber = document.getElementById("cardNumber").value;
    var cardNumberError = document.getElementById("cardNumber-error");

    if (cardNumber.length !== 16 || isNaN(cardNumber)) {
        cardNumberError.innerText = "Please enter a valid 16-digit card number.";
        return false; // Prevent form submission
    } else {
        cardNumberError.innerText = "";
    }

    return true; // Allow form submission
}

document.getElementById("confirm-purchase").addEventListener("click", function(event) {
    if (!validateForm()) {
        event.preventDefault(); // Prevent form submission if validation fails
    }
});
</script>
