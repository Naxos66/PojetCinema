<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Friandise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FriandiseController
 */
class FriandiseControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $friandises = Friandise::factory()->count(3)->create();

        $response = $this->get(route('friandise.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FriandiseController::class,
            'store',
            \App\Http\Requests\FriandiseStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $response = $this->post(route('friandise.store'));

        $response->assertCreated();
        $response->assertJsonStructure([]);

        $this->assertDatabaseHas(friandises, [ /* ... */ ]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $friandise = Friandise::factory()->create();

        $response = $this->get(route('friandise.show', $friandise));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FriandiseController::class,
            'update',
            \App\Http\Requests\FriandiseUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $friandise = Friandise::factory()->create();

        $response = $this->put(route('friandise.update', $friandise));

        $friandise->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $friandise = Friandise::factory()->create();

        $response = $this->delete(route('friandise.destroy', $friandise));

        $response->assertNoContent();

        $this->assertModelMissing($friandise);
    }
}
