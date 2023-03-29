<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use OpenAI\Laravel\Facades\OpenAI;

class NameMyPetController extends Controller
{
    public function index() : View
    {
        $result = '';

        if ($animal = request()->input('animal'))
        {
            $data = OpenAI::completions()->create([
                'model' => "text-davinci-003",
                'prompt' => $this->generatePrompt($animal),
            ]);

            Log::info('Data OpenAI : ' , ['data' => $data]);
            $result = $data['choices'][0]['text'];

        }

        return view('namemypet.index', ['result' => $result]);
    }

    public function generatePrompt($animal)
    {
        return <<<EOT
            Suggest three names for an animal that is a superhero.
            Animal: Cat
            Names: Captain Sharpclaw, Agent Fluffball, The Incredible Feline
            Animal: Dog
            Names: Ruff the Protector, Wonder Canine, Sir Barks-a-Lot
            Animal: {}
            Names: strtoupper($animal)
            EOT;
    }

}
