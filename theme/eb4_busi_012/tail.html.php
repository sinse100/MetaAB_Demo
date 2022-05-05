<?php
if (!defined('_EYOOM_')) exit;
?>

<?php if (!$wmode) { ?>

        <?php if (!defined('_INDEX_')) { ?>
                    </section>
                    <?php if ($side_layout['use'] == 'yes') { ?>
                        <?php
                        if ($side_layout['pos'] == 'right') {
                            /* 사이드영역 시작 */
                            include_once(EYOOM_THEME_PATH . '/side.html.php');
                            /* 사이드영역 끝 */
                        }
                        ?>
                    <?php } ?>
                    <div class="clearfix"></div>
                </div><?php /* End row */ ?>
            </div><?php /* End container */ ?>
        </div><?php /* End Basic Body */ ?>
        <?php } ?>

        <?php /* Footer */ ?>
        <footer class="footer <?php if (defined('_INDEX_')) { ?>section section-last" id="section6<?php } ?>">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 clear-after">
                            <div class="footer-logo">
                                <?php /* 하단 로고 편집 버튼 */ ?>
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

                                <?php /* 하단 로고 */ ?>
                                <a href="<?php echo G5_URL; ?>">
                                <?php if ($logo == 'text') { ?>
                                    <span><?php echo $config['cf_title']; ?></span>
                                <?php } else if ($logo == 'image') { //로고 이미지 ?>
                                    <?php if (!G5_IS_MOBILE) { ?>
                                    <?php if (file_exists($bottom_logo) && !is_dir($bottom_logo)) { ?>
                                    <img src="<?php echo $logo_src['bottom']; ?>" class="img-responsive" alt="<?php echo $config['cf_title']; ?> LOGO">

                                    <?php } else { ?>
                                    <img src="<?php echo EYOOM_THEME_URL; ?>/image/footer_logo.png" class="img-responsive">
                                    <?php } ?>
                                    <?php } else { ?>
                                    <?php if (file_exists($bottom_mobile_logo) && !is_dir($bottom_mobile_logo)) { ?>
                                    <img src="<?php echo $logo_src['mobile_bottom']; ?>" class="img-responsive" alt="<?php echo $config['cf_title']; ?> LOGO">

                                    <?php } else { ?>
                                    <img src="<?php echo EYOOM_THEME_URL; ?>/image/footer_logo.png" class="img-responsive">
                                    <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                </a>
                            </div>

                            <?php /* 회사정보 */ ?>
                            <div class="footer-info">
                                <?php /* 회사정보 편집 버튼 */ ?>
                                <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                                <div class="btn-edit-mode-wrap">
                                    <div class="btn-edit-mode hidden-xs hidden-sm">
                                        <div class="btn-group">
                                            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=biz&amp;thema=<?php echo $theme; ?>&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> 기업정보 설정</a>
                                            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=biz_info&amp;amode=biz&amp;thema=<?php echo $theme; ?>" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                                                <i class="far fa-window-maximize"></i>
                                            </a>
                                            <button type="button" class="btn-e btn-e-xs btn-e-red btn-e-split-red popovers" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-content="
                                                <span class='font-size-11'>
                                                <strong class='color-indigo'>기업정보 사용가능한 변수</strong><br>
                                                <div class='margin-hr-5'></div>
                                                <span class='color-indigo'>[설정정보]</span><br>
                                                회사명 : $bizinfo['bi_company_name']<br>
                                                사업자등록번호 : $bizinfo['bi_company_bizno']<br>
                                                대표자명 : $bizinfo['bi_company_ceo']<br>
                                                대표전화 : $bizinfo['bi_company_tel']<br>
                                                팩스번호 : $bizinfo['bi_company_fax']<br>
                                                통신판매업 : $bizinfo['bi_company_sellno']<br>
                                                부가통신사업자 : $bizinfo['bi_company_bugano']<br>
                                                정보관리책임자 : $bizinfo['bi_company_infoman']<br>
                                                정보책임자메일 : $bizinfo['bi_company_infomail']<br>
                                                우편번호 : $bizinfo['bi_company_zip']<br>
                                                주소1 : $bizinfo['bi_company_addr1']<br>
                                                주소2 : $bizinfo['bi_company_addr2']<br>
                                                주소3 : $bizinfo['bi_company_addr3']<br>
                                                고객센터1 : $bizinfo['bi_cs_tel1']<br>
                                                고객센터2 : $bizinfo['bi_cs_tel2']<br>
                                                고객센터팩스 : $bizinfo['bi_cs_fax']<br>
                                                고객센터메일 : $bizinfo['bi_cs_email']<br>
                                                상담시간 : $bizinfo['bi_cs_time']<br>
                                                휴무안내 : $bizinfo['bi_cs_closed']
                                                </span>
                                            "><i class="fas fa-question-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                                <?php /* 회사정보 */ ?>
                                <address>
                                    <span><?php echo $bizinfo['bi_company_addr1']; ?> <?php echo $bizinfo['bi_company_addr2']; ?> <?php echo $bizinfo['bi_company_addr3']; ?></span><br>
                                    <span>T. <?php echo $bizinfo['bi_company_tel']; ?></span>
                                    <span class="info-divider">|</span>
                                    <span>F. <?php echo $bizinfo['bi_company_fax']; ?></span>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <?php /* 하단 메뉴 */ ?>
                            <ul class="footer-menu list-unstyled list-inline">
                                <li><a href="<?php echo get_eyoom_pretty_url('page','provision'); ?>">이용약관</a></li>
                                <li><a href="<?php echo get_eyoom_pretty_url('page','privacy'); ?>">개인정보처리방침</a></li>
                                <li><a href="<?php echo get_eyoom_pretty_url('page','noemail'); ?>">이메일무단수집거부</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="copyright">Copyright &copy; <?php echo $config['cf_title']; ?>. All Rights Reserved. <span><?php if (G5_IS_MOBILE) { ?><a href="<?php echo G5_URL; ?>/?device=pc" class="btn-e btn-e-xs btn-e-default color-white margin-left-5">PC버전</a><?php } else { ?><a href="<?php echo G5_URL; ?>/?device=mobile" class="btn-e btn-e-xs btn-e-default color-white margin-left-5">모바일버전</a><?php } ?></span></p>
                        </div>
                        <div class="col-sm-offset-1 col-sm-5 col-md-offset-3 col-md-3">
                            <?php echo eb_contents('1566976178'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php /* End Footer  */ ?>

        <?php if (defined('_INDEX_')) { ?>
                </section>
                <div class="clearfix"></div>
            </div><?php /* End wide-layout */ ?>
        </div><?php /* End Basic Body */ ?>
        <?php } ?>

        <div class="back-to-top">
            <i class="fa fa-angle-up"></i>
        </div>
    </div><?php /* End wrapper-inner */ ?>
</div><?php /* End wrapper */ ?>
<?php } ?>

<div class="sidebar-left-mask sidebar-left-trigger" data-action="toggle" data-side="left"></div>
<div class="sidebar-right-mask sidebar-right-trigger" data-action="toggle" data-side="right"></div>

<?php
include_once(EYOOM_THEME_PATH . '/misc.html.php');
?>

<?php
if ($is_member && $eyoomer['onoff_push'] == 'on') {
    include_once(EYOOM_THEME_PATH . '/skin/push/basic/push.skin.html.php');
}
?>

<script src="<?php echo EYOOM_THEME_URL; ?>/js/app.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script>
$(document).ready(function() {
    App.init();
});

<?php if ($eyoom['use_shop_itemtype'] == 'y') { ?>
function item_wish_for_list(it_id) {
    var f = document.fitem_for_list;
    f.url.value = "<?php echo G5_SHOP_URL; ?>/wishupdate.php?it_id="+it_id;
    f.it_id.value = it_id;
    f.action = "<?php echo G5_SHOP_URL; ?>/wishupdate.php";
    f.submit();
}
<?php } ?>

<?php if ($is_admin == 'super') { ?>
$(document).ready(function() {
    var edit_mode = "<?php echo $eyoom_default['edit_mode']; ?>";
    if (edit_mode == 'on') {
        $(".btn-edit-mode").show();
    } else {
        $(".btn-edit-mode").hide();
    }

    $("#btn_edit_mode").click(function() {
        var edit_mode = $("#edit_mode").val();
        if (edit_mode == 'on') {
            $(".btn-edit-mode").hide();
            $("#edit_mode").val('');
        } else {
            $(".btn-edit-mode").show();
            $("#edit_mode").val('on');
        }

        $.post("<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=theme_editmode&smode=1", { edit_mode: edit_mode });
    });
});
<?php } ?>
</script>
<!--[if lt IE 9]>
    <script src="<?php echo EYOOM_THEME_URL; ?>/plugins/respond.min.js"></script>
    <script src="<?php echo EYOOM_THEME_URL; ?>/plugins/html5shiv.min.js"></script>
    <script src="<?php echo EYOOM_THEME_URL; ?>/plugins/eyoom-form/js/eyoom-form-ie8.js"></script>
<![endif]-->

<?php
if ( $config['cf_analytics'] ) echo $config['cf_analytics'];
?>

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>