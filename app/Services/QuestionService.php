<?php

namespace App\Services;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionService
{
    private const ATTACHMENT_FIELDS = [
        'tip_attachment',
        'statement_attachment1',
        'statement_attachment2',
        'statement_attachment3',
        'option_a_attachment',
        'option_b_attachment',
        'option_c_attachment',
        'option_d_attachment',
        'option_e_attachment',
    ];

    public function create(array $data, Request $request): Question
    {
        return Question::create($this->mergeUploadedAttachments($data, $request));
    }

    public function update(Question $question, array $data, Request $request): Question
    {
        $question->update($this->mergeUploadedAttachments($data, $request));

        return $question;
    }

    private function mergeUploadedAttachments(array $data, Request $request): array
    {
        foreach (self::ATTACHMENT_FIELDS as $field) {
            if ($request->hasFile($field) && $request->file($field)->isValid()) {
                $data[$field] = $request->file($field)->store('questions/attachments', 'public');
            }
        }

        return $data;
    }
}
