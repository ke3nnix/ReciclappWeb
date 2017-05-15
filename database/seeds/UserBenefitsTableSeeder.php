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
        $benefit_ids = App\Models\Benefit::all('id')->pluck('id')->toArray();

        // Create random users
        factory(App\Models\User::class, 30)->create()->each(function ($user) use ($benefit_ids) {

            // Example: Many-to-many relations
            $this->attachRandomBenefitsToUser($user->id, $benefit_ids);

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
    private function attachRandomBenefitsToUser($user_id, $benefit_ids)
    {
        $amount = 5; // The amount of Benefits for this user
        echo "Agregando " . $amount . " beneficios para el usuario " . $user_id . "\n";

        if($amount > 0) {
            $keys = (array)array_rand($benefit_ids, $amount); // Random Benefits

            foreach($keys as $key) {
                DB::table('user_benefits')->insert([
                    'colaborador_id' => $user_id,
                    'beneficio_id' => $benefit_ids[$key],
                ]);
            }
        }
    }

    /**
     * @param $user_id
     * @return void
     */
    // private function createNotesForUserId($user_id)
    // {
    //     $amount = random_int(10, 50);
    //     factory(App\Note::class, $amount)->create([
    //         'user_id' => $user_id
    //     ]);
    // }

    /**
     * @param $email
     * @param $name
     * @param $password
     * @return void
     */
    // private function updateCredentialsForTestLogin($email, $name, $password)
    // {
    //     $user = App\Models\User::where('email', $email)->first();
    //     if(!$user) {
    //         $user = App\Models\User::find(1);
    //     }
    //     $user->name = $name;
    //     $user->email = $email;
    //     $user->password = bcrypt($password); // Or whatever you use for password encryption
    //     $user->save();
    // }
}