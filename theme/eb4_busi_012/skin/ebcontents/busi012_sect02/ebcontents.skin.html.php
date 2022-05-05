<?php
if (!defined('_EYOOM_')) exit;
?>
<?php /* eb콘텐츠 편집 버튼 */ ?>
<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
<div class="btn-edit-mode-wrap <?php if ($ec_master['ec_state'] == '2') { ?>hidden-message<?php } ?>">
    <div class="btn-edit-mode text-center hidden-xs hidden-sm">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebcontents_form&amp;thema=<?php echo $theme; ?>&amp;ec_code=<?php echo $ec_master['ec_code']; ?>&amp;w=u&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> EB컨텐츠 마스터 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebcontents_form&amp;thema=<?php echo $theme; ?>&amp;ec_code=<?php echo $ec_master['ec_code']; ?>&amp;w=u" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                <i class="far fa-window-maximize"></i>
            </a>
            <button type="button" class="btn-e btn-e-xs btn-e-red popovers" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="
            <span class='font-size-11'>
            <strong class='color-indigo'>좌측 [EB컨텐츠 설정하기 버튼] 클릭 후 아래 설명 참고</strong><br>
            <div class='margin-hr-5'></div>
            <span class='color-indigo'>[설정정보]</span><br>
            1. 컨텐츠 마스터 제목 : 회사소개<br>
            2. 스킨선택 : busi012_sect02<br>
            3. 마스터 타이틀 #1, #2 입력<br>
            4. 컨텐츠 아이템에서 사용할 링크수 : 1개<br>
            5. 컨텐츠 아이템에서 사용할 이미지수 : 1개<br>
            6. 컨텐츠 아이템에서 사용할 필드수 : 2개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1, #2 입력<br>
            3. 설명문구 #1 입력<br>
            4. 연결주소 [링크] #1 입력<br>
            5. 이미지 #1 업로드<br>
            <div class='margin-hr-5'></div>
            이미지 비율 1000x1000(정사각형) 픽셀 이미지 사용.
            </span>
        "><i class="fas fa-question-circle"></i>
            </button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-sect02 {position:relative}
