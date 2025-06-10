<?php

namespace App\Http\Controllers\Landlord\Admin;

use App\Helpers\ResponseMessage;
use App\Helpers\SanitizeInput;
use App\Http\Controllers\Controller;
use App\Models\FormBuilder;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomFormBuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:form-builder');
    }

    private const BASE_PATH = 'landlord.admin.form-builder.custom.';


    public function setAllDb()
    {
        try {
            $langList = Language::all();

            /* Page */
            $pages = FormBuilder::get();

            foreach ($pages as $page) {
                $pageUpdateData = FormBuilder::query()
                    ->find($page->id);
                $titleList = [];
                $button_textList = [];
                $fieldsList = [];
                $success_messageList = [];

                foreach ($langList as $lang) {
                    $content = $page->title;
                    if (!is_array(json_decode($content, true))) {
                        $titleList[$lang->slug] = $page->title;
                    }
                }
                $pageUpdateData->title = $titleList;

                foreach ($langList as $lang) {
                    $content = $page->button_text;
                    if (!is_array(json_decode($content, true))) {
                        $button_textList[$lang->slug] = $page->button_text;
                    }
                }
                $pageUpdateData->button_text = $button_textList;

                foreach ($langList as $lang) {
                    $content = $page->fields;
                    if (!is_array(json_decode($content, true))) {
                        $fieldsList[$lang->slug] = $page->fields;
                    }
                }
                $pageUpdateData->fields = $fieldsList;

                foreach ($langList as $lang) {
                    $content = $page->success_message;
                    if (!is_array(json_decode($content, true))) {
                        $success_messageList[$lang->slug] = $page->success_message;
                    }
                }
                $pageUpdateData->success_message = $success_messageList;

                $pageUpdateData->save();
            }

        } catch (\Exception $e) {
            // return $this->sendError($e->getMessage());
        }
    }

    public function all()
    {
        // $this->setAllDb();
        $all_forms = FormBuilder::all();
        return view(self::BASE_PATH . 'all', compact('all_forms'));
    }

    public function bulk_action(Request $request)
    {
        FormBuilder::whereIn('id', $request->ids)->delete();
        return response()->json('ok');
    }

    public function edit($id)
    {
        $form = FormBuilder::findOrFail($id);
        return view(self::BASE_PATH . 'edit', compact('form'));
    }

    private function convertTranslate($requestData): array
    {
        $result = [];

        $translate = $requestData;


        $allLang = get_all_language();
        $defaultLangData = $allLang->where('default', '=', 1)->first();

        foreach ($allLang as $langData) {
            $lang = $langData->slug;

            if (isset($translate[$lang])) {
                foreach ($translate[$lang] as $key => $item) {

                    $result[$key][$lang] = SanitizeInput::esc_html($item ?? '');
                }
            }


        }
        return $result;
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'email' => 'required|string',
            'button_title' => 'required|string',
            'field_name' => 'required|max:191',
            'field_placeholder' => 'required|max:191',
            'success_message' => 'required',
        ]);

        $lang = $request->input('lang') ?? app()->getLocale();
        $id = $request->id;
        $title = SanitizeInput::esc_html($request->title);
        $email = $request->email;
        $button_title = SanitizeInput::esc_html($request->button_title);
        unset($request['_token'], $request['email'], $request['button_title'], $request['title'], $request['id']);
        $all_fields_name = [];
        $all_request_except_token = $request->all();
        foreach ($request->field_name as $fname) {
            $all_fields_name[] = strtolower(Str::slug($fname));
        }
        $all_request_except_token['field_name'] = $all_fields_name;
        $json_encoded_data = json_encode($all_request_except_token);


        FormBuilder::findOrfail($id)->update([
            'title' => [$lang => $title],
            'email' => $email,
            'button_text' => [$lang => $button_title],
            'success_message' => [$lang => SanitizeInput::esc_html($request->success_message)],
            'fields' => [$lang => $json_encoded_data]
        ]);

        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
         //   'title' => 'required|string',
            'email' => 'required|string',
           // 'button_title' => 'required|string',
           // 'success_message' => 'required|string',
        ]);

        $translate = $this->convertTranslate($request->input('translate'));
        FormBuilder::create([
            'title' => $translate['title'],
            'email' => $request->email,
            'button_text' => $translate['button_title'],
            'success_message' => $translate['success_message'],
        ]);
        return response()->success(ResponseMessage::SettingsSaved());
    }

    public function delete($id)
    {
        FormBuilder::findOrFail($id)->delete();
        return response()->danger(ResponseMessage::delete());
    }
}
