<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Film;
use App\Models\Salle;
use App\Models\Seance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SeanceController
 */
class SeanceControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $seances = Seance::factory()->count(3)->create();

        $response = $this->get(route('seance.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SeanceController::class,
            'store',
            \App\Http\Requests\SeanceStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $salle = Salle::factory()->create();
        $film = Film::factory()->create();

        $response = $this->post(route('seance.store'), [
            'price' => $price,
            'salle_id' => $salle->id,
            'film_id' => $film->id,
        ]);

        $seances = Seance::query()
            ->where('price', $price)
            ->where('salle_id', $salle->id)
            ->where('film_id', $film->id)
            ->get();
        $this->assertCount(1, $seances);
        $seance = $seances->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $seance = Seance::factory()->create();

        $response = $this->get(route('seance.show', $seance));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SeanceController::class,
            'update',
            \App\Http\Requests\SeanceUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $seance = Seance::factory()->create();
        $price = $this->faker->randomFloat(/** decimal_attributes **/);
        $salle = Salle::factory()->create();
        $film = Film::factory()->create();

        $response = $this->put(route('seance.update', $seance), [
            'price' => $price,
            'salle_id' => $salle->id,
            'film_id' => $film->id,
        ]);

        $seance->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($price, $seance->price);
        $this->assertEquals($salle->id, $seance->salle_id);
        $this->assertEquals($film->id, $seance->film_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $seance = Seance::factory()->create();

        $response = $this->delete(route('seance.destroy', $seance));

        $response->assertNoContent();

        $this->assertModelMissing($seance);
    }
}
