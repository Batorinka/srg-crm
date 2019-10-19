<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Controllers\SAUPG\Admin\BaseController;
use App\Http\Requests\GsobjectCreateRequest;
use App\Http\Requests\GsobjectUpdateRequest;
use App\Models\Device;
use App\Models\Gsobject;
use App\Models\MainContract;
use App\Models\StampAct;
use App\Repositories\DeviceRepository;
use App\Repositories\GsobjectRepository;
use App\Repositories\LimitRepository;
use App\Repositories\MainContractRepository;
use App\Repositories\StampActRepository;
use App\Repositories\UnitRepository;
use App\Repositories\TOContractRepository;
use Illuminate\Http\Request;

/**
 * Class GsobjectController
 *
 * @package App\Http\Controllers\SAUPG\Admin
 */
class GsobjectController extends BaseController
{
    /**
     * @var GsobjectRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $gsobjectRepository;
    /**
     * @var UnitRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $unitRepository;
    /**
     * @var MainContractRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $mainContractRepository;
    /**
     * @var TOContractRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $toContractRepository;

    /**
     * @var StampActRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $stampActRepository;

    /**
     * @var LimitRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $limitRepository;

    /**
     * @var LimitRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $deviceRepository;

    /**
     * GsobjectController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->gsobjectRepository       = app(GsobjectRepository::class);
        $this->unitRepository           = app(UnitRepository::class);
        $this->mainContractRepository   = app(MainContractRepository::class);
        $this->toContractRepository     = app(TOContractRepository::class);
        $this->stampActRepository       = app(StampActRepository::class);
        $this->limitRepository          = app(LimitRepository::class);
        $this->deviceRepository         = app(DeviceRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->gsobjectRepository->getAllWithPaginate();

        return view('srg.admin.gsobjects.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Gsobject::make();

        $unitList           = $this->unitRepository->getForComboBox();
        $mainContractList   = $this->mainContractRepository->getForComboBox();
        $toContractList     = $this->toContractRepository->getForComboBox();

        return view('srg.admin.gsobjects.edit',
            compact('item',
                'unitList',
                'mainContractList',
                'toContractList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\GsobjectCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GsobjectCreateRequest $request)
    {
        $data = $request->input();
        $item = Gsobject::create($data);

        if ($item) {
            return redirect()
                ->route('srg.admin.gsobjects.edit', [$item->slug])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
//        dd(__METHOD__, $slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gsobject  $gsobject
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = $this->gsobjectRepository->getShow($slug);
        if (empty($item)) {
            abort(404);
        }
        $stampActs = $this->stampActRepository->getAllByGSObjectId($item->id);
        $limits    = $this->limitRepository->getAllByGSObjectId($item->id);
        $devices   = $this->deviceRepository->getAllByGSObjectId($item->id);

        return view('srg.admin.gsobjects.show', compact(
            'item',
            'stampActs',
            'limits',
            'devices'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gsobject  $gsobject
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $item = $this->gsobjectRepository->getEdit($slug);
        if (empty($item)) {
            abort(404);
        }

        $unitList         = $this->unitRepository->getForComboBox();
        $mainContractList = $this->mainContractRepository->getForComboBox();
        $toContractList   = $this->toContractRepository->getForComboBox();

        return view('srg.admin.gsobjects.edit',
            compact('item',
                'unitList',
                'mainContractList',
                'toContractList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gsobject  $gsobject
     * @return \Illuminate\Http\Response
     */
    public function update(GsobjectUpdateRequest $request, $slug)
    {
        $item = $this->gsobjectRepository->getEdit($slug);

        if (empty($item)) {
            return back()
                ->withErrors(["msg" => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.edit', $item->slug)
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
     * @param  \App\Models\Gsobject  $gsobject
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $item = $this->gsobjectRepository->getEdit($slug);
        if (empty($item)) {
            abort(404);
        }

        //TODO сделать проверку на связь с devices, equipments, programming_acts

        $stampacts  = $this->stampActRepository->getAllByGSObjectId($item->id);
        $limits     = $this->limitRepository->getAllByGSObjectId($item->id);
        $devices    = $this->deviceRepository->getAllByGSObjectId($item->id);

        $result = ($stampacts->isEmpty()
            and $limits->isEmpty()
            and $devices->isEmpty()
        ) ? Gsobject::destroy($item->id) : false;

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.index')
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $slug, 'title' => 'gsobject']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($slug)
    {
        $item = $this->gsobjectRepository->getTreashedMainContract($slug);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
