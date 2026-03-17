<!DOCTYPE html>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <title>Meerkat Sentry Notification</title>
    <style>
        /* Base Reset */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        table { border-collapse: collapse !important; }
        body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; background-color: #111110; }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; margin: auto !important; }
            .content-padding { padding: 24px !important; }
            .title { font-size: 20px !important; }
        }

        /* Radix UI Inspired Classes */
        .btn-primary:hover { opacity: 0.9; }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #111110;">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="padding: 40px 10px;" bgcolor="#111110">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 520px;" class="email-container">
                <tr>
                    <td align="left" bgcolor="#191918" style="padding: 32px; border: 1px solid #2e2e2c; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.5);" class="content-padding">

                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="left" style="padding-bottom: 24px;">
                                    <img src="{{ $iconUrl }}" alt="Logo" width="42" height="42" style="display: block; border-radius: 8px; border: 1px solid #2e2e2c;">
                                    <p style="margin: 12px 0 0 0; color: #eeeeec; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size: 14px; font-weight: 600; letter-spacing: -0.01em;">
                                        Meerkat Sentry
                                    </p>
                                </td>
                            </tr>
                        </table>

                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" bgcolor="rgba(61, 218, 142, 0.1)" style="border: 1px solid rgba(61, 218, 142, 0.2); border-radius: 6px; padding: 4px 10px;">
                                        <span style="color: #3dda8e; font-family: sans-serif; font-size: 12px; font-weight: 600;">
                                            Tag Matches: {{ $count }}
                                        </span>
                                </td>
                            </tr>
                        </table>

                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="left" style="padding: 20px 0 12px 0;">
                                    <h1 class="title" style="margin: 0; color: #ffffff; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size: 24px; font-weight: 600; line-height: 1.2; letter-spacing: -0.02em;">
                                        {{ $title }}
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td align="left" style="padding-bottom: 28px;">
                                    <p style="margin: 0; color: #b0b0af; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size: 15px; line-height: 1.6;">
                                        {{ $description }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td align="left">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="center" bgcolor="#3dda8e" style="border-radius: 8px;">
                                                <a href="{{ $url }}" target="_blank" class="btn-primary" style="padding: 12px 24px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; font-size: 14px; color: #000000; text-decoration: none; font-weight: 600; display: inline-block;">
                                                    View Web Page
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding-top: 32px; color: #686866; font-family: sans-serif; font-size: 12px;">
                        Sent by <strong>Meerkat Sentry</strong> &bull; <a href="{{ url('/settings') }}" style="color: #3dda8e; text-decoration: none;">Unsubscribe</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
