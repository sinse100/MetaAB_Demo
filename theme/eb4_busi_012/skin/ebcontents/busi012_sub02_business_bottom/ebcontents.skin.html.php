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
            1. 컨텐츠 마스터 제목 : 사업 현황<br>
            2. 스킨선택 : busi012_business_bottom<br>
            3. 컨텐츠 아이템에서 사용할 링크수 : 0개<br>
            4. 컨텐츠 아이템에서 사용할 이미지수 : 1개<br>
            5. 컨텐츠 아이템에서 사용할 필드수 : 1개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1 입력<br>
            3. 설명글 #1 입력<br>
            4. 이미지 #1 업로드<br>
            <div class='margin-hr-5'></div>
            배경 이미지 비율 900x600 픽셀 이미지 사용<br>
            EB컨텐츠 아이템 3개로 설정
            </span>
            "><i class="fas fa-question-circle"></i></button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-busi-bottom {position:relative;margin-bottom:40px}
/* 마스터 */
.ebcontents-busi-bottom .ebcontents-subtitle h3 {position:relative;margin:0 0 70px;font-size:26px;line-height:30px;text-align:center}
.ebcontents-busi-bottom .ebcontents-subtitle h3:after {content:"";display:block;position:absolute;bottom:-45px;left:50%;width:1px;height:30px;background:#999}
/* 아이템 */
.ebcontents-busi-bottom .ebcontents-box {position:relative}
.ebcontents-busi-bottom .ebcontents-box .ebcontents-image img {max-width:100%;height:auto}
.ebcontents-busi-bottom .ebcontents-box .ebcontents-content {position:relative;padding:15px;background:#f8f8f8;text-align:center}
.ebcontents-busi-bottom .ebcontents-box .ebcontents-content .content-num {position:absolute;top:-25px;left:50%;transform:translatex(-50%);width:50px;height:50px;line-height:50px;text-align:center;background:#333;font-size:18px;font-weight:300;color:#fff}
.ebcontents-busi-bottom .ebcontents-box .ebcontents-content h4 {margin-top:30px;font-size:20px;font-weight:bold}
.ebcontents-busi-bottom .ebcontents-box .ebcontents-content h5 {font-size:13px;color:#999}
.ebcontents-busi-bottom .ebcontents-box .ebcontents-content p {font-size:16px}
.ebcontents-busi-bottom .condition-bottom {position:relative;margin:40px 0 0;padding:30px;font-size:16px;line-height:30px;border:1px solid #dedede;background:#f8f8f8}
.ebcontents-busi-bottom .condition-bottom:after {content:"";position:absolute;top:0;left:0;border-top:30px solid #dedede;border-right:30px solid transparent;border-left:0 solid transparent}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px){
    .ebcontents-busi-bottom .ebcontents-subtitle h3 {font-size:18px;line-height:28px}
}
@media (max-width:767px) {
    .ebcontents-busi-bottom .ebcontents-box-2 {margin:30px 0}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-busi-bottom">
    <?php /* ebcontents master */?>
    <div class="ebcontents-subtitle">
        <h3><?php echo $ec_master['ec_subject_1']; ?></h3>
    </div>

    <?php /* ebcontents item */?>
    <div class="row">
        <?php if (is_array($contents)) { ?>
            <?php foreach ($contents as $k => $item) { ?>
            <div class="col-sm-4">
                <div class="ebcontents-box ebcontents-box-<?php echo $k + 1 ?>">
                    <div class="ebcontents-image">
                        <img src="<?php echo $item['src_1']?>" alt="image">
                    </div>
                    <div class="ebcontents-content">
                        <div class="content-num">0<?php echo $k + 1 ?></div>
                        <?php if ($item['ci_subject_1']) { ?>
                        <h4><?php echo $item['ci_subject_1']; ?></h4>
                        <?php } ?>
                        <?php if ($item['ci_text_1']) { ?>
                        <p><?php echo $item['ci_text_1']; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <?php if ($ec_default) { ?>
            <div class="col-sm-4">
                <div class="ebcontents-box ebcontents-box-1">
                    <div class="ebcontents-image">
                        <img src="<?php echo $ebcontents_skin_url; ?>/image/01.jpg" alt="image">
                    </div>
                    <div class="ebcontents-content">
                        <div class="content-num">01</div>
                        <h4>육상 운송 시스템</h4>
                        <h5>Overland Transport System</h5>
                        <p>쌍방향 소통을 바탕으로 한 관계 지향적이고 집단 기능적 속성을 가진 소셜펀딩이다.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ebcontents-box ebcontents-box-2">
                    <div class="ebcontents-image">
                        <img src="<?php echo $ebcontents_skin_url; ?>/image/02.jpg" alt="image">
                    </div>
                    <div class="ebcontents-content">
                        <div class="content-num">02</div>
                        <h4>해상 운송 시스템</h4>
                        <h5>Marine Transport System</h5>
                        <p>쌍방향 소통을 바탕으로 한 관계 지향적이고 집단 기능적 속성을 가진 소셜펀딩이다.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="ebcontents-box ebcontents-box-3">
                    <div class="ebcontents-image">
                        <img src="<?php echo $ebcontents_skin_url; ?>/image/03.jpg" alt="image">
                    </div>
                    <div class="ebcontents-content">
                        <div class="content-num">03</div>
                        <h4>항공 운송 시스템</h4>
                        <h5>Air Transport System</h5>
                        <p>쌍방향 소통을 바탕으로 한 관계 지향적이고 집단 기능적 속성을 가진 소셜펀딩이다.</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if ($ec_master['ec_text_1']) { ?>
    <p class="condition-bottom"><?php echo $ec_master['ec_text_1']; ?></p>
    <?php } ?>
</div>
<?php } ?>