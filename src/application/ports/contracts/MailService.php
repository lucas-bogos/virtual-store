<?php

declare(strict_types=1);

namespace source\application\ports\contracts;

interface MailService {
    public function sendMail(
        string $from,
        string $to,
        string $subject,
        string $bodyContent,
        null|bool $isHTML = true,
        null|string $reply = 'no-reply@virtual-store.com.br',
        null|string $alternativeBody = null,
        null|array $attachments = null
    ): bool|null|string;
}
