<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #e91e63, #c2185b);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin: -20px -20px 20px -20px;
            text-align: center;
        }
        .field {
            margin-bottom: 15px;
            padding: 10px;
            background: #fce4ec;
            border-left: 4px solid #e91e63;
        }
        .field strong {
            display: block;
            color: #e91e63;
            margin-bottom: 5px;
        }
        .footer {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏥 New Contact Form Submission</h1>
            <p>DataRatiba</p>
            <?php if (isset($enquiry_id)): ?>
                <p><strong>Enquiry ID: #<?php echo h($enquiry_id) ?></strong></p>
            <?php endif; ?>
        </div>
        
        <p>You have received a new inquiry through the DataRatiba contact form:</p>
        
        <div class="field">
            <strong>Name:</strong>
            <?php echo h($name) ?>
        </div>
        
        <div class="field">
            <strong>Work Email:</strong>
            <a href="mailto:<?php echo h($work_email) ?>"><?php echo h($work_email) ?></a>
        </div>
        
        <div class="field">
            <strong>Message/Description:</strong>
            <?php echo nl2br(h($description)) ?>
        </div>
        
        <div class="footer">
            <p>This email was sent from the DataRatiba contact form.</p>
            <p>Submitted on: <?php echo date('F j, Y \a\t g:i A T') ?></p>
        </div>
    </div>
</body>
</html>