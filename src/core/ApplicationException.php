<?php
namespace core;

class ApplicationException extends \Exception
{

    private $messageId;

    private $type;

    public function __construct(string $messageId)
    {
        $messages = $_SESSION['MESSAGE'][$messageId];
        $this->messageId = $messageId;
        $this->code = $messages['code'];
        $this->type = $messages['type'];
        $this->message = $messages['message'];
    }

    public function getMessageId(): string
    {
        return $this->messageId;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type)
    {
        $this->type = $type;
    }

}

