<?php require_once "php/controllerUserData.php"; ?>
<?php
require_once "php/schedule_cron.php";
$username = $_SESSION['username'];
if ($username != false) {
    $user_address_new = '';
    if (isset($_SESSION['userAddress'])) {
        $user_address_new = $_SESSION['userAddress'];
        if ((strpos($user_address_new, '0x') === 0)) {
            $sql = "SELECT * FROM user_login WHERE username = '$username'";
            $run_Sql = mysqli_query($link, $sql);
            if ($run_Sql) {
                $fetch_info = mysqli_fetch_assoc($run_Sql);
                $status = $fetch_info['email_status'];
                $name = $fetch_info['name'];
                $username = $fetch_info['username'];
                $profile = $fetch_info['profile'];
                $userUid = $fetch_info['user_uid'];
                $user_uid = $userUid;
                $code = $fetch_info['code'];
                if ($status == "verified") {
                    if ($code != 0) {
                        header('Location: reset-code');
                    }
                } else {
                    header('Location: user-otp');
                }
            } else {
                header('Location: index');
            }
        } else {
            header('Location: login-user-mm');
        }
    } else {
        $user_address_new = '';
        header('Location: login-user-mm');
    }
} else {
    header('Location: login-user-mm');
}
$current_chat_user_address = '';
if (isset($_GET['user'])) {
    $current_chat_user_address = $_GET['user'];
} else {
    $current_chat_user_address = '';
}
?>

<html class="h-screen w-screen bg-white" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="next-head-count" content="2">
    <meta name="description" content="Chat via XMTP">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link rel="stylesheet" href="assets/css/messageBox.css">
    <style data-href="https://fonts.googleapis.com/css?family=Inter:400,500,600,700|Inconsolata:400,600,700&amp;display=swap">
        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            font-stretch: normal;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QldgNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLYxYWI2qfdm7Lpp4U8WR32kQ.woff) format('woff')
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 600;
            font-stretch: normal;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QldgNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLYxYWI2qfdm7Lpp1s7WR32kQ.woff) format('woff')
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 700;
            font-stretch: normal;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QldgNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLYxYWI2qfdm7Lpp2I7WR32kQ.woff) format('woff')
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hjg.woff) format('woff')
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuI6fAZ9hjg.woff) format('woff')
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuGKYAZ9hjg.woff) format('woff')
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuFuYAZ9hjg.woff) format('woff')
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyxq15IDhunJ_o.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyx615IDhunJ_o.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyya15IDhunA.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyxq15IDhunJ_o.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyx615IDhunJ_o.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 600;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyya15IDhunA.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 700;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyxq15IDhunJ_o.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 700;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyx615IDhunJ_o.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 700;
            font-stretch: 100%;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inconsolata/v31/QlddNThLqRwH-OJ1UHjlKENVzkWGVkL3GZQmAwLyya15IDhunA.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa0ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+1F00-1FFF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0370-03FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa25L7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7W0Q5nw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa0ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+1F00-1FFF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0370-03FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa25L7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7W0Q5nw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa0ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+1F00-1FFF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0370-03FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa25L7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7W0Q5nw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2JL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa0ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2ZL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+1F00-1FFF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0370-03FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa2pL7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa25L7W0Q5n-wU.woff2) format('woff2');
            unicode-range: U+0100-02AF, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF
        }

        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7W0Q5nw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD
        }
    </style>
    <title>Pinkpaper | Messages</title>
</head>

