<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Controllers\SAUPG\Admin\BaseController;
use App\Http\Requests\GsobjectCreateRequest;
use App\Http\Requests\GsobjectUpdateRequest;
use App\Models\Gsobject;
use App\Models\MainContract;
use App\Repositories\GsobjectRepository;
use App\Repositories\MainContractRepository;
use App\Repositories\PressureUnitRepository;
use App\Repositories\TOContractRepository;
use Illuminate\Http\Request;

class GsobjectController extends BaseController
{
    /**
     * @var GsobjectRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $gsobjectRepository;
    /**
     * @var PressureUnitRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $pressureUnitRepository;
    /**
     * @var MainContractRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $mainContractRepository;
    /**
     * @var TOContractRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $toContractRepository;

    /**
     * GsobjectController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->gsobjectRepository =     app(GsobjectRepository::class);
        $this->pressureUnitRepository = app(PressureUnitRepository::class);
        $this->mainContractRepository = app(MainContractRepository::class);
        $this->toContractRepository   = app(TOContractRepository::class);
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
        $item = new Gsobject();

        $pressureUnitList = $this->pressureUnitRepository->getForComboBox();
        $mainContractList = $this->mainContractRepository->getForComboBox();
        $toContractList   = $this->toContractRepository->getForComboBox();

        return view('srg.admin.gsobjects.edit',
            compact('item',
                'pressureUnitList',
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
        $item = (new Gsobject())->create($data);

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

        return view('srg.admin.gsobjects.show', compact('item'));
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

        $pressureUnitList = $this->pressureUnitRepository->getForComboBox();
        $mainContractList = $this->mainContractRepository->getForComboBox();
        $toContractList   = $this->toContractRepository->getForComboBox();

        return view('srg.admin.gsobjects.edit',
            compact('item',
                'pressureUnitList',
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

        //TODO сделать проверку на связь с devices, equipments, stamp_acts, programming_acts

        $result = Gsobject::destroy($item->id);

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.index')
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $slug]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }

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
