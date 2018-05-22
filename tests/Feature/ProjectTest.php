<?php
/**
 * Created by PhpStorm.
 * User: romain.joubert
 * Date: 16/05/2018
 * Time: 15:24
 */

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Faker\Factory;
use phpDocumentor\Reflection\ProjectFactory;
use Tests\TestCase;
use App\Projet;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    public function testStatus()
    {
        $reponse = $this->get('/project');
        $reponse->assertStatus(200);
    }

    public function testTitre()
    {
        $reponse = $this->get('/project');
        $reponse->assertSee("<h1>Liste des projets</h1>");
    }

    public function testListOfProjects()
    {
        $project = factory(Projet::class)->create();
        $reponse = $this->get('/project');
        $reponse->assertSee($project->projectName);
//        $this->assertDatabaseHas('projets', ['projectName'=>'Naomi Huel PhD']);
    }

    public function testTitleOfAProject()
    {
        $project = factory(Projet::class)->create();
//        dd($project);
        $reponse = $this->get('/project');
        $reponse->assertSee($project->projectName);
    }

    //test pour vérifier qu'un titre apparait dans le détail d'un projet
    public function testTitleInDetail()
    {
        $project = factory(Projet::class)->create();
//        dd($project);
        $reponse = $this->get('/project/'.$project->id);
        $reponse->assertSee($project->projectName);
    }

    public function testRelation()
    {
        $project = factory(Projet::class)->create();
        $actual = $project->user_id;
        dump($actual);
        $expected = $project->user->id;
        dump($expected);
        $this->assertEquals($expected, $actual);

    }
}