<?php
/**
 * theme file : /theme/THEME_NAME/index.html.php
 */
if (!defined('_EYOOM_')) exit;
add_stylesheet('<link rel="stylesheet" href="'.EYOOM_THEME_URL.'/plugins/fullpage/jquery.fullPage.css" type="text/css" media="screen">',0);
add_stylesheet('<link href="https://fonts.googleapis.com/css?family=Do+Hyeon&amp;subset=korean" rel="stylesheet">',0);
?>
<style>
/* 페이지 로더 */
.page-loader {position:fixed;top:0;left:0;z-index:9999;width:100%;height:100%;background:#1b1b1b}
.page-loader .logo-loader {position:absolute;top:50%;left:50%;transform:translate(-50%, -50%)}
.page-loader .logo-loader:before, .page-loader .logo-loader:after {content:"";position:absolute;top:60px;left:0;height:1px}
.page-loader .logo-loader:before {width:100%;background:rgba(255,255,255,.4)}
.page-loader .logo-loader:after {width:0;background:#fff;-webkit-transition:all 1.2s ease;-moz-transition:all 1.2s ease;-o-transition:all 1.2s ease;-ms-transition:all 1.2s ease;transition:all 1.2s ease}
.page-loader .logo-loader.active:after {width:100%}
.page-loader .logo-loader img {max-height:45px;width:auto}
.page-loader .logo-loader h5 {margin:40px 0 0;text-align:center;letter-spacing:5px;font-size:12px;color:#fff}

/* 메인 비디오 */
.main-bg-video {position:fixed;top:0;left:0;z-index:1;width:100vw;height:100vh}
.main-bg-video:after {content:"";display:block;position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.3)}
.main-bg-video video {position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);width:auto;height:auto;min-width:100%;/*min-height:100%*/}
@media (max-width:767px){
    .main-bg-video {background-image:url(<?php echo EYOOM_THEME_URL;?>/image/video/bg_main_video.jpg);background-position:center;background-repeat:no-repeat;background-size:cover}
    .main-bg-video:after {background:rgba(0,0,0,.4)}
    .main-bg-video video {display:none}
}

#fullpage {z-index:99}
/* 메인 네비게이션 */
#fp-nav ul li {position:relative;width:14px;height:14px;margin:0 7px 25px}
#fp-nav ul li:last-child {margin-bottom:0}
#fp-nav ul li:after {content:"";display:block;position:absolute;bottom:-20px;left:50%;width:1px;height:15px;background:#fff}
#fp-nav ul li:last-child:after {display:none}
#fp-nav ul li a {width:14px;height:14px;border:1px solid transparent;border-radius:50% !important;-webkit-transition:all .2s ease;transition:all .2s ease}
#fp-nav ul li a span {transform:translate(-50%,-50%);width:7px !important;height:7px !important;margin:0 !important;background:#fff;border-radius:50% !important}
#fp-nav ul li:hover a, #fp-nav ul li a.active, #fp-nav ul li a:hover, #fp-nav ul li a.active:hover {border-color:#fff}
#fp-nav ul li .fp-tooltip {top:-2px;right:23px !important;opacity:.5;width:auto;font-size:12px;color:#fff}
#fp-nav ul li:hover .fp-tooltip, #fp-nav li a.active + .fp-tooltip {-webkit-transition:opacity 0.2s ease-in;transition:opacity 0.2s ease-in;width:auto;opacity:1}
/* 반전 */
.fp-viewing-2ndPage #fp-nav ul li:after, .fp-viewing-2ndPage #fp-nav ul li a span {background:#0074E8}
.fp-viewing-2ndPage #fp-nav ul li:hover a, .fp-viewing-2ndPage #fp-nav ul li a.active, .fp-viewing-2ndPage #fp-nav ul li a:hover, .fp-viewing-2ndPage #fp-nav ul li a.active:hover {border-color:#0074E8}
.fp-viewing-2ndPage #fp-nav ul li .fp-tooltip {color:#0074E8}

/* section title */
.ebcontents .master-title, .eblatest .master-title {position:relative;margin-bottom:40px;text-align:center}
.ebcontents .master-title h2, .eblatest .master-title h2 {position:relative;margin:0 0 20px;font-size:28px;line-height:40px;font-weight:700}
.ebcontents .master-title h2:after, .eblatest .master-title h2:after {content:"";display:block;position:absolute;left:50%;bottom:-10px;transform:translate(-50%, 0);width:50px;height:1px;background:#333}
.ebcontents .master-title.color-white h2:after, .eblatest .master-title.color-white h2:after {background:#fff}
.ebcontents .master-title h3 {margin:10px 0 0;font-size:18px}
.ebcontents .master-title.color-white h2, .eblatest .master-title.color-white h2, .ebcontents .master-title.color-white h3, .eblatest .master-title.color-white h3 {color:#fff}

/* section - 섹션 배경 이미지 */
.section2nd, .section4th, .section5th {background-repeat:no-repeat;background-size:cover;background-position:center}
/* section 1 */
.section.section1st, .section.section4th {padding:0}
/* section 2 */
.section2nd {background:rgba(255,255,255,.9)}
/* section 3 */
.section3rd {background:rgba(0,0,0,.3)}
/* section 5 */
.section5th {background:rgba(0,0,0,.3)}
/* section last - footer */
.section-last {height:auto !important}
</style>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<style>
@media (max-width:1279px){
    .section {padding:80px 0}
}
@media (max-width:991px){
    .ebcontents .master-title h2, .eblatest .master-title h2 {line-height:30px;font-size:24px}
    .ebcontents .master-title h3 {font-size:15px}
    .section {padding:60px 0}
}
@media (max-width:767px){
    .ebcontents .master-title, .eblatest .master-title {margin-bottom:30px}
}
</style>
<?php } ?>

<script src="<?php echo EYOOM_THEME_URL;?>/plugins/fakeLoader/fakeLoader.min.js"></script>
<script src="<?php echo EYOOM_THEME_URL;?>/plugins/fullpage/jquery.fullPage.min.js"></script>
<script>
// 페이지 로더
$(window).load(function(){
    $(".logo-loader").addClass("active");
    setTimeout(function(){
        $(".page-loader").fadeOut();
    }, 1000);
});

// 풀페이지 소스
// 1280px 기준으로 .fp-auto-height 클래스가 적용되며 fp-auto-height가 적용됐을 때 섹션의 높이 값은 auto가 된다.
function handleSectionHeight(){
	rd_width=document.documentElement.clientWidth;//브라우저 폭의 값
	if (rd_width < 1280){
		$('.section').addClass('fp-auto-height');
	} else {
		$('.section').removeClass('fp-auto-height');
	}
}

$(document).ready(function() {
    /* 
        ie에서 video 태그의 높이값이 적용이 안돼(0px) 미출력 되는 문제를 위해 min-height 값을 js로 입력 시킴.
        (video 태그에 position 값이 들어가면 ie에서는 영향을 미치는 것으로 추측)
    */
    $(".main-bg-video video").css("min-height","100%");
    
    <?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
	handleSectionHeight();
	<?php } ?>

	// fullpage 옵션 - https://github.com/alvarotrigo/fullPage.js#options 링크에서 다양한 옵션 활용 가능
    $('#fullpage').fullpage({
		'verticalCentered': false,// 섹션의 수직 중심 맞춤 - 해당 테마는 상단과 하단을(또는 중단)을 구분지어 사용하기에 false 로 설정
		'responsiveWidth': 1280,// 폭 1280px 미만일때 상하 스크롤시 자동 스크롤로 변경
		'responsiveHeight': 900,// 높이 900px 미만일때 상하 스크롤시 자동 스크롤로 변경
        anchors: ['1stPage', '2ndPage', '3rdPage', '4thPage', '5thPage', '6thPage'],// 섹션 추가시 8thPage, 9thPage 형식으로 추가
        navigation: true,// 메인 네비게이션 출력
        navigationPosition: 'right',// 메인 네비게이션 위치
		navigationTooltips: ['INTRO', '회사소개', 'NEWS', '사업소개', '문의하기', 'INFORMATION'],// 메인 네비게이션 명칭
    });
});
</script>

<?php if ($eyoom['is_responsive'] == '1' || G5_IS_MOBILE) { // 반응형 또는 모바일일때 ?>
<script>
// 리사이즈시 높이값 반영
$(window).resize(function() {
    handleSectionHeight();
});
</script>
<?php } ?>

<?php /* 페이지 로더 */ ?>
<div class="page-loader">
    <div class="logo-loader">
		<img src="<?php echo EYOOM_THEME_URL ?>/image/loader_logo.png" alt="logo">
		<h5>Loading...</h5>
    </div>
</div>

<?php /* 메인 비디오 */ ?>
<div id="mainVideo" class="main-bg-video">
    <video id="videoPlayer" autoplay loop autobuffer muted playsinline>
        <source src="<?php echo EYOOM_THEME_URL; ?>/image/video/bg_video.mp4" type="video/mp4">
        브라우저가 비디오 태그를 지원하지 않습니다.
    </video>
</div>

<div id="fullpage">
    <?php /* 섹션 1 */ ?>
    <div class="section section1st fp-table " id="section1">
        <div class="fp-tableCell">
            <div class="container">
                <?php /* EB슬라이더 - busi012 main slider */ ?>
                <?php echo eb_slider('1565327073'); ?>
            </div>
        </div>
    </div>

    <?php /* 섹션 2 */ ?>
    <div class="section section2nd fp-table" id="section2">
        <div class="fp-tableCell">
            <?php echo eb_contents('1565594780'); ?>
        </div>
    </div>

    <?php /* 섹션 3 */ ?>
    <div class="section section3rd fp-table" id="section3">
        <div class="fp-tableCell">
            <div class="container">
                <?php echo eb_latest('1565598636'); ?>
            </div>
        </div>
    </div>

    <?php /* 섹션 4 */ ?>
    <div class="section section4th" id="section4">
        <?php echo eb_contents('1565594798'); ?>
    </div>

    <?php /* 섹션 5 */ ?>
    <div class="section section5th fp-table" id="section5">
        <div class="fp-tableCell">
            <div class="container">
                <?php echo eb_contents('1565761495'); ?>
            </div>
        </div>
    </div>