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
</head>
<body >


    
      <!-- Gallery -->
      <section class="container py-5 my-lg-3 my-xl-4 my-xxl-5">
        <!-- <div class="text-center pt-sm-2 pt-md-4 pt-lg-3 pt-xl-4 pb-3 mx-auto mb-3 mb-lg-4" style="max-width: 720px;">
          <h2 class="h1 pt-1 pt-sm-2">Take another look at Around Max</h2>
          <p class="mb-0">Turpis nullam netus sed aliquam consectetur at felis consequat tincidunt orci varius arcu urna neque eget maecenas consequat lacus habitasse adipiscing.</p>
        </div> -->
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