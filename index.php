<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
    .fixed-form-main {
        width: 100%;
        padding: 1rem 0;
        box-shadow: 0px 0px 10px 4px rgba(181, 175, 175, 0.2);
        /* margin: 0.3rem auto; */
        position: sticky;
        top: 0;
        left: 0;
        background-color: #f1e9dd;
        margin: 2rem 0;
        /* z-index: 1000; */
    }

    .fixed-form-main .p-container {
        width: 92% !important;
        margin: 0 auto;
    }

    .fixed-form-container form {
        width: 100%;
        display: flex;
        gap: 2rem;
    }

    .fixed-form-container form input,
    .fixed-form-container form select {
        width: 20%;
        padding: 17.5px 1rem;
        color: black;
        border: 2px solid black;
        height: 22%;
    }

    .fixed-form-container form .captcha-container {
        border: 2px solid black !important;
    }

    .fixed-form-container form select {
        width: 32%;
        padding-top: 13px;
        padding-inline: 2px;
    }

    .captcha-container {
        display: flex;
        align-items: center;
        padding: 11px 10px;
        color: black;
        margin-bottom: 1.3rem;
        height: 5vh;
    }

    .fixed-form-container form .contact-btn {
        background-color: #ff9e22;
        color: white !important;
        border: 0 !important;
        font-size: 1.1rem !important;
        cursor: pointer;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    /* popup style */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .popup {
        position: relative;
        background-color: #fff;
        margin: 50px auto;
        padding: 10px;
        width: 35%;
        max-width: 600px;
        border-radius: 5px;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 30px;
        color: #000;
        text-decoration: none;
    }

    img.pop-img {
        width: 100%;
        height: 75vh;
        object-fit: cover;
    }
    </style>
</head>

<body>

    <!-- fixed form starts here  -->
    <section class="fixed-form-main">
        <div class="fixed-form-container p-container">
            <form action="mail.php" class="fixed-form" method="POST" autocomplete="off"
                onsubmit="return validateCaptcha()">
                <input type="text" placeholder="ENTER NAME" name="name" oninput="validateName(event)" required />
                <div style="
              display: flex;
              align-items: center;
              color: black;
              height: 22%;
              width: 36%;
            ">
                    <select name="countrycode" id="" style="
                width: 32%;
                padding-top: 17px;
                padding-inline: 2px;
                border-right: none !important;
              " required>
                        <option value="91" selected>+91 (IND)</option>
                        <option value="1">+1 (USA)</option>
                        <option value="44">+44 (UK)</option>
                        <option value="81">+81 (Japan)</option>
                        <option value="86">+86 (China)</option>
                        <option value="33">+33 (France)</option>
                        <option value="49">+49 (Germany)</option>
                        <option value="7">+7 (Russia)</option>
                        <option value="61">+61 (Australia)</option>
                        <option value="55">+55 (Brazil)</option>
                        <option value="91">+91 (Canada)</option>
                        <option value="82">+82 (South Korea)</option>
                        <option value="39">+39 (Italy)</option>
                        <option value="34">+34 (Spain)</option>
                        <option value="81">+81 (Japan)</option>
                        <option value="65">+65 (Singapore)</option>
                        <option value="41">+41 (Switzerland)</option>
                        <option value="31">+31 (Netherlands)</option>
                        <option value="46">+46 (Sweden)</option>
                        <option value="52">+52 (Mexico)</option>
                        <option value="971">+971 (UAE)</option>
                        <option value="91">+91 (India)</option>
                        <option value="92">+92 (Pakistan)</option>
                        <option value="60">+60 (Malaysia)</option>
                        <option value="63">+63 (Philippines)</option>
                        <option value="64">+64 (New Zealand)</option>
                        <option value="55">+55 (Argentina)</option>
                        <option value="234">+234 (Nigeria)</option>
                        <option value="27">+27 (South Africa)</option>
                        <option value="20">+20 (Egypt)</option>
                        <option value="27">+27 (South Africa)</option>
                        <option value="31">+31 (Netherlands)</option>
                        <option value="32">+32 (Belgium)</option>
                        <option value="33">+33 (France)</option>
                        <option value="34">+34 (Spain)</option>
                        <option value="36">+36 (Hungary)</option>
                        <option value="39">+39 (Italy)</option>
                        <option value="41">+41 (Switzerland)</option>
                        <option value="43">+43 (Austria)</option>
                        <option value="45">+45 (Denmark)</option>
                        <option value="46">+46 (Sweden)</option>
                        <option value="47">+47 (Norway)</option>
                        <option value="48">+48 (Poland)</option>
                        <option value="51">+51 (Peru)</option>
                        <option value="52">+52 (Mexico)</option>
                        <option value="54">+54 (Argentina)</option>
                        <option value="55">+55 (Brazil)</option>
                        <option value="56">+56 (Chile)</option>
                        <option value="57">+57 (Colombia)</option>
                        <option value="58">+58 (Venezuela)</option>
                        <option value="60">+60 (Malaysia)</option>
                        <option value="61">+61 (Australia)</option>
                        <option value="62">+62 (Indonesia)</option>
                        <option value="63">+63 (Philippines)</option>
                        <option value="64">+64 (New Zealand)</option>
                        <option value="65">+65 (Singapore)</option>
                        <option value="66">+66 (Thailand)</option>
                        <option value="82">+82 (South Korea)</option>
                    </select>
                    <input type="tel" onkeypress="isInputNumber(event); if(this.value.length==10) return false;"
                        placeholder="PHONE NUMBER" name="phonenumber" minlength="10" maxlength="10"
                        style="flex-grow: 1; border-left: none" required />
                </div>

                <input type="mail" placeholder="ENTER EMAIL ID" name="mail" required />
                <!-- recaptcha -->
                <div class="g-recaptcha" data-sitekey="6LeDTcMpAAAAAB6vwS-RWlgvdrjlt2OqoK_-We1U"></div>
                <div id="errorMessage" style="color: red"></div>
                <!-- Submit button -->
                <input type="submit" value="SUBMIT" class="contact-btn" name="submit-from" />
            </form>
        </div>
    </section>

    <!-- popup modal -->

    <div class="overlay" id="overlay">
        <div class="popup">
            <a href="#" class="close" onclick="closePopup()">&times;</a>
            <!-- Your form code goes here -->
            <div class="card">
                <img src="skd-popup.jpg" class="pop-img">
            </div>
        </div>
    </div>


    <!-- expressions -->
    <script>
    // Function to validate all form inputs
    function validateForm(event) {
        const nameInput = document.querySelector('input[name="name"]');
        const phoneInput = document.querySelector('input[name="phonenumber"]');
        const emailInput = document.querySelector('input[name="mail"]');
        const errorMessage = document.getElementById('errorMessage');

        // Name validation
        const nameRegex = /^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/;
        if (!nameRegex.test(nameInput.value)) {
            errorMessage.innerText = 'Invalid name format. Only letters and spaces are allowed.';
            return false;
        }

        // Phone number validation
        const phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phoneInput.value)) {
            errorMessage.innerText = 'Invalid phone number format. It should be 10 digits long.';
            return false;
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value.trim())) {
            errorMessage.innerText = 'Invalid email address format.';
            return false;
        }

        // If all validations pass, clear error message and proceed with form submission
        errorMessage.innerText = '';
        return true;
    }

    // Attach form validation to form submission event
    const form = document.querySelector('.fixed-form');
    form.addEventListener('submit', validateForm);
    </script>

    <script>
    function validateCaptcha() {
        if (grecaptcha.getResponse() == '') {
            document.getElementById('errorMessage').innerHTML = 'Please complete the CAPTCHA.';
            return false;
        } else {
            document.getElementById('errorMessage').innerHTML = '';
            return true;
        }
    }
    </script>
    <!-- control trafficking -->
    <script>
    // 1
    // Block access from specific IP addresses
    $blocked_ips = array('192.168.0.1', '10.0.0.2');
    if (in_array($_SERVER['REMOTE_ADDR'], $blocked_ips)) {
        // Redirect or display an error message
        header('HTTP/1.1 403 Forbidden');
        exit();
    }

    // 2
    // Set the maximum number of requests per minute
    $max_requests = 100;
    $expiry_time = 60; // in seconds

    $ip_address = $_SERVER['REMOTE_ADDR'];
    $key = 'rate_limit:'.$ip_address;

    $request_count = (int) apcu_fetch($key);
    if ($request_count >= $max_requests) {
        // Display an error message or redirect
        header('HTTP/1.1 429 Too Many Requests');
        exit();
    }

    // Increment the request count
    apcu_store($key, $request_count + 1, $expiry_time);

    // 3
    // Check if the page is already cached
    $cache_key = 'page_'.md5($_SERVER['REQUEST_URI']);
    $cached_page = apcu_fetch($cache_key);

    if ($cached_page) {
        // Output the cached page
        echo $cached_page;
        exit();
    } else {
        // Generate the page content
        // ...

        // Cache the generated page for future requests
        apcu_store($cache_key, $generated_page_content, $expiry_time);
    }
    </script>

    <!-- popup -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('overlay').style.display = 'block';
    });

    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
    }
    </script>
</body>

</html>