<?php

namespace App\Mail\Transports;

use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\RawMessage;
use Symfony\Component\Mailer\Envelope;
use GuzzleHttp\Client;

class ZohoApiTransport implements TransportInterface
{
    protected Client $client;
    protected string $token;
    protected string $from;

    public function __construct(Client $client, string $token, string $from)
    {
        $this->client = $client;
        $this->token = $token;
        $this->from = $from;
    }
//use Symfony\Component\Mailer\Envelope;

public function send(RawMessage $message, ?Envelope $envelope = null): ?SentMessage
{
    if ($envelope === null) {
        // Create envelope from the message if not provided
        $envelope = Envelope::create($message);
    }

    $sentMessage = new SentMessage($message, $envelope);

    // Now you can continue your send logic...

    // Example extracting 'to' addresses from the envelope
    $toAddresses = [];
    foreach ($envelope->getRecipients() as $recipient) {
        $toAddresses[] = $recipient->toString();
    }

    // Assuming $message is an Email instance to get subject/content
    if (!method_exists($message, 'getSubject')) {
        throw new TransportException('Message must be an instance of Email');
    }
 
        try {
            $response = $this->client->request('POST', 'https://api.zeptomail.com/v1.1/email', [
                'body' => json_encode([
                    'from' => ['address' => $this->from],
                    'to' => [
                        [
                            'email_address' => [
                                'address' => $message->getTo()[0]->getAddress(),
                                'name' => $message->getTo()[0]->getName() ?: $message->getTo()[0]->getAddress(),
                            ]
                        ]
                    ],
                    'subject' => $message->getSubject(),
                    'htmlbody' => $message->getHtmlBody() ?? $message->getTextBody() ?? '',
                ]),
                'headers' => [
                    'accept' => 'application/json',
                    'authorization' => 'Zoho-enczapikey ' . $this->token,
                    'cache-control' => 'no-cache',
                    'content-type' => 'application/json',
                ],
                'http_errors' => false,
                'timeout' => 30,
                'allow_redirects' => ['max' => 10],
                'version' => 1.1,
            ]);

            /*if ($response->getStatusCode() !== 200) {
                throw new TransportException('Zoho API mail failed: ' . $response->getBody());
            }*/
            try {
                
            //$sentMessage->setSent();
            } catch (\Exception $e) {
                
            }
            return $sentMessage;

        } catch (RequestException $e) {
            throw new TransportException('Zoho API mail error: ' . $e->getMessage(), 0, $e);
        }
         

    /*if ($response->getStatusCode() !== 200) {
        throw new TransportException('Failed to send email via Zoho API.');
    }

    $sentMessage->setSent();

    return $sentMessage;*/
}
 

    public function __toString(): string
    {
        return 'zohoapi';
    }
}
