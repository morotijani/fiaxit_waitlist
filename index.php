<?php

include ('config.php');

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
    
    </style>
</head>
<body >
    <!-- Floating tags -->
  <div class="floating-tag tag-1"><img src="btc.png" width="20" /> Bitcoin (BTC)</div>
  <div class="floating-tag tag-2"><img src="USDT.png" width="20" /> USDT</div>
  <div class="floating-tag tag-3"><img src="eth.png" width="20" /> Ethereum (ETH)</div>
  <div class="floating-tag tag-4"><img src="bnb.png" width="20" /> Binance Coin (BNB)</div>


    
      <!-- Gallery -->
      <!-- <section class="container py-5 my-lg-3 my-xl-4 my-xxl-5">
            <div class="row g-4 mb-3 mb-xl-0 pb-sm-2 pb-md-4 pb-xl-5">
                <div class="col-md-5 col-lg-4 order-md-1">
                    <div class="card border-0 h-100 bg-size-cover bg-position-top-center" style="min-height: 280px; background-image: url(cover.png);">
                        <div class="d-nline-flex position-absolute top-50 start-50 translate-middle z-2" style="width: max-content;">
                            <div class="vstack gap-1">
                                <div class="bg-body-secondary rounded-3 p-4">
                                        <div class="d-flex justify-content-between text-xs text-muted">
                                            <span class="fw-semibold">From</span> 
                                            <span>
                                            1
                                            <span id="preview-symbol">
                                                <?= $coin_data['data'][0]['symbol']; ?>
                                            </span>: 
                                            <span id="preview-amount">
                                                <?= number_format($coin_data['data'][0]['quote']['USD']['price'], 2); ?> USD
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2 mt-4">
                                            <input type="number" min="1" id="send_amount" name="send_amount" class="form-control form-control-flush text-xl fw-bold flex-fill" placeholder="$0.00" oninput="validatePositiveNumber(this)" autocomplete="off" inputmode="numeric"> 
                                            <div class="dropdown" >
                                                <button class="btn btn-sm rounded-pill shadow-none flex-none d-flex align-items-center gap-2 p-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/<?= $coin_data['data'][0]['id']; ?>.png"; class="w-rem-6 h-rem-6 rounded-circle img-fluid" alt="..." id="preview-logo"> 
                                                    <span id="preview-symbol-selected" class="text-dark">
                                                        <?= $coin_data['data'][0]['symbol']; ?>
                                                    </span> 
                                                    <i class="bi bi-chevron-down text-xs me-1"></i>

                                                    <input type="hidden" name="to_crypto_details_default" id="to_crypto_details_default" value="<?= $coin_data['data'][0]['id'] . '/' . $coin_data['data'][0]['symbol'] . '/' . $coin_data['data'][0]['name'] . '/' . number_format($coin_data['data'][0]['quote']['USD']['price'], 2); ?>">
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm" id="list-crypto">
                                                    <?php 
                                                        if (is_array($coin_data)) {
                                                            if (isset($coin_data['data'])) {
                                                                foreach (array_slice($coin_data['data'], 0, 5) as $crypto) {
                                                                    $icon = "https://s2.coinmarketcap.com/static/img/coins/64x64/{$crypto['id']}.png";
                                                    ?>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:;">
                                                            <img src="<?= $icon; ?>" class="w-rem-6 h-rem-6 rounded-circle img-fluid" alt="..."> 
                                                            <span><?= $crypto['symbol']; ?></span>
                                                            <input type="hidden" name="to_cypto_id" id="to_crypto_details" value="<?= $crypto['id'] . '/' .$crypto['symbol'] . '/' . $crypto['name'] . '/' . number_format($crypto['quote']['USD']['price'], 2); ?>">

                                                        </a>
                                                    </li>
                                                    <?php 
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                    <input type="hidden" name="to_cypto" id="to_cypto" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative text-center my-n4 overlap-10">
                                        <div class="icon icon-sm icon-shape bg-body shadow-soft-3 rounded-circle text-sm text-body-tertiary">
                                            <i class="bi bi-currency-bitcoin"></i>
                                        </div>
                                    </div>

                                    <div class="bg-body-secondary rounded-3 p-4">
                                        <div class="d-flex justify-content-between text-xs text-muted">
                                            <span class="fw-semibold">Amount in Crypto</span> 
                                            <span><span id="amount-in-crypto-crypto"></span>: <span id="amount-in-crypto-amount"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 order-md-2">
                        <div class="card border-0 bg-secondary h-100 px-xl-4 pb-sm-2 pb-xl-4">
                            <img class="d-block mx-auto" src="logo.png" width="200" alt="Image">
                            <div class="card-body">
                                <h1 class="display-5" style='font-family: "Google Sans Code", monospace;'>Exchange your crypto asset instantly, securely and seemslessly</h1>
                                <p class="card-text">Be among the first to enjoy seamless and secure crypto asset exchange; executed at lightning speed.</p>
                                <form class="mb-5" id="sigin-form" method="POST">
                                    <div id="response-message"></div>
                                    <div class="mb-4">
                                        <label class="visually-hidden" for="email">Email Address</label>
                                        <input class="form-control form-control-lg" id="email" type="email" placeholder="Enter your email address..." onfocus="" autocomplete="off" />
                                    </div>
                                    <div class="mb-4 phone">
                                        <label class="visually-hidden" for="phone">Phone</label>
                                        <input type="text" class="form-control form-control-lg" id="phone" placeholder="(___)___-____" data-inputmask="'mask': '(999)999-9999'">
                                    </div>
                                    <div class="d-sm-flex justify-content-center justify-content-lg-start">
                                        <button class="btn btn-lg btn-info w-100 w-sm-auto mb-2 mb-sm-0 me-sm-1" id="signin-button" type="button">Join waitlist</button>
                                    </div>
                                </form>
                                <p class="text-center text-body-warning mb-0">✌️ No Spam — We Promise!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
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
                                        <form id="sigin-form" method="POST">
                                            <div id="response-message"></div>
                                            <div class="mb-4">
                                                <label class="form-label" for="email">Email Address</label>
                                                <input class="form-control" id="email" type="email" placeholder="Enter your email address..." onfocus="" autocomplete="off" />
                                            </div>
                                            <div class="mb-4 phone">
                                                <label for="phone" class="form-label" for="phone">Phone Number</label>
                                                <div class="input-group">
                                                    <select class="form-select" id="countryCode" required>
                                                        <option value="+233" selected>🇬🇭 +233 (Ghana)</option>
                                                        <option value="+256">🇺🇬 +256 (Uganda)</option>
                                                        <option value="+254">🇰🇪 +254 (Kenya)</option>
                                                        <option value="+234">🇳🇬 +234 (Nigeria)</option>
                                                    </select>
                                                    <input type="text" class="form-control" id="phone" placeholder="(___)___-____" data-inputmask="'mask': '(999)999-9999'">
                                                </div>
                                            </div>
                                            <div class="d-sm-flex justify-content-center justify-content-lg-start">
                                                <button class="btn btn-secondary w-100 w-sm-auto mb-2 mb-sm-0 me-sm-1" id="signin-button" type="button">Join waitlist</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            <div class="vstack gap-1">
                                <div class="bg-body-secondary rounded-3 p-4">
                                        <div class="d-flex justify-content-between text-xs text-muted">
                                            <span class="fw-semibold">From</span> 
                                            <span>
                                            1
                                            <span id="preview-symbol">
                                                <?= $coin_data['data'][0]['symbol']; ?>
                                            </span>: 
                                            <span id="preview-amount">
                                                <?= number_format($coin_data['data'][0]['quote']['USD']['price'], 2); ?> USD
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2 mt-4">
                                            <input type="number" min="1" id="send_amount" name="send_amount" class="form-control form-control-flush text-xl fw-bold flex-fill" placeholder="$0.00" oninput="validatePositiveNumber(this)" autocomplete="off" inputmode="numeric"> 
                                            <div class="dropdown" >
                                                <button class="btn btn-sm rounded-pill shadow-none flex-none d-flex align-items-center gap-2 p-2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/<?= $coin_data['data'][0]['id']; ?>.png"; class="w-rem-6 h-rem-6 rounded-circle img-fluid" alt="..." id="preview-logo"> 
                                                    <span id="preview-symbol-selected" class="text-dark">
                                                        <?= $coin_data['data'][0]['symbol']; ?>
                                                    </span> 
                                                    <i class="bi bi-chevron-down text-xs me-1"></i>

                                                    <input type="hidden" name="to_crypto_details_default" id="to_crypto_details_default" value="<?= $coin_data['data'][0]['id'] . '/' . $coin_data['data'][0]['symbol'] . '/' . $coin_data['data'][0]['name'] . '/' . number_format($coin_data['data'][0]['quote']['USD']['price'], 2); ?>">
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm" id="list-crypto">
                                                    <?php 
                                                        if (is_array($coin_data)) {
                                                            if (isset($coin_data['data'])) {
                                                                foreach (array_slice($coin_data['data'], 0, 5) as $crypto) {
                                                                    $icon = "https://s2.coinmarketcap.com/static/img/coins/64x64/{$crypto['id']}.png";
                                                    ?>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2" href="javascript:;">
                                                            <img src="<?= $icon; ?>" class="w-rem-6 h-rem-6 rounded-circle img-fluid" alt="..."> 
                                                            <span><?= $crypto['symbol']; ?></span>
                                                            <input type="hidden" name="to_cypto_id" id="to_crypto_details" value="<?= $crypto['id'] . '/' .$crypto['symbol'] . '/' . $crypto['name'] . '/' . number_format($crypto['quote']['USD']['price'], 2); ?>">

                                                        </a>
                                                    </li>
                                                    <?php 
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                    <input type="hidden" name="to_cypto" id="to_cypto" value="">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative text-center my-n4 overlap-10">
                                        <div class="icon icon-sm icon-shape bg-body shadow-soft-3 rounded-circle text-sm text-body-tertiary">
                                            <i class="bi bi-currency-bitcoin"></i>
                                        </div>
                                    </div>

                                    <div class="bg-body-secondary rounded-3 p-4">
                                        <div class="d-flex justify-content-between text-xs text-muted">
                                            <span class="fw-semibold">Amount in Crypto</span> 
                                            <span><span id="amount-in-crypto-crypto"></span>: <span id="amount-in-crypto-amount"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="text-center">
                Built by <a href="https://namibra.io">namibra.io</a>
            </div>
        </section>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://coderthemes.com/around/assets/vendor/parallax-js/dist/parallax.min.js"></script>
    <script src="https://coderthemes.com/around/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="https://coderthemes.com/around/assets/vendor/aos/dist/aos.js"></script>
    <script src="https://coderthemes.com/around/assets/js/theme.min.js"></script>

    <!-- jQuery + Inputmask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

    <script>
        // conver from fiat to crypto
        async function convertToCrypto(amountUSD, cryptoSymbol, fiatSymbol = "USD") {
            
            try {
                $('#amount-in-crypto-amount').text('Converting ...');
                // **NEW:** Make the request to your PHP endpoint
                let response = await fetch('convert-to-crypto.php?amount=' + amountUSD + '&symbol=' + cryptoSymbol + '&convert=' + fiatSymbol, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                });
                let data = await response.json();

                if (data.status.error_code == 0) {
                    let cryptoAmount = data.data[cryptoSymbol].quote[fiatSymbol].price;
                    cryptoAmount = amountUSD / cryptoAmount
                    cryptoAmount = cryptoAmount.toFixed(8);
                    return cryptoAmount;

                } else {
                    $('#amount-in-crypto-amount').text(data.status.error_message);
                    console.error("Failed to fetch:", data.status.error_message);
                }

            } catch (error) {
                $('#amount-in-crypto-amount').text("Failed to convert, please refresh page and try again.");
                console.error("Failed to fetch:", error);
            }
        }


        $(document).ready(function() {

            var crypto_id
            var crypto_symbol
            var crypto_name
            var crypto_amount
            var crypto_logo

            $('#send_amount').on('input', function(e) {
                e.preventDefault();

                var send_amount = $('#send_amount').val()
                var coin = $("#to_crypto_details_default").val();
                var crypto = $("#to_cypto").val(coin);

                coin = coin.split("/");
                crypto_symbol = coin[1];
                crypto_name = coin[2];
                convertToCrypto(send_amount, crypto_symbol, "USD").then(conversionValue => {
                    if (
                        conversionValue == NaN || 
                        conversionValue == undefined || 
                        conversionValue == null || 
                        conversionValue <= 0 || 
                        conversionValue == Infinity
                    ) {
                        $('#amount-in-crypto-amount').text('Failed to convert, please refresh page and try again.');
                        $('#next-1').attr('disabled', true);
                    } else {
                        $('#amount-in-crypto-amount').text(conversionValue + ' ' + crypto_symbol);
                        $('#next-1').attr('disabled', false);
                    }
                });
                $('#amount-in-crypto-crypto').text(crypto_name);
            })


            // get selected crypto
            $("#list-crypto").on("click", "li", (function() {
                var send_amount = $('#send_amount').val()
                var coin = $(this).find("#to_crypto_details").val();
                $('#to_crypto_details_default').val(coin)
                var crypto = $("#to_cypto").val(coin);
                coin = coin.split("/");

                crypto_id = coin[0];
                crypto_symbol = coin[1];
                crypto_name = coin[2]
                crypto_amount = coin[3];
                crypto_logo = 'https://s2.coinmarketcap.com/static/img/coins/64x64/' + coin[0] + '.png';

                $('#preview-symbol').text(crypto_symbol);
                $('#preview-symbol-selected').text(crypto_symbol)
                $('#preview-amount').text(crypto_amount);
                $('#preview-logo').attr('src', crypto_logo);

                convertToCrypto(send_amount, crypto_symbol, "USD").then(conversionValue => {
                    if (
                        conversionValue == NaN || 
                        conversionValue == undefined || 
                        conversionValue == null || 
                        conversionValue <= 0 || 
                        conversionValue == Infinity
                    ) {
                        $('#amount-in-crypto-amount').text('Failed to convert, please refresh page and try again.');
                        $('#next-1').attr('disabled', true);
                    } else {
                        $('#amount-in-crypto-amount').text(conversionValue + ' ' + crypto_symbol);
                        $('#next-1').attr('disabled', false);
                    }
                });
                $('#amount-in-crypto-crypto').text(crypto_name);
            }));




            // Activate input mask for phone
            $('#phone').inputmask();

            // Handle form submission
            $('#signin-button').on('click', function() {
                const email = $('#email').val().trim();
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

                if (!phone) {
                    $('#phone').focus()
                    messageBox.html('<div class="alert alert-danger">Please enter your phone number.</div>');
                    return;
                }

                // phone: require at least 10 digits (strip mask chars)
                const digits = phone.replace(/\D/g, '');
                if (digits.length < 10) {
                    $('#phone').focus()
                    return $msg.html('<div class="alert alert-danger">Please enter a valid phone number.</div>');
                }

                // Disable button and show loading text
                button.prop('disabled', true).html('Submitting... ⏳');
                messageBox.html('');

                // Simulate short delay before sending
                setTimeout(function() {
                    $.ajax({
                        url: 'waitlist.php', // your PHP file to handle form
                        type: 'POST',
                        data: { email: email, phone: phone },
                            success: function(response) {
                            messageBox.html('<div class="alert alert-success">Thank you! You have been added to the waitlist.</div>');
                            button.html('Submitted ✅');
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
</body>
</html>