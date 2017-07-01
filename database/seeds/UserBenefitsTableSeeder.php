<?php

use Illuminate\Database\Seeder;

class UserBenefitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Fetch the Benefit ids
        $benefit_ids = App\Models\Benefit::all('beneficio_id')->pluck('beneficio_id')->toArray();

        // Create random users
        factory(App\Models\User::class, 30)->create()->each(function ($user) use ($benefit_ids) {

            // Example: Many-to-many relations
            $this->attachRandomBenefitsToUser($user->usuario_id, $benefit_ids);

            // Example: Many-to-one relations
            // $this->createNotesForUserId( $user->id );
        });

        // Make sure you have a user to login with (your own email, name and password)
        // $this->updateCredentialsForTestLogin('john@doe.com', 'John Doe', 'my-password');
    }

    /**
     * @param $user_id
     * @param $benefit_ids
     * @return void
     */
    private function attachRandomBenefitsToUser($usuario_id, $benefit_ids)
    {
        $amount = 5; // The amount of Benefits for this user
        echo "Agregando " . $amount . " beneficios para el usuario " . $usuario_id . "\n";

        if($amount > 0) {
            $keys = (array)array_rand($benefit_ids, $amount); // Random Benefits

            foreach($keys as $key) {
                DB::table('user_benefits')->insert([
                    'usuario_id' => $usuario_id,
                    'beneficio_id' => $benefit_ids[$key],
                ]);
            }
        }
    }
}