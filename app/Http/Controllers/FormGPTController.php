<?php

namespace App\Http\Controllers;
use App\Models\FormGPT;
use Illuminate\Http\Request;
use OpenAI;

class FormGPTController extends Controller
{


public function index() {

    return view('formAi.formAi');
}


  // Store Form data in database
  public function SaveForm() {
      // Form validation

      $data = request()->validate([
        'message'=>'required',
    ]);

    $aistore = auth()->user()->formAi()->create($data);

    return redirect('/formAI');
  }

  public function showResponse(FormGPT $aistore){

    $prompt = auth()->user()->formAi;
    //$prompt = $aistore->message;

    $apiKeyOpenAi = config('app.openai_api_key');

    $client = OpenAI::client($apiKeyOpenAi);

    $result = $client->completions()->create([
        "model" => "gpt-3.5-turbo-instruct",
        "temperature" => 0.7,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0,
        'max_tokens' => 1000,
        'prompt' => sprintf('Write article about: %s', $prompt),
    ]);

    $gptResponse = trim($result['choices'][0]['text']);

    return view('formAi.formAi', compact('gptResponse'));
  }

}
