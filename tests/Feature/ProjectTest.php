<?php
/**
 * Created by PhpStorm.
 * User: romain.joubert
 * Date: 16/05/2018
 * Time: 15:24
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

use Tests\TestCase;
use App\Projet;
use App\User;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function testStatus()
    {
        //Etant donné qu'une route est bien associée à sa vue
        //Lorsqu'on affiche la page
        $reponse = $this->get('/project');
        //Alors comme elle s'affiche sans erreur alors on a une réponse status  validée
        $reponse->assertStatus(200);
    }

    public function testTitre()
    {
        //Etant donné qu'une route est bien associée à sa vue
        //Lorsque affiche la page
        $reponse = $this->get('/project');
        //Alors la balise <h1>Liste des projets s'affiche
        $reponse->assertSee("<h1>Liste des projets</h1>");
    }

    public function testTitleOfAProjectInTheListOfProjects()
    {
        //Etant donné que je crée un projet
        $project = factory(Projet::class)->create();
        //Lorsque j'affiche la page
        $reponse = $this->get('/project');
        //Alors le titre du projet s'affiche bien sur la page
        $reponse->assertSee($project->projectName);
    }

    //test pour vérifier qu'un titre apparait dans le détail d'un projet
    public function testTitleInDetail()
    {
        //Etant donné que je crée un projet
        $project = factory(Projet::class)->create();
        //Lorsque j'affiche le détail d'un projet
        $reponse = $this->get('/project/' . $project->id);
        //Alors le titre du projet s'affiche bien sur la page
        $reponse->assertSee($project->projectName);
    }

    public function testRelation()
    {
        //Etant donné que je crée un projet et un utilisateur
        $project = factory(Projet::class)->create();
        //Lorsque mon projet est créée, je récupère l'id de l'utilisateur
        $actual = $project->user_id;
        //Alors l'id de l'utiisateur est le même que l'user_id dans le projet
        $expected = $project->user->id;
        $this->assertEquals($expected, $actual);

    }

    public function testNameOfAuthorInDetail()
    {
        //Etant donné que je crée un projet et un utilisateur
        $project = factory(Projet::class)->create();
        //Lorsque j'affiche le détail de mon projet
        $reponse = $this->get('/project/' . $project->id);
        //Alors le nom de l'auteur s'affiche sur la page
        $reponse->assertSee($project->user->name);
//        dump($project->user->name);
    }

    public function testConnectedUserCanCreateProject()
    {
        //Etant donné que je crée un utilisateur connecté
        $user = factory(User::class)->create();
        $project = factory(Projet::class)->make();
        $this->actingAs($user)
            ->get('/formulaire_projet')
            ->assertSee($user->name);

        //Lorsque je remplis et valide un formulaire
        $memory = ['projectName' => $project->projectName,
            'descriptive' => $project->descriptive];
        $this->post('/project', $memory);

        //Alors son projet est créée
        $reponse = $this->get('/project');
        $reponse->assertSee($project->projectName);
    }

    public function testUnconnectedUserCantAddProject()
    {
        $this->expectException(AuthenticationException::class);
        $project = ['projectName' => 'Test',
            'descriptive' => 'Encore un test'];
        $this->post('/project', $project);
    }

    public function testUnconnectedUserCantDisplayForm()
    {
        //Etant donné qu'un utilisateur non connecté va sur le site
        //Lorsqu'il essaie de créer un projet, on attend une exception
        $expected = $this->expectException(AuthenticationException::class);
        //Alors il est redirigé sur la page de connexion
        $reponse = $this->get('/formulaire_projet');

    }

    public function testOnlyAuthorCanEditProject()
    {
        //Etant donné qu'un utilisateur connecté va sur un projet
        $project = factory(Projet::class)->create();
        $user = factory(User::class)->create();

        //Lorsqu'il essaie de modifier un projet qui n'est pas le sien
        $this->actingAs($user);
        $reponse = $this->get('/modification/' . $project->id);

        //Alors il a un message d'erreur qui s'affiche
        $reponse->assertSee("Vous n'êtes pas l'auteur du projet, vous ne pouvez pas le modifier");
    }
}