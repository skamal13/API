<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function viewtgljquery($tgl)
	{
		$tglex=explode("-",$tgl);
		$tgl=$tglex[1]."/".$tglex[2]."/".$tglex[0];
		return $tgl;
	}
	function viewtglweb($tgl)
	{
		$tglex=explode("-",$tgl);
		$tgl=$tglex[2]."/".$tglex[1]."/".$tglex[0];
		return $tgl;
	}
	function desimal($nilai)
	{
	return $nilai=number_format($nilai,0,",",".");
        }
        
        function getKdSemesterKRS()
        {
            date_default_timezone_set('Asia/Jakarta');//defaul jam indonesia
            $tgl_waktu=date('Y-m-d H:i:s');

            $tahun = date('Y');
            $bulan = date('m');
            $tahunlalu = $tahun - 1;

            if ($bulan > 5) 
                {//ambil semester
                $semester = $tahun . '1';
                } 
            else
                {
                $semester = $tahunlalu . '3';
                }
                return $semester;
        }
        function getSemesterSekarang(){
		//ambil semester
		date_default_timezone_set('Asia/Jakarta');
		$tgl_waktu = date('Y-m-d H:i:s');
		$tahun = date('Y');
		$bulan = date('m');
		$tahunLalu = $tahun-1;
		if($bulan>5){
			$semester = $tahun.'1';
		}else{
			$semester = $tahunLalu.'3';
		}
		return $semester;
	 }
        function prosesNilDes($nilai)
        {
                       if($nilai=="A"){
				$nilDes=4;
			}
                        else if($nilai=="B+"){
				$nilDes=3.5;
			}
			else if($nilai=="B"){
				$nilDes=3;
			}
                        else if($nilai=="C+"){
				$nilDes=2.5;
			}
			else if($nilai=="C"){
				$nilDes=2;
			}
			else if($nilai=="D"){
				$nilDes=1;
			}
                        else if($nilai=="E"){
				$nilDes=0;
			}
                        else 
                        {
                            $nilDes=0;
                        }
                     return $nilDes;
        }
        function prosesSemTampil($semester){
			$tahun=substr($semester,0,4);         
			$smstr=substr($semester,4,1);
			$semTampil=$tahun."/".($tahun+1);
			if($smstr=="1"){
				$semTampil="Ganjil ".$semTampil;
			}
			else if($smstr=="2"){
				$semTampil="Pendek Ganjil ".$semTampil;
			}
			else if($smstr=="3"){
				$semTampil="Genap ".$semTampil;
			}
			else if($smstr=="4"){
				$semTampil="Pendek Genap ".$semTampil;
			}
                        return $semTampil;
		}
                function getKdFjjp7($nim)
                {
                   // $nim = $this->session->userdata('nim13');
                    $kd= substr($nim, 2, 7);
                    return $kd;
                }                
                 function getGambar($nim)
                {
                   $CI=& get_instance();
                   $CI->load->database();
                   $db2 = $CI->load->database('gambar', true);
                   $sqlgambar = "select * from gambar where nim13='" . $nim . "'";
                    $querygambar = $db2->query($sqlgambar);
                     if($querygambar->num_rows>0)
                    {
                        foreach ($querygambar->result_array() as $rows) 
                            {
                        $gambar = $rows['gambar'];
                            }// end untuk nampilin gambar  

                    }
                    else
                    {
                      $gambar='tidakkenal';
                    }
                    return $gambar;
                }
            
           
            function konversi_nilai($nilai)
            {
                if($nilai=="B+")
                {
                    $param="AB";
                }
                else if($nilai=="C+")
                {
                    $param="BC";
                }
                else
                {
                    $param = $nilai;
                }
                return $param;
            }


