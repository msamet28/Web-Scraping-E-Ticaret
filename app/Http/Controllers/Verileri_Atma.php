<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Verileri_Atma extends Controller
{
    public function ad_yazdır(){$data=[];
        Db::table("dizüstü")->truncate();
        $baglan = mysqli_connect("localhost", "root", "", "bilgisayarlar");

        for ($i = 1; $i <=2 ; $i++) {
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
                //echo "N11<br>";
                $magazadb = "N11";
                //echo $marka[1][0] . "<br>";
                $markadb = $marka[1][0];
                //echo $isim[1][$key] . "<br>";
                $isimdb = $isim[1][$key];
                //echo $fiyat[1][$key] . "<br>";
                if (strstr($fiyat[1][$key], ",")) {
                    $fiyatdb = substr($fiyat[1][$key], 0, strlen($fiyat[1][$key]) - 4);
                } else {
                    $fiyatdb = $fiyat[1][$key];
                }
                //echo "Puan: " . ($puan / 20) . "<br>";
                $puan = floatval($rating[1][$key]);
                $puandb = $puan / 20;
                //echo $image . "<br>";
                $imagedb = $image[1][$key];
                //echo $link[1][$key] . "<br>";
                $linkdb = $link[1][$key];

                $urunkoddb="";
                $isletimsistemi="";
                $islemcitipi="";
                $islemcinesli="";
                $ram="";
                $ekran="";
                foreach ($özellikadi[1] as $anahtar => $deger) {
                    //echo $özellikadi[1][$anahtar] . ":" . $özellikdegeri[1][$anahtar] . "<br>";
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
                    if ($özellikadi[1][$anahtar] == "Ekran Boyutu")
                        $ekran = substr($özellikdegeri[1][$anahtar], 0, strlen($özellikdegeri[1][$anahtar]) - 6);
                }

                $sql = "insert into dizüstü(marka,ad,fiyat,rating,modelno,isletimsistemi,islemcitipi,islemcinesli,ram,ekran,magaza,link,resimlinki) values('" . $markadb . "','  $isimdb  ','" . $fiyatdb . "','" . $puandb . "','" . $urunkoddb . "','" . $isletimsistemi . "','" . $islemcitipi . "','" . $islemcinesli . "','" . $ram . "','" . $ekran . "','" . $magazadb . "','" . $linkdb . "','" . $imagedb . "')";
                $sonuc = mysqli_query($baglan,$sql);

                array_push($data, $markadb);

            }
        }

        return view('dene', ['data' => $data]);


    }
}
