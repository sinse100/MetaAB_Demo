# MetaAB_Demo

## 이윰빌더/그누보드 버전 확인
+ 이윰빌더 시즌 4 + 영카드 5 풀패키지   

## 그누보드 5 프레임워크 구조개요
+ ### adm
  + 관리자 페이지 관련 파일들 집합
  + 관리자 페이지 경로 (/adm/)- index.php
+ ### bbs
+ ### extend
  + user.config.php
    + 기본 파일을 건들지 않고 전체에 적용할 변수를 추가
    + 설정된 변수는, global 지시자를 통해, 다른 php 스크립트에서 접근 가능
    
    ![image](https://user-images.githubusercontent.com/33450535/150626942-0baaecd5-7785-4968-978a-48f5b8009897.png)
    ![image](https://user-images.githubusercontent.com/33450535/150626964-3d51f252-5b0d-4ded-a8f2-f544b4984182.png)

+ ### lib
  + 그누보드만의 기본 함수들의 집합으로, .lib.php 파일로 저장
  + #### get_member_level_select
    + $name, $start_id=0, $end_id=10, $selected="", $event=""
    + 관리자 페이지 -> 회원관리 메뉴 -> 회원정보 수정 -> 회원 권한 에서, 회원 등급에 대한 드롭다운 리스트 설정 부분 
    
    ![image](https://user-images.githubusercontent.com/33450535/150627059-bf2902c0-1a80-400e-ba10-4b79113cfa6e.png)
+ ### install
+ ### js
  + jQuery, 등과 같은 클라이언트 사이드에서 필요한 외부 JS 문서들
+ ### theme
  + skin 디렉토리에서 제공되는 페이지 내 각 요소별 스킨들을 이용하여, Footer, Header 등과 같은 전체적인 페이지의 레이아웃/골격을 갖춘, 완성된 디자인으로서의 웹 사이트
  + 테마 베포를 위해, 이윰에서 제공하는 테마파일을 다운받아. theme 디렉토리에 배포
+ ### _head.php
+ ### _tail.php하
+ ### _common.php
+ ### head.php
  + 홈 페이지 상의 헤더 (상단 바 부분)를 정의. 필수 파일로, _head.php 에서 include
+ ### index.php  
  + 홈 페이지(URL 상 경로 ‘/’ 의미)의 화면을 담당. 필수 파일
+ ### tail.php
  + 홈 페이지의 푸터(하단 바 부분)를 정의. 역시, 필수 파일!!, _tail.php에서 include
+ ### common.php
  + 변수, 상수 설정 등 모든 PHP 문서 상 공통으로 사용하는 코드가 포함되어, 반드시 include 해야 함
+ ### config.php
  + 그누의 기본적인 변수, 테이블, 도메인 등을 정의
  + 개발 시, 참고해야할 주요 상수들 아래의 표에 명시

    |상수 명|설명|
    |---|---|
    |G5_DATA_DIR|루트 디렉토리의 data 폴더의 이름|
    |G5_DATA_PATH|루트 디렉토리 기준으로 data 폴더의 경로를 의미|
    |G5_DBCONFIG_FILE|DB 관련 설정을 위한 php 파일의 이름.  기본값으로, dbconfig.php 사용|

+ ### img
  + 그누보드에서 기본적으로 사용되는 이미지들의 집합
+ ### skin
  + 그누보드에서 제공하는 웹 사이트의 아래와 같은 요소들 각각에 대한 스킨들을 모아둠

    |하위 디렉토리|설명|
    |---|---|
    |skin/board|게시판 스킨|
    |skin/connect|현재 접속자 수 스킨|
    |skin/latest|최신글 스킨|
    |skin/faq|FAQ 게시판 스킨|
    |skin/mypage|User 개인 페이지 스킨|
    |skin/search|검색 스킨|

## 회원 등급 관련
+ ### 회원 권한 (1~10 존재, 10 은 관리자 권한)
  

## Database Table
+ ### 오로지 하나의 Database 이용
+ ### g5_config
  + 현재 웹 서비스 전반(회원 가입, 글 작성, 포인트, 웹 페이지 이름, 관리자 계정, 차단 IP ...)에 대한 설정값 저장
    + cf_register_level : 회원가입 직후, 회원의 등급 (기본값 2로 설정)
    + cf_title : 홈 페이지의 title 해당
+ ### g5_login
    ![image](https://user-images.githubusercontent.com/33450535/149062572-52ddcb58-aa20-4140-8d59-9617800a388b.png)
  + 현재 웹 페이지에 접속한 호스트에 대한 로그 유지. 로그 정보는 다음과 같음
    + lo_ip : 접속한 클라이언트의 IP
    + mb_id : 회원으로 접속했다면, 그 id
    + lo_datetime : 클라이언트의 접속 시각
    + lo_location. lo_url : 클라이언트가 접속해있는 현재 페이지의 이름과, 경로(Path)
+ ### g5_member
    ![image](https://user-images.githubusercontent.com/33450535/150625339-599ab871-9190-496e-ad5c-3481d59acfc0.png)
  + 현재, 가입/탈퇴한 회원들에 관한 정보들 기록
    + mb_no : 회원번호 (admin : 1번)
    + mb_id : 회원 ID
    + mb_password : 회원 비밀번호 (Hash 값)
    + mb_level : 회원 등급 (admin : 10, 일반(회원가입 직후) : 2, 1~10 까지의 등급 )

+ ### 그외 테이블들에 대한 정보를 참고하고 싶다면, 아래의 링크를 참조
  + 그누보드 
    + http://gnuwiz.com/bbs/board.php?bo_table=gnu_tip&sca=%EA%B7%B8%EB%88%84%EB%B3%B4%EB%93%9C+5.2+DB%ED%85%8C%EC%9D%B4%EB%B8%94&page=1
  + 영카트
    + http://gnuwiz.com/bbs/board.php?bo_table=young_tip&sca=%EC%98%81%EC%B9%B4%ED%8A%B8+5.2+DB%ED%85%8C%EC%9D%B4%EB%B8%94
##  문서 구조
+ ### head.php
  + 인기검색어
## Push 및 수정 사항 (특이사항)
+ ### 2022. 01. 06 
  + Git  First Push
+ ### 2022. 01. 07 
  + DB 연결 설정 파일인 dbconfig.php 의 하드 코딩된 설정값을 제거
  + 설정값을 로컬 개발 환경에서 불러오도록 설정함
  + 자세한 방법은 https://blog.naver.com/sinse100/222614929787 참고
  + 추가적으로, 프로젝트 Pull/Clone 시, 이윰빌더 재설치를 해줘야 함. 과정은 다음과 같음
    1. 이윰빌더와 연결된 데이터베이스 백업 (재설치 후, 기존 데이터 복구 위함)
    2. 프로젝트 폴더 Pull/Clone
    3. 프로젝트 루트에 data 디렉토리 생성
    4. 해당되는 도메인 접속하여 재설치 진행
+ ### 2022. 03.02
  + file_get_contents HTTPS 오류 및 SESSION 파일 Empty 오류 문제 해결
  + 각 User 들의 혈당 데이터(.csv) 파일을 클라이언트의 요청에 따라 제공하는 메커니즘을 변경
  + 기존 방식의 경우, 직접 User 가 S3 스토리지로 자신의 CSV 파일 요청하였으나, User 가 서버를 매개로하지 않고, 직접 스토리지 서버로 접근하는 것에는 보안적 문제가 존재
  + 따라서, User 가 요청을 서버로 먼저 보내고, 서버가 User 의 Session 을 기반으로, User  식별 후, 해당 User 의 혈당 데이터 파일을 스토리지에서 받아온후, 직접 클라이언트로 응답하게함.
  + 자세한 방법은, https://blog.naver.com/sinse100/222675802375 링크 참고해주세요.
## Push, Add 시 유의 사항
+ 로컬 DB에 대한 환경 설정값을 설정/관리하는 data 디렉토리는, 절대로 Git 원격 저장소에 Push, Add 하지 말아주세요
+ 추후에, Clone/Pull 하실 때에 그누보드 설치하셨을 때 처럼, 다시 data 디렉토리 만들어주시고 진행하시면 됩니다.
+ 자세한 방법은, https://blog.naver.com/sinse100/222618727103 링크 참고해주세요

## 호스팅 환경 (추후 서버 배포 시, 참고)
![noname01](https://user-images.githubusercontent.com/33450535/149714753-2f986d78-ca71-47a7-9abd-c33252429200.jpg)
+ 현재, CAFE24 시 호스팅 환경
  + Tomcat 8.0 기반의 Java Servelet Page 사용, 추후, 배포 시에는, PHP 환경에 맞는 Apache24와연동이 필요
  + 또한, 배포의 편의성을 위해 Apache24 와 이윰 빌더를 설치한 Docker 이미지 사용 예정
+ 웹 리소스(서버,DB)의 관리/배포의 편의를 위해 최종 서비스 배포는 AWS 를 통해 이뤄질 것
  + DB - RDS
  + Server - EC2
  + NAS - S3 Storage


