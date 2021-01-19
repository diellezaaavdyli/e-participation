<?php

namespace App\Http\Controllers\Backend\Report;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Report\DeleteReportRequest;
use App\Http\Requests\Backend\Report\EditReportRequest;
use App\Http\Requests\Backend\Report\StoreReportRequest;
use App\Http\Requests\Backend\Report\UpdateReportRequest;
use App\Models\Report;
use App\Services\ReportService;
use App\Http\Controllers\Controller;

/**
 * Class ReportController.
 */
class ReportController extends Controller
{
    /**
     * @var ReportService
     */
    protected $cityService;

    /**
     * ReportController constructor.
     *
     * @param ReportService $cityService
     */
    public function __construct(ReportService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.city.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.city.create');
    }

    /**
     * @param StoreReportRequest $request
     *
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(StoreReportRequest $request)
    {
        $this->cityService->store($request->validated());

        return redirect()->route('admin.city.index')->withFlashSuccess(__('The city was successfully created.'));
    }

    /**
     * @param EditReportRequest $request
     * @param Report $city
     * @return mixed
     */
    public function edit(EditReportRequest $request, Report $city)
    {
        return view('backend.city.edit')
            ->withReport($city);
    }

    /**
     * @param UpdateReportRequest $request
     * @param Report $city
     *
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(UpdateReportRequest $request, Report $city)
    {
        $this->cityService->update($city, $request->validated());

        return redirect()->route('admin.city.index')->withFlashSuccess(__('The city was successfully updated.'));
    }

    /**
     * @param DeleteReportRequest $request
     * @param Report $city
     * @return mixed
     * @throws GeneralException
     */
    public function destroy(DeleteReportRequest $request, Report $city)
    {
        $this->cityService->destroy($city);

        return redirect()->route('admin.city.index')->withFlashSuccess(__('The city was successfully deleted.'));
    }
}
