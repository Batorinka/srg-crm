<?php

namespace App\Http\Controllers\SAUPG\Admin;

use App\Repositories\MainContractRepository;
use Carbon\Carbon;
use clsTinyButStrong;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrintContractController extends BaseController
{
    /**
     * @var MainContractRepository
     */
    private $mainContractRepository;

    /**
     * PrintContractController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->mainContractRepository = app(MainContractRepository::class);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companyList = $this->mainContractRepository->getForComboBox();

        return view('srg.admin.printContracts.index',
            compact('companyList'));
    }

    /**
     *
     */
    public function print(Request $request)
    {
        $main_contract_id = $request->input('main_contract_id');

        $TBS = new clsTinyButStrong; // new instance of TBS
        $TBS->Plugin(TBS_INSTALL, 'clsOpenTBS'); // load the OpenTBS plugin

// -----------------
// Load the template
// -----------------

        $template = 'templatesDocx/demo_ms_word.docx';
        $TBS->LoadTemplate($template, 'already_utf8'); // Also merge some [onload] automatic fields (depends of the type of document).


//// Merge data in colmuns
        $companyList = $this->mainContractRepository->getAllById($main_contract_id);
        $companyList['contractType'] = $companyList->mainContractType->title;
        $companyList['signing_date'] = Carbon::parse($companyList->signing_date)->format('d.m.Y');

        $TBS->MergeField('item', $companyList);
// -----------------
// Output the result
// -----------------

        $nameOutputFile = $companyList->slug . '.docx';
        $TBS->Show(1, $nameOutputFile); // Also merges all [onshow] automatic fields.
    }
}
