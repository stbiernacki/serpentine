<?php

declare(strict_types=1);

namespace App\Domain\Category\Events;

use App\Domain\Category\Entities\Category;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CategoryDataCreatedSend
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Category $category,
    ) {
    }
}
