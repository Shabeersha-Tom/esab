<?php

namespace App\Classes;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Container;
use CyrildeWit\EloquentViewable\Contracts\View as ViewContract;
use Illuminate\Http\Request;

class ElViews extends \CyrildeWit\EloquentViewable\Views
{
    protected $viewer;


    /**
     * @return ViewContract|mixed|void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function record(): bool
    {
        if (!$this->shouldRecord()) {
            return false;
        }

        $view = Container::getInstance()->make(ViewContract::class);
        $view->viewable_id = $this->viewable->getKey();
        $view->viewable_type = $this->viewable->getMorphClass();
        $view->visitor = $this->visitor->id();
        $view->ip_address = $this->visitor->ip();
        $view->collection = $this->collection;
        $view->viewed_at = Carbon::now();
        $view->save();

        return $view->exists;
    }
}
