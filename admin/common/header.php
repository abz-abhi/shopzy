<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="assets/imgs/theme/favicon.svg" />
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet" />
    <title>Ecom - Marketplace Dashboard Template</title>
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a class="brand-wrap" href="dashboard.php"><img
                    class="logo"
                    src="assets/imgs/theme/logo.svg"
                    alt="Evara Dashboard" /></a>
            <div>
                <button class="btn btn-icon btn-aside-minimize">
                    <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="dashboard.php">
                        <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span></a>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.php">
                        <i class="icon material-icons md-list_alt"></i>
                        <span class="text">Orders</span>
                    </a>
                    <div class="submenu">
                        <a href="order-list.php">Order List</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="page-products-list.php"><i class="icon material-icons md-shopping_bag"></i><span class="text">Products</span></a>
                    <div class="submenu">
                        <a href="page-products-list.php">Product List</a>
                        <a href="page-categories.php">Categories</a>
                    </div>
                </li>
                <li class="menu-item ">
                    <a class="menu-link" href="add-product.php">
                        <i class="icon material-icons md-add_box"></i>
                        <span class="text">Add product</span></a>
                </li>
            </ul>
            <hr />
            <ul class="menu-aside">
                <li class="menu-item ">
                    <a class="menu-link" href="page-settings-1.php">
                        <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
                <form class="searchform">
                    <div class="input-group">
                        <input
                            class="form-control"
                            list="search_terms"
                            type="text"
                            placeholder="Search term" />
                        <button class="btn btn-light bg" type="button">
                            <i class="material-icons md-search"></i>
                        </button>
                    </div>
                    <datalist id="search_terms">
                        <option value="Products"></option>
                        <option value="New orders"></option>
                        <option value="Apple iphone"></option>
                        <option value="Ahmed Hassan"></option>
                    </datalist>
                </form>
            </div>
            <div class="col-nav">
                <button
                    class="btn btn-icon btn-mobile me-auto"
                    data-trigger="#offcanvas_aside">
                    <i class="material-icons md-apps"></i>
                </button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#"><i class="material-icons md-notifications animation-shake"></i><span class="badge rounded-pill">3</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"><i class="material-icons md-nights_stay"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="requestfullscreen nav-link btn-icon" href="#"><i class="material-icons md-cast"></i></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a
                            class="dropdown-toggle"
                            id="dropdownLanguage"
                            data-bs-toggle="dropdown"
                            href="#"
                            aria-expanded="false"><i class="material-icons md-public"></i></a>
                        <div
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="dropdownLanguage">
                            <a class="dropdown-item text-brand" href="#"><img
                                    src="assets/imgs/theme/flag-us.png"
                                    alt="English" />English</a><a class="dropdown-item" href="#"><img
                                    src="assets/imgs/theme/flag-fr.png"
                                    alt="Français" />Fran&ccedil;ais</a><a class="dropdown-item" href="#"><img
                                    src="assets/imgs/theme/flag-jp.png"
                                    alt="Français" />&#x65E5;&#x672C;&#x8A9E;</a><a class="dropdown-item" href="#"><img
                                    src="assets/imgs/theme/flag-cn.png"
                                    alt="Français" />&#x4E2D;&#x56FD;&#x4EBA;</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a
                            class="dropdown-toggle"
                            id="dropdownAccount"
                            data-bs-toggle="dropdown"
                            href="#"
                            aria-expanded="false"><img
                                class="img-xs rounded-circle"
                                src="assets/imgs/people/avatar2.jpg"
                                alt="User" /></a>
                        <div
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="page-settings-1.php"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="logout.php"><i class="material-icons md-exit_to_app"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>