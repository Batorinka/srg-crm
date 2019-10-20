<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Requests\EquipmentNameCreateRequest;
use App\Http\Requests\EquipmentNameUpdateRequest;
use App\Models\EquipmentName;
use App\Repositories\EquipmentNameRepository;

class EquipmentNameController extends BaseController
{
    /**
     * @var EquipmentNameRepository
     */
    private $equipmentNameRepository;

    public function __construct()
    {
        parent::__construct();

        $this->equipmentNameRepository = app(EquipmentNameRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->equipmentNameRepository->getAllWithPaginate();

        return view('srg.admin.equipmentnames.index',
            compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = EquipmentName::make();

        return view('srg.admin.equipmentnames.create',
            compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentNameCreateRequest $request)
    {
        $data = $request->input();
        $item = EquipmentName::create($data);

        if ($item) {
            return redirect()->route('srg.admin.equipmentnames.edit', [$item->id])
                ->with(['success' => 'Успешно сохраненено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipmentName  $equipmentName
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->equipmentNameRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        return view('srg.admin.equipmentnames.edit',
            compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipmentName  $equipmentName
     * @return \Illuminate\Http\Response
     */
    public function update(EquipmentNameUpdateRequest $request, $id)
    {
        $item = $this->equipmentNameRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.equipmentnames.edit', $item->id)
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
     * @param  \App\Models\EquipmentName  $equipmentName
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->equipmentNameRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $result = EquipmentName::destroy($item->id);

        if ($result) {
            return redirect()
                ->route('srg.admin.equipmentnames.index')
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $id]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }


    public function restore($id)
    {
        $item = $this->equipmentNameRepository->getTreashedEquipmeneName($id);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
