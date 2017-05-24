<!DOCTYPE html>
<html lang="en" ng-app="BlurAdmin">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blur Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic"
          rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon-96x96.png">
    <link rel="stylesheet" href="styles/vendor-72d47c3353.css">
    <link rel="stylesheet" href="styles/app-b2b3cfd0e7.css">
</head>
<body>
<div class="body-bg"></div>
<main ng-if="$pageFinishedLoading" ng-class="{ 'menu-collapsed': $baSidebarService.isMenuCollapsed() }">
    <ba-sidebar></ba-sidebar>
    <page-top></page-top>
    <div class="al-main">
        <div class="al-content">
            <content-top></content-top>
            <div ui-view=""></div>
        </div>
    </div>
    <footer class="al-footer clearfix">
        <div class="al-footer-right">Created with <i class="ion-heart"></i></div>
        <div class="al-footer-main clearfix">
            <div class="al-copy">Blur Admin 2016</div>
            <ul class="al-share clearfix">
                <li><i class="socicon socicon-facebook"></i></li>
                <li><i class="socicon socicon-twitter"></i></li>
                <li><i class="socicon socicon-google"></i></li>
                <li><i class="socicon socicon-github"></i></li>
            </ul>
        </div>
    </footer>
    <back-top></back-top>
</main>
<div id="preloader" ng-show="!$pageFinishedLoading">
    <div></div>
</div>
<script src="scripts/vendor-38022caef4.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="scripts/app-de42dff5d0.js"></script>
</body>
</html>