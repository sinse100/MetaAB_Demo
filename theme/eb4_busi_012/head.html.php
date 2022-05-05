<?php
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:300,400,700&amp;subset=korean" rel="stylesheet">',0);

if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때
    add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/style.css?ver='.G5_CSS_VER.'">',0);
} else if ($eyoom['is_responsive'] == '0' && !G5_IS_MOBILE) { // 비반응형이면서 PC버전일때
    add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/style-nr.css?ver='.G5_CSS_VER.'">',0);
}
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/css/custom.css?ver='.G5_CSS_VER.'">',0);

/**
 * 로고 타입 : 'image' || 'text'
 */
$logo = 'image';

/**
 * 상품 이미지 미리보기 종류 : zoom or slider
 */
$item_view = 'zoom';
?>

<?php if (!$wmode) { ?>
<?php /* ------------- Wrapper 영역 시작 ------------- */ ?>
<div class="wrapper">
    <?php
    // 팝업창
    if(defined('_INDEX_') && $newwin_contents) { // index에서만 실행
        echo $newwin_contents;
    }
    ?>

    <?php /* 편집버튼 */ ?>
    <?php if ($is_admin) { // 관리자일 경우 ?>
    <div class="btn-edit-admin eyoom-form visible-lg">
        <input type="hidden" name="edit_mode" id="edit_mode" value="<?php echo $eyoom_default['edit_mode']; ?>">
        <label class="toggle red-toggle">
            <input type="checkbox" id="btn_edit_mode" <?php echo $eyoom_default['edit_mode'] == 'on' ? 'checked':''; ?>><i></i><span class="color-grey font-size-12">편집모드</span>
        </label>
    </div>
    <?php } ?>

    <?php if ($eyoom['layout'] == 'wide') { ?>
    <div class="wrapper-inner">
    <?php } else if ($eyoom['layout'] == 'boxed') { ?>
    <div class="wrapper-inner box-layout">
    <?php } ?>
        <?php /* ------------- Header 영역 시작 ------------- */ ?>
        <header <?php if ($eyoom['sticky'] == 'y') echo 'id="header-fixed"'; ?> class="header header-sticky">
            <div class="header-inner">
                <div class="header-left">
                    <?php /* Header Logo - 로고 */ ?>
                    <div class="header-logo">
                        <?php /* 로고 편집 버튼 */ ?>
                        <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                        <div class="btn-edit-mode-wrap">
                            <div class="btn-edit-mode hidden-xs hidden-sm">
                                <div class="btn-group">
                                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=logo&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 로고 설정</a>
                                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=logo&amp;thema=<?php echo $theme; ?>" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                                        <i class="far fa-window-maximize"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        <?php /* 로고 */ ?>
                        <a href="<?php echo G5_URL; ?>">
                            <?php if ($logo == 'text') { ?>
                                <span><?php echo $config['cf_title']; ?></span>
                            <?php } else if ($logo == 'image') { ?>
                                <?php if (!G5_IS_MOBILE) { ?>
                                <?php if (file_exists($top_logo) && !is_dir($top_logo)) { ?>
                                <img src="<?php echo $logo_src['top']; ?>" alt="<?php echo $config['cf_title']; ?> LOGO">
                                <?php } else { ?>
                                <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.png" alt="<?php echo $config['cf_title']; ?> LOGO">
                                <?php } ?>
                                <?php } else { ?>
                                <?php if (file_exists($top_mobile_logo) && !is_dir($top_mobile_logo)) { ?>
                                <img src="<?php echo $logo_src['mobile_top']; ?>" alt="<?php echo $config['cf_title']; ?> LOGO">
                                <?php } else { ?>
                                <img src="<?php echo EYOOM_THEME_URL; ?>/image/site_logo.png" alt="<?php echo $config['cf_title']; ?> LOGO">
                                <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </a>
                    </div>
                </div>
                <div class="header-center">
                    <?php /* 모바일 메뉴 호출 버튼 - 폭 992px 이하에서 출력 */ ?>
                    <nav class="header-nav sidebar left">
                        <div class="sidebar-left-content">
                            <?php /* 메뉴 편집 버튼 */ ?>
                            <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                            <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="top:-2px">
                                <div class="btn-group">
                                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=menu_list&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 메뉴 설정</a>
                                    <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=menu_list" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                                        <i class="far fa-window-maximize"></i>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            <h5 class="mobile-nav-title">메인 메뉴</h5>
                            <?php /* Header Nav - 메인메뉴 */ ?>
                            <ul class="nav navbar-nav">
                                <?php if (isset($menu) && is_array($menu)) { ?>
                                <?php foreach ($menu as $key => $menu_1) { ?>
                                <li class="<?php if (isset($menu_1['active']) && $menu_1['active']) echo 'active'; ?> <?php if (isset($menu_1['submenu']) && $menu_1['submenu']) echo 'dropdown'; ?> division">
                                    <a href="<?php echo $menu_1['me_link']; ?>" target="_<?php echo $menu_1['me_target']; ?>" class="dropdown-toggle disabled" <?php echo G5_IS_MOBILE && isset($menu_1['submenu']) && $menu_1['submenu'] ? 'data-toggle="dropdown"' : 'data-hover="dropdown"';?>>

                                        <?php if ($menu_1['me_icon']) { ?><i class="fa <?php echo $menu_1['me_icon']; ?>"></i><?php } ?>
                                        <?php echo $menu_1['me_name']?>
                                    </a>
                                    <?php if (isset($menu_1['submenu']) && is_array($menu_1['submenu'])) { ?>
                                    <a href="#" class="cate-dropdown-open dorpdown-toggle hidden-lg hidden-md" data-toggle="dropdown"></a>
                                    <?php } ?>
                                    <?php $index2 = 0; $size2 = count((array)$menu_1['submenu']); ?>
                                    <?php if (isset($menu_1['submenu']) && is_array($menu_1['submenu'])) { ?>
                                    <?php foreach ($menu_1['submenu'] as $subkey => $menu_2) { ?>
                                    <?php if ($index2 == 0) { ?>
                                    <ul class="dropdown-menu">
                                    <?php } ?>
                                        <li class="dropdown-submenu <?php if (isset($menu_2['active']) && $menu_2['active']) echo 'active';?>">
                                            <a href="<?php echo $menu_2['me_link']; ?>" target="_<?php echo $menu_2['me_target']; ?>">
                                                <?php if (isset($menu_2['me_icon']) && $menu_2['me_icon']) { ?>
                                                <i class="<?php echo $menu_2['me_icon']; ?>"></i> <?php } ?>
                                                <?php echo $menu_2['me_name']; ?>
                                                <?php if (isset($menu_2['sub']) && $menu_2['sub'] == 'on') { ?>
                                                <i class="fas fa-angle-right sub-caret hidden-sm hidden-xs"></i><i class="fas fa-angle-down sub-caret hidden-md hidden-lg"></i>
                                                <?php } ?>
                                            </a>
                                            <?php $index3 = 0; $size3 = count((array)$menu_2['subsub']); ?>
                                            <?php if (isset($menu_2['subsub']) && is_array($menu_2['subsub'])) { ?>
                                            <?php foreach ($menu_2['subsub'] as $ssubkey => $menu_3) { ?>
                                            <?php if ($index3 == 0) { ?>
                                            <ul class="dropdown-menu">
                                            <?php } ?>
                                                <li class="dropdown-submenu <?php if (isset($menu_3['active']) && $menu_3['active']) echo 'active';?>">
                                                    <a href="<?php echo $menu_3['me_link']; ?>" target="_<?php echo $menu_3['me_target']; ?>">
                                                        <?php if (isset($menu_3['me_icon']) && $menu_3['me_icon']) { ?>
                                                        <i class="<?php echo $menu_3['me_icon']; ?>"></i>
                                                        <?php } ?>
                                                        <span class="hidden-md hidden-lg">-</span> <?php echo $menu_3['me_name']; ?>
                                                        <?php if (isset($menu_3['sub']) && $menu_3['sub'] == 'on') { ?>
                                                        <i class="fas fa-angle-right sub-caret hidden-sm hidden-xs"></i><i class="fas fa-angle-down sub-caret hidden-md hidden-lg"></i>
                                                        <?php } ?>
                                                    </a>
                                                </li>
                                            <?php if ($index3 == $size3 - 1) { ?>
                                            </ul>
                                            <?php } ?>
                                            <?php $index3++; } ?>
                                            <?php } ?>
                                        </li>
                                    <?php if ($index2 == $size2 - 1) { ?>
                                    </ul>
                                    <?php } ?>
                                    <?php $index2++; } ?>
                                    <?php } ?>
                                </li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="header-right">
                    <?php /* tob bar */ ?>
                    <div class="tool-bar">
                        <ul class="list-unstyled list-inline">
                            <li class="btn-search"><a href="#" class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="검색"><i class="fab fa-sistrix"></i></a></li>
                        <?php if ($is_member) { // 회원일 경우 ?>
                            <?php if ($is_admin || $is_auth) { // 관리자일 경우 ?>
                            <li><a href="<?php echo G5_ADMIN_URL; ?>" class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="관리자"><i class="far fa-sun"></i></a></li>
                            <?php } ?>
                            <li><a href="<?php echo G5_BBS_URL; ?>/logout.php" class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="로그아웃"><i class="far fa-user"></i></a></li>
                            <li class="hidden-xs"><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=mypage.php" class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="MY PAGE"><i class="far fa-keyboard"></i></a></li>
                        <?php } else { //비회원일 경우 ?>
                            <li><a href="<?php echo G5_BBS_URL; ?>/login.php" class="tooltips" data-toggle="tooltip" data-placement="bottom" data-original-title="로그인"><i class="far fa-user"></i></a></li>
                        <?php } ?>

                            <li class="hidden-md hidden-lg">
                                <a href="#" class="sidebar-left-trigger" data-action="toggle" data-side="left" title="메뉴 버튼">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fas fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php /* 검색창 */ ?>
            <div class="search-box">
                <div class="container">
                    <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL; ?>/search.php" onsubmit="return fsearchbox_submit(this);" class="eyoom-form">
                        <input type="hidden" name="sfl" value="wr_subject||wr_content">
                        <input type="hidden" name="sop" value="and">
                        <label for="head_sch_stx" class="sound_only"><strong>검색어 입력 필수</strong></label>
                        <div class="input input-button">
                            <input type="text" name="stx" id="head_sch_stx" maxlength="20" class="sch_stx" placeholder="검색어 입력">
                            <div class="button"><input type="submit"><i class="fas fa-search"></i></div>
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <?php /* ------------- Header 영역 끝 ------------- */ ?>

        <?php /* ------------- 서브 타이틀 영역 시작 - 서브페이지 상단 출력 ------------- */ ?>
        <?php if (!defined('_INDEX_')) { ?>
        <?php /* ------------- 보드 타이틀 영역 시작 - 서브페이지 상단 출력 ------------- */ ?>
        <div class="sub-title" style='background-image:url("<?php echo EYOOM_THEME_URL; ?>/image/sub_title/gr_<?php echo $subinfo['cate1']; ?>.jpg")'>
            <div class="sub-title-caption">
                <div class="container">
                    <h2><?php echo $subinfo['subtitle']; ?></h2>
                </div>
            </div>
            <?php /* 서브 페이지 메뉴 영역 시작 */ ?>
            <div class="sub-nav-wrap" <?php if ($eyoom['sticky'] == 'y') echo 'id="page_navi_fixed"'; ?>>
                <div class="container">
                    <div class="sub-nav-wrap-inner clear-after">
                        <div class="sub-nav-home"><a href="<?php echo G5_URL; ?>"><i class="fas fa-home"></i></a></div>
                        <div class="sub-nav-list sub-nav-depth1">
                            <h3 class="sub-nav-title"><?php echo $subinfo['subtitle']; ?> <i class="fas fa-angle-down"></i></h3>
                            <ul class="list-unstyled">
                                <?php if (isset($menu) && is_array($menu)) { ?>
                                <?php foreach ($menu as $key => $menu_1) { ?>
                                <li class="<?php if (isset($menu_1['active']) && $menu_1['active']) echo 'active'; ?>">
                                    <a href="<?php echo $menu_1['me_link']; ?>"><?php echo $menu_1['me_name']?></a>
                                </li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="sub-nav-list sub-nav-depth2">
                            <h3 class="sub-nav-title"><?php echo $subinfo['title']; ?> <i class="fas fa-angle-down"></i></h3>
                            <ul class="list-unstyled clear-after">
                                <?php if (isset($sidemenu) && is_array($sidemenu)) { ?>
                                <?php foreach ($sidemenu as $key => $smenu) { ?>
                                <li class="<?php if ($smenu['active']) echo 'active'; ?>">
                                    <a href="<?php echo $smenu['me_link']; ?>" target="_<?php echo $smenu['me_target']; ?>"><?php echo $smenu['me_name']; ?></a>
                                </li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <ul class="breadcrumb">
                            <?php echo $subinfo['path']; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php if ($eyoom['sticky'] == 'y') { ?><div class="page-navi-sticky-space"></div><?php } ?>
            <?php /* 서브 페이지 메뉴 영역 - 끝 */ ?>
            <?php } ?>
        </div>
        <?php /* ------------- 보드 타이틀 영역 끝 ------------- */ ?>

        <?php /* ------------- Basic Body ------------- */ ?>
        <div class="basic-body <?php if (!defined('_INDEX_')) { ?>sub-basic-body<?php } ?>">
            <?php /* 메인과 페이지 일때와 아닐때 구분 */ ?>
            <?php if (defined('_INDEX_')) { ?>
            <div class="wide-layout">
            <?php } else { ?>
            <div class="container">
                <div class="row">
            <?php } ?>
                <?php if ($side_layout['use'] == 'yes') { ?>
                <?php
                if ($side_layout['pos'] == 'left') {
                    /* 사이드영역 시작 */
                    include_once(EYOOM_THEME_PATH . '/side.html.php');
                    /* 사이드영역 끝 */
                }
                ?>
                <section class="basic-body-main <?php if ($side_layout['pos'] == 'left') { echo 'right'; } else { echo 'left'; }?>-main col-md-9">
                <?php } else { ?>
                <section class="basic-body-main col-md-12">
                <?php } ?>
<?php } // !$wmode ?>
