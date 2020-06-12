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






    
    <style>
        .activity .grid--column-2 img {
            width: 100%;
        }


        @media (min-width: 769px) {
            .grid--column-2 article.article--page, .grid--column-2 .article.article--page {
                padding-left: 5%;
                padding-right: 5%;
            }
        }

        .icon__label.btn1{
            margin-left:0;
        }
    </style>


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




    
    <main class="main activity water" id="main">
        <section class="section section--show" id="top">
            <article class="block block--feature block--generic">
                <div class="block__wrapper">
                    <div class="block__image" style="background-image: url('/Uploads/<?php echo ($data1); ?>');background-size:100% 100%;"></div>

                </div>
            </article>
        </section>
        <style>
            h2{
                margin-top:30px!important;
                margin-bottom:30px!important;
            }
        </style>
        <div class="sbmain">
            <section class="section section--show">
                <article class="article article--page" style="background:none;padding-left:160px;padding-right:160px;">

                    <h4><?php echo (L("qiandao")); ?></h4>
                    <?php echo ($data["content"]); ?>
                   
                </article>
            </section>
        </div>
        
       

        <style>
            .grid--third-window-height > .grid__wrapper{
                padding:0;
            }
        </style>

        <section class="section grid grid--third-window-height grid--column-3 section--show" style="margin-bottom: 60px;">
            <div class="grid__wrapper ">
                <?php if(is_array($shuiliao)): $i = 0; $__LIST__ = $shuiliao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><article class="block block--link block--vertical--new grid__item">
                        <div class="block__wrapper">



                            <div class="block__image" style="background-image: url(/Uploads/<?php echo ($vo["pic"]); ?>)"></div>

                            <div class="block__container">
                                <div class="block__info">
                                    <div class="block__name name">
                                    </div>

                                </div>

                                <div class="block__content">
                                    <div class="block__content-container">
                                        <h2 class="block__title title"><?php echo ($vo["title"]); ?></h2>
                                        <div class="block__body text"><?php echo ($vo["description"]); ?></div>
                                    </div>
                                </div>

                                <div class="block__settings">
                                    <ul class="icon__list">
                                        <li class="icon__item block__readmore">
                                            <a class="icon__link" href="<?php echo U('detail',array('id' => $vo['id']));?>">
                                                
                                                <span class="icon__label  btn1"><?php echo (L("more")); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article><?php endforeach; endif; else: echo "" ;endif; ?>
                <!-- <article class="block block--link block--vertical--new grid__item">
                    <div class="block__wrapper">



                        <div class="block__image" style="background-image: url(/Public/home/img/room/1.jpg)"></div>

                        <div class="block__container">
                            <div class="block__info">
                                <div class="block__name name">
                                </div>

                            </div>

                            <div class="block__content">
                                <div class="block__content-container">
                                    <h2 class="block__title title">半日休闲水疗礼遇</h2>
                                    <div class="block__body text">完美的半日身心焕彩计划融合百年古老美容秘方和健康生活方式，给您无微不至的呵护。</div>
                                </div>
                            </div>

                            <div class="block__settings">
                                <ul class="icon__list">
                                    <li class="icon__item block__readmore">
                                        <a class="icon__link" href="spa.html">
                                            
                                            <span class="icon__label  btn1">了解更多</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article> -->
                 
                <!-- <article class="block block--link block--vertical--new grid__item">
                    <div class="block__wrapper">



                        <div class="block__image" style="background-image: url(/Public/home/img/room/2.jpg)"></div>

                        <div class="block__container">
                            <div class="block__info">
                                <div class="block__name name">
                                </div>

                            </div>

                            <div class="block__content">
                                <div class="block__content-container">
                                    <h2 class="block__title title">泰式按摩</h2>
                                    <div class="block__body text">完美的半日身心焕彩计划融合百年古老美容秘方和健康生活方式，给您无微不至的呵护。</div>
                                </div>
                            </div>

                            <div class="block__settings">
                                <ul class="icon__list">
                                    <li class="icon__item block__readmore">
                                        <a class="icon__link" href="spa.html">

                                            <span class="icon__label  btn1">了解更多</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>


                <article class="block block--link block--vertical--new grid__item">
                    <div class="block__wrapper">



                        <div class="block__image" style="background-image: url(/Public/home/img/room/3.jpg)"></div>

                        <div class="block__container">
                            <div class="block__info">
                                <div class="block__name name">
                                </div>

                            </div>

                            <div class="block__content">
                                <div class="block__content-container">
                                    <h2 class="block__title title">爪洼按摩</h2>
                                    <div class="block__body text">完美的半日身心焕彩计划融合百年古老美容秘方和健康生活方式，给您无微不至的呵护。</div>
                                </div>
                            </div>

                            <div class="block__settings">
                                <ul class="icon__list">
                                    <li class="icon__item block__readmore">
                                               <a class="icon__link" href="spa.html">

                                            <span class="icon__label  btn1">了解更多</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article> -->
            </div>
        </section>

    </main>



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