<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'department_id' => rand(1,2),
            'designation_id' => rand(2,3),
            'photo' => 'https://source.unsplash.com/random',
            'address' => $this->faker->address,
            'mobile' => $this->faker->phoneNumber,
        ];
    }
}
