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

    <!-- CSS FILES -->
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/css/color.css">

    <link rel="stylesheet" href="<?= URL; ?>public/font-awesome/css/font-awesome.css">

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
        <div class="uk-offcanvas-content">
            <!--HEADER-->
            <header id="top-head" class="uk-position-fixed">
                <div class="uk-container uk-container-expand uk-background-primary">
                    <nav class="uk-navbar uk-light" data-uk-navbar="mode:click">
                        <div class="uk-navbar-left">
                            <a class="uk-navbar-item uk-logo" href="#">Logo</a>
                            <ul class="uk-navbar-nav uk-visible@m">
                                <li class="uk-active"><a href="#">Accounts</a></li>
                                <li>
                                    <a href="#">Settings <span data-uk-icon="icon: triangle-down"></span></a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="uk-nav-header">YOUR ACCOUNT</li>
                                            <li><a href="#"><span data-uk-icon="icon: info"></span> Summary</a></li>
                                            <li><a href="#"><span data-uk-icon="icon: refresh"></span> Edit</a></li>
                                            <li><a href="#"><span data-uk-icon="icon: settings"></span> Configuration</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><a href="#"><span data-uk-icon="icon: image"></span> Your Data</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><a href="#"><span data-uk-icon="icon: sign-out"></span> Logout</a></li>
                                            
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div class="uk-navbar-item uk-visible@s">
                                <form action="dashboard.html" class="uk-search uk-search-default">
                                    <span data-uk-search-icon></span>
                                    <input class="uk-search-input search-field" type="search" placeholder="Search">
                                </form>
                            </div>
                        </div>
                        <div class="uk-navbar-right">
                            <ul class="uk-navbar-nav">
                                <li>
                                    <a href="#" data-uk-icon="icon:user"></a>
                                    <div class="uk-navbar-dropdown uk-navbar-dropdown-bottom-left">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="uk-nav-header">YOUR ACCOUNT</li>
                                            <li><a href="#"><span data-uk-icon="icon: info"></span> Summary</a></li>
                                            <li><a href="#"><span data-uk-icon="icon: refresh"></span> Edit</a></li>
                                            <li><a href="#"><span data-uk-icon="icon: settings"></span> Configuration</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><a href="#"><span data-uk-icon="icon: image"></span> Your Pictures</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><a href="#"><span data-uk-icon="icon: sign-out"></span> Logout</a></li>
                                            
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#" data-uk-icon="icon: settings"></a></li>
                                <li><a href="#" data-uk-icon="icon: cog"></a></li>
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
                        <div class="uk-width-auto"><img src="img/photo.jpg" alt="" class="uk-border-circle profile-img"></div>
                        <div class="uk-width-expand">
                            <span class="uk-text-small uk-text-muted">Welcome</span>
                            <h4 class="uk-margin-remove-vertical text-light">Finn the Human</h4>
                        </div>
                    </div>
                </div>
                
                <div class="bar-content uk-position-relative">
                    <ul class="uk-nav-default uk-nav-parent-icon" data-uk-nav>
                        <li class="uk-nav-header">MAIN SECTIONS</li>
                        <li class="uk-parent uk-open">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-nav-header">SECONDARY</li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
        <li class="uk-nav-header">LIST OF PAGES</li>
                        <li><a href="album.html"><span class="uk-margin-small-right" data-uk-icon="icon: image"></span> Album</a></li>
                        <li><a href="article.html"><span class="uk-margin-small-right" data-uk-icon="icon: info"></span> Article</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="login.html"><span class="uk-margin-small-right" data-uk-icon="icon: sign-in"></span> Login</a></li>
                        <li><a href="login-dark.html"><span class="uk-margin-small-right" data-uk-icon="icon: sign-in"></span> Login-Dark</a></li>
                    </ul>
                </div>
                <div class="uk-position-bottom bar-bottom">
                    <ul class="uk-subnav uk-flex uk-flex-center uk-child-width-1-6" data-uk-grid>
                        <li>
                            <a href="#" class="uk-icon-link" data-uk-icon="icon: home"></a>
                        </li>
                        <li>
                            <a href="#" class="uk-icon-link" data-uk-icon="icon: settings"></a>
                        </li>
                        <li>
                            <a href="#" class="uk-icon-link" data-uk-icon="icon: social"></a>
                        </li>
                        <li>
                            <a href="#" class="uk-icon-link" data-uk-icon="icon: comment"></a>
                        </li>
                        <li>
                            <a href="#" class="uk-icon-link" data-uk-tooltip="Sign out" data-uk-icon="icon: sign-out"></a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- /LEFT BAR -->
            <!-- CONTENT -->
            <div id="content" data-uk-height-viewport="expand: true">
                <div class="uk-container uk-container-expand">
                    <div class="uk-grid uk-grid-divider uk-grid-medium uk-child-width-1-2 uk-child-width-1-4@l uk-child-width-1-5@xl" data-uk-grid>
                        <div>
                            <span class="uk-text-small"><span data-uk-icon="icon:users" class="uk-margin-small-right uk-text-primary"></span>New Users</span>
                            <h1 class="uk-heading-primary uk-margin-remove  uk-text-primary">2.134</h1>
                            <div class="uk-text-small">
                                <span class="uk-text-success" data-uk-icon="icon: triangle-up">15%</span> more than last week.
                            </div>
                        </div>
                        <div>
                            
                            <span class="uk-text-small"><span data-uk-icon="icon:social" class="uk-margin-small-right uk-text-primary"></span>Social Media</span>
                            <h1 class="uk-heading-primary uk-margin-remove uk-text-primary">8.490</h1>
                            <div class="uk-text-small">
                                <span class="uk-text-warning" data-uk-icon="icon: triangle-down">-15%</span> less than last week.
                            </div>
                            
                        </div>
                        <div>
                            
                            <span class="uk-text-small"><span data-uk-icon="icon:clock" class="uk-margin-small-right uk-text-primary"></span>Traffic hours</span>
                            <h1 class="uk-heading-primary uk-margin-remove uk-text-primary">12.00<small class="uk-text-small">PM</small></h1>
                            <div class="uk-text-small">
                                <span class="uk-text-success" data-uk-icon="icon: triangle-up"> 19%</span> more than last week.
                            </div>
                            
                        </div>
                        <div>
                            
                            <span class="uk-text-small"><span data-uk-icon="icon:search" class="uk-margin-small-right uk-text-primary"></span>Week Search</span>
                            <h1 class="uk-heading-primary uk-margin-remove uk-text-primary">9.543</h1>
                            <div class="uk-text-small">
                                <span class="uk-text-danger" data-uk-icon="icon: triangle-down"> -23%</span> less than last week.
                            </div>
                            
                        </div>
                        <div class="uk-visible@xl">
                            <span class="uk-text-small"><span data-uk-icon="icon:users" class="uk-margin-small-right uk-text-primary"></span>Lorem ipsum</span>
                            <h1 class="uk-heading-primary uk-margin-remove uk-text-primary">5.284</h1>
                            <div class="uk-text-small">
                                <span class="uk-text-success" data-uk-icon="icon: triangle-up"> 7%</span> more than last week.
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid>
                        <!-- panel -->
                        <div class="uk-width-2-3@l uk-width-1-2@xl">
                            <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                                <div class="uk-card-header">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom">Geographic Chart</h4></div>
                                        <div class="uk-width-expand uk-text-right">
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: move"></a>
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: cog"></a>
                                            <a href="#" class="uk-icon-link" data-uk-icon="icon: close"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <img src="img/mapa1.svg" alt="">
                                    <p class="uk-text-muted uk-text-small uk-text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /panel -->
                        <!-- panel -->
                        <div class="uk-width-1-2@s uk-width-1-3@l uk-width-1-4@xl">
                            <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                                <div class="uk-card-header">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom">Activity</h4></div>
                                        <div class="uk-width-expand uk-text-right">
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: move"></a>
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: cog"></a>
                                            <a href="#" class="uk-icon-link" data-uk-icon="icon: close"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <img src="img/mapa2.svg" alt="">
                                    <p class="uk-text-muted uk-text-small uk-text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /panel -->
                        <!-- panel -->
                        <div class="uk-width-1-2@s uk-width-1-3@l uk-width-1-4@xl">
                            <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                                <div class="uk-card-header">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom">Conversions</h4></div>
                                        <div class="uk-width-expand uk-text-right">
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: move"></a>
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: cog"></a>
                                            <a href="#" class="uk-icon-link" data-uk-icon="icon: close"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <img src="img/mapa3.svg" alt="">
                                    <p class="uk-text-muted uk-text-small uk-text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /panel -->
                        <!-- panel -->
                        <div class=" uk-width-2-3@l uk-width-1-2@xl">
                            <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                                <div class="uk-card-header">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom">Consectetur sit</h4></div>
                                        <div class="uk-width-expand uk-text-right">
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: move"></a>
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: cog"></a>
                                            <a href="#" class="uk-icon-link" data-uk-icon="icon: close"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <div class="uk-overflow-auto">
                                    <table class="uk-table uk-table-hover uk-table-divider uk-table-middle">
                                        <thead>
                                            <tr>
                                                <th class="uk-table-shrink"></th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><img src="https://picsum.photos/40/40/?random=1" alt="Alt text" class="uk-border-circle uk-preserve-width "></td>
                                                <td>John Doe</td>
                                                <td>Maecenas sagittis, massa nulla luctus mauris</td>
                                                <td>11/09/18</td>
                                                <td>
                                                    <a href="#" class="uk-icon-link uk-text-success" data-uk-icon="check"></a>
                                                    <a href="#" class="uk-icon-link uk-text-danger" data-uk-icon="close"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://picsum.photos/40/40/?random=2" alt="Alt text" class="uk-border-circle uk-preserve-width "></td>
                                                <td>Larry Boile</td>
                                                <td>Maecenas sagittis, dolor id posuere finibus, massa nulla luctus mauris</td>
                                                <td>13/09/18</td>
                                                <td>
                                                    <a href="#" class="uk-icon-link uk-text-success" data-uk-icon="check"></a>
                                                    <a href="#" class="uk-icon-link uk-text-danger" data-uk-icon="close"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://picsum.photos/40/40/?random=3" alt="Alt text" class="uk-border-circle uk-preserve-width "></td>
                                                <td>Susan Lee</td>
                                                <td>Sagittis, dolor id posuere finibus, massa nulla luctus mauris</td>
                                                <td>18/09/18</td>
                                                <td>
                                                    <a href="#" class="uk-icon-link uk-text-success" data-uk-icon="check"></a>
                                                    <a href="#" class="uk-icon-link uk-text-danger" data-uk-icon="close"></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><img src="https://picsum.photos/40/40/?random=4" alt="Alt text" class="uk-border-circle uk-preserve-width "></td>
                                                <td>Jerry Thomas</td>
                                                <td>Maecenas sagittis, dolor id posuere finibus, massa nulla luctus mauris</td>
                                                <td>21/09/18</td>
                                                <td>
                                                    <a href="#" class="uk-icon-link uk-text-success" data-uk-icon="check"></a>
                                                    <a href="#" class="uk-icon-link uk-text-danger" data-uk-icon="close"></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- /panel -->
                        <!-- panel -->
                        <div class="uk-width-1-2@s uk-width-1-2@l uk-width-1-4@xl">
                            <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                                <div class="uk-card-header">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom">Lorem ipsum</h4></div>
                                        <div class="uk-width-expand uk-text-right">
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: move"></a>
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: cog"></a>
                                            <a href="#" class="uk-icon-link" data-uk-icon="icon: close"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <img src="img/mapa4.svg" alt="">
                                    <p class="uk-text-muted uk-text-small uk-text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /panel -->
                        <!-- panel -->
                        <div class="uk-width-1-2@s uk-width-1-2@l uk-width-1-4@xl">
                            <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                                <div class="uk-card-header">
                                    <div class="uk-grid uk-grid-small">
                                        <div class="uk-width-auto"><h4 class="uk-margin-remove-bottom">Ipsum dolor</h4></div>
                                        <div class="uk-width-expand uk-text-right">
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: move"></a>
                                            <a href="#" class="uk-icon-link uk-margin-small-right" data-uk-icon="icon: cog"></a>
                                            <a href="#" class="uk-icon-link" data-uk-icon="icon: close"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-card-body">
                                    <img src="img/mapa4.svg" alt="">
                                    <p class="uk-text-muted uk-text-small uk-text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /panel -->
                    </div>
                    <footer class="uk-section uk-section-small uk-text-center">
                        <hr>
                        <a href="https://github.com/zzseba78/Kick-Off">Created by KickOff</a> | Build with <a href="http://getuikit.com" title="Visit UIkit 3 site" target="_blank" data-uk-tooltip><span data-uk-icon="uikit"></span></a>
                    </footer>
                </div>
            </div>
            <!-- /CONTENT -->
            <!-- OFFCANVAS -->
            <div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: true">
                <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
                    <button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
                    <ul class="uk-nav uk-nav-default">
                        <li class="uk-active"><a href="#">Active</a></li>
                        <li class="uk-parent">
                            <a href="#">Parent</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Sub item</a></li>
                                <li><a href="#">Sub item</a></li>
                            </ul>
                        </li>
                        <li class="uk-nav-header">Header</li>
                        <li><a href="#js-options"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: table"></span> Item</a></li>
                        <li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: thumbnails"></span> Item</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: trash"></span> Item</a></li>
                    </ul>
                    <h3>Title</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <!-- /OFFCANVAS -->
        </div>
        