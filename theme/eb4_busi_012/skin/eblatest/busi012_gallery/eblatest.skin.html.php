<?php
if (!defined('_EYOOM_')) exit;

add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/slick/slick.min.css" type="text/css" media="screen">',0);
?>
<div class="btn-edit-mode-wrap">
    <?php /* eb최신글 편집 버튼 */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="btn-edit-mode text-center hidden-xs hidden-sm">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=eblatest_form&amp;thema=<?php echo $theme; ?>&amp;el_code=<?php echo $el_master['el_code']; ?>&amp;w=u&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> EB최신글 마스터 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=eblatest_form&amp;thema=<?php echo $theme; ?>&amp;el_code=<?php echo $el_master['el_code']; ?>&amp;w=u" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                <i class="far fa-window-maximize"></i>
            </a>
        </div>
    </div>
    <?php } ?>
</div>

<?php if (isset($el_master) && $el_master['el_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.blog-latest {position:relative}
/* master title */
.blog-latest .latest-title {position:relative;margin-bottom:60px;text-align:center;z-index:1}
.blog-latest .latest-title:after {content:"";position:absolute;left:50%;bottom:-30px;width:30px;height:1px;margin-left:-15px;background:#333}
.blog-latest .latest-title h2 {margin:0 0 10px;font-size:16px;color}
.blog-latest .latest-title h3 {margin:0;font-size:40px;line-height:40px}
/* 슬라이더 - 이미지와 내용 */
.blog-latest .blog-ebslider {margin:0 -15px}
.blog-latest .blog-ebslider .blog-item {padding:0 15px}
.blog-ebslider .blog-image .img-box {height:230px;overflow:hidden}
.blog-ebslider .blog-image .img-box .no-image {display:block;width:100%;height:100%;padding-top:120px;text-align:center;color:#fff;background:#aaa}
.blog-ebslider .blog-content {position:relative;width:100%;padding:20px;text-align:center;background:#fff}
.blog-ebslider .blog-content h5 {margin:0 0 10px;max-height:40px;text-overflow:ellipsis;white-space:nowrap;word-wrap:normal;overflow:hidden;font-size:14px;line-height:20px;color:#333;font-weight:700}
.blog-ebslider .blog-content p {color:#707070}

/* 좌우 컨트롤 */
.blog-ebslider .slick-next, .blog-ebslider .slick-prev {width:40px;height:80px;-webkit-transition: all .3s ease;-moz-transition: all .3s ease;-o-transition: all .3s ease;-ms-transition: all .3s ease;transition: all .3s ease}
.blog-ebslider .slick-next {right:-40px;z-index:1}
.blog-ebslider .slick-prev {left:-40px;z-index:1}
.blog-ebslider .slick-next:before, .blog-ebslider .slick-prev:before {content:"";display:block;position:absolute;top:50%;width:40px;height:40px;margin-top:-20px;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-o-transform:rotate(45deg);-ms-transform:rotate(45deg);transform:rotate(45deg)}
.blog-ebslider .slick-next:before {right:10px;border-right:1px solid #ccc;border-top:1px solid #ccc}
.blog-ebslider .slick-prev:before {left:10px;border-left:1px solid #fff;border-bottom:1px solid #fff}
/* 점 컨트롤 */
.blog-ebslider .slick-dots {bottom:-40px}
.blog-ebslider .slick-dots li button:before {font-size:10px;color:#fff}
<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
@media (max-width:1199px){
    /* 풀페이지 애니메이션 - 작동 중지 */
    .blog-ebslider {transform:translateY(0);opacity:1}
}
<?php } ?>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
@media (max-width:1280px){
    .blog-ebslider .slick-next {right:20px}
    .blog-ebslider .slick-prev {left:20px}
}
@media (max-width:991px){
    .blog-latest {padding-bottom:30px}
    .blog-latest .latest-title h3 {font-size:30px;line-height:30px}
}
<?php } ?>
</style>
<div class="eblatest blog-latest">
    <?php foreach ($el_item as $k => $eb_latest) { ?>
    <div class="master-title color-white"><h2><?php echo $el_master['el_subject']; ?></h2></div>

    <div class="blog-ebslider">
        <?php if (count((array)$eb_latest['list']) > 0) { foreach ($eb_latest['list'] as $data) { ?>
        <div class="blog-item">
            <div class="blog-image">
                <div class="img-box">
                    <?php if ($data['wr_image']) { ?>
                    <img class="img-responsive" src="<?php echo $data['wr_image']; ?>">
                    <?php } else { ?>
                    <span class="no-image">No Image</span>
                    <?php } ?>
                </div>
            </div>
            <div class="blog-content">
                <h5><?php echo $data['wr_subject']; ?></h5>
                <?php if ($eb_latest['li_content'] == 'y') { ?>
                <p><?php echo $data['wr_content']; ?></p>
                <?php } ?>
                <div class="btn-more"><a href="<?php echo $data['href']; ?>">더보기 +</a></div>
            </div>
        </div>
        <?php }} else { ?>
        <div class="blog-item"><p class="text-center color-grey font-size-13 margin-top-30"><i class="fa fa-exclamation-circle"></i> 최신글이 없습니다.</p>
        </div>
        <?php } ?>
    </div>

    <div class="btn-edit-mode-wrap">
        <?php /* eb최신글 아이템 편집 버튼 */ ?>
        <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
        <div class="text-center margin-top-10 btn-edit-mode hidden-xs hidden-sm">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=eblatest_itemform&amp;thema=<?php echo $theme; ?>&amp;el_code=<?php echo $el_master['el_code']; ?>&amp;li_no=<?php echo $eb_latest['li_no']; ?>&amp;w=u&amp;iw=u&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-dark"><i class="far fa-edit"></i> EB최신글 아이템 설정</a>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

    <?php if ($el_default) { ?>
    <p class="text-center color-dark font-size-13 margin-top-30">최신글이 없습니다.</p>
    <?php } ?>
</div>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/slick/slick.min.js"></script>
<script>
$(window).load(function(){
    $('.blog-ebslider').slick({
        slidesToShow: 3,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 15000, //15초
        <?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 2,
            arrows: false,
            infinite: true
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            arrows: false,
            infinite: true
          }
        }
        ]
        <?php } ?>
    });
});
</script>
<?php } ?>