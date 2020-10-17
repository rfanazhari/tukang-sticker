<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContactUs;
use App\Models\User;
use App\Models\Template;
use App\Models\Label;
use App\Models\Design;
use App\Models\Projects;
use App\Models\Wallpaper;
use Carbon\Carbon;
use View;
use GlobalFunction;

class ProjectController extends Controller
{
    private $bredcrum = [
        'title' => 'Customer',
        'bredcrum' => []
    ];
    private $title = "Tukang Sticker.com";
    private $current = "";
    private $footer = [];
    private $status = [
        "code" => 500,
        "msg" => "Terjadi kesalahan pada system."
    ];
    private $typesProject = "", $labelProject = "", $projectName = "", $images = "", $description = "", $permalink = "", $errortypesProject = "", $errorlabelProject = "", $errorprojectName = "", $errorimages = "", $errordescription = "", $errorpermalink = "";
    private $typeProject = ['design', 'wallpaper'];
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->footer = ContactUs::find(1);
        $this->current = Carbon::now();
    }
    
    public function template() {
        $this->bredcrum['title'] = "Templates";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['customer']   = Template::with(['user', 'labels'])->orderBy('created_at', 'DESC')->get()->toArray();
        $data['lables']     = Label::where('isActive', '=', 1)->get()->toArray();
        
        return view("admin.project.template", $data);
    }

    public function filter_template(Request $request) {
        $this->bredcrum['title'] = "Templates";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $filter             = $request['label'];
        $customer   = Template::with(['user', 'labels' => function($query) use ($filter) {
            $query->where('labels.permalink', $filter);
        }])->orderBy('created_at', 'DESC')->get()->toArray();
        $data['customer']   = [];
        foreach ($customer as $key => $val) {
            if(!empty($val['labels'])) {
                $data['customer'][] = $val;
            }
        }
        $data['filter']     = $filter;
        $data['lables']     = Label::where('isActive', '=', 1)->get()->toArray();
        // dd($data);
        return view("admin.project.template", $data);
    }

    public function post_template(Request $request) {
        $data['isActive']   = $request['isActive'];  
        $data['labelId']    = $request['labelId'];   
        $data['imagesId']   = $request['imagesId'];   
        $data['images']     = $request['images'];
        $data['edited']     = $request['edited'];
        $data['created_at'] = $this->current->format('Y-m-d H:m:s');

        if($data['edited'] == 'false') { // input data
            try {
                $template = Template::create([
                    'label_id' => $data['labelId'],
                    'imgHeader' => $data['images'],
                    'isActive' => $data['isActive'],
                    'user_id' => Auth::user()->id,
                    'created_at' => $data['created_at'],
                ]);
                $this->status = [
                    "code" => 200,
                    "msg" => GlobalFunction::flash_message('success', 'tambah', 'template')
                ];
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
            
        } else {
            try {
                $template = Template::find($data['imagesId']);
                // dd($data);
                if($template) {
                    $template->update([
                        'label_id' => $data['labelId'],
                        'imgHeader' => $data['images'],
                        'isActive' => $data['isActive'],
                        'user_id' => Auth::user()->id,
                        'created_at' => $data['created_at'],
                    ]);
                    $this->status = [
                        "code" => 200,
                        "msg" => GlobalFunction::flash_message('success', 'update', 'template')
                    ];
                }
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
        }

        return json_encode($this->status);
    }
    
    public function wallpaper() {
        $this->bredcrum['title'] = "Wallpaper";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['customer']   = Wallpaper::with(['user', 'label', 'project'])->orderBy('created_at', 'DESC')->get()->toArray();
        $data['projects']   = Projects::select(['id', 'name', 'permalink'])->where('type', '=', 'wallpaper')->get()->toArray();
        $data['templates']  = Template::with(['labels'])->where('isActive', '=', 1)->get()->toArray();
        $data['lables']     = Label::where('isActive', '=', 1)->get()->toArray();
        
        return view("admin.project.wallpaper", $data);
    }
    
    public function design() {
        $this->bredcrum['title'] = "Design";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['customer']   = Design::with(['user', 'label', 'project'])->orderBy('created_at', 'DESC')->get()->toArray();
        $data['projects']   = Projects::select(['id', 'name', 'permalink'])->where('type', '=', 'design')->get()->toArray();
        $data['templates']  = Template::with(['labels'])->where('isActive', '=', 1)->get()->toArray();
        $data['lables']     = Label::where('isActive', '=', 1)->get()->toArray();
        
        return view("admin.project.design", $data);
    }

    public function list() {
        $this->bredcrum['title'] = "Project Existing";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['customer']   = Projects::with(['user', 'label'])->orderBy('created_at', 'DESC')->get()->toArray();
        $data['lables']     = Label::where('isActive', '=', 1)->get()->toArray();
        
        return view("admin.project.project", $data);
    }

    public function project_add() {
        $this->bredcrum['title'] = "Add new Project";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['typeProject']= $this->typeProject;
        $data['lables']     = Label::where('isActive', '=', 1)->get()->toArray();

        return view("admin.project.addProject", $data);
    }

    public function project_add_post(Request $request) {
        $this->bredcrum['title'] = "Add new Project";
        $data['bredcrum']   = $this->bredcrum;
        $data['footer']     = $this->footer;
        $data['typeProject']= $this->typeProject;
        $data['lables']     = Label::where('isActive', '=', 1)->get()->toArray();
        $this->typesProject = $request['typeProject'];
        $this->labelProject = $request['labelProject'];
        $this->projectName = $request['projectName'];
        $this->images = $request['images'];
        $this->description = $request['description'];
        $this->permalink = str_replace(' ', '-', strtolower($request['projectName']));

        if(empty($this->typesProject)) $this->errortypesProject = "Pilih Type Project !";
        if(empty($this->labelProject)) $this->errorlabelProject = "Pilih Label Project !";
        if(empty($this->projectName)) $this->errorprojectName = "Input Nama Project !";
        if(empty($this->images)) $this->errorimages = "Pilih Images header !";
        if(empty($this->description)) $this->errordescription = "Pilih Type Project !";

        $data['typesProject'] = $this->typesProject;
        $data['labelProject'] = $this->labelProject;
        $data['projectName'] = $this->projectName;
        $data['images'] = $this->images;
        $data['description'] = $this->description;
        $data['permalink'] = $this->permalink;
        $data['errortypesProject'] = $this->errortypesProject;
        $data['errorlabelProject'] = $this->errorlabelProject;
        $data['errorprojectName'] = $this->errorprojectName;
        $data['errorimages'] = $this->errorimages;
        $data['errordescription'] = $this->errordescription;

        if(empty($this->errortypesProject) && empty($this->errorlabelProject) && empty($this->errorprojectName) && empty($this->errorimages) && empty($this->errortypesProject) && empty($this->errordescription)) {
            try {
                $input = Projects::create([
                    'type' => $this->typesProject,
                    'label_id' => $this->labelProject,
                    'name' => $this->projectName,
                    'imgHeader' => $this->images,
                    'description' => $this->description,
                    'permalink' => $this->permalink,
                    'user_id' => Auth::user()->id,
                ]);
    
                return redirect()->route('list')->with('statusProject', 'Project '.$this->projectName.' Created!');
            } catch (QueryException $exception) {
                return view("admin.project.addProject", $data);
            }
        }
        dd($data);
    }

    public function post_wallpaper(Request $request) {
        $data['projectName']    = $request['projectName'];
        $data['templatesName']  = $request['templatesName'];
        $data['isActive']       = $request['isActive'];
        $data['labelId']        = $request['labelId'];
        $data['images']         = $request['images'];
        $data['imagesId']       = $request['imagesId'];
        $data['edited']         = $request['edited'];
        
        $query = [
            'project_id' => $data['projectName'],
            'template_id' => $data['templatesName'],
            'label_id' => $data['labelId'],
            'based_64' => $data['images'],
            'user_id' => Auth::user()->id,
        ];
        if($data['edited'] == 'false') { // input data
            try {
                $wallpaper = Wallpaper::create($query);
                $this->status = [
                    "code" => 200,
                    "msg" => GlobalFunction::flash_message('success', 'tambah', 'wallpaper')
                ];
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
            
        } else {
            try {
                $wallpaper = Wallpaper::find($data['imagesId']);
                // dd($data);
                if($wallpaper) {
                    $wallpaper->update($query);
                    $this->status = [
                        "code" => 200,
                        "msg" => GlobalFunction::flash_message('success', 'update', 'wallaper')
                    ];
                }
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
        }

        return json_encode($this->status);
    }

    public function post_design(Request $request) {
        $data['projectName']    = $request['projectName'];
        $data['templatesName']  = $request['templatesName'];
        $data['isActive']       = $request['isActive'];
        $data['labelId']        = $request['labelId'];
        $data['images']         = $request['images'];
        $data['imagesId']       = $request['imagesId'];
        $data['edited']         = $request['edited'];
        
        $query = [
            'project_id' => $data['projectName'],
            'label_id' => $data['labelId'],
            'based_64' => $data['images'],
            'user_id' => Auth::user()->id,
        ];
        
        if($data['edited'] == 'false') { // input data
            try {
                $design = Design::create($query);
                $this->status = [
                    "code" => 200,
                    "msg" => GlobalFunction::flash_message('success', 'tambah', 'design')
                ];
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
            
        } else {
            try {
                $design = Design::find($data['imagesId']);
                // dd($data);
                if($design) {
                    $design->update($query);
                    $this->status = [
                        "code" => 200,
                        "msg" => GlobalFunction::flash_message('success', 'update', 'design')
                    ];
                }
            } catch (QueryException $exception) {
                $errorInfo = $exception->errorInfo;
                $this->status = [
                    "code" => 500,
                    "msg" => $errorInfo
                ];
            }
        }

        return json_encode($this->status);
    }
}
