<?php

namespace App\Http\Controllers\Backend\City;

use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\City\DeleteReportRequest;
use App\Http\Requests\Backend\City\EditReportRequest;
use App\Http\Requests\Backend\City\StoreCityRequest;
use App\Http\Requests\Backend\City\UpdateCityRequest;
use App\Models\City;
use App\Services\CityService;
use App\Http\Controllers\Controller;

/**
 * Class CityController.
 */
class CityController extends Controller
{
    /**
     * @var CityService
     */
    protected $cityService;

    /**
     * CityController constructor.
     *
     * @param CityService $cityService
     */
    public function __construct(CityService $cityService)
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
     * @param StoreCityRequest $request
     *
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(StoreCityRequest $request)
    {
        $this->cityService->store($request->validated());

        return redirect()->route('admin.city.index')->withFlashSuccess(__('The city was successfully created.'));
    }

    /**
     * @param EditReportRequest $request
     * @param City $city
     * @return mixed
     */
    public function edit(EditReportRequest $request, City $city)
    {
        return view('backend.city.edit')
            ->withCity($city);
    }

    /**
     * @param UpdateCityRequest $request
     * @param City $city
     *
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        $this->cityService->update($city, $request->validated());

        return redirect()->route('admin.city.index')->withFlashSuccess(__('The city was successfully updated.'));
    }

    /**
     * @param DeleteReportRequest $request
     * @param City $city
     * @return mixed
     * @throws GeneralException
     */
    public function destroy(DeleteReportRequest $request, City $city)
    {
        $this->cityService->destroy($city);

        return redirect()->route('admin.city.index')->withFlashSuccess(__('The city was successfully deleted.'));
    }
}
