<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=CuonSach>
 */
class CuonSachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $sachIds = null;

        if ($sachIds === null) {
            $sachIds = \App\Models\Sach::pluck('id')->shuffle();
        }

        $sachId = $sachIds->pop(); // Lấy và xóa phần tử cuối cùng để đảm bảo không trùng

        return [
            'sach_id' => $sachId ?? null,
            'vi_tri_sach_id' => \App\Models\ViTriSach::inRandomOrder()->first()->id ?? null,
            'tinh_trang' => $this->faker->randomElement(['Con', 'Muon', 'Bao_Tri', 'Mat']),
        ];
    }
}
