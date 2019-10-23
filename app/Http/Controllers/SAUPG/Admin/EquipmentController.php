<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Requests\EquipmentCreateRequest;
use App\Http\Requests\EquipmentUpdateRequest;
use App\Models\Equipment;
use App\Repositories\EquipmentNameRepository;
use App\Repositories\EquipmentRepository;
use App\Repositories\GsobjectRepository;
use Illuminate\Http\Request;

class EquipmentController extends BaseController
{
    /**
     * @var gsobjectRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $gsobjectRepository;
    /**
     * @var equipmentRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $equipmentRepository;

    /**
     * @var equipmentNameRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $equipmentNameRepository;

    /**
     * equipmentController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->equipmentRepository      = app(EquipmentRepository::class);
        $this->equipmentNameRepository  = app(EquipmentNameRepository::class);
        $this->gsobjectRepository       = app(GsobjectRepository::class);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $item = Equipment::make();

        $equipment_names = $this->equipmentNameRepository->getForComboBox();

        $gsobject = $this->gsobjectRepository->getEdit($slug);

        return view('srg.admin.equipments.edit',
            compact('item',
                'gsobject',
                'equipment_names'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentCreateRequest $request)
    {
        $data = $request->input();
        $item = Equipment::create($data);

        if ($item) {
            return redirect()
                ->route('srg.admin.equipments.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->equipmentRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $equipment_names = $this->equipmentNameRepository->getForComboBox();

        $gsobject   = $this->gsobjectRepository->getOneById($item->gsobject_id);

        return view('srg.admin.equipments.edit',
            compact('item',
                'gsobject',
                'equipment_names'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentUpdateRequest $request, $id)
    {
        $item = $this->equipmentRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(["msg" => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.equipments.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->equipmentRepository->getEdit($id);
        $gsobject = $this->gsobjectRepository->getOneById($item->gsobject_id);

        if (empty($item)) {
            abort(404);
        }

        $result = Equipment::destroy($item->id);

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.show', $gsobject->slug)
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $id, 'title' => 'equipment']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $item = $this->equipmentRepository->getTreashedEquipment($id);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
