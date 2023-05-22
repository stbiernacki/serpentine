<?php

declare(strict_types=1);

namespace App\Domain\Category\Listeners;

use App\Domain\Category\Events\CategoryDataCreatedSend;
use App\Domain\Category\Notifications\UserFeedbackNotification;

class SendUserFeedbackNotification
{
    public function handle(CategoryDataCreatedSend $event): void
    {
        $category = $event->category;
        $category->notify(new UserFeedbackNotification($category));
    }
}
