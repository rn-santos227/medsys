<?php

namespace Database\Factories;

use App\Models\Dispenser;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispenserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dispenser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = Dispenser::count();
        return [
            'ref_code' => "D" . str_pad($id, 7, "0", STR_PAD_LEFT),
            'name' => 'Unassigned Dispenser',
            'quantity' => 100,
            'capacity' => 100,
            'critical' => 0,
            'ceiling' => 100,
            'active' => 1
        ];
    }
}
