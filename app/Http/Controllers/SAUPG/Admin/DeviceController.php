<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Controllers\SAUPG\Admin\BaseController;
use App\Http\Requests\DeviceCreateRequest;
use App\Http\Requests\DeviceUpdateRequest;
use App\Models\Device;
use App\Repositories\DeviceNameRepository;
use App\Repositories\GsobjectRepository;
use App\Repositories\DeviceRepository;
use Illuminate\Http\Request;

class DeviceController extends BaseController
{
    /**
     * @var GsobjectRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $gsobjectRepository;
    /**
     * @var deviceRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $deviceRepository;

    /**
     * @var deviceNameRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $deviceNameRepository;

    /**
     * deviceController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->deviceRepository     = app(DeviceRepository::class);
        $this->deviceNameRepository = app(DeviceNameRepository::class);
        $this->gsobjectRepository   = app(GsobjectRepository::class);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $item = Device::make();

        $device_names = $this->deviceNameRepository->getForComboBox();

        $gsobject = $this->gsobjectRepository->getEdit($slug);

        return view('srg.admin.devices.edit',
            compact('item',
                'gsobject',
                'device_names'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceCreateRequest $request)
    {
        $data = $request->input();
        $item = Device::create($data);
        $gsobject = $this->gsobjectRepository->getOneById($item->gsobject_id);

        if ($item) {
            return redirect()
                ->route('srg.admin.gsobjects.show', [$gsobject->slug])
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
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->deviceRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $device_names = $this->deviceNameRepository->getForComboBox();

        $gsobject   = $this->gsobjectRepository->getOneById($item->gsobject_id);

        return view('srg.admin.devices.edit',
            compact('item',
                'gsobject',
                'device_names'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(DeviceUpdateRequest $request, $id)
    {
        $item = $this->deviceRepository->getEdit($id);
        $gsobject = $this->gsobjectRepository->getOneById($item->gsobject_id);

        if (empty($item)) {
            return back()
                ->withErrors(["msg" => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.show', [$gsobject->slug])
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
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->deviceRepository->getEdit($id);
        $gsobject = $this->gsobjectRepository->getOneById($item->gsobject_id);

        if (empty($item)) {
            abort(404);
        }

        $result = Device::destroy($item->id);

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.show', $gsobject->slug)
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $id, 'title' => 'device']);
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
        $item = $this->deviceRepository->getTreashedDevice($id);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
