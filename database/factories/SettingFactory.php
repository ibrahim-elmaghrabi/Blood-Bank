<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    protected $model = Setting::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'notification_settings_text' => $this->faker->paragraph(),
            'about_app' => $this->faker->paragraph(),
            'who_we_are' => $this->faker->paragraph(),
            'phone' =>  Str::random(10),
            'email' => $this->faker->email(),
            'fd_link' => $this->faker->url(),
            'insta_link'=> $this->faker->url(),
            'tw_link'=> $this->faker->url(),
            'wta_link'=> $this->faker->url(),
            'yt_link' =>$this->faker->url(),
            'fax'=> $this->faker->url(),
            'app_store_link'=> $this->faker->url(),
            'play_store_link'=> $this->faker->url(),
        ];
    }
}