/* 아이템 */
.ebcontents-sect02 .ebcontents-sect02-item {position:relative;overflow:hidden}
/* 이미지 */
.ebcontents-sect02 .section-image {float:left;width:38%;padding-left:40px}
/* 내용 */
.ebcontents-sect02 .section-content {float:right;width:60%;padding:30px 40px 0}
.ebcontents-sect02 .section-content h4 {position:relative;margin:0 0 10px;line-height:30px;font-size:26px;font-weight:700;text-transform:uppercase;color:#0074E8}
.ebcontents-sect02 .section-txt {padding:40px 30px 40px 0;border:4px solid #0074E8;border-left:0 none}
.ebcontents-sect02 .section-txt h5 {margin:0 0 15px;font-size:20px;line-height:30px}
.ebcontents-sect02 .section-txt p {overflow:hidden;margin-bottom:15px;font-size:15px;line-height:25px;color:#707070;word-break:keep-all}
/* 컨트롤 좌우 */
.ebcontents-sect02 .slick-next, .ebcontents-sect02 .slick-prev {width:40px;height:80px;-webkit-transition: all .3s ease;-moz-transition: all .3s ease;-o-transition: all .3s ease;-ms-transition: all .3s ease;transition: all .3s ease}
.ebcontents-sect02 .slick-next {right:-40px;z-index:1}
.ebcontents-sect02 .slick-prev {left:-40px;z-index:1}
.ebcontents-sect02 .slick-next:before, .ebcontents-sect02 .slick-prev:before {content:"";display:block;position:absolute;top:50%;width:40px;height:40px;margin-top:-20px;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-o-transform:rotate(45deg);-ms-transform:rotate(45deg);transform:rotate(45deg)}
.ebcontents-sect02 .slick-next:before {right:10px;border-right:1px solid #707070;border-top:1px solid #707070}
.ebcontents-sect02 .slick-prev:before {left:10px;border-left:1px solid #707070;border-bottom:1px solid #707070}
/* 컨트롤 점 */
.ebcontents-sect02 .slick-dots {bottom:-40px}
.ebcontents-sect02 .slick-dots li button:before {font-size:10px}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:1279px){
    .ebcontents-sect02 .slick-next {right:-10px}
    .ebcontents-sect02 .slick-prev {left:-10px}
}
@media (max-width:1199px){
    .ebcontents-sect02 .section-content {padding:0 40px 0 20px}
    .ebcontents-sect02 .section-content h4 {line-height:30px;font-size:22px}
    .ebcontents-sect02 .section-txt {padding:25px 20px 25px 0}
    .ebcontents-sect02 .section-txt h5 {line-height:30px;font-size:18px}
}
@media (max-width:991px){
    .ebcontents-sect02 .section-image {padding-left:0}
    .ebcontents-sect02 .section-content {padding-right:0}
}
@media (max-width:767px){
    .ebcontents-sect02 .section-image, .ebcontents-sect02 .section-content {float:none;width:100%}    
    .ebcontents-sect02 .section-image {max-width:350px;margin:0 auto 15px}
    .ebcontents-sect02 .section-content {padding:0 5px}
    .ebcontents-sect02 .section-content h4 {line-height:20px;font-size:18px}
    .ebcontents-sect02 .section-txt {padding:15px 15px 15px 0}
    .ebcontents-sect02 .section-txt h5 {line-height:20px;font-size:15px}
    .ebcontents-sect02 .section-txt p {margin-bototm:10px;line-height:20px;font-size:13px}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-sect02">
    <div class="container">
        <?php /* ebcontents master */?>
        <div class="master-title">
            <?php if ($ec_master['ec_subject_1']) { ?>
            <h2><?php echo $ec_master['ec_subject_1']; ?></h2>
            <?php } ?>
            <?php if ($ec_master['ec_subject_2']) { ?>
            <h3><?php echo $ec_master['ec_subject_2']; ?></h3>
            <?php } ?>
        </div>

        <div class="ebcontents-sect02-slider">
        <?php /* ebcontents item */?>
        <?php if (is_array($contents)) { ?>
            <?php foreach ($contents as $k => $item) { ?>
            <div class="ebcontents-sect02-item">
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $item['src_1']?>" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <?php if ($item['ci_subject_1']) { ?>
                    <h4><span><?php echo $item['ci_subject_1']; ?></span></h4>
                    <?php } ?>
                    <div class="section-txt">
                        <?php if ($item['ci_subject_2']) { ?>
                        <h5><?php echo $item['ci_subject_2']; ?></h5>
                        <?php } ?>
                        <?php if ($item['ci_text_1']) { ?>
                        <p><?php echo $item['ci_text_1']; ?></p>
                        <?php } ?>
                        <?php if ($item['href_1']) { ?>
                        <div class="btn-more"><a href="<?php echo $item['href_1']; ?>" target="<?php echo $item['target_1']; ?>">자세히 보기 +</a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php if ($ec_default) { ?>
            <div class="ebcontents-sect02-item">
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $ebcontents_skin_url; ?>/image/01.jpg" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <h4><span>Global Transport Industry</span></h4>
                    <div class="section-txt">
                        <h5>글로벌 물류운송 산업</h5>
                        <p>파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다. 글로벌 건설리더로 공동의 가치를 창조하겠습니다. 파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다.</p>
                        <div class="btn-more"><a href="">자세히 보기 +</a></div>
                    </div>
                </div>
            </div>
            <div class="ebcontents-sect02-item">
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $ebcontents_skin_url; ?>/image/02.jpg" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <h4><span>Global Transport Industry</span></h4>
                    <div class="section-txt">
                        <h5>글로벌 물류운송 산업</h5>
                        <p>파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다. 글로벌 건설리더로 공동의 가치를 창조하겠습니다. 파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다.</p>
                        <div class="btn-more"><a href="">자세히 보기 +</a></div>
                    </div>
                </div>
            </div>
            <div class="ebcontents-sect02-item">
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $ebcontents_skin_url; ?>/image/03.jpg" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <h4><span>Global Transport Industry</span></h4>
                    <div class="section-txt">
                        <h5>글로벌 물류운송 산업</h5>
                        <p>파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다. 글로벌 건설리더로 공동의 가치를 창조하겠습니다. 파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다.</p>
                        <div class="btn-more"><a href="">자세히 보기 +</a></div>
                    </div>
                </div>
            </div>
            <div class="ebcontents-sect02-item">
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $ebcontents_skin_url; ?>/image/04.jpg" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <h4><span>Global Transport Industry</span></h4>
                    <div class="section-txt">
                        <h5>글로벌 물류운송 산업</h5>
                        <p>파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다. 글로벌 건설리더로 공동의 가치를 창조하겠습니다. 파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다.</p>
                        <div class="btn-more"><a href="">자세히 보기 +</a></div>
                    </div>
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
        $(".ebslider-sect01-inner .ebslider-item").addClass("text-animation");
    }, 500);

    //슬라이더 설정
    $('.ebcontents-sect02-slider').slick({
        slidesToShow: 1,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 15000, //15초
        responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
          }
        }
        ]
    });

	// 카운트 총 수 출력
	var totalItem = $('.ebcontents-sect02-slider-nav .slider-nav-item').length;//실제 아이템보다 클론이 2개가 더 생기기 때문에 -2를 넣었으며 1개일때는 클론이 없기에 아래의 if문을 사용해 1로 변경
	if(totalItem == -1) {
		totalItem = 1;
	}
	$('.item-total-count').html(totalItem);
});
</script>
<?php } ?>