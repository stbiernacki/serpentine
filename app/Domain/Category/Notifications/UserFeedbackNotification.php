<?php

declare(strict_types=1);

namespace App\Domain\Category\Notifications;

use App\Domain\Category\Entities\Category;
use Illuminate\Notifications\Notification;

class UserFeedbackNotification  extends Notification
{
    public function __construct(protected Category $category)
    {
    }

    public function via(): array
    {
        return ['mail'];
    }

     public function toMail(): void {
        // ...
     }

}