<body class="h-full">
    <input type="hidden" name="current_chat_user_address" id="current_chat_user_address" value="<?= $current_chat_user_address ?>">
    <main>
        <div id="__next">
            <div data-rk="">
                <div class="bg-white w-full md:h-full overflow-auto flex flex-col md:flex-row">
                    <div class="flex md:w-1/2 md:max-w-md" id="show-list-panel">
                        <div class="flex flex-col justify-between items-center h-screen bg-gray-50 px-3 absolute z-10 border-r border-gray-200 w-[64px]">
                            <div class="flex flex-col items-start space-y-4 w-fit">
                                <div class="py-4 flex">
                                    <div>
                                        <div class="flex mb-12">
                                            <div data-testid="avatar"><img src="assets/images/logo/favicon.ico" alt="hello" width="40" height="40">
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-start pt-4 space-y-4">
                                            <div class="group flex relative">
                                                <button type="button" aria-label="Messages" class="hover:bg-gray-200 p-2 hover:text-black text-gray-500 rounded-lg w-full flex item-center h-fit rounded cursor-pointer">
                                                    <div class="flex justify-center items-center h-fit"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Home" onclick="window.location.replace('home')" data-toggle="tooltip" data-placement="right" title="" data-bs-original-title="Home">
                                                            <path d="M4.5 10.75v10.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-5.5c0-.14.11-.25.25-.25h3.5c.14 0 .25.11.25.25v5.5c0 .14.11.25.25.25h5c.14 0 .25-.11.25-.25v-10.5M22 9l-9.1-6.83a1.5 1.5 0 0 0-1.8 0L2 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg><span data-testid="Messages"></span>
                                                    </div>
                                                </button>
                                                <div role="tooltip" class="group-hover:opacity-100 w-max transition-opacity bg-gray-800 p-2 text-sm text-gray-100 rounded-md absolute opacity-0 m-4 mx-auto z-20 left-10">Home</div>
                                            </div>
                                            <div class="group flex relative"><button type="button" aria-label="Gallery" class="hover:bg-gray-200 p-2 hover:text-black text-gray-500 rounded-lg w-full flex item-center h-fit rounded cursor-pointer">
                                                    <div class="flex justify-center items-center h-fit"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Notifications" onclick="window.location.replace('notifications')" data-toggle="tooltip" data-placement="right" title="" data-bs-original-title="Notification">
                                                            <path d="M15 18.5a3 3 0 1 1-6 0" stroke="currentColor" stroke-linecap="round">
                                                            </path>
                                                            <path d="M5.5 10.53V9a6.5 6.5 0 0 1 13 0v1.53c0 1.42.56 2.78 1.57 3.79l.03.03c.26.26.4.6.4.97v2.93c0 .14-.11.25-.25.25H3.75a.25.25 0 0 1-.25-.25v-2.93c0-.37.14-.71.4-.97l.03-.03c1-1 1.57-2.37 1.57-3.79z" stroke="currentColor" stroke-linejoin="round"></path>
                                                        </svg><span data-testid="Gallery"></span></div>
                                                </button>
                                                <div role="tooltip" class="group-hover:opacity-100 w-max transition-opacity bg-gray-800 p-2 text-sm text-gray-100 rounded-md absolute opacity-0 m-4 mx-auto z-20 left-10">Notification</div>
                                            </div>
                                            <div class="group flex relative"><button type="button" aria-label="Settings" class="hover:bg-gray-200 p-2 hover:text-black text-gray-500 rounded-lg w-full flex item-center h-fit rounded cursor-pointer">
                                                    <div class="flex justify-center items-center h-fit"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Lists" onclick="window.location.replace('reading-list')" data-toggle="tooltip" data-placement="right" title="" data-bs-original-title="Reading List">
                                                            <path d="M4.5 6.25V21c0 .2.24.32.4.2l5.45-4.09a.25.25 0 0 1 .3 0l5.45 4.09c.16.12.4 0 .4-.2V6.25a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25z" stroke="currentColor" stroke-linecap="round"></path>
                                                            <path d="M8 6V3.25c0-.14.11-.25.25-.25h11.5c.14 0 .25.11.25.25V16.5" stroke="currentColor" stroke-linecap="round"></path>
                                                        </svg><span data-testid="Settings"></span></div>
                                                </button>
                                                <div role="tooltip" class="group-hover:opacity-100 w-max transition-opacity bg-gray-800 p-2 text-sm text-gray-100 rounded-md absolute opacity-0 m-4 mx-auto z-20 left-10">Reading List</div>
                                            </div>
                                            <div class="group flex relative"><button type="button" aria-label="Collapse" class="hover:bg-gray-200 p-2 hover:text-black text-gray-500 rounded-lg w-full flex item-center h-fit rounded cursor-pointer">
                                                    <div class="flex justify-center items-center h-fit"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Stories" onclick="window.location.replace('stories')" data-toggle="tooltip" data-placement="right" title="" data-bs-original-title="Stories">
                                                            <path d="M4.75 21.5h14.5c.14 0 .25-.11.25-.25V2.75a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25v18.5c0 .14.11.25.25.25z" stroke="currentColor"></path>
                                                            <path d="M8 8.5h8M8 15.5h5M8 12h8" stroke="currentColor" stroke-linecap="round">
                                                            </path>
                                                        </svg><span data-testid="Collapse"></span></div>
                                                </button>
                                                <div role="tooltip" class="group-hover:opacity-100 w-max transition-opacity bg-gray-800 p-2 text-sm text-gray-100 rounded-md absolute opacity-0 m-4 mx-auto z-20 left-10">Stories</div>
                                            </div>
                                            <div class="group flex relative"><button type="button" aria-label="Messages" class="font-bold hover:bg-gray-200 p-2 hover:text-black text-gray-500 rounded-lg w-full flex item-center h-fit rounded cursor-pointer">
                                                    <div class="flex justify-center items-center h-fit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="24" class="" data-testid="messages-icon">
                                                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                                                            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                                                        </svg><span data-testid="Messages"></span></div>
                                                </button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center items-center font-bold w-full pb-8">
                                <div tabindex="0" class="cursor-pointer" data-testid="icon" onclick="window.location.replace('home')">
                                    <img src="assets/images/close.png" alt="" srcset="" height="24" width="24">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full h-screen overflow-y-auto">
                            <div data-modal-target="headerModalId" data-testid="conversation-list-header" class="border-l border-r border-b border-gray-200 bg-gray-100 h-16 p-4 pl-20 pt-5">
                                <div class="flex justify-between items-center"><span class="flex">
                                        <h1 class="font-bold text-lg mr-2">All messages</h1>
                                    </span>
                                    <!-- <button data-testid="new-message-icon-cta" type="button" class="bg-indigo-600 hover:bg-indigo-800 focus:outline-none focus:ring focus:ring-indigo-800 text-lg p-0 rounded-full flex justify-center items-center p-0 h-fit" aria-label="aria_labels.start_new_message" id="add-new-conversation">
                                        <div class="bg-indigo-600 hover:bg-indigo-800 p-1 min-h-24 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" color="white" width="20">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                            </svg></div>
                                    </button> -->
                                    <img src="assets/images/Rolling-1s-200px (1).gif" alt="" srcset="" height="30" width="30" id="load-conversation-list">
                                </div>
                            </div>
                            <div class="w-full pl-16 overflow-auto sm:w-full flex flex-col h-full bg-gray-100 border-x" data-testid="conversations-list-panel" id="conversation-list" style="display:none">
                            </div>
                            <div class="w-full pl-16 overflow-hidden sm:w-full sm:p-4 md:p-8 border border-gray-100 h-full" id="blank-list">
                                <div class="flex flex-col justify-center items-center h-full text-center md:pl-16"><span data-testid="empty-message-icon"><svg width="233" height="146" viewBox="0 0 233 146" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g clip-path="url(#clip0_1612_10342)">
                                                <path d="M177.042 58.1602C178.349 55.1511 181.178 45.5917 188.427 39.982C191.691 37.4563 193.523 38.0034 195.92 36.898C195.92 36.898 196.958 36.3996 198.161 35.4365C201.761 32.5511 201.33 23.6288 204.564 19.4805C209.389 13.2899 225.694 13.4773 230.906 21.6015C232.517 24.1159 233.416 27.9494 232.322 31.5056C229.838 39.5548 218.965 40.1581 217.789 47.8064C217.429 50.1372 218.411 50.2572 218.467 53.0452C218.654 62.5633 206.931 71.5119 194.935 75.634C189.158 77.62 178.068 72.2052 176.596 71.0248C173.216 68.3155 175.667 61.323 177.042 58.1565V58.1602Z" fill="url(#paint0_linear_1612_10342)"></path>
                                                <path opacity="0.7" d="M219.741 27.26C216.275 30.2803 212.709 33.6754 209.131 37.4864C199.697 47.5442 192.863 57.6732 187.914 66.5056C189.327 64.0436 193.013 58.4377 200.057 55.511C202.462 54.5105 204.717 54.0495 206.576 53.8472" stroke="white" stroke-width="0.77" stroke-miterlimit="10"></path>
                                                <path class="mix-blend-mode:multiply" d="M177.042 58.1602C178.349 55.1511 181.178 45.5917 188.427 39.982C191.691 37.4563 193.523 38.0034 195.92 36.898C195.92 36.898 196.958 36.3996 198.161 35.4365C201.761 32.5511 201.33 23.6288 204.564 19.4805C209.389 13.2899 225.694 13.4773 230.906 21.6015C232.517 24.1159 233.416 27.9494 232.322 31.5056C229.838 39.5548 218.965 40.1581 217.789 47.8064C217.429 50.1372 218.411 50.2572 218.467 53.0452C218.654 62.5633 206.931 71.5119 194.935 75.634C189.158 77.62 178.068 72.2052 176.596 71.0248C173.216 68.3155 175.667 61.323 177.042 58.1565V58.1602Z" fill="url(#paint1_radial_1612_10342)"></path>
                                                <path class="mix-blend-mode:multiply" d="M177.042 58.1602C178.349 55.1511 181.178 45.5917 188.427 39.982C191.691 37.4563 193.523 38.0034 195.92 36.898C195.92 36.898 196.958 36.3996 198.161 35.4365C201.761 32.5511 201.33 23.6288 204.564 19.4805C209.389 13.2899 225.694 13.4773 230.906 21.6015C232.517 24.1159 233.416 27.9494 232.322 31.5056C229.838 39.5548 218.965 40.1581 217.789 47.8064C217.429 50.1372 218.411 50.2572 218.467 53.0452C218.654 62.5633 206.931 71.5119 194.935 75.634C189.158 77.62 178.068 72.2052 176.596 71.0248C173.216 68.3155 175.667 61.323 177.042 58.1565V58.1602Z" fill="url(#paint2_linear_1612_10342)"></path>
                                                <path d="M178.001 16.123H70.947C62.1613 16.123 54.9755 23.3103 54.9755 32.0978V84.3278C54.9755 93.1153 62.1613 100.303 70.947 100.303H172.212L188.476 116.57C190.503 118.597 193.972 117.162 193.972 114.291V84.3241V61.1956V32.0903C193.972 23.3028 186.786 16.1155 178.001 16.1155V16.123Z" fill="url(#paint3_linear_1612_10342)"></path>
                                                <g class="mix-blend-mode:soft-light">
                                                    <path d="M54.9755 32.0978V84.3316C54.9755 89.0457 57.0473 93.2951 60.3143 96.2218C57.7779 93.3851 56.2343 89.6565 56.2343 85.5869V32.7723C56.2343 24.3108 63.1579 17.3783 71.6251 17.3783H179.26C183.34 17.3783 187.082 18.9297 189.911 21.4854C186.981 18.2027 182.721 16.1267 178.001 16.1267H70.9507C62.1688 16.1267 54.9755 23.3141 54.9755 32.0978Z" fill="white"></path>
                                                </g>
                                                <g class="mix-blend-mode:soft-light">
                                                    <path d="M173.381 36.6995H98.102C96.6473 36.6995 95.4681 37.8789 95.4681 39.3338V39.3975C95.4681 40.8524 96.6473 42.0319 98.102 42.0319H173.381C174.836 42.0319 176.015 40.8524 176.015 39.3975V39.3338C176.015 37.8789 174.836 36.6995 173.381 36.6995Z" fill="url(#paint4_linear_1612_10342)"></path>
                                                    <path d="M173.381 48.3835H73.6482C72.1936 48.3835 71.0144 49.563 71.0144 51.0179V51.0816C71.0144 52.5365 72.1936 53.716 73.6482 53.716H173.381C174.836 53.716 176.015 52.5365 176.015 51.0816V51.0179C176.015 49.563 174.836 48.3835 173.381 48.3835Z" fill="url(#paint5_linear_1612_10342)"></path>
                                                    <path d="M173.381 60.5999H73.6482C72.1936 60.5999 71.0144 61.7793 71.0144 63.2342V63.2979C71.0144 64.7528 72.1936 65.9323 73.6482 65.9323H173.381C174.836 65.9323 176.015 64.7528 176.015 63.2979V63.2342C176.015 61.7793 174.836 60.5999 173.381 60.5999Z" fill="url(#paint6_linear_1612_10342)"></path>
                                                    <path d="M173.647 72.8198H124.373C123.063 72.8198 122.001 73.8818 122.001 75.1919V75.7802C122.001 77.0902 123.063 78.1523 124.373 78.1523H173.647C174.957 78.1523 176.019 77.0902 176.019 75.7802V75.1919C176.019 73.8818 174.957 72.8198 173.647 72.8198Z" fill="url(#paint7_linear_1612_10342)"></path>
                                                </g>
                                                <path class="mix-blend-mode:multiply" opacity="0.5" d="M70.7596 100.43L177.978 100.43C186.811 100.43 193.972 93.2677 193.972 84.4327V32.1202C193.972 23.2851 186.811 16.1229 177.978 16.1229L70.7596 16.1229C61.9263 16.1229 54.7656 23.2851 54.7656 32.1202V84.4327C54.7656 93.2677 61.9263 100.43 70.7596 100.43Z" fill="url(#paint8_radial_1612_10342)"></path>
                                                <path class="mix-blend-mode:multiply" opacity="0.5" d="M70.7596 100.43L177.978 100.43C186.811 100.43 193.972 93.2677 193.972 84.4327V32.1202C193.972 23.2851 186.811 16.1229 177.978 16.1229L70.7596 16.1229C61.9263 16.1229 54.7656 23.2851 54.7656 32.1202V84.4327C54.7656 93.2677 61.9263 100.43 70.7596 100.43Z" fill="url(#paint9_radial_1612_10342)"></path>
                                                <path d="M187.521 42.699C198.632 42.699 207.64 33.6896 207.64 22.5759C207.64 11.4623 198.632 2.45288 187.521 2.45288C176.409 2.45288 167.402 11.4623 167.402 22.5759C167.402 33.6896 176.409 42.699 187.521 42.699Z" fill="url(#paint10_linear_1612_10342)"></path>
                                                <path class="mix-blend-mode:screen" d="M207.64 22.572C207.64 30.6587 202.874 37.6325 195.992 40.829C202.391 37.5388 206.774 30.8611 206.774 23.1604C206.774 12.2032 197.887 3.3146 186.932 3.3146C179.162 3.3146 172.43 7.78515 169.178 14.2905C172.336 7.30924 179.357 2.44897 187.521 2.44897C198.629 2.44897 207.636 11.4575 207.636 22.5683L207.64 22.572Z" fill="url(#paint11_linear_1612_10342)"></path>
                                                <path d="M180.672 22.5497C180.672 19.4694 181.26 17.1386 182.437 15.5572C183.613 13.9758 185.306 13.1814 187.506 13.1814C189.862 13.1814 191.597 13.9608 192.706 15.516C193.815 17.0749 194.369 19.4169 194.369 22.5497C194.369 25.6824 193.774 27.9458 192.59 29.5572C191.402 31.1648 189.709 31.9704 187.506 31.9704C186.337 31.9704 185.321 31.7493 184.46 31.3109C183.598 30.8725 182.89 30.2467 182.332 29.426C181.773 28.6091 181.354 27.6198 181.08 26.4581C180.807 25.2965 180.668 23.9924 180.668 22.5497H180.672ZM184.385 22.5497C184.385 24.5283 184.625 26.0909 185.108 27.2338C185.587 28.3768 186.389 28.9501 187.509 28.9501C188.63 28.9501 189.454 28.433 189.933 27.4025C190.413 26.3719 190.656 24.7531 190.656 22.5497C190.656 21.5679 190.6 20.6873 190.488 19.9041C190.376 19.1209 190.199 18.4539 189.96 17.903C189.72 17.3522 189.398 16.9325 188.993 16.6402C188.588 16.3479 188.094 16.2017 187.509 16.2017C186.389 16.2017 185.591 16.7376 185.108 17.8131C184.628 18.8886 184.385 20.4662 184.385 22.5497Z" fill="#F9FAFB"></path>
                                                <path d="M64.0795 79.7672C66.1626 78.9016 67.073 76.3047 68.8976 71.1072C71.198 64.5494 76.829 48.5071 69.3696 39.7684C65.0649 34.7283 60.8275 37.2914 58.2237 32.671C54.316 25.7385 62.9818 18.3937 59.1828 7.84131C58.6133 6.2562 56.9686 1.68447 53.0984 0.204286C45.4742 -2.71487 31.552 7.27547 30.7802 17.3782C30.0647 26.769 40.9109 33.5741 37.4828 41.0125C36.49 43.1672 35.426 42.9349 34.5155 44.831C29.3079 55.6758 54.2074 83.863 64.0795 79.7597V79.7672Z" fill="url(#paint12_linear_1612_10342)"></path>
                                                <path opacity="0.7" d="M45.167 12.4656C45.2981 21.328 46.3509 32.9671 49.9813 46.1015C54.2973 61.7202 60.7039 73.8316 65.9491 82.1094" stroke="white" stroke-width="1.12" stroke-miterlimit="10"></path>
                                                <path class="mix-blend-mode:multiply" d="M68.8976 71.1111C71.198 64.5533 76.829 48.5111 69.3696 39.7723C65.0649 34.7322 60.8275 37.2953 58.2237 32.6749C54.316 25.7424 62.9818 18.3976 59.1828 7.84522C58.6133 6.2601 56.9686 1.68838 53.0984 0.208192C45.4742 -2.71096 31.552 7.27937 30.7802 17.3821C30.0647 26.7729 40.9109 33.578 37.4828 41.0164C36.49 43.1711 35.426 42.9388 34.5155 44.8349C29.3079 55.6797 54.2074 83.867 64.0795 79.7636C64.1919 79.7187 64.2968 79.6625 64.4017 79.6063C64.9262 80.4719 65.4395 81.3075 65.9453 82.102L65.0649 79.1491C66.5035 77.9162 67.3877 75.4018 68.8976 71.1036V71.1111Z" fill="url(#paint13_linear_1612_10342)"></path>
                                                <path d="M54.7768 70.6127C54.1811 71.0662 53.1246 71.7519 48.4489 71.0662C37.3367 69.4361 31.9604 68.1358 30.222 64.2611C28.6897 60.8472 30.9189 59.7156 29.1805 57.07C26.7302 53.3451 20.6533 55.4848 16.4085 50.797C15.8653 50.1974 14.213 47.3569 14.3367 44.9024C14.6326 39.0529 24.8832 34.0127 30.9563 36.456C36.5986 38.7269 36.7335 46.851 41.8251 47.3344C44.3465 47.5743 44.9871 46.0678 47.2313 46.3227C53.9414 47.0834 59.7935 66.798 54.7694 70.6127H54.7768Z" fill="url(#paint14_linear_1612_10342)"></path>
                                                <path opacity="0.7" d="M26.7452 45.3855C30.0722 47.2666 33.7101 49.62 37.4491 52.5654C44.5338 58.1451 49.6816 64.0359 53.3007 68.9449" stroke="white" stroke-width="0.97" stroke-miterlimit="10"></path>
                                                <path class="mix-blend-mode:multiply" d="M47.239 46.3186C44.9911 46.0638 44.3504 47.5702 41.8328 47.3304C36.7375 46.847 36.6063 38.7228 30.964 36.452C24.8871 34.005 14.6366 39.0489 14.3444 44.8984C14.2207 47.3492 15.8692 50.1896 16.4162 50.7929C20.661 55.4808 26.7379 53.3411 29.1882 57.0659C30.9266 59.7115 28.6974 60.8432 30.2297 64.257C31.9681 68.1317 37.3444 69.4321 48.4566 71.0621C53.1323 71.7479 54.1889 71.0621 54.7846 70.6087C59.8087 66.794 53.9566 47.0793 47.2465 46.3186H47.239Z" fill="url(#paint15_linear_1612_10342)"></path>
                                                <path d="M13.3776 60.6072H103.527C110.923 60.6072 116.977 66.6591 116.977 74.06V118.042C116.977 125.439 110.926 131.495 103.527 131.495H18.2518L4.55447 145.195C2.84605 146.904 -0.0725098 145.694 -0.0725098 143.277V118.042V98.5675V74.06C-0.0725098 66.6628 5.97816 60.6072 13.3776 60.6072Z" fill="url(#paint16_linear_1612_10342)"></path>
                                                <g class="mix-blend-mode:soft-light">
                                                    <path d="M116.977 74.0601V118.046C116.977 122.018 115.235 125.593 112.481 128.059C114.617 125.672 115.917 122.532 115.917 119.103V74.6297C115.917 67.5023 110.087 61.6677 102.957 61.6677H12.3174C8.88179 61.6677 5.73095 62.9756 3.34814 65.1265C5.81712 62.361 9.40256 60.6147 13.3776 60.6147H103.523C110.919 60.6147 116.973 66.6667 116.973 74.0639L116.977 74.0601Z" fill="white"></path>
                                                </g>
                                                <rect x="165.855" y="1.18774" width="43.1053" height="43.1441" fill="url(#pattern0)"></rect>
                                                <path d="M34.784 104.096L51.872 83.936L53.152 88.736L36.064 108.768L34.784 104.096ZM44 116.768C41.184 116.768 38.752 115.979 36.704 114.4C34.6987 112.821 33.1413 110.517 32.032 107.488C30.9227 104.416 30.368 100.683 30.368 96.288C30.368 91.9787 30.9227 88.288 32.032 85.216C33.1413 82.1013 34.6987 79.712 36.704 78.048C38.752 76.384 41.184 75.552 44 75.552C46.816 75.552 49.2267 76.384 51.232 78.048C53.28 79.712 54.8587 82.1013 55.968 85.216C57.0773 88.288 57.632 91.9787 57.632 96.288C57.632 100.683 57.0773 104.416 55.968 107.488C54.8587 110.517 53.28 112.821 51.232 114.4C49.2267 115.979 46.816 116.768 44 116.768ZM44 111.2C45.536 111.2 46.816 110.624 47.84 109.472C48.864 108.32 49.632 106.635 50.144 104.416C50.656 102.197 50.912 99.488 50.912 96.288C50.912 93.1307 50.656 90.464 50.144 88.288C49.632 86.0693 48.864 84.3627 47.84 83.168C46.816 81.9733 45.536 81.376 44 81.376C42.464 81.376 41.184 81.9733 40.16 83.168C39.136 84.3627 38.368 86.0693 37.856 88.288C37.344 90.464 37.088 93.1307 37.088 96.288C37.088 99.488 37.344 102.197 37.856 104.416C38.368 106.635 39.136 108.32 40.16 109.472C41.184 110.624 42.464 111.2 44 111.2ZM61.792 116L72.096 101.088L61.92 86.24H69.536L75.936 95.456L81.888 86.24H89.184L79.776 100.832L90.464 116H82.656L75.936 106.528L69.536 116H61.792Z" fill="#E5E7EB"></path>
                                                <path d="M32.784 102.096L49.872 81.936L51.152 86.736L34.064 106.768L32.784 102.096ZM42 114.768C39.184 114.768 36.752 113.979 34.704 112.4C32.6987 110.821 31.1413 108.517 30.032 105.488C28.9227 102.416 28.368 98.6827 28.368 94.288C28.368 89.9787 28.9227 86.288 30.032 83.216C31.1413 80.1013 32.6987 77.712 34.704 76.048C36.752 74.384 39.184 73.552 42 73.552C44.816 73.552 47.2267 74.384 49.232 76.048C51.28 77.712 52.8587 80.1013 53.968 83.216C55.0773 86.288 55.632 89.9787 55.632 94.288C55.632 98.6827 55.0773 102.416 53.968 105.488C52.8587 108.517 51.28 110.821 49.232 112.4C47.2267 113.979 44.816 114.768 42 114.768ZM42 109.2C43.536 109.2 44.816 108.624 45.84 107.472C46.864 106.32 47.632 104.635 48.144 102.416C48.656 100.197 48.912 97.488 48.912 94.288C48.912 91.1307 48.656 88.464 48.144 86.288C47.632 84.0693 46.864 82.3627 45.84 81.168C44.816 79.9733 43.536 79.376 42 79.376C40.464 79.376 39.184 79.9733 38.16 81.168C37.136 82.3627 36.368 84.0693 35.856 86.288C35.344 88.464 35.088 91.1307 35.088 94.288C35.088 97.488 35.344 100.197 35.856 102.416C36.368 104.635 37.136 106.32 38.16 107.472C39.184 108.624 40.464 109.2 42 109.2ZM59.792 114L70.096 99.088L59.92 84.24H67.536L73.936 93.456L79.888 84.24H87.184L77.776 98.832L88.464 114H80.656L73.936 104.528L67.536 114H59.792Z" fill="#6B7280"></path>
                                            </g>
                                            <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                    <use xlink:href="#image0_1612_10342" transform="matrix(0.00222422 0 0 0.00222222 -0.00045054 0)"></use>
                                                </pattern>
                                                <linearGradient id="paint0_linear_1612_10342" x1="223.472" y1="33.368" x2="194.4" y2="51.3273" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#C4DFCC"></stop>
                                                    <stop offset="0.17" stop-color="#BAD9C5"></stop>
                                                    <stop offset="0.68" stop-color="#A2CCB5"></stop>
                                                    <stop offset="1" stop-color="#9AC7B0"></stop>
                                                </linearGradient>
                                                <radialGradient id="paint1_radial_1612_10342" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(197.179 30.9372) rotate(-122.545) scale(28.328 30.5916)">
                                                    <stop offset="0.18" stop-color="#9AC7B0"></stop>
                                                    <stop offset="0.27" stop-color="#9EC9B2" stop-opacity="0.9"></stop>
                                                    <stop offset="0.46" stop-color="#A8CFB9" stop-opacity="0.65"></stop>
                                                    <stop offset="0.72" stop-color="#B9D9C5" stop-opacity="0.25"></stop>
                                                    <stop offset="0.88" stop-color="#C4DFCC" stop-opacity="0"></stop>
                                                </radialGradient>
                                                <linearGradient id="paint2_linear_1612_10342" x1="186.393" y1="47.8102" x2="203.402" y2="45.6526" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.18" stop-color="#9AC7B0"></stop>
                                                    <stop offset="0.27" stop-color="#9EC9B2" stop-opacity="0.9"></stop>
                                                    <stop offset="0.46" stop-color="#A8CFB9" stop-opacity="0.65"></stop>
                                                    <stop offset="0.72" stop-color="#B9D9C5" stop-opacity="0.25"></stop>
                                                    <stop offset="0.88" stop-color="#C4DFCC" stop-opacity="0"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint3_linear_1612_10342" x1="88.1811" y1="6.91582" x2="167.142" y2="118.469" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.1" stop-color="#A78BFA"></stop>
                                                    <stop offset="0.22" stop-color="#8B5CF6"></stop>
                                                    <stop offset="0.56" stop-color="#7C3AED"></stop>
                                                    <stop offset="0.84" stop-color="#7C3AED"></stop>
                                                    <stop offset="1" stop-color="#7C3AED"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint4_linear_1612_10342" x1="95.4681" y1="39.3675" x2="176.019" y2="39.3675" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#CBE0ED"></stop>
                                                    <stop offset="1" stop-color="#B3CFDD"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint5_linear_1612_10342" x1="71.0144" y1="51.0479" x2="176.019" y2="51.0479" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#CBE0ED"></stop>
                                                    <stop offset="1" stop-color="#B3CFDD"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint6_linear_1612_10342" x1="71.0144" y1="63.2679" x2="-18.6254" y2="63.2679" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#CBE0ED"></stop>
                                                    <stop offset="1" stop-color="#B3CFDD"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint7_linear_1612_10342" x1="122.001" y1="75.4879" x2="176.019" y2="75.4879" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#CBE0ED"></stop>
                                                    <stop offset="1" stop-color="#B3CFDD"></stop>
                                                </linearGradient>
                                                <radialGradient id="paint8_radial_1612_10342" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(88.9865 79.9157) scale(79.9737 50.3938)">
                                                    <stop offset="0.34" stop-color="#235DB4"></stop>
                                                    <stop offset="0.4" stop-color="#2864B8" stop-opacity="0.91"></stop>
                                                    <stop offset="0.81" stop-color="#4F9CDC" stop-opacity="0.26"></stop>
                                                    <stop offset="1" stop-color="#5FB3EB" stop-opacity="0"></stop>
                                                </radialGradient>
                                                <radialGradient id="paint9_radial_1612_10342" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(188.131 26.5517) scale(37.0571 37.0647)">
                                                    <stop offset="0.34" stop-color="#4338CA"></stop>
                                                    <stop offset="0.4" stop-color="#6D28D9"></stop>
                                                    <stop offset="0.81" stop-color="#4F9CDC" stop-opacity="0.26"></stop>
                                                    <stop offset="1" stop-color="#5FB3EB" stop-opacity="0"></stop>
                                                </radialGradient>
                                                <linearGradient id="paint10_linear_1612_10342" x1="199.438" y1="2.25427" x2="176.979" y2="40.5403" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.1" stop-color="#F9DE5B"></stop>
                                                    <stop offset="0.22" stop-color="#F7CE42"></stop>
                                                    <stop offset="0.41" stop-color="#F5B71F"></stop>
                                                    <stop offset="0.57" stop-color="#F3A909"></stop>
                                                    <stop offset="0.67" stop-color="#F3A401"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint11_linear_1612_10342" x1="187.596" y1="41.8782" x2="189.132" y2="-2.10024" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0.1" stop-color="#F9DE5B"></stop>
                                                    <stop offset="0.22" stop-color="#F7CE42"></stop>
                                                    <stop offset="0.41" stop-color="#F5B71F"></stop>
                                                    <stop offset="0.57" stop-color="#F3A909"></stop>
                                                    <stop offset="0.67" stop-color="#F3A401"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint12_linear_1612_10342" x1="54.6195" y1="9.0367" x2="49.3647" y2="60.652" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#C4DFCC"></stop>
                                                    <stop offset="0.17" stop-color="#BAD9C5"></stop>
                                                    <stop offset="0.68" stop-color="#A2CCB5"></stop>
                                                    <stop offset="1" stop-color="#9AC7B0"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint13_linear_1612_10342" x1="40.6936" y1="62.511" x2="61.6996" y2="24.1459" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#9AC7B0"></stop>
                                                    <stop offset="0.34" stop-color="#ABD1BB" stop-opacity="0.58"></stop>
                                                    <stop offset="0.71" stop-color="#BDDBC7" stop-opacity="0.16"></stop>
                                                    <stop offset="0.88" stop-color="#C4DFCC" stop-opacity="0"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint14_linear_1612_10342" x1="44.0243" y1="41.3874" x2="31.8031" y2="61.9955" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#C4DFCC"></stop>
                                                    <stop offset="0.17" stop-color="#BAD9C5"></stop>
                                                    <stop offset="0.68" stop-color="#A2CCB5"></stop>
                                                    <stop offset="1" stop-color="#9AC7B0"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint15_linear_1612_10342" x1="34.3397" y1="66.0707" x2="36.135" y2="49.4552" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#9AC7B0"></stop>
                                                    <stop offset="0.34" stop-color="#ABD1BB" stop-opacity="0.58"></stop>
                                                    <stop offset="0.71" stop-color="#BDDBC7" stop-opacity="0.16"></stop>
                                                    <stop offset="0.88" stop-color="#C4DFCC" stop-opacity="0"></stop>
                                                </linearGradient>
                                                <linearGradient id="paint16_linear_1612_10342" x1="96.3485" y1="136.307" x2="14.0388" y2="70.7114" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#9CA3AF"></stop>
                                                    <stop offset="1" stop-color="#E5E7EB"></stop>
                                                </linearGradient>
                                                <clipPath id="clip0_1612_10342">
                                                    <rect width="233" height="146" fill="white"></rect>
                                                </clipPath>

                                            </defs>
                                        </svg> </span>
                                    <h2 class="text-xl font-bold mt-4" data-testid="empty-message-header">No messages? No problem.</h2>
                                    <p class="my-4" data-testid="empty-message-subheader">Start a conversation to get going with DMs that you own and control.</p>
                                    <p class="my-4" data-testid="empty-message-subheader">Follow the author to start a chat with them. They must be on XMPP network and should be verified by XMPP.</p>
                                    <button data-testid="empty-message-cta" type="button" class="bg-indigo-600 hover:bg-indigo-800 focus:outline-none focus:ring focus:ring-indigo-800 text-white h-12 px-6 py-4 min-w-[25%] h-fit font-bold rounded-full  m-4" aria-label="Start Follow Athour" onClick="window.location.replace('all-writers')">
                                        <div class="flex justify-center items-center h-fit space-x-1">
                                            <div>Start Follow Athour</div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" width="24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- loader start -->
                    <div class="flex w-full flex-col h-screen overflow-hidden" style="justify-content: center;align-items: center;" id="message-load-panel">
                        <img src="assets/images/Spin-1s-200px.gif" alt="preloader" style="justify-content: center;align-items: center;">
                    </div>
                    <!-- loader end -->
                    <div class="flex w-full flex-col h-screen overflow-hidden" id="show-peer-msg-panel" style="display:none;">
                        <div class="flex">
                            <div class="border-b border-gray-200 flex items-center px-2 md:px-4 py-3 border-l-0 z-10 max-md:h-fit md:max-h-sm w-full h-16">
                                <div class="max-md:w-fit md:hidden flex w-24 p-0 justify-start" id="back-to-list" onClick="backToList()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" width="24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                </div>
                                <form class="flex w-full items-center">
                                    <div class="mr-2 font-bold text-sm">To:</div>
                                    <div data-testid="avatar"><img src="https://www.gravatar.com/avatar/5d41402abc4b2a76b9719d911017c592?s=40&r=mp&d=retro" alt="hello" class="rounded-full" width="40" height="40" id="peer_avatar"> </div>
                                    <div class="ml-2 md:ml-4 flex flex-col justify-center">
                                        <div class="flex flex-col text-md py-1"><span class="font-bold h-4 mb-2 ml-0" data-testid="recipient-wallet-address" id="recipient-wallet-address">0x5472CA7aFABb12a9b6bCF6651EB332aC8F6E1AD4</span></div>
                                        <p class="font-mono text-sm text-gray-500" data-testid="message-to-subtext"></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="h-full overflow-auto flex flex-col">
                            <div id="scrollableDiv" tabindex="0" class="w-full h-full flex flex-col flex-col-reverse overflow-auto">
                                <div class="infinite-scroll-component__outerdiv">
                                    <div class="infinite-scroll-component flex flex-col flex-col-reverse" style="height: auto; overflow: auto;">
                                        <div class="w-full h-full flex flex-col pt-8 px-4 md:px-8" data-testid="message-tile-container" id="conversation">
                                            <div class="text-gray-500 font-regular text-sm w-full py-2 text-center" data-testid="message-beginning-text">This is the beginning of the conversation</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form>
                            <label for="message-input" class="sr-only">Write a message</label>
                            <div class="flex items-center max-h-300 mx-4 my-2 mb-6 bg-white relative no-scrollbar z-10 p-1 border border-gray-300 focus-within:border-1 focus-within:border-indigo-600 rounded-tl-3xl rounded-bl-3xl rounded-tr-3xl">
                                <textarea id="message-input" rows="1" cols=80 class="max-h-8 min-h-8 outline-none border-none focus:ring-0 resize-none mx-2 p-1 w-full max-md:text-[16px] md:text-md text-gray-900" placeholder="Write a message" style="height: 32px;">
                                </textarea>
                                <div class="flex items-end absolute bottom-1.5 right-1">
                                    <button type="button" id="send-message-form" class="bg-indigo-600 hover:bg-indigo-800 focus:outline-none focus:ring focus:ring-indigo-800 text-lg p-0 rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl flex justify-center items-center p-0 h-fit" aria-label="Submit message">
                                        <div class="bg-indigo-600 hover:bg-indigo-800 p-1 min-h-24 rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" color="white" width="20">
                                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg></div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex w-full flex-col h-screen overflow-hidden" id="show-blank-msg-panel" style="display:none;">
                        <div class="flex">
                            <div class="bg-indigo-50 border-b border-indigo-500 flex items-center px-2 md:px-4 py-3 border-l-0 z-10 max-md:h-fit md:max-h-sm w-full h-16">
                                <div class="max-md:w-fit md:hidden flex w-24 p-0 justify-start"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" width="24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                                    </svg></div>
                                <form class="flex w-full items-center">
                                    <div class="mr-2 font-bold text-sm">To:</div>
                                    <div data-testid="avatar"><img src="https://www.gravatar.com/avatar/5d41402abc4b2a76b9719d911017c592?s=40&r=mp&d=retro" alt="hello" class="rounded-full" width="40" height="40"></div>
                                    <div class="ml-2 md:ml-4 flex flex-col justify-center"><input data-testid="message-to-input" tabindex="0" class="bg-transparent text-gray-900 px-0 h-4 m-1 ml-0 font-mono max-md:text-[16px] md:text-sm w-full leading-tight border border-2 border-transparent focus:border-transparent focus:ring-0 cursor-text" id="address" type="search" spellcheck="false" autocomplete="off" autocorrect="false" autocapitalize="off" aria-label="Address input" value="">
                                        <p class="font-mono text-sm text-gray-500" data-testid="message-to-subtext">Enter a 0x wallet or ENS address</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="h-full overflow-auto flex flex-col">
                            <div id="scrollableDiv" tabindex="0" class="w-full h-full flex flex-col flex-col-reverse overflow-auto">
                                <div class="infinite-scroll-component__outerdiv">
                                    <div class="infinite-scroll-component flex flex-col flex-col-reverse" style="height: auto; overflow: auto;">
                                        <div class="w-full h-full flex flex-col pt-8 px-4 md:px-8" data-testid="message-tile-container">
                                            <div class="text-gray-500 font-regular text-sm w-full py-2 text-center" data-testid="message-beginning-text">This is the beginning of the conversation</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form>
                            <label for="message-input" class="sr-only">Write a message</label>
                            <div class="flex items-center max-h-300 mx-4 my-2 mb-6 bg-white relative no-scrollbar z-10 p-1 border border-gray-300 focus-within:border-1 focus-within:border-indigo-600 rounded-tl-3xl rounded-bl-3xl rounded-tr-3xl">
                                <textarea id="message-input-blank" rows="1" cols=80 class="max-h-8 min-h-8 outline-none border-none focus:ring-0 resize-none mx-2 p-1 w-full max-md:text-[16px] md:text-md text-gray-900" placeholder="Write a message" style="height: 32px;">
                                </textarea>
                                <div class="flex items-end absolute bottom-1.5 right-1">
                                    <button type="button" id="send-message-form-blank" class="bg-indigo-600 hover:bg-indigo-800 focus:outline-none focus:ring focus:ring-indigo-800 text-lg p-0 rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl flex justify-center items-center p-0 h-fit" aria-label="Submit message">
                                        <div class="bg-indigo-600 hover:bg-indigo-800 p-1 min-h-24 rounded-tl-2xl rounded-tr-2xl rounded-bl-2xl"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" color="white" width="20">
                                                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg></div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex w-full flex-col h-screen overflow-hidden" id="no-msg-panel" style="display:none;">
                        <div class="flex flex-col justify-center items-center max-w-xl p-4 md:h-full m-0 m-auto">
                            <div>
                                <h1 class="text-4xl font-bold my-4" data-testid="learn-more-header">Chat with Pinkpaper</h1>
                            </div>
                            <div class="flex flex-col md:flex-row w-full"></div>
                            <div>
                                <h2 class="text-lg font-bold my-4" data-testid="get-started-header">Get started</h2>
                                <div class="w-full flex p-3 flex items-center justify-between border-y border-gray-300 cursor-pointer"><a target="blank" class="flex" data-testid="message-section-link">
                                        <div class="bg-indigo-100 p-2 mr-4 rounded-md h-fit" data-testid="message-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="24" class="text-indigo-600">
                                                <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                                            </svg></div>
                                        <div class="flex flex-col">
                                            <div class="font-bold" data-testid="message-header">Follow Author to message</div>
                                            <p class="text-gray-500 text-md" data-testid="message-subheader">Message author using their 0x wallet or ENS address</p>
                                        </div>
                                    </a>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" width="24" color="gray" class="ml-4" data-testid="message-arrow">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                        </svg></div>
                                </div>
                                <div class="w-full flex p-3 flex items-center justify-between border-y border-gray-300 cursor-pointer border-t-0"><a href="https://community.xmtp.org" target="blank" class="flex" data-testid="community-section-link">
                                        <div class="bg-indigo-100 p-2 mr-4 rounded-md h-fit" data-testid="community-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="24" class="text-indigo-600">
                                                <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path>
                                            </svg></div>
                                        <div class="flex flex-col">
                                            <div class="font-bold" data-testid="community-header">Write your own article</div>
                                            <p class="text-gray-500 text-md" data-testid="community-subheader">Pinkpaper provide you a plateform where you can write your own decentralized article</p>
                                        </div>
                                    </a>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" width="24" color="gray" class="ml-4" data-testid="community-arrow">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                        </svg></div>
                                </div>
                                <div class="w-full flex p-3 flex items-center justify-between border-y border-gray-300 cursor-pointer border-t-0"><a href="https://pinkpaper.xyz/" target="blank" class="flex" data-testid="docs-section-link">
                                        <div class="bg-indigo-100 p-2 mr-4 rounded-md h-fit" data-testid="docs-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="24" class="text-indigo-600">
                                                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path>
                                            </svg></div>
                                        <div class="flex flex-col">
                                            <div class="font-bold" data-testid="docs-header">About Pinkpaper</div>
                                            <p class="text-gray-500 text-md" data-testid="docs-subheader">Learn how to write article Pinkpaper</p>
                                        </div>
                                    </a>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" width="24" color="gray" class="ml-4" data-testid="docs-arrow">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <next-route-announcer>
        <p aria-live="assertive" id="__next-route-announcer__" role="alert" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; width: 1px; white-space: nowrap; overflow-wrap: normal;">Chat via XMTP</p>
    </next-route-announcer>
    <script type="text/javascript" src="assets/jquery/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist2/index.0641b553.js" defer=""></script>
    <script>
        $('#message-input').text('');
        $('#message-input').keydown(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                document.getElementById("send-message-form").click();
            }
        });
        $('#message-input-blank').text('');
        $('#message-input-blank').keydown(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                document.getElementById("send-message-form-blank").click();
            }
        });

        $('#add-new-conversation').click(() => {
            $('#show-peer-msg-panel').css('display', 'none');
            $('#show-blank-msg-panel').css('display', 'flex');
        });
        $(document).ready(function() {
            setTimeout(() => {
                const user_address = $('#current_chat_user_address').val();
                if (user_address !== '') {
                    loadMessage(user_address);
                }
            }, 7000);
        });
    </script>
</body>

</html>