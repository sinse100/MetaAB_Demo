<?php
if (!defined('_EYOOM_')) exit;

include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');
?>

<?php /* eb콘텐츠 편집 버튼 */ ?>
<?php if ($is_admin == 'super' && !G5_IS_MOBILE) { ?>
<div class="btn-edit-mode-wrap position-relative">
    <div class="adm-edit-btn btn-edit-mode hidden-xs hidden-sm" style="top:-15px">
        <div class="btn-group">
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebcontents_form&amp;thema=<?php echo $theme; ?>&amp;ec_code=<?php echo $ec_master['ec_code']; ?>&amp;w=u&amp;wmode=1" onclick="eb_admset_modal(this.href); return false;" class="btn-e btn-e-xs btn-e-red btn-e-split"><i class="far fa-edit"></i> EB콘텐츠 마스터 설정</a>
            <a href="<?php echo G5_ADMIN_URL; ?>/?dir=theme&amp;pid=ebcontents_form&amp;thema=<?php echo $theme; ?>&amp;ec_code=<?php echo $ec_master['ec_code']; ?>&amp;w=u" target="_blank" class="btn-e btn-e-xs btn-e-red btn-e-split-red dropdown-toggle" title="새창 열기">
                <i class="far fa-window-maximize"></i>
            </a>
            
            <button type="button" class="btn-e btn-e-xs btn-e-red popovers" data-container="body" data-toggle="popover" data-placement="bottom" data-html="true" data-content="
            <span class='font-size-11'>
            <strong class='color-indigo'>좌측 [EB컨텐츠 설정하기 버튼] 클릭 후 아래 설명 참고</strong><br>
            <div class='margin-hr-5'></div>
            <span class='color-indigo'>[설정정보]</span><br>
            1. EB콘텐츠 마스터 명칭 : 문의하기<br>
            2. EB콘텐츠 마스터 스킨 : busi012_sect05<br>
            3. 마스터 타이틀 #1, #2 입력<br>
            4. 콘텐츠 아이템에서 사용할 링크수 : 0개<br>
            5. 콘텐츠 아이템에서 사용할 이미지수 : 0개<br>
            6. 콘텐츠 아이템에서 사용할 필드수 : 1개<br>
            <span class='color-indigo'>[EB 컨텐츠 - 아이템 관리]</span><br>
            1. EB컨텐츠 아이템 추가 클릭<br>
            2. 텍스트 필드 #1 : 받는 이메일 주소
            <div class='margin-hr-5'></div>
            텍스트 필드 #1에 받을 이메일 주소를 입력하면 해당 메일로 메시지가 전송.<br>
            아이템 1개로 설정.
            </span>
        "><i class="fas fa-question-circle"></i>
            </button>
        </div>
    </div>
</div>
<?php } ?>

