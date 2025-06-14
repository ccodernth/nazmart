<?php

namespace App\Http\Controllers\Landlord\Admin;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Widgets;
use Plugins\WidgetBuilder\WidgetBuilderSetup;
use Illuminate\Http\Request;

class WidgetsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:form-builder');
    }

    public function index(){
     //  $this->setAllDb();
        return view('landlord.admin.widgets.widget-index');

    }

    public function setAllDb()
    {
        try {
            $langList = Language::all();

            /* Page */
            $pages = Widgets::get();

            foreach ($pages as $page) {
                $pageUpdateData = Widgets::query()
                    ->find($page->id);
                $designationList = [];
                $descriptionList = [];

                foreach ($langList as $lang) {
                    $content = $page->widget_content;
                    if (!is_array(json_decode($content, true))) {
                        $designationList[$lang->slug] = $page->widget_content;
                    }
                }
                $pageUpdateData->widget_content = $designationList;

                $pageUpdateData->save();

            }


        } catch (\Exception $e) {
            // return $this->sendError($e->getMessage());
        }
    }

    public function widget_markup(Request $request){
        $output = WidgetBuilderSetup::render_widgets_by_name_for_admin([
            'name' => $request->widget_name,
            'namespace' => $request->widget_namespace,
            'language' => $request->language,
            'type' => 'new',
            'after' => false,
            'before' => false,
        ]);

        return $output;
    }

    public function new_widget(Request $request){
        $this->validate($request,[
           'widget_name' => 'required',
           'widget_order' => 'required',
           'widget_location' => 'required',
           'namespace' => 'required'
        ]);

        $lang = $request['language'];

        unset($request['_token']);
        unset($request['language']);
        $widget_content = (array) $request->all();

        $languages = Language::query()->where('status', '=', 1)->get();

        foreach ($languages as $key =>$language) {
            $langData[$language->slug] = serialize($widget_content);
        }

       $widget_id = Widgets::create([
            'widget_name' => $request->widget_name,
            'widget_order' => $request->widget_order,
            'widget_location' => $request->widget_location,
            'widget_content' => $langData,
            'widget_namespace' => $request->namespace,
        ])->id;

        $data['id'] = $widget_id;
        $data['status'] = 'ok';
        return response()->json($data);
    }
    public function update_widget(Request $request){
        $this->validate($request,[
            'widget_name' => 'required',
            'widget_order' => 'required',
            'widget_location' => 'required',
            'namespace' => 'required'
        ]);

        $lang = $request['language'];

        unset($request['_token']);
        unset($request['language']);
        $widget_content = (array) $request->all();

        $widget = Widgets::findOrFail($request->id);

      //  dd($widget);
        $widget->update([
            'widget_name' => $request->widget_name,
            'widget_order' => $request->widget_order,
            'widget_location' => $request->widget_location,
           // 'widget_content' => serialize($widget_content),
            'widget_namespace' => $request->namespace,
        ]);
        $widget_contentUpdate = $widget->getTranslations()['widget_content'];
        $widget_contentUpdate[$lang] = serialize($widget_content);
      //  dd($widget_contentUpdate);
        $widget->update([
            'widget_content' => $widget_contentUpdate
        ]);

        return response()->json('ok');
    }

    public function delete_widget(Request $request){
        Widgets::findOrFail($request->id)->delete();
        return response()->json('ok');
    }

    public function update_order_widget(Request $request){

        Widgets::findOrFail($request->id)->update(['widget_order' => $request->widget_order]);
        return response()->json('ok');
    }
}
