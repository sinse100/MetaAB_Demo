<?php
if (!defined('_EYOOM_')) exit;
add_stylesheet('<link href="https://fonts.googleapis.com/css?family=Do+Hyeon&amp;subset=korean" rel="stylesheet">',0);
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
            1. 컨텐츠 마스터 제목 : 레저보트<br>
            2. 스킨선택 : busi012_sub02_business_top<br>
            3. 컨텐츠 아이템에서 사용할 링크수 : 0개<br>
            4. 컨텐츠 아이템에서 사용할 이미지수 : 1개<br>
            5. 컨텐츠 아이템에서 사용할 필드수 : 1개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1 입력<br>
            3. 설명글 #1,#2 입력<br>
            4. 이미지 #1 업로드<br>
            <div class='margin-hr-5'></div>
            이미지 비율 1400x500 픽셀 이미지 사용.<br>
            텍스트 필드에 strong 태그 사용시 컬러 적용<br>
            설명 필드 입력시 br 태그 사용.<br>
            EB컨텐츠 아이템 1개로 설정.
            </span>
            "><i class="fas fa-question-circle"></i></button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-busi-top {position:relative;margin:40px 0 80px}
/* 콘텐츠 마스터 */
.ebcontents-busi-top .master-title {position:relative;margin-bottom:60px;text-align:center}
.ebcontents-busi-top .master-title h3 {margin:0 0 5px;font-size:20px;line-height:20px;color:#707070;font-family: 'Do Hyeon', sans-serif}
.ebcontents-busi-top .master-title h2 {margin:0;font-size:36px;line-height:36px;font-family: 'Do Hyeon', sans-serif}
.ebcontents-busi-top .master-title:after {content:"";display:block;position:absolute;bottom:-20px;left:50%;width:40px;height:1px;margin-left:-20px;background:#333}
/* 콘텐츠 아이템 */
.ebcontents-busi-top .section-box {position:relative}
/* 이미지 */
.ebcontents-busi-top .section-box .section-image {position:relative;overflow:hidden}
.ebcontents-busi-top .section-box .section-image img {display:block;max-width:100%;height:auto}
.ebcontents-busi-top .section-box .section-image h4 {position:absolute;top:50%;transform:translateY(-50%);width:100%;line-height:40px;font-size:24px;font-weight:300;text-align:center;color:#fff}
/* 타이틀 */
.ebcontents-busi-top .section-box .section-content {position:relative;width:100%;margin-top:50px;padding-left:30px;border-left:1px solid #0074E8}
.ebcontents-busi-top .section-box .section-content h5 {font-size:20px}
.ebcontents-busi-top .section-box .section-content p {margin:20px 0 0;font-size:16px;line-height:26px;font-weight:300}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px){
    .ebcontents-busi-top {margin:20px 0 40px}
}
@media (max-width:767px){
    .ebcontents-busi-top {margin:0 0 20px}
    .ebcontents-busi-top .section-box .section-image h4 {line-height:25px;font-size:18px}
    .ebcontents-busi-top .section-box .section-content {margin-top:30px;padding-left:15px}
    .ebcontents-busi-top .section-box .section-content h5 {margin-bottom:20px;font-size:17px;line-height:25px}
    .ebcontents-busi-top .section-box .section-content p {font-size:13px;line-height:20px}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-busi-top">
    <?php /* ebcontents item */?>
    <?php if (is_array($contents)) { ?>
        <?php foreach ($contents as $k => $item) { ?>
            <div class="section-box section-box-<?php echo $k + 1 ?>">
                <div class="section-image">
                    <img src="<?php echo $item['src_1']?>" alt="icon">
                    <?php if ($item['ci_subject_1']) { ?>
                    <h4><?php echo $item['ci_subject_1']; ?></h4>
                    <?php } ?>
                </div>
                <div class="section-content">
                    <?php if ($item['ci_subject_2']) { ?>
                    <h5><?php echo $item['ci_subject_2']; ?></h5>
                    <?php } ?>
                    <?php if ($item['ci_text_1']) { ?>
                    <p><?php echo $item['ci_text_1']; ?></p>
                    <?php } ?>
                    <?php if ($item['ci_text_2']) { ?>
                    <p><?php echo $item['ci_text_2']; ?></p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

    <?php if ($ec_default) { ?>
        <div class="section-box section-box-1">
            <div class="section-image">
                <img src="<?php echo $ebcontents_skin_url; ?>/image/01.jpg" alt="image">
                <h4>물류 운송 산업은 점점 더 <strong>전문화</strong>되고 <br><strong>다양화</strong>되어 만족 서비스를 드립니다.</h4>
            </div>
            <div class="section-content">
                <h5>물류 운송 산업은 점점 더 <strong>전문화</strong>되고 <strong>다양화</strong>되어 쉽게 접할 수 있습니다.</h5>
                <p>도로, 교량, 터널, 항만시설 등 수많은 국내외 대형 토목 사업을 성공적으로 이끌어 왔습니다. <br>세계에서 두번째로 PSM(Precast Span Method:35m) 길이의 상판을 3~5일만에 초고속으로 연결하는 최첨단 다리상판 설치 공법을 도입한 경부고속철도 제3공구, 국내 최초의 복층교량인 청담대교, 국내 최장 도로터널인 배후령터널 등 주요 프로젝트를 풍부한 시공경험과 첨단 기술력을 축척해 왔습니다.</p>
                <p>또한, 항만개발사업의 핵심기술 확보에도 적극 투자해 아산 국가산업단지 고대지구 항만공사, 인천북항 민자사업 등 다양한 항만사업도 추진하고 있습니다. 지속적인 기술개발 투자와 함께 우수인재를 발굴하고 각 공정의 전문가를 양성함으로써 토목분야에서 보다 높은 경쟁력을 확보해 가고 있습니다.</p>
            </div>
        </div>
    <?php } ?>
</div>
<?php } ?>