<?php
/**
 * Created by PhpStorm.
 * User: romain.joubert
 * Date: 17/05/2018
 * Time: 16:25
 */

namespace App\Http\Controllers;

use App\Projet;


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
        return view('descriptive', compact('description'));
    }
}