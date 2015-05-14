<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use DB;
use Response;

// Models
use App\Models\Company;
use App\Models\Companylogo;

class AutocompleteController extends Controller {

  public function findCompanies() {

    // Get search term
    $term = Input::get('term');

    // Run query
    $result = Company::where('companys.name', 'ILIKE', '%'.trim($term).'%')->orderBy('companys.name', 'asc')
              ->leftjoin('companylocations', 'companys.id', '=', 'companylocations.company_id')
              ->get(array(
                  'companys.id',
                  'companys.name',
                  'companylocations.city',
                  'companylocations.state'
                ));

    // Build array
    $data = array();
    $companylogo = new Companylogo;

    foreach($result as $row){

      if ($row->city != "" && $row->state != "") {
        $location = $row->city . ', ' . $row->state;
      } elseif ($row->city != "" && $row->state == "") {
        $location = $row->city;
      } else {
        $location = '';
      }

      $data[] = array(
        'value'=>$row->id,
        'label'=>$row->name,
        'logo'=>'<img class="avatar_company" src="' . $companylogo->getCompanyAvatar($row->id) . '"/>',
        'location'=>'<span class="small text-muted">' . $location . '</span>'
      );
    }
    // Return array data
    return Response::json($data);
  }
  
}
