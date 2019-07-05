<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Input;
use App\User;
use App\reviews;
use App\question;
//use DB;
use Excel;

class excelcontroller extends Controller
{

    // users method
	public function downloadExcel($type)

	{
try{
		$data = User::get()->toArray();
}

catch(\Exception $e){

	return 'Error! Users Table Not Retrieved';
}//catch end

try{
		return Excel::create('Dstreet Users', function($excel) use ($data) {

			$excel->sheet('Users Record', function($sheet) use ($data)

	        {

				$sheet->fromArray($data);

	        });

		})->download($type);
	}

catch(\Exception $e){

	return 'Error! Download Failed';
}//catch end
    }
     // users method



      // reviews method
	public function downloadExcel2($type)

	{
try{
		$data = reviews::get()->toArray();
	}

	catch(\Exception $e){
	
		return 'Error! Users Table Not Retrieved';
	}//catch end
	
		try{
		return Excel::create('Dstreet Reviews', function($excel) use ($data) {

			$excel->sheet('Review Records', function($sheet) use ($data)

	        {

				$sheet->fromArray($data);

	        });

		})->download($type);
	}

	catch(\Exception $e){
	
		return 'Error! Download Failed';
	}//catch end
    }
     // reviews method



      // reviews method
	public function downloadExcel3($type)

	{

		try{
		$data = question::get()->toArray();
	}

	catch(\Exception $e){
	
		return 'Error! Users Table Not Retrieved';
	}//catch end

	
		try{
		return Excel::create('FAQ On Dstreet', function($excel) use ($data) {

			$excel->sheet('FAQ Records', function($sheet) use ($data)

	        {

				$sheet->fromArray($data);

	        });

		})->download($type);
	}

	catch(\Exception $e){
	
		return 'Error! Download Failed';
	}//catch end
    }
     // reviews method


	/*public function importExcel()

	{

		if(Input::hasFile('import_file')){

			$path = Input::file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {

			})->get();

			if(!empty($data) && $data->count()){

				foreach ($data as $key => $value) {

					$insert[] = ['title' => $value->title, 'description' => $value->description];

				}

				if(!empty($insert)){

					DB::table('items')->insert($insert);

					dd('Insert Record successfully.');

				}

			}

		}

		return back();

    }
    */

}//class end
