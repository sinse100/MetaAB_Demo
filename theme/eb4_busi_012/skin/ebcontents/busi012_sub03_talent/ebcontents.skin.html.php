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
            <button type="button" class="btn-e btn-e-xs btn-e-red popovers" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-content="
                <span class='font-size-11'>
            <strong class='color-indigo'>좌측 [EB컨텐츠 설정하기 버튼] 클릭 후 아래 설명 참고</strong><br>
            <div class='margin-hr-5'></div>
            <span class='color-indigo'>[설정정보]</span><br>
            1. 컨텐츠 마스터 제목 : 인재상<br>
            2. 스킨선택 : busi012_sub03_talent<br>
            3. 컨텐츠 아이템에서 사용할 링크수 : 0개<br>
            4. 컨텐츠 아이템에서 사용할 이미지수 : 1개<br>
            5. 컨텐츠 아이템에서 사용할 필드수 : 2개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1 입력<br>
            3. 텍스트 필드 #2 입력<br>
            4. 설명글 #1 입력<br>
            5. 이미지 #1 업로드<br>
            <div class='margin-hr-5'></div>
            배경 이미지 비율 1000x660 픽셀 이미지 사용 <br>
            텍스트 필드 #2에 strong 태그 사용시 빨간색 글자 출력
            </span>
            "><i class="fas fa-question-circle"></i></button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-talent {position:relative;margin:40px 0 80px;overflow:hidden}
/* 콘텐츠 마스터 */
.ebcontents-talent .ebcontents-subtitle h3 {position:relative;margin:0 0 70px;font-size:26px;line-height:30px;text-align:center}
.ebcontents-talent .ebcontents-subtitle h3:after {content:"";display:block;position:absolute;bottom:-45px;left:50%;width:1px;height:30px;background:#999}
/* 콘텐츠 아이템 */
.ebcontents-talent li {padding:40px 0;border-bottom:1px solid #ddd}
.ebcontents-talent li:first-child {padding-top:0}
.ebcontents-talent li:last-child {padding-bottom:80px}
.ebcontents-talent .ebcontents-box {position:relative}
.ebcontents-talent .ebcontents-box:after {content:"";display:block;clear:both}
.ebcontents-talent .ebcontents-box .ebcontents-image {float:left;width:40%;padding-right:50px}
.ebcontents-talent .ebcontents-box .ebcontents-image img {position:relative;display:block;max-width:100%;height:auto}
.ebcontents-talent .ebcontents-box .ebcontents-content {float:left;width:60%}
.ebcontents-talent .ebcontents-box .ebcontents-content h4 {margin:10px 0 30px;font-size:50px;line-height:50px;color:#ccc}
.ebcontents-talent .ebcontents-box .ebcontents-content h5 {margin:0 0 10px;font-size:20px;line-height:34px;word-break:keep-all}
.ebcontents-talent .ebcontents-box .ebcontents-content h5 strong {color:#0074E8}
.ebcontents-talent .ebcontents-box .ebcontents-content p {margin-bottom:0;font-size:16px;line-height:30px}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px) {
   .ebcontents-talent .ebcontents-box .ebcontents-content h4 {margin-bottom:10px;font-size:30px;line-height:30px}
}
@media (max-width:767px) {
    .ebcontents-talent {padding:0 0 25px}
    .ebcontents-talent .ebcontents-box .ebcontents-image, .ebcontents-talent .ebcontents-box .ebcontents-content {float:none;width:100%}
    .ebcontents-talent .ebcontents-box .ebcontents-image {padding-right:0;margin-bottom:20px}
    .ebcontents-talent .ebcontents-box .ebcontents-content p {font-size:14px;line-height:24px}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-talent">
    <div class="">
        <?php /* ebcontents master */?>
        <div class="ebcontents-subtitle">
            <h3><?php echo $ec_master['ec_subject_1']; ?></h3>
        </div>

        <ul class="list-unstyled">
            <?php if (is_array($contents)) { ?>
                <?php foreach ($contents as $k => $item) { ?>
                <li>
                    <div class="ebcontents-box ebcontents-box-<?php echo $k + 1 ?>">
                        <div class="ebcontents-image waypoints-down">
                            <img src="<?php echo $item['src_1']?>" alt="image">
                        </div>
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
                </li>
                <?php } ?>
            <?php } ?>

            <?php if ($ec_default) { ?>
                <li>
                    <div class="ebcontents-box ebcontents-box-1">
                        <div class="ebcontents-image waypoints-down">
                            <img src="<?php echo $ebcontents_skin_url; ?>/image/01.jpg" alt="image">
                        </div>
                        <div class="ebcontents-content">
                            <h4>Challenge</h4>
                            <h5>실패를 두려워 하지 않는 <strong>도전</strong>을 통해 성장해 나갑니다.</h5>
                            <p>자금제공자의 이익추구 목적에 따라 투자형과 비투자형으로 구분할 수 있으며, 비투자형은 단순한 기부를 목적으로 하는 기부형(donation)과 일정한 보상을 받는 후원형(reward)이 있고, 투자형은 개인 간의 대출형(lending)과 증권을 매개로 한 지분투자형(equity)이 있다.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ebcontents-box ebcontents-box-2">
                        <div class="ebcontents-image waypoints-down">
                            <img src="<?php echo $ebcontents_skin_url; ?>/image/02.jpg" alt="image">
                        </div>
                        <div class="ebcontents-content">
                            <h4>Change</h4>
                            <h5>주변 환경의 <strong>변화</strong>에도 굳건하게 자리를 지킵니다.</h5>
                            <p>자금제공자의 이익추구 목적에 따라 투자형과 비투자형으로 구분할 수 있으며, 비투자형은 단순한 기부를 목적으로 하는 기부형(donation)과 일정한 보상을 받는 후원형(reward)이 있고, 투자형은 개인 간의 대출형(lending)과 증권을 매개로 한 지분투자형(equity)이 있다.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ebcontents-box ebcontents-box-3">
                        <div class="ebcontents-image waypoints-down">
                            <img src="<?php echo $ebcontents_skin_url; ?>/image/03.jpg" alt="image">
                        </div>
                        <div class="ebcontents-content">
                            <h4>Credit</h4>
                            <h5>어떤 상황에서나, 누구에게나 줄 수 있는 <strong>신용</strong>을 가집니다.</h5>
                            <p>자금제공자의 이익추구 목적에 따라 투자형과 비투자형으로 구분할 수 있으며, 비투자형은 단순한 기부를 목적으로 하는 기부형(donation)과 일정한 보상을 받는 후원형(reward)이 있고, 투자형은 개인 간의 대출형(lending)과 증권을 매개로 한 지분투자형(equity)이 있다.</p>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>