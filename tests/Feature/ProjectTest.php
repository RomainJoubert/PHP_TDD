<?php
/**
 * Created by PhpStorm.
 * User: romain.joubert
 * Date: 16/05/2018
 * Time: 15:24
 */

namespace Tests\Feature;


use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function testStatus()
    {
    $reponse = $this->get('/project');
    $reponse->assertStatus(200);
    }
}