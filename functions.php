<?php
/**
 * 核心文件
 * @author 前端：Zeus丨后端：鼠子
 * @link https://blog.miomoe.cn/
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 更换Gravatar源
 * Blog.MioMoe.Cn
 */
$avatarCdn = Helper::options()->avatarCdn;
// 定义常量
define('__TYPECHO_GRAVATAR_PREFIX__', $avatarCdn);
/**
 * ThemeUrl
 * 获取主题目录
 */
define("THEME_URL", str_replace('//usr', '/usr', str_replace(Helper::options()->siteUrl, Helper::options()->rootUrl . '/', Helper::options()->themeUrl)));
$str1 = explode('/themes/', (THEME_URL . '/'));
$str2 = explode('/', $str1[1]);
define("THEME_NAME", $str2[0]);

/**
 * 缩略图
 */
function get_RandomThumbnail($base_url, $maxImages = 10) {  
    // 生成一个1到$maxImages之间的随机数  
    $rand = mt_rand(1, $maxImages);  
    // 构造随机缩略图的URL  
    $randomImage = $base_url . $rand . '.jpg';  
    return $randomImage;  
}  
function get_ArticleThumbnail($widget) {  
    // 自定义缩略图逻辑  
    $thumb = $widget->fields->thumb; // 如果有自定义缩略图，直接使用  
    if ($thumb) {  
        return $thumb;  
    }  
    // 尝试从内容中提取图片URL  
    $pattern = '/<img.*?src="(.*?)"[^>]*>/i';  
    if (preg_match($pattern, $widget->content, $thumbUrl) && strlen($thumbUrl[1]) > 7) {  
        return $thumbUrl[1];  
    }  
    // 尝试从附件中获取图片URL  
    $attach = $widget->attachments(1)->attachment;  
    if ($attach && $attach->isImage) {  
        return $attach->url;  
    }  
    // 如果没有找到图片，则生成随机缩略图  
    $base_url = '/assets/images/thumb/'; // 默认缩略图路径  
    // 如果设置了articleImgSpeed，则使用它作为图片的基本URL  
    if (!empty(Helper::options()->articleImgSpeed)) {  
        $base_url = Helper::options()->articleImgSpeed;  
        // 确保URL以斜杠结尾  
        if (substr($base_url, -1) !== '/') {  
            $base_url .= '/';  
        }  
    } else {  
        // 使用themeUrl和默认的图片路径  
        $base_url = $widget->widget('Widget_Options')->themeUrl . $base_url;  
    }  
    // 调用辅助函数获取随机缩略图  
    return get_RandomThumbnail($base_url);  
}  
/**
 * 主题版权
 */
function get_theme()
{
    echo 'Theme By <a href="https://gitee.com/ShuShuicu/typecho-tomori-theme" target="_blank">Tomori</a>';
}
/**
 * 加载时间
 * Blog.MioMoe.Cn
 */
function timer_start() {
    global $timestart;
    $mtime     = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime     = explode( ' ', microtime() );
    $timeend   = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
        echo $r;
    }
    return $r;
}
/**
 * 统计字数
 * Blog.MioMoe.Cn
 */
function  art_count ($cid){
    $db=Typecho_Db::get ();
    $rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where
    ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u", "", $rs['text']);
    echo mb_strlen($text,'UTF-8');
}
?>
<?php 
/**
 * 设置功能
 */
