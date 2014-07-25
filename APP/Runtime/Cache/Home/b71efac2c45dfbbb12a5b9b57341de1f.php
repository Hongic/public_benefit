<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- 首页  -->
<html>
    <head>
        <title>新青年公益社--首页</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/CSS/public.css"/>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/CSS/main.css"/>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/CSS/pic.css"/>
        <script type='text/javascript' src='__PUBLIC__/Js/marquee.js'></script>
	
	
	
    </head>
    <body>

        <!--   页头：导航栏       -->
    <!--   页头：导航栏       -->
<div class="hdf">
    <div class="header">

        <!-- 导航栏  -->
        <div class="navigation">
            <ul>
                <!--   会标图   -->
                <li><img src="__PUBLIC__/Images/huibiao.jpg"></li>

                <!-- 导航栏  -->
                <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
                <li><a href="__ROOT__/Us/index">关于我们</a></li>
                <li><a href="__ROOT__/Organize/index">组织机构</a></li>
                <li><a href="__ROOT__/Member/index">本届成员</a></li>
                <li><a href="__ROOT__/News/index">新闻动态</a></li>
                <li><a href="__ROOT__/Activity/index">公益活动</a></li>
                <li><a href="__ROOT__/Investor/index">公益投资</a></li>
            </ul>
        </div>

    </div>
</div>

    <!--   主要内容           -->
    <div class="main">

    <!--                    LOGO  1000x200                                           -->
    <div style="height: 300px;width: 1000px;">
        <img src="__PUBLIC__/Images/logo.jpg" class="main_img">
    </div>

    <!--                            站内公告                                 -->
    <div style="color: red;font-size: 20px;font-weight: bolder;">
        <marquee>
            <p><?php echo ($notice); ?></p>
        </marquee>
    </div>

    <!--                    本届会长、最新公益、新闻动态                     -->
    <div>

        <!--               本届会长：左 （图文混合）                         -->
        

        <!--                   最新公益：中 （纯文字）                       -->
        <div class="first">
            <!--  背景是图片    -->
            <div style="background-color: #68f2eb;width: 483px;; font-size: 20px;padding-left: 6px;">
                最新公益
            </div>
            <?php if(is_array($act)): $i = 0; $__LIST__ = $act;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span style="float: left;padding-left: 3px;"> 
                    <a href="__GROUP__/Activity/content/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>">
                        <?php echo (utf8substr($vo["title"],0,14)); ?>
                    </a>  
                </span>
                <span style="float: right;padding-right: 3px;">
                    <?php echo (substr($vo["time"],0,10)); ?>
                </span>
                <br><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <!--               新闻动态：右 （纯文字）                           -->
        <div class="first">
            <!--  背景是图片    -->
            <div style="background-color: #68f2eb;width: 483px;; font-size: 20px;padding-left: 6px;">
                新闻动态
            </div>

            <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span style="float: left;padding-left: 3px;"> 
                    <a href="__GROUP__/News/content/id/<?php echo ($vo["id"]); ?>" title="<?php echo ($vo["title"]); ?>">
                        <?php echo (utf8substr($vo["title"],0,14)); ?>
                    </a>  
                </span>
                <span style="float: right;padding-right: 3px;">
                    <?php echo (substr($vo["time"],0,10)); ?>
                </span>
                <br><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
    </div>

    <!--                     活动图  左滚动                                  -->
    <div class="pic">
        <!--  背景是图片    -->
        <div style="width: 997px;height: 27px; background-color: #68f2eb; font-size: 25px;vertical-align: middle;padding-top: 5px;">
            活动图
        </div>
        <div id="demo">
            <div id="indemo">
                <div id="demo1">
                    <?php if(is_array($pic)): $i = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pic): $mod = ($i % 2 );++$i;?><div class="two">
                            <a href="<?php echo ($pic["site"]); ?>"  target="_blank">
                                <img src="__ROOT__/Uploads/Pic/<?php echo ($pic["address"]); ?>" border="0"><br>
                                <?php echo ($pic["title"]); ?>
                            </a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
                <div id="demo2"> </div>
            </div>
        </div>


    </div>


    <script>

        var speed = 10;
        var tab = document.getElementById("demo");
        var tab1 = document.getElementById("demo1");
        var tab2 = document.getElementById("demo2");
        tab2.innerHTML = tab1.innerHTML;
        function Marquee() {
            if (tab2.offsetWidth - tab.scrollLeft <= 0)
                tab.scrollLeft -= tab1.offsetWidth
            else {
                tab.scrollLeft++;
            }
        }
        var MyMar = setInterval(Marquee, speed);
        tab.onmouseover = function() {
            clearInterval(MyMar)
        };
        tab.onmouseout = function() {
            MyMar = setInterval(Marquee, speed)
        };

    </script>



</div>


    <!--  页尾  -->
    
<!--   页尾：版权、校内、投资公司   -->
<div class="fo">

    <!--   版权      -->
    <div class="foot">
        <div class="foote">
            版权信息  
            <hr>
            <?php if(is_array($copyRight)): $i = 0; $__LIST__ = $copyRight;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["content"]); endforeach; endif; else: echo "" ;endif; ?>
            <div style="text-align: center;">
                <a href="__ROOT__/Admin/Index/index">
                    管理
                </a>
            </div>
        </div>

        <!--   校内      -->
        <div class="foote">
            校内链接 
            <hr>
            <?php if(is_array($school)): $i = 0; $__LIST__ = $school;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span style="width:158px;display: block;float: left;border:"> 
                    <a href="<?php echo ($vo["address"]); ?>" target="_blank" title="<?php echo ($vo["name"]); ?>"><?php echo (utf8substr($vo["name"],0,9)); ?></a>
                </span><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>

        <!--   投资公司      -->
        <div class="foote">
            公益  
            <hr>
            <?php if(is_array($company)): $i = 0; $__LIST__ = $company;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span style="width:158px;display: block;float: left;"> 
                    <a href="<?php echo ($vo["addr"]); ?>" target="_blank" title="<?php echo ($vo["company"]); ?>"><?php echo (utf8substr($vo["company"],0,9)); ?></a>
                </span><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

</div>
</body>
</html>