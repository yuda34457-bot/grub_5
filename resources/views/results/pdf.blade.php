<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Eye Test Result - VisionMe</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; line-height: 1.6; }
        .header { text-align: center; border-bottom: 2px solid #185FA5; padding-bottom: 20px; margin-bottom: 30px; }
        .logo { font-size: 28px; font-weight: bold; color: #185FA5; }
        .title { font-size: 22px; font-weight: bold; margin-top: 10px; text-transform: capitalize; }
        .details-table { width: 100%; margin-bottom: 30px; }
        .details-table th { text-align: left; padding: 8px; background: #f9f9f9; width: 30%; border: 1px solid #ddd; }
        .details-table td { padding: 8px; border: 1px solid #ddd; }
        .score-box { background: #eef6ff; padding: 20px; border: 1px solid #cce0ff; text-align: center; width: 45%; display: inline-block; box-sizing: border-box; }
        .score-box h3 { color: #0d3d73; margin-top: 0; font-size: 14px; text-transform: uppercase; }
        .score-box p { font-size: 32px; font-weight: bold; color: #185FA5; margin: 0; }
        .scores-container { text-align: center; margin-bottom: 30px; }
        .section { margin-bottom: 25px; }
        .section h3 { border-bottom: 1px solid #eee; padding-bottom: 5px; color: #444; }
        .footer { text-align: center; margin-top: 50px; font-size: 12px; color: #888; border-top: 1px solid #eee; padding-top: 20px; }
    </style>
</head>
<body>

    <div class="header">
        <div class="logo">VisionMe</div>
        <div class="title">{{ str_replace('_', ' ', $result->eyeTest->type) }} Test Result</div>
        <p style="margin: 0; color: #666;">Generated on {{ \Carbon\Carbon::now()->format('F d, Y \a\t H:i') }}</p>
    </div>

    <table class="details-table" cellspacing="0">
        <tr>
            <th>Patient Name</th>
            <td>{{ $result->user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $result->user->email }}</td>
        </tr>
        <tr>
            <th>Test Date</th>
            <td>{{ $result->created_at->format('F d, Y') }}</td>
        </tr>
        <tr>
            <th>Reference ID</th>
            <td>VM-{{ str_pad($result->id, 6, '0', STR_PAD_LEFT) }}</td>
        </tr>
    </table>

    <div class="scores-container">
        <div class="score-box" style="margin-right: 2%;">
            <h3>Left Eye (OS) Score</h3>
            <p>{{ $result->left_eye_score ?? 'N/A' }}</p>
        </div>
        <div class="score-box" style="margin-left: 2%;">
            <h3>Right Eye (OD) Score</h3>
            <p>{{ $result->right_eye_score ?? 'N/A' }}</p>
        </div>
    </div>

    <div class="section">
        <h3>Clinical Diagnosis</h3>
        <p>{{ $result->diagnosis }}</p>
    </div>

    <div class="section">
        <h3>Optometrist Recommendation</h3>
        <p>{{ $result->recommendation }}</p>
    </div>

    <div class="footer">
        This is an officially generated document by VisionMe.<br>
        For consultation and more info, visit visionme.id.
    </div>

</body>
</html>
