<?php

namespace App\Observers;

use App\Models\MainContract;

class MainContractObserver
{
    /**
     * @param  MainContract  $mainContract
     */
    public function creating(MainContract $mainContract)
    {
        $this->setSlug($mainContract);
        $mainContract->user_id = auth()->id();
    }

    /**
     * Handle the main contract "created" event.
     *
     * @param  \App\Models\MainContract  $mainContract
     * @return void
     */
    public function created(MainContract $mainContract)
    {
        //
    }

    /**
     * @param  MainContract  $mainContract
     */
    public function updating(MainContract $mainContract)
    {
        $this->setSlug($mainContract);
    }

    /**
     * Handle the main contract "updated" event.
     *
     * @param  \App\Models\MainContract  $mainContract
     * @return void
     */
    public function updated(MainContract $mainContract)
    {
        //
    }

    /**
     * Handle the main contract "deleted" event.
     *
     * @param  \App\Models\MainContract  $mainContract
     * @return void
     */
    public function deleted(MainContract $mainContract)
    {
        //
    }

    /**
     * Handle the main contract "restored" event.
     *
     * @param  \App\Models\MainContract  $mainContract
     * @return void
     */
    public function restored(MainContract $mainContract)
    {
        //
    }

    /**
     * Handle the main contract "force deleted" event.
     *
     * @param  \App\Models\MainContract  $mainContract
     * @return void
     */
    public function forceDeleted(MainContract $mainContract)
    {
        //
    }

    /**
     * Если поле слаг пустое, то заполняем его конвертацией заголовка.
     *
     * @param  MainContract  $mainContract
     */
    protected function setSlug(MainContract $mainContract)
    {
        if (empty($mainContract->slug)) {
            $mainContract->slug = \Str::slug($mainContract->company_sub_name);
        }
    }
}
