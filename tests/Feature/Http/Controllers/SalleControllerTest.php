<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cinema;
use App\Models\Salle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SalleController
 */
class SalleControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $salles = Salle::factory()->count(3)->create();

        $response = $this->get(route('salle.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SalleController::class,
            'store',
            \App\Http\Requests\SalleStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $cinema = Cinema::factory()->create();

        $response = $this->post(route('salle.store'), [
            'cinema_id' => $cinema->id,
        ]);

        $salles = Salle::query()
            ->where('cinema_id', $cinema->id)
            ->get();
        $this->assertCount(1, $salles);
        $salle = $salles->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $salle = Salle::factory()->create();

        $response = $this->get(route('salle.show', $salle));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SalleController::class,
            'update',
            \App\Http\Requests\SalleUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $salle = Salle::factory()->create();
        $cinema = Cinema::factory()->create();

        $response = $this->put(route('salle.update', $salle), [
            'cinema_id' => $cinema->id,
        ]);

        $salle->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($cinema->id, $salle->cinema_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $salle = Salle::factory()->create();

        $response = $this->delete(route('salle.destroy', $salle));

        $response->assertNoContent();

        $this->assertModelMissing($salle);
    }
}
