<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
echo color("blue","              MNOVALRIZKY\n");
echo color("white","        AUTO REGIST & CLAIM VOUCHER\n" );
echo color("white","          ".hari_ini().date('m-Y H:i:s') ." \n\n ");
echo color("white","            Format Nomor 62***\n");
sleep(1);
echo color("white","  ");
function change(){
        $nama = nama();
        $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
        ulang:
        echo color("white","\n NOMOR : ");
        $no = trim(fgets(STDIN));
        $data = '{"email":"'.$email.'@gmail.com","name":"nopal rizky","phone":"+'.$no.'","signed_up_country":"ID"}';
        $register = request("/v5/customers", null, $data);
        if(strpos($register, '"otp_token"')){
        $otptoken = getStr('"otp_token":"','"',$register);
        echo color("green"," Kode otp sudah di kirim!")."\n";
        otp:
        echo color("white"," OTP : ");
        sleep(2);
        $otp = trim(fgets(STDIN));
        $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
        $verif = request("/v5/customers/phone/verify", null, $data1);
        if(strpos($verif, '"access_token"')){
        echo color("green"," Berhasil mendaftar");
        $token = getStr('"access_token":"','"',$verif);
        $uuid = getStr('"resource_owner_id":',',',$verif);
        echo "\n".color("white"," Akses Token : ".$token."\n\n");
        save("token.txt",$token);
        echo "\n".color("green"," Claim Voucher? y/n : ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
                //kamu kena preng wkwkwk cuman echo doang bukan claim voc beneran//
                echo "\n".color("white","           Lagi Claim Voucher!       \n");
                echo color("white","            (Total 8 Voucher)       \n");
                echo "\n".color("green"," [x1] Voucher Diskon GoSend 50%");
                sleep(1);
                echo "\n".color("red"," [x1] Diskon GoFood 50%");
                sleep(1);
                echo "\n".color("green"," [x3] DISKON 50% GoRide maks. Rp10.000");
                sleep(1);
                echo "\n".color("green"," [x1] DISKON 50% GoCar maks. Rp25.000");
                sleep(1);
                echo "\n".color("blue"," [x1] DISKON 50% GoRide pake GoPay maks. Rp10.000");
                sleep(1);
                echo "\n".color("blue"," [x1] DISKON 50% GoCar pake GoPay maks. Rp30.000");
                sleep(1);
                echo "\n".color("red"," [x1] DISKON GO-FOOD 50%!");
                echo "\n\n".color("blue","              @mnovalrizky      ");
                echo "\n".color("white","      Silahkan Masuk ke VMOS/AppClone");
                for($a=1;$a<=3;$a++){
                        echo color("white",".");
                        sleep(2);
                        echo "\n";
        }
        die();
        $code1 = request('/go-promotions/v1/promotions/enrollments');
     
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        goto gocar;
        }else{
        gocar:
        echo "\n".color("yellow","!] Claim voc GOFOOD 15+10+5");
        for($a=1;$a<=3;$a++){
        echo color("yellow",".");
        sleep(20);
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai!')){
        }else{
        $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
        if(strpos($claim, 'Promo kamu sudah bisa dipakai!')){

        }else{
        echo "\n".color("red","-] Message: ".$message);
        }
        for($a=1;$a<=3;$a++){
        }
        $code1 = request('/go-promotions/v1/promotions/enrollments',);
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai!')){
        echo "\n".color("green","+] Message: ".$message);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        echo "\n".color("yellow","!] Total voucher ".$total." : ");
        echo color("green","1. ".$voucher1);
        echo "\n".color("green","                     2. ".$voucher2);
        echo "\n".color("green","                     3. ".$voucher3);
        echo "\n".color("green","                     4. ".$voucher4);
        echo "\n".color("green","                     5. ".$voucher5);
        echo "\n".color("green","                     6. ".$voucher6);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
         setpin:
         echo "\n".color("nevy","?] Mau set pin?: y/n ");
         $pilih1 = trim(fgets(STDIN));
         if($pilih1 == "y" || $pilih1 == "Y"){
         //if($pilih1 == "y" && strpos($no, "628")){
         echo color("red","========( PIN ANDA = 112233 )========")."\n";
         $data2 = '{"pin":"112233"}';
         $getotpsetpin = request("/wallet/pin", $token, $data2, null, null, $uuid);
         echo "Otp set pin: ";
         $otpsetpin = trim(fgets(STDIN));
         $verifotpsetpin = request("/wallet/pin", $token, $data2, null, $otpsetpin, $uuid);
         echo $verifotpsetpin;
         }else if($pilih1 == "n" || $pilih1 == "N"){
         die();
         }else{
         echo color("red","-]  GAGAL!\n");
         }
         }
         }
         }
         }else{
         goto setpin;
         }
         }else{
         echo color("red","  OTP SALAH ");
         goto otp;
         }
         }else{
         echo color("red","  NOMOR SUDAH TERDAFTAR/SALAH");
         echo "\n  DAFTAR ULANG (y/n): ";
         $pilih = trim(fgets(STDIN));
         if($pilih == "y" || $pilih == "Y"){
         echo "\n".color("purple","  PASTIKAN NOMOR BELUM TERDAFTAR");
         goto ulang;
         }else{
  }
 }
}
echo change()."\n"; ?>
