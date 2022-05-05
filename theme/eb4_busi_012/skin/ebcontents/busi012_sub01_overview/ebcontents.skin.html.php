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
            1. 컨텐츠 마스터 제목 : 회사개요<br>
            2. 스킨선택 : busi012_sub01_overview<br>
            3. 컨텐츠 아이템에서 사용할 링크수 : 0개<br>
            4. 컨텐츠 아이템에서 사용할 이미지수 : 1개<br>
            5. 컨텐츠 아이템에서 사용할 필드수 : 2개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1 입력<br>
            3. 텍스트 필드 #2 입력<br>
            4. 설명글 #1 입력<br>
            5. 이미지 #1 업로드(배경 이미지)<br>
            <div class='margin-hr-5'></div>
            이미지 비율 1400x730 픽셀 이미지 사용.<br>
            EB컨텐츠 아이템 1개로 설정.
            </span>
            "><i class="fas fa-question-circle"></i></button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-overview {position:relative;margin:40px 0 80px}
/* 마스터 */
.ebcontents-overview .master-title {position:relative;}
.ebcontents-overview .master-title:after {content:"";display:block;clear:both}
.ebcontents-overview .master-title h2 {float:left;width:30%;line-height:50px;font-size:34px}
.ebcontents-overview .master-title h2 span {color:#0074E8;font-weight:700}
.ebcontents-overview .master-title h3 {float:right;width:65%;line-height:40px;font-size:24px;color:#707070}
.ebcontents-overview .master-title p {float:right;width:65%;padding-right:200px;line-height:30px;font-size:20px;font-weight:300}
/* 아이템 */
.ebcontents-overview .ebcontents-box {position:relative;border-left:1px solid #0074E8}
.ebcontents-overview .ebcontents-box:after {content:"";display:block;clear:both}
/* 내용 */
.ebcontents-overview .ebcontents-box .ebcontents-content {float:left;width:40%;padding:150px 0 0 30px}
.ebcontents-overview .ebcontents-box .ebcontents-content h4 {margin:0 0 10px;font-size:24px;line-height:40px;font-weight:700}
.ebcontents-overview .ebcontents-box .ebcontents-content h5 {margin-bottom:30px;font-size:18px}
.ebcontents-overview .ebcontents-box .ebcontents-content p {font-size:16px;line-height:26px;font-weight:300}
/* 이미지 */
.ebcontents-overview .ebcontents-box .ebcontents-image {float:right;width:55%}
.ebcontents-overview .ebcontents-box .ebcontents-image img {max-width:100%;height:auto}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px){
    .ebcontents-overview .master-title h2, .ebcontents-overview .master-title h3, .ebcontents-overview .master-title p {float:none;width:100%}
    .ebcontents-overview .master-title h2 br {display:none}
    .ebcontents-overview .master-title p {padding-right:0}
    .ebcontents-overview .ebcontents-box .ebcontents-content {padding-top:10px}
}
@media (max-width:767px) {
    .ebcontents-overview {margin: 0 0 20px}
    .ebcontents-overview .master-title h2 {line-height:30px;font-size:20px}
    .ebcontents-overview .master-title h3 {margin-top:0;line-height:20px;font-size:17px}
    .ebcontents-overview .master-title p {line-height:20px;font-size:15px}
    .ebcontents-overview .ebcontents-box .ebcontents-content, .ebcontents-overview .ebcontents-box .ebcontents-image {float:none;width:100%}
    .ebcontents-overview .ebcontents-box .ebcontents-image {text-align:center}
    .ebcontents-overview .ebcontents-box .ebcontents-image img {max-width:330px}
    .ebcontents-overview .ebcontents-box .ebcontents-content {padding-left:15px}
    .ebcontents-overview .ebcontents-box .ebcontents-content h4 {line-height:20px;font-size:18px}
    .ebcontents-overview .ebcontents-box .ebcontents-content h5 {margin-bottom:10px;line-height:20px;font-size:15px}
    .ebcontents-overview .ebcontents-box .ebcontents-content p {line-height:20px;font-size:13px}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-overview">
    <?php /* ebcontents master */?>
    <div class="master-title">
        <?php if ($ec_master['ec_subject_1']) { ?>
        <h2><?php echo $ec_master['ec_subject_1']; ?></h2>
        <?php } ?>
        <?php if ($ec_master['ec_subject_2']) { ?>
        <h3><?php echo $ec_master['ec_subject_2']; ?></h3>
        <?php } ?>
        <?php if ($ec_master['ec_text_1']) { ?>
        <p><?php echo $ec_master['ec_text_1']; ?></p>
        <?php } ?>
    </div>

    <?php /* ebcontents item */?>
    <?php if (is_array($contents)) { ?>
        <?php foreach ($contents as $k => $item) { ?>
        <div class="ebcontents-box ebcontents-box-<?php echo $k + 1 ?>">
            <div class="ebcontents-image"><img src="<?php echo $item['src_1']?>" alt="image"></div>
            <div class="ebcontents-content">
                <?php if ($item['ci_subject_1']) { ?>
                <h4><?php echo $item['ci_subject_1']; ?></h4>
                <?php } ?>
                <?php if ($item['ci_subject_2']) { ?>
                <h5><?php echo $item['ci_subject_2']; ?></h5>
                <?php } ?>
                <?php if ($item['ci_text_1']) { ?>
                <p><?php echo $item['ci_text_1']; ?></p>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    <?php } ?>

    <?php if ($ec_default) { ?>
        <div class="ebcontents-box ebcontents-box-1">
            <div class="ebcontents-content">
                <div class="ebcontents-content-circle">
                    <h4>LEISURELY LIFE</h4>
                    <h5>물류 운송 전문 산업의 선두주자</h5>
                </div>
                <p>온라인상에서 소셜미디어에 의한 쌍방향 소통을 바탕으로 한 관계 지향적이고 집단 기능적 속성을 가진 소셜펀딩이다.<br>파도를 넘어 저 이상을 향해 항해할 준비가 됐습니다. 혁신적 기술, 독특한 디자인을 겸비한 제품을 통해 보트 산업의 선두에 있습니다. <br>공간의 경계를 뛰어넘는 새로운 가능성을 제공하기 위해 끊임없이 도전해 나갈 것 입니다.</p>
            </div>
            <div class="ebcontents-image"><img src="<?php echo $ebcontents_skin_url; ?>/image/01.jpg" alt="image"></div>
        </div>
    <?php } ?>
</div>
<?php } ?>