<?php if (isset($ec_master) && $ec_master['ec_state'] == '1') { // 보이기 상태에서만 출력 ? ?>
<style>
.ebcontents-contact-inner {position:relative}
/* 아이템 */
.contact-item {position:relative}
/* 왼쪽 */
.contact-item .contact-form {max-width:800px;margin:0 auto;padding:40px;background:rgba(230, 232, 226, 0.9)}
.contact-item .contact-form input[type="text"], .contact-item .contact-form input[type="email"], .contact-item .contact-form textarea {padding:7px 0;font-size:13px;background:none;border:0 none !important;border-bottom:1px solid #707070 !important}
.contact-item .contact-form section {margin-bottom:20px}
.contact-item .contact-form section .label {font-size:13px;font-weight:400;}
.contact-item .contact-form section .label span {color:#f00}
.contact-item .contact-form input[type="text"], .contact-item .contact-form input[type="email"] {height:40px}
.contact-item .contact-form input[type="text"]:focus, .contact-item .contact-form textarea:focus {outline:none}
.contact-item .eyoom-form fieldset {background:none}
.contact-item #captcha #captcha_info {color:#ddd}
.contact-item .btn-submit {display:block;width:100%;;padding:8px 0;border:0 none;font-size:15px;background:#0074E8;color:#fff;-webkit-transition:.3s;-moz-transition:.3s;-ms-transition:.3s;transition:.3s}
.contact-item .btn-submit:hover {background:#1b1b1b}
#captcha #captcha_key {border:0 none !important}

/* alert */
.ebcontents-contact .eyoom-form label.error {font-size:12px;color:#fff}
.ebcontents-contact .contact-email-alert p {padding:10px;border-left:2px solid #0074E8;color:#fff;background:#444}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:991px) {
    .contact-item .contact-form, .contact-item .contact-right {float:none;width:100%;padding:30px}
    .contact-item .contact-right .contact-info h4 {margin-top:0}
}
@media (max-width:767px) {
    .contact-item .item-content{padding:15px}
}
</style>
<?php } ?>

<div class="ebcontents ebcontents-contact">
    <?php /* ebcontents master */?>
    <div class="master-title color-white">
        <?php if ($ec_master['ec_subject_1']) { ?>
        <h2><?php echo $ec_master['ec_subject_1']; ?></h2>
        <?php } ?>
        <?php if ($ec_master['ec_subject_2']) { ?>
        <h3><?php echo $ec_master['ec_subject_2']; ?></h3>
        <?php } ?>
    </div>

    <div class="ebcontents-contact-inner">
    <?php if (is_array($contents)) { ?>
        <?php foreach ($contents as $k => $item) { ?>
        <div class="contact-item">
            <div class="contact-wrap">
                <?php if($item['ci_subject_1']) { ?>
                <div class="contact-form">
                    <form role="form" id="contactEmailForm" method="post" action="<?php echo $ebcontents_skin_url; ?>/contact_email.php" class="eyoom-form">
                    <input type="hidden" id="myemail" name="myemail" value="<?php echo $item['ci_subject_1']; ?>">
                    <section>
                        <label class="label">Name <span class="validation-mark">*</span></label>
                        <label class="input">
                            <input type="text" id="name" name="name" placeholder="이름 입력" required>
                        </label>
                    </section>
                    <section>
                        <label class="label">E-mail <span class="validation-mark">*</span></label>
                        <label class="input">
                            <input type="email" id="email" name="email" placeholder="본인 이메일 입력" required>
                        </label>
                    </section>
                    <section>
                        <label class="label">Message <span class="validation-mark">*</span></label>
                        <label class="textarea textarea-resizable">
                            <textarea rows="4" id="message" name="message" placeholder="메시지 입력"></textarea>
                            <b class="tooltip tooltip-top-right">전달할 메시지 또는 문의 입력</b>
                        </label>
                    </section>
                    <section>
                        <label class="label">자동등록방지 <span class="validation-mark">*</span></label>
                        <div class="vc-captcha"><?php echo captcha_html(); ?></div>
                    </section>
                    <div class="note margin-bottom-30"><strong>Note!</strong> 메시지 보내기 클릭 후 "성공적으로 메시지 전송이 되었습니다." 문구까지 확인</div>
                    <div class="text-center">
                        <button type="submit" class="btn-submit">메시지 보내기</button>
                    </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    <?php } ?>

    <?php if ($ec_default) { ?>
        <div class="contact-item">
            <div class="contact-wrap">
                <div class="contact-form">
                    <form role="form" id="contactEmailForm" method="post" action="<?php echo $ebcontents_skin_url; ?>/contact_email.php" class="eyoom-form">
                        <input type="hidden" id="myemail" name="myemail" value="webmaster@domain.com">
                        <section>
                            <label class="label">Name <span class="validation-mark">*</span></label>
                            <label class="input">
                                <input type="text" id="name" name="name" placeholder="이름 입력" required>
                            </label>
                        </section>
                        <section>
                            <label class="label">E-mail <span class="validation-mark">*</span></label>
                            <label class="input">
                                <input type="email" id="email" name="email" placeholder="본인 이메일 입력" required>
                            </label>
                        </section>
                        <section>
                            <label class="label">Massage <span class="validation-mark">*</span></label>
                            <label class="textarea textarea-resizable">
                                <textarea rows="4" id="message" name="message" placeholder="메시지 입력"></textarea>
                            </label>
                        </section>
                        <div class="note margin-bottom-30"><strong>Note!</strong> 메시지 보내기 클릭 후 "성공적으로 메시지 전송이 되었습니다." 문구까지 확인</div>
                        <div class="text-center">
                            <button type="submit" class="btn-submit">메시지 보내기</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>

<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/eyoom-form/plugins/jquery-validate/jquery.validate.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL; ?>/plugins/eyoom-form/plugins/jquery-validate/additional-methods.min.js"></script>
<script>
$(function() {
    var $contactForm  = $('#contactEmailForm');

    $contactForm.validate({
        rules: {
            name: {
                required    : true,
                minlength   : 2
            },
            email: {
                required    : true,
                email       : true
            },
            message: {
                required    : true,
                minlength   : 10
            }
        },
        messages: {
            name: {
                required    : "이름을 입력 해주세요."
            },
            email: {
                required    : "정확한 이메일 주소를 입력 해주세요."
            },
            message: {
                required    : "내용을 입력 해주세요.(10글자 이상)"
            }
        }
    });

    $contactForm.submit(function(){
        <?php chk_captcha_js(); ?>

        var $success = '성공적으로 메시지 전송이 되었습니다.';
        var $error = '메시지 전송에 실패하였습니다. 다시 시도하여 주세요.';
        var $captcha = '자동등록방지 숫자가 틀렸습니다.';
        var response;
        if ($contactForm.valid()){
            $.ajax({
                type: "POST",
                url: "<?php echo $ebcontents_skin_url; ?>/contact_email.php",
                data: $(this).serialize(),
                success: function(msg) {
                    if (msg === 'SEND') {
                        response = '<div class="contact-email-alert"><p>'+ $success +'</p></div>';
                    } else if (msg === 'CAPTCHA') {
                        response = '<div class="contact-email-alert"><p>'+ $captcha +'</p></div>';
                    } else {
                        response = '<div class="contact-email-alert"><p>'+ $error +'</p></div>';
                    }
                    $(".contact-email-alert").remove();
                    $contactForm.prepend(response);
                }
             });
            return false;
        }
        return false;
    });
});
</script>
<?php } ?>