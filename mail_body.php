<?php 

$body = '
<html style="margin: 0; padding: 0;">
<head>
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style media="all" type="text/css"></style>
    <title>' . $title . '</title>
</head>
<body style="-ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; height: 100%; line-height: 1.5; margin: 0; padding: 0; width: 100%;">
    <table class="main" style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-bottom: 2rem; padding-top: 2rem; width: 100%;">
        <tr>
            <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;" valign="top"></td>
            <td class="container" style="box-sizing: border-box; display: block; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; margin: 0 auto; max-width: 600px; padding-left: 0.75rem; padding-right: 0.75rem; vertical-align: top; width: auto;" valign="top">
                <span class="visually-hidden" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; mso-hide: all; opacity: 0; overflow: hidden;  visibility: hidden; width: 0;">' . $topic . '</span>
                <table class="mb-6" cellpadding="0" cellspacing="0"
                style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; margin-bottom: 2rem; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                        <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;"
                        valign="top">
                            <a href="#" style="box-sizing: border-box; color: #0055ff; text-decoration: underline;">
                                <img src="https://yevgenysim-turkey.github.io/dashbrd/assets/img/emails/brand.png" width="40" height="40" alt="..."
                                style="-ms-interpolation-mode: bicubic; max-width: 100%;">
                            </a>
                        </td>
                    </tr>
                </table>

                <table cellpadding="0" cellspacing="0" style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                        <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;"
                        valign="top">
                            <table cellpadding="0" cellspacing="0" style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                <tr>
                                    <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;" valign="top">
                                        <h1 class="h2" style="color: #22252a; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 2rem; font-weight: 700; letter-spacing: -0.02em; line-height: 1.2; margin: 0 0 1.5rem;">' . $topic . '</h1>
                                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; font-weight: 400; line-height: 1.5; margin: 0 0 1.5rem;">' . $Body . '</p>
                                        <p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; font-weight: 400; line-height: 1.5; margin: 0 0 1.5rem;">
                                            <!-- <table class="btn btn-primary " cellpadding="0" cellspacing="0"
                                            style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                            <tr>
                                                <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;" valign="top">
                                                    <table cellpadding="0" cellspacing="0" style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                                        <tr>
                                                            <td style="background-color: #0055ff; border-radius: 0.5rem; box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; text-align: center; vertical-align: top;" align="center" bgcolor="#0055ff" valign="top">
                                                                <a href="#" style="background-color: #0055ff; border-radius: 0.5rem; box-sizing: border-box; color: white; cursor: pointer; display: inline-block; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; line-height: 1.5; margin: 0; padding: 0.75rem 1rem; text-decoration: none;">Confirm
                                                                email</a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table> -->
                                        </p>
                                        <p class="mb-0" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; font-weight: 400; line-height: 1.5; margin: 0 0 1.5rem; margin-bottom: 0;">If you didn\'t sign up, you can safely ignore this email.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                        <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;"
                            valign="top">
                            <table class="divider " cellpadding="0" cellspacing="0" style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; padding-bottom: 2rem; padding-top: 2rem; width: 100%;">
                                <tr>
                                    <td class="border-style-" style="border-top: 1px solid #e9eaed; box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 0; height: 1px; line-height: 0; margin: 0; padding: 0; vertical-align: top;"
                                    valign="top"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" style="border-collapse: separate; border-spacing: 0; box-sizing: border-box; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                        <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;"
                            valign="top">
                            <p class="fs-sm text-body-secondary" style="color: #676f7e; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 0.875rem; font-weight: 400; line-height: 1.5; margin: 0 0 1.5rem;">
                                You\'re receiving this email because you signed up for updates. If you no
                                longer wish to receive these emails, you can <a href="#" style="box-sizing: border-box; color: #0055ff; text-decoration: underline;">unsubscribe here</a>.
                            </p>
                            <p class="fs-sm text-body-secondary mb-0" style="color: #676f7e; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 0.875rem; font-weight: 400; line-height: 1.5; margin: 0 0 1.5rem; margin-bottom: 0;">
                                &copy; All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="box-sizing: border-box; font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 1rem; vertical-align: top;"
                valign="top"></td>
        </tr>
    </table>
</body>
</html>';