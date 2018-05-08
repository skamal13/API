<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function isi_respon($nim, $ws, $respon) {
    
//    info kategori ws
//login = 0
//beranda = 1
//biodata = 2
//biaya kuliah = 3
//historis slip spp = 4
//dosen wali = 5
//ubah password = 6
//ambil krs = 7
//simpan krs = 8
//ambil ubah krs = 9
//simpan ubah krs = 10
//cetak krs = 11
//khs = 12
//matakuliah = 13
//transkrip sementara = 14
//tulis pesan = 15
//pesan masuk = 16
//pesan terkirim = 17
//logout = 18
    
        $CI=& get_instance();
        $CI->load->database();
        $db = $CI->load->database('default', true);
        //$db = $CI->load->database('puksi', true);
         $db->query("INSERT INTO log_respon_ws_krs(nim13, ws, respon_time, acces_time) VALUES ('" . $nim . "','" . $ws . "','" . $respon . "',Now())");
    }