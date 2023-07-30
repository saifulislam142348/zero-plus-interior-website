<?php

namespace App\Repositories;

use App\Models\ContactSetting;
use Illuminate\Support\Str;

class ContactSettingRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return ContactSetting::class;
    }

    public  function savedByRequest($request)
    {
        $settings = $this->query()->first();

        if (!$settings) {
            return $this->query()->create([
                'ref' => Str::random(10),
                'phone' => $request->input('phone', null),
                'alternative_phone' => $request->input('alternative_phone', null),
                'email' => $request->input('email', null),
                'alternative_email' => $request->input('alternative_email', null),
                'office_time' => $request->input('office_time', null),
                'office_weekend' => $request->input('office_weekend', null),
                'address_line_1' => $request->input('address_line_1', null),
            ]);
        }

        $settings->update([
            'phone' => $request->input('phone', null),
            'alternative_phone' => $request->input('alternative_phone', null),
            'email' => $request->input('email', null),
            'alternative_email' => $request->input('alternative_email', null),
            'office_time' => $request->input('office_time', null),
            'office_weekend' => $request->input('office_weekend', null),
            'address_line_1' => $request->input('address_line_1', null),
        ]);

        return $settings->refresh();
    }
}
