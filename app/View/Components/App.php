<?php

namespace App\View\Components;

use App\Models\Project;
use App\Services\Tailwind;
use Illuminate\View\Component;
use App\Settings\GeneralSettings;
use Illuminate\Database\Eloquent\Collection;

class App extends Component
{
    public string $brandColors;
    public bool $blockRobots = false;

    public function __construct(public array $breadcrumbs = [])
    {
        $this->blockRobots = app(GeneralSettings::class)->block_robots;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tw = new Tailwind('brand', app(GeneralSettings::class)->primary);

        $this->brandColors = $tw->getCssFormat();

        return view('components.app');
    }
}
