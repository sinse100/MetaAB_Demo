<?php
  @session_save_path($_SERVER["DOCUMENT_ROOT"]."/data/session");
  @session_start();

  if (!isset($_SESSION['ss_mb_id'])) {
     die("<script>alert('CSV can only be accessed by member.'); history.back();</script>");
  }
  if (!isset($_SESSION['ss_reg_mb_name'])){
     die("<script>alert('CSV acquiration recommended from mypage.'); history.back();</script>");
  }

  $arrContextOptions= [
    'ssl' => [
        'cafile' => getenv('CURL_PEM'),
        'verify_peer'=> true,
        'verify_peer_name'=> true,
    ],
  ];

  $mb_name = urlencode($_SESSION[ss_reg_mb_name]);
  $image_url = getenv('BUCKET').$mb_name."_copy.csv";
  $file_name_arr = @explode("/", $image_url);
  $file_down_name = $file_name_arr[@count($file_name_arr)-1]; 

  $data = file_get_contents(
    $image_url,
    false,
    stream_context_create($arrContextOptions)
  );

  header("Content-type: application/octet-stream");
  header('Content-Disposition: attachment;filename="'.$file_down_name.'"');
  header('Cache-Control: max-age=0');

  echo($data);
?>
