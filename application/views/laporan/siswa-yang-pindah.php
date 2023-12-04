<?php
	$mpdf = new \Mpdf\Mpdf();
	$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
	$html ='
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Data Siswa SMA Negeri 1 Purwodadi</title>
				<link href="'.base_url().'assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
			</head>
			<body>
			<h1 class="text-center">DATA SISWA PINDAH SMA Negeri 1 Purwodadi</h1>
            <h3 class="text-center">Tahun Ajaran 2020/2021</h3>
	            <table class="table table-bordered">
	                <thead class="text-center">
	                    <tr>
	                        <th class="text-center">No</th>
		                    <th class="text-center" scope="col">NIS</th>
		                    <th class="text-center" scope="col">Angkatan</th>
							<th class="text-center" scope="col">Nama Siswa</th>
							<th class="text-center" scope="col">Jenis Kelamin</th>
							<th class="text-center" scope="col">Tempat Tanggal Lahir</th>
							<th class="text-center" scope="col">No Hp</th>
							<th class="text-center" scope="col">Kelas</th>
	                    </tr>
	                </thead>
	                <tbody>';
	                $i=1;
	                foreach ($siswa as $data) {
	                	$html .= '
	                			<tr>
	                                <td class="text-center">'.$i++.'</td>
	                                <td class="text-center">'.$data["nis"].'</td>
	                                <td class="text-center">'.$data["angkatan"].'</td>
									<td class="text-center">'.$data["nama_siswa"].'</td>
									<td class="text-center">'.$data["jk"].'</td>
									<td class="text-center">'.$data["tempat_lahir"].', '.$data["tanggal_lahir"].'</td>
									<td class="text-center">'.$data["no_hp"].'</td>
									<td class="text-center">'.$data["kelas"].'</td>  
	                            </tr>';
	                }
	                
	     $html .= '</tbody>
	            </table>
			</body>
			</html>';

$mpdf->WriteHTML('');
$mpdf->WriteHTML($html);
$mpdf->Output('PPDB',\Mpdf\Output\Destination::INLINE);