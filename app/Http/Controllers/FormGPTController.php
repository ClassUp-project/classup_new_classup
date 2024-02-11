<?php

namespace App\Http\Controllers;
use App\Models\FormGPT;
use Illuminate\Http\Request;
use OpenAI;

class FormGPTController extends Controller
{


public function index(FormGPT $aistore) {

    $aistore = auth()->user()->formAi;

    $apiKeyOpenAi = config('app.openai_api_key');
    $client = OpenAI::client($apiKeyOpenAi);

    $result = $client->completions()->create([
        "model" => "gpt-3.5-turbo-instruct",
        "temperature" => 0.7,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0,
        'max_tokens' => 1000,
        'prompt' => sprintf('Write article about: %s', $aistore),
    ]);

    $content = trim($result['choices'][0]['text']);

    return view('formAi.formAi', compact('aistore', 'content'));
}


  // Store Form data in database
  public function SaveForm() {
      // Form validation

      $data = request()->validate([
        'message'=>'required',
    ]);

    $aistore = auth()->user()->formAi()->create($data);

    return view('formAi.formAi', compact('aistore'));
  }
}
