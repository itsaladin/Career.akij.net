<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Employer; 
use Auth;
use Yajra\Datatables\Datatables;

class EmployersController extends Controller
{
    
    public function index()
    {
        $employers = Employer::select(
            'id',
            'name',
            'logo',
            'email',
            'address'
        )->get();
        return $employers;
    }
    
    public function employers_for_datatable()
    {
        $employers = $this->index();
        
        return Datatables::of($employers)
        ->addIndexColumn()
        ->addColumn('action', function($row){
            $html = '
                <button type="button" class="btn btn-info dropdown-toggle btn-sm btn-xsm" 
                    data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span><span class="sr-only">Toggle Dropdown
                    </span>
                </button>
                <div class="dropdown-menu " role="menu">';
                
                $html .= '<a href="#" class="dropdown-item" data-href=""><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>';
                $html .= '<a href="#" class="dropdown-item" data-href=""><i class="fa fa-print" aria-hidden="true"></i> Print</a>';
                $html .= '
                <form method="post" action="' . action('Backend\EmployersController@destroy', [$row->id]) . '">
                <input type="hidden" name="_method" value="delete" />
                '.csrf_field().'
                <button type="submit" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                </form>';

                $html .=  '</div>';
                return $html;
        })
        ->editColumn('logo', function($row){
            $logo = url('/public/img/companies/'.$row->logo);
            return $logo;
            // return '<div style="display: flex;"><img src="' . $logo . '" alt="Product image" class="product-thumbnail-small"></div>';
            
        })
        // ->addColumn('no', function($row){
        //     return $row->DT_RowIndex;
        // })
        ->removeColumn('id')
        ->make(true);
    }

}
