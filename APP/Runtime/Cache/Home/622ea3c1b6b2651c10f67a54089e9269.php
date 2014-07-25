<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>新青年公益社--公益投资</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/CSS/public.css"/>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/CSS/main.css"/>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/CSS/table.css"/>
    </head>
    <body>
        <!--              页头：导航栏                               -->
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

    <!---                公益投资                                    -->
    <!---                公益投资                                   --->
<div class="main">

    <!--    左边：投资时间列表      desc      -->
    <div class="activity_left">
        <h2>最新公益</h2>
        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inve): $mod = ($i % 2 );++$i;?><span style="float: left;"> 
                <a href="__URL__/content/id/<?php echo ($inve["id"]); ?>" title="<?php echo ($inve["title"]); ?>"><?php echo (utf8substr($inve["title"],0,32)); ?></a>  
            </span>
            <span style="float: right;">
                -------- <?php echo (substr($inve["time"],0,10)); ?>
            </span>
            <br><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="page"><?php echo ($page); ?></div>
    </div>

    <!--    右边：阅读点击榜        desc      -->
    <div class="activity_right">
        <span style="float: left;padding: 3px;background-color: #68f2eb;;width: 100%;">
            <h2>公益榜</h2>
        </span>

        <br> 
        <div class="rank">
            <?php if(is_array($investor)): $k = 0; $__LIST__ = $investor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inv): $mod = ($k % 2 );++$k;?>【<?php echo ($k); ?>】
                <a href="__URL__/content/id/<?php echo ($inv["id"]); ?>" title="<?php echo ($inv["title"]); ?>">
                    <?php echo (utf8substr($inv["title"],0,17)); ?>
                </a>  

                <br><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>

</div>

    <!--                页尾                                         -->
    
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