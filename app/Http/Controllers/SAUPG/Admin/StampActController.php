<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Controllers\SAUPG\Admin\BaseController;
use App\Http\Requests\StampActCreateRequest;
use App\Http\Requests\StampActUpdateRequest;
use App\Models\Gsobject;
use App\Models\StampAct;
use App\Repositories\GsobjectRepository;
use App\Repositories\StampActRepository;
use Illuminate\Http\Request;

class StampActController extends BaseController
{
    /**
     * @var GsobjectRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $gsobjectRepository;
    /**
     * @var StampActRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $stampActRepository;

    /**
     * StampActController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->stampActRepository = app(StampActRepository::class);
        $this->gsobjectRepository = app(GsobjectRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $item = new StampAct();

        $gsobject   = $this->gsobjectRepository->getEdit($slug);

        return view('srg.admin.stampacts.edit',
            compact('item',
                'gsobject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StampActCreateRequest $request)
    {
        $data = $request->input();
        $item = (new StampAct())->create($data);

        if ($item) {
            return redirect()
                ->route('srg.admin.stampacts.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StampAct  $stampAct
     * @return \Illuminate\Http\Response
     */
    public function show(StampAct $stampAct)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StampAct  $stampAct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->stampActRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $gsobject   = $this->gsobjectRepository->getOneById($item->gsobject_id);

        return view('srg.admin.stampacts.edit',
            compact('item',
                'gsobject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StampAct  $stampAct
     * @return \Illuminate\Http\Response
     */
    public function update(StampActUpdateRequest $request, $id)
    {
        $item = $this->stampActRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(["msg" => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.stampacts.edit', $item->id)
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
     * @param  \App\Models\StampAct  $stampAct
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->stampActRepository->getEdit($id);
        $gsobject = $this->gsobjectRepository->getOneById($item->gsobject_id);

        if (empty($item)) {
            abort(404);
        }

        $result = StampAct::destroy($item->id);

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.show', $gsobject->slug)
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $id, 'title' => 'stampact']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }

    /**
     * @param $slug
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $item = $this->stampActRepository->getTreashedStampAct($id);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
