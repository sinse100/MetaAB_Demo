<?php
if (!defined('_EYOOM_')) exit;
?>
<?php /* eb콘텐츠 편집 버튼 */ ?>
<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
<div class="btn-edit-mode-wrap <?php if ($ec_master['ec_state'] == '2') { ?>hidden-message<?php } ?>">
    <div class="btn-edit-mode text-center hidden-xs hidden-sm" style="top:100px">
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
            2. 스킨선택 : busi012_sect04<br>
            3. 마스터 타이틀 #1, #2 입력<br>
            4. 컨텐츠 아이템에서 사용할 링크수 : 1개<br>
            5. 컨텐츠 아이템에서 사용할 이미지수 : 2개<br>
            6. 컨텐츠 아이템에서 사용할 필드수 : 2개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1, #2, #3 입력<br>
            3. 설명문구 #1 입력<br>
            4. 연결주소 [링크] #1 입력<br>
            5. 이미지 #1 업로드<br>
            <div class='margin-hr-5'></div>
            이미지 비율 900x1600 픽셀 이미지 사용.
            </span>
        "><i class="fas fa-question-circle"></i>
            </button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-busi {position:relative}
/* 아이템 */
.ebcontents-busi-inner:after {content:"";display:block;clear:both}
.ebcontents-busi .item {position:relative;overflow:hidden;float:left;width:33.333%;}
.ebcontents-busi .item-box {position:relative;height:100vh;background-size:cover;background-position:center;background-repeat:no-repeat}
.ebcontents-busi .item-box:after {content:"";display:block;position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.25);-webkit-transition:background .7s ease;transition:background .7s ease}
.ebcontents-busi .item-box:hover:after {background:rgba(0,0,0,.5)}
/* 이미지 */
.ebcontents-busi .section-image {display:none}
/* 내용 */
.ebcontents-busi .section-content {position:absolute;top:50%;transform:translateY(-50%);z-index:1;width:100%;padding:0 100px;text-align:center}
.ebcontents-busi .section-txt h4 {position:relative;margin-bottom:70px;line-height:30px;font-size:20px;color:#fff}
.ebcontents-busi .section-txt h4 small {display:block;margin-top:5px;font-size:13px;color:#ccc}
.ebcontents-busi .section-txt h4:before, .ebcontents-busi .section-txt h4:after {content:"";display:block;position:absolute;top:65px;left:50%;width:1px;height:40px;background:#fff}
.ebcontents-busi .section-txt h4:after {height:0;background:#0074E8;transition:all .5s ease}
.ebcontents-busi .item-box:hover .section-txt h4:after {height:40px}
.ebcontents-busi .section-txt h5 {line-height:25px;font-size:18px;font-weight:300;color:#fff}
/* 버튼 */
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (min-width:768px) and (max-width:991px){
    .ebcontents-busi .item-box {height:auto;min-height:500px}
    .ebcontents-busi .section-content {padding:0 30px}
    .ebcontents-busi .section-txt h4 {line-height:20px;font-size:18px}
    .ebcontents-busi .section-txt h5 {line-height:20px;font-size:13px}
}
@media (max-width:767px){
    .ebcontents-busi .item {width:100%}
    .ebcontents-busi .item-box {height:auto}
    .ebcontents-busi .item-box:after {background:rgba(0,0,0,.35)}
    .ebcontents-busi .section-image {display:block}
    .ebcontents-busi .section-content {padding:0 30px}
    .ebcontents-busi .section-txt h4 {margin-bottom:20px;line-height:20px;font-size:18px}
    .ebcontents-busi .section-txt h4:before, .ebcontents-busi .section-txt h4:after {display:none}
    .ebcontents-busi .section-txt h5 {line-height:20px;font-size:13px}
}
</style>
<?php } ?>
<div class="ebcontents ebcontents-busi">

    <div class="ebcontents-busi-inner clear-after">
    <?php /* ebcontents item */?>
    <?php if (is_array($contents)) { ?>
        <?php foreach ($contents as $k => $item) { ?>
        <div class="item item-<?php echo $k + 1 ?>">
            <div class="item-box" style='background-image:url("<?php echo $item['src_1']?>")'>
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $item['src_2']?>" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <div class="section-txt">
                        <?php if ($item['ci_subject_1']) { ?>
                        <h4><?php echo $item['ci_subject_1']; ?> <small><?php echo $item['ci_subject_2']; ?></small></h4>
                        <?php } ?>
                        <?php if ($item['ci_text_1']) { ?>
                        <h5><?php echo $item['ci_text_1']; ?></h5>
                        <?php } ?>
                        <?php if ($item['href_1']) { ?>
                        <div class="btn-more btn-more-white"><a href="<?php echo $item['href_1']; ?>" target="<?php echo $item['target_1']; ?>">자세히 보기 +</a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>

    <?php if ($ec_default) { ?>
        <div class="item item-1">
            <div class="item-box" style='background-image:url("<?php echo $ebcontents_skin_url; ?>/image/01.jpg")'>
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $ebcontents_skin_url; ?>/image/01m.jpg" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <div class="section-txt">
                        <h4>글로벌 유통망 구축</h4>
                        <h5>합리적인 교통망을 선택해 최적의 운송시스템으로 전세계 물류 운송</h5>
                        <div class="btn-more btn-more-white"><a href="">자세히 보기 +</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item item-2">
            <div class="item-box" style='background-image:url("<?php echo $ebcontents_skin_url; ?>/image/02.jpg")'>
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $ebcontents_skin_url; ?>/image/02m.jpg" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <div class="section-txt">
                        <h4>글로벌 유통망 구축</h4>
                        <h5>합리적인 교통망을 선택해 최적의 운송시스템으로 전세계 물류 운송</h5>
                        <div class="btn-more btn-more-white"><a href="">자세히 보기 +</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item item-3">
            <div class="item-box" style='background-image:url("<?php echo $ebcontents_skin_url; ?>/image/03.jpg")'>
                <?php /* 섹션 이미지 */ ?>
                <div class="section-image">
                    <img src="<?php echo $ebcontents_skin_url; ?>/image/03m.jpg" alt="image" class="img-responsive">
                </div>
                <?php /* 섹션 내용 */ ?>
                <div class="section-content">
                    <div class="section-txt">
                        <h4>글로벌 유통망 구축</h4>
                        <h5>합리적인 교통망을 선택해 최적의 운송시스템으로 전세계 물류 운송</h5>
                        <div class="btn-more btn-more-white"><a href="">자세히 보기 +</a></div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
<?php } ?>