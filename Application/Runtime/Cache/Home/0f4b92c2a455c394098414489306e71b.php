<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>




<!DOCTYPE html>
<html lang="en" data-locale="en_US" class='<?php if(($_COOKIE['think_language']) == "en-us"): ?>en<?php else: ?>cn<?php endif; ?>'>

<!-- Mirrored from localhost:58961/index.aspx by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Feb 2019 15:43:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if(($_COOKIE['think_language']) == "en-us"): ?><title>Ahnluh Qiandao Lake</title>
    <?php else: ?>
        <title>千岛湖安麓</title><?php endif; ?>
    

    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

    <link href="/Public/home/css/colorbox.css" rel="stylesheet" type="text/css" defer>
    <link href="/Public/home/css/main.css" rel="stylesheet" type="text/css" defer>
    <link href="http://at.alicdn.com/t/font_1035999_9z3gkng2vgj.css" rel="stylesheet" type="text/css" defer>
    <link href="/Public/home/css/animations.css" rel="stylesheet" type="text/css" defer>
    <link href="/Public/home/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" defer>


    <link href="/Public/home/css/font-awesome.min.css" rel="stylesheet" defer />
    <link href="/Public/home/css/plus.css" rel="stylesheet" type="text/css" defer>

    <script src="/Public/home/js/jquery.min.js"></script>
	<script src="/Public/home/js/layer/layer.js"></script>












    </head>


    <body class="page page--sticky-book-mobile page--home " data-page-type="home">





        <!-- Foldout menu-->
        <div class="foldout" id="foldoutMenu">
        <div class="foldout__wrapper">
            <div class="foldout__header">
                <div class="foldout__logo">
                    <div class="logo logo--alila">
                        <a class="logo__link" href="javascript:;">
                            <div class="logo__image">
                                <img src="/Public/home/img/close.png" alt="" style="position: absolute; right: 21px;">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="foldout__close" id="foldoutClose">
                    <div class="button button--simple button--close">
                        <div class="icon icon--svg icon--alila_close_circle">
                            <svg>
                                <use xlink:href="#alila_close_circle--dark"></use></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="foldout__main">




                <nav class="foldout__navigation foldout__navigation--main">
                    <a class="foldout__link foldout__link--nav link" href="<?php echo U('About/index');?>"><span><?php echo (L("about")); ?></span></a>
                    <a class="foldout__link foldout__link--nav link" href="<?php echo U('Anlu/index');?>"><span><?php echo (L("anlu")); ?></span></a>
                    <a class="foldout__link foldout__link--nav link" href="<?php echo U('Photo/index');?>"><span><?php echo (L("photo")); ?></span></a>
                    <a class="foldout__link foldout__link--nav link" href="<?php echo U('Contact/index');?>"><span><?php echo (L("contact")); ?></span></a>
                </nav>



            </div>
        </div>
    </div>


    <header id="header" class="pagewhite--back--header   header header--with-message header--page">

        <div class="header__left">
            <div class="header__logo">
                <div class="header__toggle">



                    <span class="header__back header__languages header__languages--mobile hide">
                        <div class="languages languages--mobile">
                            <a class="navigation__link languages__button" href="javascript:;">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" style="enable-background: new 0 0 1000 1000;" xml:space="preserve">
                                    <g id="XMLID_1_">
                                        <polygon id="XMLID_3_" points="431.158,409.533 430.992,489.524 430.825,569.515 383.08,529.42 335.335,489.325 383.247,449.429" style="fill: #000"></polygon>

                                        <line id="XMLID_6_" style="fill: none; stroke: #000; stroke-width: 15; stroke-miterlimit: 10;" x1="665.318" y1="489.524" x2="404.931" y2="489.524"></line>
                                    </g>
                                </svg>

                            </a>
                        </div>
                    </span>


                    <span class="header__languages header__languages--mobile">
                        <div class="languages languages--mobile">
                            <?php if(($_COOKIE['think_language']) == "en-us"): ?><a class="navigation__link languages__button" href="?lang=zh-cn">CN</a>
                            <?php else: ?>
                                <a class="navigation__link languages__button" href="?lang=en-us">EN</a><?php endif; ?>
                            
                        </div>
                    </span>
                    <div class="header__hamburger">
                        <div class="hamburger header--property" id="menuToggle">
                            <div class="hamburger__icon">
                                <div class="hamburger__open">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="hamburger__close icon__item">
                                    <div class="icon icon--svg icon--alila_close_simple">
                                        <svg>
                                            <use xlink:href="#alila_close_simple"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header__image">
                    <a href="<?php echo U('Index/index');?>">
                        <img src="/Public/home/img/logo.jpg" /></a>

                </div>


            </div>
        </div>

        <div class="header__right">

            <div class="header__aside header__book-button">
                <!-- <a class="book-button modal-trigger header__book" href="<?php echo U('Order/index');?>"> -->
                    <!-- <h4 class="book-button__title"><?php echo (L("order")); ?></h4> -->
                <!-- </a> -->
				
				   <a class="book-button modal-trigger header__book" href="<?php echo U('Order/index');?>">
                    <h4 class="book-button__title"><?php echo (L("order")); ?></h4>
                </a>
				
            </div>
            <div class="header__aside header__signin-link" style="display: block;">
                

                <div class="link" style="margin-top: 1.16rem;">

                    <div class="select">
                        <span><a href="javascript:;">ENGLISH</a></span>
                        <div class="drop">
                            <ul>
                                <li>
                                    <a href="?lang=zh-cn">简体中文</a>
                                </li>
                                <li>
                                    <a href="?lang=en-us">ENGLISH</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="header__menu-wrapper">
                <div class="header__menu">
                    <div class="header__settings">
                        <div class="header__links">
                            <nav class="navigation navigation--links navigation--columns-4">
                            </nav>
                        </div>
                    </div>
                    <!-- Navigation-->
                    <div class="header__navigation" id="menuSwitch">

                        

                        <nav class="navigation navigation--menu navigation--columns-4 header--property">
                            <a class="navigation__link link nav-first <?php if((CONTROLLER_NAME) == "Index"): ?>active<?php endif; ?>" href="<?php echo U('Index/index');?>"><span><?php echo (L("about")); ?></span></a>
                            <a class="navigation__link link nav-first <?php if((CONTROLLER_NAME) == "About"): ?>active<?php endif; ?>" href="<?php echo U('About/index');?>"><span><?php echo (L("about")); ?></span></a>
                            <a class="navigation__link link <?php if((CONTROLLER_NAME) == "Anlu"): ?>active<?php endif; ?>" href="<?php echo U('Anlu/index');?>"><span><?php echo (L("anlu")); ?></span></a>
                            <a class="navigation__link link <?php if((CONTROLLER_NAME) == "Photo"): ?>active<?php endif; ?>" href="<?php echo U('Photo/index');?>"><span><?php echo (L("photo")); ?></span></a>
                            <a class="navigation__link link <?php if((CONTROLLER_NAME) == "Contact"): ?>active<?php endif; ?>" href="<?php echo U('Contact/index');?>"><span><?php echo (L("contact")); ?></span></a>



                        </nav>

                    </div>
                    <!-- END Navigation-->
                </div>
            </div>
        </div>

    </header>

    <header class="headerWidget10 navWidget" id="headerWidget3151">
        <div class="navigator">
            <div class="topBar">
                <div class="navClose" id="navClose3151" style="">
                </div>
                <div class="navBurger" id="navBurger3151" style="">
                </div>
                <div class="logoWrap">
                    <a href="javascript:;">
                        <img src="/Public/home/img/logosmall.jpg" alt="hotel logo" class="logo">
                    </a>
                </div>
                <div class="mobileBooking">
                    <?php echo (L("order")); ?>
                </div>
            </div>

            <ul class="rightPart" style="">

                <li class="topNavBarDropdown" tabindex="1">
                    <span>
                        <i class="iconfont icon-Global"></i>
                        <?php echo l('lang');?>
                        <i class="iconfont icon-down"></i>
                    </span>
                    <ul class="dropdownList" tabindex="1">
                        <li class="dropdownListItem">
                            <a href="?lang=zh-cn" target="_self">简体中文
                            </a>
                        </li>
                        <li class="dropdownListItem" target="_self">
                            <a style="opacity: 0.5;" href="?lang=en-us">English</a>
                        </li>
                    </ul>

                    <script>
                        $(function () {
                            $('#headerWidget3151 .topNavBarDropdown').hover(function () {
                                $('.dropdownList').slideDown();
                            }, function () {
                                $('.dropdownList').slideUp();
                            });
                        })
                    </script>

                </li>
            </ul>
            <div class="bottomBar" style="">

                

                <ul class="navMenu">
                    <li class="navMenuItem">
                        <a href="<?php echo U('Index/index');?>" <?php if((CONTROLLER_NAME) == "Index"): ?>class="active"<?php endif; ?>><?php echo (L("home")); ?></a>

                    </li>
                    <li class="navMenuItem">
                        <a href="<?php echo U('About/index');?>" <?php if((CONTROLLER_NAME) == "About"): ?>class="active"<?php endif; ?>><?php echo (L("about")); ?></a>

                    </li>
                    <li class="navMenuItem">
                        <a href="<?php echo U('Anlu/index');?>" <?php if((CONTROLLER_NAME) == "Anlu"): ?>class="active"<?php endif; ?>><?php echo (L("anlu")); ?></a>

                    </li>

                    <li class="navMenuItem">
                        <a href="<?php echo U('Photo/index');?>" <?php if((CONTROLLER_NAME) == "Photo"): ?>class="active"<?php endif; ?>><?php echo (L("photo")); ?></a>

                    </li>
                    <li class="navMenuItem">
                        <a href="<?php echo U('Contact/index');?>" <?php if((CONTROLLER_NAME) == "Contact"): ?>class="active"<?php endif; ?>><?php echo (L("contact")); ?></a>

                    </li>
                </ul>
                <a href="<?php echo U('Order/roomlist');?>" class="bookingBtn">
                    <i class="iconfont icon-rili" style="font-size: 14px;"></i><span><?php echo (L("order")); ?></span>  
                </a>
            </div>



        </div>






    </header>



    <div class="modal modal--languages" id="languages-modal">
        <div class="modal__container">
            <div class="modal__header">
                <div class="header__image">
                    <div class="logo logo--alila ">
                        <a class="logo__link" href="#">
                            <div class="logo__image">
                                <svg>
                                    <use xlink:href="#alila_logo"></use>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <a href="#!" class="modal-close modal__close ">
                    <div class="icon icon--svg icon--alila_close_circle ">
                        <svg>
                            <use xlink:href="#alila_close_circle"></use>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="modal__main languages">
                <div class="languages languages--mobile">
                    <ul class="languages__list">

                        <li class="languages__item">
                            <a class="navigation__link languages__link" href="javascript:;">中文</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <!-- END Header-->
        <!-- Main Content-->





        <main class="main activity" id="main">
            <section class="section section--show" id="top">
                <article class="block block--feature block--generic">
                    <div class="block__wrapper">
                        <div class="block__image" style="background-image: url('/Public/home/img/banner/roomlist.jpg')"></div>

                    </div>
                </article>
            </section>

            <!-- 预订 -->
            <style>
                .sborder1 { position: relative; width: auto; float: none; margin: 0; padding: 0; padding: 10px 30px; }
                .sborder select { padding: 10px; }
                .sborder .title { font-size: 14px; margin-bottom: 6px; }

                input.ca { background-image: url(/Public/home/img/ca.jpg); background-repeat: no-repeat; background-position: right; padding: 11px 10px; }

                .sborder1 td { padding-left: 0; padding-right: 0; padding-bottom: 30px; }

                .sborder1 input, .sborder select { width: 100%; text-align: left; font-size: 14px; }

                .sborder1 .box { margin-bottom: 0; margin-right: 0; }

                .sborder1 table { margin: auto; }

                .sborder1 select { width: 86px; }

                .sborder1 input { width: auto; }
            </style>
            <div class="sborder sborder1" style="float: none;position: static;margin: 0;padding: 10px 30px;">
                <div class="sbmain max1024 roomlistorderWrap" style="overflow: hidden;">
                    <form action="<?php echo U('Order/roomlist');?>" method="POST" id="test">
                        <table>
                            <tbody>
                                <tr>
                                    <td style="padding-right: 0px;">
                                        <div class="title"><?php echo (L("start")); ?></div>
                                        <div class="box">


                                            <!-- <input type="text" class="ca" id="start" onchange="changedate()"  style="width: 140px;" name="start" value="<?php echo date("Y-m-d",strtotime("+1 day")) ?>" /> -->
                                            <input type="text" class="ca" id="start" onchange="changedate()" style="width: 140px;" name="start" value="<?php echo ($start); ?>" />
                                        </div>

                                    </td>
                                    <td style="padding-right: 0;">
                                        <div class="title"><?php echo (L("end")); ?></div>
                                        <div class="box">

                                            <input type="text" class="ca" id="end" name="end" style="width: 140px;" value="<?php echo ($end); ?>" />
                                            <!-- <input type="text" class="ca" id="end" name="end"  style="width: 140px;"  value="<?php echo date("Y-m-d",strtotime("+2 day")) ?>" /> -->
                                        </div>

                                    </td>
                                    <td style="padding-right: 0;">
                                        <div class="title"><?php echo (L("adult")); ?></div>
                                        <div class="box">
                                            <select name="adult">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="padding-right: 0;">
                                        <div class="title"><?php echo (L("child")); ?></div>
                                        <div class="box">
                                            <select name="child">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </td>

                                    <td style="padding-right: 0;">
                                        <div class="title"><?php echo (L("yudingday")); ?></div>
                                        <div class="box">
                                            <select name="day">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </td>

                                    <td style="padding-right: 0;">
                                        <div class="title"><?php echo (L("kefang")); ?></div>
                                        <div class="box">
                                            <select name="nums">
                                                <option value="1">1</option>
                                                <!-- <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option> -->
                                            </select>
                                        </div>
                                    </td>

                                    <td style="padding-right: 0;">
                                        <div class="title"><?php echo (L("youhui")); ?></div>
                                        <div class="box">
                                            <input type="text" class="ca" style="background-image:none;">
                                        </div>
                                    </td>

                                    <td>
                                        <div class="title title2">&nbsp;</div>
                                        <div class="box">
                                            <a class="book-button modal-trigger header__book" href="#" style="padding: 9px 0rem; width: auto; display: block;   padding: 13px; background: #323232;" onclick="check()">
                                                <h4 class="book-button__title" onclick="check()"><?php echo (L("order")); ?></h4>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <script>
                function check() {
                    var form = document.getElementById('test');
                    //再次修改input内容

                    form.submit();
                }
            </script>
            <!-- /预订 -->



            <div class="sbmain" style="margin-top: 70px;">
                <div class="roomdetail">


                    <div class="OrderFramePage">

                        <div class="OrderFramePaged">
                            <div class="OrderFramePagedBody">
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="OrderRoom">
                                        <div class="OrderRoomFrame">
                                            <div class="OrderRoomTitle"><?php echo ($vo["title"]); ?></div>
                                            <div class="OrderRoomPanel">
                                                <div class="OrderRoomImage">
                                                    <img class="OrderRoomImageImg" src="/Uploads/<?php echo ($vo["pic"]); ?>" style="width: 100%; height: 100%;">
                                                </div>
                                                <div class="OrderRoomSummary">
                                                    <?php echo ($vo["description"]); ?>
                                                </div>
                                                <div class="OrderRoomPrice">
                                                    <div class="C"></div>
                                                </div>
                                                <div class="OrderRoomToggle">
                                                    <a href="javascript:;" onclick="Cspk(this);"><span class="button__label btn1"><?php echo (L("fangjia")); ?> <i class="iconfont icon-you"></i><i class="iconfont icon-down"></i></span></a>
                                                </div>
                                            </div>



                                            <div class="OrderRoomList">
                                                <div class="OrderRoomLister">
                                                    <?php if(is_array($vo["roomtype"])): $i = 0; $__LIST__ = $vo["roomtype"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$price): $mod = ($i % 2 );++$i;?><div class="OrderRoomItem">
                                                            <!-- <div class="OrderRoomItem" > -->
                                                            <div class="OrderRoomItemFrame">
                                                                <div class="OrderRoomItemDetail">
                                                                    <div class="OrderRoomItemTitle"><?php echo ($price["title"]); ?></div>
                                                                    <div class="OrderRoomItemParams">
                                                                        <?php if(($_COOKIE['think_language']) == "en-us"): ?><div class="OrderRoomItemParam">Area：<?php echo ($price["area"]); ?></div>
                                                                            <div class="OrderRoomItemParam">Bed：<?php echo ($price["bed"]); ?></div>
                                                                            <div class="OrderRoomItemParam">Extra bed：<?php echo ($price["add"]); ?></div>
                                                                            <div class="OrderRoomItemParam">Floor：<?php echo ($price["floor"]); ?></div>
                                                                            <?php else: ?>
                                                                            <div class="OrderRoomItemParam">面积：<?php echo ($price["area"]); ?></div>
                                                                            <div class="OrderRoomItemParam">床型：<?php echo ($price["bed"]); ?></div>
                                                                            <div class="OrderRoomItemParam">加床：<?php echo ($price["add"]); ?></div>
                                                                            <div class="OrderRoomItemParam">楼层：<?php echo ($price["floor"]); ?></div><?php endif; ?>

                                                                        <div class="C"></div>
                                                                    </div>

                                                                </div>
                                                                <div class="OrderRoomItemOrder">
                                                                    <?php if(($_COOKIE['think_language']) == "en-us"): ?><div class="OrderRoomItemPrice"><span class="Price">RMB<?php echo ($price["sprice"]); ?></span> per night</div>
                                                                        <?php else: ?>
                                                                        <div class="OrderRoomItemPrice">每晚 <span class="Price">￥<?php echo ($price["sprice"]); ?></span>起</div><?php endif; ?>

                                                                    <div class="OrderRoomItemToggle">
                                                                        <a class="OrderRoomItemToggleBtn" href="<?php echo U('Order/pay',array('id' => $price['id']));?>"><?php echo (L("liji")); ?></a>
                                                                        <div class="C"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="C"></div>
                                                            </div>
                                                        </div><?php endforeach; endif; else: echo "" ;endif; ?>



                                                </div>
                                            </div>

                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                            </div>


                            <style>
                                .OrderFramePaged .OrderFramePagedSide .OrderFramePagedSideItems .OrderFramePagedSideItem .OrderFramePagedSideItemKey{
                                width:79px;
                                }

                                .OrderFramePaged .OrderFramePagedSide .OrderFramePagedSideItems .OrderFramePagedSideItem .OrderFramePagedSideItemKey.en-us {
                                    width: 100px;
                                }
                            </style>

                            <div class="OrderFramePagedSide">
                                <div class="OrderFramePagedSideFrame">

                                    <div class="OrderFramePagedSideImage">
                                        <img class="OrderFramePagedSideImageImg" src="/Public/home/img/banner/1.jpg" style="width: 100%;">
                                    </div>
                                    <div class="OrderFramePagedSideItems">
                                        <div class="OrderFramePagedSideItem">
                                            <span class="IB OrderFramePagedSideItemKey <?php echo (cookie('think_language')); ?>" style="margin-right: 1em;  display: inline-block;"><?php echo (L("start")); ?>：</span>
                                            <span class="IB OrderFramePagedSideItemVal"><?php echo ($start); ?></span>
                                            <div class="C"></div>
                                        </div>
                                        <div class="OrderFramePagedSideItem">
                                            <span class="IB OrderFramePagedSideItemKey <?php echo (cookie('think_language')); ?>" style="margin-right: 1em; display: inline-block;"><?php echo (L("end")); ?>：</span>
                                            <span class="IB OrderFramePagedSideItemVal"><?php echo ($end); ?></span>
                                            <div class="C"></div>
                                        </div>
                                        <div class="OrderFramePagedSideItem">
                                            <span class="IB OrderFramePagedSideItemKey <?php echo (cookie('think_language')); ?>" style="margin-right: 1em; display: inline-block;"><?php echo (L("wanshu")); ?>：</span>
                                            <span class="IB OrderFramePagedSideItemVal">
                                                <?php echo ($day); if(($_COOKIE['think_language']) == "en-us"): else: ?>
                                                    晚<?php endif; ?>
                                            </span>
                                            <div class="C"></div>
                                        </div>
                                        <div class="OrderFramePagedSideItem">
                                            <span class="IB OrderFramePagedSideItemKey <?php echo (cookie('think_language')); ?>" style="margin-right: 1em; display: inline-block;"><?php echo (L("nums")); ?>：</span>
                                            <span class="IB OrderFramePagedSideItemVal">
                                                <?php echo ($nums); if(($_COOKIE['think_language']) == "en-us"): else: ?>
                                                    间<?php endif; ?>
                                            </span>
                                            <div class="C"></div>
                                        </div>
                                        <div class="OrderFramePagedSideItem">
                                            <span class="IB OrderFramePagedSideItemKey <?php echo (cookie('think_language')); ?>" style="margin-right: 1em; display: inline-block;"><?php echo (L("adults")); ?>：</span>
                                            <span class="IB OrderFramePagedSideItemVal">
                                                <?php echo ($adult); if(($_COOKIE['think_language']) == "en-us"): else: ?>
                                                    人<?php endif; ?>
                                            </span>
                                            <div class="C"></div>
                                        </div>
                                        <div class="OrderFramePagedSideItem">
                                            <span class="IB OrderFramePagedSideItemKey <?php echo (cookie('think_language')); ?>" style="margin-right: 1em; display: inline-block;"><?php echo (L("childs")); ?>：</span>
                                            <span class="IB OrderFramePagedSideItemVal">
                                                <?php echo ($child); if(($_COOKIE['think_language']) == "en-us"): else: ?>
                                                    人<?php endif; ?>
                                            </span>
                                            <div class="C"></div>
                                        </div>
                                        <div class="OrderFramePagedSideBtn">
                                            <a class="OrderFramePagedSideBtnLink" href="javascript:history.go(-1)"><?php echo (L("back")); ?></a>
                                        </div>

                                        <div class="OrderFramePagedSideContact">
                                            <div class="OrderFramePagedSideContactItem">○ <?php echo (L("tel")); ?></div>
                                            <div class="OrderFramePagedSideContactItem">○ <?php echo (L("email")); ?></div>
                                        </div>
                                        <div class="OrderFramePagedSideWork"><?php echo (L("work")); ?></div>
                                        <div class="OrderFramePagedSideWork"><?php echo (L("day")); ?></div>

                                        <div class="BR" style="height: 30px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="C"></div>
                        </div>

                    </div>


                </div>
            </div>





        </main>


        <script>
            function Cspk(link) {
                $(link).toggleClass("Active");
                $(link).parents(".OrderRoom").find(".OrderRoomList").slideToggle("fast");
            }
        </script>

        <script src="/Public/home/js/laydate/laydate.js"></script>
        <script>
            function addDate(date, days) {
                if (days == undefined || days == '') {
                    days = 1;
                }
                var date = new Date(date);
                date.setDate(date.getDate() + days);
                var month = date.getMonth() + 1;
                var day = date.getDate();
                return date.getFullYear() + '-' + getFormatDate(month) + '-' + getFormatDate(day);
            }
            function getFormatDate(arg) {
                if (arg == undefined || arg == '') {
                    return '';
                }

                var re = arg + '';
                if (re.length < 2) {
                    re = '0' + re;
                }

                return re;
            }


            laydate.render({
                elem: '#start',
                // min: '<?php echo ($start); ?>',
                min: 0,
                max: 89,
                done: function (value, date, endDate) {
                    var end = $('#end').val();
                    if (value >= end) {
                        $('#end').val(addDate(value, 1));
                    }
                },
                lang: '<?php if(($_COOKIE['think_language']) == "en-us"): ?>en<?php else: ?>cn<?php endif; ?>',
            });
            laydate.render({
                elem: '#end',
                // min: +1,
                min:1,
                max:90,
                done: function (value, date, endDate) {
                    var start = $('#start').val();
                    if (value <= start) {
                        $('#start').val(addDate(value, -1));
                    }
                },
                lang: '<?php if(($_COOKIE['think_language']) == "en-us"): ?>en<?php else: ?>cn<?php endif; ?>',
            });
        </script>




        <block name="footer">
        


    <footer class="footer" id="footer">
        <div class="footer__content">






            <div class="footer__section footer__section--four">

                <div class="footer__logos footer__logos--follow" style="text-align: left;">
                    <div class="footer__label">
                        <?php echo (L("lianxi")); ?>
                    </div>
                    <ul class="footer__logos-list icon__list">
                        <li class="footer__logos-item icon__item">
                            <a class="footer__logos-link icon__link" target="_self" href="javascript:;">
                                <div class="icon icon--svg icon--alila_twitter">
                                    <i class="iconfont icon-weixin"></i>
                                </div>
                            </a>

                            <div class="imgwrap">
                                <img src="/Public/home/img/weixin.png" class="img" />
                            </div>

                        </li>
                        <li class="footer__logos-item icon__item">
                            <a class="footer__logos-link icon__link" target="_blank" href="https://weibo.com/u/6291963150?nick=千岛湖安麓&is_hot=1">
                                <div class="icon icon--svg icon--alila_twitter">
                                    <i class="iconfont icon-weibo"></i>
                                </div>
                            </a>
                        </li>
                        <li class="footer__logos-item icon__item moreDetailWrap">
                            <a class="footer__logos-link icon__link" target="_self" href="javascript:;" id="footerPhone">
                                <div class="icon icon--svg icon--alila_twitter">
                                    <i class="iconfont icon-brand" style="position: relative; top: -1px;"></i>
                                </div>
                            </a>						 
                        </li>
                        <li class="footer__logos-item icon__item">
                            <a class="footer__logos-link icon__link" target="_self" href="javascript:;" id="footerEmail">
                                <div class="icon icon--svg icon--alila_twitter">
                                    <i class="iconfont icon-youjian"></i>
                                </div>
                            </a>
                        </li>
						
						
			 
						
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="icon__item footer__action-top">
                <a class="icon__link" href="#top">
                    <span class="icon__label"><?php echo (L("copyright")); ?></span>
                </a>
            </div>

        </div>
    </footer>

    <div class="page__sticky-book-mobile mobile">
        <a class="book-button modal-trigger book-button--block" href="<?php echo U('Order/index');?>">
            <h4 class="book-button__title"><?php echo (L("order1")); ?></h4>
        </a>
    </div>

    <script>
        $(function () {
            $('.hamburger__open').click(function () {
                $('#foldoutMenu').addClass('active')
            })

            $('#foldoutMenu .logo__image').click(function () {
                $('#foldoutMenu').removeClass('active')
            })
			
			
			var footerPhone=false;
			$('#footerPhone').hover(function(){
				if(!footerPhone){
					layer.tips('0571-65050888', '#footerPhone', {
					  tips: [1, '#c18510'],
					  time: 4000
					});
					footerPhone=true;
				}			
			
			},function(){
				footerPhone=false;
				layer.closeAll(); 
			});
			
			
			var footerEmail=false;
			$('#footerEmail').hover(function(){
				if(!footerEmail){
					layer.tips('reservation.qdh@ahnluh.com  ', '#footerEmail', {
					  tips: [1, '#c18510'],
					  time: 4001
					});
					footerEmail=true;
				}			
			
			},function(){
				footerEmail=false;
				layer.closeAll(); 
			});
        })


        $(window).on("scroll", function () {
            // 200 < $(window).scrollTop() ? $("#J_block_sidebar").show() : $("#J_block_sidebar").hide()

        })

    </script>
	
	<style>
	[showtime="4001"]{
	    width: 230px!important;
	}
	</style>
    <link href="/Public/home/css/media.css" rel="stylesheet" />

</body>

</html>






</body>
</html>