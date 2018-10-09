<?php

namespace App\Http\Controllers;

use App\Models\SharedDocument;
use App\Models\Student;
use App\Models\TechSupportMessage;
use App\Models\Tutor;
use App\Repositories\SessionRepository;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use function Psy\sh;
use SPSS\Sav\Reader;
use SPSS\Sav\Writer;
use View;

class UtilityController extends Controller
{
    public function saveCanvasImage(Request $request, $type)
    {

        $user = Auth::guard($type)->user();
        $time = time();
        $base64 = $request->imageData;
        $image_base64 = base64_decode($base64);
        if (!realpath(storage_path("uploads/{$type}s/canvas_images/{$user->id}"))) {
            mkdir(storage_path("uploads/{$type}s/canvas_images/{$user->id}/"), 777);
            @chmod(storage_path("uploads/{$type}s/canvas_images/{$user->id}/"), 777);
        }
        $uploadDir = "{$type}s/canvas_images/{$user->id}/{$time}_{$user->id}_canvas_image.png";

        $file = storage_path("uploads/{$uploadDir}");
        file_put_contents($file, $image_base64);
        $uploadPath = preg_replace('/\/+/', '-', $uploadDir);
        return response()->json(['status' => true, 'file' => url("storage/{$uploadPath}")]);
    }

