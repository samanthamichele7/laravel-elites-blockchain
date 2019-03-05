<?php

use App\Answer;
use App\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        collect([
            'How many times per day do you mention Vue.js in casual conversation to strangers?' => [
                '0',
                '1-5',
                '6-19',
                '20+',
            ],
            'Do you host at least one Laravel-related podcast?' => [
                'Yes',
                'No'
            ],
            'How much do you love facades?' => [
                'What is a facade?',
                'Bro do u even dependency injection',
                'I use them when it is appropriate',
                'I wish facades could inject into my dependency, if you know what I mean'
            ],
            'Where is your tattoo of Taylor Otwell located?' => [
                'Above my heart',
                'Somewhere publicly visible, like my bicep or face',
                'Somewhere nobody can see it but me...',
                'I have not gotten my tattoo of Taylor yet',
                'Taylor has a tattoo of me',
            ],
            'How many packages have you released?' => [
                '0',
                '1-4',
                '4-10',
                'I\'m @freekmurze',
            ],
            'What major version was Laravel in when you started using it?' => [
                '1',
                '2',
                '3',
                '4',
                '5',
                'I wrote Laravel',
            ],
            'Are you Taylor Otwell?' => [
                'Yes',
                'No',
            ],
        ])->each(function ($answers, $question) {
            $question = Question::create(['text' => $question]);

            collect($answers)->each(function ($answer) use ($question) {
                Answer::create([
                    'text' => $answer,
                    'question_id' => $question->id,
                ]);
            });
        });
    }
}
