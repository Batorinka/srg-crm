<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Controllers\SAUPG\Admin\BaseController;
use App\Http\Requests\DeviceCreateRequest;
use App\Http\Requests\DeviceNameCreateRequest;
use App\Http\Requests\DeviceNameUpdateRequest;
use App\Models\DeviceName;
use App\Models\DeviceType;
use App\Repositories\DeviceNameRepository;
use App\Repositories\DeviceTypeRepository;
use Illuminate\Http\Request;

class DeviceNameController extends BaseController
{
    /**
     * @var DeviceNameRepository
     */
    private $deviceNameRepository;

    /**
     * @var DeviceNameRepository
     */
    private $deviceTypeRepository;

    public function __construct()
    {
        parent::__construct();

        $this->deviceNameRepository = app(DeviceNameRepository::class);
        $this->deviceTypeRepository = app(DeviceTypeRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->deviceNameRepository->getAllWithPaginate();

        return view('srg.admin.devicenames.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = DeviceName::make();
        $deviceTypes = $this->deviceTypeRepository->getForComboBox();

        return view('srg.admin.devicenames.create',
            compact('item', 'deviceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceNameCreateRequest $request)
    {
        $data = $request->input();
        $item = DeviceName::create($data);

        if ($item) {
            return redirect()->route('srg.admin.devicenames.edit', [$item->id])
                ->with(['success' => 'Успешно сохраненено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeviceName  $deviceName
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->deviceNameRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $deviceTypes = $this->deviceTypeRepository->getForComboBox();

        return view('srg.admin.devicenames.edit',
            compact('item', 'deviceTypes'));
    }


        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeviceName  $deviceName
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceNameUpdateRequest $request, $id)
    {
        $item = $this->deviceNameRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.devicenames.edit', $item->id)
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
     * @param  \App\Models\DeviceName  $deviceName
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->deviceNameRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $result = DeviceName::destroy($item->id);

        if ($result) {
            return redirect()
                ->route('srg.admin.devicenames.index')
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $id]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }


    public function restore($id)
    {
        $item = $this->deviceNameRepository->getTreashedDeviceName($id);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
