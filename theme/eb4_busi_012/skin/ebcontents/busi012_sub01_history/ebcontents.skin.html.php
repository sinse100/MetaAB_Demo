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
            1. 컨텐츠 마스터 제목 : 회사연혁<br>
            2. 스킨선택 : busi012_sub01_history<br>
            3. 컨텐츠 아이템에서 사용할 링크수 : 0개<br>
            4. 컨텐츠 아이템에서 사용할 이미지수 : 0개<br>
            5. 컨텐츠 아이템에서 사용할 필드수 : 6개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1 입력 - 년도<br>
            3. 텍스트 필드 #2~6 입력 - 연혁별 내용 목록<br>
            <div class='margin-hr-5'></div>
            이미지는 마스터 이미지에서 등록하며 사용된 사이즈는 1200x1400픽셀.<br>
            텍스트 필드 #1은 년도 출력.<br>
            텍스트 필드 #2~6에 span 태그 사용시 파란색 출력.
            </span>
            "><i class="fas fa-question-circle"></i></button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-history {position:relative;margin:40px 0 80px}
/* 마스터 타이틀 */
.ebcontents-history .master-title {position:relative}
.ebcontents-history .master-title:after {content:"";display:block;clear:both}
.ebcontents-history .master-title h2 {float:left;width:30%;line-height:50px;font-size:34px}
.ebcontents-history .master-title h2 span {color:#0074E8;font-weight:700}
.ebcontents-history .master-title h3 {float:right;width:65%;line-height:40px;font-size:24px;color:#707070}
.ebcontents-history .master-title p {float:right;width:65%;padding-right:200px;line-height:30px;font-size:20px;font-weight:300}

.ebcontents-history-inner {padding:50px 0 0 20px;border-left:1px solid #0074E8}
.ebcontents-history-inner:after {content:"";display:block;clear:both}
/* 마스터 이미지 */
.ebcontents-history-master {float:right;width:55%}
.ebcontents-history-master .master-image {position:relative}
.ebcontents-history-master .master-image img {display:block;position:relative;z-index:1;padding:10px;background:#fff}
/* 콘텐츠 아이템 */
.ebcontents-history-item {float:left;width:40%}
.ebcontents-history-item .history-box {margin-top:30px}
.ebcontents-history-item .history-year {position:relative;margin-bottom:10px;font-size:20px;font-weight:300;color:#1b1b1b}
.ebcontents-history-item .history-year:after {content:"";display:block;position:absolute;left:-20px;bottom:-4px;width:120px;height:1px;background:#a4afaf}
.ebcontents-history-item .history-box ul li {margin-bottom:5px;font-size:16px;font-weight:300}
.ebcontents-history-item .history-box ul li span {font-weight:400;color:#0074E8}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px) {
    .ebcontents-history .master-title h2, .ebcontents-history .master-title h3, .ebcontents-history .master-title p {float:none;width:100%}
    .ebcontents-history .master-title h2 br {display:none}
    .ebcontents-history .master-title p {padding-right:0}
    .ebcontents-history-inner {padding-top:0}
    .ebcontents-history .ebcontents-box .ebcontents-content {padding-top:10px}
}
@media (max-width:767px) {
    .ebcontents-history {margin:0 0 20px}
    .ebcontents-history .master-title h2 {line-height:30px;font-size:20px}
    .ebcontents-history .master-title h3 {margin-top:0;line-height:20px;font-size:17px}
    .ebcontents-history .master-title p {line-height:20px;font-size:15px}

    .ebcontents-history-master, .ebcontents-history-item {float:none;width:100%}
    .ebcontents-history-master {max-width:340px;margin:0 auto 30px}
    .ebcontents-history-master .master-image:before {top:10px;left:10px}
    .ebcontents-history-master .master-image img {padding:10px}
    .ebcontents-history-item .history-year {font-size:18px}
    .ebcontents-history-item .history-box ul li {font-size:13px;font-weight:400}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-history waypoints-box">
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

    <div class="ebcontents-history-inner">
        <?php /* ebcontents item */?>
        <div class="ebcontents-history-item waypoints-left">
            <ul class="ebcontents-list list-unstyled">
            <?php if (is_array($contents)) { ?>
                <?php foreach ($contents as $k => $item) { ?>
                <li class="history-box">
                    <?php if ($item['ci_subject_1']) { ?>
                    <div class="history-year"><?php echo $item['ci_subject_1']; ?></div>
                    <?php } ?>
                    <ul class="list-unstyled">
                        <?php if ($item['ci_subject_2']) { ?>
                        <li><?php echo $item['ci_subject_2']; ?></li>
                        <?php } ?>
                        <?php if ($item['ci_subject_3']) { ?>
                        <li><?php echo $item['ci_subject_3']; ?></li>
                        <?php } ?>
                        <?php if ($item['ci_subject_4']) { ?>
                        <li><?php echo $item['ci_subject_4']; ?></li>
                        <?php } ?>
                        <?php if ($item['ci_subject_5']) { ?>
                        <li><?php echo $item['ci_subject_5']; ?></li>
                        <?php } ?>
                        <?php if ($item['ci_subject_6']) { ?>
                        <li><?php echo $item['ci_subject_6']; ?></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>
            <?php } ?>

            <?php if ($ec_default) { ?>
                <li class="history-box">
                    <div class="history-year">2017 ~ 2019</div>
                    <ul class="list-unstyled">
                        <li>글로벌 기업 EM사와 재활용 에너지 연구 개발 협약</li>
                        <li>독일 함부르크시 환경 공로 기업 선정</li>
                        <li><span>홍길동 대표 취임</span></li>
                        <li>사회공헌에 노력하는 기업 선정</li>
                        <li>환경의 날 기념 에너지 사업 출범</li>
                    </ul>
                </li>
                <li class="history-box">
                    <div class="history-year">2016</div>
                    <ul class="list-unstyled">
                        <li>환경의 날 기념 에너지 사업 출범</li>
                        <li><span>글로벌 기업 EM사와 재활용 에너지 연구 개발 협약</span></li>
                        <li>독일 함부르크시 환경 공로 기업 선정</li>
                        <li>사회공헌에 노력하는 기업 선정</li>
                        <li>환경의 날 기념 에너지 사업 출범</li>
                    </ul>
                </li>
                <li class="history-box">
                    <div class="history-year">2014</div>
                    <ul class="list-unstyled">
                        <li>글로벌 기업 EM사와 재활용 에너지 연구 개발 협약</li>
                        <li>환경의 날 기념 에너지 사업 출범</li>
                    </ul>
                </li>
                <li class="history-box">
                    <div class="history-year">2011 ~ 2013</div>
                    <ul class="list-unstyled">
                        <li>홍길동 대표 취임</li>
                        <li>사회공헌에 노력하는 기업 선정</li>
                        <li><span>이윰 비즈 창립</span></li>
                    </ul>
                </li>
            <?php } ?>
            </ul>
        </div>

        <?php /* ebcontents master image */?>
        <div class="ebcontents-history-master waypoints-right">
            <div class="master-image">
                <img src="<?php echo $ec_master['ec_img_url'] ? $ec_master['ec_img_url']: $ebcontents_skin_url.'/image/01.jpg'; ?>" alt="image" class="img-responsive">
            </div>
        </div>
    </div>
</div>
<?php } ?>