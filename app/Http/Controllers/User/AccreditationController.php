<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tbl_accreditation;
use App\Tbl_accreditation_request;
use App\Tbl_organization_member;
use App\User;
use Validator;
use App\Events\NotificationEvent;
use App\Helpers\NotificationHelper;

class AccreditationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
    	
    	$notifications = NotificationHelper::notification();

    	$icons = [
        'pdf' 	=> 'far fa-file-pdf text-danger',
        'doc' 	=> 'far fa-file-word text-primary',
        'docx' 	=> 'far fa-file-word text-primary',
        'xls' 	=> 'far fa-file-excel text-success',
        'xlsx' 	=> 'far fa-file-excel text-success',
        'ppt' 	=> 'far fa-file-powerpoint text-warning',
        'pptx' 	=> 'far fa-file-powerpoint text-warning',
        
       ];
 
    	$user = User::where('id', auth()->id())->get();

    	$accreditation = Tbl_accreditation::where('user_id', auth()->id())->get();
	   	$organization_member= '';
    	foreach ($accreditation as  $value) {
    		$organization_member = Tbl_organization_member::where('tbl_accreditation_id', $value->id)->get();
    	}

    	$acc_request = Tbl_accreditation_request::orderBy('updated_at','desc')
    	->where('user_id', auth()->id())->get();


    	return view('userpage.accreditation', compact('user','accreditation','icons','notifications','acc_request','organization_member'))->with('pagename', 'Accreditation (new)');
    }

    public function renewalindex()
    {
    	$notifications = NotificationHelper::notification();

    	$icons = [
        'pdf' 	=> 'far fa-file-pdf text-danger',
        'doc' 	=> 'far fa-file-word text-primary',
        'docx' 	=> 'far fa-file-word text-primary',
        'xls' 	=> 'far fa-file-excel text-success',
        'xlsx' 	=> 'far fa-file-excel text-success',
        'ppt' 	=> 'far fa-file-powerpoint text-warning',
        'pptx' 	=> 'far fa-file-powerpoint text-warning',
        
       ];

    	$user = User::where('id', auth()->id())->get();
    	$accreditation = Tbl_accreditation::where('user_id', auth()->id())->get();
		   
		$organization_member= '';
    	foreach ($accreditation as  $value) {
    		$organization_member = Tbl_organization_member::where('tbl_accreditation_id', $value->id)->get();
    	}

    	$acc_request = Tbl_accreditation_request::orderBy('updated_at','desc')
    	->where('user_id', auth()->id())->get();

    	return view('userpage.renewal', compact('user','accreditation','icons','notifications','acc_request','organization_member'))->with('pagename', 'Accreditation (renewal)');
    }

    public function accreditedorgindex()
    {
    	$notifications = NotificationHelper::notification();

    	$accreditation = Tbl_accreditation::where('status', 1)->get();

    	return view('userpage.accredited_org', compact('notifications','accreditation'))->with('pagename', 'Accredited Organization');

    }

    public function vieworganization($url, $id, $code)
    {
    	$notifications = NotificationHelper::notification();
    	$accreditation = Tbl_accreditation::where('id', $id)
    	->where('status', 1)
    	->get();

    	if(count($accreditation))
    	{
    		foreach ($accreditation as $value){}
    		return view('userpage.accredited_view_org', compact('notifications','accreditation'))->with('pagename', $value->name);
    	}
    	else
    	{
    		abort(404);
    	}
    	
    }

    public function add_accreditation(Request $request)
    {
    	if(auth()->id())
    	{
    		$nameoforg = Tbl_accreditation::where('name', $request->name_of_organization)->get();

			if(count($nameoforg))
			{
				return response()->json(['errors' => 'Name of organization has already been taken.']);
				
			}
			else
			{
					$rules = array(
		      	 	'logo'						=> 'required|image',
		      	 	'prog_and_proj'				=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
		      	 	'bylaws'					=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
		      	 	'organizational_profile'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
		      	 	'roster_of_members'			=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
		      	 	'organizational_structure'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
		      	 	'letter_of_intent'			=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
		      	 	'number_of_members'			=> 'required|numeric',	
		      	 	'type_of_organization'		=> 'required',
		      	 	'town'						=> 'required',
		      	 	'name_of_organization'		=> 'required',
					
			         );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }

			        //letter_of_intent
			        $letter_of_intent = $request->file('letter_of_intent');
			        $intent = str_random(15) . '.' . $letter_of_intent->getClientOriginalExtension();
			        $letter_of_intent->move(public_path('accreditation_file'), $intent);

			        //organizational_structure
			        $organizational_structure = $request->file('organizational_structure');
			        $orgstructure = str_random(15) . '.' . $organizational_structure->getClientOriginalExtension();
			        $organizational_structure->move(public_path('accreditation_file'), $orgstructure);

			        //roster_of_members
			        $roster_of_members = $request->file('roster_of_members');
			        $rostermember = str_random(15) . '.' . $roster_of_members->getClientOriginalExtension();
			        $roster_of_members->move(public_path('accreditation_file'), $rostermember);

			        //organizational_profile
			        $organizational_profile = $request->file('organizational_profile');
			        $orgprofile = str_random(15) . '.' . $organizational_profile->getClientOriginalExtension();
			        $organizational_profile->move(public_path('accreditation_file'), $orgprofile);

			        //bylaws
			        $bylaws = $request->file('bylaws');
			        $by_laws = str_random(15) . '.' . $bylaws->getClientOriginalExtension();
			        $bylaws->move(public_path('accreditation_file'), $by_laws);

			        //prog_and_proj
			        $prog_and_proj = $request->file('prog_and_proj');
			        $program_and_project = str_random(15) . '.' . $prog_and_proj->getClientOriginalExtension();
			        $prog_and_proj->move(public_path('accreditation_file'), $program_and_project);

			        //logo
			        $logo = $request->file('logo');
			        $logos = str_random(15) . '.' . $logo->getClientOriginalExtension();
			        $logo->move(public_path('accreditation_file'), $logos);


			        $data = array(
			            'user_id' 					=> auth()->id(),
			            'name'						=> $request->name_of_organization,
			            'town'						=> $request->town,
			            'type'						=> $request->type_of_organization,
			            'member'					=> $request->number_of_members,
			            'letter_of_intent'			=> $intent,
			            'organizational_structure'	=> $orgstructure,
			            'roster_of_member'			=> $rostermember,
			            'organizational_profile'	=> $orgprofile,
			            'bylaws'					=> $by_laws,
			            'program_and_project'		=> $program_and_project,
			            'logo'						=> $logos,
			        );

			        Tbl_accreditation::create($data);

			        $text = ['accreditation' => auth()->user()->first_name.' '.auth()->user()->last_name.' is new applicant for accreditation.'];
		            event(new NotificationEvent($text));
			    	return response()->json(['success' => 'We will inform you if your application is validated. A short message will be receive ']);
			}
    		
    	}
    	else
    	{
    		return response()->json(['errors' => 'Access Denied.']);
    	}
      	 
    }

    public function update_accreditation(Request $request)
    {
    	if(auth()->id())
    	{
    		$nameoforg = Tbl_accreditation::where('name', $request->name_of_organization)
    		->where('user_id', '!=', auth()->id())
    		->get();
    		if(count($nameoforg))
			{
				return response()->json(['errors' => 'Name of organization has already been taken.']);
				
			}
			else
			{
				$rules = array(
	      	 	'number_of_members'			=> 'required|numeric',	
	      	 	'type_of_organization'		=> 'required',
	      	 	'town'						=> 'required',
	      	 	'name_of_organization'		=> 'required',
				
		         );

		        $error = Validator::make($request->all(), $rules);

		        if($error->fails())
		        {
		            return response()->json(['errors' => $error->errors()->all()]);
		        }

		        $data = array(
		            'name'						=> $request->name_of_organization,
		            'town'						=> $request->town,
		            'type'						=> $request->type_of_organization,
		            'member'					=> $request->number_of_members,
		            
		        );
		        
		        // letter_of_intent
		        if($request->has('letter_of_intent'))
		        {
		        	$rules = array(
		      	 		'letter_of_intent'			=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//letter_of_intent
			        $letter_of_intent = $request->file('letter_of_intent');
			        $intent = str_random(15) . '.' . $letter_of_intent->getClientOriginalExtension();
			        $letter_of_intent->move(public_path('accreditation_file'), $intent);

			        $data = array_merge($data, ['letter_of_intent' => $intent]);
		        }

		        // organizational_structure
		        if($request->has('organizational_structure'))
		        {
		        	$rules = array(
		      	 		'organizational_structure'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//organizational_structure
			        $organizational_structure = $request->file('organizational_structure');
			        $orgstructure = str_random(15) . '.' . $organizational_structure->getClientOriginalExtension();
			        $organizational_structure->move(public_path('accreditation_file'), $orgstructure);

			        $data = array_merge($data, ['organizational_structure' => $orgstructure]);
		        }

		        // roster_of_members
		        if($request->has('roster_of_members'))
		        {
		        	$rules = array(
		      	 		'roster_of_members'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//roster_of_members
			        $roster_of_members = $request->file('roster_of_members');
			        $rostermember = str_random(15) . '.' . $roster_of_members->getClientOriginalExtension();
			        $roster_of_members->move(public_path('accreditation_file'), $rostermember);

			        $data = array_merge($data, ['roster_of_member' => $rostermember]);
		        }

		        // organizational_profile
		        if($request->has('organizational_profile'))
		        {
		        	$rules = array(
		      	 		'organizational_profile'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//organizational_profile
			        $organizational_profile = $request->file('organizational_profile');
			        $orgprofile = str_random(15) . '.' . $organizational_profile->getClientOriginalExtension();
			        $organizational_profile->move(public_path('accreditation_file'), $orgprofile);

			        $data = array_merge($data, ['organizational_profile' => $orgprofile]);
		        }

		        // bylaws
		        if($request->has('bylaws'))
		        {
		        	$rules = array(
		      	 		'bylaws'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//bylaws
			        $bylaws = $request->file('bylaws');
			        $by_laws = str_random(15) . '.' . $bylaws->getClientOriginalExtension();
			        $bylaws->move(public_path('accreditation_file'), $by_laws);

			        $data = array_merge($data, ['bylaws' => $by_laws]);
		        }

		        // prog_and_proj
		        if($request->has('prog_and_proj'))
		        {
		        	$rules = array(
		      	 		'prog_and_proj'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//prog_and_proj
			        $prog_and_proj = $request->file('prog_and_proj');
			        $program_and_project = str_random(15) . '.' . $prog_and_proj->getClientOriginalExtension();
			        $prog_and_proj->move(public_path('accreditation_file'), $program_and_project);

			        $data = array_merge($data, ['program_and_project' => $program_and_project]);
		        }

		        // logo
		        if($request->has('logo'))
		        {
		        	$rules = array(
		      	 		'logo'	=> 'required|image',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//logo
			        $logo = $request->file('logo');
			        $logos = str_random(15) . '.' . $logo->getClientOriginalExtension();
			        $logo->move(public_path('accreditation_file'), $logos);

			        $data = array_merge($data, ['logo' => $logos]);
		        }

		        Tbl_accreditation::where('user_id', auth()->id())->update($data);
		        $text = ['accreditation' => auth()->user()->first_name.' '.auth()->user()->last_name.' updated data in accreditation.'];
		        event(new NotificationEvent($text));

				return response()->json(['success' => 'Updated']);
			}
    	}
    	else
    	{
    		return response()->json(['errors' => 'Access Denied.']);
    	}
    }

    public function renewal_update(Request $request)
    {
    	if(auth()->id())
    	{
    		
    	
			
				$rules = array(
	      	 	'number_of_members'			=> 'required|numeric',	
		        );

		        $error = Validator::make($request->all(), $rules);

		        if($error->fails())
		        {
		            return response()->json(['errors' => $error->errors()->all()]);
		        }

		        $data = array(

		            'member'					=> $request->number_of_members,
		            'status'					=> 3
		            
		        );
		        
		       

		        // organizational_structure
		        if($request->has('organizational_structure'))
		        {
		        	$rules = array(
		      	 		'organizational_structure'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//organizational_structure
			        $organizational_structure = $request->file('organizational_structure');
			        $orgstructure = str_random(15) . '.' . $organizational_structure->getClientOriginalExtension();
			        $organizational_structure->move(public_path('accreditation_file'), $orgstructure);

			        $data = array_merge($data, ['organizational_structure' => $orgstructure]);
		        }

		        // roster_of_members
		        if($request->has('roster_of_members'))
		        {
		        	$rules = array(
		      	 		'roster_of_members'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//roster_of_members
			        $roster_of_members = $request->file('roster_of_members');
			        $rostermember = str_random(15) . '.' . $roster_of_members->getClientOriginalExtension();
			        $roster_of_members->move(public_path('accreditation_file'), $rostermember);

			        $data = array_merge($data, ['roster_of_member' => $rostermember]);
		        }

		        // organizational_profile
		        if($request->has('organizational_profile'))
		        {
		        	$rules = array(
		      	 		'organizational_profile'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//organizational_profile
			        $organizational_profile = $request->file('organizational_profile');
			        $orgprofile = str_random(15) . '.' . $organizational_profile->getClientOriginalExtension();
			        $organizational_profile->move(public_path('accreditation_file'), $orgprofile);

			        $data = array_merge($data, ['organizational_profile' => $orgprofile]);
		        }

		        

		        // prog_and_proj
		        if($request->has('prog_and_proj'))
		        {
		        	$rules = array(
		      	 		'prog_and_proj'	=> 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//prog_and_proj
			        $prog_and_proj = $request->file('prog_and_proj');
			        $program_and_project = str_random(15) . '.' . $prog_and_proj->getClientOriginalExtension();
			        $prog_and_proj->move(public_path('accreditation_file'), $program_and_project);

			        $data = array_merge($data, ['program_and_project' => $program_and_project]);
		        }

		        // logo
		        if($request->has('logo'))
		        {
		        	$rules = array(
		      	 		'logo'	=> 'required|image',
			        );

			        $error = Validator::make($request->all(), $rules);

			        if($error->fails())
			        {
			            return response()->json(['errors' => $error->errors()->all()]);
			        }
		        	//logo
			        $logo = $request->file('logo');
			        $logos = str_random(15) . '.' . $logo->getClientOriginalExtension();
			        $logo->move(public_path('accreditation_file'), $logos);

			        $data = array_merge($data, ['logo' => $logos]);
		        }

		        Tbl_accreditation::where('user_id', auth()->id())->update($data);
		        $text = ['accreditation' => auth()->user()->first_name.' '.auth()->user()->last_name.' renewal application for accreditation.'];
		        event(new NotificationEvent($text));

				return response()->json(['success' => 'Updated']);
			
    	}
    	else
    	{
    		return response()->json(['errors' => 'Access Denied.']);
    	}
    }
    public function removeremark_accreditation(Request $request)
    {
        if($request->ajax())
        {
            Tbl_accreditation::where('user_id', auth()->id())->update(['remarks' => null]);
            return response()->json(['success' => '']);
        }
        else
        {
            abort(404);
        }
        
    }

    public function addrequest(Request $request)
    {
    	if($request->message_request != '')
    	{
    		$check_if_accredited = Tbl_accreditation::where('user_id', auth()->id())
    		->where('status', 1)->get();

    		if(count($check_if_accredited))
    		{
    			$data =array(
	    		'user_id' =>auth()->id(),
	    		'message' =>$request->message_request,
		    	);
		    	Tbl_accreditation_request::create($data);

		    	$text = ['accreditation' => auth()->user()->first_name.' '.auth()->user()->last_name.' sent request related to organization.'];
		        event(new NotificationEvent($text));

		    	return response()->json(['success' => 'Request sent.']);
    		}
    		else
    		{
    			return response()->json(['error' => 'Not accredited.']);
    		}
    		
    	}
    	else
    	{
    		return response()->json(['error' => 'No request message.']);
    	}

	    	

    }

    public function viewdetail(Request $request, $id)
    {
    	if($request->ajax())
    	{
    		$acc_request = Tbl_accreditation_request::where('id', $id)->get();
    		return view('userpage.modals.accreditation_detail', compact('acc_request'));
    	}
    	else
    	{
    		abort(404);
    	}
    }

    public function addorganizationmember(Request $request)
    {
    	$check_if_accredited = Tbl_accreditation::where('user_id', auth()->id())
    		->where('status', 1)->get();


    	if(count($check_if_accredited))
		{
			$rules = array(
	      	'fullname'		=> 'required',
	      	'contact'		=> 'required|numeric',
	      	'position'		=> 'required',	
	        );

	        $error = Validator::make($request->all(), $rules);

	        if($error->fails())
	        {
	            return response()->json(['error' => $error->errors()->all()]);
	        }

	        foreach ($check_if_accredited as $value) {
    		
    		}

	        $data =array(
	    		'fullname' 		=> $request->fullname,
	    		'contact' 		=> $request->contact,
	    		'position' 		=> $request->position,
	    		'tbl_accreditation_id'	=> $value->id,
		    );

		    Tbl_organization_member::create($data);

		    return response()->json(['success' => 'Added new member.']);

		}
		else
		{
			return response()->json(['error' => 'Not accredited.']);
		}

    }

    public function removemember(Request $request, $id)
    {
    	if($request->ajax())
    	{
    		$check_id_member = Tbl_organization_member::where('id', $id)->value('tbl_accreditation_id');
    		if($check_id_member)
    		{
    			$check_own = Tbl_accreditation::where('id', $check_id_member)->where('user_id', auth()->id())->get();

    			if(count($check_own))
    			{
    				Tbl_organization_member::where('id', $id)->delete();
    				return response()->json(['success' => 'Deleted member.']);
    			}
    			else
    			{
    				return response()->json(['error' => 'Not member in you organization.']);
    			}
    			
    		}
    		else
    		{
    			return response()->json(['error' => 'Not existing.']);
    		}

    		
		}
		else
    	{
    		abort(404);
    	}
    }
}
