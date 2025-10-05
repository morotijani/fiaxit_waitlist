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
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <link href="https://coderthemes.com/around/assets/vendor/aos/dist/aos.css" rel="stylesheet" type="text/css">
    <link href="https://coderthemes.com/around/assets/icons/around-icons.min.css" rel="stylesheet" type="text/css">
    <link href="https://coderthemes.com/around/assets/css/theme.min.css" rel="stylesheet" type="text/css">
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
                    <div class="card border-0 h-100 bg-size-cover bg-position-top-center" style="min-height: 280px; background-image: url(new.jpg);">
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
                                                                                <span id="preview-symbol-selected"><?= $coin_data['data'][0]['symbol']; ?></span> 
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
                                <div class="position-relative text-center my-n4 overlap-10" style="margin-top: -1rem !important; margin-bottom: -1rem !important;">
                                    <div class="icon icon-sm icon-shape bg-body shadow-soft-3 rounded-circle text-sm text-body-tertiary" style="box-shadow: 0 9px 9px -1px rgba(10,22,70,.04)!important">
                                        <span class="material-symbols-outlined">swap_vert</span>
                                    </div>
                                </div>
                                <div class="bg-body-secondary rounded-3 p-4">
                                    <div class="d-flex justify-content-between text-xs text-muted">
                                        <span class="fw-semibold">Volume</span> <span class="volumeMsg">...</span>
                                    </div>
                                    <div class="d-flex justify-content-between gap-2 mt-4">
                                        <input type="number" inputmode="numeric" class="form-control form-control-flush fw-bold text-xl flex-fill" placeholder="0.00" id="volume-amount" name="volume-amount" required autocomplete="off" min="0.00" step="0.01"> <button class="btn btn-outline-light shadow-none rounded-pill flex-none d-flex align-items-center gap-2 py-2 ps-2 pe-4" type="button"><img src="assets/media/volume.png" class="w-rem-6 h-rem-6 rounded-circle" alt="..."> <span class="text-xs text-heading ms-1">VLM</span>&nbsp;</button>
                                    </div>
                                </div>
                            </div>
          </div>
            </div>
          </div>
          <div class="col-md-7 col-lg-8 order-md-2">
            <div class="card border-0 bg-secondary h-100 px-xl-4 pb-sm-2 pb-xl-4">
              <img class="d-block mx-auto" src="logo.png" width="100" alt="Image">
              <div class="card-body">
                <h1 class="display-5">Exchange your crypto asset instantly, securely and seemslessly</h1>
                <p class="card-text">Be the first to experience seemsless, secure crypto asset exchange at a speed of light</p>
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

                </form>                <p class="text-center text-body-warning mb-0">✌️ No Spam — We Promise!</p>

              </div>
            </div>
          </div>
          
         
        </div>
      </section>


      <!-- Features -->
      <section class="bg-secondary py-5">
        <div class="container mt-1 py-md-2 py-lg-4 py-xxl-5">
          <h2 class="h1 text-center pt-1 pt-sm-4">Take your data to the next level</h2>
          <p class="text-center mx-auto pb-3 mb-3 mb-lg-4" style="max-width: 480px;">Using basic data skills you can analysis and improve your business indicators with Around</p>
          <div class="row g-4 pb-2 pb-sm-4 mb-sm-2">

            <!-- Item -->
            <div class="col-md-5">
              <div class="card border-0 h-100">
                <div class="card-body">
                  <a href="#">
                    <img class="d-dark-mode-none" src="assets/img/landing/saas-2/features/01-light.png" alt="Image">
                    <img class="d-none d-dark-mode-block" src="assets/img/landing/saas-2/features/01-dark.png" alt="Image">
                  </a>
                  <div class="pt-3 mt-2 mt-lg-3">
                    <h3>Simple control panel</h3>
                    <p class="mb-0">Dashboard is to present analytical data in a compact form on one page for easy to interpret.</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="col-md-7">
              <div class="card border-0 h-100">
                <div class="card-body overflow-hidden">
                  <div class="d-sm-flex align-items-center">
                    <a class="d-block order-sm-2 flex-shrink-0 mt-n4 mb-n2" href="#">
                      <img src="assets/img/landing/saas-2/features/02.png" width="308" alt="Image">
                    </a>
                    <div class="order-sm-1 pe-sm-3 me-xl-4">
                      <h3>Segmentation by various methods</h3>
                      <p class="pb-3 mb-1 mb-xl-3">Segmentation allows you to divide users according to a given criterion, and then for each of the groups to develop an advertisement and product.</p>
                      <a class="btn btn-link p-0" href="#">
                        Learn more
                        <i class="ai-arrow-right ms-2"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
            </section>
            





      <!-- Pricing -->
      <section class="w-100 px-sm-4 mx-auto" style="max-width: 1680px;">
        <div class="position-relative z-2 pt-3 pt-md-4 py-lg-5">
          <div class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-sm-block" style="background-color: #171a1e;"></div>
          <div class="position-absolute top-0 start-0 w-100 h-100 d-sm-none" style="background-color: #171a1e;"></div>
          <svg class="d-none d-sm-block position-absolute end-0 text-primary me-n4" width="230" height="27" viewBox="0 0 230 27" fill="none" xmlns="http://www.w3.org/2000/svg" style="bottom: 7rem;">
            <path d="M222.189 11.9175C220.042 12.3471 217.891 12.7689 215.761 13.2705C213.352 13.8373 210.928 14.3707 208.55 15.053C205.726 15.8647 202.916 16.7199 200.109 17.5844C198.081 18.2078 196.1 18.966 194.072 19.5925C193.025 19.9158 191.962 20.1554 190.891 20.381C190.067 20.5555 189.257 20.771 188.429 20.9137C188.171 20.9346 187.916 20.9431 187.659 20.9354C187.752 20.5888 187.872 20.25 187.969 19.9011C188.066 19.5483 188.164 19.1948 188.262 18.842C188.57 17.724 188.912 16.6153 189.189 15.4895C189.372 14.7405 189.532 13.9768 189.651 13.2154C189.716 12.8076 189.753 12.4099 189.763 11.9982C189.772 11.6206 189.685 11.2353 189.628 10.8639C189.527 10.2087 189.26 9.55125 188.898 8.99844C188.684 8.67048 188.408 8.38904 188.08 8.17272C187.721 7.93547 187.317 7.7804 186.902 7.66953C186.558 7.57727 186.18 7.56099 185.827 7.52842C185.489 7.49663 185.147 7.52067 184.81 7.54005C183.938 7.59122 183.093 7.87732 182.265 8.1324C181.631 8.32778 180.994 8.51076 180.359 8.70227C179.264 9.03178 178.163 9.34346 177.076 9.70089C174.752 10.4646 172.415 11.1973 170.105 12.0044C167.257 13.0007 164.408 13.9962 161.56 14.9925C158.926 15.9144 156.286 16.8323 153.621 17.6581C151.981 18.1675 150.317 18.6009 148.66 19.0467C146.996 19.4956 145.322 19.8918 143.618 20.1469C141.882 20.3461 140.109 20.4531 138.367 20.2849C137.832 20.1926 137.317 20.0655 136.808 19.8825C136.484 19.7181 136.179 19.5375 135.88 19.3343C135.643 19.1327 135.422 18.9211 135.209 18.6908C135.14 18.5861 135.077 18.4807 135.017 18.3698C134.862 17.8759 134.759 17.3735 134.678 16.8641C134.613 15.95 134.623 15.0297 134.606 14.1125C134.59 13.2635 134.574 12.4153 134.558 11.5663C134.533 10.2746 134.51 8.97441 134.339 7.69202C134.117 6.0429 133.768 4.3209 132.863 2.89817C132.651 2.56556 132.363 2.25077 132.101 1.95925C131.828 1.65687 131.486 1.39636 131.159 1.15679C130.533 0.697794 129.863 0.362853 129.112 0.156616C128.742 0.0558235 128.333 0.0410923 127.952 0.0108546C127.87 0.00232598 127.788 0 127.706 0C127.426 0 127.144 0.0310131 126.868 0.0558235C125.932 0.139559 124.994 0.303153 124.087 0.538077C123.249 0.755168 122.438 1.0777 121.626 1.3731C120.824 1.66618 120.015 1.94452 119.216 2.24457C117.48 2.89895 115.773 3.63086 114.08 4.38525C112.497 5.09002 110.938 5.84984 109.387 6.62594C108.522 7.05935 107.651 7.48811 106.803 7.95563C105.515 8.66505 104.228 9.3737 102.94 10.0816C100.975 11.1632 99.0083 12.2416 97.047 13.3286C94.8393 14.5529 92.6315 15.7771 90.4253 17.0014C87.6672 18.5295 84.8671 19.9957 81.9674 21.2409C80.806 21.7161 79.6322 22.1588 78.4498 22.5775C77.2837 22.9915 76.0951 23.3187 74.8754 23.5203C73.9223 23.6281 72.9739 23.6824 72.0162 23.6033C71.7076 23.5467 71.4106 23.4738 71.1129 23.3753C70.924 23.2761 70.7483 23.1691 70.5734 23.0497C70.3573 22.8528 70.1606 22.6519 69.9701 22.4325C69.9196 22.3565 69.8722 22.279 69.8287 22.1984C69.6398 21.6448 69.5332 21.0726 69.4384 20.495C69.3506 19.6491 69.3094 18.797 69.248 17.9488C69.1881 17.1122 69.1282 16.2772 69.0692 15.4422C68.9743 14.1055 68.8305 12.7611 68.5903 11.4438C68.4511 10.6856 68.1977 9.94124 67.9521 9.21243C67.6745 8.39136 67.3169 7.58967 66.8777 6.84381C66.5015 6.20727 65.9814 5.64283 65.4497 5.13499C64.89 4.60001 64.2269 4.15032 63.5653 3.75336C62.9084 3.35872 62.1645 3.0796 61.4353 2.85475C60.5382 2.57951 59.5626 2.49578 58.6313 2.42522C54.9823 2.1461 51.3527 2.91445 47.8063 3.67272C44.1806 4.44727 40.6109 5.47148 37.0629 6.54143C35.4584 7.02524 33.8399 7.485 32.2603 8.04324C29.7338 8.93797 27.2221 9.87146 24.7181 10.8282C20.5957 12.4037 16.4997 14.052 12.4301 15.7577C11.3363 16.2167 10.2433 16.6781 9.15346 17.1456C8.16308 17.5697 7.18825 18.0372 6.21264 18.497C4.12926 19.4816 2.06765 20.512 0.00215939 21.5316C-0.00250489 21.5339 0.00138201 21.5401 0.00449152 21.5386C3.77944 20.4578 7.52252 19.2762 11.3037 18.2225C14.3502 17.3743 17.3859 16.4912 20.4122 15.5755C23.7573 14.563 27.0899 13.5054 30.4062 12.3998C31.3632 12.0796 32.3178 11.7547 33.2724 11.4252C34.9741 10.8367 36.7007 10.3095 38.4194 9.77144C40.9669 8.97131 43.5292 8.21691 46.1155 7.54626C47.4059 7.21209 48.7065 6.91746 50.0071 6.62439C51.418 6.30651 52.832 6.01033 54.264 5.79402C56.0364 5.5777 57.8306 5.5149 59.6077 5.70485C60.2265 5.80952 60.8181 5.95684 61.4026 6.1778C61.9072 6.42513 62.3783 6.70425 62.8377 7.02601C63.2287 7.34777 63.5886 7.68892 63.926 8.0696C64.2424 8.51929 64.5005 8.99069 64.729 9.49155C65.1698 10.6266 65.5064 11.7857 65.7016 12.9883C65.9223 14.7971 66.0257 16.6145 66.1447 18.4318C66.168 18.7931 66.1882 19.1537 66.2045 19.515C66.2411 20.3174 66.3336 21.1044 66.4611 21.8968C66.5186 22.2565 66.5885 22.6062 66.6803 22.959C66.7728 23.3141 66.9508 23.6529 67.1156 23.9778C67.2866 24.315 67.5758 24.6143 67.8075 24.9089C67.9762 25.1066 68.1573 25.2896 68.3547 25.4602C68.5646 25.6269 68.7753 25.7928 68.9891 25.9556C69.6172 26.3658 70.2912 26.6286 71.0212 26.7968C71.7628 26.9674 72.5471 26.9992 73.3035 27C75.0814 27.0031 76.8461 26.641 78.5384 26.1285C79.3616 25.8789 80.1709 25.5749 80.9778 25.2749C81.7917 24.9709 82.601 24.6569 83.4009 24.3197C85.1485 23.58 86.8463 22.745 88.5355 21.8844C89.2725 21.5083 90.0156 21.1424 90.7386 20.74C91.2633 20.4477 91.7881 20.1546 92.3128 19.8615C93.8854 18.9847 95.4588 18.107 97.0315 17.2285C98.8513 16.2136 100.673 15.1995 102.495 14.1877C104.41 13.1247 106.324 12.0618 108.24 10.9988C109.174 10.4801 110.129 10.0009 111.082 9.51791C113.171 8.45959 115.287 7.45399 117.442 6.53678C118.851 5.95296 120.273 5.40558 121.713 4.90084C123.134 4.40463 124.561 3.88439 126.048 3.63241C126.71 3.5603 127.364 3.51301 128.029 3.5634C128.124 3.58356 128.218 3.60837 128.31 3.63783C128.508 3.73785 128.695 3.8464 128.884 3.9689C129.133 4.18366 129.362 4.40851 129.58 4.65584C129.709 4.84812 129.824 5.04117 129.933 5.24819C130.254 6.12896 130.424 7.0485 130.575 7.97424C130.701 9.16591 130.708 10.3684 130.715 11.5655C130.722 12.4145 130.726 13.2627 130.732 14.1117C130.738 15.0599 130.707 16.0113 130.762 16.9572C130.787 17.382 130.87 17.8108 130.935 18.2318C130.99 18.5869 131.062 18.9335 131.148 19.2832C131.243 19.6724 131.432 20.0368 131.588 20.4035C131.689 20.6043 131.812 20.7912 131.957 20.9641C132.125 21.1967 132.306 21.4184 132.496 21.6324C132.732 21.9069 133.02 22.1356 133.3 22.3635C133.623 22.6256 133.959 22.8621 134.31 23.0892C134.606 23.28 134.929 23.4195 135.254 23.5568C135.654 23.7265 136.037 23.8677 136.454 23.9863C137.244 24.2127 138.098 24.2832 138.914 24.3476C139.846 24.4212 140.789 24.3708 141.721 24.3181C143.434 24.2212 145.129 23.9653 146.805 23.6009C148.617 23.2063 150.395 22.6651 152.18 22.1666C155.65 21.1974 159.015 19.8972 162.406 18.6939C163.444 18.3248 164.472 17.9287 165.504 17.5472C167.832 16.6866 170.151 15.7996 172.493 14.9793C174.429 14.3009 176.363 13.614 178.301 12.9449C179.214 12.6308 180.144 12.3641 181.064 12.0749C181.561 11.9183 182.058 11.7617 182.555 11.6051C183.335 11.3585 184.124 11.1128 184.93 10.9647C185.242 10.9538 185.544 10.9623 185.851 10.9895C185.901 11.0003 185.953 11.012 186.002 11.0251C186.062 11.2236 186.111 11.4198 186.152 11.6214C186.171 11.9036 186.168 12.1781 186.146 12.4603C185.86 14.0055 185.405 15.5158 184.917 17.0091C184.666 17.7736 184.435 18.5474 184.152 19.301C184.058 19.5251 183.966 19.7491 183.878 19.9755C183.735 20.3399 183.725 20.7485 183.702 21.1339C183.726 21.3083 183.749 21.482 183.772 21.6557C183.792 21.8627 183.835 22.0635 183.904 22.2596C184.005 22.6302 184.199 22.9908 184.382 23.3265C184.441 23.4056 184.502 23.4839 184.562 23.5622C184.694 23.7948 184.868 23.9871 185.084 24.139C185.443 24.4336 185.789 24.6376 186.236 24.7794C187.017 25.026 187.829 25.0648 188.641 24.9934C189.421 24.926 190.195 24.7694 190.959 24.6058C191.687 24.4492 192.417 24.3042 193.143 24.1445C194.933 23.7483 196.672 23.1303 198.388 22.4953C201.708 21.268 205.011 20.0003 208.295 18.6807C212.84 16.8541 217.432 15.1476 222.014 13.4124C223.197 12.965 224.379 12.5169 225.562 12.0742C227.036 11.5214 228.503 10.9468 229.997 10.4506C230.002 10.4491 230 10.4429 229.995 10.4437C227.381 10.8398 224.784 11.3989 222.189 11.9175ZM185.842 10.9275C185.894 10.9453 185.945 10.9662 185.994 10.9895C185.994 10.9895 185.995 10.991 185.995 10.9918C185.943 10.9701 185.893 10.9484 185.842 10.9275ZM187.683 21.0129C187.682 21.0106 187.681 21.009 187.68 21.0067C187.723 21.0245 187.766 21.0424 187.808 21.0602C187.766 21.0462 187.724 21.0307 187.683 21.0129Z" fill="currentColor"></path>
          </svg>
          <div class="container position-relative z-2 pt-5 pb-4 pb-md-5 my-xl-3 my-xxl-4">
            <div class="row justify-content-center py-xxl-2">
              <div class="col-lg-8 col-xxl-7">
                <div class="card h-100 border-0 bg-transparent px-xl-4">
                  <div class="bg-light position-absolute top-0 start-0 w-100 h-100 rounded-4" data-aos="zoom-in" data-aos-duration="600" data-aos-offset="300" data-disable-parallax-down="lg"></div>
                  <div class="position-absolute top-0 start-0 text-warning z-1 mt-n3 ms-n4" data-aos="zoom-in" data-aos-duration="400" data-aos-delay="600" data-aos-offset="300" data-aos-easing="ease-out-back" data-disable-parallax-down="lg">
                    <svg width="109" height="80" viewBox="0 0 109 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M15.8683 75.7302C16.2569 75.4191 16.6217 75.0491 17.0377 74.7951C17.4254 74.5572 17.8115 74.3169 18.1985 74.0793C20.3199 72.7747 22.4054 71.3943 24.603 70.2517C26.9011 69.0568 29.1665 67.7889 31.5071 66.685C33.8966 65.56 36.279 64.4217 38.6941 63.3532C43.4024 61.2723 48.1059 59.183 52.7956 57.0638C57.4545 54.9602 62.0996 52.8266 66.7072 50.6118C68.9933 49.5118 71.2155 48.27 73.4522 47.0639C75.6499 45.8818 77.7997 44.6021 79.9333 43.2844C80.4024 42.9952 80.844 42.6475 81.2974 42.3262C81.7449 42.0076 82.2023 41.7071 82.6368 41.3612C83.752 40.4723 84.8555 39.563 85.9422 38.6175C87.8325 36.9663 89.6174 35.106 91.56 33.561C93.5954 31.9429 95.7477 30.565 97.8333 29.0496C98.7748 28.3667 99.6989 27.6296 100.519 26.7024C101.459 25.6459 102.338 24.4868 103.144 23.1751C103.922 21.9064 104.691 20.6181 105.476 19.3629C105.853 18.76 106.247 18.1871 106.676 17.6831C107.161 17.1122 107.636 16.5365 108.05 15.8316C108.249 15.4914 107.727 14.2085 107.354 13.401C107.143 12.9404 106.914 12.5046 106.669 12.0933C106.458 11.7493 106.1 11.2098 105.957 11.295C104.913 11.9208 103.87 12.5474 102.848 13.2205C101.816 13.8981 100.753 14.5128 99.6667 15.0746C97.555 16.1624 95.2861 16.9194 93.0008 17.6249C93.2944 17.2969 93.5881 16.9689 93.8812 16.6396C94.9335 15.4568 95.9143 14.1281 97.0601 13.1296C97.6691 12.597 98.2967 12.0983 98.8767 11.5078C99.1714 11.2096 99.4533 10.8916 99.7009 10.5014C99.9664 10.0818 100.185 9.57471 100.402 9.06813C100.503 8.97177 100.504 8.73771 100.41 8.37039C100.295 7.83489 100.046 7.16165 99.7775 6.53036C99.9828 5.98539 99.234 4.16279 98.7386 3.08895C98.4342 2.42283 98.1036 1.79151 97.747 1.19642C97.4274 0.675268 96.9419 -0.0498749 96.7193 0.0437384C95.5563 0.530174 94.2994 0.808209 93.1347 1.29089C93 1.34849 92.8647 1.40787 92.7305 1.46975C91.7462 1.92379 90.8278 2.5157 89.9231 3.13921C87.9077 4.52825 85.9265 5.99248 83.9739 7.51171C83.0652 8.21592 82.1781 8.96318 81.2519 9.6315C80.1183 10.447 78.9609 11.2038 77.7869 11.9348C75.8222 13.1564 73.7809 14.2208 71.7516 15.3054C69.4256 16.5527 67.1292 17.8561 64.9062 19.3197C62.8474 20.6756 60.8418 22.142 58.8267 23.5885C56.8017 25.0381 54.7759 26.485 52.7538 27.9408C50.6809 29.4321 48.5541 30.8104 46.4273 32.1886C45.3517 32.8879 44.2198 33.4692 43.1155 34.1074C42.0703 34.7109 40.9894 35.2413 39.9209 35.7963C37.8177 36.8893 35.6969 37.9433 33.5799 39.0063C29.3084 41.1479 25.0779 43.3753 20.8484 45.6067C18.5249 46.8331 16.2086 48.0729 13.8926 49.3156C12.7115 49.9498 11.5669 50.6643 10.405 51.3382C9.41101 51.9135 8.47733 52.6186 7.51828 53.2686C6.49754 53.9608 5.48545 54.6718 4.47509 55.3865C3.87475 55.812 3.27536 56.2416 2.67425 56.6674C2.4143 56.854 2.15243 57.0385 1.89171 57.2255C1.65401 57.3943 1.42227 57.577 1.19188 57.7606C1.02745 57.891 0.885144 58.0612 0.748409 58.2456C0.595606 58.448 0.52873 58.8336 0.431907 59.136C0.453931 59.4897 0.548042 59.9072 0.717128 60.3916C0.933192 61.0318 1.19058 61.6742 1.49102 62.3194C1.7874 62.968 2.10896 63.5808 2.4557 64.1607C2.59737 64.3743 2.73904 64.5879 2.88013 64.8003C3.11501 65.1346 3.30719 65.2961 3.45553 65.2823C3.77742 65.3855 4.09468 65.4878 4.38373 65.5045C4.48978 65.401 4.49283 65.1525 4.39113 64.7582C4.36494 64.6354 4.3322 64.5065 4.29387 64.3725C4.41065 64.3065 4.53301 64.2516 4.65479 64.1954C4.77116 64.1418 4.88676 64.0854 4.99948 64.0228C5.25373 63.8828 5.50604 63.7406 5.75933 63.5995C6.41187 63.2364 7.06383 62.872 7.71637 62.5088C8.42304 62.1146 9.13606 61.7342 9.84927 61.3551C9.7833 61.4113 9.71771 61.4674 9.65059 61.5211C8.12079 62.7543 6.59331 63.9896 5.09332 65.2834C4.85973 65.5139 4.85507 66.0618 5.07702 66.9282C5.30146 67.983 5.75153 69.2687 6.26345 70.532C5.95554 70.6634 5.64609 70.7925 5.33875 70.9252C5.1242 71.0181 5.63429 72.2337 5.84649 72.6938C6.06216 73.1613 6.6448 74.3146 6.86167 74.2237C7.15682 74.0982 7.45582 73.9799 7.75271 73.8582C8.25702 74.8854 8.79078 75.8718 9.35649 76.8176C9.66755 77.2866 9.97861 77.7557 10.2891 78.2234C10.8037 78.9548 11.2239 79.3068 11.5509 79.2787C12.9704 78.0554 14.4178 76.8905 15.8683 75.7302Z" fill="currentColor"></path>
                    </svg>
                  </div>
                  <div class="position-relative z-2" data-aos="fade-up" data-aos-duration="500" data-aos-offset="280" data-disable-parallax-down="lg">
                    <div class="card-body pb-lg-5">
                      <h2>Get the full power of the pack</h2>
                      <p class="fs-xl text-dark pb-2 pb-sm-3 pb-lg-4">See what's inside</p>
                      <div class="row row-cols-1 row-cols-sm-2">
                        <ul class="col list-unstyled pb-1 pb-sm-0 mb-2 mb-sm-0">
                          <li class="d-flex pb-1 mb-2">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Viverra adipiscing ullamcorper
                          </li>
                          <li class="d-flex pb-1 mb-2">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Et purus quis laoreet ipsum
                          </li>
                          <li class="d-flex pb-1 mb-2">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Massa non sagittis erat sit
                          </li>
                          <li class="d-flex pb-1 mb-2">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Ac dui leo adipiscing
                          </li>
                          <li class="d-flex">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Ipsum sapien et a dolor viverra
                          </li>
                        </ul>
                        <ul class="col list-unstyled mb-0">
                          <li class="d-flex pb-1 mb-2">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Et purus quis laoreet ipsum
                          </li>
                          <li class="d-flex pb-1 mb-2">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Placerat lorem elit purus
                          </li>
                          <li class="d-flex">
                            <i class="ai-check text-success fs-lg mt-1 me-2"></i>
                            Massa non sagittis erat sit
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-body pt-0">
                      <a class="btn btn-lg btn-primary" href="#">Buy for $10</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 offset-xxl-1">
                <div class="card h-100 border-0 bg-transparent rounded-0 ps-4 ps-xxl-0">
                  <div class="card-body px-0 pb-lg-5">
                    <h2 class="text-light">Try a <span class="text-warning">free demo</span></h2>
                    <p class="fs-xl text-light pb-2 pb-sm-3 pb-lg-4">See what's inside</p>
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex pb-1 mb-2">
                        <i class="ai-check text-warning fs-lg mt-1 me-2"></i>
                        <span class="text-light opacity-70">Viverra adipiscing ullamcorper</span>
                      </li>
                      <li class="d-flex pb-1 mb-2">
                        <i class="ai-check text-warning fs-lg mt-1 me-2"></i>
                        <span class="text-light opacity-70">Et purus quis laoreet ipsum</span>
                      </li>
                      <li class="d-flex pb-1 mb-2">
                        <i class="ai-check text-warning fs-lg mt-1 me-2"></i>
                        <span class="text-light opacity-70">Massa non sagittis erat sit</span>
                      </li>
                      <li class="d-flex pb-1 mb-2">
                        <i class="ai-check text-warning fs-lg mt-1 me-2"></i>
                        <span class="text-light opacity-70">Et purus quis laoreet ipsum</span>
                      </li>
                      <li class="d-flex">
                        <i class="ai-check text-warning fs-lg mt-1 me-2"></i>
                        <span class="text-light opacity-70">Massa non sagittis erat sit</span>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body px-0 pt-0" style="flex: 0;"><a class="btn btn-lg btn-light" href="#">Try for free</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>























    <section class="container-fluid py-5 mt-4 px-sm-4 px-md-5">
        <div class="bg-dark rounded-5 position-relative overflow-hidden py-5 px-3 px-sm-4 px-xl-5 mt-2 mx-md-n3 mx-lg-auto" style="max-width: 1660px;" data-bs-theme="dark">
          <div class="jarallax position-absolute top-0 start-0 w-100 h-100 mt-5" data-jarallax="" data-speed="0.6">
            
          <div id="jarallax-container-0" class="jarallax-container" style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);"><div class="jarallax-img position-absolute w-100 h-100" style="background-image: url(&quot;assets/img/landing/web-studio/hero-wave.png&quot;); object-fit: cover; object-position: 50% 50%; max-width: none; position: absolute; top: 0px; left: 0px; width: 1003px; height: 679.834px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; margin-top: 119.583px; transform: translate3d(0px, -180.383px, 0px);" data-jarallax-original-styles="background-image: url(assets/img/landing/web-studio/hero-wave.png);"></div></div></div>
          <div class="bg-white position-absolute top-0 start-0 w-100 h-100" style="opacity: 2%;"></div>
          <div class="container position-relative z-2 pt-xl-4 pt-xxl-5 pb-sm-2">
            <div class="row pt-md-3 pt-lg-5">
              <div class="col-lg-6 col-xxl-5 pb-lg-5 mb-xl-5">
                <h1 class="display-1 text-center text-lg-start mb-xxl-5">Web studio of effective <span class="text-primary">development</span></h1>
              </div>
              <div class="col-lg-5 col-xl-4 offset-lg-1 offset-xxl-2 d-flex flex-column pt-2 pt-md-4">
                <p class="text-body fs-xl text-center text-lg-start pb-2 pb-md-0 mb-4 mb-md-5">We build websites, tools and applications that offer beautiful web presence and ultimate user experience.</p>
                <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center justify-content-lg-start pb-3 pb-sm-5"><a class="btn btn-lg btn-primary rounded-pill w-100 w-sm-auto me-sm-3 me-xl-4 mb-2 mb-sm-0" href="#">Let's partner</a><a class="btn btn-lg btn-link text-white w-100 w-sm-auto px-2" href="portfolio-list-v2.html">View Case Studies<i class="ai-arrow-right ms-2"></i></a></div>
                <ul class="list-inline d-xl-flex text-center text-lg-start mt-auto mb-0 mb-sm-2">
                  <li class="d-inline-flex align-items-center text-body text-nowrap pt-1 me-4">
                    <i class="ai-check-alt text-primary fs-xl me-2"></i>
                    Full spectrum of services
                  </li>
                  <li class="d-inline-flex align-items-center text-body text-nowrap pt-1">
                    <i class="ai-check-alt text-primary fs-xl me-2"></i>
                    Flexible work terms
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>



    
    <!-- Page content -->
    <main class="page-wrapper">
        <div class="d-flex flex-column flex-lg-row justify-content-between min-vh-100 position-relative">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-lg-none">
                <div class="d-dark-mode-none position-absolute top-0 start-0 w-100 h-100" style="background-color: #f2f3f7;"></div>
            </div>
            <div class="d-flex flex-column justify-content-center w-lg-50 position-relative z-2 mt-auto mt-lg-0">
                <div class="text-center text-lg-start pt-5 pb-3 py-lg-5 px-3 px-sm-4 px-lg-5 mx-auto" style="max-width: 630px;">
                    <h1 class="display-1">Error 404</h1>
                    <p class="lead pb-2 mb-4 mb-lg-5">The page you are looking for was moved, removed or might never existed.</p>
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

                </form>                <p class="text-center text-body-warning mb-0">✌️ No Spam — We Promise!</p>

                    <a class="btn btn-lg btn-primary" href="index.html">Go to homepage</a>
                </div>
            </div>
            <div class="d-flex flex-column position-relative justify-content-end align-items-center w-lg-50 overflow-hidden">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-lg-block">
                    <div class="d-dark-mode-none position-absolute top-0 start-0 w-100 h-100" style="background-color: #f2f3f7;"></div>
                    <div class="d-none d-dark-mode-block position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(255,255,255, .04);"></div>
                </div>
                <div class="position-relative z-2" style="max-width: 948px;">
                    <img src="new.jpg" alt="Lady" id="lady">
                    <img class="position-absolute top-0 start-0 w-100 h-100" src="layer02-light.png" alt="Bubble" id="bubble">
                    <div class="position-absolute top-0 start-0 w-100 h-100" id="question">
                        <img class="d-dark-mode-none" src="layer03-light.png" alt="Question mark">
                        <img class="d-none d-dark-mode-block" src="layer03-dark.png" alt="Question mark">
                    </div>
                </div>
            </div>
        </div>
    </main>












    <section class="bg-primary bg-opacity-10 d-flex  py-5">
        <div class="container d-flex justify-content-center pb-sm-3 py-md-4 py-xl-5">
            <div class="row align-items-center pt-5 mt-4 mt-xxl-0">

                <!-- Video + Parallax -->
                <div class="col-lg-6 mb-4 mb-lg-0 pb-3 pb-lg-0">
                    <div class="parallax mx-auto mx-lg-0" style="max-width: 582px;">
                        <div class="parallax-layer z-3" data-depth="0.1">
                            <div class="position-relative bg-dark mx-auto" style="max-width: 61%; padding: .3125rem; margin-bottom: 9.9%; border-radius: calc(var(--ar-border-radius) * 2.125);">
                                <div class="position-absolute start-50 translate-middle-x" style="top: 4.4%; width: 85%;">
                                    <div class="row row-cols-4 gx-2 mb-3">
                                        <div class="col">
                                            <div class="border-white border opacity-80"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border-white border opacity-80"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border-white border opacity-80"></div>
                                        </div>
                                        <div class="col position-relative">
                                            <div class="position-absolute top-0 start-0 w-100 border-white border opacity-30"></div>
                                        <div class="position-absolute top-0 start-0 w-50 border-white border opacity-80"></div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="logo.png" width="35" alt="Avatar">
                                    <div class="fs-xs ps-2">
                                        <span class="text-nav fw-bold me-1" style="color: #fff !important;">Fiaxit</span>
                                        <span class="text-body-secondary" style="color: #fff !important;">12 min</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-block w-100" style="border-radius: calc(var(--ar-border-radius) * 1.875);">
                                <img src="dd.png" style="border-radius: calc(var(--ar-border-radius) * 1.875);" />
                            </div>
                        </div>
                    </div>
                    <div class="parallax-layer" data-depth="0.3">
                        <img src="shape01.svg" alt="Background shape">
                    </div>
                    <div class="parallax-layer z-2" data-depth="-0.1">
                        <img src="shape02.svg" alt="Background shape">
                    </div>
                    <div class="parallax-layer" data-depth="-0.15">
                        <img src="shape03.svg" alt="Background shape">
                    </div>
                    <div class="parallax-layer z-2" data-depth="-0.25">
                        <img src="shape04.svg" alt="Background shape">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 pb-3 mb-4"><span class="fw-normal">waitlist</span> Your money; your way.</h1>
                <form class="mb-5" id="sigin-form" method="POST">
                    <div id="response-message"></div>
                    <div class="mb-4">
                        <label class="visually-hidden" for="email">Email Address</label>
                        <input class="form-control" id="email" type="email" placeholder="Enter your email address..." onfocus="" autocomplete="off" />
                    </div>
                    <div class="mb-4 phone">
                        <label class="visually-hidden" for="phone">Phone</label>
                        <input type="text" class="form-control mb-3" id="phone" placeholder="(___)___-____" data-inputmask="'mask': '(999)999-9999'">
                    </div>
                    
                    <div class="d-sm-flex justify-content-center justify-content-lg-start">
                        <button class="btn btn-lg btn-primary w-100 w-sm-auto mb-2 mb-sm-0 me-sm-1" id="signin-button" type="button">Join waitlist</button>
                    </div>

                </form>
                <p class="text-center text-body-warning mb-0">✌️ No Spam — We Promise!</p>
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
        $(document).ready(function() {
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