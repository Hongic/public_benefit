<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title>添加用户</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="__PUBLIC__/Js/form.js"></script>
        <link type="text/css" rel="stylesheet" href="__PUBLIC__/CSS/form.css">
    </head>
    <body>
        <div>
            <form method="post" action="__URL__/add" name="form">
                <table class="userform">
                    <tr>
                        <td >用户：</td>
                        <td ><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <td>密码：</td>
                        <td ><input type="password" name="pwd"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <input type="submit" name="submit" value="提交" style="padding: 5px;font-size: 18px;border: 1px;border-radius: 10px;" class="radius" onclick="return doSubmit()">
                        </td>
                    </tr>
                </table>
            </form>

        </div>
    </body>
</html>