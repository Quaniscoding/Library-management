<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=MonHoc>
 */
class MonHocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ten_mon' => $this->faker->randomElement([
                'Quản trị kinh doanh',
                'Marketing',
                'Kế toán',
                'Công nghệ thông tin',
                'Ngôn ngữ Anh',
                'Du lịch',
                'Luật kinh tế'
            ]),
            'nganh_id' => \App\Models\Nganh::inRandomOrder()->first()->id ?? null,
        ];
    }
}
