<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
	body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
	#allmap {height: 500px;width:100%;overflow: hidden;}
	#result {width:100%;font-size:12px;}
	dl,dt,dd,ul,li{
		margin:0;
		padding:0;
		list-style:none;
	}
	dt{
		font-size:14px;
		font-family:"微软雅黑";
		font-weight:bold;
		border-bottom:1px dotted #000;
		padding:5px 0 5px 5px;
		margin:5px 0;
	}
	dd{
		padding:5px 0 0 5px;
	}
	li{
		line-height:28px;
	}

        .anchorBL{
            display:none;
        }
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=D1e0b593a1a229a317a2aaafd71c1e91"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.js"></script>
	<link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />
	<title>带检索功能的信息窗口</title>
</head>
<body>
	<div id="allmap">	
	</div>
	<div id="result">
		<input type="button" value="默认样式" onclick="searchInfoWindow.open(marker);"/>
		<input type="button" value="样式1" onclick="openInfoWindow1()"/>
		<input type="button" value="样式2" onclick="openInfoWindow2()"/>
		<input type="button" value="样式3" onclick="openInfoWindow3()"/>
	</div>
<script type="text/javascript">
	// 百度地图API功能
    var map = new BMap.Map('allmap');
    var poi = new BMap.Point(118.696107, 29.483563 );
    map.centerAndZoom(poi, 12);
    map.enableScrollWheelZoom();

    var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                    '<img src="../img/baidu.jpg" alt="" style="float:right;zoom:1;overflow:hidden;width:30px;height:100px;margin-left:3px;"/>' +
                    '地址：中国杭州市淳安县姜家镇灵岩路168号' +
                  '</div>';

    //创建检索信息窗口对象
    var searchInfoWindow = null;
	searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
        title: "安麓",      //标题
			width  : 290,             //宽度
			height : 105,              //高度
			panel  : "panel",         //检索结果面板
			enableAutoPan : true,     //自动平移
			searchTypes   :[
				BMAPLIB_TAB_SEARCH,   //周边检索
				BMAPLIB_TAB_TO_HERE,  //到这里去
				BMAPLIB_TAB_FROM_HERE //从这里出发
			]
		});
    var marker = new BMap.Marker(poi); //创建marker对象
    marker.enableDragging(); //marker可拖拽
    marker.addEventListener("click", function(e){
	    searchInfoWindow.open(marker);
    })
    map.addOverlay(marker); //在地图中添加marker
	//样式1
	var searchInfoWindow1 = new BMapLib.SearchInfoWindow(map, "信息框1内容", {
		title: "信息框1", //标题
		panel : "panel", //检索结果面板
		enableAutoPan : true, //自动平移
		searchTypes :[
			BMAPLIB_TAB_FROM_HERE, //从这里出发
			BMAPLIB_TAB_SEARCH   //周边检索
		]
	});
	function openInfoWindow1() {
        searchInfoWindow1.open(new BMap.Point(118.696107, 29.483563));
	}
	//样式2
	var searchInfoWindow2 = new BMapLib.SearchInfoWindow(map, "信息框2内容", {
		title: "信息框2", //标题
		panel : "panel", //检索结果面板
		enableAutoPan : true, //自动平移
		searchTypes :[
			BMAPLIB_TAB_SEARCH   //周边检索
		]
	});
	function openInfoWindow2() {
        searchInfoWindow2.open(new BMap.Point(118.696107, 29.483563));
	}
	//样式3
	var searchInfoWindow3 = new BMapLib.SearchInfoWindow(map, "信息框3内容", {
		title: "信息框3", //标题
		width: 290, //宽度
		height: 40, //高度
		panel : "panel", //检索结果面板
		enableAutoPan : true, //自动平移
		searchTypes :[
		]
	});
	function openInfoWindow3() {
        searchInfoWindow3.open(new BMap.Point(118.696107, 29.483563)); 
	}
</script>
</body>
</html>