function themeConfig($form)
{
?>
    <style>
        body {
            font-weight:500;
            background: url(<?php echo THEME_URL ?>/assets/images/background.jpg) 
            no-repeat 0 0;
            background-size: cover;
            background-attachment: fixed;
        }
        .clearfix, .row {
            background-color: #ffffff96;
            border-radius: 8px;
        }
        .typecho-foot {
            background-color: #ffffff96;
            border-radius: 8px;
        }
    </style>
<?php
    // Avatar
    $avatarCdn = new Typecho_Widget_Helper_Form_Element_Select(
        'avatarCdn',
        array(
            'https://weavatar.com/avatar/'=> _t('WeAvatar'),
            'https://cravatar.cn/avatar/' => _t('CrAvatar'),
            'http://www.gravatar.com/avatar/'=> _t('GrAvatar'),
            'https://gravatar.shushu.icu/avatar/'=> _t('GrAvatar(鼠子源'),
        ),
        'https://weavatar.com/avatar/',
        _t('Avatar'),
        _t('请选择Avatar源，用于评论头像展示。<hr>')
    );
    $form->addInput($avatarCdn);
    // 全局设置
    // 副标题
    $subTitle = new Typecho_Widget_Helper_Form_Element_Text(
        'subTitle',
        NULL,
        '由Tomoriゞ强力驱动！',
        _t('副标题'),
        _t('输入一段描述，将会显示在网站首页 title 后方，留空不显示。')
    );
    $form->addInput($subTitle);
    // favicon
    $faviconUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'faviconUrl',
        NULL,
        '' . THEME_URL . '/assets/images/favicon.png',
        _t('网站图标'),
        _t('请填入网站图标，没有则显示主题默认图标。')
    );
    $form->addInput($faviconUrl);
    // 备案号
    $icpCode = new Typecho_Widget_Helper_Form_Element_Text(
        'icpCode',
        NULL,
        NULL,
        _t('ICP备案号'),
        _t('请输入网站ICP备案号，如果没有请留空。<hr>')
    );
    $form->addInput($icpCode);
    // 侧边
    $sidebarInfo = new Typecho_Widget_Helper_Form_Element_Textarea(
        'sidebarInfo',
        NULL,
        NULL,
        _t('首页侧边内容'),
        _t('请输入侧边自定义HTML内容，留空显示站点介绍。<hr>')
    );
    $form->addInput($sidebarInfo);
    // 作者
    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text(
        'avatarUrl',
        NULL,
        '' . THEME_URL . '/assets/images/favicon.png',
        _t('左侧菜单头像'),
        _t('请输入头像链接，推荐使用QQ头像。')
    );
    $form->addInput($avatarUrl);
    $authorName = new Typecho_Widget_Helper_Form_Element_Text(
        'authorName',
        NULL,
        NULL,
        _t('左侧作者名字'),
        _t('请输入作者名字，留空显示站点名称。')
    );
    $form->addInput($authorName);
    $authorInfo = new Typecho_Widget_Helper_Form_Element_Textarea(
        'authorInfo',
        NULL,
        NULL,
        _t('左侧作者介绍'),
        _t('请输入作者介绍支持HTML，留空显示站点介绍。')
    );
    $form->addInput($authorInfo);
    $authorInfoUrl = new Typecho_Widget_Helper_Form_Element_Textarea(
        'authorInfoUrl',
        NULL,
        '<a href="https://blog.miomoe.cn/" target="_blank">鼠子Blog</a>
        <a href="https://gitee.com/ShuShuicu/typecho-tomori-theme" target="_blank">同款主题</a>',
        _t('左侧介绍底部链接'),
        _t('请输入作者介绍底部链接，留空不显示。')
    );
    $form->addInput($authorInfoUrl);
}
/**
 * 字段设置
 */
function themeFields($layout) 
{

    // 缩略图字段
    $thumbnailStyle = new Typecho_Widget_Helper_Form_Element_Text(
        'thumbnail_Style', 
        NULL, 
        NULL,  
        _t
        ('缩略图'), 
        _t('请填入图片链接用于自定义文章缩略图 / 顶图')
    );
    $thumbnailStyle->input->setAttribute(
        'style', 'width: 100%; max-width: 600px;'
    );
    $layout->addItem($thumbnailStyle);

}
Typecho_Plugin::factory('admin/write-post.php')->bottom = 'themeFields';
Typecho_Plugin::factory('admin/write-page.php')->bottom = 'themeFields';