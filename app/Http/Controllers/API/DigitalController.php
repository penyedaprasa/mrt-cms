<?php

namespace App\Http\Controllers\API;

use DB;
use Illuminate\Http\Request;

class DigitalController extends Controller
{
	public function index(){
		// $select_join = DB::select('SELECT * FROM users WHERE id = :id', ['id' => 1]);
		$select_gabung = DB::select(
			'SELECT
				digital_monitoring.id AS digital_id,
				digital_monitoring.id_stations AS digital_id_stations,
				stations.id AS stations_id,
				stations.name AS stations_name,
				stations.description AS stations_desc,
				stations.image AS stations_image,
				stations.latitude AS stations_latitude,
				stations.longitude AS stations_longitude,
				stations.time_open AS stations_t_buka,
				stations.time_close AS stations_t_tutup,
				stations.lanes AS stations_lanes,
				stations.nomor AS stations_nomor,
				stations.status AS stations_status,
				digital_monitoring.created_at AS digital_created_at,
				(SELECT TIMESTAMPDIFF(MINUTE, (SELECT created_at FROM digital_monitoring WHERE id = digital_id), NOW())) AS diff,
				(SELECT IF(diff>5,"OFF","ON")) AS digital_status,
				(SELECT menus.title AS menus_name FROM menus LEFT JOIN digital_monitoring_hit_now ON digital_monitoring_hit_now.id_menus = menus.id WHERE digital_monitoring_hit_now.created_at IN ( SELECT MAX( created_at ) FROM digital_monitoring_hit_now GROUP BY digital_monitoring_hit_now.id_stations) AND digital_monitoring_hit_now.id_stations = digital_id_stations) AS digital_hit_now
			FROM
				digital_monitoring
				LEFT JOIN stations ON digital_monitoring.id_stations = stations.id 
			WHERE
				digital_monitoring.created_at IN ( SELECT MAX( created_at ) FROM digital_monitoring GROUP BY digital_monitoring.id_stations ) ORDER BY digital_id_stations ASC'
		);

		$msg = array('status'=>true,'monitor'=>$select_gabung,'message'=>'Get All Monitor');
		return response()->json($msg);
	}

	public function add(Request $request){
		$id_stations = $request->input('id_stations');
		if($request->all()){
			$data_monitor = array(
				'id_stations' => $id_stations
			);

			DB::table('digital_monitoring')->insert($data_monitor);
			$last_id = DB::getPDO()->lastInsertId();
			$msg = array('status'=>true,'monitor'=>$last_id,'message'=>'Insert Monitor Berhasil');
		} else {
			$msg = array('status'=>false,'message'=>'Gagal Insert Monitor');
		}
		return response()->json($msg);
	}

	public function menu_now(Request $request){
		$id_stations = $request->input('id_stations');
		$id_menus = $request->input('id_menus');
		if($request->all()){
			$data_monitor_hit_now = array(
				'id_stations' => $id_stations,
				'id_menus' => $id_menus
			);

			DB::table('digital_monitoring_hit_now')->insert($data_monitor_hit_now);
			$last_id = DB::getPDO()->lastInsertId();
			$msg = array('status'=>true,'monitor'=>$last_id,'message'=>'Insert Monitor Menu Now Berhasil');
		} else {
			$msg = array('status'=>false,'message'=>'Gagal Insert Monitor Menu Now');
		}
		return response()->json($msg);
	}
}