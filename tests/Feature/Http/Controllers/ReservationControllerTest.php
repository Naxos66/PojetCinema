<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Reservation;
use App\Models\Seance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ReservationController
 */
class ReservationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_behaves_as_expected()
    {
        $reservations = Reservation::factory()->count(3)->create();

        $response = $this->get(route('reservation.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReservationController::class,
            'store',
            \App\Http\Requests\ReservationStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $seance = Seance::factory()->create();
        $user = User::factory()->create();

        $response = $this->post(route('reservation.store'), [
            'seance_id' => $seance->id,
            'user_id' => $user->id,
        ]);

        $reservations = Reservation::query()
            ->where('seance_id', $seance->id)
            ->where('user_id', $user->id)
            ->get();
        $this->assertCount(1, $reservations);
        $reservation = $reservations->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function show_behaves_as_expected()
    {
        $reservation = Reservation::factory()->create();

        $response = $this->get(route('reservation.show', $reservation));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ReservationController::class,
            'update',
            \App\Http\Requests\ReservationUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected()
    {
        $reservation = Reservation::factory()->create();
        $seance = Seance::factory()->create();
        $user = User::factory()->create();

        $response = $this->put(route('reservation.update', $reservation), [
            'seance_id' => $seance->id,
            'user_id' => $user->id,
        ]);

        $reservation->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($seance->id, $reservation->seance_id);
        $this->assertEquals($user->id, $reservation->user_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_responds_with()
    {
        $reservation = Reservation::factory()->create();

        $response = $this->delete(route('reservation.destroy', $reservation));

        $response->assertNoContent();

        $this->assertModelMissing($reservation);
    }
}
