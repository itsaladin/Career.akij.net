
<form method="post" action="' . action('Backend\EmployersController@destroy', [$row->id]) . '">
        <input type="hidden" name="_method" value="delete" />
        <input type="hidden" name="_token" value="'. csrf_token() .'"/>
        <button type="submit" class="dropdown-item"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
    </form>