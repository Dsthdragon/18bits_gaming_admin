<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?=(isset($this->title))?$this->title :NAME; ?>
    </title>

    <!-- Bootstrap core CSS -->
    <!-- CSS FILES -->
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/cards.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/color.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/jquery.datetimepicker.css">

    <link rel="stylesheet" href="<?= URL; ?>public/fontawesome/css/all.min.css"/>

    <link rel="stylesheet" href="<?= URL; ?>public/css/default.css"/>
    
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


    <?php  if (isset($this->css)) : ?>
        <?php foreach ($this->css as $css): ?>
            <link rel="stylesheet" href="<?= URL ?>views/<?= $css ?>"/>
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <?php session::init(); ?>
    <?php
    $general = new general_model();
    $navBar = $general->getNavLink();
    $active = "";
    if (!empty($this->activePage)) {
        $active = $this->activePage;
    }
    $pageTitle = "";
    if(isset($this->pageTitle))
    {
        $pageTitle = $this->pageTitle;
    }
    $activeParent = $general->getLinkParent($active);
    ?>
    
    <input type="hidden" value="<?= URL ?>fileupload" id="uploadLink">
    <input type="hidden" value="<?= URL ?>" id="RootLink">
    <input type="hidden" value="<?= URL ?>imageManager" id="managerLink">
    <input type="hidden" value="<?= URL ?>deleteFile" id="deleteLink">
    <input type="hidden" value="<?= URL ?>myManager" id="myManagerLink">
    <input type="hidden" value="<?= URL ?>setGameImage" id="setGameImage">
    <input type="hidden" value="<?= URL ?>setArticleImage" id="setArticleImage">
    
    <div class="uk-offcanvas-content">
        <!--HEADER-->
        <header id="top-head" class="uk-position-fixed uk-sticky uk-sticky-fixed">
            <div class="uk-container uk-container-expand uk-background-primary">
                <nav class="uk-navbar uk-light" data-uk-navbar="mode:click">
                    <div class="uk-navbar-left">
                        <a class="uk-navbar-item uk-logo" href="#">
                            <img src="<?= URL ?>public/img/logo-small.png">
                        </a>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <li>
                                <a href="#" data-uk-icon="icon:user"></a>
                                <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-left">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li class="uk-nav-header">YOUR ACCOUNT</li>
                                        <li><a href="<?= URL ?>profile"><span data-uk-icon="icon: info"></span> Profile</a></li>
                                        <li class="uk-nav-divider"></li>
                                        <li><a href="<?= URL ?>logout"><span data-uk-icon="icon: sign-out"></span> Logout</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li><a class="uk-navbar-toggle" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--/HEADER-->
        <!-- LEFT BAR -->
        <aside id="left-col" class="uk-light uk-visible@m">
            <div class="profile-bar">
                <div class="uk-grid uk-grid-small uk-flex uk-flex-middle" data-uk-grid>
                    <div class="uk-width-auto"><img src="<?= URL."sendImage/".session::get("uid")."/avatar" ?>" alt="" class="uk-border-circle profile-img"></div>
                    <div class="uk-width-expand">
                        <span class="uk-text-small uk-text-muted">Welcome</span>
                        <h4 class="uk-margin-remove-vertical text-light"><?= session::get("fullname"); ?></h4>
                    </div>
                </div>
            </div>

            <div class="bar-content uk-position-relative">
                <ul class="uk-nav-default uk-nav-parent-icon" data-uk-nav>
                    <li class="uk-nav-header">MAIN SECTIONS</li>
                    <li <?= ($active == 'index') ? 'class="uk-active"' : '' ?>>
                        <a href="<?= URL ?>">
                            <span class="uk-margin-small-right fa fa-chart-line "></span>
                            Dashboard
                        </a>
                    </li>
                    <?php foreach($navBar as $key => $value): ?>
                        <?php if($key == 0 || $navBar[$key - 1]['group'] != $value['group']): ?>
                            <li class="uk-parent <?= ($activeParent['group'] == $value['group']) ? 'uk-open uk-active' : '' ?>">
                                <?php $group_name = urlencoder::slug($value['group_name']); ?>
                                <a href="#"> 
                                    <span class="uk-margin-small-right <?= $value['group_icon'] ?>"></span>
                                    <?= $value['group_name'] ?>
                                </a>
                                <ul  class="uk-nav-sub">
                                <?php endif; ?>
                                <li >
                                    <a href="<?= URL.$value['link'] ?>" <?= ($active == $value['linkName']) ? 'class="white-text"' : '' ?>>
                                        <span class="uk-margin-small-right <?= $value['icon'] ?>">
                                        </span>
                                        <?= $value['title']; ?>
                                    </a>
                                </li>

                                <?php if($key + 1 == count($navBar) || $navBar[$key + 1]['group'] != $value['group']): ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <li>
                        <a href="<?= URL ?>logout">
                            <span class="uk-margin-small-right fas fa-sign-out-alt  "></span>
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- /LEFT BAR -->
        <!-- CONTENT -->
        <div id="content" data-uk-height-viewport="expand: true">
            <div class="uk-container uk-container-expand">
                <?php $this->render("general/alert"); ?>
                <?php $this->render($this->content); ?>
                <footer class="uk-section uk-section-small uk-text-center">
                    <hr>
                    &copy; 2018 <?= NAME ?> 
                    | Powered By <a href="https://rinnas.com" title="Visit Rinnas Tech site" target="_blank" data-uk-tooltip>Rinnas Tech</a></p>
                </footer>
            </div>
        </div>
        <!-- /CONTENT -->

        <!-- OFFCANVAS -->
        <div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
                <button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
                <ul class="uk-nav uk-nav-default">
                    <li class="uk-nav-header">MAIN SECTIONS</li>
                    <li <?= ($active == 'index') ? 'class="uk-active"' : '' ?>>
                        <a href="<?= URL ?>">
                            <span class="uk-margin-small-right fa fa-chart-line "></span>
                            Dashboard
                        </a>
                    </li>
                    <?php foreach($navBar as $key => $value): ?>
                        <?php if($key == 0 || $navBar[$key - 1]['group'] != $value['group']): ?>
                            <li class="uk-parent <?= ($activeParent['group'] == $value['group']) ? 'uk-open uk-active' : '' ?>">
                                <?php $group_name = urlencoder::slug($value['group_name']); ?>
                                <a href="#"> 
                                    <span class="uk-margin-small-right <?= $value['group_icon'] ?>"></span>
                                    <?= $value['group_name'] ?>
                                </a>
                                <ul  class="uk-nav-sub">
                                <?php endif; ?>
                                <li >
                                    <a href="<?= URL.$value['link'] ?>" <?= ($active == $value['linkName']) ? 'class="white-text"' : '' ?>>
                                        <span class="uk-margin-small-right <?= $value['icon'] ?>">
                                        </span>
                                        <?= $value['title']; ?>
                                    </a>
                                </li>

                                <?php if($key + 1 == count($navBar) || $navBar[$key + 1]['group'] != $value['group']): ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- /OFFCANVAS -->
    </div>

    <script src="<?= URL; ?>public/js/jquery.js"></script>
    <script src="<?= URL; ?>public/js/jquery.datetimepicker.js"></script>

    <script src="<?= URL; ?>public/js/uikit.min.js"></script>
    <script src="<?= URL; ?>public/js/uikit-icons.min.js"></script>
    <script src="<?= URL; ?>public/tinymce/tinymce.min.js"></script>

    <script src="<?= URL; ?>public/js/default.js" type="text/javascript" ></script>

    <?php if (isset($this->js)) : ?>
        <?php foreach ($this->js as $js) : ?>
            <script type="text/javascript" src="<?= URL ?>views/<?= $js ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>