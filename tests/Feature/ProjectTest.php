<?php
/**
 * Created by PhpStorm.
 * User: romain.joubert
 * Date: 16/05/2018
 * Time: 15:24
 */

namespace Tests\Feature;


use Faker\Factory;
use phpDocumentor\Reflection\ProjectFactory;
use Tests\TestCase;
use App\Projet;

class ProjectTest extends TestCase
{
    public function testStatus()
    {
    $reponse = $this->get('/project');
    $reponse->assertStatus(200);
    }

    public function testTitre()
    {
        $reponse = $this ->get('/project');
        $reponse->assertSee("<h1>Liste des projets</h1>" );
    }

    public function testListOfProjects()
    {
        $project = factory(Projet::class)->create();
        $reponse = $this->get('/project');
        $reponse->assertSee($project->projectName);
//        $this->assertDatabaseHas('projets', ['projectName'=>'Naomi Huel PhD']);
    }
}