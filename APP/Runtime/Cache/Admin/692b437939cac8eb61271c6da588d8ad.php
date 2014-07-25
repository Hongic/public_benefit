<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>后台管理--首页--菜单栏</title>
        <style type="text/css">
            *{margin:0; padding:0}
            #nav{
                width:180px;
                margin:10px;
                border-radius: 10px;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
            }
            #nav h3{ 
                text-align: center;
                cursor:pointer; 
                line-height:30px; 
                height:30px; 
                background-color:#00AAFF; 
                color:#fff;
                border-radius: 10px;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
            }
            #nav a{
                text-align: center;
                padding: 6px;
                display:block; 
                line-height:24px;
                color:#666666;
                border-radius: 10px;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
            }
            #nav a:hover{
                background-color:#eee; 
                color:#000;
            }
            #nav div{
                display:none; 
                border:1px solid #000; 
                border-top:none
            }
        </style>
        <script type="text/javascript">
            function $(id) {
                return document.getElementById(id)
            }
            window.onload = function() {
                $("nav").onclick = function(e) {
                    var src = e ? e.target : event.srcElement;
                    if (src.tagName == "H3") {
                        var next = src.nextElementSibling || src.nextSibling;
                        next.style.display = (next.style.display == "block") ? "none" : "block";
                    }
                }
            }
        </script>
    </head>

    <body>
        <div id="nav">
            <h3>最新公告</h3>
            <div>
                <a href="<?php echo U('Admin/Notice/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/Notice/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>新闻动态</h3>
            <div>
                <a href="<?php echo U('Admin/News/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/News/browse');?>" target="rightFrame">浏览</a>
            </div>

            <h3>公益活动</h3>
            <div>
                <a href="<?php echo U('Admin/Activity/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/Activity/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>活动图</h3>
            <div>
                <a href="<?php echo U('Admin/Pic/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/Pic/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>公益投资</h3>
            <div>
                <a href="<?php echo U('Admin/Investor/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/Investor/browse');?>" target="rightFrame">浏览</a>

            </div>



            <h3>本届会员</h3>
            <div>
                <a href="<?php echo U('Admin/Member/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/Member/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>校内链接</h3>
            <div>
                <a href="<?php echo U('Admin/School/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/School/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>版权信息</h3>
            <div>
                <a href="<?php echo U('Admin/CopyRight/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/CopyRight/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>关于我们</h3>
            <div>
                <a href="<?php echo U('Admin/Us/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/Us/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>组织机构</h3>
            <div>
                <a href="<?php echo U('Admin/Organize/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/Organize/browse');?>" target="rightFrame">浏览</a>

            </div>

            <h3>用户管理</h3>
            <div>
                <a href="<?php echo U('Admin/User/add');?>" target="rightFrame">添加</a>
                <a href="<?php echo U('Admin/User/browse');?>" target="rightFrame">浏览</a>

            </div>
        </div>
    </body>
</html>