    public function readSavFile(Request $request, $type)
    {
        $user = Auth::guard($type)->user();
        if ($file = $request->file('sav-file')) {
            $ext = $file->getClientOriginalExtension();
            $file_name = 'read-sav-file' . time() . '.' . $ext;
            $dest = storage_path("uploads/sav_files/{$type}s/{$user->id}/");
            if (!realpath($dest)) {
                mkdir($dest);
                @chmod($dest, 777);
            }
            $data = [];
            if ($file->move($dest, $file_name)) {
                $savFile = Reader::fromFile($dest . $file_name);
                $savData = $savFile->data;
                foreach ($savData[0] as $d) {
                    $data[] = json_decode($d);
                }
                File::delete($dest . $file_name);
            }
            return response()->json(['status' => true, 'data' => $data]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function saveCanvasToSav(Request $request, $type)
    {
        $user = Auth::guard($type)->user();
        $data = [];

        foreach ($request->data as $key => $row) {
            $json = json_encode($row);
            $data[] = [
                'name' => 'VAR' . $key,
                'width' => strlen($json),
                'columns' => 1,
                'align' => 1,
                'measure' => 1,
                'type' => 'String',
                'data' => [$json]
            ];
        }

        $writer = new Writer([
            'header' => [
                'prodName' => 'canvas-to-sav',
                'layoutCode' => 2,
                'compression' => 1,
                'weightIndex' => 0,
                'bias' => 100,
                'creationDate' => date('Y-m-d'),
                'creationTime' => date('H:i:s'),
            ],
            'variables' => $data
        ]);
        $dest = storage_path("uploads/sav_files/{$type}s/{$user->id}/");
        if (!realpath($dest)) {
            mkdir($dest);
            @chmod($dest, 777);
        }
        $fileName = 'write_sav_file_' . time() . '.sav';
        $writer->save($dest . $fileName);
        return response()->json(['status' => true, 'file' => "uploads/sav_files/{$type}s/{$user->id}/{$fileName}"]);
    }

    public function sendReportToTechTeam(Request $request, $type)
    {

        $user = Auth::guard($type);
        $message = new TechSupportMessage;
        $message->message = $request->question;
        $message->user_type = $type;
        $message->user_id = $user->id;
        if ($message->save()) {
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

    public function searchSessionLogs(Request $request, $type)
    {
        $user = Auth::guard($type)->user();
        $sessions = [];
        $dateRange = $request->daterange;
        $subjectId = $request->subject_id;
        if ($type == 'student') {
            $sessions = SessionRepository::getStudentSessions($user->id, $subjectId, $dateRange);
        } else if ($type == 'tutor') {
            $sessions = SessionRepository::getTutorSessions($user->id, $subjectId, $dateRange);
        }
        $view = View::make('utility.session-table', compact('sessions', 'type'))->render();
        return response()->json(['status' => true, 'view' => $view]);
    }

    public function downloadFile(Request $request)
    {
        $fileName = $request->file;
        $headers = [
            'Content-Type' => 'application/sav',
        ];

        return response()->download(storage_path($fileName), 'canvas-file.sav', $headers)->deleteFileAfterSend(true);
    }

    public function readNotifications()
    {
        TechSupportMessage::where('status', 1)->update(['status' => 0]);
        return response()->json(['status' => true]);
    }

    public function shareDrawing(Request $request, $type)
    {
        $user = Auth::guard($type)->user();
        $pageTitle = 'Share Drawing';
        $uuid = $request->user;
        if($type=='tutor'){
            $sharedUser = Student::where('uuid',$uuid)->first();
        }else{
            $sharedUser = Tutor::where('uuid',$uuid)->first();
        }
        if(!$sharedUser){
            return abort(404);
        }
        $sharedUserType = $request->userType;
        $documentShared = DB::select("SELECT image,created_at, CASE WHEN shared_user_type='tutor' THEN (SELECT name FROM tutors where id = shared_user_id LIMIT 1) ELSE (SELECT name FROM students where id = shared_user_id LIMIT 1) END as shared_to
          from shared_documents WHERE user_type='{$type}' AND user_id = {$user->id} ORDER BY id desc");

        $receivedDocs = DB::select("SELECT image,created_at, CASE WHEN user_type='tutor' THEN (SELECT name FROM tutors where id = shared_user_id LIMIT 1) ELSE (SELECT name FROM students where id = shared_user_id LIMIT 1) END as shared_by
          from shared_documents WHERE shared_user_type='{$type}' AND shared_user_id = {$user->id} ORDER BY id desc");

        return view('share-board', compact('user', 'pageTitle', 'type', 'documentShared', 'sharedUser', 'sharedUserType','receivedDocs'));
    }

    public function shareFiles(Request $request, $type)
    {
        $sharedUserId = $request->user;
        $sharedType = $request->userType;
        if($sharedType=='tutor'){
            $sharedUser = Tutor::find($sharedUserId);
        }else{
            $sharedUser = Student::find($sharedUserId);
        }
        $user = Auth::guard($type)->user();
        $docs = [];
        foreach ($request->file('files') as $file) {
            $image = time() . '_' . $user->id . '_shared.' . $file->getClientOriginalExtension();
            $file->move(storage_path('uploads/shared_docs'), $image);
            $docs[] = ['user_id' => $user->id, 'user_type' => $type, 'image' => $image, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'), 'shared_user_type' => $sharedType, 'shared_user_id' => $sharedUserId];
        }
        SharedDocument::insert($docs);
        return response()->json(compact('sharedUser','docs'));
    }

    public function readCloudFile(Request $request){

        $json = '[{
            "text": "My Cloudpack",
            "children": [
              {
                "text" : "College"
        
              },
              {
                "text" : "Alberta K to 12 Lessions",
                "children" : [
                  {
                    "text" : "Class 2 Science",
                    "a_attr" : {"class":"js-read-cloud-file","file":"'.asset('cloud_files/demoform1.pdf').'"},
                    "icon" : "images/file-icon.png"
                  },
                  {
                    "text" : "Class 3 Science",
                    "a_attr" : {"class":"js-read-cloud-file","file":"'.asset('cloud_files/pdf_sample.pdf').'"},
                    "icon" : "images/file-icon.png"
                  }
                ]
              }
            ]
          },
          {
            "text" : "Adobe",
            "children" : [
              {
                "text" : "Adobe"
              },
              {
                "text" : "Illustrator"
              }
            ]
          }]';
        $data = json_decode($json);
        return response()->json($data);
    }
}
