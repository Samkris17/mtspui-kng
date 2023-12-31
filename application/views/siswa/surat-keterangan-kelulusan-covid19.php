<?php
	$mpdf = new \Mpdf\Mpdf();
	$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
	$mpdf = new \Mpdf\Mpdf(['paper' => 'A4']);
	ob_start();
?>

<!DOCTYPE html>
<html>
	<head>
	<style>
		h3 {
		    position: absolute;
		}
		h3	{
		    right: 220px;
		    top: 45px;
		    text-align: center;
		}
		.content{
			padding-top: 10px;
			text-align: justify;
		}
		.data-siswa{
			position: absolute;
			right: 220px;
			top: 310px;
		}
		<title>Surat Keterangan Kelulusan</title>
	</style>
	</head>
	<body>
		<img style="margin-left: 40px; padding-top : 0px; position: absolute;" class="img" width="60px" src="<?=base_url('assets/')?>surat-keterangan-lulus_files/image001.png"/>
		<h3>PEMERINTAH KABUPATEN GROBOGAN<br>
		DINAS PENDIDIKAN DAN KEBUDAYAAN<br>
		MTS PUI KUNINGAN</h3>

		<p style="text-align: center; padding: 0px; margin: 0px;">
			<span>Jl. R.Suprapto No.82, Jetis Timur, Purwodadi, Kec. Purwodadi, Kabupaten Grobogan, Jawa Tengah 58111</span>
		</p>

		<img height=7 style="margin-top: px" src='<?=base_url()?>assets/surat-keterangan-lulus_files/image003.gif' v:shapes='_x0000_s1026'>

	    <br style='mso-ignore:vglayout' clear=ALL>

	    <p style="text-align: center; padding-bottom: 0px; margin-bottom: 0px; font-size: 13pt; color:black; font-weight: bold;">
	    	<u>SURAT KETERANGAN KELULUSAN</u>
	    </p>

	    <p style="text-align: center; padding-top: 0px; margin-top: 0px; color:black;">
	    	Nomor : 422/<span style="mso-spacerun:yes">         </span>/SMAN-PWD/2020
	    </p>

		<div class="content">
			<p>Yang bertanda tangan di bawah ini, Kepala SMA Negeri 1 Purwodadi Kabupaten Grobogan Propinsi Jawa Tengah menerangkan bahwa :</p>

	 		<p style="margin-left: 30px;">
				Nama                                           <br>

				Tempat Dan Tanggal Lahir                       <br>

				Nama Orang Tua/Wali                            <br>

				Nomor Induk Siswa                              <br>

				Nomor Induk Siswa Nasional					   <br>
			</p>
	 
	 		
			<p>
				Berdasarkan Hasil Rapat Dewan Guru tentang Penentuan Kelulusan Kelulusan dan mengacu kepada Permendikbud Nomor 43 Tahun 2019 tentang Penyelenggaraan Ujian yang Diselenggarakan Satuan Pendidikan dan Ujian Nasional, serta Surat Edaran Mendikbud Nomor 4 Tahun 2020 tentang Pelaksanaan Kebijakan Pendidikan dalam Masa Darurat Penyebaran Corona Virus Disease (COVID-19), dengan ini siswa tersebut di atas dinyatakan :
			</p>


			<?php if ($is_lulus == 'lulus') { ?> 
				<p style="font-size: 18px; font-family: ; font-weight: bold; text-align: center; border: 1px;">
					<i>LULUS / <s>TIDAK LULUS</s></i>
				</p>
			<?php } else { ?>
				<p style="font-size: 18px; font-family: ; font-weight: bold; text-align: center; border: 1px;">
					<i><s>LULUS</s> / TIDAK LULUS</i>
				</p>
			<?php } ?>

			<p>
				dari SMA Negeri 1 Purwodadi. Demikian Surat Keterangan ini dapat digunakan untuk keperluan Penerimaan Peserta Didik Baru (PPDB) atau keperluan lain sesuai dengan kebututuhan, dan hanya berlaku sampai diterbitkannya Ijazah Tahun pelajaran 2020/2021.
			</p>
	<br>
	<br>

	 

	 

	                                                                                                            <p style="margin-left: 450px; text-align: left;">Kuningan, <?= date('d M yy');?><br>
	                                                                                                            Kepala Sekolah
	<br>
	<br>
	<br>
	<br>
	<br>
	                                                                                                            Nurdin M.H, M.Pd.<br>
	                                                                                                            NIP. 0267461487674</p>
		</div>

		<div class="data-siswa">
			: <?=$siswa['nama_siswa']; ?><br>

			: <?=$siswa['tempat_lahir']; ?>, <?=formattanggal($siswa['tanggal_lahir']);?><br>

			: <?=$siswa['nama_ibu'];?>h<br>

			: <?=$siswa['nis']?><br>

			: <?=$siswa['nisn']?><br>
		</div>

	</body>
</html>


<?php
	$html = ob_get_contents();
	ob_end_clean();
	// write $html ka mpdf
	$mpdf->WriteHTML(($html));
	// hasilna
	$mpdf->Output("Surat Keterangan Lulus - SMA Negeri 1 Purwodadi.pdf",\Mpdf\Output\Destination::INLINE);
?>