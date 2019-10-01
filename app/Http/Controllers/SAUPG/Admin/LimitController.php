<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Requests\LimitCreateRequest;
use App\Http\Requests\LimitUpdateRequest;
use App\Models\Limit;
use App\Repositories\GroupRepository;
use App\Repositories\GsobjectRepository;
use App\Repositories\LimitRepository;
use Illuminate\Http\Request;

class LimitController extends BaseController
{
    /**
     * @var GsobjectRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $gsobjectRepository;

    /**
     * @var LimitRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $limitRepository;

    /**
     * @var GroupRepository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private $groupRepository;

    /**
     * LimitController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->gsobjectRepository = app(GsobjectRepository::class);
        $this->limitRepository    = app(LimitRepository::class);
        $this->groupRepository    = app(GroupRepository::class);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $item = new Limit();

        $gsobject = $this->gsobjectRepository->getEdit($slug);
        $groups     = $this->groupRepository->getForComboBox();

        return view('srg.admin.limits.edit',
            compact('item',
                'gsobject',
                'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LimitCreateRequest $request)
    {
        $data = $request->input();
        $item = (new Limit())->create($data);

        if ($item) {
            return redirect()
                ->route('srg.admin.limits.edit', [$item->id])
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
     * @param  \App\Models\Limit  $limit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->limitRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $gsobject   = $this->gsobjectRepository->getOneById($item->gsobject_id);
        $groups     = $this->groupRepository->getForComboBox();

        return view('srg.admin.limits.edit',
            compact('item',
                'gsobject',
                'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Limit  $limit
     * @return \Illuminate\Http\Response
     */
    public function update(LimitUpdateRequest $request, $id)
    {
        $item = $this->limitRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(["msg" => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.limits.edit', $item->id)
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
     * @param  \App\Models\Limit  $limit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->limitRepository->getEdit($id);
        $gsobject = $this->gsobjectRepository->getOneById($item->gsobject_id);

        if (empty($item)) {
            abort(404);
        }

        $result = Limit::destroy($item->id);

        if ($result) {
            return redirect()
                ->route('srg.admin.gsobjects.show', $gsobject->slug)
                ->with(['success' => "Запись id[$item->id] удалена.", 'restore' => $id, 'title' => 'limit']);
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
        $item = $this->limitRepository->getTreashedLimit($id);
        $result = $item->restore();
        if ($result) {
            return back()->with(['success' => "Запись [$item->id] успешно восстановлена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка восстановления записи']);
        }
    }
}
