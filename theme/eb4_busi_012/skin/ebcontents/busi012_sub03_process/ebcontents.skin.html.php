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
            1. 컨텐츠 마스터 제목 : 채용과정<br>
            2. 스킨선택 : busi007_sub03_process<br>
            3. 컨텐츠 아이템에서 사용할 링크수 : 0개<br>
            4. 컨텐츠 아이템에서 사용할 이미지수 : 0개<br>
            5. 컨텐츠 아이템에서 사용할 필드수 : 1개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1 입력<br>
            3. 설명글 #1 입력<br>
            <div class='margin-hr-5'></div>
            다운로드 파일은 마스터 첨부파일 등록
            </span>
            "><i class="fas fa-question-circle"></i></button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-process {position:relative;margin:40px 0 80px;padding-bottom:80px;overflow:hidden;border-bottom:1px solid #ddd}
/* 마스터 */
.ebcontents-process .ebcontents-subtitle h3 {position:relative;margin:0 0 70px;font-size:26px;line-height:30px;text-align:center}
.ebcontents-process .ebcontents-subtitle h3:after {content:"";display:block;position:absolute;bottom:-45px;left:50%;width:1px;height:30px;background:#999}
/* 아이템 */
.ebcontents-process .ebcontents-box dl {margin:0}
.ebcontents-process .ebcontents-box dl:after {content:"";display:block;clear:both}
.ebcontents-process .ebcontents-box dl dt {float:left;width:30%;padding-right:50px;font-size:16px}
.ebcontents-process .ebcontents-box dl dt h4 {padding:20px 0;margin:0;font-size:16px;font-weight:bold;border-top:3px solid #333;overflow:hidden}
.ebcontents-process .ebcontents-box dl dt h4 span {margin-right:20px;color:#909090;font-size:0.9em;font-weight:normal}
.ebcontents-process .ebcontents-box dl dd {float:left;width:70%;padding:20px 0;border-top:1px solid #333}
.ebcontents-process .ebcontents-box dl dd p {margin-bottom:0;font-size:16px}
/* 마스터 설명글 & 다운로드 버튼 */
.master-paragraph {padding:20px;margin:20px 0;line-height:28px;background:#f2f2f2}
.btn-recruit {margin-bottom:40px;text-align:center}
.btn-recruit a {display:inline-block;padding:10px 25px;color:#fff;background:#69AFDB;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;-ms-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out}
.btn-recruit a:hover {background:#416FB9}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px){
    .ebcontents-process .ebcontents-subtitle h3 {font-size:18px;line-height:28px}
    .ebcontents-process .ebcontents-box dl dt {width:35%;padding-right:30px}
    .ebcontents-process .ebcontents-box dl dd {width:65%}
}
@media (max-width:767px) {
    .ebcontents-process .ebcontents-master p {font-size:15px}
    .ebcontents-process .ebcontents-box dl dt, .ebcontents-process .ebcontents-box dl dd {float:none;width:100%}
    .ebcontents-process .ebcontents-box dl dt {padding-right:0}
    .ebcontents-process .ebcontents-box dl dt h4, .ebcontents-process .ebcontents-box dl dd p {font-size:14px;line-height:24px}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-process">
    <?php /* ebcontents master */?>
    <div class="ebcontents-subtitle">
        <h3><?php echo $ec_master['ec_subject_1']; ?></h3>
    </div>

    <?php /* ebcontents item */?>
    <div class="ebcontents-process-inner">
    <?php if (is_array($contents)) { ?>
        <?php foreach ($contents as $k => $item) { ?>
        <div class="ebcontents-box ebcontents-box-<?php echo $k + 1 ?>">
            <dl>
                <dt>
                    <?php if ($item['ci_subject_1']) { ?>
                    <h4><span>STEP 0<?php echo $k + 1 ?></span> <?php echo $item['ci_subject_1']; ?></h4>
                    <?php } ?>
                </dt>
                <dd>
                    <?php if ($item['ci_text_1']) { ?>
                    <p><?php echo $item['ci_text_1']; ?></p>
                    <?php } ?>
                </dd>
            </dl>
        </div>
        <?php } ?>
    <?php } ?>

    <?php if ($ec_default) { ?>
        <div class="ebcontents-box ebcontents-box-1">
            <dl>
                <dt><h4><span>STEP 01</span> 지원서 접수</h4></dt>
                <dd><p>온라인 지원을 통해 입사지원 받으며 입사지원서(자기소개서 포함), 최종학력 졸업 및 성적증명서, 경력증명서(해당자), 자격증사본(해당자)을 <strong>recruit@company.com</strong>으로 접수합니다.</p></dd>
            </dl>
        </div>
        <div class="ebcontents-box ebcontents-box-2">
            <dl>
                <dt><h4><span>STEP 02</span> 서류전형</h4></dt>
                <dd><p>내부 심사를 통해 입사지원서등을 검토 및 심사합니다.</p></dd>
            </dl>
        </div>
        <div class="ebcontents-box ebcontents-box-3">
            <dl>
                <dt><h4><span>STEP 03</span> 면접전형</h4></dt>
                <dd><p>서류전형 합격자는 실무 및 임원 면접을 실시합니다. <br>면접전형은 당사 사정에 의거 변경될 수 있습니다.</p></dd>
            </dl>
        </div>
        <div class="ebcontents-box ebcontents-box-4">
            <dl>
                <dt><h4><span>STEP 04</span> 합격통보</h4></dt>
                <dd><p>최종 합격자는 사이트 개제 및 개별통보를 통해 합격 전달합니다.</p></dd>
            </dl>
        </div>
    <?php } ?>
    </div>

    <div class="ebcontents-process-bottom">
        <?php if ($ec_master['ec_text_1']) { ?>
        <p class="master-paragraph"><?php echo $ec_master['ec_text_1']; ?></p>
        <?php } ?>
        <?php if ($ec_master['ec_file'] && file_exists($ec_master['ec_file_path']) && !is_dir($ec_master['ec_file_path'])) { ?>
        <div class="btn-recruit">
            <a href="<?php echo G5_URL; ?>/page/download.php?ec_code=<?php echo $ec_master['ec_code']; ?>"><i class="fas fa-download"></i> 입사지원서 다운로드</a>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>