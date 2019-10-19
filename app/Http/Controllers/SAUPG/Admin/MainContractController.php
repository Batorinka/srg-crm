<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Requests\MainContractCreateRequest;
use App\Http\Requests\MainContractUpdateRequest;
use App\Models\Gsobject;
use App\Models\MainContract;
use App\Repositories\GsobjectRepository;
use App\Repositories\MainContractRepository;
use App\Repositories\MainContractTypeRepository;
use Illuminate\Http\Request;

class MainContractController extends BaseController
{
    /**
     * @var MainContractRepository
     */
    private $mainContractRepository;

    /**
     * @var MainContractTypeRepository
     */
    private $mainContractTypeRepository;

    /**
     * @var GsobjectRepository
     */
    private $gsobjectRepository;

    public function __construct()
    {
        parent::__construct();

        $this->mainContractRepository = app(MainContractRepository::class);
        $this->mainContractTypeRepository = app(MainContractTypeRepository::class);
        $this->gsobjectRepository = app(GsobjectRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->mainContractRepository->getAllWithPaginate();

        return view('srg.admin.mainContracts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = MainContract::make();
        $categoryList = $this->mainContractTypeRepository->getForComboBox();

        return view('srg.admin.mainContracts.create',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MainContractCreateRequest $request)
    {
        $data = $request->input();
        $item = MainContract::create($data);

        if ($item) {
            return redirect()->route('srg.admin.maincontracts.edit', [$item->slug])
                ->with(['success' => 'Успешно сохраненено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($slug)
    {
        $item = $this->mainContractRepository->getShow($slug);
        if (empty($item)) {
            abort(404);
        }
        $gsobjects = $this->gsobjectRepository->getAllById($item->id);

        return view('srg.admin.mainContracts.show', compact('item', 'gsobjects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainContract  $mainContract
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $item = $this->mainContractRepository->getEdit($slug);
        if (empty($item)) {
            abort(404);
        }

        $categoryList = $this->mainContractTypeRepository->getForComboBox();

        return view('srg.admin.mainContracts.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainContract  $mainContract
     *
     * @return \Illuminate\Http\Response
     */
    public function update(MainContractUpdateRequest $request, $slug)
    {
        $item = $this->mainContractRepository->getEdit($slug);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.maincontracts.edit', $item->slug)
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
     * @param  \App\Models\MainContract  $mainContract
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $item = $this->mainContractRepository->getEdit($slug);
        if (empty($item)) {
            abort(404);
        }

        $gsobjects = $this->gsobjectRepository->getAllById($item->id);

        $result = ($gsobjects->isEmpty()) ? MainContract::destroy($item->id) : false;

        if ($result) {
            return redirect()
                ->route('srg.admin.maincontracts.index')
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $slug]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }

    public function restore($slug)
    {
        $item = $this->mainContractRepository->getTreashedMainContract($slug);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
