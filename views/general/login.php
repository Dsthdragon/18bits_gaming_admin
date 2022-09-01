<!DOCTYPE html>
<html lang="en" class="uk-height-1-1">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - ADMINISTRATOR</title>
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/uikit.min.css">

    <link rel="stylesheet" href="<?= URL; ?>public/fontawesome/css/all.min.css"/>
    <link rel="apple-touch-icon" sizes="57x57" href="<?= URL; ?>public/ico/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= URL; ?>public/ico/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= URL; ?>public/ico/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= URL; ?>public/ico/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= URL; ?>public/ico/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= URL; ?>public/ico/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= URL; ?>public/ico/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= URL; ?>public/ico/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= URL; ?>public/ico/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= URL; ?>public/ico/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= URL; ?>public/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= URL; ?>public/ico/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= URL; ?>public/ico/favicon-16x16.png">
    <link rel="manifest" href="<?= URL; ?>public/ico/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= URL; ?>public/ico/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
<body class="uk-height-1-1" style="background-color: #222;">
    <header id="header" class="uk-margin-large-bottom">
        <div class="uk-container">
            <nav id="navbar" data-uk-navbar="mode: click;" class="uk-padding-small">
                <div class="uk-navbar-left nav-overlay uk-visible@m">
                    <ul class="uk-navbar-nav">
                        <li>
                            <a href="<?= MAIN_SITE; ?>" title="Games">BACK TO SITE</a>
                        </li>
                    </ul>
                </div>
                <div class="uk-navbar-center nav-overlay">
                    <a class="uk-navbar-item uk-logo" href="<?= URL; ?>" title="Logo">
                        <img src="<?= URL; ?>public/img/logo-small.png" alt="Logo" width="100" >
                    </a>
                </div>
                <div class="uk-navbar-right nav-overlay">
                    <div class="uk-navbar-item">
                        <a href="https://www.facebook.com/18bitsgaming" target="_blank" class="uk-visible@s" style="margin-right: 4px" href="#" data-uk-icon="facebook"></a>
                        <a href="https://twitter.com/18bitsgaming" target="_blank" class="uk-visible@s" style="margin-right: 4px" href="#" data-uk-icon="twitter"></a>
                        <a href="https://www.instagram.com/18bitsgaming" target="_blank" class="uk-visible@s" style="margin-right: 4px" href="#" data-uk-icon="instagram"></a>
                        <a class="uk-navbar-toggle uk-hidden@m" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a>
                    </div>

                </div>
            </nav>
        </div>
    </header>
    <div class="uk-flex uk-flex-center uk-flex-middle uk-background-secondary uk-light">
        <div class="uk-position-bottom-center uk-position-small uk-visible@m">
            <span class="uk-text-small uk-text-muted">
                &copy; 2018 <?= NAME ?> 
                | Powered By <a href="https://rinnas.com" title="Visit Rinnas Tech site" target="_blank" data-uk-tooltip>Rinnas Tech</a></p>
            </span>
        </div>

        <?php $this->render('general/alert'); ?>
        <div class="uk-width-medium uk-padding-small">
            <form method="POST" id="loginForm">
                <fieldset class="uk-fieldset">
                    <legend class="uk-legend">Login</legend>
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: user"></span>
                            <input class="uk-input uk-form-large" required placeholder="Username" type="text" name="username" form="loginForm">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <div class="uk-inline uk-width-1-1">
                            <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
                            <input class="uk-input uk-form-large" required placeholder="Password" type="password" name="password" form="loginForm">
                        </div>
                    </div>
                    <div class="uk-margin">
                        <button type="submit" class="uk-button uk-button-primary uk-button-primary uk-button-large uk-width-1-1" form="loginForm" name="form" value="loginForm">LOG IN</button>
                    </div>
                </fieldset>
            </form>
            <div>
                <div class="uk-text-center">
                    <a class="uk-link-reset uk-text-small" data-uk-toggle="target: #recover;animation: uk-animation-slide-top-small">Forgot your password?</a>
                </div>
                <div class="uk-margin-small-top" id="recover" hidden>
                    <form action="login-dark.html">

                        <div class="uk-margin-small">
                            <div class="uk-inline uk-width-1-1">
                                <span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: mail"></span>
                                <input class="uk-input" placeholder="E-mail" required type="text">
                            </div>
                        </div>
                        <div class="uk-margin-small">
                            <button type="submit" class="uk-button uk-button-primary uk-button-primary uk-width-1-1">SEND PASSWORD</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS FILES -->
    <script src="<?= URL; ?>public/js/uikit.min.js"></script>
    <script src="<?= URL; ?>public/js/uikit-icons.min.js"></script>
    <script src="<?= URL; ?>public/fontawesome/js/all.min.js"></script>
</body>
</html>
