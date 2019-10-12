<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Http\Requests\SetupValuesUpdateRequest;
use App\Models\SetupValue;
use App\Repositories\SetupValueRepository;
use Illuminate\Http\Request;
use MoneyToStr;

class SetupValueController extends BaseController
{

    /**
     * @var SetupValueRepository
     */
    private $setupValueRepository;

    public function __construct()
    {
        parent::__construct();

        $this->setupValueRepository = app(SetupValueRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setupValues = $this->setupValueRepository->getIndex();

        return view('srg.admin.setupvalues.index',
            compact('setupValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SetupValue  $setupValue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->setupValueRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        return view('srg.admin.setupvalues.edit',
            compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SetupValue  $setupValue
     * @return \Illuminate\Http\Response
     */
    public function update(SetupValuesUpdateRequest $request, $id)
    {
        $item = $this->setupValueRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(["msg" => "Запись id=[$item->id] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('srg.admin.setupvalues.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
