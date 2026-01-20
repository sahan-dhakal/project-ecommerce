<?php
namespace APP\Constants;
use Illuminate\Support\Facades\DB;
class FileHandle{
    public static function addUpdateFile(array $params)
    {
        // required parameters
        $requestParameter = $params['requestParameter']; //input name
        $table = $params['table']; //Db Table
        $location = rtrim($params['location'], '/'); //folder path
        $id = $params['id'] ?? null;        //record id

        $req = request();
        $filename = null;

        //Helpeer to generate unique filename
        $generateFilename = fn($file) => date('YmdHis'). '-' . bin2hex(random_bytes(8).rand(1000, 10000000)) . '.' . $file->getClientOriginalExtension();        
       
        if ($id){
            //edit existing record
            $record = DB::table($table)->where('id', $id)->first();

            if ($req->hasFile($requestParameter)){
                //delete old file if exists
                $oldFile = $record->requestParameter ?? null;
                if ($oldFile && file_exists(public_path($oldFile))){
                    unlink(public_path(($oldFile)));
                }

                $file = $req->file($requestParameter);
                $name = $generateFilename($file);
                $file->move(public_path($location), $name);
                $filename = $location . '/' . $name;

            } else{
                //NO new file uploaded -> Keep Old filename
                $filename = $record->$requestParameter ?? null;
            }
        }else {
            //new record

            if ($req->hasFile($requestParameter)) {
                $file = $req->file($requestParameter);
                $name = $generateFilename($file);
                $file->move(public_path($location), $name);
                $filename = $location . '/' . $name;
            }
        }

        return $filename;

    }
}
?>