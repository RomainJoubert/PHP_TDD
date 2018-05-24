<?php
/**
 * Created by PhpStorm.
 * User: romain.joubert
 * Date: 17/05/2018
 * Time: 16:25
 */

namespace App\Http\Controllers;

use App\Projet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function titleList()
    {
        $listOfTitle = Projet::SELECT('id','projectName')->get();
        return view('/project', ['projets'=>$listOfTitle]);
    }

    public function detailDescriptive($id)
    {
        $description = Projet::find($id);
        $detail = $description->user->find($description->user_id);
        return view('descriptive', compact('description','detail'));
    }

    public function createProject()
    {
        return view('ajout-projet');
    }

    public function storeProject(Request $request)
    {
        $newProject = new Projet();
        $newProject->projectName = $request->projectName;
        $newProject->descriptive = $request->descriptive;
        $newProject->user_id = Auth::user()->id;
        $newProject->save();
        return redirect('/project');
    }
}