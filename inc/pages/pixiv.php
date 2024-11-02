<?php
/**
 * Tomori Pjax Pages
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<div :class="{ pagesText: true, pagesTextShow: pageIndex == 0 }">
    <div class="pagesTextBox">
    <style>
        #inputer {
            width: 90%;
            height: 30px;
        }
        #button {
            height: 30px;
        }
    </style>
        <h1><?php $this->title() ?></h1>
        <p>在框内输入作品ID（如82775556）再按“查询”按钮即可查看对应作品</p>
        <p>对于一个ID有多张图片的，请用pid+图片序号的格式输入（例：78286152-2：id为78286152的作品的第2张图）</p>
        <p>（图片为动态产生，准确档案类型会以Content-Type header发送）</p>
        <hr>
        <input type="text" class="i" size="10" autofocus="" id="inputer" placeholder="输入pid" required="required">
        <button id="button" type="button" class="btn" onclick="checkInput()">查询</button>
        <br>
        <p>图片格式：</p>
        <input type="radio" name="tp" id="type_pic" value="png" checked="checked">png
        <input type="radio" name="tp" id="type_pic" value="jpg">jpg
        <input type="radio" name="tp" id="type_pic" value="gif">gif
        <hr>
        <img id="image" src="<?php $this->options->themeUrl('screenshot.png'); ?>" width="500" alt="图片不存在或无法查看图片（确定pid存在且图片格式正确）"/>
    </div>
</div>
