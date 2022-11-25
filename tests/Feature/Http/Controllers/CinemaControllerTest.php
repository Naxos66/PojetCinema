<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CinemaController
 */
class CinemaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $cinemas = Cinema::factory()->count(3)->create();

        $response = $this->get(route('cinema.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CinemaController::class,
            'store',
            \App\Http\Requests\CinemaStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $response = $this->post(route('cinema.store'));

        $response->assertCreated();
        $response->assertJsonStructure([]);

        $this->assertDatabaseHas(cinemas, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $cinema = Cinema::factory()->create();

        $response = $this->get(route('cinema.show', $cinema));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CinemaController::class,
            'update',
            \App\Http\Requests\CinemaUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $cinema = Cinema::factory()->create();

        $response = $this->put(route('cinema.update', $cinema));

        $cinema->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $cinema = Cinema::factory()->create();

        $response = $this->delete(route('cinema.destroy', $cinema));

        $response->assertNoContent();

        $this->assertModelMissing($cinema);
    }
}
