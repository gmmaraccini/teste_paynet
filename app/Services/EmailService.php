<?php
/// app/Services/EmailService.php
namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailService
{
    public function sendEmail($to, $subject, $body)
    {
        Log::channel('email')->info('Iniciando o envio de email', [
            'to' => $to,
            'subject' => $subject,
            'body' => $body
        ]);

        try {
            Mail::raw($body, function ($message) use ($to, $subject) {
                $message->to($to)
                    ->subject($subject);
            });

            Log::channel('email')->info('Email enviado com sucesso', [
                'to' => $to,
                'subject' => $subject,
                'body' => $body
            ]);
        } catch (\Exception $e) {
            Log::channel('email')->error('Erro ao enviar email', [
                'to' => $to,
                'subject' => $subject,
                'body' => $body,
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString()
            ]);
        }
    }
}
