<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SkillsController extends Controller
{
	/**
	 * Shows all skills.
	 *
	 * @return Response
	 */
	public function list()
	{
		if (!Auth::check()) return redirect('/');

	  //$this->authorize('list', Genre::class);

			$query = 'SELECT * from skill WHERE isActive = TRUE';
			$skills = DB::select($query);

			return view('admin.skills', ['skills' => $skills]);
		}

	 /**
	 * Creates a new skill.
	 *
	 * @return Skill The skill created.
	 */
	 public function create(Request $request)
	 {

		$query = 'SELECT * FROM skill WHERE name = ?';
		$s = DB::select($query,[$request->input('skill')]);
		if(!empty($s)){
			$skill = Skill::find($s[0]->id);
			$skill->isactive = 'true';
			$skill->save();
			return response($s[0]->id,200);
		}
		else{
			$skill = new Skill();

		//$this->authorize('create', $skill);

			$skill->name = $request->input('skill');
			$skill->creatingadminid = Auth::user()->id;

			$skill->save();
			return response($skill->id,200);
		}
	}

	public function delete(Request $request, $id)
	{
	  $skill = Skill::find($id);

	 // $this->authorize('delete', $skill);
	  
	  $skill->isactive = 'false';

	  $skill->save();

	  return response('',200);
  }

  public function edit(Request $request, $id){
      $skill = Skill::find($id)  ;

      $skill->name = $request->input('name');
      $skill->creatingadminid = Auth::user()->id;
      $skill->isactive = 'true';

      $skill->save();

      return response('',200);
    }

}
