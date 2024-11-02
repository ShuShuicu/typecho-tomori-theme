<?php
/**
 * Tomori Index Nav
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!-- 左侧拉出菜单 页面 -->
<div :class="{ leftBarPages: true, leftBarPagesClick: pagesTabState }">
    <div class="leftBarButtomClose" @click="closeBlackWindow">
        <div class="div1"></div>
        <div class="div2"></div>
    </div>
    <div class="leftBarPagesBox">
        <h1>页面</h1>
        <div class="leftBarPagesOptine" @click="changePageIndex(0)">
            <img src="<?php $this->options->themeUrl('assets/images/stuck_out_tongue.png'); ?>" alt="stuck_out_tongue" />
            <p>Hello world.md</p>
        </div>
        <div class="leftBarPagesOptine" @click="changePageIndex(1)">
            <img src="<?php $this->options->themeUrl('assets/images/stuck_out_tongue_closed_eyes.png'); ?>" alt="stuck_out_tongue_closed_eyes" />
            <p>All Category.md</p>
        </div>
    </div>
</div>
<!-- 页面版块1 -->
<div class="pages" id="pages">
    <!-- 页面选项卡 -->
    <div class="pagesTitle">
        <div :class="{ pagesTitleOption: true, pagesTitleOptionClick: pageIndex == 0 }" id="pagesTitleOption1" @click="changePageIndex(0)">
            <img src="<?php $this->options->themeUrl('assets/images/stuck_out_tongue.png'); ?>" alt="stuck_out_tongue" />
            <p>Hello World.md</p>
        </div>
        <div :class="{ pagesTitleOption: true, pagesTitleOptionClick: pageIndex == 1 }" @click="changePageIndex(1)">
            <img src="<?php $this->options->themeUrl('assets/images/stuck_out_tongue_closed_eyes.png'); ?>" alt="stuck_out_tongue_closed_eyes" />
            <p>All Category.md</p>
        </div>
    </div>
