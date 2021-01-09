<?php
    session_start();
    $userName = $_SESSION['name'];
    if (isset($_SESSION['id'])) {//ログインしているとき
        $msg = '<font color="white">こんにちは' . htmlspecialchars($userName, \ENT_QUOTES, 'UTF-8') . 'さん </font>';
        $link = '<a href="../top/logout.php">ログアウト</a>';
    } else {//ログインしていない時
        $msg = '<font color="white"> ログインしていません </font>';
        $link = '<a href="../top/login_form.php">ログイン</a>';
    }
?>

<header id="header">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.php">STB (Share Today's Best!!)</a>
            <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="insert.php">投稿</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userlist.php">ユーザー一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="acount.php">アカウント</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="search_do.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="inputWord">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <p> <?= $msg . $link ?> </p>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <!-- <div class="nav-scroller bg-white shadow-sm">
        <nav class="nav nav-underline" aria-label="Secondary navigation">
            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            <a class="nav-link" href="#">
                Friends
                <span class="badge bg-light text-dark rounded-pill align-text-bottom">27</span>
            </a>
            <a class="nav-link" href="#">Explore</a>
            <a class="nav-link" href="#">Suggestions</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
        </nav>
    </div> -->
</header>