<?php

declare(strict_types=1);

namespace source\adapter\mail;

use source\application\ports\contracts\MailService;

class Mail 
{
    public function __construct(
        public MailService $service
    ) {}

    public function send(
        string $from,
        string $to,
        string $subject,
        string $bodyContent,
        bool $isHTML = true,
        string $reply = 'no-reply@virtual-store.com.br',
        null|string $alternativeBody = null,
        null|array $attachments = null
    )
    {
        return $this->service->sendMail(
            $from,
            $to,
            $subject,
            $bodyContent,
            $isHTML,
            $reply,
            $alternativeBody,
            $attachments
        );
    }

    public static function factory(MailService $service): self
    {
        return new Mail($service);
    }
}
