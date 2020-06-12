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
        /*大banner*/
        .sborder { /*padding-right: 140px;*/ }
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
        <main class="main activity" id="main">
            <div class="sborderwrap">
                <div class="sborder">
                    <form action="" method="POST" id="test">
                        <style>
                            .sborder td { vertical-align: top; padding-bottom: 0; }
                        </style>
                        <table>
                            <tr>
                                <td colspan="2" style="padding-bottom: 0;">
                                    <div class="title" style="margin-bottom: 0;">
                                        <?php echo l('ydxx');?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom:0;">
                                    <div class="box">
                                        <span class="title1"><?php echo (L("start")); ?>：</span>
                                        <span class="text"><?php echo ($startDate); ?></span>
                                    </div>
                                    <div class="box">
                                        <span class="title1"><?php echo (L("end")); ?>：</span>
                                        <span class="text"><?php echo ($endDate); ?></span>
                                    </div>    <div class="box">
                                                  <span class="title1"><?php echo (L("yudingday")); ?>：</span>
                                        <span class="text"><?php echo ($day); echo l('ydday');?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="box">
                                        <span class="title1"><?php echo (L("num")); ?>：</span>
                                        <span class="text"><?php echo ($people); if(($_COOKIE['think_language']) == "en-us"): else: ?>
                                                                        人<?php endif; ?></span>
                                    </div>
                                    <div class="box">
                                        <span class="title1"><?php echo (L("kefang")); ?>：</span>
                                        <span class="text"><?php echo ($nums); if(($_COOKIE['think_language']) == "en-us"): else: ?>
                                                                        间<?php endif; ?></span>
                                    </div>    <div class="box">
                                                  <span class="title1"><?php echo (L("youhui")); ?>：</span>
                                        <span class="text"><?php echo ($code); ?></span>
                                    </div>
                                </td>
                            </tr>
                            <!--
                            
                            
                            -->
                            <tr>
                                <td style="padding-bottom:0;">
                                    <div class="box">
                                        <span class="title1"><?php echo (L("name")); ?>：</span>
                                        <input type="text" name="name" id="name"/>
                                    </div>
                                    <div class="box">
                                        <span class="title1"><?php echo (L("emails")); ?>：</span>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                </td>
                                <td>
                                    <div class="box">
                                        <span class="title1"><?php echo (L("mobile")); ?>：</span>
                                        <input type="text" name="mobile" id="mobile" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-bottom: 0;padding-top:0;">
                                    <div class="title" style="margin-bottom: 0;color: #000;font-size: 15px;"><?php echo (L("liuyan")); ?>:</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top:10px;">
                                    <div class="box" style="margin-bottom: 0; margin-right: 10px;">
                                        <textarea style="width: 100%;height:92px;" name="info" ></textarea>
										
										<a href="<?php echo U('Order/policy');?>" target="_blank" style=" font-size: 15px; color: #d8ae69; margin-top: 3px;"><?php echo (L("yuyue")); ?>
    <i class="iconfont icon-you" style="  font-size: 8px;  position: relative; left: -6px; display: none;"></i>
</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div style="text-align: center; background: #eee; padding: 14px 10px; font-size: 14px;margin-right:10px;">
                                        <?php echo (L("jine")); ?>：<span style="color: #d8ae69;">CNY <?php echo ($total_fee); ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-bottom: 0;">
                                    <div class="title" style="margin-bottom: 0;"><?php echo (L("paytype")); ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-bottom: 0; text-align: center;">
                                    <style>
                                        .payType { display: inline-block; font-size: 16px; }
                                        .payType i { font-size: 36px; }
                                        .payType .iconwrap { width: 78px; height: 78px; border-radius: 100%; display: inline-block; line-height: 78px; background: #eee; margin: 0 50px; color: #8e8e8e; margin-bottom: 10px; }
                                        .payType.active .iconwrap { background: #d8ae69; color: #fff; }
                                    </style>
                                    <?php if(($roomtype["paytype"]) == "0"): ?><span class="payType active" paytype="3">
                                            <span class="iconwrap"><i class="iconfont icon-mendianguanli"></i></span>
                                            <div><?php echo (L("cash")); ?></div>
                                        </span>
                                        <?php else: ?>
                                        <span class="payType active" paytype="22">
                                            <span class="iconwrap"><i class="iconfont icon-shiliangzhinengduixiang1" style="font-size: 31px;"></i></span>
                                            <div><?php echo (L("alipay")); ?></div>
                                        </span>
                                        <span class="payType" paytype="21">
                                            <span class="iconwrap"><i class="iconfont icon-weixin1" style="font-size: 36px;"></i></span>
                                            <div><?php echo (L("wechat")); ?></div>
                                        </span><?php endif; ?>
                                    
                                    
                                    <script>
                                        $(function () {
                                            $('.payType').click(function () {
                                                $('.payType').removeClass('active');
                                                $(this).addClass('active');
                                                $("#paytype").val($(this).attr("paytype"));
                                            })
                                        })
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="javascript:history.go(-1);">
                                        <span class="next btn21" style="margin-right: 50px; color: #8e8e8e">
                                            <span><?php echo (L("back")); ?></span>
                                        </span>
                                    </a>
                                    <input type="hidden" name="paytype" value="22" id="paytype">
                                    <input type="hidden" name="id" value="<?php echo ($roomtype["id"]); ?>">
                                    <input type="hidden" name="roomid" value="<?php echo ($roomtype["roomid"]); ?>">
                                    <a href="javascript:;" onclick="check()">
                                        <span class="next  btn22">
                                            <span><?php echo (L("tijiao")); ?></span>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <script>
                        function check() {
                            var form = document.getElementById('test');
                            if($("#name").val() == ''){
                                layer.msg("<?php echo l('require_name');?>");
                                return false;
                            }
                            if($("#email").val() == ''){
                                layer.msg("<?php echo l('require_email');?>");
                                return false;
                            }
                            if($("#mobile").val() == ''){
                                layer.msg("<?php echo l('require_phone');?>");
                                return false;
                            }
                            //再次修改input内容
                            form.submit();
                        }
                    </script>
                </div>
            </div>
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