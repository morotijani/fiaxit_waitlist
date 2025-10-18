<?php

    require ('config.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fiaxit . Waitlist</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Code:ital,wght@0,300..800;1,300..800&family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    <link href="https://coderthemes.com/around/assets/vendor/aos/dist/aos.css" rel="stylesheet" type="text/css">
    <link href="https://coderthemes.com/around/assets/icons/around-icons.min.css" rel="stylesheet" type="text/css">
    <link href="https://coderthemes.com/around/assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="css.css" rel="stylesheet" type="text/css">
    <style>
        /* === ROTATING CIRCLES === */
        .circle {
            position: absolute;
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 50%;
            animation: rotate 80s linear infinite;
        }

        .circle:nth-child(1) { width: 600px; height: 600px; }
        .circle:nth-child(2) { width: 800px; height: 800px; animation-duration: 120s; }
        .circle:nth-child(3) { width: 1000px; height: 1000px; animation-duration: 160s; }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* === FLOATING TAGS === */
        .floating-tag {
            position: absolute;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 8px 16px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
            color: #333;
            z-index: 3;
            animation: float 6s ease-in-out infinite alternate;
        }

        @keyframes float {
            0% { transform: translateY(0); }
            100% { transform: translateY(-20px); }
        }

        .tag-1 { top: 15%; left: 12%; animation-delay: 0s; }
        .tag-2 { top: 10%; right: 15%; animation-delay: 1s; }
        .tag-3 { bottom: 18%; right: 12%; animation-delay: 2s; }
        .tag-4 { bottom: 12%; left: 20%; animation-delay: 3s; }

        @media (max-width: 768px) {
            .tag-4 {
                display: none;
            }
        }
    </style>
</head>
<body >
    <!-- Floating tags -->
    <div class="floating-tag tag-1"><img src="btc.png" width="20" /> Bitcoin (BTC)</div>
    <div class="floating-tag tag-2"><img src="USDT.png" width="20" /> USDT</div>
    <div class="floating-tag tag-3"><img src="eth.png" width="20" /> Ethereum (ETH)</div>
    <div class="floating-tag tag-4"><img src="bnb.png" width="20" /> Binance Coin (BNB)</div>

    <!-- FAQ (Accordion) -->
    <section class="bg-secondary py-5">
        <div class="container py-md-2 py-lg-3 py-xl-5 my-2 my-sm-3 my-md-4 my-xxl-5">
            <img class="" src="logo.png" width="150" alt="Image">
            <div class="row">
                <div class="col-md-4 text-center text-md-start">
                    <h2 class="h3">Exchange your crypto asset instantly, securely and seemslessly</h2>
                    <p class="pb-3 pb-sm-4">Be among the first to enjoy seamless and secure crypto asset exchange; executed at lightning speed.</p>
                    <div class="d-none d-md-flex justify-content-center">
                        <svg class="text-warning ms-n4" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                <div class="col-md-8 col-lg-7 offset-lg-1">
                    <div class="accordion" id="faq">
                        <div class="accordion-item bg-light">
                            <h3 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#questionOne" aria-expanded="true" aria-controls="questionOne">Waitlist form.</button>
                            </h3>
                            <div class="accordion-collapse collapse show" id="questionOne" aria-labelledby="headingOne" data-bs-parent="#faq">
                                <div class="accordion-body fs-sm">
                                    <p class="text-center text-body-warning mb-1">✌️ No Spam — We Promise!</p>
                                    <form id="waitlist-form" method="POST">
                                        <div id="response-message"></div>
                                        <div class="mb-4">
                                            <label class="form-label" for="email">Email Address</label>
                                            <input class="form-control form-control-lg" id="email" type="email" placeholder="Enter your email address..." onfocus="" autocomplete="off" />
                                        </div>
                                        <div class="mb-4 phone">
                                            <label class="form-label">Phone Number</label>
                                            <div class="input-group">
                                                <select class="border-0" id="countryCode" name="countryCode" required>
                                                    <option value="+233" data-length="9" selected>🇬🇭 +233 (Ghana)</option>
                                                    <option value="+256" data-length="9">🇺🇬 +256 (Uganda)</option>
                                                    <option value="+254" data-length="9">🇰🇪 +254 (Kenya)</option>
                                                    <option value="+234" data-length="10">🇳🇬 +234 (Nigeria)</option>
                                                </select>
                                                <!-- <input type="text" class="form-control" id="phone1" placeholder="(___)___-____" data-inputmask="'mask': '(999)999-9999'"> -->
                                                <input type="tel" class="form-control" id="phone" name="phone">
                                            </div>
                                        </div>
                                        <div class="d-sm-flex justify-content-center justify-content-lg-start">
                                            <button class="btn btn-secondary w-100 w-sm-auto mb-2 mb-sm-0 me-sm-1" id="join-button" type="button">Join waitlist</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <p class="text-warning text-sm mb-0">Built by <a href="https://namibra.io">namibra.io</a></p>
        </div>
    </section>
    <!-- <div id="status" class="small text-success">Recording...</div> -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://coderthemes.com/around/assets/vendor/parallax-js/dist/parallax.min.js"></script>
    <script src="https://coderthemes.com/around/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="https://coderthemes.com/around/assets/vendor/aos/dist/aos.js"></script>
    <script src="https://coderthemes.com/around/assets/js/theme.min.js"></script>

    <!-- jQuery + Inputmask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>


    <script>
       $(document).ready(function() {

            // Activate input mask for phone
            $('#phone').inputmask();

            // Handle form submission

            phone.addEventListener('input', () => {
                // Only allow digits
                phone.value = phone.value.replace(/\D/g, '');
            });

            $('#join-button').on('click', function() {
                const email = $('#email').val().trim();
                const countrySelect = document.getElementById('countryCode');
                const phone = $('#phone').val().trim();
                const button = $(this);
                const messageBox = $('#response-message');
               
                // Basic validations
                if (!email) {
                    $('#email').focus()
                    messageBox.html('<div class="alert alert-danger">Please enter your email address.</div>');
                    return;
                }

                const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if (!emailPattern.test(email)) {
                    $('#email').focus()
                    messageBox.html('<div class="alert alert-danger">Please enter a valid email address.</div>');
                    return;
                }

                const code = countrySelect.value;
                const requiredLength = parseInt(countrySelect.selectedOptions[0].dataset.length);

                if (!phone) {
                    $('#phone').focus()
                    messageBox.html('<div class="alert alert-danger">Please enter your phone number.</div>');
                    return;
                }

                if (phone.length !== requiredLength) {
                    messageBox.html(`<div class="alert alert-danger">⚠ ${countrySelect.selectedOptions[0].textContent.split(' ')[1]} numbers must be ${requiredLength} digits long.</div>`);
                    return;
                }

                // Disable button and show loading text
                button.prop('disabled', true).html('Submitting... ⏳');
                messageBox.html('');

                // Simulate short delay before sending
                setTimeout(function() {
                    $.ajax({
                        url: 'waitlist.php', // your PHP file to handle form
                        type: 'POST',
                        data: { email: email, phone: phone, countryCode : code },
                        success: function(response) {
                            if (response == 'Success') {
                                messageBox.html('<div class="alert alert-success">Thank you! You have been added to the waitlist.</div>');
                                button.html('Submitted ✅');
                            } else {
                                messageBox.html('<div class="alert alert-danger">' + response + '</div>');
                                button.prop('disabled', false).html('Join waitlist');
                            }
                        },
                        error: function() {
                            messageBox.html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
                            button.prop('disabled', false).html('Join waitlist');
                        }
                    });
                }, 1500); // 1.5-second fake delay
            });
        });
    </script>

    <script>
        if (!sessionStorage.getItem('visitor_logged')) {
            const client = {
                screen: `${screen.width}x${screen.height}`,
                colorDepth: screen.colorDepth,
                timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                platform: navigator.platform,
                language: navigator.language,
                cookiesEnabled: navigator.cookieEnabled,
                referer: document.referrer,
                url: window.location.href,
                ua: navigator.userAgent
            };

            fetch('log.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(client)
            })
            .then(r => r.json())
            .then(j => {
                if (j.success) {
                    sessionStorage.setItem('visitor_logged', '1');
                    // document.getElementById('status').textContent = 'Visit recorded successfully.';
                    console.log('Visit recorded successfully.');
                } else {
                    // document.getElementById('status').textContent = 'Error recording visit.';
                    console.log('Error recording visit.');
                }
            })
            .catch(() => console.log('Network error.')); // document.getElementById('status').textContent = 'Network error.');
        }
</script>
</body>
</html>