<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EyeTestController extends Controller
{
    public function show($type)
    {
        $validTypes = ['visus', 'color_blind', 'astigmatism'];
        if (!in_array($type, $validTypes)) {
            abort(404);
        }

        // Return a unified view or specific view based on type
        return view('test.show', compact('type'));
    }

    public function submit(Request $request, $type)
    {
        // Store session data so if they login/register later, we can save it.
        $answers = $request->input('answers', []);
        
        session()->put("eye_test_answers_{$type}", $answers);

        if (auth()->check()) {
            return $this->processResult(auth()->user(), $type, $answers);
        }

        return redirect()->route('login')->with('message', 'Please login or register to see your full test result.');
    }

    private function processResult($user, $type, $answers)
    {
        $leftScore = 'N/A';
        $rightScore = 'N/A';
        $diagnosis = 'Normal Vision';
        $recommendation = 'Maintain a healthy lifestyle and routine eye checks.';

        if ($type === 'visus') {
            // answers[1] is Right Eye, answers[2] is Left Eye
            $rightAns = $answers[1] ?? '';
            $leftAns = $answers[2] ?? '';
            
            $extractScore = function($ans) {
                if (str_contains($ans, '20/20')) return '20/20';
                if (str_contains($ans, '20/30')) return '20/30';
                if (str_contains($ans, '20/40')) return '20/40';
                if (str_contains($ans, '20/50')) return '20/50';
                return '> 20/50';
            };

            $rightScore = $extractScore($rightAns);
            $leftScore = $extractScore($leftAns);

            if ($rightScore !== '20/20' || $leftScore !== '20/20') {
                $diagnosis = 'Myopia / Hypermetropia / Presbyopia Indicated';
                $recommendation = 'Please consult with an optometrist for a proper prescription glasses.';
            } else {
                $diagnosis = 'Normal Visual Acuity (Visus)';
                $recommendation = 'Your vision is sharp. Maintain a healthy lifestyle and routine eye checks.';
            }
        } elseif ($type === 'color_blind') {
            // Correct answers: 12, 74, 8
            $correct = 0;
            if (($answers[0] ?? '') === '12') $correct++;
            if (($answers[1] ?? '') === '74') $correct++;
            if (($answers[2] ?? '') === '8') $correct++;

            if ($correct < 3) {
                $diagnosis = 'Color Vision Deficiency Indicated';
                $recommendation = 'You might have color blindness. Please consult with an eye specialist for a detailed test.';
            } else {
                $diagnosis = 'Normal Color Vision';
                $recommendation = 'Your color vision is perfectly normal.';
            }
        } elseif ($type === 'astigmatism') {
            // Correct answers: 'Tidak, semua garis terlihat sama', 'Tidak, terlihat normal sekarang'
            $hasAstigmatism = false;
            if (str_contains($answers[0] ?? '', 'Ya')) $hasAstigmatism = true;
            if (str_contains($answers[1] ?? '', 'Ya')) $hasAstigmatism = true;

            if ($hasAstigmatism) {
                $diagnosis = 'Astigmatism Indicated';
                $recommendation = 'You may have astigmatism causing blurred vision. Please consult for corrective lenses.';
            } else {
                $diagnosis = 'No Astigmatism Detected';
                $recommendation = 'Your cornea seems to have normal curvature.';
            }
        }

        // Create eye test
        $test = \App\Models\EyeTest::create([
            'user_id' => $user->id,
            'type' => $type,
            'status' => 'completed',
            'answers' => json_encode($answers)
        ]);

        // Create test result
        $result = \App\Models\TestResult::create([
            'eye_test_id' => $test->id,
            'user_id' => $user->id,
            'left_eye_score' => $leftScore,
            'right_eye_score' => $rightScore,
            'diagnosis' => $diagnosis,
            'recommendation' => $recommendation
        ]);

        return redirect()->to('/results/' . $result->id)->with('success', 'Test completed successfully.');
    }
}
