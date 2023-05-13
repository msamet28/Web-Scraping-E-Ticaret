<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class WebScrapping extends Controller
{

    public function Verileri_Cekme(Request $request)
    {
        $scrap = $request->input('scrap') ?? "1";
        if ((int)$scrap) {
            Db::table("dizüstü")->truncate();
            $baglan = mysqli_connect("localhost", "root", "", "bilgisayarlar");

            for ($i = 1; $i <= 20; $i++) {
                $fgcn11 = file_get_contents("https://www.n11.com/bilgisayar/dizustu-bilgisayar?pg=" . $i);
                preg_match_all("/<h3 class=\"productName\" >(.*?)<\/h3>/i", $fgcn11, $isim);
                preg_match_all("/<ins>(.*?)TL<\/ins>/i", $fgcn11, $fiyat);
                preg_match_all("/ <span class=\"rating r(.*?)\"><\/span>/i", $fgcn11, $rating);
                preg_match_all("/data-original=\"(.*?)\"/i", $fgcn11, $image);
                preg_match_all("/<a href=\"(.*?)\" class=\"plink\"/i", $fgcn11, $link);
                foreach ($isim[1] as $key => $value) {
                    $fgcn112 = file_get_contents($link[1][$key]);
                    preg_match_all("/<p class=\"unf-prop-list-title\">(.*?)<\/p>/i", $fgcn112, $özellikadi);
                    preg_match_all("/<p class=\"unf-prop-list-prop\">(.*?)<\/p>/i", $fgcn112, $özellikdegeri);
                    preg_match_all("/style=\"text-decoration: underline; color:#EA222F\">(.*?)<\/a>/i", $fgcn112, $marka);

                    $magazadb = "N11";

                    if ($marka[1]) {
                        $markadb = strtoupper(trim($marka[1][0]));
                    } else {
                        $markadb = "";
                    }

                    if ($isim[1][$key]) {
                        $isimdb = $isim[1][$key];
                    } else {
                        $isimdb = "";
                    }

                    if ($fiyat[1][$key]) {
                        if (strstr($fiyat[1][$key], ",")) {
                            $fiyatdb = floatval(substr($fiyat[1][$key], 0, strlen($fiyat[1][$key]) - 4));
                        } else {
                            $fiyatdb = floatval($fiyat[1][$key]);
                        }
                    } else {
                        $fiyatdb = 0;
                    }

                    if ($rating[1][$key]) {
                        $puan = floatval($rating[1][$key]);
                        $puandb = $puan / 20;
                    } else {
                        $puandb = 0;
                    }

                    if ($image[1][$key]) {
                        $imagedb = $image[1][$key];
                    } else {
                        $imagedb = "";
                    }

                    if ($link[1][$key]) {
                        $linkdb = $link[1][$key];
                    } else {
                        $linkdb = "";
                    }

                    $urunkoddb;
                    $isletimsistemi;
                    $islemcitipi;
                    $islemcinesli;
                    $ram;
                    $ekrankarti;
                    $ekran;
                    foreach ($özellikadi[1] as $anahtar => $deger) {
                        if ($özellikadi[1][$anahtar] == "Model")
                            $urunkoddb = $özellikdegeri[1][$anahtar];
                        if ($özellikadi[1][$anahtar] == "İşletim Sistemi")
                            $isletimsistemi = $özellikdegeri[1][$anahtar];
                        if ($özellikadi[1][$anahtar] == "İşlemci")
                            $islemcitipi = $özellikdegeri[1][$anahtar];
                        if ($özellikadi[1][$anahtar] == "İşlemci Modeli")
                            $islemcinesli = $özellikdegeri[1][$anahtar];
                        if ($özellikadi[1][$anahtar] == "Bellek Kapasitesi")
                            $ram = $özellikdegeri[1][$anahtar];
                        if ($özellikadi[1][$anahtar] == "Ekran Kartı Modeli")
                            $ekrankarti = $özellikdegeri[1][$anahtar];
                        if ($özellikadi[1][$anahtar] == "Ekran Boyutu"){
                            $ekran1 = trim(substr($özellikdegeri[1][$anahtar], 0, strlen($özellikdegeri[1][$anahtar]) - 6));
                            $ekran = str_replace(",", ".", $ekran1);
                        }

                    }
                    $sql = "insert into dizüstü(marka,ad,fiyat,rating,modelno,isletimsistemi,islemcitipi,islemcinesli,ram,ekrankarti,ekran,magaza,link,resimlinki) values('" . $markadb . "','  $isimdb  ','" . $fiyatdb . "','" . $puandb . "','" . $urunkoddb . "','" . $isletimsistemi . "','" . $islemcitipi . "','" . $islemcinesli . "','" . $ram . "','" . $ekrankarti . "','" . $ekran . "','" . $magazadb . "','" . $linkdb . "','" . $imagedb . "')";
                    $sonuc = mysqli_query($baglan, $sql);
                }
            }
            for ($i = 1; $i <= 10; $i++) {
                $fgcteknosa = file_get_contents("https://www.teknosa.com/laptop-notebook-c-116004?s=%3Arelevance&page=" . $i);
                preg_match_all("/ data-product-brand=\"(.*?)\"/i", $fgcteknosa, $marka);
                preg_match_all("/data-product-name=\"(.*?)\"/i", $fgcteknosa, $isim);
                preg_match_all("/value=\"(.*?) TL\">/i", $fgcteknosa, $fiyat);
                preg_match_all("/data-bv-redirect-url=\"(.*?)\">/i", $fgcteknosa, $link);
                foreach ($isim[1] as $key => $value) {
                    $fgcteknosa2 = file_get_contents($link[1][$key]);
                    preg_match_all("/<link rel=\"preload\" as=\"image\" href=\"(.*?)\" \/>/i", $fgcteknosa2, $image);
                    preg_match_all("/<th>(.*?)<\/th>/i", $fgcteknosa2, $özellikadi);
                    preg_match_all("/<td>(.*?)<\/td>/i", $fgcteknosa2, $özellikdegeri);

                    $magazadb = "Teknosa";

                    if ($marka[1][$key]) {
                        $markadb = strtoupper(trim($marka[1][$key]));
                    } else {
                        $markadb = "";
                    }

                    if ($isim[1][$key]) {
                        $isimdb = $isim[1][$key];
                    } else {
                        $isimdb = "";
                    }

                    if ($fiyat[1][$key]) {
                        if (strstr($fiyat[1][$key], ",")) {
                            $fiyatdb = floatval(substr($fiyat[1][$key], 0, strlen($fiyat[1][$key]) - 3));
                        } else {
                            $fiyatdb = floatval($fiyat[1][$key]);
                        }
                    } else {
                        $fiyatdb = 0;
                    }

                    $puandb = "0";

                    if ($image[1]) {
                        $imagedb = $image[1][0];
                    } else {
                        $imagedb = "";
                    }


                    if ($link[1][$key]) {
                        $linkdb = $link[1][$key];
                    } else {
                        $linkdb = "";
                    }

                    $urunkoddb;
                    $isletimsistemi;
                    $islemcitipi;
                    $islemcinesli;
                    $ram;
                    $ekrankarti;
                    $ekran;
                    for ($j = 0; $j <= 32; $j++) {
                        if ($özellikadi[1][$j] == "Model Kodu")
                            $urunkoddb = $özellikdegeri[1][$j];
                        if ($özellikadi[1][$j] == "İşletim Sistemi Yazılımı")
                            $isletimsistemi = $özellikdegeri[1][$j];
                        if ($özellikadi[1][$j] == "İşlemci")
                            $islemcitipi = $özellikdegeri[1][$j];
                        if ($özellikadi[1][$j] == "İşlemci Nesli")
                            $islemcinesli = $özellikdegeri[1][$j];
                        if ($özellikadi[1][$j] == "Ram")
                            $ram = $özellikdegeri[1][$j];
                        if ($özellikadi[1][$j] == "Ekran Kartı Modeli")
                            $ekrankarti = $özellikdegeri[1][$j];
                        if ($özellikadi[1][$j] == "Ekran Boyutu") {
                            if (strstr($özellikdegeri[1][$j], "&")) {
                                $ekran1 = trim(substr($özellikdegeri[1][$j], 0, strlen($özellikdegeri[1][$j]) - 6));
                                $ekran = str_replace(",", ".", $ekran1);
                            } else {
                                $ekran1 = trim(substr($özellikdegeri[1][$j], 0, strlen($özellikdegeri[1][$j]) - 5));
                                $ekran = str_replace(",", ".", $ekran1);
                            }
                        }
                    }
                    $sql = "insert into dizüstü(marka,ad,fiyat,rating,modelno,isletimsistemi,islemcitipi,islemcinesli,ram,ekrankarti,ekran,magaza,link,resimlinki) values('" . $markadb . "','  $isimdb  ','" . $fiyatdb . "','" . $puandb . "','" . $urunkoddb . "','" . $isletimsistemi . "','" . $islemcitipi . "','" . $islemcinesli . "','" . $ram . "','" . $ekrankarti . "','" . $ekran . "','" . $magazadb . "','" . $linkdb . "','" . $imagedb . "')";
                    $sonuc = mysqli_query($baglan, $sql);
                }
            }

            for ($sayfa = 1; $sayfa <= 10; $sayfa += 1) {
                $fgctrendyol = file_get_contents("https://www.trendyol.com/laptop-x-c103108?pi=" . $sayfa);
                preg_match_all("/<span class=\"prdct-desc-cntnr-ttl\" title=\"(.*?)\">/i", $fgctrendyol, $marka);
                preg_match_all("/<div class=\"prc-box-dscntd\">(.*?)TL<\/div>/i", $fgctrendyol, $fiyat);
                preg_match_all("/<div class=\"p-card-chldrn-cntnr card-border\"><a href=\"(.*?)\">/i", $fgctrendyol, $link);
                preg_match_all("/<div class=\"full\" style=\"width:(.*?);max-width:100%\">/i", $fgctrendyol, $rating);
                $temp = 0;
                foreach ($marka[1] as $key => $value) {
                    $fgctrendyol2 = file_get_contents("https://www.trendyol.com" . $link[1][$key]);
                    preg_match_all("/\"nameWithProductCode\":\"(.*?)\",/i", $fgctrendyol2, $isim);
                    preg_match_all("/\"productCode\":\"(.*?)\"/i", $fgctrendyol2, $urunkod);
                    preg_match_all("/<i class=\"star\"><\/i><span>(.*?)<\/span>/i", $fgctrendyol2, $bosrating);
                    preg_match_all("/<li class=\"detail-attr-item\"><span>(.*?)<\/span> <span><b>(.*?)<\/b><\/span><\/li>/i", $fgctrendyol2, $özellik);
                    preg_match_all("/<img class=\"detail-section-img\" loading=\"lazy\" src=\"(.*?)\"/i", $fgctrendyol2, $image);

                    $magazadb = "Trendyol";

                    if ($marka[1][$key]) {
                        $markadb = strtoupper(trim($marka[1][$key]));
                    } else {
                        $markadb = "";
                    }

                    if ($isim[1]) {
                        $isimdb = $isim[1][0];
                    } else {
                        $isimdb = "";
                    }

                    if ($fiyat[1][$key]) {
                        if (strstr($fiyat[1][$key], ",")) {
                            $fiyatdb = floatval(substr($fiyat[1][$key], 0, strlen($fiyat[1][$key]) - 4));
                        } else {
                            $fiyatdb = floatval($fiyat[1][$key]);
                        }
                    } else {
                        $fiyatdb = 0;
                    }

                    $puan = 0;
                    if ($bosrating[1]) {
                        $puandb = 0;
                        $temp += 5;
                    } else {
                        for ($i = 0; $i <= 4; $i++) {
                            $puan += floatval($rating[1][$key * 5 + $i - $temp]);
                        }
                        $puandb = $puan / 100;
                    }

                    if ($urunkod[1]) {
                        $urunkoddb = $urunkod[1][0];
                    } else {
                        $urunkoddb = "";
                    }

                    if ($image[1]) {
                        $imagedb = $image[1][0];
                    } else {
                        $imagedb = "";
                    }

                    if ($link[1][$key]) {
                        $linkdb = "https://www.trendyol.com" . $link[1][$key];
                    } else {
                        $linkdb = "";
                    }

                    $isletimsistemi;
                    $islemcitipi;
                    $islemcinesli;
                    $ram;
                    $ekrankarti;
                    $ekran;
                    foreach ($özellik[1] as $anahtar => $deger) {
                        if ($özellik[1][$anahtar] == "İşletim Sistemi")
                            $isletimsistemi = $özellik[2][$anahtar];
                        if ($özellik[1][$anahtar] == "İşlemci Tipi")
                            $islemcitipi = $özellik[2][$anahtar];
                        if ($özellik[1][$anahtar] == "İşlemci Nesli")
                            $islemcinesli = $özellik[2][$anahtar];
                        if ($özellik[1][$anahtar] == "Ram (Sistem Belleği)")
                            $ram = $özellik[2][$anahtar];
                        if ($özellik[1][$anahtar] == "Ekran Kartı")
                            $ekrankarti = $özellik[2][$anahtar];
                        if ($özellik[1][$anahtar] == "Ekran Boyutu"){
                            $ekran1 = trim(substr($özellik[2][$anahtar], 0, strlen($özellik[2][$anahtar]) - 5));
                            $ekran = str_replace(",", ".", $ekran1);
                        }

                    }
                    $sql = "insert into dizüstü(marka,ad,fiyat,rating,modelno,isletimsistemi,islemcitipi,islemcinesli,ram,ekrankarti,ekran,magaza,link,resimlinki) values('" . $markadb . "','  $isimdb  ','" . $fiyatdb . "','" . $puandb . "','" . $urunkoddb . "','" . $isletimsistemi . "','" . $islemcitipi . "','" . $islemcinesli . "','" . $ram . "','" . $ekrankarti . "','" . $ekran . "','" . $magazadb . "','" . $linkdb . "','" . $imagedb . "')";
                    $sonuc = mysqli_query($baglan, $sql);
                }
            }

            $sorgu = $baglan->query("SELECT COUNT(*) FROM dizüstü");
            $sayi = $sorgu->fetch_array();

            for ($i = 1; $i <= $sayi[0]; $i++) {
                $sorgu2 = $baglan->query("UPDATE dizüstü SET modelid=$i WHERE id=$i");
            }

            $sorgu3 = $baglan->query("SELECT modelno,modelid,magaza FROM dizüstü");
            $dizi = $sorgu3->fetch_all();

            for ($i = 0; $i < $sayi[0]; $i++) {
                $modelno = $dizi[$i][0];
                $magaza = $dizi[$i][2];
                for ($j = 0; $j < $sayi[0]; $j++) {
                    $modelno2 = $dizi[$j][0];
                    $magaza2 = $dizi[$j][2];
                    if ($modelno == $modelno2 && $magaza != $magaza2 && $j > $i) {
                        $modelid = $dizi[$j][1];
                        $sorgu2 = $baglan->query("UPDATE dizüstü SET modelid=$modelid WHERE id=$i+1");
                    }
                }
            }

        }
        $markalar = [];
        $baglan = mysqli_connect("localhost", "root", "", "bilgisayarlar");
        $sql1 = "SELECT DISTINCT marka FROM dizüstü";
        $sonuc1 = $baglan->query($sql1);

        if (mysqli_num_rows($sonuc1) > 0) {
            while ($i = mysqli_fetch_assoc($sonuc1)) {

                array_push($markalar, $i["marka"]);
            }


        }

        $Ramler = [];
        $baglan = mysqli_connect("localhost", "root", "", "bilgisayarlar");
        $sql1 = "SELECT DISTINCT ram FROM dizüstü";
        $sonuc1 = $baglan->query($sql1);

        if (mysqli_num_rows($sonuc1) > 0) {
            while ($i = mysqli_fetch_assoc($sonuc1)) {

                array_push($Ramler, $i["ram"]);
            }


        }

        $Isletim_Sistemleri = [];
        $baglan = mysqli_connect("localhost", "root", "", "bilgisayarlar");
        $sql1 = "SELECT DISTINCT isletimsistemi FROM dizüstü";
        $sonuc1 = $baglan->query($sql1);

        if (mysqli_num_rows($sonuc1) > 0) {
            while ($i = mysqli_fetch_assoc($sonuc1)) {

                array_push($Isletim_Sistemleri, $i["isletimsistemi"]);
            }


        }

        $Ekran_Boyutlari = [];
        $baglan = mysqli_connect("localhost", "root", "", "bilgisayarlar");
        $sql1 = "SELECT DISTINCT ekran FROM dizüstü";
        $sonuc1 = $baglan->query($sql1);

        if (mysqli_num_rows($sonuc1) > 0) {
            while ($i = mysqli_fetch_assoc($sonuc1)) {

                array_push($Ekran_Boyutlari, $i["ekran"]);
            }


        }
        //Request
        $ID = $request->input('ID') ?? '';
        $marka = $request->input('marka') ?? '';
        $Ram = $request->input('Ram') ?? '';
        $Isletim_Sistemi = $request->input('Isletim_Sistemi') ?? '';
        $Ekran_Boyutu = $request->input('Ekran_Boyutu') ?? '';
        $Artan = $request->input('Artan') ?? '';
        $Azalan = $request->input('Azalan') ?? '';
        $P_Artan = $request->input('P_Artan') ?? '';
        $P_Azalan = $request->input('P_Azalan') ?? '';

        //Marka Link
        if ($marka == "") {
            if ($Ram == "") {
                if ($Isletim_Sistemi == "") {
                    if ($Ekran_Boyutu == "") {
                        if ($Artan == 0 && $Azalan == 0) {
                            $veriler1 = DB::table("dizüstü")->get();
                        } else if ($Artan == 1 && $Azalan == 0) {
                            $veriler1 = DB::table("dizüstü")->orderBy('fiyat', 'asc')->get();
                        } else if ($Artan == 0 && $Azalan == 1) {
                            $veriler1 = DB::table("dizüstü")->orderBy('fiyat', 'desc')->get();
                        } else if ($P_Artan == 0 && $P_Azalan == 0) {
                            $veriler1 = DB::table("dizüstü")->get();
                        } else if ($P_Artan == 1 && $P_Azalan == 0) {
                            $veriler1 = DB::table("dizüstü")->orderBy('rating', 'asc')->get();
                        } else if ($P_Artan == 0 && $P_Azalan == 1) {
                            $veriler1 = DB::table("dizüstü")->orderBy('rating', 'desc')->get();
                        } else {
                            $veriler1 = DB::table("dizüstü")->get();
                        }
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("ekran", $Ekran_Boyutu)->get();
                    }
                } else if ($Isletim_Sistemi != "") {
                    if ($Ekran_Boyutu == "") {
                        $veriler1 = DB::table("dizüstü")->where("isletimsistemi", $Isletim_Sistemi)->get();
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("isletimsistemi", $Isletim_Sistemi)->where("ekran", $Ekran_Boyutu)->get();
                    }
                }
            } else if ($Ram != "") {
                if ($Isletim_Sistemi == "") {
                    if ($Ekran_Boyutu == "") {
                        $veriler1 = DB::table("dizüstü")->where("ram", $Ram)->get();
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("ram", $Ram)->where("ekran", $Ekran_Boyutu)->get();
                    }
                } else if ($Isletim_Sistemi != "") {
                    if ($Ekran_Boyutu == "") {
                        $veriler1 = DB::table("dizüstü")->where("ram", $Ram)->where("isletimsistemi", $Isletim_Sistemi)->get();
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("ram", $Ram)->where("isletimsistemi", $Isletim_Sistemi)->where("ekran", $Ekran_Boyutu)->get();
                    }
                }
            }
        } else if ($marka != "") {
            if ($Ram == "") {
                if ($Isletim_Sistemi == "") {
                    if ($Ekran_Boyutu == "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->get();
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->where("ekran", $Ekran_Boyutu)->get();
                    }
                } else if ($Isletim_Sistemi != "") {
                    if ($Ekran_Boyutu == "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->where("isletimsistemi", $Isletim_Sistemi)->get();
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->where("isletimsistemi", $Isletim_Sistemi)->where("ekran", $Ekran_Boyutu)->get();
                    }
                }
            } else if ($Ram != "") {
                if ($Isletim_Sistemi == "") {
                    if ($Ekran_Boyutu == "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->where("ram", $Ram)->get();
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->where("ram", $Ram)->where("ekran", $Ekran_Boyutu)->get();
                    }
                } else if ($Isletim_Sistemi != "") {
                    if ($Ekran_Boyutu == "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->where("ram", $Ram)->where("isletimsistemi", $Isletim_Sistemi)->get();
                    } else if ($Ekran_Boyutu != "") {
                        $veriler1 = DB::table("dizüstü")->where("marka", $marka)->where("ram", $Ram)->where("ekran", $Ekran_Boyutu)->where("isletimsistemi", $Isletim_Sistemi)->get();
                    }
                }
            }
        }

        return view("Anasayfa", ["veriler" => $veriler1, "marka" => $marka, "markalar" => $markalar, "scrap" => $scrap, "ID" => $ID, "Artan" => $Artan, "Azalan" => $Azalan, "Ramler" => $Ramler, "Isletim_Sistemleri" => $Isletim_Sistemleri, "Isletim_Sistemi" => $Isletim_Sistemi, "Ram" => $Ram, "Ekran_Boyutlari" => $Ekran_Boyutlari, "Ekran_Boyutu" => $Ekran_Boyutu, "P_Artan" => $P_Artan, "P_Azalan" => $P_Azalan]);
    }

    public function Ozellik(Request $request)
    {

        $Id = $request->input('ID') ?? '';
        $Id_Tut = DB::table("dizüstü")->where("ID", $Id)->get();


        return view('Özellik', ["Id_Tut" => $Id_Tut, "ID" => $Id]);

    }
}
