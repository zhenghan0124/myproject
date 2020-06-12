<?php
return array(
  //'配置项'=>'配置值'
  'URL_CASE_INSENSITIVE' =>true,      //开启不区分大小写
  // 'SHOW_PAGE_TRACE' => true,       //开启页面trace
  'URL_MODEL' => '1',
  'URL_HTML_SUFFIX'=>'',	//伪静态后缀
  'COOKIE_PATH' => '/',				//设置cookie目录


  'DB_TYPE'   => 'mysqli', // 数据库类型
  'DB_HOST'   => 'localhost', // 服务器地址
  'DB_NAME'   => 'anlu', // 数据库名
  'DB_USER'   => 'root', // 用户名
  'DB_PWD'    => '',  // 密码
  'DB_PORT'   => '3306', // 端口
  'DB_PREFIX' => 'qy_', // 数据库表前缀

  'DB_WE7' => array(
      'db_type'  => 'mysql',
      'db_user'  => 'we7',
      'db_pwd'   => 'qw12er34',
      'db_host'  => 'rds2qh67znyrc80pck340993.mysql.rds.aliyuncs.com',
      'db_port'  => '3306',
      'db_name'  => 'we7'
  ),

  //模块
  'MODULE_ALLOW_LIST'  => array('Home','Admin'),
  'DEFAULT_MODULE'       =>    'Home',



    // 配置邮件发送服务器
  'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称
  'MAIL_PORT' => 465,
  'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
  'MAIL_USERNAME' =>'rita1140@163.com',//你的邮箱名
  'MAIL_FROM' =>'rita1140@163.com',//发件人地址
  'MAIL_FROMNAME'=>'千岛湖安麓酒店',//发件人姓名
  'MAIL_PASSWORD' =>'AHNLUH2019',//邮箱密码
  'MAIL_CHARSET' =>'utf-8',//设置邮件编码
  'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
  'MAIL_SSL' =>TRUE, // 是否使用SSL加密
  'signature'=>'&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;a href=&quot;http://www.yhbox.cn/&quot; target=&quot;_blank&quot;&gt;&lt;strong&gt;杭州云互科技有限公司&lt;/strong&gt;&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;服务热线:0571-87950771&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;color: rgb(192, 0, 0);&quot;&gt;浙江省饭店业金牌供应商&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;color: rgb(192, 0, 0);&quot;&gt;中国饭店协会信息化建设优秀合作伙伴&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;color: rgb(192, 0, 0);&quot;&gt;腾讯官网微信渠道开发合作商&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;color: rgb(192, 0, 0);&quot;&gt;阿里云大数据中心合作伙伴&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;color: rgb(192, 0, 0);&quot;&gt;支付宝支付业务合作商&lt;/span&gt;&lt;/p&gt;',

);
