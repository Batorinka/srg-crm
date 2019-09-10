<?php

namespace App\Observers;

use App\Models\Gsobject;
use App\Repositories\MainContractRepository;

class GsobjectObserver
{
    /**
     * @param  Gsobject  $gsobject
     */
    public function creating(Gsobject $gsobject)
    {
        $this->setSlug($gsobject);
    }

    /**
     * Handle the gsobject "created" event.
     *
     * @param  \App\Models\Gsobject  $gsobject
     * @return void
     */
    public function created(Gsobject $gsobject)
    {
        //
    }

    /**
     * @param  Gsobject  $gsobject
     */
    public function updating(Gsobject $gsobject)
    {
        $this->setSlug($gsobject);
    }

    /**
     * Handle the gsobjects "updated" event.
     *
     * @param  \App\Models\Gsobject  $gsobject
     * @return void
     */
    public function updated(Gsobject $gsobject)
    {
        //
    }

    /**
     * Handle the gsobject "deleted" event.
     *
     * @param  \App\Models\Gsobject  $gsobject
     * @return void
     */
    public function deleted(Gsobject $gsobject)
    {
        //
    }

    /**
     * Handle the gsobject "restored" event.
     *
     * @param  \App\Models\Gsobject  $gsobject
     * @return void
     */
    public function restored(Gsobject $gsobject)
    {
        //
    }

    /**
     * Handle the gsobject "force deleted" event.
     *
     * @param  \App\Models\Gsobject  $gsobject
     * @return void
     */
    public function forceDeleted(Gsobject $gsobject)
    {
        //
    }

    /**
     * Если поле слаг пустое, то заполняем его конвертацией заголовка.
     *
     * @param  Gsobject  $gsobject
     */
    protected function setSlug(Gsobject $gsobject)
    {
        $mainContract = app(MainContractRepository::class);

        $item = $mainContract->getAllById($gsobject->main_contract_id);

        $gsobject->slug = \Str::slug($gsobject->name . ' ' . $item->company_sub_name);
    }
}
