<?php
/**
 * Tomori Header
 * @package Tomori
 * @author 鼠子(ShuShuicu)
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo $this->options->faviconUrl ? $this->options->faviconUrl : $this->options->themeUrl . '/assets/images/favicon.png'; ?>" rel="icon" />
    <link href="<?php $this->options->themeUrl('assets/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php $this->options->themeUrl('assets/css/viewer.min.css'); ?>" rel="stylesheet" />
    <link href="<?php $this->options->themeUrl('assets/css/font-awesome.all.min.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/N0ts.css'); ?>" />
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/code/BlackMac.css'); ?>" />
    <title><?php $this->archiveTitle(array(
            'category' => _t('「%s」分类'),
            'search'   => _t('搜索结果'),
            'tag'      => _t('「%s」标签'),
            'author'   => _t('「%s」发布的文章')
        ), '', ' - '); ?><?php if ($this->_currentPage > 1) echo '「第' . $this->_currentPage . '页」 - '; ?><?php $this->options->title(); ?><?php if ($this->is('index') && !empty($this->options->subTitle)): ?> - <?php $this->options->subTitle(); ?><?php endif; ?></title>
    <?php $this->header(); ?>
</head>

<body>
    <div id="app">
        <div class="load">
            <p>加载中...</p>
            <div class="loadLove">
                <div class="loadLeft"></div>
                <div class="loadRight"></div>
            </div>
        </div>
        <div class="Box">
            <!-- ALL -->
            <div id="Indexbox">
                <!-- 遮罩层 -->
                <div :class="{ blackWindow: true, blackWindowShow: tabState || menuTabState || pagesTabState }" @click="closeBlackWindow"></div>
                <!-- 顶部菜单 -->
                <div class="menu">
                    <img src="<?php echo $this->options->faviconUrl ? $this->options->faviconUrl : $this->options->themeUrl . '/assets/images/favicon.png'; ?>" alt="favicon" />
                    <ul class="menuUL">
                        <li>
                            <a href="<?php $this->options->siteUrl(); ?>">首页</a>
                        </li>
                        <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                        <?php while ($pages->next()): ?>
                        <li>
                            <a<?php if ($this->is('page', $pages->slug)): ?> class="current" <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <!-- 标题 -->
                    <p><?php $this->options->title(); ?></p>
                </div>

                <!-- 左侧菜单按钮 -->
                <div class="leftBar">
                    <div class="leftBarButtomMe" @click="changeTab"></div>
                    <div class="leftBarButtomMenu" @click="changeMenuTab">
                        <div class="div1"></div>
                        <div class="div2"></div>
                        <div class="div3"></div>
                    </div>
                    <div class="leftBarButtomPages" @click="changePagesTab"></div>
                </div>

                <!-- 左侧拉出菜单 我 -->
                <div :class="{ leftBarMe: true, leftBarMeClick: tabState }">
                    <div class="leftBarButtomClose" @click="closeBlackWindow">
                        <div class="div1"></div>
                        <div class="div2"></div>
                    </div>
                    <div class="img">
                        <img src="<?php echo $this->options->avatarUrl ? $this->options->avatarUrl : $this->options->themeUrl . '/assets/images/favicon.png'; ?>" alt="N0ts" />
                    </div>
                    <div class="introduction">
                        <h1><?php echo $this->options->authorName ? $this->options->authorName : $this->options->title(); ?></h1>
                        <p><?php echo $this->options->authorInfo ? $this->options->authorInfo : $this->options->description(); ?></p>
                    </div>
                    <div class="connect">
                    <?php $this->options->authorInfoUrl(); ?>
                    </div>
                </div>

                <!-- 左侧拉出菜单 顶部菜单 -->
                <div :class="{ leftBarTitleMenu: true, leftBarTitleMenuClick: menuTabState }">
                    <div class="leftBarButtomClose" @click="closeBlackWindow">
                        <div class="div1"></div>
                        <div class="div2"></div>
                    </div>
                    <h1>导航</h1>
                    <ul>
                        <li>
                            <a href="<?php $this->options->siteUrl(); ?>">首页</a>
                        </li>
                        <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                        <?php while ($pages->next()): ?>
                        <li>
                            <a<?php if ($this->is('page', $pages->slug)): ?> class="current" <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>