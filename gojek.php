<?php date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("red","[][][][][][][][][][][][][][][][][][][][][]");
echo color("red","\n[]  Auto Create Gojek X Redeem Voucher  []\n");
echo color("red","[]  Creator : Kentank                   []\n");
echo "[]  Versi   : Premium                   []\n";
echo "[]  Time    : ".date('[d-m-Y] [H:i:s]')."   []\n";
echo "[][][][][][][][][][][][][][][][][][][][][]\n\n";

function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        echo color("nevy","?] Nomor HP : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","+] Kode verifikasi sudah di kirim")."\n
        echo color("nevy","?] OTP : ");
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green","+] Create Account Successfully !");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\n".color("nevy","?] Redeem Voucher? (y/n) :");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("red","===========(REDEEM VOUCHER)===========");
        echo "\n".color("yellow","!] Redeem Voucher 15k");
        echo "\n".color("yellow","!] Please wait");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(1);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"G-MPW4WBM"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green","+] Message: ".$message);
        }else{
        echo "\n".color("red","-] Message: ".$message);
        echo "\n".color("yellow","!] Maaf Boss Gabisa :v");
        echo "\n".color("yellow","!] He he he he he");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(3);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
	$voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
	$voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
	$voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        echo "\n".color("yellow","!] Total voucher ".$total." : ");
        echo color("green","1. ".$voucher1);
        echo "\n".color("green","                     2. ".$voucher2);
        echo "\n".color("green","                     3. ".$voucher3);
        echo "\n".color("green","                     4. ".$voucher4);
	echo "\n".color("green","                     5. ".$voucher5);
	echo "\n".color("green","                     6. ".$voucher6);
	echo "\n".color("green","                     7. ".$voucher7);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
	$expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
	$expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
	$expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
