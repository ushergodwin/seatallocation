<?php
namespace App\Controller;

use App\Controller\Auth\Auth;
use App\Controller\BaseController;
use System\Http\Request;
use System\Http\Request\Request as HttpRequest;

class Home extends BaseController
{
    public function index() {

        $context = [
            'title' => 'HOME',
        ];
        return render('index', $context);
    }

    
    public static function tour($data = null)
    {
        $file = BASE_PATH . 'tour-store/tour.json';
        
        $request = new HttpRequest();

        if($request->isGet() && isset($_GET['user_key']))
        {
            $data = ["user_key" => $request->get('user_key')];
        }

                    
        if(file_exists($file))
        {
            $content = json_decode(file_get_contents($file));
            $key_exists = false;
            
            if(!empty($content))
            {
                if(is_array($data))
                {
                    $key = $data["user_key"];
                }else {
                    $key = $data;
                }

                $content_len = count($content);

                for($i = 0; $i < $content_len; $i++)
                {
                    if($content[$i]->user_key == $key)
                    {
                        $key_exists = true;
                        break;

                    } else {
                        $key_exists = false;
                    }
                }
            }
            if(is_string($data))
            {
                return $key_exists;
            }
        }

        if(!empty($data) && is_array($data))
        {
            if($key_exists)
            {
                return;
            }
            
            $f = fopen($file, 'r+');
            $content = json_decode(file_get_contents($file));
            $content[] = $data;
    
            $content = json_encode($content);
    
            fwrite($f, $content);
            $content = json_decode($content);

            fclose($f);
        }
    }

    public function changePassword()
    {
        Auth::required();
        $content = [
            'title' => "Change Password"
        ];
        return render('reset_password', $content);
    }
}