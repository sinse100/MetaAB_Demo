<?php
if (!defined('_EYOOM_')) exit;
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/slick/slick.min.css" type="text/css" media="screen">',0);
?>
<div class="btn-edit-mode-wrap">
    <?php /* eb슬라이더 편집 버튼 */ ?>
    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
    <div class="btn-edit-mode text-center hidden-xs hidden-sm">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebslider_form&thema=<?php echo $theme; ?>&es_code=<?php echo $es_code; ?>&w=u&wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> EB슬라이더 마스터 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebslider_form&thema=<?php echo $theme; ?>&es_code=<?php echo $es_code; ?>&w=u" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                <i class="far fa-window-maximize"></i>
            </a>
            <button type="button" class="btn-e btn-e-xs btn-e-red popovers" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="
            <span class='font-size-11'>
            <strong class='color-indigo'>좌측 [EB슬라이더 설정하기] 버튼 클릭 후 아래 설명 참고</strong><br>
            <div class='margin-hr-5'></div>
            <span class='color-indigo'>[설정정보]<br>
            1. 슬라이더 마스터 제목 : 메인 슬라이더<br>
            2. 스킨선택 : busi012_main_slider<br>
            <span class='color-indigo'>[EB 슬라이더 - 아이템 관리]<br>
            1. EB 슬라이더 아이템 추가 클릭<br>
            2. 대표타이틀 입력<br>
            <div class='margin-hr-5'></div>
            대표타이틀에 br 태그를 사용해 줄바꿈.
            </span>
        "><i class="fas fa-question-circle"></i>
            </button>
        </div>
    </div>
    <?php } ?>
</div>

<?php if (isset($es_master) && $es_master['es_state'] == '1') { // 보이기 상태에서만 출력 ?>
<style>
.ebslider-main-wrap {position:relative;padding:0px}
/* 슬라이더 */
.ebslider-main {position:relative}
.ebslider-main:after {content:"";display:block;clear:both}
.ebslider-main .ebslider-main-inner .slick-list {overflow:visible}
/* 아이템 */
.ebslider-main-inner .ebslider-item {position:relative}
/* 이미지 */
.ebslider-main-inner .ebslider-item .slider-image {display:none}
/* 내용 */
.ebslider-main-inner .ebslider-item .slider-caption {padding-left:20px;border-left:1px solid #fff}
.ebslider-main-inner .ebslider-item .slider-caption p {margin-bottom:0;line-height:45px;font-size:32px;font-weight:300;color:#fff}
/* 내용 - 애니메이션 */
.ebslider-main-inner .ebslider-item .slider-caption {opacity:0;-webkit-transform:translateY(-30px);transform:translateY(-30px)}
.ebslider-main-inner .slick-current .ebslider-item.text-animation .slider-caption {opacity:1;-webkit-transform:translateY(0px);transform:translateY(0px);-webkit-transition: all 1.5s ease;-moz-transition: all 1.5s ease;-o-transition: all 1.5s ease;-ms-transition: all 1.5s ease;transition: all 1.5s ease}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:1279px){
    .ebslider-main .ebslider-main-inner {padding:300px 0}
}
@media (max-width:991px){
    .ebslider-main .ebslider-main-inner {padding:250px 0}
    .ebslider-main-inner .ebslider-item .slider-caption p {line-height:35px;font-size:25px}
}
@media (max-width:767px){
    .ebslider-main .ebslider-main-inner {padding:200px 0}
    .ebslider-main-inner .ebslider-item .slider-caption {padding-left:10px}
    .ebslider-main-inner .ebslider-item .slider-caption p {line-height:30px;font-size:20px}
}
</style>
<?php } ?>

<div class="ebslider ebslider-main-wrap">
    <?php /* eb슬라이더 */ ?>
    <div class="ebslider-main">
        <div class="ebslider-main-inner">
            <?php if (is_array($slider)) { ?>
                <?php foreach ($slider as $k => $item) { ?>
                <div class="ebslider-item item-<?php echo $k + 1 ?>">
                    <div class="slider-image">
                        <img src="<?php echo $item['src_1']?>" alt="image" class="img-responsive">
                    </div>
                    <?php if ($item['ei_title']) { ?>
                    <div class="slider-caption">
                        <p><?php echo $item['ei_title']?></p>
                    </div>
                    <?php } ?>
                    
                    <?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
                    <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm">
                        <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&pid=ebslider_itemform&thema=<?php echo $theme; ?>&es_code=<?php echo $es_code; ?>&ei_no=<?php echo $item['ei_no']; ?>&w=u&iw=u&wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-dark"><i class="far fa-edit"></i> EB슬라이더 아이템 수정</a>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            <?php } ?>

            <?php if ($es_default) { ?>
            <div class="ebslider-item item-1">
                <div class="slider-image">
                    <img src="<?php echo $ebslider_skin_url; ?>/image/01.jpg" alt="image" class="img-responsive">
                </div>
                <div class="slider-caption">
                    <p>이윰 코퍼레이션은 물류 유통에 있어 <br>글로벌 교역의 흐름을 이해하여 <br>유통산업의 새로운 길을 만들어 갑니다.</p>
                </div>
            </div>
            <div class="ebslider-item item-2">
                <div class="slider-image">
                    <img src="<?php echo $ebslider_skin_url; ?>/image/02.jpg" alt="image" class="img-responsive">
                </div>
                <div class="slider-caption">
                    <p>이윰 코퍼레이션은 물류 운반 분석과 <br>운송 수단 개발, 개척을 통해 <br>글로벌 네트워크를 형성합니다.</p>
                </div>
            </div>
            <div class="ebslider-item item-3">
                <div class="slider-image">
                    <img src="<?php echo $ebslider_skin_url; ?>/image/01.jpg" alt="image" class="img-responsive">
                </div>
                <div class="slider-caption">
                    <p>이윰 코퍼레이션은 물류 유통에 있어 <br>글로벌 교역의 흐름을 이해하여 <br>유통산업의 새로운 길을 만들어 갑니다.</p>
                </div>
            </div>
            <div class="ebslider-item item-4">
                <div class="slider-image">
                    <img src="<?php echo $ebslider_skin_url; ?>/image/02.jpg" alt="image" class="img-responsive">
                </div>
                <div class="slider-caption">
                    <p>이윰 코퍼레이션은 물류 운반 분석과 <br>운송 수단 개발, 개척을 통해 <br>글로벌 네트워크를 형성합니다.</p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/slick/slick.min.js"></script>
<script>

$(window).load(function(){
    // 첫 로딩 후 텍스트 애니메이션 추가
    setTimeout(function() {
        $(".ebslider-main-inner .ebslider-item").addClass("text-animation");
    }, 1200);

    //슬라이더 설정
    $('.ebslider-main-inner').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 10000,
        fade: true,
        arrows: false,
        dots: false,
        pauseOnHover:false,
    });
});
</script>
<?php } ?>